<?php
/*MÃ NGUỒN NÀY ĐƯỢC PHÁT TRIỂN BỞI TUANORI - ZALO: 0812665001*/
    define("IN_SITE", true);
    require_once("../../core/config.php");
    require_once("../../core/function.php");
    // require_once('../../class/class.smtp.php');
    // require_once('../../class/PHPMailerAutoload.php');
    // require_once('../../class/class.phpmailer.php');
    function msg($color, $data, $meta = '') {
        die('<div class="alert alert-'.$color.' alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                '.$data.'
            </div>
            '.$meta);
    }
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_COOKIE['token'])) {
        msg("danger", 'Vui lòng đăng nhập để tiếp tục');
    }
    if(!$TUANORI->site('status_banngoc')) {
        msg("danger", 'Hệ thống bán ngọc đang tạm đóng');
    }
    $server = check_string($_POST['server']);
    $sotien = check_string($_POST['sotien']);
    $tk  = check_string($_POST['tk']);
    $mk  = check_string($_POST['mk']);
    if(!$server || !$sotien || !$tk || !$mk)  {
        msg("danger","Vui lòng nhập đầy đủ thông tin");
    }
    if($sotien > $getUser['money']) {
        msg("danger","Số tiền của bạn không đủ để thanh toán");
    }
    if($sotien < $TUANORI->site('min_banngoc')) {
        msg("danger","Số tiền mua tối thiểu là ".number_format($TUANORI->site('min_banngoc'))."đ");
    }
    if($sotien > $TUANORI->site('max_banngoc')) {
        msg("danger","Số tiền mua tối đa là ".number_format($TUANORI->site('max_banngoc'))."đ");
    }
    $check_server = json_decode($TUANORI->site('server_banngoc'), true);
    if(!in_array($server, $check_server['maychu'])) {
        msg("danger","Máy chủ của bạn mua không hợp lệ");
    }
    // CHECK SERVER CÓ ONLINE HAY KHÔNG
    $i = $sovang = 0;
    $ok = json_decode($TUANORI->site('server_banngoc'), true);
    for($i = 0; $i < count($ok['maychu']); ++$i) {
        if($ok['maychu'][$i] == $server) {
            if(!$ok['status'][$i]) {
                msg("danger","Máy chủ của bạn mua hiện đang OFFLINE");
            }
            $ngoc = round($ok['heso'][$i]* ($sotien/1000), 0); // làm tròn về 0 chữ số
            // msg("danger", $ok['heso'][$i]);
            break;
        }
    }
    if($_POST['coupon']) {
        $mgg = check_string($_POST['coupon']);
        if(!$mg = $TUANORI->get_row(" SELECT * FROM `coupon` WHERE `code` = '$mgg' AND `conlai` >= 1")) {
            msg("danger", "Mã giảm giá này không tồn tại");
        }
        if($mg['apply'] !== 'ngoc') {
            msg("danger", "Mã giảm giá này không áp dụng cho danh mục này.");
        }
        if($mg['money_toithieu'] > $sotien) {
            msg("danger", "Mã giảm giá này áp dụng cho đơn hàng từ <b style='color: green'>".number_format($mg['money_toithieu'])."đ</b> trở lên");
        }
        if(!$mg['type'] &&  ($TUANORI->num_rows(" SELECT * FROM `history_dichvu` WHERE `dichvu` = '-2' AND `coupon` = '$mgg' ") >=1)) {
            msg("danger", "Bạn đã sử dụng mã giảm giá này 1 lần rồi.");
        }
        $sotien -=$sotien * $mg['giam']/100;
        $notemgg = $mgg.' - Giảm giá '.$mg['giam'].'%';
    }
    $TUANORI->tru("users", "money", $sotien, " `username` = '".$getUser['username']."'"); // trừ tiền thành viên
    // biến động số dư trừ tiền thành viên
    $TUANORI->insert("biendongsodu", [
        'username'  => $getUser['username'],
        'truoc'     => $getUser['money'],
        'tongtien'  => $sotien,
        'sau'       => $getUser['money'] - $sotien,
        'note'      => 'Mua ngọc với giá '.number_format($sotien).'đ tại máy chủ '.$server,
        'time'      => gettime()
    ]);
    if(isset($mgg) && $mgg) {
        $TUANORI->tru("coupon", "conlai", 1, " `code` = '$mgg' AND `conlai` >= 1  AND `apply` = 'ngoc'"); // giảm lượt dùng coupon
    }
    $TUANORI->insert("history_dichvu", [
        'username'          => $getUser['username'],
        'category_dichvu'   => -2,
        'dichvu'            => -2,
        'server'            => $server,
        'tongtien'          => $sotien,
        'tk'                => $tk,
        'mk'                => $mk,
        'status'            => 0,
        'iteam'             => $ngoc,
        'thoigian'          => gettime(),
        'coupon'            => $mgg ?? ''
    ]);
    $TUANORI->cong("options", "value", 1, " `key` = 'num_sell_banngoc'"); // cộng 1 đơn hàng
    send_tele("Bạn vừa có đơn hàng mua ngọc của thành viên ".$getUser['username']."vào lúc ".gettime());
    // thêm lịch sử mua vàng
    msg("success","Đã đặt đơn mua vàng thành công.", '<meta http-equiv="Refresh" content="1;url=/profile/mua-ngoc">');

} else {
    msg("danger","Method không hợp lệ");
}
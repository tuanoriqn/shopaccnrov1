<div id="thongbao"></div>
<script>
    function updateTextView(_obj){
        var num = getNumber(_obj.val());
        if(num==0){
            _obj.val('');
        }else{
            _obj.val(num.toLocaleString());
        }
    }
    function getNumber(_str){
        var arr = _str.split('');
        var out = new Array();
        for(var cnt=0;cnt<arr.length;cnt++){
            if(isNaN(arr[cnt])==false){
                out.push(arr[cnt]);
            }
        }
        return Number(out.join(''));
    }
    $(document).ready(function(){
        $('.fnum').on('keyup',function(){
            updateTextView($(this));
        });
    });
</script>


<!-- jQuery -->
<script src="<?=BASE_URL('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=BASE_URL('assets/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- ĐƠN VỊ THIẾT KẾ WEB WWW.CMSNT.CO | ZALO: 0947838128 | FACEBOOK: FB.COM/NTGTANETWORK -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=BASE_URL('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=BASE_URL('assets/');?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=BASE_URL('assets/');?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=BASE_URL('assets/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=BASE_URL('assets/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=BASE_URL('assets/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=BASE_URL('assets/');?>plugins/moment/moment.min.js"></script>
<script src="<?=BASE_URL('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=BASE_URL('assets/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?=BASE_URL('assets/');?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=BASE_URL('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASE_URL('assets/');?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=BASE_URL('assets/');?>dist/js/pages/dashboard.js"></script>
<!-- bootstrap color picker -->
<script src="<?=BASE_URL('assets/');?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?=BASE_URL('assets/');?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- DataTables -->
<script src="<?=BASE_URL('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=BASE_URL('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=BASE_URL('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ĐƠN VỊ THIẾT KẾ WEB WWW.CMSNT.CO | ZALO: 0947838128 | FACEBOOK: FB.COM/NTGTANETWORK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
</body>

</html>
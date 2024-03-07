<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Batch;

class AllocationPolicy extends \Google\Collection
{
  protected $collection_key = 'instances';
  /**
   * @var InstancePolicyOrTemplate[]
   */
  public $instances;
  protected $instancesType = InstancePolicyOrTemplate::class;
  protected $instancesDataType = 'array';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var LocationPolicy
   */
  public $location;
  protected $locationType = LocationPolicy::class;
  protected $locationDataType = '';
  /**
   * @var NetworkPolicy
   */
  public $network;
  protected $networkType = NetworkPolicy::class;
  protected $networkDataType = '';
  /**
   * @var PlacementPolicy
   */
  public $placement;
  protected $placementType = PlacementPolicy::class;
  protected $placementDataType = '';
  /**
   * @var ServiceAccount
   */
  public $serviceAccount;
  protected $serviceAccountType = ServiceAccount::class;
  protected $serviceAccountDataType = '';

  /**
   * @param InstancePolicyOrTemplate[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return InstancePolicyOrTemplate[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param LocationPolicy
   */
  public function setLocation(LocationPolicy $location)
  {
    $this->location = $location;
  }
  /**
   * @return LocationPolicy
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param NetworkPolicy
   */
  public function setNetwork(NetworkPolicy $network)
  {
    $this->network = $network;
  }
  /**
   * @return NetworkPolicy
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param PlacementPolicy
   */
  public function setPlacement(PlacementPolicy $placement)
  {
    $this->placement = $placement;
  }
  /**
   * @return PlacementPolicy
   */
  public function getPlacement()
  {
    return $this->placement;
  }
  /**
   * @param ServiceAccount
   */
  public function setServiceAccount(ServiceAccount $serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return ServiceAccount
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AllocationPolicy::class, 'Google_Service_Batch_AllocationPolicy');

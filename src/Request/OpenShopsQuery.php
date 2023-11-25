<?php
/**
 * Created by PhpStorm.
 * Script Name: OpenShopsQuery.php
 * Create: 2023/11/25 16:04
 * Description:
 * Author: fudaoji<fdj@kuryun.cn>
 */
namespace Dao\Jushuitan\Request;

use Dao\Jushuitan\Request;

class OpenShopsQuery extends Request
{
    protected $api = 'open/shops/query';
    private $shopIds = [];

    function setShopIds($shopIds){
        $this->shopIds = $shopIds;
        $this->postParams['shop_ids'] = $this->shopIds;
    }

    function getShopIds(){
        return $this->shopIds;
    }
}
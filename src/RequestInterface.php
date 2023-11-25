<?php
/**
 * Created by PhpStorm.
 * Script Name: RequestInterface.php
 * Create: 2023/11/25 14:00
 * Description:
 * Author: fudaoji<fdj@kuryun.cn>
 */

namespace Dao\Jushuitan;

interface RequestInterface
{
    /**
     * 获取请求url
     * @author fudaoji<fdj@kuryun.cn>
     */
    public function getUrl();

    /**
     * 设置请求地址
     * @param string $url
     * @author fudaoji<fdj@kuryun.cn>
     */
    public function setUrl($url);

    /**
     * get请求参数
     * @author fudaoji<fdj@kuryun.cn>
     */
    public function getParams() ;

    /**
     * post请求参数
     * @author fudaoji<fdj@kuryun.cn>
     */
    public function postParams();

}
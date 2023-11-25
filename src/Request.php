<?php
/**
 * Created by PhpStorm.
 * Script Name: Request.php
 * Create: 2023/11/25 15:22
 * Description:
 * Author: fudaoji<fdj@kuryun.cn>
 */

namespace Dao\Jushuitan;

abstract class Request
{
    protected $url = 'https://openapi.jushuitan.com/';
    protected $api = '';
    protected $publicRequestParams = [];
    protected $postParams = [];
    protected $config = [];

    public function __construct($config)
    {
        $this->setConfig($config);
        $this->setUrl($config);
        $this->setPublicRequestParams();
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function getConfig(array $config)
    {
        return $this->config;
    }

    public function getPublicRequestParams(){
        return $this->publicRequestParams;
    }

    public function setPublicRequestParams()
    {
        $this->publicRequestParams = [
            'app_key' => $this->config['app_Key'],
            'access_token' =>  $this->config['access_token'],
            'timestamp' => time(),
            'charset' => $this->config['charset'] ?? "utf-8",
            'version' => $this->config['version'] ?? 2,
        ];
    }

    /**
     * 获取请求url
     * @author fudaoji<fdj@kuryun.cn>
     */
     function getUrl() {
         return $this->url;
     }

    function setUrl() {
        $this->url = $this->config['base_url'] ?? $this->url;
    }

    /**
     * 获取请求url
     * @author fudaoji<fdj@kuryun.cn>
     */
    function getApi() {
        return $this->api;
    }

    /**
     * 最终的请求参数
     * @return array
     * Author: fudaoji<fdj@kuryun.cn>
     */
    function getParams(){
        $data = $this->getPublicRequestParams();
        $data['biz'] = !empty($this->postParams) ? json_encode($this->postParams) : '{}';
        $data['sign'] = Util::getSign($this->config['app_secret'], $data);
        return $data;
    }
}
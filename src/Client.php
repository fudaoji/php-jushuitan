<?php
/**
 * Created by PhpStorm.
 * Script Name: Client.php
 * Create: 2023/2/4 17:57
 * Description:
 * Author: fudaoji<fdj@kuryun.cn>
 */

namespace Dao\Jushuitan;

use GuzzleHttp\Client as Clients;
use Psr\Http\Message\ResponseInterface;

class Client
{
    static $install = null;
    public $options = [
        'timeout' => 60,
        'verify' => false,
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
        ]
    ];
    private $errMsg = '';
    
    static function getInstance($options = []){
        if(is_null(self::$install)){
            self::$install = new self($options);
        }
        return self::$install;
    }

    protected function __construct($options = [])
    {
        is_array($options) && $this->options = array_merge($this->options, $options);
    }

    function excute($request):array
    {
        $this->options['base_uri'] = $request->getUrl();
        $client = new Clients($this->options);

        $req = $client->postAsync($request->getApi(), [
            'form_params' => $request->postParams()
        ]);
        $promise = $req->then(function (ResponseInterface $r) {
            $contents = $r->getBody()->getContents();
            return json_decode($contents, true);
        }, function (\Exception $exception) {
            return json_decode(json_encode($exception),true);
        });
        return $promise->wait();
    }

    private function setErrMsg(string $string = '')
    {
        $this->errMsg = $string;
    }

    private function error($msg = '', $data = [])
    {
        !empty($data['errmsg']) && $data['ori_errmsg'] = $data['errmsg'];
        $data['code'] = 0;
        $data['errmsg'] = $msg;
        return $data;
    }

    private function success($data = [], $msg = '')
    {
        return ['code' => 1, 'msg' => $msg, 'data' => $data];
    }
}
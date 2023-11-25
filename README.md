# php-jushuitan(聚水潭开发接口PHP SDK)

## 安装
~~~
composer require fudaoji/php-jushuitan
~~~

## 用法：
* 查询店铺列表
~~~php
use Dao\Jushuitan\Request\OpenShopsQuery;
use Dao\Jushuitan\Client;

$config = [
    'base_url' =>'https://dev-api.jushuitan.com/',
    'app_Key' => 'b0b7d1db226d4216a3d58df9ffa2dde5',
    'app_Secret'=> '99c4cef262f34ca882975a7064de0b87',
    'access_token' => '8db141b6d724211b28d2eff2c93fe918',
];

$request = new OpenShopsQuery($config);
$shopIds = ['10394759'];
$request->setShopIds($shopIds);
$res = Client::getInstance()->excute($request);

var_dump($res);
~~~


## 特别鸣谢
guzzlehttp/guzzle

## 交流
如果对您有帮助，麻烦star走一波，感谢！

## 声明
本项目仅供技术研究，请勿用于任何商业用途，请勿用于非法用途，如有任何人凭此做何非法事情，均于作者无关，特此声明。
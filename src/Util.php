<?php
/**
 * Created by PhpStorm.
 * Script Name: Util.php
 * Create: 2023/11/25 15:03
 * Description:
 * Author: fudaoji<fdj@kuryun.cn>
 */

namespace Dao\Jushuitan;

class Util
{
    /**
     * 生成签名
     */
    public static function getSign($appSecret, $data): ?string
    {
        if ($data == null) {
            return null;
        }
        ksort($data);
        $resultStr = "";
        foreach ($data as $key => $val) {
            if ($key != null && $key != "" && $key != "sign") {
                $resultStr = $resultStr . $key . $val;
            }
        }
        $resultStr = $appSecret . $resultStr;
        return bin2hex(md5($resultStr, true));
    }
}
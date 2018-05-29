<?php
namespace App\api\post;

class post
{
    public function curls($url)
    {
        define('APP_PATH',dirname(__DIR__));
        $curl = curl_init();
        $cfg = include(APP_PATH.'config/cfg.php');
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_HEADER,1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,0);
        curl_setopt($curl,CURLOPT_REFERER,$cfg[2]);
        curl_setopt($curl,CURLOPT_COOKIE,$cfg[1]);
        curl_setopt($curl,CURLOPT_USERAGENT,$cfg[0]);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
}

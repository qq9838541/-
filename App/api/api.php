<?php
@header('Content-type: text/html;charset=UTF-8');

/**
 * 百度音乐列表api [开始]
 */
if($_POST["music"] == true)
{
    $str = $_POST['musicname'];

    $utf = '';

    for ($i=0;$i<strlen($str);$i++) $utf.=sprintf("%%%02X",ord(substr($str,$i,1)));

    $url = 'http://tingapi.ting.baidu.com/v1/restserver/ting?from=webapp_music&method=baidu.ting.search.catalogSug&format=json&callback=&query='.$utf.'&_=1513017198449format:json|xml|jsonp';

    define('APP_PATH',dirname(__DIR__));

    $curl = curl_init();

    $cfg = include(APP_PATH.'/config/cfg.php');

    curl_setopt($curl,CURLOPT_URL,$url);

    curl_setopt($curl,CURLOPT_HEADER,1);

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

    $res = curl_exec($curl);

    if(curl_getinfo($curl,CURLINFO_HTTP_CODE) == '200')
    {
        $headersize = curl_getinfo($curl,CURLINFO_HEADER_SIZE);
        $header = substr($res,0,$headersize);
        $body = substr($res,$headersize);
        $result = array();
        preg_match_all("/(?:\()(.*)(?:\))/i",$body, $result);
        echo $result[1][0];
    }

    curl_close($curl);

}
/**
 *  百度音乐列表api [结束]
 */



function getUTF8($str)
{
    $str=iconv("GBK", "UTF-8", $str);
    $utf='';
    for ($i=0;$i<strlen($str);$i++) $utf.=sprintf("%%%02X",ord(substr($str,$i,1)));
    return $utf;
}


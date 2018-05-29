<?php
/**
* 百度音乐歌词api [开始]
*/
if($_POST['musiclrc'] == true)
{
    $songid = $_POST['sid'];

    $url = "http://play.baidu.com/data/music/songlink?songIds=".$songid."&hq=0&type=m4a%2Cmp3&rate=&pt=0&flag=2&s2p=0&prerate=0&bwt=0&dur=0&bat=0&bp=0&pos=0&auto=0";

    $curl = curl_init();

    curl_setopt($curl,CURLOPT_URL,$url);

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

    $res = curl_exec($curl);

    $json = json_decode($res);

    // print_r($json);

    $arr = object_array($json);

    // print_r($arr);

//下载地址
   // $songdown = $arr['data']['songList'][0]['songLink'];

//歌词地址
   $lrc = $arr['data']['songList'][0]['lrcLink'];

   $lrcurl = json_encode($lrc,JSON_UNESCAPED_UNICODE);

   $str =  stripslashes($lrcurl);

   // print_r(str_replace('"', '', $str));

   $thunder = str_replace('"', '', $str);

   print_r('thunder://'.base64_encode("AA".$thunder."ZZ"));
   //print_r(stripslashes($lrc));

    if(curl_getinfo($curl,CURLINFO_HTTP_CODE) == '200')
    {
        $headersize = curl_getinfo($curl,CURLINFO_HEADER_SIZE);
        $header = substr($res,0,$headersize);
        $body = substr($res,$headersize);
        $result = array();
        preg_match_all("/(?:\()(.*)(?:\))/i",$body, $result);
    }
}

/**
* 百度音乐歌词api [结束]
*/

//转出studarray成数组
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    } if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}
<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 13.11.2018
 * Time: 10:20
 */

namespace classes\traits;

trait RequestsTrait
{
    protected $url = 'https://api.hh.ru/';

    protected static function sendGetRequest($url){
        return self::sendRequest($url);
    }

    protected static function sendPostRequest($url){
        return self::sendRequest($url, true);
    }

    private static function sendRequest($url, $isPOST = false) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        if($isPOST) {
            curl_setopt($curl, CURLOPT_POST, true);
        }
        curl_setopt($curl,CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; tr-TR) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        $result = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if(empty($error)){
            return json_decode($result);
        }
        return false;
    }

}
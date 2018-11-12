<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 12.11.2018
 * Time: 14:28
 */

class AbstractParser
{
    protected $link = 'https://api.hh.ru/';
    protected static function sendGetRequest($url){

        $opt = include(ROOT.'\classes\config.php');
        $context = stream_context_create($opt['query_params']);

        return json_decode(file_get_contents($url, false, $context));
    }
}
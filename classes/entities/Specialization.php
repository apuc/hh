<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.11.2018
 * Time: 14:38
 */

namespace classes\entities;


class Specialization
{
    public function __construct($params)
    {
        foreach($params as $key => $value){
            if($key === 'specializations') {
                $this->specializations = [];
                foreach ($params->$key as $specialization) {
                    $this->specializations[] = new Specialization($specialization);
                }
            } else {
                $this->$key = $value;
            }
        }
    }
}
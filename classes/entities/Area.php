<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.11.2018
 * Time: 12:33
 */

namespace classes\entities;

/**
 * Class Area
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property Area[] $areas
 */

class Area
{
    public function __construct($params)
    {
        foreach($params as $key => $value){
            if($key === 'areas') {
                $this->areas = [];
                foreach ($params->$key as $area) {
                    $this->areas[] = new Area($area);
                }
            } else {
                $this->$key = $value;
            }
        }
    }
}
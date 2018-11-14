<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.11.2018
 * Time: 11:43
 */

namespace classes\parsers;

use classes\traits\CatalogTrait;
use classes\entities\Area;

class AreaParser extends AbstractParser
{
    use CatalogTrait;
    /**
     * Метод возвращает древовидный список всех регионов
     * @return Area[]|false
     */
    public function getAreasList(){
        $result = self::sendGetRequest($this->url . 'areas');
        if(isset($result->errors))
            return false;
        $areas = [];
        foreach($result as $item){
            $areas[] = new Area($item);
        }
        return $areas;
    }
    /**
     * Метод возвращает древовидный список регионов, начиная с указанного
     * @param int $id
     * @return Area|false
     */
    public function getArea($id){
        $result = self::sendGetRequest($this->url . 'areas/' . $id);
        if(isset($result->errors))
            return false;
        return new Area($result);
    }

    /**
     * Метод возвращает подмножество регионов, являющихся странами ( без вложенных регионов )
     * @return Area[]|false
     */
    public function getCountries(){
        $result = self::sendGetRequest($this->url . 'areas/countries');
        if(isset($result->errors))
            return false;
        $areas = [];
        foreach($result as $item){
            $areas[] = new Area($item);
        }
        return $areas;
    }

    /**
     * Метод возвращает id региона с указанным именем, или false если такого региона нет
     * @param string $name
     * @return int|false
     */
    public function getIdByName($name){
        $areas = $this->getAreasList();
        foreach($areas as $area){
            if ($tmp = $this->checkTree($area, 'areas', 'name', $name, 'id'))
                return $tmp;
        }
        return false;
    }


}
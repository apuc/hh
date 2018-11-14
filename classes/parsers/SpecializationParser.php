<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 14.11.2018
 * Time: 14:36
 */

namespace classes\parsers;
use classes\entities\Specialization;
use classes\traits\CatalogTrait;

class SpecializationParser extends AbstractParser
{
    use CatalogTrait;

    /**
     * Метод возвращает древовидный список всех специализаций
     * @return Specialization[]|false
     */
    public function getSpecializationsList(){
        $result = self::sendGetRequest($this->url . 'specializations');
        if(isset($result->errors))
            return false;
        $specializations = [];
        foreach($result as $item){
            $specializations[] = new Specialization($item);
        }
        return $specializations;
    }

    /**
     * Метод возвращает id специализации с указанным именем, или false если такого региона нет
     * @param string $name
     * @return int|false
     */
    public function getIdByName($name){
        $specializations = $this->getSpecializationsList();
        foreach($specializations as $specialization){
            if ($tmp = $this->checkTree($specialization, 'specializations', 'name', $name, 'id'))
                return $tmp;
        }
        return false;
    }
}
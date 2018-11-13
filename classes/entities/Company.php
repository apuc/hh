<?php
namespace classes\entities;
/**
 * Class Company
 *
 * @property int $id
 * @property int $trusted
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $site_url
 * @property string $alternate_url
 * @property string $vacancies_url
 * @property array $logo_urls
 * @property array $relations
 * @property array $area
 * @property string $branded_description
 *
 */

class Company
{
    public function __construct($params)
    {
        foreach($params as $key => $value){
            $this->$key = $value;
        }
    }

}
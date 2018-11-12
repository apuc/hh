<?php
include 'Vacancy.php';
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
 * @property Vacancy[] $vacancies
 *
 */

class Company
{
    public function __construct($params)
    {
        foreach($params as $key => $value){
            $this->$key = $value;
        }
        $this->vacancies = $this->getVacancies();
    }

    private function getVacancies(){
        $opt = include(ROOT.'\classes\config.php');
        $context = stream_context_create($opt['query_params']);

        $result = json_decode(file_get_contents($this->vacancies_url , false, $context));
        foreach($result->items as $item){
            $vacancies[] = new Vacancy($item);
        }
        return $vacancies;
    }
}
<?php
namespace classes\parsers;
use classes\entities\Company;

class CompanyParser extends AbstractParser
{

    /**
     * Метод возвращает компанию с нужным id
     * @param int #id
     * @return Company|false
     */
    public function getCompany($id){
        $result = self::sendGetRequest($this->url . 'employers/' . $id);
        if(isset($result->errors))
            return false;
        return new Company($result);
    }

    /**
     * Метод возвращает список компаний, соответствующий параметрам поиска params
     * Text, area, type, only_with_vacancied, page, per_page
     * @param array $params
     * @return Company[]|false
     */
    public function searchCompanies($params){
        $url = $this->url.'employers?';
        foreach($params as $key=>$value){
            $url .= $key.'='.$value . '&';
        }
        $url = substr($url, 0, -1);

        $result = self::sendGetRequest($url);
        if(!$result->items)
            return false;
        $companies = [];
        foreach($result->items as $item){
            $companies[] = new Company($item);
        }
        return $companies;
    }

}
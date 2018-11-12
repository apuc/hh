<?php
include 'Company.php';
include 'AbstractParser.php';

class CompanyParser extends AbstractParser
{

    /**
     * Метод возвращает компанию с нужным id
     * @return Company|false
     */
    public function getCompany($id){
        $url = $this->link . 'employers/' . $id;
        $result = self::sendGetRequest($url);
        if(empty($result))
            return false;
        return new Company($result);
    }

    /**
     * Метод возвращает список компаний, соответствующий параметрам поиска params
     * Text, area, type, only_with_vacancied, page, per_page
     * @return Company[]
     */
    public function searchCompanies($params){
        $link = $this->link.'employers?';
        foreach($params as $key=>$value){
            $link .= $key.'='.$value . '&';
        }
        $url = substr($link, 0, -1);

        $result = self::sendGetRequest($url);
        foreach($result->items as $item){
            $companies[] = new Company($item);
        }
        return $companies;
    }

}
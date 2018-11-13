<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 13.11.2018
 * Time: 10:49
 */

namespace classes\parsers;


use classes\Vacancy;

class VacancyParser extends AbstractParser
{
    /**
     * Метод возвращает массив вакансий компании с выбранным id
     * @param int $company_id
     * @return Vacancy[]|false
     */
    public function getVacanciesByCompanyId($company_id){
        $result = self::sendGetRequest($this->url . 'vacancies?employer_id=' . $company_id);
        if(empty($result->items)) {
            return false;
        }
        $vacancies = [];
        foreach ($result->items as $item) {
            $vacancies[] = new Vacancy($item);
        }
        return $vacancies;
    }

    /**
     * Метод возвращает массив вакансий компании с выбранным id
     * @param int $id
     * @return Vacancy|false
     */
    public function getVacancy($id){
        $result = self::sendGetRequest($this->url . 'vacancies/' . $id);
        if(isset($result->errors))
            return false;
        return new Vacancy($result);
    }

    /**
     * Метод возвращает список компаний, соответствующий параметрам поиска params
     * Усли указать $similar_vacancy_id - будут искаться ванасии, похожие на вакансию с данным id
     * Text, search_field, experience, employment, schedule, area, metro, specialization, industry, employer_id, currency,
     * salary, label, only_with_salary, period, date_from, date_to, order_by, clusters, describe_arguments, per_page,
     * page, no_magic, premium
     * @param array $params
     * @param int|bool $similar_vacancy_id
     * @return Vacancy[]|false
     */
    public function searchVacancies($params, $similar_vacancy_id = false){
        if(!$similar_vacancy_id)
            $url = $this->url.'vacancies?';
        else
            $url = $this->url.'vacancies/'.$similar_vacancy_id.'/similar_vacancies?';
        foreach($params as $key=>$value){
            $url .= $key.'='.$value . '&';
        }
        $url = substr($url, 0, -1);

        $result = self::sendGetRequest($url);
        if(!$result->items)
            return false;
        $vacancies = [];
        foreach($result->items as $item){
            $vacancies[] = new Vacancy($item);
        }
        return $vacancies;
    }

}
<?php
namespace classes\parsers;

class HHParser
{
    public $company_parser;
    public $vacancy_parser;
    public $area_parser;
    public $specialization_parser;
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __construct() {
        $this->company_parser = new CompanyParser();
        $this->vacancy_parser = new VacancyParser();
        $this->area_parser = new AreaParser();
        $this->specialization_parser = new SpecializationParser();
    }
}
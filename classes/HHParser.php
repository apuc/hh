<?php

include 'classes/CompanyParser.php';

class HHParser
{
    public $company_parser;
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
    }
}
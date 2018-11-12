<?php
define('ROOT', dirname(__FILE__));

include 'classes/HHParser.php';

//use classes\HHParser;


$parser = HHParser::getInstance();
$result = $parser->company_parser->searchCompanies(['text' => 'jti']);
?>
<pre>
    <?php print_r($result);?>
</pre>

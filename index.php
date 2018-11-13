<?php
include_once 'init.php';

//27435
//28283634
use classes\parsers\HHParser;


$parser = HHParser::getInstance();
//$result = $parser->vacancy_parser->getVacanciesByCompanyId(27435);
$result = $parser->vacancy_parser->searchVacancies(['text' => '123'], 28283634);
if($result === false)
    echo 123;
?>
<pre>
    <?php print_r($result);?>
</pre>
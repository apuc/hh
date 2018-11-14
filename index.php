<?php
include_once 'init.php';

//27435
//28283634
use classes\parsers\HHParser;


$parser = HHParser::getInstance();
$result = $parser->vacancy_parser->searchVacancies([
        'specialization' => $parser->specialization_parser->getIdByName('Банковское ПО'),
        'area' => $parser->area_parser->getIdByName('Киев')
]);
if($result === false)
    echo 123;
?>
<pre>
    <?php print_r($result);?>
</pre>
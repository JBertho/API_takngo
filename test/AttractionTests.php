<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 10:44
 */
require_once __DIR__.'/../services/AttractionService.php';

AttractionService::getInstance();

$a = new Attraction(NULL,'Space Mountain',8,112,155);
$a = AttractionService::getInstance()->insertAttraction($a);

print_r($a);

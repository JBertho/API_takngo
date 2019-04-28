<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 12:52
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/AttractionService.php';
echo json_encode(AttractionService::getInstance()->allAttractions());
<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 09/04/2019
 * Time: 11:13
 */
header('Content-Type: application/json');
require_once __DIR__.'/../../services/PassService.php';
echo json_encode(PassService::getInstance()->allPasses());


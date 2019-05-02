<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:09
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/ServiceService.php';
require_once __DIR__.'/../../utils/validator.php';

$body = file_get_contents('php://input');//lecture du body en chaine de car
$json = json_decode($body,true); //true -> decode as array

print_r($json);
if (isset($_GET['id'])){

    $service = ServiceService::getInstance()->allServiceByChief($_GET['id']);

    if ($service){
        http_response_code(201);
        echo json_encode($service);
    }else{
        http_response_code(500);
    }
}
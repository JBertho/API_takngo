<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:09
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/UserService.php';
require_once __DIR__.'/../../utils/validator.php';

$body = file_get_contents('php://input');//lecture du body en chaine de car
$json = json_decode($body,true); //true -> decode as array

print_r($json);
if (isset($_GET['id'])){

    $user = UserService::getInstance()->getById($_GET['id']);
    if ($user){
        http_response_code(201);
        echo json_encode($user);
    }else{
        http_response_code(500);
    }
}
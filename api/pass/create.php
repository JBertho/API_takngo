<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 09/04/2019
 * Time: 11:13
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/PassService.php';
require_once __DIR__.'/../../utils/validator.php';

$body = file_get_contents('php://input');//lecture du body en chaine de car
$json = json_decode($body,true); //true -> decode as array

print_r($json);
if(Validator::validate($json,['name','price'])){
    $pass = new Pass(NULL,
        $json['name'],
        $json['price']
    );
    $new = PassService::getInstance()->insertPass($pass);
    if ($new){
        http_response_code(201);
        echo json_encode($new);
    }else{
        http_response_code(500);
    }
}else{
    http_response_code(400);
}
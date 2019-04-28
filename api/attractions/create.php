<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 11:47
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/AttractionService.php';
require_once __DIR__.'/../../utils/validator.php';

$body = file_get_contents('php://input');//lecture du body en chaine de car
$json = json_decode($body,true); //true -> decode as array

print_r($json);
if(Validator::validate($json,['name','minHeight','capacity','duration'])){
    $attraction = new Attraction(NULL,
                                    $json['name'],
                                    $json['capacity'],
                                    $json['minHeight'],
                                    $json['duration']
        );
   $new = AttractionService::getInstance()->insertAttraction($attraction);
   if ($new){
       http_response_code(201);
       echo json_encode($new);
   }else{
       http_response_code(500);
   }
}else{
    http_response_code(400);
}

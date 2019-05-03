<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 15:28
 */

require_once __DIR__.'/../../services/ProductService.php';
require_once __DIR__.'/../../utils/validator.php';

$body = file_get_contents('php://input');//lecture du body en chaine de car
$json = json_decode($body,true); //true -> decode as array

if (isset($_GET['id'])){
    $products = ProductService::getInstance()->allProductByService($_GET['id']);
    echo json_encode($products);
    if ($products){
        http_response_code(201);
        echo json_encode($products);
    }else{
        http_response_code(500);
    }

}
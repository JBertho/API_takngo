<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:09
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/ProductService.php';
require_once __DIR__.'/../../utils/validator.php';

if (isset($_GET['name']) and isset($_GET['price']) and isset($_GET['description']) and isset($_GET['pict']) and isset($_GET['service'])  ){

    $product = ProductService::getInstance()->createProduct($_GET['name'],$_GET['price'],$_GET['description'],$_GET['pict'],$_GET['service']);

    if ($product == true){
        http_response_code(201);
        echo json_encode($product);
    }else{
        http_response_code(500);
    }
}
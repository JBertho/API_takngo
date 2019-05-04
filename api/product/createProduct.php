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

if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['description']) and isset($_POST['pict']) and isset($_POST['service'])  ){

    $img = $_POST['pict'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = "image/" . uniqid() . '.png';
    $success = file_put_contents($file, $data);



    $product = ProductService::getInstance()->createProduct($_POST['name'],$_POST['price'],$_POST['description'],"images/".$_POST['service']."/test.png",$_POST['service']);

    if ($product == true){
        http_response_code(201);
        echo json_encode($product);
    }else{
        http_response_code(500);
    }
}
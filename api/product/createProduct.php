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

    $data = base64_decode($img);
    if(file_exists("../../../takngo/public/images/product/".$_POST['service']) == true ){

    }else{
        $oldmask = umask(0);
        mkdir("../../../takngo/public/images/product/".$_POST['service'],0777,true);
        umask($oldmask);
    }
    $name = uniqid().'.png';
    $file = "../../../takngo/public/images/product/".$_POST['service']."/".$name;
    $success = file_put_contents($file, $data);
    echo json_encode($img);


    $product = ProductService::getInstance()->createProduct($_POST['name'],$_POST['price'],$_POST['description'],"../../images/".$_POST['service']."/".$name,$_POST['service']);

    if ($product == true){
        http_response_code(201);
        echo json_encode($product);
    }else{
        http_response_code(500);
    }
}
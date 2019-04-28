<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 16:21
 */
header('Content-Type: application/json');
require_once __DIR__.'/../../services/UserService.php';
require_once __DIR__.'/../../utils/validator.php';

if (isset($_GET['email']) and isset($_GET['password'])){

    $user = UserService::getInstance()->getConnexionUser($_GET['email'],$_GET['password']);
    if ($user){
        http_response_code(201);
        echo json_encode($user);
    }else{
        http_response_code(500);
    }

}
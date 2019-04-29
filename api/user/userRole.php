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


if (isset($_GET['id'])){

    $roles = UserService::getInstance()->getUserRoles($_GET['id']);
    if ($roles){
        http_response_code(201);
        echo json_encode($roles);
    }else{
        http_response_code(500);
    }
}
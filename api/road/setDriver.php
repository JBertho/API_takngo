<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:09
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/RoadService.php';
require_once __DIR__.'/../../utils/validator.php';



if (isset($_GET['rId']) and isset($_GET['uId'])){

    RoadService::getInstance()->setDriver($_GET['rId'],$_GET['uId']);
    $road = RoadService::getInstance()->getById($_GET['rId']);

    echo json_encode($road);
    if ($road->getDrive() == $_GET['uId']){
        http_response_code(201);
        echo json_encode($road);
    }else{
        http_response_code(500);
    }
}
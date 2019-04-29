<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 29/04/2019
 * Time: 14:24
 */

header('Content-Type: application/json');
require_once __DIR__.'/../../services/RoadService.php';
require_once __DIR__.'/../../utils/validator.php';


if (isset($_GET['id'])) {
    $road = RoadService::getInstance()->allRoadOfDriver($_GET['id']);
    if ($road) {
        http_response_code(201);
        echo json_encode($road);
    } else {
        http_response_code(500);
    }
}else{
    http_response_code(401);
}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 09/04/2019
 * Time: 12:16
 */

require_once __DIR__.'/../../services/AttractionService.php';
require_once __DIR__.'/../../services/PassService.php';
require_once __DIR__.'/../../utils/validator.php';


if(Validator::validate($_GET,['id_pass','id_attraction'])) {
    $pass = PassService::getInstance()->getById($_GET['id_pass']);
    $attr = AttractionService::getInstance()->getById($_GET['id_attraction']);
    if($pass != null and $attr != null){
        $succes = PassService::getInstance()->link($pass,$attr);
        if($succes) {
            http_response_code(204);
        }else{
            http_response_code(409);
        }
    }else{
        http_response_code(404);
    }
}else{
    http_response_code(400);
}

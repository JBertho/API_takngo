<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 10:36
 */

require_once __DIR__.'/../models/Attraction.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

class AttractionService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): AttractionService{
        if(!isset(self::$instance)){
            self::$instance = new AttractionService();
        }
        return self::$instance;
    }
    public function insertAttraction(Attraction $attraction):?Attraction{
        $manager = DatabaseManager::getManager();
        $success = $manager->exec('INSERT INTO attraction (name,capacity,duration,min_height) VALUES (?,?,?,?)',[
            $attraction->getname(),
            $attraction->getcapacity(),
            $attraction->getduration(),
            $attraction->getminHeight()]
        );
        if ($success > 0){
            $attraction->setId($manager->lastInsertId());
            return $attraction;
        }
        return NULL;
    }
    public function allAttractions(): array{
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM attraction');

    }
    public function getById(int $id){
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM attraction WHERE id = ?',[
            $id
        ]);
        if($res){
            return Attraction::AttrFromArray($res);
        }
        return NULL;

    }


}
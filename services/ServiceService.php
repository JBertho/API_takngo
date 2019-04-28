<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:53
 */

require_once __DIR__.'/../models/Service.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

class ServiceService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): ServiceService
    {
        if (!isset(self::$instance)) {
            self::$instance = new ServiceService();
        }
        return self::$instance;
    }

    public function allService(): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM service');
    }
    public function allServiceByChief(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->getAll('SELECT * FROM service WHERE chief_id = ?', [
            $id
        ]);
        return $res;
    }

    public function getById(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM service WHERE id = ?', [
            $id
        ]);
        if($res){
            return Service::ServFromArray($res);
        }
        return NULL;
    }
    /**public function link(Pass $p,Attraction $a): bool{
    $manager = DatabaseManager::getManager();
    $affectedRows = $manager->exec('INSERT INTO pass_attraction(id_pass, id_attraction) VALUES (?,?)',[
    $p->getId(),
    $a->getId()
    ]);
    return $affectedRows !== 0;
    } **/

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 09/04/2019
 * Time: 11:14
 */

require_once __DIR__.'/../models/Pass.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

class PassService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): PassService
    {
        if (!isset(self::$instance)) {
            self::$instance = new PassService();
        }
        return self::$instance;
    }

    public function insertPass(Pass $pass): ?Pass
    {
        $manager = DatabaseManager::getManager();
        $success = $manager->exec('INSERT INTO pass (name,price) VALUES (?,?)', [
                $pass->getname(),
                $pass->getPrice()]
        );
        if ($success > 0) {
            $pass->setId($manager->lastInsertId());
            return $pass;
        }
        return NULL;
    }

    public function allPasses(): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM pass');

    }

    public function getById(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM pass WHERE id = ?', [
            $id
        ]);
        if($res){
            return Pass::PASSFromArray($res);
        }
        return NULL;
    }
    public function link(Pass $p,Attraction $a): bool{
        $manager = DatabaseManager::getManager();
        $affectedRows = $manager->exec('INSERT INTO pass_attraction(id_pass, id_attraction) VALUES (?,?)',[
            $p->getId(),
            $a->getId()
        ]);
        return $affectedRows !== 0;
    }
}
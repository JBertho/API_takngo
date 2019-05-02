<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 29/04/2019
 * Time: 14:20
 */

require_once __DIR__.'/../models/Road.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';


class RoadService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): RoadService
    {
        if (!isset(self::$instance)) {
            self::$instance = new RoadService();
        }
        return self::$instance;
    }

    /*public function insertProduct(Product $product): ?Product
    {
        $manager = DatabaseManager::getManager();
        $success = $manager->exec('INSERT INTO product (name,price) VALUES (?,?)', [
                $product->getname(),
                $product->getPrice()]
        );
        if ($success > 0) {
            $pass->setId($manager->lastInsertId());
            return $pass;
        }
        return NULL;
    } */

    public function allRoadWithoutDriver(): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM road WHERE driver_id is null  ');

    }
    public function allRoadOfDriver(int $id): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM road WHERE driver_id = ?  ',[
            $id
        ]);

    }

    public function getById(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM road WHERE id = ?', [
            $id
        ]);
        if($res){
            return Road::RoadFromArray($res);
        }
        return NULL;
    }
    public function setDriver(int $rId,int $uId){
        $manager = DatabaseManager::getManager();
        $affectedRows = $manager->exec('UPDATE road SET driver_id = ? WHERE id = ?',[
            $uId,
            $rId
        ]);
        return $affectedRows;
    }
    public function getClientName(int $id){
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT lastname,name,phone FROM user,orders,road WHERE user.id = orders.user_id AND road.orders_id = orders.id AND road.id = ?',[
            $id
        ]);
        return $res;

    }

    /*public function link(Pass $p,Attraction $a): bool{
        $manager = DatabaseManager::getManager();
        $affectedRows = $manager->exec('INSERT INTO pass_attraction(id_pass, id_attraction) VALUES (?,?)',[
            $p->getId(),
            $a->getId()
        ]);
        return $affectedRows !== 0;
    } */


}
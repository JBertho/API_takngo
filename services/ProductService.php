<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 15:57
 */

require_once __DIR__.'/../models/Product.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

class ProductService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): ProductService
    {
        if (!isset(self::$instance)) {
            self::$instance = new ProductService();
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

    public function allProductByService(int $id): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM product WHERE service_id = ?',[
            $id
        ]);

    }

    public function getById(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM product WHERE id = ?', [
            $id
        ]);
        if($res){
            return Product::ProductFromArray($res);
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
    public function dropProduct($id){
        $manager = DatabaseManager::getManager();
        $affectedRows = $manager->exec('DELETE FROM product WHERE id= ?',[
            $id
        ]);
        return $affectedRows !== 0;
    }
    public function updateProduct($id,$name,$price,$description,$pict,$duration_activity = null){
        $manager = DatabaseManager::getManager();
        $affectedRows = $manager->exec('UPDATE product SET name = ?,price = ?,description = ?, pict = ?, duration_activity = ? WHERE id = ?',[
            $name,
            $price,
            $description,
            $pict,
            $duration_activity,
            $id
        ]);
        return $affectedRows !== 0;
    }

}
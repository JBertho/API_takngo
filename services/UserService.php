<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:03
 */

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

class UserService
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): UserService
    {
        if (!isset(self::$instance)) {
            self::$instance = new UserService();
        }
        return self::$instance;
    }

    public function allUsers(): array
    {
        $manager = DatabaseManager::getManager();
        return $manager->getAll('SELECT * FROM user');
    }

    public function getById(int $id)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM user WHERE id = ?', [
            $id
        ]);

        if($res){
            return User::UserFromArray($res);
        }
        return NULL;
    }

    public function getConnexionUser($email, $password)
    {
        $manager = DatabaseManager::getManager();
        $res = $manager->findOne('SELECT * FROM user WHERE email = ? and password = ?', [
            $email,$password
        ]);

        return $res;
    }
    public function getUserRoles($id){
        $manager = DatabaseManager::getManager();
        $res =  $manager->getAll('SELECT * FROM user_role WHERE user_id = ?',[
            $id]);
        return User::tradRoles($res);
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
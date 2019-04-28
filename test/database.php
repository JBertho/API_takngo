<?php
require_once __DIR__.'/../utils/databases/DatabaseManager.php';

$manager = DatabaseManager::getManager();

$res = $manager->getAll('SELECT id,name FROM user ');
print_r($res);

?>
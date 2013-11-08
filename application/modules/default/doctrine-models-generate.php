<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Admin
 * Date: 26.07.13
 * Time: 20:50
 * To change this template use File | Settings | File Templates.
 */
include_once 'E:\Install\wamp\www\quickstart1\vendor\doctrine\orm\bin\doctrine.php';
spl_autoload_register(array('Doctrine','autoload'));
$manager = Doctrine_Manager::getInstance();
$conn = Doctrine_Manager::connection(
    'mysql://square:square@localhost/square','doctrine');
Doctrine::generateModelsFromDb('/models',array('doctrine'),array('classPrefix'=>'Square_Model'));
?>
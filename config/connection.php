<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 21/05/2019
 * Time: 21.47
 */

$connection = null;

try {
    $username = 'root';
    $password = 'colgaul123';
    $database = 'mysql:dbname=uas_pabw;host=localhost';
    $connection = new PDO($database,$username,$password);
    $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error ! ". $e ->getMessage();
    die();
}
?>



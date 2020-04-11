<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 17/05/2019
 * Time: 22.39
 */

include 'config/connection.php';

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['username'];
}

$modul = $_GET['modul'] ?? 'Home';
$action = $_GET['action'] ?? 'index';

include 'layout/index.php';

?>
<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 21/05/2019
 * Time: 22.29
 */

session_start();
session_destroy();

header("location:index.php");

?>


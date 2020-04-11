<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 30/05/2019
 * Time: 05.35
 */
include 'config/connection.php';
session_start();
if($_POST){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
//Cek username database
    $q = $connection->prepare("select * from account where username = ?");
    $q->execute(array($username));
    $hasil = $q->fetch();

    if($q->rowCount() == 0) {
        echo "<div class=\"alert alert-warning alert-dismissible fade show\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>Username</strong> invalid !
              </div>";
    } else {
        //Mengambil iterasi
        $iteration = $hasil['iteration'];
        //Mengambil salt
        $salt = $hasil['salt'];
        //Mengambil hash password
        $hashpassword = $hasil['password'];
        //HashLogin
        $hashlogin = hash_pbkdf2('sha256',$password,$salt,$iteration,64);
        //Bandingkan Password hash
        if(strcmp($hashpassword,$hashlogin) === 0) {
            $_SESSION['username'] = $hasil['username'];
            $_SESSION['refference'] = $hasil['refference'];
            $_SESSION['refference_id'] = $hasil['refference_id'];
            header('location:index.php');
        } else {
            echo "<div class=\"alert alert-warning alert-dismissible fade show\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>Password</strong> anda salah!
              </div>";
        }
    }
}


?>
<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 21/05/2019
 * Time: 22.14
 */
session_start();
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
//Cek username database
$q = $connection->prepare("select * from account where username = ?");
$q->execute(array($username));
$hasil = $q->fetch();

if($q->rowCount() == 0) {
    echo "Kamu Belum Terdaftar";
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
        header('location:index.php?modul=KP');
    } else {
        echo "Password anda salah, silahkan coba lagi";
    }
}
?>





<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 30/05/2019
 * Time: 05.44
 */
include 'config/connection.php';
if($_POST){
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $nama = filter_input(INPUT_POST,'nama',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $kpassword = filter_input(INPUT_POST,'kpassword',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    $refference_id = $username;
    $iteration = 0;
    $salt = '';
    try {
        $salt = bin2hex(random_bytes(32));
        $iteration = random_int(100,1000);
    }catch (Exception $ex) {
        die($ex->getMessage());
    }

    $hashpassword = hash_pbkdf2('sha256',$password,$salt,$iteration,64);
    $hashlpassword = hash_pbkdf2('sha256',$kpassword,$salt,$iteration,64);

    $query = $connection ->prepare("SELECT * FROM account WHERE username = ?");
    $query->execute(array($username));

    if($query->rowCount() != 0) {
        echo "<div class=\"alert alert-warning alert-dismissible fade show\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>NIM</strong> telah terdaftar !
              </div>";
    } else {
        $query = $connection->prepare("SELECT * FROM account WHERE email = ?");
        $query->execute(array($email));
        if ($query->rowCount() != 0) {
            echo "<div class=\"alert alert-warning alert-dismissible fade show\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>E-mail</strong> sudah digunakan !
              </div>";
        } else {
            if ($password != $kpassword) {
                echo "<div class=\"alert alert-warning alert-dismissible fade show\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <strong>Ulang Password Salah !</strong> Silahkan coba lagi
              </div>";
            } else {
                $acc = 'insert into account (username, email, password, iteration, salt, refference_id, create_by) values (:username, :email, :hashpassword, :iteration, :salt, :refference_id, :create_by)';
                $statement = $connection->prepare($acc);
                try {
                    $statement->execute([
                        ':username' => $username,
                        ':email' => $email,
                        ':hashpassword' => $hashpassword,
                        ':iteration' => $iteration,
                        ':salt' => $salt,
                        ':refference_id' => $username,
                        ':create_by' => $username
                    ]);
                } catch (Exception $exc) {
                    die($exc->getMessage());
                }

                $mhs = 'insert into mahasiswa (nim, nama, create_by) values (:nim, :nama, :create_by)';
                $statement = $connection->prepare($mhs);

                try {
                    $statement->execute([
                        ':nim' => $username,
                        ':nama' => strtoupper($nama),
                        ':create_by' => $username
                    ]);
                } catch (Exception $exc) {
                    die($exc->getMessage());
                }
                echo "<SCRIPT type='text/javascript'> 
        alert('Pendaftaran Berhasil ! Silahkan Login Akun Anda !');
        location.href = \"login.php\"
    </SCRIPT>";
            }
        }
    }
}


?>
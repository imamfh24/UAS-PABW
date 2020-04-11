<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 21/05/2019
 * Time: 22.33
 */

$username = $_POST['username'] ?? '';
$nama = $_POST ['nama'] ?? '';
$password = $_POST ['password'] ?? '';
$email = $_POST['email'] ?? '';
$refference_id = $_POST['nim'] ?? '';
$iteration = 0;
$salt = '';
try {
    $salt = bin2hex(random_bytes(32));
    $iteration = random_int(100,1000);
}catch (Exception $ex) {
    die($ex->getMessage());
}

$hashpassword = hash_pbkdf2('sha256',$password,$salt,$iteration,64);

$query = $connection ->prepare("SELECT * FROM account WHERE username = ?");
$query->execute(array($username));

if($query->rowCount() != 0) {
    echo "NIM ini sudah digunakan oleh pemiliknya, silahkan gunakan nim kamu sendiri untuk registrasi !";
} else {
    $query = $connection->prepare("SELECT * FROM account WHERE email = ?");
    $query->execute(array($email));
    if ($query->rowCount() != 0) {
        echo "E-mail sudah digunakan, silahkan gunakan email yang lain";
    } else {
        if (!$username || !$password || !$nama || !$email) {
            echo "Data registrasi masih ada yang kosong";
        } else {
            $acc = 'insert into account (username, email, password, iteration, salt, refference_id, create_by) 
                    values (:username, :email, :hashpassword, :iteration, :salt, :refference_id, :create_by)';
            $statement = $connection->prepare($acc);
            try {
                $statement->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':hashpassword' => $hashpassword,
                    ':iteration' => $iteration,
                    ':salt' => $salt,
                    ':refference_id' => $refference_id,
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
                    ':nama' => $nama,
                    ':create_by' => $username
                ]);
            } catch (Exception $exc) {
                die($exc->getMessage());
            }
        }
    }
}

?>


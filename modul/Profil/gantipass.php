<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 03/07/2019
 * Time: 03.21
 */

if ($_POST) {
    $rid = $_SESSION['refference_id'];
    $old_pass = filter_input(INPUT_POST,'old_pass',FILTER_SANITIZE_STRING);
    $new_pass = filter_input(INPUT_POST,'new_pass',FILTER_SANITIZE_STRING);
    $new_pass_con = filter_input(INPUT_POST,'new_pass_con',FILTER_SANITIZE_STRING);

    //Ambil Data User
    $q = $connection->prepare("select * from account where refference_id = ?");
    $q->execute(array($rid));
    $hasil = $q->fetch();

    //Mengambil iterasi
    $iteration = $hasil['iteration'];

    //Mengambil salt
    $salt = $hasil['salt'];

    //Mengambil hash password
    $hashpassword = $hasil['password'];

    $iteration_new = 0;
    $salt_new = '';
    try {
        $salt_new = bin2hex(random_bytes(32));
        $iteration_new = random_int(100,1000);
    }catch (Exception $ex) {
        die($ex->getMessage());
    }

    $hasholdpass = hash_pbkdf2('sha256',$old_pass,$salt,$iteration,64);
    $hashpassword_new = hash_pbkdf2('sha256',$new_pass,$salt_new,$iteration_new,64);
    $hashpassword_new_con = hash_pbkdf2('sha256',$new_pass_con,$salt_new,$iteration_new,64);
    //Kondisi
    if(strcmp($hashpassword,$hasholdpass) === 0) {
        if (strcmp($hashpassword_new,$hashpassword_new_con) === 0) {
            $q = 'update account set iteration = :iteration, salt = :salt, password = :password where refference_id = :refference_id';
            $statement = $connection->prepare($q);
            try {
                $statement->execute([
                    ':iteration' => $iteration_new,
                    ':salt' => $salt_new,
                    ':password' => $hashpassword_new,
                    ':refference_id' => $rid
                ]);
                session_destroy();
                echo "<SCRIPT type='text/javascript'> 
        alert('Password Berhasil Diganti');
        location.href = \"index.php\"
    </SCRIPT>";
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        } else {
            echo '<div class="alert alert-warning">
  <strong>Gagal Ganti Password</strong>. Pastikan Password Baru dan Konfirmasi Password Sama
</div>';
        }
    } else {
        echo '<div class="alert alert-warning">
  <strong>Gagal Ganti Password</strong>. Password Lama Salah
</div>';
    }
}
?>
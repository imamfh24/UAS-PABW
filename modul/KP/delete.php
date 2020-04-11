<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 03/07/2019
 * Time: 02.51
 */

$id = $_GET['id'] ?? '';
try {
    $statement = $connection ->prepare('SELECT count(*) FROM kp where kode_mahasiswa = :kode_mahasiswa ');
    $statement -> execute([
        ':kode_mahasiswa' => $id
    ]);
    // hitung jumlah kolom yang diperoleh
    $result = $statement ->fetchColumn();
    //Jika row ditemukan delete
    if ($result == 1) {
        $statement = $connection -> prepare('DELETE from kp where kode_mahasiswa = :kode_mahasiswa');
        $statement -> execute([
            ':kode_mahasiswa' => $id
        ]);
        //redirect
        echo "<SCRIPT type='text/javascript'> 
        alert('Proses KP saat ini akan dihapus');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";
    } else {
        echo 'Maaf, Data tidak bisa dihapus ';
    }
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
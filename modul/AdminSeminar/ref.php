<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 23.04
 */

$id = $_GET['id'] ?? '';
$status = 0;
$status_ket = 'Di Tolak, Silahkan Edit Kembali Data dan Isi Data Dengan Benar';
$q = 'update kp set sem_status = :sem_status, sem_diproses_ket = :sem_diproses_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':sem_status' => $status,
        ':sem_diproses_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Seminar Ditolak\');
        location.href = "index.php?modul=AdminSeminar"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
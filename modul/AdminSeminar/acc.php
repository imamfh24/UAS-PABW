<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 29/06/2019
 * Time: 15.26
 */

$id = $_GET['id'] ?? '';
$status = 1;
$status_ket = 'Sudah Diterima';
$q = 'update kp set sem_status = :sem_status, sem_diproses_ket = :sem_diproses_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':sem_status' => $status,
        ':sem_diproses_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Seminar Diterima\');
        location.href = "index.php?modul=AdminSeminar"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}
?>
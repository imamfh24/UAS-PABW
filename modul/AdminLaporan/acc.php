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
$q = 'update kp set lap_status = :lap_status, lap_ket = :lap_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':lap_status' => $status,
        ':lap_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Laporan Diterima\');
        location.href = "index.php?modul=AdminLaporan"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}


?>
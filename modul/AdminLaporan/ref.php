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
$q = 'update kp set lap_status = :lap_status, lap_ket = :lap_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':lap_status' => $status,
        ':lap_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Laporan Ditolak\');
        location.href = "index.php?modul=AdminLaporan"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
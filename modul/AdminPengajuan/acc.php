<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 29/06/2019
 * Time: 15.26
 */

$id = $_GET['id'] ?? '';
$permohonan_status = 1;
$permohonan_status_ket = 'Sudah Diterima';
$q = 'update kp set permohonan_status = :permohonan_status, permohonan_status_ket = :permohonan_status_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':permohonan_status' => $permohonan_status,
        ':permohonan_status_ket' => $permohonan_status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Persetujuan Diterima\');
        location.href = "index.php?modul=AdminPengajuan"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}
?>
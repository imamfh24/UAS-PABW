<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 23.04
 */

$id = $_GET['id'] ?? '';
$permohonan_status = 0;
$permohonan_status_ket = 'Di Tolak, Silahkan Edit Kembali Data dan Isi Data Dengan Benar';
$q = 'update kp set permohonan_status = :permohonan_status, permohonan_status_ket = :permohonan_status_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':permohonan_status' => $permohonan_status,
        ':permohonan_status_ket' => $permohonan_status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Persetujuan Ditolak\');
        location.href = "index.php?modul=AdminPengajuan"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
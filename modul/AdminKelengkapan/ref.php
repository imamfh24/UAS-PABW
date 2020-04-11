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
$q = 'update kp set kelengkapan_surat_status = :kelengkapan_surat_status, kelengkapan_surat_ket = :permohonan_status_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':kelengkapan_surat_status' => $status,
        ':permohonan_status_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Persetujuan Ditolak\');
        location.href = "index.php?modul=AdminKelengkapan"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
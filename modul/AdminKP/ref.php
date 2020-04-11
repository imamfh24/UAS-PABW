<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 23.04
 */

$id = $_GET['id'] ?? '';
$status = 1;
$status_ket = 'KP Gagal, Silahkan Ulang KP Kembali';
$q = 'update kp set is_gagal_kp = :is_gagal_kp, gagal_kp_ket = :gagal_kp_ket where kode_mahasiswa = :kode_mahasiswa';
$statement = $connection ->prepare($q);
try {
    $statement -> execute([
        ':kode_mahasiswa' => $id,
        ':is_gagal_kp' => $status,
        ':gagal_kp_ket' => $status_ket
    ]);
    echo '<SCRIPT type=\'text/javascript\'> 
        alert(\'Gagal Kelulusan\');
        location.href = "index.php?modul=AdminKP"
    </SCRIPT>';
} catch (Exception $exception) {
    die($exception->getMessage());
}

?>
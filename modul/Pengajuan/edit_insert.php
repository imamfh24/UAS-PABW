<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 28/06/2019
 * Time: 21.57
 */

if ($_POST) {
    $judul = $_POST['permohonan_judul'] ?? '';
    $periode = $_POST['kode_periode'] ?? '';
    $perusahaan = $_POST['perusahaan'] ?? 0;
    $permohonan_status = null;
    $kets = 'Belum Diproses';
    $kode_mahasiswa = $_SESSION['refference_id'];

    $q = 'update kp set kode_periode = :kode_periode, id_perusahaan_instansi = :id_perusahaan_instansi, permohonan_judul = :permohonan_judul,
          permohonan_update_at = :permohonan_update_at,permohonan_status = :permohonan_status,permohonan_status_ket = :permohonan_status_ket where kode_mahasiswa = :kode_mahasiswa';
    $statement = $connection->prepare($q);
    try {
        $statement->execute([
            ':kode_mahasiswa' => $kode_mahasiswa,
            ':kode_periode' => $periode,
            ':id_perusahaan_instansi' => $perusahaan,
            ':permohonan_judul' => $judul,
            ':permohonan_update_at' => date('Y-m-d H:i:s'),
            ':permohonan_status' => $permohonan_status,
            ':permohonan_status_ket' => $kets
        ]);
    }catch (Exception $exc) {
        die($exc->getMessage());
    }
    echo "<SCRIPT type='text/javascript'> 
        alert('Perubahan berhasil dilakukan, silahkan tunggu konfirmasi approve dari pegawai');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";

}

?>
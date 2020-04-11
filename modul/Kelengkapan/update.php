<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 29/06/2019
 * Time: 16.35
 */

if($_POST) {
    $rid = $_SESSION['refference_id'];
    $folder = 'upload/file/';
    $statuss = null;
    $status = 'Belum diproses';
    //Pembimbing
    $surat_pembimbing_jur_no = $_POST['surat_pembimbing_jur_no'] ?? '';
    $surat_pembimbing_jur_tgl_surat = $_POST['surat_pembimbing_jur_tgl_surat'] ?? '';
    $surat_pembimbing_jur_tgl_ttd = $_POST['surat_pembimbing_jur_tgl_ttd'] ?? '';
    //File
    $surat_pembimbing_jur_file = $_FILES['surat_pembimbing_jur_file']['name'];
    $surat_pembimbing_jur_filesem = $_FILES['surat_pembimbing_jur_file']['tmp_name'];
    $upsurem = move_uploaded_file($surat_pembimbing_jur_filesem,$folder.$surat_pembimbing_jur_file);
    //Pengantar
    $surat_pengantar_no = $_POST['surat_pengantar_no'] ?? '';
    $surat_pengantar_tgl_surat = $_POST['surat_pengantar_tgl_surat'];
    //File
    $surat_pengantar_file = $_FILES['surat_pengantar_file']['name'];
    $surat_pengantar_filesem = $_FILES['surat_pengantar_file']['tmp_name'];
    $upsupe = move_uploaded_file($surat_pengantar_filesem,$folder.$surat_pengantar_file);
    //Perusahaan
    $surat_perusahaan_no = $_POST['surat_perusahaan_no'] ?? '';
    $surat_perusahaan_tgl_surat = $_POST['surat_perusahaan_tgl_surat'] ?? '';
    //File
    $surat_perusahaan_file = $_FILES['surat_perusahaan_file']['name'];
    $surat_perusahaan_filesem = $_FILES['surat_perusahaan_file']['tmp_name'];
    $upsup = move_uploaded_file($surat_perusahaan_filesem,$folder.$surat_perusahaan_file);

    //Pembimbing Perusahaan
    $id_pembimbing_perusahaan = $_POST['perusahaan'] ?? 0;

    $q = 'update kp set surat_pembimbing_jur_no = :surat_pembimbing_jur_no, surat_pembimbing_jur_tgl_surat = :surat_pembimbing_jur_tgl_surat,
                        surat_pembimbing_jur_tgl_ttd = :surat_pembimbing_jur_tgl_ttd, surat_pembimbing_jur_file = :surat_pembimbing_jur_file, 
                        surat_pengantar_no = :surat_pengantar_no,surat_pengantar_tgl_surat = :surat_pengantar_tgl_surat, surat_pengantar_file = :surat_pengantar_file, 
                        surat_perusahaan_no = :surat_perusahaan_no, surat_perusahaan_tgl_surat = :surat_perusahaan_tgl_surat,
                        surat_perusahaan_file = :surat_perusahaan_file, id_pembimbing_perusahaan = :id_pembimbing_perusahaan, kelengkapan_surat_status = :kelengkapan_surat_status,
                        kelengkapan_surat_ket = :kelengkapan_surat_ket where kode_mahasiswa = :kode_mahasiswa';

    /*$q = 'update kp set surat_pembimbing_jur_no = :surat_pembimbing_jur_no, surat_pembimbing_jur_tgl_surat = :surat_pembimbing_jur_tgl_surat,
                        surat_pembimbing_jur_tgl_ttd = :surat_pembimbing_jur_tgl_ttd, 
                        surat_pengantar_no = :surat_pengantar_no,surat_pengantar_tgl_surat = :surat_pengantar_tgl_surat, 
                        surat_perusahaan_no = :surat_perusahaan_no, surat_perusahaan_tgl_surat = :surat_perusahaan_tgl_surat,
                        id_pembimbing_perusahaan = :id_pembimbing_perusahaan';
    */
    $statement = $connection->prepare($q);
    try {
        $statement->execute([
            ':surat_pembimbing_jur_no' => $surat_pembimbing_jur_no ,
            ':surat_pembimbing_jur_tgl_surat' => $surat_pembimbing_jur_tgl_surat,
            ':surat_pembimbing_jur_tgl_ttd' => $surat_pembimbing_jur_tgl_ttd,
            ':surat_pembimbing_jur_file' => $surat_pembimbing_jur_file,
            ':surat_pengantar_no' => $surat_pengantar_no,
            ':surat_pengantar_tgl_surat' => $surat_pengantar_tgl_surat,
            ':surat_pengantar_file' => $surat_pengantar_file,
            ':surat_perusahaan_no' => $surat_perusahaan_no,
            ':surat_perusahaan_tgl_surat' => $surat_perusahaan_tgl_surat ,
            ':surat_perusahaan_file' => $surat_perusahaan_file,
            ':id_pembimbing_perusahaan' => $id_pembimbing_perusahaan,
            ':kelengkapan_surat_status' => $statuss,
            ':kelengkapan_surat_ket' => $status,
            ':kode_mahasiswa' => $rid

        ]);
        echo "<SCRIPT type='text/javascript'> 
        alert('Kelengkapan Berkas berhasil disimpan, silahkan tunggu konfirmasi approve dari pegawai');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";
    }catch (Exception $exc) {
        die($exc->getMessage());
    }
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 29/06/2019
 * Time: 16.35
 */

if($_POST) {
    $rid = $_SESSION['refference_id'];
    $folder = 'upload/file/seminar/';
    $status = 'Belum diproses';
    $statuss = null;

    $sem_judul = $_POST['sem_judul'] ?? '';
    $sem_tgl_waktu = $_POST['sem_tgl_waktu'] ?? '';
    $sem_tempat = $_POST['sem_tempat'] ?? '';

    //Laporan
    $sem_laporan = $_FILES['sem_laporan']['name'];
    $sem_laporansem = $_FILES['sem_laporan']['tmp_name'];
    $semlap = move_uploaded_file($sem_laporansem,$folder.$sem_laporan);
    //Foto 1
    $sem_foto_1_file = $_FILES['sem_foto_1_file']['name'];
    $sem_foto_1_filesem = $_FILES['sem_foto_1_file']['tmp_name'];
    $semfot1 = move_uploaded_file($sem_foto_1_filesem,$folder.$sem_foto_1_file);
    //Foto 2
    $sem_foto_2_file = $_FILES['sem_foto_2_file']['name'];
    $sem_foto_2_filesem = $_FILES['sem_foto_2_file']['tmp_name'];
    $semfoto2 = move_uploaded_file($sem_foto_2_filesem,$folder.$sem_foto_2_file);
    //Foto 3
    $sem_foto_3_file = $_FILES['sem_foto_3_file']['name'];
    $sem_foto_3_filesem = $_FILES['sem_foto_3_file']['tmp_name'];
    $semfoto3 = move_uploaded_file($sem_foto_3_filesem,$folder.$sem_foto_3_file);

    //$sem_penguji = $_POST['sem_penguji'] ?? '';
    $sem_nilai_perusahaan = $_POST['sem_nilai_perusahaan'] ?? 0;
    $sem_nilai_seminar = $_POST['sem_nilai_seminar'] ?? 0;
    $sem_nilai_bimbingan = $_POST['sem_nilai_bimbingan'] ?? 0;


    $q = 'update kp set sem_judul = :sem_judul, sem_tgl_waktu = :sem_tgl_waktu, sem_tempat = :sem_tempat, sem_laporan = :sem_laporan,
                        sem_foto_1_file = :sem_foto_1_file, sem_foto_2_file = :sem_foto_2_file, sem_foto_3_file = :sem_foto_3_file,
                        sem_update_at = :sem_update_at, sem_nilai_perusahaan = :sem_nilai_perusahaan, sem_nilai_seminar = :sem_nilai_seminar,
                        sem_nilai_bimbingan = :sem_nilai_bimbingan, sem_status = :sem_status,sem_diproses_ket = :sem_diproses_ket
                        where kode_mahasiswa = :kode_mahasiswa';

    $statement = $connection->prepare($q);
    try {
        $statement->execute([
            ':sem_judul' => $sem_judul,
            ':sem_tgl_waktu' => $sem_tgl_waktu,
            ':sem_tempat' => $sem_tempat,
            ':sem_laporan' => $sem_laporan,
            ':sem_foto_1_file' => $sem_foto_1_file,
            ':sem_foto_2_file' => $sem_foto_2_file,
            ':sem_foto_3_file' => $sem_foto_3_file,
            ':sem_update_at' => date('Y-m-d H:i:s'),
            ':sem_nilai_perusahaan' => $sem_nilai_perusahaan,
            ':sem_nilai_seminar' => $sem_nilai_seminar,
            ':sem_nilai_bimbingan' => $sem_nilai_bimbingan,
            ':sem_status' => $statuss,
            ':sem_diproses_ket' => $status,
            ':kode_mahasiswa' => $rid
        ]);
        echo "<SCRIPT type='text/javascript'> 
        alert('Seminar berhasil disimpan, silahkan tunggu konfirmasi approve dari pegawai');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";
    }catch (Exception $exc) {
        die($exc->getMessage());
    }


}

?>
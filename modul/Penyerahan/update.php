<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 29/06/2019
 * Time: 16.35
 */

if($_POST) {
    $rid = $_SESSION['refference_id'];
    $folder = 'upload/laporan/';
    $status = 'Belum diproses';
    $statuss = null;

    $lap_judul = $_POST['lap_judul'] ?? '';
    $lap_abstrak = $_POST['lap_abstrak'] ?? '';
    $lap_keywords = $_POST['lap_keywords'] ?? '';

    //Laporan BAB 1 SD 7
    $lap_file_content = $_FILES['lap_file_content']['name'];
    $lap_file_contentsem = $_FILES['lap_file_content']['tmp_name'];
    $lap_filecon = move_uploaded_file($lap_file_contentsem,$folder.$lap_file_content);
    //Laporan File Full
    $lap_file_full = $_FILES['lap_file_full']['name'];
    $lap_file_fullsem = $_FILES['lap_file_full']['tmp_name'];
    $lapfilefu = move_uploaded_file($lap_file_fullsem,$folder.$lap_file_full);

    $lap_tgl_perusahaan = $_POST['lap_tgl_perusahaan'] ?? '';
    $lap_tgl_perpustakaan = $_POST['lap_tgl_perpustakaan'] ?? '';
    $lap_tgl_jurusan = $_POST['lap_tgl_jurusan'] ?? '';



    $q = 'update kp set lap_judul = :lap_judul, lap_abstrak = :lap_abstrak, lap_keywords = :lap_keywords, lap_file_content = :lap_file_content, 
                        lap_file_full = :lap_file_full, lap_update_at = :lap_update_at,lap_tgl_perusahaan = :lap_tgl_perusahaan, 
                        lap_tgl_perpustakaan = :lap_tgl_perpustakaan, lap_tgl_jurusan = :lap_tgl_jurusan, lap_status = :lap_status,lap_ket = :lap_ket where kode_mahasiswa = :kode_mahasiswa';

    $statement = $connection->prepare($q);
    try {
        $statement->execute([
            ':lap_judul' => $lap_judul,
            ':lap_abstrak' => $lap_abstrak,
            ':lap_keywords' => $lap_keywords,
            ':lap_file_content' => $lap_file_content,
            ':lap_file_full' => $lap_file_full,
            ':lap_update_at' => date('Y-m-d H:i:s'),
            ':lap_tgl_perusahaan' => $lap_tgl_perusahaan,
            ':lap_tgl_perpustakaan' => $lap_tgl_perpustakaan,
            ':lap_tgl_jurusan' => $lap_tgl_jurusan,
            ':lap_status' => $statuss,
            ':lap_ket' => $status,
            ':kode_mahasiswa' => $rid
        ]);
        echo "<SCRIPT type='text/javascript'> 
        alert('Laporan berhasil disimpan, silahkan tunggu konfirmasi approve dari pegawai');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";
    }catch (Exception $exc) {
        die($exc->getMessage());
    }
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 12/06/2019
 * Time: 11.51
 */
if ($_POST) {
    $judul = $_POST['permohonan_judul'] ?? '';
    $periode = $_POST['kode_periode'] ?? '';
    $perusahaan = $_POST['perusahaan'] ?? 0;
    $kets = 'Belum Diproses';

//Ambil Nim Mahasiswa
    $rid = $_SESSION['refference_id'];
    $n = $connection->prepare('select * from mahasiswa where nim = ?');
    $n -> execute(array($rid));
    $hn = $n->fetch();
    $nim = $hn['nim'];

//Buat Kode KP Otomatis
    $kodekp = 'KP-'.$nim.'-1';

    //Penguji Otomatis

    $rand = rand(1,5);
    $d = $connection->prepare('select * from dosen where id = ?');
    $d -> execute(array($rand));
    $dn = $d->fetch();
    $dos = $dn['nip_nik'];

    $q = 'insert into kp (kode, kode_mahasiswa, kode_periode, id_perusahaan_instansi, permohonan_judul, permohonan_update_at, permohonan_status_ket, sem_penguji) 
                values (:kode, :kode_mahasiswa, :kode_periode, :id_perusahaan_instansi, :permohonan_judul, :permohonan_update_at ,:permohonan_status_ket, :sem_penguji)';
    $statement = $connection->prepare($q);
    try {
        $statement->execute([
            ':kode' => $kodekp,
            ':kode_mahasiswa' => $nim,
            ':kode_periode' => $periode,
            ':id_perusahaan_instansi' => $perusahaan,
            ':permohonan_judul' => $judul,
            ':permohonan_update_at' => date('Y-m-d H:i:s'),
            ':permohonan_status_ket' => $kets,
            ':sem_penguji' => $dos
        ]);
    }catch (Exception $exc) {
        die($exc->getMessage());
    }
    echo "<SCRIPT type='text/javascript'> 
        alert('Pengajuan berhasil dilakukan, silahkan tunggu konfirmasi approve dari pegawai');
        location.href = \"index.php?modul=KP\"
    </SCRIPT>";

}


?>
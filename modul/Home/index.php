<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 17/05/2019
 * Time: 23.26
 *
 */
$kode_mahasiswa = $_SESSION['refference_id'];
$info = null;
$kp = $connection ->prepare('select * from kp where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $info = $kp->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}
?>
<head>
    <title>Kerja Praktik</title>
</head>
<div class="jumbotron mt-3">
    <h1>Selamat Datang di</h1>
    <h1 class="display-4">Aplikasi Kerja Praktik UIN SUSKA RIAU</h1>
    <h3>Anda login sebagai <?= $akun['refference']; ?></h3>
</div>



<?php
if($_SESSION['refference'] == 'Mahasiswa'){
    if ($kp->rowCount() == 0) {
            $kp = '<p>Kamu Belum Daftar KP, Silahkan Daftar KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
        } else {
            $cekstatus1 = $info->permohonan_status;
            $cekstatus2 = $info->kelengkapan_surat_status;
            $cekstatus3 = $info->sem_status;
            $cekstatus4 = $info->lap_status;
            $cekstatus5 = $info->is_gagal_kp;
            $status1 = $info->kelengkapan_surat_ket;
            $status2 = $info->sem_diproses_ket;
            $status3 = $info->lap_ket;
            $status4 = $info->gagal_kp_ket;
            $kp = '';

            if ($cekstatus1 == null || $cekstatus1 == 0) {
                $kp = '<p>Kamu dalam tahap Permohonan KP, Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
            }elseif ($cekstatus2 == null || $cekstatus2 == 0) {
                $kp = '<p>Kamu dalam tahap Kelengkapan Surat KP, Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
            }elseif ($cekstatus3 == null || $cekstatus3 == 0) {
                $kp = '<p>Kamu dalam tahap Seminar, Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
            } elseif ($cekstatus4 == null || $cekstatus4 == 0) {
                $kp = '<p>Kamu dalam tahap Laporan KP, Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
            } elseif ($status3 == 'Sudah Diterima') {
                $kp = '<p>Proses KP Hampir Selesai !  Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
                if ($status4 != null) {
                    $kp = '<p>Proses KP Telah Selesai !  Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
                }else {
                    $kp = '<p>Proses KP Hampir Selesai !  Silahkan cek KP <a href="index.php?modul=KP"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
                }
            }

        }
    $kp1 = $kp;
    echo $kp1;
}   elseif ($_SESSION['refference'] == 'Dosen') {
    echo '<p>Silahkan Cek Daftar Mahasiswa Seminar <a href="index.php?modul=DosenSeminar"><button type="button" class="btn btn-outline-info">Disini</button></a></p>';
} else {
    echo '<div class="row align-items-center">
    <div class="col-sm-2">
        <a href="index.php?modul=AdminPengajuan"><button type="button" class="btn btn-outline-info btn-block">Pengajuan KP</button></a>
    </div>
    <div class="col-sm-2">
        <a href="index.php?modul=AdminKelengkapan"><button type="button" class="btn btn-outline-info btn-block">Kelengkapan KP</button></a>
    </div>
    <div class="col-sm-3">
        <a href="index.php?modul=AdminSeminar"><button type="button" class="btn btn-outline-info btn-block">Pengajuan Seminar</button></a>
    </div>
    <div class="col-sm-3">
        <a href="index.php?modul=AdminLaporan"><button type="button" class="btn btn-outline-info btn-block">Pengajuan Laporan</button></a>
    </div>
    <div class="col-sm-2">
        <a href="index.php?modul=AdminKP"><button type="button" class="btn btn-outline-info btn-block">Kelulusan KP</button></a>
    </div>
</div>';
}
?>



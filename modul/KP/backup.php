<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 28/06/2019
 * Time: 20.59
 */
?>

<!--<div class="row mb6 pb-6">
            <ul class="list-group">
                <li class="list-group-item bg-success text-center">
                    Pengajuan Kerja Praktik
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-0 mr-0 text-danger">
                            <i class="oi oi-clipboard display-1"></i>
                        </div>
                        <div class="col-sm-5">
                            <p>asjdhasljdhalaksjdhaksjdhsdfhsdfskduhasldsdkufhsldufhsdkufhsLUFHiluzsdhlizuhluhlduhzfliuahsdlkauhdalskudhalsudhalisudhgailsgdualsudg</p>
                        </div>
                    </div>
                </li>
                <a href="index.php?modul=Pengajuan"><li class="list-group-item text-danger">
                        Edit ->
                    </li>
                </a>

            </ul>
        </div>-->

<?php
$kode_mahasiswa = $_SESSION['refference_id'];
$info = null;
$kp = $connection ->prepare('select * from kp k inner join perusahaan_instansi p on (k.id_perusahaan_instansi = p.id) where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $info = $kp->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}
$status_info_pengajuan = '';
$status_pengajuan = $info->permohonan_status;
if ($status_pengajuan == null) {
    $status_info_pengajuan = 'Belum Diapprove';
    $visibility = 'invisible';
    $disable = 'disabled';
} elseif ($status_pengajuan == 0) {
    $status_info_pengajuan = 'Ditolak';
    $visibility = 'invisible';
    $disable = 'disabled';
} else {
    $status_info_pengajuan = 'Diterima';
}

?>

<html>
<head>
    <title>KP Saya</title>
</head>
<body>
<h4 class="mt-2">Kerja Praktik Saya</h4>
<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-text text-center">Pengajuan Kerja Praktik</h4>
                </div>

                <div class="card-body">
                    <p class="text-center"><i class="oi oi-clipboard display-1 text-danger"></i></p>
                    <h5 class="card-text">INFO</h5>

                    <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                        <tbody>

                        <tr>
                            <th class="text-black-50 w-50">Kode Kerja Praktik</th>
                            <th><?= $info->kode?></th>
                        </tr>
                        <tr>
                            <th class="text-black-50">Kode Mahasiswa</th>
                            <th><?= $info->kode_mahasiswa?></th>
                        </tr>
                        <tr>
                            <th class="text-black-50">Kode Periode</th>
                            <th><?= $info->kode_periode?></th>
                        </tr>
                        <tr>
                            <th class="text-black-50">Perusahaan Instansi</th>
                            <th><?= $info->merek?></th>
                        </tr>
                        <tr>
                            <th class="text-black-50">Permohonan Judul</th>
                            <th><?= $info->permohonan_judul?></th>
                        </tr>
                        <tr>
                            <th class="text-black-50">Status Permohonan</th>
                            <th><?= $status_info_pengajuan?></th>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">

                    <p class="card-text text-center"><a href="index.php?modul=Pengajuan" class="btn btn-block btn-outline-info <?=$disable?>">Input Data &rarr;</a></p>
                    <p class="card-text text-center"><a href="index.php?modul=Pengajuan&action=edit" class="btn btn-block btn-outline-info">Edit Data &rarr;</a></p>
                </div>
            </div>
        </div>
        <?php



        ?>
        <div class="col-lg-6 <?= $visibility?>">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-text text-center"><a  href="index.php?modul=Kelengkapan">Kelengkapan Berkas Kerja Praktik</a></h4>
                </div>
                <div class="card-body">
                    <p class="text-center"><i class="oi oi-document display-1 text-danger"></i></p>
                    <p class="card-text">INFO</p>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text text-center"><a href="index.php?modul=Kelengkapan" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 <?= $visibility?>">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-text text-center"><a href="index.php?modul=Seminar">Seminar Kerja Praktik</a></h4>
                </div>
                <div class="card-body">
                    <p class="text-center"><i class="oi oi-bell display-1 text-danger"></i></p>
                    <p class="card-text">INFO</p>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text text-center"><a href="index.php?modul=Seminar" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 <?= $visibility?>">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-text text-center"><a href="index.php?modul=Penyerahan">Penyerahan Laporan Kerja Praktik</a></h4>
                </div>
                <div class="card-body">
                    <p class="text-center"><i class="oi oi-book display-1 text-danger"></i></p>
                    <p class="card-text">INFO</p>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text text-center"><a href="index.php?modul=Penyerahan" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-text text-center">Pengajuan Kerja Praktik</h4>
            </div>

            <div class="card-body">
                <p class="text-center"><i class="oi oi-clipboard display-1 text-danger"></i></p>
                <h5 class="card-text">INFO</h5>

                <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                    <tbody>

                    <tr>
                        <th class="text-black-50 w-50">Kode Kerja Praktik</th>
                        <th><?= $info->kode?></th>
                    </tr>
                    <tr>
                        <th class="text-black-50">Kode Mahasiswa</th>
                        <th><?= $info->kode_mahasiswa?></th>
                    </tr>
                    <tr>
                        <th class="text-black-50">Kode Periode</th>
                        <th><?= $info->kode_periode?></th>
                    </tr>
                    <tr>
                        <th class="text-black-50">Perusahaan Instansi</th>
                        <th><?= $info->merek?></th>
                    </tr>
                    <tr>
                        <th class="text-black-50">Permohonan Judul</th>
                        <th><?= $info->permohonan_judul?></th>
                    </tr>
                    <tr>
                        <th class="text-black-50">Status Permohonan</th>
                        <th><?= $status_info_pengajuan?></th>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">

                <p class="card-text text-center"><a href="index.php?modul=Pengajuan" class="btn btn-block btn-outline-info <?=$disable?>">Input Data &rarr;</a></p>
                <p class="card-text text-center"><a href="index.php?modul=Pengajuan&action=edit" class="btn btn-block btn-outline-info">Edit Data &rarr;</a></p>
            </div>
        </div>
    </div>
    <?php



    ?>
    <div class="col-lg-6 <?= $visibility?>">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-text text-center"><a  href="index.php?modul=Kelengkapan">Kelengkapan Berkas Kerja Praktik</a></h4>
            </div>
            <div class="card-body">
                <p class="text-center"><i class="oi oi-document display-1 text-danger"></i></p>
                <p class="card-text">INFO</p>
            </div>
            <div class="card-footer text-muted">
                <p class="card-text text-center"><a href="index.php?modul=Kelengkapan" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 <?= $visibility?>">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-text text-center"><a href="index.php?modul=Seminar">Seminar Kerja Praktik</a></h4>
            </div>
            <div class="card-body">
                <p class="text-center"><i class="oi oi-bell display-1 text-danger"></i></p>
                <p class="card-text">INFO</p>
            </div>
            <div class="card-footer text-muted">
                <p class="card-text text-center"><a href="index.php?modul=Seminar" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 <?= $visibility?>">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-text text-center"><a href="index.php?modul=Penyerahan">Penyerahan Laporan Kerja Praktik</a></h4>
            </div>
            <div class="card-body">
                <p class="text-center"><i class="oi oi-book display-1 text-danger"></i></p>
                <p class="card-text">INFO</p>
            </div>
            <div class="card-footer text-muted">
                <p class="card-text text-center"><a href="index.php?modul=Penyerahan" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
            </div>
        </div>
    </div>
</div>

<?php
$kode_mahasiswa = $_SESSION['refference_id'];
$info = null;
$kp = $connection ->prepare('select * from kp k inner join perusahaan_instansi p on (k.id_perusahaan_instansi = p.id) where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $info = $kp->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}


?>

<html>
<head>
    <title>KP Saya</title>
</head>

<body>
<h4 class="mt-2">Kerja Praktik Saya</h4>
<div class="container mt-3">

    <?php
    $kode_mahasiswa = $_SESSION['refference_id'];
    $info1 = null;
    $kp1 = $connection ->prepare('select * from kp where kode_mahasiswa = ?');
    $kp1->execute(array($kode_mahasiswa));
    if ($kp1->rowCount() == 0) {
        echo '<p>Kamu belum daftar kerja praktik, silahkan daftar <a href="index.php?modul=Pengajuan"><button class="btn btn-outline-primary">Disini</button></a></p>';
    } else {

        $cekstatus1 = $info->permohonan_status;
        $cekstatus2 = $info->kelengkapan_surat_status;
        $cekstatus3 = $info->sem_status;
        $cekstatus4 = $info->lap_status;
        $status1 = $info->kelengkapan_surat_ket;
        $status2 = $info->sem_diproses_ket;
        $status3 = $info->lap_ket;
        if ($cekstatus1 == null || $cekstatus1 == 0 ) {
            $disable = '';
            $visibility = 'invisible';
        } else {
            $disable = 'disabled';
            $visibility = 'visible';
        }

        if ($cekstatus2 == null || $cekstatus2 == 0 ) {
            $disable2 = '';
            $visibility2 = 'invisible';
            if($status1 != null) {
                $vinfo = '<h5 class="card-text">INFO</h5>';
            } else {
                $vinfo = '<p class="card-text">Silahkan Lengkapkan Berkas Kerja Praktik <a href="index.php?modul=Kelengkapan"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
            }
        } else {
            $vinfo = '<h5 class="card-text">INFO</h5>';
            $disable2 = 'disabled';
            $visibility2 = 'visible';
        }

        if ($cekstatus3 == null || $cekstatus3 == 0 ) {
            $disable3 = '';
            $visibility3 = 'invisible';
            if($status2 != null) {
                $vinfo2 = '<h5 class="card-text">INFO</h5>';
            } else {
                $vinfo2 = '<p class="card-text">Silahkan Lengkapkan Seminar Kerja Praktik <a href="index.php?modul=Seminar"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
            }
        } else {
            $vinfo2 = '<h5 class="card-text">INFO</h5>';
            $disable3 = 'disabled';
            $visibility3 = 'visible';
        }

        if ($cekstatus4 == null || $cekstatus4 == 0 ) {
            $disable4 = '';
            $visibility4 = 'invisible';
            if($status3 != null) {
                $vinfo3 = '<h5 class="card-text">INFO</h5>';
            } else {
                $vinfo3 = '<p class="card-text">Silahkan Input Data Laporan Kerja Praktik <a href="index.php?modul=Penyerahan"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
            }
        } else {
            $vinfo3 = '<h5 class="card-text">INFO</h5>';
            $disable4 = 'disabled';
            $visibility4 = 'visible';
        }


        echo '<p class="card-text text-center"><a href="index.php?modul=Info" class="btn btn-block btn-outline-info">Info Lengkap Kerja Praktik &rarr;</a></p>
            <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Pengajuan Kerja Praktik</h4>
                    </div>

                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-clipboard display-1 text-danger"></i></p>
                        <h5 class="card-text">INFO</h5>

                            <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>

                                <tr>
                                    <th class="text-black-50 w-50">Kode Kerja Praktik</th>
                                    <th>'.$info->kode.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Periode</th>
                                    <th>'.$info->kode_periode.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Perusahaan Instansi</th>
                                    <th>'.$info->merek.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Permohonan Judul</th>
                                    <th>'.$info->permohonan_judul.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Permohonan</th>
                                    <th>'.$info->permohonan_update_at.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <th>'.$info->permohonan_status_ket.'</th>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Info" class="btn btn-block btn-outline-info">Info Data &rarr;</a></p>
                        <p class="card-text text-center"><a href="index.php?modul=Pengajuan&action=edit" class="btn btn-block btn-outline-info '.$disable.' ">Edit Data &rarr;</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 '.$visibility.'">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Kelengkapan Berkas Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-document display-1 text-danger"></i></p>
                        '.$vinfo.'
                        <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50">Surat Penunjukkan Pembimbing Jurusan</th>
                                </tr>
                                <tr>
                                    <td>'.$info->surat_pembimbing_jur_no.',&nbsp;Tanggal&nbsp;'
            .$info->surat_pembimbing_jur_tgl_surat.',&nbsp;ditandatangi pembimbing &nbsp;'
            .$info->surat_pembimbing_jur_tgl_ttd.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Pengantar KP ke Perusahaan / Instansi</th>                                   
                                </tr>
                                <tr>
                                    <td>'.$info->surat_pengantar_no.',&nbsp;Tanggal&nbsp;'
            .$info->surat_pengantar_tgl_surat.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Balasan dari Perusahaan / Instansi</th>
                                </tr>
                                <tr>
                                    <td>'.$info->surat_perusahaan_no.',&nbsp;Tanggal&nbsp;'
            .$info->surat_perusahaan_tgl_surat.'</td>
                                </tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                </tr>
                                </tr>
                                    <td>'.$info->kelengkapan_surat_ket.'</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Kelengkapan" class="btn btn-block btn-outline-info '.$disable2.'">Edit &rarr;</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 '.$visibility2.'">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Seminar Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-bell display-1 text-danger"></i></p>
                        '.$vinfo2.'
                        <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>

                                <tr>
                                    <th class="text-black-50 w-50">Judul Seminar</th>
                                    <th>'.$info->sem_judul.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal dan Waktu Seminar</th>
                                    <th>'.$info->sem_tgl_waktu.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tempat Seminar</th>
                                    <th>'.$info->sem_tempat.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Foto Seminar</th>
                                    <th>'.$info->permohonan_judul.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Perusahaan</th>
                                    <th>'.$info->sem_nilai_perusahaan.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Seminar</th>
                                    <th>'.$info->sem_nilai_seminar.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Bimbingan</th>
                                    <th>'.$info->sem_nilai_bimbingan.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <th>'.$info->sem_diproses_ket.'</th>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Seminar" class="btn btn-block btn-outline-info '.$disable3.'">Edit &rarr;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 '.$visibility3.'">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Penyerahan Laporan Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-book display-1 text-danger"></i></p>
                        '.$vinfo3.'
                        <table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50 w-50">Judul Laporan</th>
                                    <th>'.$info->lap_judul.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perusahaan</th>
                                    <th>'.$info->lap_tgl_perusahaan.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perpustakaan</th>
                                    <th>'.$info->lap_tgl_perpustakaan.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Jurusan</th>
                                    <th>'.$info->lap_tgl_jurusan.'</th>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <th>'.$info->lap_ket.'</th>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Penyerahan" class="btn btn-block btn-outline-info">Edit &rarr;</a></p>
                    </div>
                </div>
            </div>
            </div>';
    }

    ?>
</div>
</body>
</html>

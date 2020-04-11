<?php
$kode_mahasiswa = $_SESSION['refference_id'];
$info = null;
$kp = $connection ->prepare('select * from ((kp k inner join perusahaan_instansi p on k.id_perusahaan_instansi = p.id) inner join periode pe on k.kode_periode = pe.kode) where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $info = $kp->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}

$infokp = null;
$kp3 = $connection ->prepare('select * from kp where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp3->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $infokp = $kp3->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}




$infoper = null;
$kp1 = $connection ->prepare('select * from kp k inner join pembimbing_perusahaan p on k.id_perusahaan_instansi = p.id where kode_mahasiswa = :kode_mahasiswa ');

try {
    $kp1->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $infoper = $kp1->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}

$infodos = null;
$kp2 = $connection ->prepare('select * from kp k inner join dosen d on k.sem_penguji = d.nip_nik where kode_mahasiswa = :kode_mahasiswa');

try {
    $kp2->execute([
        ':kode_mahasiswa' => $kode_mahasiswa
    ]);
    $infodos = $kp2->fetch(PDO::FETCH_OBJ);
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
            $cekstatus5 = $info->is_gagal_kp;
            $status1 = $info->kelengkapan_surat_ket;
            $status2 = $info->sem_diproses_ket;
            $status3 = $info->lap_ket;
            $status4 = $info->gagal_kp_ket;
            if ($cekstatus1 == null || $cekstatus1 == 0 ) {
                $kelengkapankp = null;
                $disable = '';
            } else {
                if ($cekstatus2 == null || $cekstatus2 == 0 ) {
                    $disable2 = '';
                    if($status1 != null) {
                        $vinfo = '<h5 class="card-text">INFO</h5>';
                        $tablelengkap = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50">Surat Penunjukkan Pembimbing Jurusan</th>
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_pembimbing_jur_no.'</strong>,<br>&nbsp;Tanggal&nbsp;'
                            .$info->surat_pembimbing_jur_tgl_surat.',&nbsp;ditandatangi pembimbing &nbsp;'
                            .$info->surat_pembimbing_jur_tgl_ttd.'<br>File <a href="upload/file/'.$info->surat_pembimbing_jur_file.'">Cek Disini</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Pengantar KP ke Perusahaan / Instansi</th>                                   
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_pengantar_no.'</strong>,&nbsp;Tanggal&nbsp;'
                            .$info->surat_pengantar_tgl_surat.'<br>File <a href="upload/file/'.$info->surat_pengantar_file.'">Cek Disini</a></td></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Balasan dari Perusahaan / Instansi</th>
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_perusahaan_no.'</strong>,&nbsp;Tanggal&nbsp;'
                            .$info->surat_perusahaan_tgl_surat.'<br>File <a href="upload/file/'.$info->surat_perusahaan_file.'">Cek Disini</a></td></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Pembimbing Perusahaan</th>
                                </tr>
                                <tr>
                                    <td>'.$infoper->nama.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                </tr>
                                </tr>
                                    <td>'.$info->kelengkapan_surat_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                        $editlengkap = '<p class="card-text text-center"><a href="index.php?modul=Kelengkapan&action=update_form" class="btn btn-block btn-outline-info '.$disable2.'">Edit &rarr;</a></p>';
                    } else {
                        $vinfo = '<p class="card-text">Silahkan Lengkapkan Berkas Kerja Praktik <a href="index.php?modul=Kelengkapan"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
                        $tablelengkap = '';
                        $editlengkap = '';
                    }
                } else {
                    $tablelengkap = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50">Surat Penunjukkan Pembimbing Jurusan</th>
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_pembimbing_jur_no.'</strong>,<br>&nbsp;Tanggal&nbsp;'
                        .$info->surat_pembimbing_jur_tgl_surat.',&nbsp;ditandatangi pembimbing &nbsp;'
                        .$info->surat_pembimbing_jur_tgl_ttd.'<br>File <a href="upload/file/'.$info->surat_pembimbing_jur_file.'">Cek Disini</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Pengantar KP ke Perusahaan / Instansi</th>                                   
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_pengantar_no.'</strong>,&nbsp;Tanggal&nbsp;'
                        .$info->surat_pengantar_tgl_surat.'<br>File <a href="upload/file/'.$info->surat_pengantar_file.'">Cek Disini</a></td></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Surat Balasan dari Perusahaan / Instansi</th>
                                </tr>
                                <tr>
                                    <td><strong>'.$info->surat_perusahaan_no.'</strong>,&nbsp;Tanggal&nbsp;'
                        .$info->surat_perusahaan_tgl_surat.'<br>File <a href="upload/file/'.$info->surat_perusahaan_file.'">Cek Disini</a></td></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Pembimbing Perusahaan</th>
                                </tr>
                                <tr>
                                    <td>'.$infoper->nama.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                </tr>
                                </tr>
                                    <td>'.$info->kelengkapan_surat_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                    $vinfo = '<h5 class="card-text">INFO</h5>';
                    $disable2 = 'disabled';
                    $visibility2 = 'visible';
                }
                $editlengkap = '<p class="card-text text-center"><a href="index.php?modul=Kelengkapan&action=update_form" class="btn btn-block btn-outline-info '.$disable2.'">Edit &rarr;</a></p>';
                $disable = 'disabled';
                $kelengkapankp = '
                <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Kelengkapan Berkas Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-document display-1 text-danger"></i></p>
                        '.$vinfo.'
                        '.$tablelengkap.'
                    </div>
                    <div class="card-footer text-muted">
                        '.$editlengkap.'
                    </div>
                </div>
            </div>';
            }

            if ($cekstatus2 == null || $cekstatus2 == 0 ) {
                $seminarkp = null;
                $disable2 = '';
            } else {
                if ($cekstatus3 == null || $cekstatus3 == 0 ) {
                    $disable3 = '';
                    $visibility3 = 'invisible';
                    if($status2 != null) {
                        $tableseminar = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50 w-50">Judul Seminar</th>
                                    <td>'.$info->sem_judul.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal dan Waktu Seminar</th>
                                    <td>'.$info->sem_tgl_waktu.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tempat Seminar</th>
                                    <td>'.$info->sem_tempat.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Penguji Seminar</th>
                                    <td>'.$infodos->nama.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Laporan Seminar</th>
                                    <td><a href="upload/file/seminar/'.$info->sem_laporan.'" target="_blank">Cek Laporan Seminar</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Foto Seminar</th>
                                    <td><a href="upload/file/seminar/'.$info->sem_foto_1_file.'" target="_blank">Foto 1</a><br>
                                        <a href="upload/file/seminar/'.$info->sem_foto_2_file.'" target="_blank">Foto 2</a><br>
                                        <a href="upload/file/seminar/'.$info->sem_foto_3_file.'" target="_blank">Foto 3</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Perusahaan</th>
                                    <td>'.$info->sem_nilai_perusahaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Seminar</th>
                                    <td>'.$info->sem_nilai_seminar.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Bimbingan</th>
                                    <td>'.$info->sem_nilai_bimbingan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <td>'.$info->sem_diproses_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                        $vinfo2 = '<h5 class="card-text">INFO</h5>';
                    } else {
                        $vinfo2 = '<p class="card-text">Silahkan Lengkapkan Seminar Kerja Praktik <a href="index.php?modul=Seminar"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
                        $tableseminar = null;
                    }
                } else {
                    $vinfo2 = '<h5 class="card-text">INFO</h5>';
                    $tableseminar = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50 w-50">Judul Seminar</th>
                                    <td>'.$info->sem_judul.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal dan Waktu Seminar</th>
                                    <td>'.$info->sem_tgl_waktu.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tempat Seminar</th>
                                    <td>'.$info->sem_tempat.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Penguji Seminar</th>
                                    <td>'.$infodos->nama.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Laporan Seminar</th>
                                    <td><a href="upload/file/seminar/'.$info->sem_laporan.'" target="_blank">Cek Laporan Seminar</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Foto Seminar</th>
                                    <td><a href="upload/file/seminar/'.$info->sem_foto_1_file.'" target="_blank">Foto Didepan Instansi</a><br>
                                        <a href="upload/file/seminar/'.$info->sem_foto_2_file.'" target="_blank">Foto Pelaksanaan</a><br>
                                        <a href="upload/file/seminar/'.$info->sem_foto_3_file.'" target="_blank">Foto Bimbingan Perusahaan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Perusahaan</th>
                                    <td>'.$info->sem_nilai_perusahaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Seminar</th>
                                    <td>'.$info->sem_nilai_seminar.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Total Nilai Bimbingan</th>
                                    <td>'.$info->sem_nilai_bimbingan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <td>'.$info->sem_diproses_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                    $disable3 = 'disabled';
                    $visibility3 = 'visible';
                }
                $seminarkp = '
                <div class="col-lg-6 card-deck">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Seminar Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-bell display-1 text-danger"></i></p>
                        '.$vinfo2.'
                        '.$tableseminar.'
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Seminar&action=update_form" class="btn btn-block btn-outline-info '.$disable3.'">Edit &rarr;</a></p>
                    </div>
                </div>
                </div>';
                $vinfo = '<h5 class="card-text">INFO</h5>';
                $disable2 = 'disabled';
                $visibility2 = 'visible';
            }

            if ($cekstatus3 == null || $cekstatus3 == 0 ) {
                $laporankp = null;
                $disable3 = '';
            } else {
                if ($cekstatus4 == null || $cekstatus4 == 0 ) {
                    $disable4 = '';
                    if($status3 != null) {
                        $vinfo3 = '<h5 class="card-text">INFO</h5>';
                        $tablelaporan = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50 w-50">Judul Laporan</th>
                                    <td>'.$info->lap_judul.'</td>
                                </tr>
                                
                                <tr>
                                    <th class="text-black-50 w-50">Keywords Laporan</th>
                                    <td>'.$info->lap_keywords.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50 w-50">File Laporan</th>
                                    <td><a href="upload/laporan/'.$info->lap_file_content.'">Laporan BAB 1 - 7</a><br>
                                        <a href="upload/laporan/'.$info->lap_file_full.'">Laporan FULL</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perusahaan</th>
                                    <td>'.$info->lap_tgl_perusahaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perpustakaan</th>
                                    <td>'.$info->lap_tgl_perpustakaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Jurusan</th>
                                    <td>'.$info->lap_tgl_jurusan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <td>'.$info->lap_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                    } else {
                        $vinfo3 = '<p class="card-text">Silahkan Input Data Laporan Kerja Praktik <a href="index.php?modul=Penyerahan"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
                        $tablelaporan = null;
                    }
                } else {
                    $vinfo3 = '<h5 class="card-text">INFO</h5>';
                    $tablelaporan = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
                                <tbody>
                                <tr>
                                    <th class="text-black-50 w-50">Judul Laporan</th>
                                    <td>'.$info->lap_judul.'</td>
                                </tr>
                                
                                <tr>
                                    <th class="text-black-50 w-50">Keywords Laporan</th>
                                    <td>'.$info->lap_keywords.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50 w-50">File Laporan</th>
                                    <td><a href="upload/laporan/'.$info->lap_file_content.'">Laporan BAB 1 - 7</a><br>
                                        <a href="upload/laporan/'.$info->lap_file_full.'">Laporan FULL</a></td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perusahaan</th>
                                    <td>'.$info->lap_tgl_perusahaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Perpustakaan</th>
                                    <td>'.$info->lap_tgl_perpustakaan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Penyerahan Laporan ke Jurusan</th>
                                    <td>'.$info->lap_tgl_jurusan.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <td>'.$info->lap_ket.'</td>
                                </tr>
                                </tbody>
                            </table>';
                    $disable4 = 'disabled';
                    $visibility4 = 'visible';
                }
                $laporankp = '<div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-text text-center">Penyerahan Laporan Kerja Praktik</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><i class="oi oi-book display-1 text-danger"></i></p>
                        '.$vinfo3.'
                        '.$tablelaporan.'
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Penyerahan&action=update_form" class="btn btn-block btn-outline-info '.$disable4.'">Edit &rarr;</a></p>
                    </div>
                </div>
            </div>';
                $vinfo2 = '<h5 class="card-text">INFO</h5>';
                $disable3 = 'disabled';
            }

            if ($cekstatus4 == null || $cekstatus4 == 0 ) {
                $infolengkap = null;
                $disable4 = '';
                $visibility4 = 'invisible';
                if($status3 != null) {
                    $vinfo3 = '<h5 class="card-text">INFO</h5>';
                    $infolengkap = '';
                } else {
                    $vinfo3 = '<p class="card-text">Silahkan Input Data Laporan Kerja Praktik <a href="index.php?modul=Penyerahan"><button type="button" class="btn btn-outline-primary">Disini</button></a></p>';
                }
            } else {
                if($cekstatus5 == 1 && $status4 != null) {
                    $infolengkap = '<div class="alert alert-danger">
                    <strong>KP Telah Gagal</strong>.Silahkan Ulangi KP <a href="index.php?modul=KP&action=delete&id='.$info->kode_mahasiswa.'" class="alert-link" >Disini</a> 
                    </div>
                    <p class="card-text text-center"><a href="index.php?modul=Info" class="btn btn-block btn-outline-info">Info Lengkap Kerja Praktik &rarr;</a></p>';
                } elseif ($cekstatus5 == 0  && $status4 == null) {
                    $infolengkap = '<div class="alert alert-warning">
                    <strong>KP Sedang Proses Persetujuan</strong>. Silahkan tunggu approve dari pegawai untuk keberhasilan/kegagalan KP.
                    </div>
                    <p class="card-text text-center"><a href="index.php?modul=Info" class="btn btn-block btn-outline-info">Info Lengkap Kerja Praktik &rarr;</a></p>';
                } else {
                    $infolengkap = '<div class="alert alert-success">
                    <strong>SELAMAT KP TELAH BERHASIL !</strong>
                    </div>
                    <p class="card-text text-center"><a href="index.php?modul=Info" class="btn btn-block btn-outline-info">Info Lengkap Kerja Praktik &rarr;</a></p>';
                }

                $vinfo3 = '<h5 class="card-text">INFO</h5>';
                $disable4 = 'disabled';
                $visibility4 = 'visible';
            }
            echo $infolengkap.'           
            <div class="row">
                <div class="col-lg-6 card-deck">
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
                                    <td>'.$infokp->kode.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Periode</th>
                                    <td>'.$info->nama.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Perusahaan Instansi</th>
                                    <td>'.$info->merek.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Permohonan Judul</th>
                                    <td>'.$info->permohonan_judul.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Tanggal Permohonan</th>
                                    <td>'.$info->permohonan_update_at.'</td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">Status Permohonan</th>
                                    <td>'.$info->permohonan_status_ket.'</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text text-center"><a href="index.php?modul=Pengajuan&action=edit" class="btn btn-block btn-outline-info '.$disable.' ">Edit &rarr;</a></p>
                    </div>
                </div>
            </div>
            '.$kelengkapankp.'
            </div>
            <div class="row mb-5">
            '.$seminarkp.'               
            '.$laporankp.'
            </div>';
        }
        ?>
        </div>
    </body>
</html>

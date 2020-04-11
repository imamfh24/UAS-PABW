<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 28/06/2019
 * Time: 21.40
 */

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

$data = '<table width="100%" cellspacing="2" class="table table-borderless table-striped col-12">
            <tbody>
            <tr>
                <th class="text-black-50 w-25">Kode Kerja Praktik</th>
                <td>'.$info->kode.'</td>
            </tr>
            <tr>
                <th class="text-black-50">Periode</th>
                <td>'.$info->kode_periode.'</td>
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
                <th class="text-black-50">Surat Penunjukkan Pembimbing Jurusan</th>
                <td>'.$info->surat_pembimbing_jur_no.',&nbsp;Tanggal&nbsp;'
    .$info->surat_pembimbing_jur_tgl_surat.',&nbsp;ditandatangi pembimbing &nbsp;'
    .$info->surat_pembimbing_jur_tgl_ttd.'</td>
            </tr>
            <tr>
                <th class="text-black-50">Surat Pengantar KP ke Perusahaan / Instansi</th>
                <td>'.$info->surat_pengantar_no.',&nbsp;Tanggal&nbsp;'
    .$info->surat_pengantar_tgl_surat.'</td>
            </tr>
            <tr>

            </tr>
            <tr>
                <th class="text-black-50">Surat Balasan dari Perusahaan / Instansi</th>
                <td>'.$info->surat_perusahaan_no.',&nbsp;Tanggal&nbsp;'
    .$info->surat_perusahaan_tgl_surat.'</td>
            </tr>
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
                <th class="text-black-50">Foto Didepan Instansi Perusahaan</th>
                <td><img src="upload/file/seminar/'.$info->sem_foto_1_file.' " width="100%" border="0"/></td>
            </tr>
            
            <tr>
                <th class="text-black-50">Foto Pelaksanaan</th>
                <td><img src="upload/file/seminar/'.$info->sem_foto_2_file.' " width="100%" border="0"/></td>
            </tr>
            
            <tr>
                <th class="text-black-50">Foto Bimbingan Perusahaan</th>
                <td><img src="upload/file/seminar/'.$info->sem_foto_3_file.' " width="100%" border="0"/></td>
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
                <th class="text-black-50 w-50">Judul Laporan</th>
                <td>'.$info->lap_judul.'</td>
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
            </tbody>
        </table>';

?>

<html>
<head>
    <title>Info Lengkap KP</title>
</head>
<body>
    <section class="container mt-3">
        <h2>Info Lengkap Kerja Praktik</h2>
        <hr>
        <?=

        $data;

        ?>
    </section>
</body>
</html>

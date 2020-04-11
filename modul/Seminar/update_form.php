<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 27/06/2019
 * Time: 00.43
 */

$rid = $_SESSION['refference_id'];

$result1 = null;
$ajukan = $connection ->prepare('select * from kp k where kode_mahasiswa = :kode_mahasiswa');
try {
    $ajukan -> execute([
        ':kode_mahasiswa' => $rid
    ]);
    $result1 = $ajukan->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}

?>
    <title>Seminar Kerja Praktik</title>
    <div class="mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?modul=KP">Kerja Praktik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Seminar</li>
            </ol>
        </nav>
    </div>
    <h4 class="mt-2">Seminar Kerja Praktik</h4>
    <hr>
    <form action="" class="mb-5" method="post" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Judul Seminar</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="sem_judul" value="<?=$result1->sem_judul?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="mulai" class="col-sm-2 col-form-label">Tanggal dan Waktu Seminar</label>
            <div class="col-sm-4">
                <input type="datetime-local" class="form-control" name="sem_tgl_waktu" value="<?=$result1->sem_tgl_waktu?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Tempat Seminar</label>
            <div class="col-sm-8">
                <select type="text" class="form-control" name="sem_tempat" required>
                    <option value="FST 301">FST 301</option>
                    <option value="FST 302">FST 302</option>
                    <option value="FST 303">FST 303</option>
                    <option value="FST 304">FST 304</option>
                    <option value="GB TIF A">GB TIF A</option>
                    <option value="GB TIF B">GB TIF B</option>
                    <option value="GB TIF C">GB TIF C</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">File Laporan Seminar</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="sem_laporan" value="<?=$result1->sem_laporan?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Foto di Depan Instansi/Perusahaan</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="sem_foto_1_file" value="<?=$result1->sem_foto_1_file?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Foto Pelaksanaan Kerja Praktik</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="sem_foto_2_file" value="<?=$result1->sem_foto_2_file?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Foto Bimbingan Perusahaan</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="sem_foto_3_file" value="<?=$result1->sem_foto_3_file?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Total Nilai Perusahaan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="sem_nilai_perusahaan" value="<?=$result1->sem_nilai_perusahaan?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Total Nilai Seminar</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="sem_nilai_seminar" value="<?=$result1->sem_nilai_seminar?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ket" class="col-sm-2 col-form-label">Total Nilai Bimbingan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="sem_nilai_bimbingan" value="<?=$result1->sem_nilai_bimbingan?>" required>
            </div>
        </div>

        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
    </form>

<?php

include 'update.php';

?>
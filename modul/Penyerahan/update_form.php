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
<title>Laporan Kerja Praktik</title>
<div class="mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?modul=KP">Kerja Praktik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
        </ol>
    </nav>
</div>
<h4 class="mt-2">Laporan Kerja Praktik</h4>
<hr>
<form action="" class="mb-5" method="post" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Judul Laporan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="lap_judul" value="<?=$result1->lap_judul ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Abstrak</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="lap_abstrak" id="" cols="30" rows="5"><?=$result1->lap_abstrak ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Keyword Laporan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="lap_keywords" value="<?=$result1->lap_keywords ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Laporan BAB 1 sd BAB 7</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="lap_file_content" value="<?=$result1->lap_file_content ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Laporan Lengkap</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="lap_file_full" value="<?=$result1->lap_file_full ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Penyerahan Laporan ke Perusahaan</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="lap_tgl_perusahaan" value="<?=$result1->lap_tgl_perusahaan ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Penyerahan Laporan ke Perpustakaan</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="lap_tgl_perpustakaan" value="<?=$result1->lap_tgl_perpustakaan ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Penyerahan Laporan ke Jurusan</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="lap_tgl_jurusan" value="<?=$result1->lap_tgl_jurusan?>" required>
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

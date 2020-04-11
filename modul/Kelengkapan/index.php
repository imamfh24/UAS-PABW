<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 27/06/2019
 * Time: 00.43
 */

//Ambil Nim Mahasiswa
$rid = $_SESSION['refference_id'];

$result1 = null;
$ajukan = $connection ->prepare('select * from kp k inner join pembimbing_perusahaan p on (k.id_pembimbing_perusahaan = p.id_perusahaan) where kode_mahasiswa = :kode_mahasiswa');
try {
    $ajukan -> execute([
        ':kode_mahasiswa' => $rid,
    ]);
    $result1 = $ajukan->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}

?>
<title>Kelengkapan Berkas Kerja Praktik</title>
<div class="mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?modul=KP">Kerja Praktik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelengkapan Berkas Kerja Praktik</li>
        </ol>
    </nav>
</div>
<h4 class="mt-2">Kelengkapan Berkas Kerja Praktik</h4>
<hr>
<form action="" class="mb-5" method="post" enctype="multipart/form-data">
    <h6>Surat Pembimbing</h6>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Nomor Surat Pembimbing Jurusan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="surat_pembimbing_jur_no" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Surat Pembimbing Jurusan</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="surat_pembimbing_jur_tgl_surat" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Surat ditandatangani oleh pembimbing</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="surat_pembimbing_jur_tgl_ttd" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">File Surat Pembimbing Jurusan</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="surat_pembimbing_jur_file" required>
        </div>
    </div>

    <h6>Surat Pengantar</h6>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Nomor Surat Pengantar</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="surat_pengantar_no" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Surat Pengantar</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="surat_pengantar_tgl_surat" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">File Surat Pengantar</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="surat_pengantar_file" required>
        </div>
    </div>

    <h6>Surat Perusahaan</h6>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Nomor Surat Balasan Perusahaan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="surat_perusahaan_no" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Tanggal Balasan Surat Perusahaan</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="surat_perusahaan_tgl_surat" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">File Surat Perusahaan</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="surat_perusahaan_file" required>
        </div>
    </div>

    <h6>Pembimbing Perusahaan</h6>
    <div class="form-group row">
        <div class="col-sm-10">
            <select class="custom-select" name="perusahaan">
                <option value="" selected>Pilih Pembimbing Perusahaan</option>
                <?php
                $result2 = null;
                $idper = $connection -> prepare('select * from kp where kode_mahasiswa = :kode_mahasiswa');
                try {
                    $idper -> execute([
                        ':kode_mahasiswa' => $rid,
                    ]);
                    $result2 = $idper->fetch(PDO::FETCH_OBJ);
                } catch (Exception $ex) {
                    die($ex ->getMessage());
                }
                $idperusahaan = $result2 -> id_perusahaan_instansi;
                $result = null;
                $usaha = $connection ->prepare('select * from pembimbing_perusahaan where id_perusahaan = :id_perusahaan');

                try {
                    $usaha -> execute([
                        ':id_perusahaan' => $idperusahaan,
                    ]);
                    $result = $usaha->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $ex) {
                    die($ex ->getMessage());
                }
                ?>
                <?php foreach ($result as $r):?>
                    <option value="<?=$r->id?>"><?=$r->nama?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </div>
</form>

<?php

include 'update.php'

?>

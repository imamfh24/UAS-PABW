<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/06/2019
 * Time: 13.28
 */

//Ambil Nim Mahasiswa
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
<head>
    <title>Edit Pengajuan Kerja Praktik</title>

</head>
<div class="mt-2">
    <nav aria-label="breadcrumb" id="null">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?modul=KP">Kerja Praktik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengajuan Kerja Praktik</li>
        </ol>
    </nav>
</div>
<h4 class="mt-2">Pengajuan Kerja Praktik (Edit)</h4>
<hr>
<form action="" class="mb-5" method="post">
    <h6>Judul/Topik Kajian Kerja Praktik</h6>
    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="permohonan_judul" value="<?=$result1->permohonan_judul?>" required>
        </div>
    </div>
    <h6>Periode</h6>
    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Nama Periode</label>
        <div class="col-sm-4">
            <select class="custom-select" name="kode_periode">
                <option value="" selected>Pilih Periode</option>
                <?php
                $result = null;
                $usaha = $connection ->prepare('select * from periode');
                $usaha -> execute();
                $result = $usaha->fetchAll(PDO::FETCH_OBJ);?>

                <?php foreach ($result as $r):?>

                    <option value="<?=$r->kode?>"><?=$r->nama?></option>

                <?php endforeach;?>
            </select>
        </div>
    </div>
    <h6>Perusahaan/Instansi</h6>
    <div class="form-group row">
        <div class="col-sm-10">
            <select class="custom-select" name="perusahaan">
                <option value="">Pilih Perusahaan/Instansi</option>

                <?php
                $result = null;
                $usaha = $connection ->prepare('select * from perusahaan_instansi');
                $usaha -> execute();
                $result = $usaha->fetchAll(PDO::FETCH_OBJ);?>

                <?php foreach ($result as $r):?>

                    <option value="<?=$r->id?>" <?=isset($result1->id_perusahaan_instansi) ?? 'selected' ?>><?=$r->merek?></option>

                <?php endforeach;?>

            </select>
           <!-- <p><a href="index.php?modul=Pengajuan&action=perusahaan">Edit Perusahaan Instansi </a></p>-->
        </div>
    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Ajukan</button>
    </div>
</form>

<?php

include 'edit_insert.php';

?>

<!--<script type="text/javascript">
    function simpan() {
        alert("KP telah diajukan, silahkan tunggu konfirmasi dari pegawai");
        location.href = "index.php?modul=KP"
    }
</script>-->

<!--<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Periode</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
    </div>

    <div class="form-group row">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="kode" name="kode">
        </div>
    </div>

-->
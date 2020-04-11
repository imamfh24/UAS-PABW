<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 26/06/2019
 * Time: 21.33
 */?>

<h4 class="mt-2">Tambah Instansi Perusahaan</h4>
<hr>
<form action="index.php?modul=Pengajuan&action=insert" class="mb-5" method="post">
    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Badan Hukum</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="badan_hukum" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Merek</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="merek" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="alamat" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Badan Hukum</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="permohonan_judul" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="ket" class="col-sm-2 col-form-label">Kabupaten Kota</label>
        <div class="col-sm-8">
            <select class="custom-select">
                <option value="" selected>Pilih Asal Kabupaten/Kota</option>

                <?php
                $resultkota = null;
                $kota = $connection ->prepare('select * from kab_kota');
                $kota -> execute();
                $resultkota = $kota->fetchAll(PDO::FETCH_OBJ);?>

                <?php foreach ($resultkota as $k):?>

                    <option value="<?=$k->id?>"><?=$k->kab_kota?></option>

                <?php endforeach;?>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="mulai" class="col-sm-2 col-form-label">Profil Perusahaan</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="profil" id="" cols="30" rows="5"></textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
    </div>
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 27/06/2019
 * Time: 10.26
 */
$status = null;
$permohonan = $connection->prepare('select * from kp k inner join mahasiswa m on (k.kode_mahasiswa = m.nim) where permohonan_status = 1 and kelengkapan_surat_status = 1 and sem_status = 1 and lap_status IS NULL ');
$permohonan -> execute();
$status = $permohonan->fetchAll(PDO::FETCH_OBJ);

?>

<title>Persetujuan Pengajuan</title>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Nama Mahasiswa</th>
        <th>NIM</th>
        <th>Pengajuan</th>
        <th>Konfirmasi</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php foreach ($status as $s):?>
        <td><?=$s->nama ?></td>
        <td><?=$s->kode_mahasiswa ?></td>
        <td>Laporan KP</td>
        <td>
            <a href="index.php?modul=AdminLaporan&action=acc&id=<?=$s->kode_mahasiswa?>"><button type="button" class="btn btn-primary">Terima</button></a>&nbsp;|&nbsp;
            <a href="index.php?modul=AdminLaporan&action=ref&id=<?=$s->kode_mahasiswa?>"><button type="button" class="btn btn-danger">Tolak</button></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

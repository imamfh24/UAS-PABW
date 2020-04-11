<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 23.04
 */

$rid = $_SESSION['refference_id'];

?>

<head>
    <title>Seminar Saya</title>
</head>
<body>
<h2 class="mt-3 mb-3">SEMINAR SAYA</h2>
<table class="table table-striped" width="50%">
    <thead>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Judul Seminar</th>
        <th>Tempat Seminar</th>
        <th>Tanggal dan Waktu Seminar</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $result = null;
    $usaha = $connection ->prepare('select * from kp k inner join mahasiswa m on (k.kode_mahasiswa = m.nim) where sem_penguji = :sem_penguji');
    try {
        $usaha -> execute([
            ':sem_penguji' => $rid
        ]);
    $result = $usaha->fetchAll(PDO::FETCH_OBJ);
    }catch (Exception $exc) {
        die($exc->getMessage());
    }
    ?>

    <?php foreach ($result as $r):?>
        <tr>
            <td><?=$r->nama?></td>
            <td><?=$r->kode_mahasiswa?></td>
            <td><?=$r->sem_judul?></td>
            <td><?=$r->sem_tempat?></td>
            <td><?=$r->sem_tgl_waktu?></td>
        </tr>
    <?php endforeach;?>

    </tbody>
</table>
</body>

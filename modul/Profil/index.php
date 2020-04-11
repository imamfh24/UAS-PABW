<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 22.41
 */

$refference_id = $_SESSION['refference_id'];
$refference = $_SESSION['refference'];
$info = null;
$kp = $connection ->prepare('select * from account a where refference_id = :refference_id ');

try {
    $kp->execute([
        ':refference_id' => $refference_id
    ]);
    $info = $kp->fetch(PDO::FETCH_OBJ);
} catch (Exception $ex) {
    die($ex ->getMessage());
}

?>

<head>
    <title>
        Profil
    </title>
</head>
<body>
<h2 class="mt-3 mb-3">PROFIL</h2>
    <table class="table table-striped" width="50%">
        <tbody>
        <?php

        if ($_SESSION['refference'] == 'Mahasiswa') {
            $q = $connection->prepare("select * from mahasiswa where nim = ?");
            $q->execute(array($_SESSION['refference_id']));
            $mhs = $q->fetch();
            echo '<tr>
                <th>Nama</th>
                <td>'.$mhs['nama'].'</td>
            </tr>
            <tr>
            <th>Nim</th>
            <td>'.$info->refference_id.'</td>
        </tr>
        <tr>
        <th>Status</th>
        <td>'.$info->refference.'</td>
</tr>';
        } elseif ($_SESSION['refference'] == 'Dosen') {
            $q = $connection->prepare("select * from dosen where nip_nik = ?");
            $q->execute(array($_SESSION['refference_id']));
            $dos = $q->fetch();
            echo '<tr>
                <th>Nama</th>
                <td>'.$dos['nama'].'</td>
            </tr>
            <tr>
            <th>NIP/NIK</th>
            <td>'.$info->refference_id.'</td>
        </tr>
        <tr>
        <th>Status</th>
        <td>'.$info->refference.'</td>
        </tr>';
        }
        ?>
        </tbody>
    </table>
    <p><a href="index.php?modul=Profil&action=changepass"><button type="button" class="btn btn-outline-info btn-block">Ganti Password ?</button></a></p>
</body>

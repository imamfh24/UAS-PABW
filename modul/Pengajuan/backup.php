<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 15.10
 */

$a = substr($nama,2,2);
$b = substr($nama,7,2);

if (substr($nama,10,6) == 'Ganjil'){
    $c = 'GL';
} else {
    $c = 'GN';
}

$kodeperiode = $a.$b.'-'.$c.'-1';

$periode = 'insert into periode(kode, nama, mulai, akhir, keterangan, create_by) values (:kodeperiode, :nama, :mulai, :akhir, :keterangan, :create_by)';
$statement = $connection ->prepare($periode);
try {
    $statement->execute([
        ':kodeperiode' => $kodeperiode,
        ':nama' => $nama,
        ':mulai' => $mulai,
        ':akhir' => $akhir,
        ':keterangan' => $ket,
        ':create_by' => $rid
    ]);
}catch (Exception $exc) {
    die($exc->getMessage());
}
?>
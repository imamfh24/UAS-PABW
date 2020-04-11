<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 02/07/2019
 * Time: 11.45
 */ ?>

<head>
    <title>Perusahaan/Instansi</title>
</head>
<body>
    <h3 class="mt-3 mb-3">List Perusahaan/Instansi</h3>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped" width="100%">
                <thead>
                <tr>
                    <th>Nama Instansi/Perusahaan</th>
                    <th>Merek</th>
                    <th>Alamat</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $result = null;
                $usaha = $connection ->prepare('select * from perusahaan_instansi');
                $usaha -> execute();
                $result = $usaha->fetchAll(PDO::FETCH_OBJ);?>

                <?php foreach ($result as $r):?>
                    <tr>
                    <td><?=$r->badan_hukum?></td>
                    <td><?=$r->merek?></td>
                    <td><?=$r->alamat?></td>
                    </tr>
                <?php endforeach;?>

                </tbody>

            </table>
        </div>
    </div>
</body>

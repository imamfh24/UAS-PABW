<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 03/07/2019
 * Time: 03.15
 */?>

<head>
    <title>Ganti Password</title>
</head>
<body>
    <header class="mb-3 mt-3">
        <h2>Ganti Password</h2>
    </header>
    <div class="container">
        <form action="" method="post">
            <div class="form-group row">
                <label for="ket" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="old_pass" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="ket" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="new_pass" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="ket" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="new_pass_con" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-info btn-block">Ganti Password</button>
            </div>

        </form>
    </div>
</body>

<?php

include "gantipass.php";

?>
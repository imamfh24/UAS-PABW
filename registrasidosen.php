<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 30/05/2019
 * Time: 05.44
 */?>
<html>
    <head>
        <title>Registrasi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.4.0.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px; width: 800px">
                <p class="text-center"><img src="Media/Gambar/logo%20baru%20uin%20suska%20riau.jpg" alt="sehatkuy" width="100" height="100"></p>
                <h4 class="card-title mt-3 text-center">Buat Akun kamu disini</h4>
                <?php

                include 'cekregistrasidosen.php';

                ?>
                <form action="" method="post">

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="oi oi-flag"></i></span>
                        </div>
                        <input name="username" class="form-control" placeholder="NIP/NIK" type="text" value="<?=isset($_POST['username']) ? $_POST['username']:'' ?>" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="oi oi-person"></i></span>
                        </div>
                        <input name="nama" class="form-control" placeholder="Nama Lengkap" type="text"value="<?=isset($_POST['nama']) ? $_POST['nama']:'' ?>"  required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="oi oi-envelope-closed"></i></span>
                        </div>
                        <input name="email" class="form-control" placeholder="Alamat Email" type="email" value="<?=isset($_POST['email']) ? $_POST['email']:'' ?>" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="oi oi-lock-locked"></i> &nbsp;</span>
                        </div>
                        <input  name="password" class="form-control" placeholder="Password" type="password" value="<?=isset($_POST['password']) ? $_POST['password']:'' ?>" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="oi oi-lock-locked"></i> &nbsp;</span>
                        </div>
                        <input  name="kpassword" class="form-control" placeholder="Ulangi Password" type="password" value="<?=isset($_POST['kpassword']) ? $_POST['kpassword']:'' ?>" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                    </div> <!-- form-group// -->
                </form>
                <p class="text-center">Sudah punya akun ? <a href="index.php?modul=Home" >Log In</a></p>
            </article>

        </div>
    </div>
    </body>
</html>


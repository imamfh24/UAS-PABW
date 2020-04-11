<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 30/05/2019
 * Time: 05.33
 */
?>

<!DOCTYPE html>
<html class="h-100">
<head>
    <title>Portal KP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="Media/Gambar/uinsuskariau.png">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="h-100 align-items-center bg-info">
<div class="container">
    <h1 style="text-align: center">SELAMAT DATANG DI PORTAL KP</h1>
    <div class="row">
        <div class="col-sm-6 col-md-6 mx-auto p-4 " style="background: rgba(255,255,255,0.5); border-radius: 5px">
            <p class="text-center"><img src="Media/Gambar/uinsuska.png" alt="sehatkuy" width="150" height="150"></p>
            <h5 class="text-center pb-3 mb-3 border-bottom">Login Kerja Praktek</h5>
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark active" data-toggle="tab" href="#home">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#menu1">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#menu2">Pegawai</a>
                </li>
            </ul>
            <br>
            <?php

            include 'ceklogin.php'

            ?>
            <div class="tab-content">
                <div class="tab-pane active container " id="home">
                    <form action="" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="username" class="form-control" placeholder="NIM" type="text" value="<?=isset($_POST['username']) ? $_POST['username']:'' ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-lock-locked"></i>&nbsp;</span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password" type="password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>
                    <br>
                    <p class="text-center">Belum punya akun ? <a href="registrasi.php">Daftar Disini</a></p>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    <form action="" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="username" class="form-control" placeholder="NIP/NIK" type="text" value="<?=isset($_POST['username']) ? $_POST['username']:'' ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="oi oi-lock-locked"></i>&nbsp;</span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" name="password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>
                    <br>
                    <p class="text-center">Belum punya akun ? <a href="registrasidosen.php">Daftar Disini</a></p>
                </div>
                <div class="tab-pane container fade" id="menu2">
                    <form action="" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="username" class="form-control" placeholder="NIP/NIK" type="text" value="<?=isset($_POST['username']) ? $_POST['username']:'' ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-lock-locked"></i>&nbsp;</span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password" type="password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>
                    <br>
                    <p class="text-center">Belum punya akun ? <a href="registrasipegawai.php">Daftar Disini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-3 bg-transparent">
    <div class="container">
        <p class="m-0 text-center text-dark" style="font-weight: bolder">Copyright &copy; 2019 Imam Faried Helmi</p>
    </div>
    <!-- /.container -->
</footer>
</body>

<!--<div class="container">
    <div class="card bg-success">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <p class="text-center"><img src="../Media/Gambar/Icon/icon-3.png" alt="sehatkuy" width="100" height="100"></p>
            <h4 class="card-title mt-3 text-center">Assalammualaikum</h4>
            <p class="text-center">Silahkan Login Akun kamu disini</p>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Pegawai</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane active container" id="home">
                    <form action="index.php?modul=Home&action=login" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="name" class="form-control" placeholder="NIM" type="text" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="oi oi-lock-locked"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </form>
                    <p>Belum punya akun kerja praktik ? <a href="index.php?modul=Registrasi">Daftar Disini</a></p>
                </div>
                <div class="tab-pane container" id="menu1">
                    <form action="index.php?modul=Home&action=login" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="name" class="form-control" placeholder="NIM" type="text" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="oi oi-lock-locked"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                    <p>Belum punya akun ? <a href="index.php?modul=Registrasi">Daftar Disini</a></p>
                </div>
                <div class="tab-pane container" id="menu2">
                    <form action="index.php?modul=Home&action=login" method="post">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="oi oi-person"></i></span>
                            </div>
                            <input name="name" class="form-control" placeholder="NIM" type="text" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="oi oi-lock-locked"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </article>
    </div>
</div>
-->
</html>

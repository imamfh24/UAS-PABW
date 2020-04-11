<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 17/05/2019
 * Time: 22.40
 */
date_default_timezone_set('Asia/Jakarta');
$q = $connection->prepare("select * from account where username = ?");
$q->execute(array($username));
$akun = $q->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="Media/Gambar/uinsuskariau.png">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: consolas;
        }

        h1 {
            font-size: 28px;
        }

        h2 {
            font-size: 26px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 22px;
        }

        h5 {
            font-size: 20px;
        }

        h6 {
            font-size: 18px;
            font-weight: bolder;
        }

        p {
            font-size: 16px;
        }

        nav ul {
            list-style:none;
            margin:0px 0px;
            padding:0px 0px;
            background:#222;
            -webkit-box-shadow:0px 1px 2px #000;
            -moz-box-shadow:0px 1px 2px #000;
            box-shadow:0px 1px 2px #000;
            overflow:auto;
        }

        nav li {
            display: block;
            float:left;
        }

        nav li a {
            display:block;
            text-decoration:none;

            text-shadow:0px 1px 1px rgba(0,0,0,0.8);
        }

        nav li a:hover  {
            display: block;
            background:#000000;
            text-decoration:none;
        }
        nav li a.active {background:#17a2b8;
            color:#ffe8a1;}


    </style>
    <script type="text/javascript">
        $(function() {
            // Mengambil data URL pada Address bar
            var path = window.location.href;
            $('nav a').each(function() {
                // Jika URL pada menu ini sama persis dengan path...
                if (this.href === path) {
                    // Tambahkan kelas "active" pada menu ini
                    $(this).addClass('active');
                }
            });
        });
    </script>
</head>
<body class="h-100">
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand" href="#">Kerja Praktik</a>




    <nav class="collapse navbar-collapse" id="sidebar">
        <ul class="navbar-nav d-sm-none">
            <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
            </li>
        </ul>
    </nav>
    <button class="btn btn-danger" data-toggle="modal" data-target="#logout" type="button"><i class="oi oi-power-standby"></i></button>


</nav>
<div class="container-fluid h-100">
    <div class="row">

        <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block collapse" id="demo">
            <ul class="list-group list-group-flush bg-dark">
                <?php
                if($_SESSION['refference'] == 'Mahasiswa'){
                    $q = $connection->prepare("select * from mahasiswa where nim = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $mhs = $q->fetch();
                    echo "
                        <li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$mhs['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                        <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Home\" class=\"nav-link text-white\"><i class=\"oi oi-home\"></i> Home</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Profil\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"index.php?modul=PerusahaanInstansi\">Perusahaan/Instansi</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-briefcase\"></i> KP Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Help\" class=\"nav-link text-white\"><i class=\"oi oi-question-mark\"></i> Panduan</a>
                    </li>";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                          <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Home\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> Home</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Profil\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=DosenSeminar\" class=\"nav-link text-white\"><i class=\"oi oi-briefcase\"></i> Seminar Saya</a>
                    </li>";
                } else {
                    echo "<li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=AdminPengajuan\" class=\"nav-link text-white\"> Pengajuan KP</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=AdminKelengkapan\" class=\"nav-link text-white\">Kelengkapan KP</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=AdminSeminar\" class=\"nav-link text-white\">Seminar KP</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=AdminLaporan\" class=\"nav-link text-white\">Laporan KP</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=AdminKP\" class=\"nav-link text-white\">Kelulusan KP</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>
        <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-3">
            <section>
                <?php

                include 'modul/'.$modul.'/'.$action.'.php';

                ?>
            </section>
        </div>
    </div>
</div>

<!--<nav class="navbar navbar-expand-sm bg-danger navbar-dark justify-content-center">
    <ul class="navbar-nav" style="font-size: 20px; ">
        <li class="nav-item"><a class="nav-link" href="index.php?modul=Home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="">Tabel</a></li>
        <li class="nav-item"><a class="nav-link" href="">Source Code</a></li>
    </ul>
</nav> -->
<div class="modal fade" id="logout">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Logout</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p style="text-align: center; font-size: 24px; font-weight: bold">Apakah kamu yakin ingin keluar ?</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a href="logout.php"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>


</body>
</html>

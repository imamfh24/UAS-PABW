<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 23/06/2019
 * Time: 19.17
 */?>

<h1>Kamu Berhasil Login</h1>
<p>Nama = <?= $akun['username']; ?></p>
<p>Nim = <?= $akun['refference_id'] ?></p>
<p>Status = <?= $akun['refference']; ?></p>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wifth = device-wudht, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body class="h-100">
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
    <a class="navbar-brand" href="#">Kerja Praktik</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>



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
        <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block">
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
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"#\">Link 1</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 2</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 3</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Pengajuan\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> KP Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> abc</a>
                    </li>
                    ";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                            <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> KP</a>
                    </li>";
                } else {
                    echo "<li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
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
                <a href="index.php?modul=Dashboard&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wifth = device-wudht, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body class="h-100">
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">

    <a class="navbar-brand" href="#">Kerja Praktik</a>
    <button class="btn btn-success" data-toggle="collapse" data-target="#demo" type="button"><i class="oi oi-power-standby"></i></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>



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
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"#\">Link 1</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 2</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 3</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> KP Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> abc</a>
                    </li>
                    ";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                            <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> KP</a>
                    </li>";
                } else {
                    echo "<li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wifth = device-wudht, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <style>
        #body-row {
            margin-left:0;
            margin-right:0;
        }
        #sidebar-container {
            min-height: 100vh;
            background-color: #333;
            padding: 0;
        }

        /* Sidebar sizes when expanded and expanded */
        .sidebar-expanded {
            width: 230px;
        }
        .sidebar-collapsed {
            width: 60px;
        }

        /* Menu item*/
        #sidebar-container .list-group a {
            height: 50px;
            color: white;
        }

        /* Submenu item*/
        #sidebar-container .list-group .sidebar-submenu a {
            height: 45px;
            padding-left: 30px;
        }
        .sidebar-submenu {
            font-size: 0.9rem;
        }

        /* Separators */
        .sidebar-separator-title {
            background-color: #333;
            height: 35px;
        }
        .sidebar-separator {
            background-color: #333;
            height: 25px;
        }
        .logo-separator {
            background-color: #333;
            height: 60px;
        }

        /* Closed submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
            content: " \f0d7";
            font-family: FontAwesome;
            display: inline;
            text-align: right;
            padding-left: 10px;
        }
        /* Opened submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
            content: " \f0da";
            font-family: FontAwesome;
            display: inline;
            text-align: right;
            padding-left: 10px;
        }
    </style>

</head>
<body class="h-100">
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">

    <a class="navbar-brand" href="#">Kerja Praktik</a>
    <button class="btn btn-success" data-toggle="collapse" data-target="#demo" type="button"><i class="oi oi-power-standby"></i></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>



    <nav class="collapse navbar-collapse" id="sidebar">
        <ul class="navbar-nav d-sm-none">
            <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
            </li>
        </ul>
    </nav>
    <button class="btn btn-danger" data-toggle="modal" data-target="#logout" type="button"><i class="oi oi-power-standby"></i></button>


</nav>
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <?php
        if($_SESSION['refference'] == 'Mahasiswa') {
            $q = $connection->prepare("select * from mahasiswa where nim = ?");
            $q->execute(array($_SESSION['refference_id']));
            $mhs = $q->fetch();
            echo "<ul class=\"list-group\">
            <li class=\"list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed\"></li>
            <a href=\"index.php?modul=Home\" class=\"bg-dark list-group-item list-group-item-action\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"oi oi-dashboard mr-3\"></span>
                    <span class=\"menu-collapsed\">Dashboard</span>
                </div>
            </a>
            <a href=\"#submenu2\" data-toggle=\"collapse\" aria-expanded=\"false\" class=\"bg-dark list-group-item list-group-item-action flex-column align-items-start\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"fa fa-user fa-fw mr-3\"></span>
                    <span class=\"menu-collapsed\">Profile</span>
                    <span class=\"submenu-icon ml-auto\"></span>
                </div>
            </a>
            <div id='submenu2' class=\"collapse sidebar-submenu\">
                <a href=\"#\" class=\"list-group-item list-group-item-action bg-dark text-white\">
                    <span class=\"menu-collapsed\">Settings</span>
                </a>
                <a href=\"#\" class=\"list-group-item list-group-item-action bg-dark text-white\">
                    <span class=\"menu-collapsed\">Password</span>
                </a>
            </div>
            <a href=\"index.php?modul=KP\" class=\"bg-dark list-group-item list-group-item-action\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"fa fa-tasks fa-fw mr-3\"></span>
                    <span class=\"menu-collapsed\">Tasks</span>
                </div>
            </a>    
            <a href=\"#\" data-toggle=\"sidebar-colapse\" class=\"bg-dark list-group-item list-group-item-action d-flex align-items-center\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span id=\"collapse-icon\" class=\"fa fa-2x mr-3\"></span>
                    <span id=\"collapse-text\" class=\"menu-collapsed\">Collapse</span>
                </div>
            </a>
            <li class=\"list-group-item logo-separator d-flex justify-content-center\">
                <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width=\"30\" height=\"30\" />
            </li>
        </ul>";
        } elseif ($_SESSION['refference'] == 'Dosen') {
            $q = $connection->prepare("select * from dosen where nip_nik = ?");
            $q->execute(array($_SESSION['refference_id']));
            $dos = $q->fetch();
            echo "<ul class=\"list-group\">
            <li class=\"list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed\"></li>
            <a href=\"index.php?modul=Home\" class=\"bg-dark list-group-item list-group-item-action\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"oi oi-dashboard mr-3\"></span>
                    <span class=\"menu-collapsed\">Dashboard</span>
                </div>
            </a>
            <a href=\"#submenu2\" data-toggle=\"collapse\" aria-expanded=\"false\" class=\"bg-dark list-group-item list-group-item-action flex-column align-items-start\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"fa fa-user fa-fw mr-3\"></span>
                    <span class=\"menu-collapsed\">Profile</span>
                    <span class=\"submenu-icon ml-auto\"></span>
                </div>
            </a>
            <div id='submenu2' class=\"collapse sidebar-submenu\">
                <a href=\"#\" class=\"list-group-item list-group-item-action bg-dark text-white\">
                    <span class=\"menu-collapsed\">Settings</span>
                </a>
                <a href=\"#\" class=\"list-group-item list-group-item-action bg-dark text-white\">
                    <span class=\"menu-collapsed\">Password</span>
                </a>
            </div>
            <a href=\"index.php?modul=KP\" class=\"bg-dark list-group-item list-group-item-action\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span class=\"fa fa-tasks fa-fw mr-3\"></span>
                    <span class=\"menu-collapsed\">Tasks</span>
                </div>
            </a>    
            <a href=\"#\" data-toggle=\"sidebar-colapse\" class=\"bg-dark list-group-item list-group-item-action d-flex align-items-center\">
                <div class=\"d-flex w-100 justify-content-start align-items-center\">
                    <span id=\"collapse-icon\" class=\"fa fa-2x mr-3\"></span>
                    <span id=\"collapse-text\" class=\"menu-collapsed\">Collapse</span>
                </div>
            </a>
            <li class=\"list-group-item logo-separator d-flex justify-content-center\">
                <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width=\"30\" height=\"30\" />
            </li>
        </ul>";
        }

        ?>
        <ul class="list-group">

            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed"></li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="index.php?modul=Home" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="oi oi-dashboard mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                </div>
            </a>
            <!--<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="oi oi-dashboard mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a> -->
            <!-- Submenu content -->
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Settings</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Password</span>
                </a>
            </div>
            <a href="index.php?modul=KP" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed">Tasks</span>
                </div>
            </a>
            <!-- Separator with title
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">Calendar</span>
                </div>
            </a>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-envelope-o fa-fw mr-3"></span>
                    <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
                </div>
            </a>
            <!-- Separator without title
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->

            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width="30" height="30" />
            </li>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col">
        <section>
            <?php

            include 'modul/'.$modul.'/'.$action.'.php';

            ?>
        </section>
    </div><!-- Main Col END -->

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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
<script>
    // Hide submenus
    $('#body-row .collapse').collapse('hide');

    // Collapse/Expand icon
    $('#collapse-icon').addClass('fa-angle-double-left');

    // Collapse click
    $('[data-toggle=sidebar-colapse]').click(function() {
        SidebarCollapse();
    });

    function SidebarCollapse () {
        $('.menu-collapsed').toggleClass('d-none');
        $('.sidebar-submenu').toggleClass('d-none');
        $('.submenu-icon').toggleClass('d-none');
        $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

        // Treating d-flex/d-none on separators with title
        var SeparatorTitle = $('.sidebar-separator-title');
        if ( SeparatorTitle.hasClass('d-flex') ) {
            SeparatorTitle.removeClass('d-flex');
        } else {
            SeparatorTitle.addClass('d-flex');
        }

        // Collapse/Expand icon
        $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
    }
</script>
</body>
</html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wifth = device-wudht, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/open-iconic-master/font/css/open-iconic-bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
    <button class="btn btn-success" data-toggle="collapse" data-target="#demo" type="button"><i class="oi oi-power-standby"></i></button>

</nav>
<div class="container-fluid h-100">
    <div class="row">
        <div class="collapse" id="demo">
            <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block show">
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
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"#\">Link 1</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 2</a>
                            <a class=\"dropdown-item\" href=\"#\">Link 3</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> KP Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> abc</a>
                    </li>
                    ";
                    } elseif ($_SESSION['refference'] == 'Dosen') {
                        $q = $connection->prepare("select * from dosen where nip_nik = ?");
                        $q->execute(array($_SESSION['refference_id']));
                        $dos = $q->fetch();
                        echo "<li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                            <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-dashboard\"></i> KP</a>
                    </li>";
                    } else {
                        echo "<li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>

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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

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
            font-family: Helvetica;
        }
        h6 {
            font-weight: bolder;
        }
    </style>
</head>

<body class="h-100">

<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand" href="#">Kerja Praktik</a>


    <nav class="collapse navbar-collapse" id="sidebar">
        <ul class="navbar-nav d-sm-none">
            <li class="nav-item">
                <?php
                if($_SESSION['refference'] == 'Mahasiswa') {
                    echo '<a href="index.php?modul=Home" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
                <a href="index.php?modul=Profil" class="nav-link text-white"><i class="oi oi-person"></i>Profil</a>
                <a href="index.php?modul=KP" class="nav-link text-white"><i class="oi oi-briefcase"></i>KP Saya</a>
                <a href="index.php?modul=PerusahaanInstansi" class="nav-link text-white"><i class="oi oi-monitor"></i>Perusahaan Instansi</a>
                <a href="index.php?modul=Help" class="nav-link text-white"><i class="oi oi-question-mark"></i>Help</a>';
                }elseif ($_SESSION['refference'] == 'Dosen') {
                    echo '<a href="index.php?modul=Home" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
                <a href="index.php?modul=Profil" class="nav-link text-white"><i class="oi oi-person"></i>Profil</a>
                <a href="index.php?modul=DosenSeminar" class="nav-link text-white"><i class="oi oi-briefcase"></i>Seminar Saya</a>
                <a href="index.php?modul=PerusahaanInstansi" class="nav-link text-white"><i class="oi oi-monitor"></i>Perusahaan Instansi</a>
                <a href="index.php?modul=Help" class="nav-link text-white"><i class="oi oi-question-mark"></i>Help</a>';
                }else
                    echo '<a href="index.php?modul=Home" class="nav-link text-white"><i class="oi oi-dashboard"></i>Dashboard</a>
                <a href="index.php?modul=AdminKP" class="nav-link text-white"><i class="oi oi-briefcase"></i>Persetujuan KP</a>
                <a href="index.php?modul=PerusahaanInstansi" class="nav-link text-white"><i class="oi oi-monitor"></i>Perusahaan Instansi</a>';
                ?>
            </li>
        </ul>
    </nav>
    <button class="btn btn-danger" data-toggle="modal" data-target="#logout" type="button"><i class="oi oi-power-standby"></i></button>

</nav>

<div class="container-fluid h-100">
    <div class="row">

        <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block" id="demo">
            <ul class="list-group list-group-flush bg-dark">
                <?php

                if($_SESSION['refference'] == 'Mahasiswa'){
                    $q = $connection->prepare("select * from mahasiswa where nim = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $mhs = $q->fetch();
                    echo "
                        <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Home\" class=\"nav-link text-white\"><i class=\"oi oi-home\"></i> Home</a>
                        </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Profil\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=KP\" class=\"nav-link text-white\"><i class=\"oi oi-briefcase\"></i> KP Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"index.php?modul=PerusahaanInstansi\">Perusahaan/Instansi</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Help\" class=\"nav-link text-white\"><i class=\"oi oi-question-mark\"></i> Panduan</a>
                    </li>
                    ";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                            <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Profil\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=DosenSeminar\" class=\"nav-link text-white\"><i class=\"oi oi-briefcase\"></i> Seminar Saya</a>
                    </li>
                    <li class=\"list-group-item text-white bg-dark nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link text-white dropdown-toggle-split\" id=\"navbardrop\" data-toggle=\"dropdown\"><i class=\"oi oi-info\"></i> Informasi</a>
                        <div class=\"dropdown-menu\">
                            <a class=\"dropdown-item\" href=\"index.php?modul=PerusahaanInstansi\">Perusahaan/Instansi</a>
                        </div>
                    </li>
                    <li class=\"list-group-item text-white bg-dark\">
                        <a href=\"index.php?modul=Help\" class=\"nav-link text-white\"><i class=\"oi oi-question-mark\"></i> Panduan</a>
                    </li>";
                } else {
                    echo "<li class=\"list-group-item text-white bg-dark\">
                        <a href=\"#\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Profil</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>
        <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-5">
            <section>
                <?php

                include 'modul/'.$modul.'/'.$action.'.php';

                ?>
            </section>
        </div>
        <footer class="py-2 bg-info col-md-12 fixed-bottom ">
            <div class="container">
                <p class="text-center text-white" style="font-weight: bolder">Copyright &copy; 2019 Imam Faried Helmi</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>
</div>



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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

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
            font-family: Helvetica;
        }
        h6 {
            font-weight: bolder;
        }
    </style>
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
                        <a href=\"index.php?modul=AdminKP\" class=\"nav-link text-white\"><i class=\"oi oi-person\"></i> Persetujuan KP</a>
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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

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
        h6 {
            font-weight: bolder;
        }

        nav {
            text-transform:uppercase;
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
            display:inline;
            float:left;
        }

        nav li a {
            display:block;
            text-decoration:none;
            padding:10px 15px;
            text-shadow:0px 1px 1px rgba(0,0,0,0.8);
        }

        nav li a:hover  {background:#333;text-decoration:none;}
        nav li a.active {background:#1D4ABE;color:#ffe8a1;}


    </style>
    <script type="text/javascript">
        $(function() {
            var path = window.location.href; // Mengambil data URL pada Address bar
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

        <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block collapse" id="nav">
            <ul id="menu" class="list-group list-group-flush bg-dark">
                <?php
                if($_SESSION['refference'] == 'Mahasiswa'){
                    $q = $connection->prepare("select * from mahasiswa where nim = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $mhs = $q->fetch();
                    echo "
                        <li class=\"list-group-item text-white bg-dark\" style='text-align: center'>".$mhs['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                        <li class=\"list-group-item text-white bg-dark list-group-item-secondary\">
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
                    </li>
                    <li class=\"list-group-item text-white bg-dark\"></li>";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-dark\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>

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

        <nav class="col-md-2 col-sm-3 bg-success h-100 p-0 position-fixed d-none d-sm-block collapse" id="nav">
            <ul id="menu" class="list-group list-group-flush bg-dark">
                <?php
                if($_SESSION['refference'] == 'Mahasiswa'){
                    $q = $connection->prepare("select * from mahasiswa where nim = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $mhs = $q->fetch();
                    echo "
                        <li class=\"list-group-item text-white bg-success\" style='text-align: center'>".$mhs['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
                        <li class=\"list-group-item text-white bg-dark list-group-item-secondary\">
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
                    </li>
                    ";
                } elseif ($_SESSION['refference'] == 'Dosen') {
                    $q = $connection->prepare("select * from dosen where nip_nik = ?");
                    $q->execute(array($_SESSION['refference_id']));
                    $dos = $q->fetch();
                    echo "<li class=\"list-group-item text-white bg-dark\" style='text-align: center'>".$dos['nama']."<br>".$_SESSION['refference_id']."<br>".$_SESSION['refference']."</li>
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
                <a href="index.php?modul=Home&action=logout"><button class="btn btn-danger" type="button"><i class="oi oi-power-standby"></i> Keluar</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>
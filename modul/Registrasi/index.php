<?php
/**
 * Created by PhpStorm.
 * User: Iremiew
 * Date: 21/05/2019
 * Time: 21.45
 */

?>
<!--<form action="index.php?modul=Registrasi&action=insert" method="post">
    <label for="">Username</label>
    <p>
        <input type="text" name="username">
    </p>
    <label for="">Nama</label>
    <p>
        <input type="text" name="nama">
    </p>
    <label for="">NIM</label>
    <p>
        <input type="text" name="nim">
    </p>
    <label for="">password</label>
    <p>
        <input type="password" name="password">
    </p>
    <label for="">E-mail</label>
    <p>
        <input type="email" name="email">
    </p>
    <button type="submit" class="btn btn-primary">Registrasi</button>
</form>
-->
<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <p class="text-center"><img src="../Media/Gambar/Icon/icon-3.png" alt="sehatkuy" width="100" height="100"></p>
            <h4 class="card-title mt-3 text-center">Buat Akun kamu disini</h4>
            <form action="index.php?modul=Registrasi&action=insert" method="post">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="oi oi-flag"></i></span>
                    </div>
                    <input name="username" class="form-control" placeholder="NIM" type="text" required>
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="oi oi-person"></i></span>
                    </div>
                    <input name="nama" class="form-control" placeholder="Nama Lengkap" type="text" required>
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="oi oi-envelope-closed"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Alamat Email" type="email" required>
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="oi oi-lock-locked"></i> </span>
                    </div>
                    <input  name="password" class="form-control" placeholder="Password" type="password" required>
                </div> <!-- form-group// -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                </div> <!-- form-group// -->
                <p class="text-center">Sudah punya akun ? <a href="index.php?modul=Home" >Log In</a></p>
            </form>
        </article>
    </div>
</div>

<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "penjualan";

    $koneksi = mysqli_connect($host,$user,$pass,$name);

    if (!$koneksi) {
      die("Koneksi Gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
    }
 ?>
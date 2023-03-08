<?php
    include '../koneksi.php';

    $id_user        = $_POST["id_user"];
    $id_keranjang   = $_POST["id_keranjang"];
    $id_barang      = $_POST["id_barang"];
    $nama_barang    = $_POST["nama_barang"];
    $qty            = $_POST["qty"];
    $harga_beli     = $_POST["harga_beli"];
    $harga_jual     = $_POST["harga_jual"];


    $qry ="INSERT INTO penjualan (id_user, id_keranjang, id_barang, nama_barang, qty, harga_beli, harga_jual) 
        VALUES ( '$id_user', '$id_keranjang', '$id_barang', '$nama_barang', '$qty', '$harga_beli', '$harga_jual')";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from penjualan order by id_penjualan ASC";
    $get = mysqli_query($koneksi, $query);


    
    if (mysqli_error($koneksi)) {
        $data["status"] = "error";
        $data["pesan"] = $error;
    }else {
        $data["status"] = "success";
        while($row = mysqli_fetch_assoc($get)){
            $data["pesan"] =$row;
        }
    }

    echo json_encode($data);
?>
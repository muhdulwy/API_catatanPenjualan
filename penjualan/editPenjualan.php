<?php
    include '../koneksi.php';

    $id             = $_POST["id_penjualan"];
    $id_user        = $_POST["id_user"];
    $id_keranjang   = $_POST["id_keranjang"];
    $id_barang      = $_POST["id_barang"];
    $nama_barang    = $_POST["nama_barang"];
    $qty            = $_POST["qty"];
    $harga_beli     = $_POST["harga_beli"];
    $harga_jual     = $_POST["harga_jual"];


    $qry ="UPDATE penjualan SET id_user = '$id_user', id_keranjang = '$id_keranjang', id_barang = '$id_barang', nama_barang = '$nama_barang', 
        qty = '$qty', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id_penjualan = '$id' ";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from penjualan WHERE id_penjualan = '$id'";
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

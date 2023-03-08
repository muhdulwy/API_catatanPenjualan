<?php
    include '../koneksi.php';

    $id             = $_POST["id_barang"];
    $id_user        = $_POST["id_user"];
    $barcode        = $_POST["barcode"];
    $nama_barang    = $_POST["nama_barang"];
    $kategori       = $_POST["kategori"];
    $harga_beli     = $_POST["harga_beli"];
    $harga_jual     = $_POST["harga_jual"];
    $stok           = $_POST["stok"];


    $qry ="UPDATE barang SET id_user = '$id_user', barcode = '$barcode', nama_barang = '$nama_barang', 
        kategori = '$kategori', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok' WHERE id_barang = '$id' ";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from barang WHERE id_barang = '$id'";
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
<?php
    include '../koneksi.php';

    $id_user        = $_POST["id_user"];
    $barcode        = $_POST["barcode"];
    $nama_barang    = $_POST["nama_barang"];
    $kategori       = $_POST["kategori"];
    $harga_beli     = $_POST["harga_beli"];
    $harga_jual     = $_POST["harga_jual"];
    $stok           = $_POST["stok"];

    $qry ="INSERT INTO barang (id_user, barcode, nama_barang, kategori, harga_beli, harga_jual, stok) 
        VALUES ( '$id_user', '$barcode', '$nama_barang', '$kategori', '$harga_beli', '$harga_jual', '$stok' )";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from barang order by id_barang ASC";
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
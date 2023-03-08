<?php
    include '../koneksi.php';

    $id = $_POST["id_barang"];

    $qry ="DELETE FROM barang WHERE id_barang = '$id' ";
    $result = mysqli_query($koneksi, $qry);


    
    if (mysqli_error($koneksi)) {
        $data["status"] = "error";
        $data["pesan"] = $error;
    }else {
        $data["status"] = "success";       
        $data["pesan"] ="Data Berhasil Dihapus";
    }

    
    echo json_encode($data);

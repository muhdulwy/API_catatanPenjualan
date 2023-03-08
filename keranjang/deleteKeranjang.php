<?php
    include '../koneksi.php';

    $id = $_POST["id_keranjang"];

    $qry ="DELETE FROM keranjang WHERE id_keranjang = '$id' ";
    $result = mysqli_query($koneksi, $qry);


    
    if (mysqli_error($koneksi)) {
        $data["status"] = "error";
        $data["pesan"] = $error;
    }else {
        $data["status"] = "success";       
        $data["pesan"] ="Data Berhasil Dihapus";
    }

    
    echo json_encode($data);

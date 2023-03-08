<?php
    include '../koneksi.php';

    $id = $_POST["id_penjualan"];

    $qry ="DELETE FROM penjualan WHERE id_penjualan = '$id' ";
    $result = mysqli_query($koneksi, $qry);


    
    if (mysqli_error($koneksi)) {
        $data["status"] = "error";
        $data["pesan"] = $error;
    }else {
        $data["status"] = "success";       
        $data["pesan"] ="Data Berhasil Dihapus";
    }

    
    echo json_encode($data);

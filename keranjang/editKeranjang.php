<?php
    include '../koneksi.php';

    $id             = $_POST["id_keranjang"];
    $id_user        = $_POST["id_user"];
    $qty            = $_POST["qty"];
    $total_harga    = $_POST["total_harga"];
    $status         = $_POST["status"];


    $qry ="UPDATE keranjang SET id_user = '$id_user', qty = '$qty', total_harga = '$total_harga', 
        status = '$status' WHERE id_keranjang = '$id' ";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from keranjang WHERE id_keranjang = '$id'";
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
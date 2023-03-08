<?php
    include '../koneksi.php';

    $id_user        = $_POST["id_user"];
    $qty            = $_POST["qty"];
    $total_harga    = $_POST["total_harga"];
    $status         = $_POST["status"];


    $qry ="INSERT INTO keranjang (id_user, qty, total_harga, status) 
        VALUES ( '$id_user', '$qty', '$total_harga', '$status')";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from keranjang order by id_keranjang ASC";
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
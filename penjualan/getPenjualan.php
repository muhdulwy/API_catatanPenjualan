<?php
    include '../koneksi.php';

    $qry = "select * from penjualan order by id_penjualan ASC";
    $result = mysqli_query($koneksi, $qry);

    if (mysqli_error($koneksi)) {
        $data["status"] = "error";
        $data["pesan"] = $error;
    }else {

        while($row = mysqli_fetch_assoc($result)){
            $data[] =$row;
        }
    }


    echo json_encode($data);
?>
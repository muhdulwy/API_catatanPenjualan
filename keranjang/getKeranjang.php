<?php
    include '../koneksi.php';

    $qry = "select * from keranjang order by id_keranjang ASC";
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
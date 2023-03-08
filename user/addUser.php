<?php
    include '../koneksi.php';

    $nama = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $hp = $_POST["hp"];

    $qry ="INSERT INTO users (username, email, password, hp) VALUES ( '$nama','$email','$password','$hp')";

    $result = mysqli_query($koneksi, $qry);

    $query = "select * from users order by id_user ASC";
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
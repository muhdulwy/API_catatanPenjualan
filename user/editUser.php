<?php
    include '../koneksi.php';
        
    $id = $_POST["id_user"];
    $nama = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $hp = $_POST["hp"];

    $qry ="UPDATE users SET username = '$nama', email = '$email', password = '$password', hp = '$hp'  WHERE id_user = '$id' ";
    $result = mysqli_query($koneksi, $qry);

    $query = "select * from users WHERE id_user = '$id'";
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

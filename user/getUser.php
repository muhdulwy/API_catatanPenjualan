<?php
    include '../koneksi.php';

    $nama = $_POST["username"];
    $password = md5($_POST["password"]);

    $qry = "SELECT * from users WHERE username = '$nama' and password = '$password'";
    $result = mysqli_query($koneksi, $qry);

 
    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $data["message"] = "Success";
        $data["status"] = 200;
        $data["user"] = $row;
    }else{
        $data["message"] = "Username dan Password Salah";
        $data["status"] = 404;
    }
 
 
    // if (mysqli_error($koneksi)) {
    //     $data["status"] = "error";
    //     $data["pesan"] = $error;
    // }else {

    //     while($row = mysqli_fetch_assoc($result)){
    //         $data[] =$row;
    //     }
    // }


    echo json_encode($data);
?>
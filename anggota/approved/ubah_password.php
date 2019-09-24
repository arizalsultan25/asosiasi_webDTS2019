<?php
    //koneksi database
    include "../../koneksi.php";

    session_start();
    $nik = $_SESSION['nik'];

    $pwlama = $_POST['pwlama'];
    $pwbaru = $_POST['pwbaru'];
    $konfir = $_POST['pwd'];

    //echo "$pwbaru $pwlama $konfir";
    //cek password lama
    $password = mysqli_query($conn, "select * from login where nik='$nik'");
    $data = mysqli_fetch_array($password);

    //jika password lama tidak cocok
    if($pwlama !== $data['password']){
        header("location:user_password.php?wrong");
    }else{
        //jika password baru tidak cocok dengan konfirmasi
        if ($pwbaru !== $konfir){
            header("location:user_password.php?mismatch");
        }else{
            $query = mysqli_query($conn, "update login set password='$konfir' where nik='$nik'");
            header("location:index.php?pwchanged");        
        }

    }

?>
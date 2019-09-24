<?php
    //koneksi database
    include "../koneksi.php";

    session_start();
    $nik = $_SESSION['nik'];

    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $email = $_POST['email'];

    $query = mysqli_query($conn, "update pengguna set nama='$nama', 
        ttl='$ttl', alamat='$alamat', provinsi='$provinsi', email='$email' where 
        nik='$nik'");
    
    if($query){
        header("location:detail.php");
    }else{
        echo "error";   
    }

?>
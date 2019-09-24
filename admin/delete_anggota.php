<?php
    $nik = $_GET['nik'];
 
    //koneksi database
    include "../koneksi.php";
    
    $hapus = mysqli_query($conn, "delete from persetujuan where nik='$nik'");
    $hapus = mysqli_query($conn, "delete from portofolio where nik='$nik'");
    $hapus = mysqli_query($conn, "delete from login where nik='$nik'");
    $hapus = mysqli_query($conn, "delete from mapping_pengguna where nik='$nik'");
    $hapus = mysqli_query($conn, "delete from pengguna where nik='$nik'");
    
    //redirect ke halaman otoritas
    header("location:otoritas.php");

?>
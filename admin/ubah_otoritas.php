<?php
    $nik = $_POST['nik'];
    $kode = $_POST['otoritas'];

    echo $nik." ".$kode;
    //koneksi database
    include "../koneksi.php";
    
    $hapus = mysqli_query($conn, "update mapping_pengguna set id_posisi='$kode' where nik='$nik'");
    //$hapus = mysqli_query($conn, "delete from mapping_pengguna where nik='$nik'");
    //$hapus = mysqli_query($conn, "delete from pengguna where nik='$nik'");
    
    //redirect ke halaman otoritas
    header("location:hak_akses.php");

?>
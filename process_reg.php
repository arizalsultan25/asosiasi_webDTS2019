<?php
    include "koneksi.php";

    

    $nama=$_POST['nama'];
    $provinsi = $_POST['provinsi'];
    $password = md5($_POST['pwd']);
    $email = $_POST['email'];
    $ttl = $_POST['TTL'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['NIK'];
    $bulan = date('M');
    $tahun = date('Y');

    $cek_nik = mysqli_query($conn, "SELECT nik FROM login WHERE nik='$nik'");
    // $data = mysqli_fetch_array($cek_nik);
    // cek nik
    // $result=mysqli_query($conn,"SELECT nik FROM login where nik = '$nik'");

    // if( mysqli_fetch_assoc($result)){
    //     echo "<script>
    //     alert('NIK sudah Terdaftar')
    //     </script>";
    //     return false;
    // }

    if( mysqli_fetch_assoc($cek_nik)){
        header("location:register.php?exist");
        return false;
    }

    if ($_POST['pwd'] !== $_POST['pw']){
        header("location: register.php?gagal");
    }else{
        echo "$nik  $nama $ttl $alamat $provinsi $email";
        //input data ke table pengguna
        $data=mysqli_query($conn, "insert into pengguna values(
            '$nik','$nama','$ttl','$alamat','$provinsi','$email','$bulan','$tahun')");
        
        //input data ke table login
        $login=mysqli_query($conn, "insert into login values(
            '$nik','$password')");

        //input data ke table persetujuan
        $persetujuan = mysqli_query($conn, "insert into persetujuan values(
            '$nik','belum disetujui')");

        //input data ke table mapping anggota
        $mapping = mysqli_query($conn, "insert into mapping_pengguna values(
            '$nik','4')");
        
           header("location: index.php?register");
        }
?>

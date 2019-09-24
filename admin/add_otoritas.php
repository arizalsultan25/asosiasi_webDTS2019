<?php
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $pw = $_POST['pw'];
    $pwd = $_POST['pwd'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $prov = $_POST['provinsi'];
    $email = $_POST['email'];
    $otoritas = $_POST['jabatan'];
    $bulan = date('M');
    $tahun = date('Y');

    //koneksi database
    include "../koneksi.php";

    echo "$nik $nama $pw $pwd $ttl $alamat $prov $email $otoritas $bulan $tahun";
    
    //cek nik apakah telah terdaftar atau tidak
    $query_nik = mysqli_query($conn, "select * from pengguna where nik='$nik'");
    $jumlah_nik = mysqli_num_rows($query_nik);

    //apabila nik telah terdaftar
    if($jumlah_nik > 0){
        header("location:tambah_otoritas.php?exist");
    }else{

    //apabila password dan password konfirmasi tidak sama
    if($pw !== $pwd){
        header("location:tambah_otoritas.php?mismatch");
    }else{

    //input data ke table pengguna
    $input_pengguna = mysqli_query($conn, "insert into pengguna values(
        '$nik','$nama','$ttl','$alamat','$prov','$email','$bulan','$tahun')");

    //input data ke table login
    $input_login = mysqli_query($conn, "insert into login values('$nik','$pwd')");

    //input data ke table mapping_pengguna
    $input_map = mysqli_query($conn, "insert into mapping_pengguna values ('$nik','$otoritas')");

    //kembali ke halaman tampilkan data otoritas
    header("location: otoritas.php");
    }
}
?>
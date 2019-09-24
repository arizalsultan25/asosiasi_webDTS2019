<?php
    include "../../koneksi.php";

    session_start();
    $nik = $_SESSION['nik'];
    $keahlian = $_POST['keahlian'];
    $pelatihan = $_POST['pelatihan'];
    $sertifikat = $_POST['sertifikat'];
    $project = $_POST['project'];

    $portofolio = mysqli_query($conn, "update portofolio 
    set bidang_keahlian='$keahlian', 
    riwayat_pelatihan='$pelatihan', 
    sertifikat_dimiliki = '$sertifikat', 
    riwayat_project = '$project' where nik='$nik'");
    
    header("location:index.php");
?>
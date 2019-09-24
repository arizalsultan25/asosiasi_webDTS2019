<?php
    include "../../koneksi.php";

    session_start();
    $nik = $_SESSION['nik'];
    $keahlian = $_POST['keahlian'];
    $pelatihan = $_POST['pelatihan'];
    $sertifikat = $_POST['sertifikat'];
    $project = $_POST['project'];

    $portofolio = mysqli_query($conn, "insert into portofolio values(
        '$nik','$keahlian','$pelatihan','$sertifikat','$project')");
    
    header("location:index.php");
?>
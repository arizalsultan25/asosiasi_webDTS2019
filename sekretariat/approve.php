<?php

    include "../koneksi.php";

    $nik = $_GET['nik'];

    mysqli_query($conn, "update persetujuan set status = 'disetujui'
        where nik='$nik'");

    header("location:index.php");
?>
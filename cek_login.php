<?php
    //include file database
    include "koneksi.php";

    //mengambil nik dan password yang telah diketik
    $user=$_POST['nik'];
    $pass=md5($_POST['password']);

    //mencocokkan data dengan nik dan password di database
    $data=mysqli_query($conn, "select * from login where nik='$user' and password='$pass'");
    $banyak=mysqli_num_rows($data);
  
    //jika data ditemukan
    if($banyak>0){
        $hak_akses=mysqli_query($conn, "select nama_posisi from posisi where id_posisi = (
            select id_posisi from mapping_pengguna where nik='$user')");
        $hasil=mysqli_fetch_array($hak_akses);
        $pengguna=mysqli_query($conn, "select nama from pengguna where nik='$user'");
        $name=mysqli_fetch_array($pengguna);

        //membuat sesi login
        session_start();
        $_SESSION['nik'] = $user;
        $_SESSION['nama'] = $name['nama'];

        //pembagian hak akses
        switch ($hasil['nama_posisi']){
            case "Admin":
                header("location:admin/index.php");
                ECHO $_SESSION['nik'];
                $_SESSION['akses'] = "Admin";
            break;
            case "Ketua":
                header("location:ketua/index.php");
                ECHO $_SESSION['nik'];
                $_SESSION['akses'] = "Ketua";
            break;
            case "Sekretariat":
                header("location:sekretariat/index.php");
                ECHO $_SESSION['nik'];
                $_SESSION['akses'] = "Sekretariat";
            break;
            default:
                 $_SESSION['akses'] = "Anggota";
                $persetujuan = mysqli_query($conn, "select * from persetujuan 
                    where nik = '$user'");
                $status = mysqli_fetch_array($persetujuan);
                
                if($status['status']=='belum disetujui'){
                    header('location:anggota/new');
                }else{
                    header('location:anggota/approved');
                }
                
            break;

        }    

    //jika data tidak ditemukan
    }else{
        //mengebalikan user ke halaman index dengan status login gagal
        header("location:index.php?login=gagal");
    }
?>

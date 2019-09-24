<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php
  
      session_start();
  
      if(!isset($_SESSION['akses'])){
        header("location:../../index.php");
      }else{
        if($_SESSION['akses'] !== "Ketua"){
          header("location:../../".$_SESSION['akses']);
        }
      }
  

    
    //mengisi session
    $nik = $_SESSION['nik'];

    //mengecek session
    if(!isset($_SESSION['akses'])){
        header("location: ../");
        $akses = $_SESSION['akses'];
      if($akses !== "Admin"){
        header("location: ../".$_SESSION['akses']."/");
      }
    }

  ?>

  <title>Ketua - Profile</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../style/sb-admin.css" rel="stylesheet">

    <style>
      .tmbl{
        width:20%;
        margin-top: 20px;
        margin-left: 40%;

      }
    </style>

</head>

<body id="page-top">

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark bg-info static-top">

  <a class="navbar-brand mr-1" href="index.php"><img src="../img/logo1.png" height="35px" style="background-color:whte;"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <div class="navbar ml-auto text-white">
     <i class="fas fa-fw fa-user-circle" style="margin-right:5px"></i>
        <?php
          echo $_SESSION['nama']. " (". $_SESSION['akses'].")";
        ?>
    </div>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="anggota.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Anggota</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="detail.php">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-sign-out-alt" style="margin-left:5px"></i>
          <span>Log out</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="profile.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header inline-block">
            <i class="fas fa-list"></i>
            Ubah Profile
              <div style="float:right">
              <a href="detail.php" class="btn btn-primary mr-2">Lihat Profile</a>
              <a href="user_password.php" class="btn btn-danger">Ubah Password</a>
              </div>
          </div>
          <div class="card-body">

          <?php
            //koneksi
            include "../koneksi.php";

            //fetch data
            $query = mysqli_query($conn, "select * from pengguna where nik='$nik'");
            $data = mysqli_fetch_array($query);

          ?>

          <form class="form-horizontal" action="ubah_profile.php" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="nik">NIK</label>
              <div class="col-sm-12">
                <input type="number" class="form-control" id="nik" 
                  value=<?php echo $data['nik']; ?> disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="nama">Nama</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="nama" 
                  value=<?php echo $data['nama']; ?> >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="ttl">Tanggal Lahir</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" name="ttl" 
                  value=<?php echo $data['ttl']; ?> >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="alamat">Alamat</label>
              <div class="col-sm-12">
                <textarea class="form-control" cols="30" rows="3" name=alamat><?php  
                  echo $data['alamat']; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="provinsi">Provinsi</label>
              <div class="col-sm-12">
                <select name="provinsi" class="form-control">
                  <option value="<?php echo $data['provinsi']; ?>" selected><?php echo $data['provinsi']; ?></option>
                  <option value="Aceh">Aceh</option>
                  <option value="Sumatera Utara">Sumatera Utara</option>
                  <option value="Sumatera Barat">Sumatera Barat</option>
                  <option value="Riau">Riau</option>
                  <option value="Jambi">Jambi</option>
                  <option value="Sumatera Selatan">Sumatera Selatan</option>
                  <option value="Bengkulu">Bengkulu</option>
                  <option value="Lampung">Lampung</option>
                  <option value="Bangka Belitung">Kep. Bangka Belitung</option>
                  <option value="kepulauan Riau">Kepulauan Riau</option>
                  <option value="Jakarta">Jakarta</option>
                  <option value="Jawa Barat">Jawa Barat</option>
                  <option value="Banten">Banten</option>
                  <option value="Jawa Tengah">Jawa Tengah</option>
                  <option value="Yogyakarta">Yogyakarta</option>
                  <option value="Jawa Timur">Jawa Timur</option>
                  <option value="Kalimantan Barat">Kalimantan Barat</option>
                  <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                  <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                  <option value="Kalimantan Timur">Kalimantan Timur</option>
                  <option value="Kalimantan Utara">Kalimantan Utara</option>
                  <option value="Bali">Bali</option>
                  <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                  <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                  <option value="Sulawesi Utara">Sulawesi Utara</option>
                  <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                  <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                  <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                  <option value="Sulawesi Barat">Sulawesi Barat</option>
                  <option value="Gorontalo">Gorontalo</option>
                  <option value="Maluku">Maluku</option>
                  <option value="Maluku Utara">Maluku Utara</option>
                  <option value="Papua">Papua</option>
                  <option value="Papua Barat">Papua Barat</option>
                 </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" name="email"
                  value=<?php echo $data['email']; ?> >
              </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-outline-info tmbl">Ubah </button> 
            </div>
          </form>
          </div>
          <div class="card-footer small text-muted">Updated <?php date_default_timezone_set('Asia/Jakarta'); $tgl = date('l, d-m-Y h:i:sa'); echo $tgl;?></div>
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="../dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>

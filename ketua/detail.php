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
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
        <div class="card-header inline-block">
            <i class="fas fa-list"></i>
            Lihat Profile
              <div style="float:right">
                <a href="profile.php" class="btn btn-primary mr-2">Ubah Profile</a> 
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

<img src="../img/id-card.png" alt="icon id card" 
            style="height:200px; margin-left:4%; margin-top: 2%" >
          <div style="float:right; margin-right:24%">
           <table border=0>
            <tr>
              <td width=250><h3 class="font-weight-light"> NIK </h3></td>
              <td width=15><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['nik']; ?> </h3></td>
            </tr>
            <tr>
              <td><h3 class="font-weight-light"> Nama </h3></td>
              <td><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['nama']; ?> </h3></td>
            </tr>
            <tr>
              <td><h3 class="font-weight-light"> Tanggal Lahir </h3></td>
              <td><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['ttl']; ?> </h3></td>
            </tr>
            <tr>
              <td><h3 class="font-weight-light"> Alamat </h3></td>
              <td><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['alamat']; ?> </h3></td>
            </tr>
            <tr>
              <td><h3 class="font-weight-light"> Provinsi </h3></td>
              <td><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['provinsi']; ?> </h3></td>
            </tr>
            <tr>
              <td><h3 class="font-weight-light"> E-mail </h3></td>
              <td><h3 class="font-weight-light"> : </h3></td>
              <td><h3 class="font-weight-light"> <?php echo $data['email']; ?> </h3></td>
            </tr>
           </table>
          </div>
          
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

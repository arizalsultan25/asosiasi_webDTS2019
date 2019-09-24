<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php
  //memulai session
  session_start();

  //include db
  include "../koneksi.php";

  //mengecek session
  if (!isset($_SESSION['nik'])) {
    header("location:../index.php");
  }
  $nik = $_SESSION['nik'];
  ?>

  <title>Admin - Data Anggota</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../style/sb-admin.css" rel="stylesheet">

  <!-- test datatable -->
  <script src="../js/jquery-3.3.1.js"></script>

  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>


  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/dataTables.bootstrap4.min.css">

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-info static-top">
    <!-- logo -->
    <a class="navbar-brand mr-1" href="index.php"><img src="../img/logo1.png" height="35px" style="background-color:whte;"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <div class="navbar ml-auto text-white">
      <i class="fas fa-fw fa-user-circle" style="margin-right:5px"></i>
      <?php
      echo $_SESSION['nama'] . " (" . $_SESSION['akses'] . ")";
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
        <a class="nav-link" href="otoritas.php">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Otoritas</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="anggota.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Anggota</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hak_akses.php">
          <i class="fas fa-fw fa-mask"></i>
          <span>Hak Akses</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="detail.php">
          <i class="fas fa-fw fa-user"></i>
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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Data Anggota</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Anggota</div>
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">NIK</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">TTL</th>
                  <th class="text-center">Provinsi</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data_anggota = mysqli_query($conn, "SELECT * from pengguna where nik in (select nik from 
              mapping_pengguna where id_posisi = 4)");
                $no = 1;
                while ($data = mysqli_fetch_array($data_anggota)) {
                  $nomor = $data['nik'];
                  $data_status = mysqli_query($conn, "select * FROM persetujuan where nik='$nomor'");
                  $status = mysqli_fetch_array($data_status);
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $data['nik']; ?></td>
                    <td class="text-center"><?php echo $data['nama']; ?></td>
                    <td class="text-center"><?php echo $data['ttl']; ?></td>
                    <td class="text-center"><?php echo $data['provinsi']; ?></td>
                    <td class="text-center"><?php echo $data['email']; ?></td>
                    <td class="text-center"><?php echo $status['status']; ?></td>
                    <td class="text-center"><a style="margin-right:15px" href="detail_anggota.php?nik=<?php echo $data['nik']; ?>" class="btn btn-primary">Detail</a>
                      <a href="delete_anggota.php?nik=<?php echo $data['nik']; ?>" class="btn btn-danger" onclick="javascript:return confirm('Hapus Data ?');">Hapus</a></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">NIK</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">TTL</th>
                  <th class="text-center">Provinsi</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </tfoot>
            </table>
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
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
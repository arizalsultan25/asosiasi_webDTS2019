<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- chart JS -->
  <script src="../vendor/ChartJs/Chart.js"></script>

  <?php
    //koneksi database
    include "../koneksi.php";

 
      session_start();
  
      if(!isset($_SESSION['akses'])){
        header("location:../../index.php");
      }else{
        if($_SESSION['akses'] !== "Ketua"){
          header("location:../../".$_SESSION['akses']);
        }
      }
  
      //menampilkan data tahun
      if(isset($_GET['tahun'])){
        $thn = $_GET['tahun'];
      }else{
        $thn = 2017;
      }

    $nik=$_SESSION['nik'];

    //pesan jika password berhasil diganti
    if(isset($_GET['pwchanged'])){
      echo "<script> alert('Password berhasil diganti'); </script>";
    }
  ?>

  <title>Ketua - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../style/sb-admin.css" rel="stylesheet">

    <style>
      .link{
        color:black;
      }

    </style>

    <!-- test datatable -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js
"></script>

      <link rel="stylesheet" href="../style/bootstrap.css">
      <link rel="stylesheet" href="../style/dataTables.bootstrap4.min.css">

    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>

</head>

<body id="page-top">

  <!-- navigation -->
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
      <li class="nav-item active">
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
      <li class="nav-item">
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
          <li class="breadcrumb-item active">Statistik Anggota</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Statistik anggota pertahun</div>
          <div class="card-body">
            <div class="form-group">
              <select name="tahun" id="tahun" class="form-control" style="margin-bottom:30px" onchange=iseng()>
                <option value="" selected>Pilih Tahun</option>
                <?php
                  $data_thn = mysqli_query($conn, "select * from pengguna group by thn_join");
                  while($tahun = mysqli_fetch_array($data_thn)){
                    echo "<option value='".$tahun['thn_join']."'>".$tahun['thn_join']."</option>";
                  }
                ?>
              </select>
            </div>
            <div style="width: 800px; margin: 0px auto">
              <canvas id="mychart"></canvas>
            </div>


          </div>
          <div class="card-footer small text-muted">Updated <?php date_default_timezone_set('Asia/Jakarta'); $tgl = date('l, d-m-Y h:i:sa'); echo $tgl;?></div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Statistik anggota per Provinsi</div>
          <div class="card-body">
            <div style="width: 800px; margin: 0px auto">
              <canvas id="provinsi"></canvas>
            </div>
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

  <script>
  var ctx = document.getElementById("mychart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Jan","Feb","Mar","Apr","Mei","Juni","Juli","Agu","Sep","Okt","Nov","Des"],
				datasets: [{
					label: 'Statistik anggota pada tahun <?php echo $thn; ?>',
					data: [
          <?php 
					$jan = mysqli_query($conn,"select * from pengguna where bln_join='Jan' and thn_join='$thn'");
					echo mysqli_num_rows($jan);
					?>,
          <?php 
					$feb = mysqli_query($conn,"select * from pengguna where bln_join='Feb' and thn_join='$thn'");
					echo mysqli_num_rows($feb);
					?>,
          <?php 
					$mar = mysqli_query($conn,"select * from pengguna where bln_join='Mar' and thn_join='$thn'");
					echo mysqli_num_rows($mar);
					?>, 
					<?php 
					$apr = mysqli_query($conn,"select * from pengguna where bln_join='Apr' and thn_join='$thn'");
					echo mysqli_num_rows($apr);
					?>,
          <?php 
					$mei = mysqli_query($conn,"select * from pengguna where bln_join='May' and thn_join='$thn'");
					echo mysqli_num_rows($mei);
					?>,
          <?php 
					$juni = mysqli_query($conn,"select * from pengguna where bln_join='Jun' and thn_join='$thn'");
					echo mysqli_num_rows($juni);
					?>,
         <?php 
					$juli = mysqli_query($conn,"select * from pengguna where bln_join='Jul' and thn_join='$thn'");
					echo mysqli_num_rows($juli);
					?>,
          <?php 
					$agu = mysqli_query($conn,"select * from pengguna where bln_join='Agu' and thn_join='$thn'");
					echo mysqli_num_rows($agu);
					?>,
          <?php 
					$juni = mysqli_query($conn,"select * from pengguna where bln_join='Sep' and thn_join='$thn'");
					echo mysqli_num_rows($juni);
					?>,
          <?php 
					$juni = mysqli_query($conn,"select * from pengguna where bln_join='Oct' and thn_join='$thn'");
					echo mysqli_num_rows($juni);
					?>,
          <?php 
					$juni = mysqli_query($conn,"select * from pengguna where bln_join='Nov' and thn_join='$thn'");
					echo mysqli_num_rows($juni);
					?>,
          <?php 
					$juni = mysqli_query($conn,"select * from pengguna where bln_join='Des' and thn_join='$thn'");
					echo mysqli_num_rows($juni);
					?>

				
					],
					backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

    function iseng(){
      var tahun = document.getElementById("tahun").value;
        window.location.href = "index.php?tahun="+tahun;
      }

      var ctx = document.getElementById("provinsi").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: [
          <?php
            $query_prov = mysqli_query($conn, "select * from pengguna group by provinsi order by provinsi");
            while($prov = mysqli_fetch_array($query_prov)){
              echo '"'.$prov['provinsi'].'",';
            }

          ?>
        ],
				datasets: [{
					label: 'Statistik anggota pada tahun <?php echo $thn; ?>',
					data: [
            <?php
            $query_jml = mysqli_query($conn, "select count(provinsi) as jumlah from pengguna group by provinsi order by provinsi");
            while($jml = mysqli_fetch_array($query_jml)){
              echo '"'.$jml['jumlah'].'",';
            }

          ?>
					],
					backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});


  </script>


</body>
</html>
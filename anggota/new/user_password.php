<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anggota Change Password</title>

  <!-- Custom fonts for this theme -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../../style/freelancer.min.css" rel="stylesheet">

  <!-- Prohibited Bypass -->
  <?php
  session_start();

  if (!isset($_SESSION['akses'])) {
    header("location:../../index.php");
  } else {
    if ($_SESSION['akses'] !== "Anggota") {
      header("location:../../" . $_SESSION['akses']);
    }
  }

  //menampilkan pesan password salah dan kurang tepat
  if (isset($_GET['wrong'])) {
    echo "<script> alert('Password lama tidak cocok'); </script>";
  }

  if (isset($_GET['mismatch'])) {
    echo "<script> alert('Password baru tidak cocok dengan konfirmasi'); </script>";
  }

  ?>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#9999ff;">
    <a class="navbar-brand" style="color:white" href="index.php"><img src="../../img/logo1.png" height="35px" style="background-color:whte;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto" style="color:white">
        <li class="nav-item">
          <a  class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link linked" href="index.php?approve">Portofolio</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link linked" href="detail.php">Profile</a>
        </li>
        <li class="nav-item active">
          <a style="color:#fff;" class="nav-link linked" href="user_password.php">Ubah Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link linked" href="../../logout.php">Log Out</a>
        </li>
      </ul>
      <?php
        echo $_SESSION['nama'] . " (" . $_SESSION['akses'] . ")";
        ?>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="../../img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Assosiasi Programmer Indonesia</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Waiting for Approvement</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ubah Password</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <?php
      //koneksi
      include "../../koneksi.php";

      $nik = $_SESSION['nik'];

      //fetch data
      $query = mysqli_query($conn, "select * from pengguna where nik='$nik'");
      $data = mysqli_fetch_array($query);

      ?>
      <!-- Portfolio Grid Items -->
      <form class="form-horizontal" action="ubah_password.php" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nik">NIK</label>
          <div class="col-sm-12">
            <input type="number" class="form-control" id="nik" value=<?php echo $data['nik']; ?> disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwlama">Password Lama</label>
          <div class="col-sm-12">
            <input type="password" class="form-control" name="pwlama" placeholder="Password Lama" maxlength=12>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwbaru">Password Baru</label>
          <div class="col-sm-12">
            <input type="password" class="form-control" name="pwbaru" placeholder="Password Baru" maxlength=12>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-12" for="pwd">Konfirmasi Password Baru</label>
          <div class="col-sm-12">
            <input type="password" class="form-control" name="pwd" placeholder="Konfirmasi Password Baru" maxlength=12>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" style="margin-top: 30px; margin-left:40%; width: 30%" class="btn btn-outline-info tmbl">Ubah </button>
        </div>
      </form>
      <!-- /.row -->

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
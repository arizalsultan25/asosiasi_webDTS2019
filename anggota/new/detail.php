<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profile Anggota</title>

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
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link linked" href="index.php?approve">Portofolio</a>
        </li>
        <li class="nav-item active">
          <a style="color:#fff;" class="nav-link linked" href="detail.php">Profile</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link linked" href="user_password.php">Ubah Password</a>
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
      <p class="masthead-subheading font-weight-light mb-0">Waiting for approvement </p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Profile</h2>

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
      <div class="card">
        <div class="card-header">Detail Profile 
          <div style="float:right">
          [ <a href="profile.php">Ubah Profile</a> ]
          </div>
        </div>
        <div class="card-body">
          <img src="../../img/id-card.png" alt="icon id card" 
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
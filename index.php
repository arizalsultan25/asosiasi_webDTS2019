<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Asosiasi Programmer Indonesia</title>

  <!-- Bootstrap core CSS -->
  <link href="style/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="style/style.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="style/landing-page.min.css" rel="stylesheet">

  <!-- Cek method get untuk pesan login gagal -->
  <?php
    if(isset($_GET['login'])){
      if($_GET['login']=="gagal"){
        echo "<script> alert('NIK atau password anda salah'); </script>";
      }
    }

    if(isset($_GET['register'])){
      echo "<script> alert('Akun anda telah berhasil didaftarkan, silahkan melakukan login dan menunggu persetujuan'); </script> ";
    }
  
    session_start();

    //prohibited bypass
    if(isset($_SESSION['akses'])){
      header("location:".$_SESSION['akses']."/index.php");
    }

  ?>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light navbar-inverse bg-light fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo1.png" height="35px"></a>
      <form class="navbar-form" action="cek_login.php" method="POST">
        <div class="form-inline">
          <input type="number" class="form-control" placeholder="NIK" style="margin-right:10px" required
            maxlength="10" name="nik">
          <input type="password" class="form-control" placeholder="Password" style="margin-right:10px" 
            maxlength="12" required name="password">
          <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Selamat datang di Website Asosiasi Web Programing Indonesia</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="POST" action="register.php">
            <div class="form-row">
              <div class="col-12 col-md-9  mb-2 mb-md-0">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Masukkan email kamu...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Daftar!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center m-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 border ">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-home m-auto text-success"></i>
            </div>
            <h3>Alamat</h3>
            <p class="lead mb-0">Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461 </p>

          </div>
        </div>
        <div class="col-lg-4 border border-right-0 border-left-0">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-phone m-auto text-success"></i>
            </div>
            <h3>Kontak</h3>
            <p class="lead mb-0">
              Phone : +62-778-469856
              <br>
              Fax : +62-778-463620
              <br>
              Email : info@polibatam.ac.id </p>
          </div>
        </div>
        <div class="col-lg-4 border">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-paper-plane m-auto text-success"></i>
            </div>
            <h3>Misi</h3>
            <p class="lead mb-0">Belajar Programming Menjadi lebih mudah</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

 <!--Google map-->

 <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-3">
        <div id="map-container-google-4" class="z-depth-1-half map-container-4">
      <iframe class="shadow" src="https://maps.google.com/maps?q=politeknik batam&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
        style="border:solid 3px #F8F9FA" allowfullscreen></iframe>
    </div>
        </div>
      </div>
    </div>



  <!-- Footer -->
  <footer class="footer bg-dark" style="height:120px; padding-top: 15px; margin-top: 5px">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

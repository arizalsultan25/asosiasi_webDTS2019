<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">

    <?php
        if(isset($_GET['gagal'])){
            echo "<script> alert('Password dan Password Konfirmasi tidak cocok'); </script>"; 
        }

        if(isset($_GET['exist'])){
            echo "<script> alert('NIK telah terdaftar'); </script>"; 
        }
    ?>

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light navbar-inverse bg-light static-top">    
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo1.png" height="35px"></a>
      <form class="navbar-form" action="cek_login.php" method="POST">
        <div class="form-inline">
          <input type="number" class="form-control" placeholder="NIK" style="margin-right:10px" required
            maxlength="10" name="nik">
          <input type="password" class="form-control" placeholder="Password" style="margin-right:10px" 
            maxlength="12" required name="password">
          <button type="submit" class="btn btn-default">Login</button>
      </div>
      </form>
    </div>
</nav>

<div class="container" style="margin-top=60px;">
    <h3>Register</h3>

    <img src="img/anim_reg.gif" class="img img-responsive" style="width: 440px; margin-top: 150px; margin-bottom:260px;">

    <div class="d-inline-block col-7" style="float:right">
        <div class="card">
            <div class="card-header">
                Form Register
            </div>
            <div class="card-content" style="padding:15px">
                <div class="form-group">
                    <form action="process_reg.php" method="post">
                    
                        <div class="input-group mb-3" style="margin-top:20px">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">123</span>
                            </div>
                            <input type="number" name="NIK" class="form-control" placeholder="NIK" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-user"></i></span>
                            </div>
                            <input type="nama" name="nama" class="form-control" placeholder="Nama" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="pw" class="form-control" placeholder="Password" 
                             maxlength=12 required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="pwd" class="form-control" placeholder="Password Konfirmasi" 
                             maxlength=12 required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-calendar"></i></span>
                            </div>
                            <input type="date" name="TTL" class="form-control" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <textarea name="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                <i style="margin-left:6px" class="fas fa-globe-asia"></i></span>
                            </div>
                            <select name="provinsi" class="form-control">
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

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color: #6666; width: 50px">
                                @</span>
                            </div>
                                <?php
                                    if(isset($_POST['email'])){
                                        $email = $_POST['email'];
                                    }
                                ?>

                            <input type="email" name="email" class="form-control" placeholder="Email" required
                            value=<?php if(isset($email)){ echo $email; } ?> >
                        </div>
                        
                        <button type="submit" class="btn btn-outline-info"
                            style="margin-left:125px; width:60%; margin-top: 20px">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- footer -->
    <footer class="footer bg-dark" style="height:120px; padding-top: 15px;">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
                <li class="list-inline-item">
                <a href="#">About</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                <a href="#">Contact</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                <a href="#">Terms of Use</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
                </li>
            </ul>
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

</body>
</html>
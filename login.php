<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">

    <style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {        
        font-size: 15px;
        font-weight: bold;
    }

</style>
</head>
<body>
    <!-- cek status login benar / salah -->
    <?php
     if(isset($_GET['login'])){
         if($_GET['login']=="gagal"){
             ?>
             <script>
                alert("username atau password anda salah");
             </script>
             <?php
         }
     }
     ?>

<a href="index.php" style="margin-left:15px; margin-top: 15px;">Back to Homepage</a>
<div class="login-form">
    <form action="cek_login.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>     
    </form>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
</div>
</body>
</html>
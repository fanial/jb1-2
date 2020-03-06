<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/logo.jpg">

    <title>LOGIN</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

    <body class="text-center">
    <div class="row">
            <form class="form-signin" action="login/cek-login.php" method="post">
                <img class="mb-4" src="assets/img/logo.jpg" alt="" width="85" height="85">
                  <h1 class="h3 mb-3 font-weight-normal">Please LOGIN</h1>
                        <?php 
	                        if(isset($_GET['pesan'])){
		                        if($_GET['pesan']=="gagal"){
			                        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
	            	            }
            	            }
	                      ?>
              <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required="">
              <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">LOGIN</button>
                <p class="mt-5 mb-3 text-muted">Siswa? <a href="login/login-sis.php"> Login Disini</a></p>
            </form>
    </div>
              

</body></html>

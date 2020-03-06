<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/logo.jpg">

    <title>Signin</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/signin.css" rel="stylesheet">

    <body class="text-center">
    <div class="row">
            <form class="form-signin" action="cek-login-sis.php" method="post">
                <img class="mb-4" src="../assets/img/logo.jpg" alt="" width="85" height="85">
                  <h1 class="h3 mb-3 font-weight-normal">LOGIN Sebagai Siswa</h1>
                        <?php 
	                        if(isset($_GET['pesan'])){
		                        if($_GET['pesan']=="gagal"){
			                        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
	            	            }
            	            }
	                      ?>
                <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" required="jangan kosong!" >
                <input type="text" name="nama" class="form-control" placeholder="Nama" required="jangan kosong!">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login-sis">LOGIN</button>
                <p class="mt-5 mb-3 text-muted">Bukan Siswa? <a href="../index.php"> Login Disini</a></p>
            </form>
    </div>
              

</body></html>
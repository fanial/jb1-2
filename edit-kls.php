<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id_kelas']) ){
    header('Location: kelas.php');
}

//ambil id dari query string
$id_kelas = $_GET['id_kelas'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM kelas WHERE id_kelas=$id_kelas";
$query = mysqli_query($koneksi, $sql);
$kelas = mysqli_fetch_array($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DATABASE SEKOLAH</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap -->
            <link href="assets/css/bootstrap.min.css" rel="stylesheet">
            <!-- styles -->
            <link href="assets/css/styles.css" rel="stylesheet">
            
    </head>
<body>
<!-- navbar -->
<div class="header">
	<div class="container">
	    <div class="row">
	        <div class="col-md-5">
	            <!-- Logo -->
	            <div class="logo">
	                <h1><a href="dashboard.php">DATABASE SEKOLAH</a></h1>
	            </div>
            </div>
	    </div>
	</div>
</div>
<!-- menu -->

<div class="page-content">
    <div class="row">
		<div class="col-md-2">
		<div class="sidebar content-box" style="display: block;">
            <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> HOME</a></li>
            <li class="current"><a href="siswa.php"><i class="glyphicon glyphicon-folder-open"></i> SISWA</a></li>
            <li class="current"><a href="kelas.php"><i class="glyphicon glyphicon-folder-open"></i> KELAS</a></li>
            <li class="current"><a href="jur.php"><i class="glyphicon glyphicon-folder-open"></i> JURUSAN</a></li>
            <li><a href="login/logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
        </div>
        </div>
<!-- content -->
    <div class="col-md-10">
        <div class="row">
            <div class="content-box-large">
                <div class="panel-heading">
					<div class="panel-title">Edit Data Kelas</div>
				</div>
                <div class="panel-body">
            <!-- form -->
            <form action="crud/cek-edit-kls.php" method="post" class="form-horizontal">
            <fieldset>
            <input type="hidden" name="id_kelas" value="<?php echo $kelas['id_kelas'] ?>" />
            <div class="form-group">
				<label class="col-md-2 control-label" for="nm_kelas">Nama Kelas</label>
					<div class="col-md-10">
						<input class="form-control" placeholder="Nama Kelas" type="text" name="nm_kelas" value="<?php echo $kelas['nm_kelas'] ?>">
					</div>
			</div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="tingkat">Tingkat</label><?php $tingkat = $kelas['tingkat']; ?>
                <div class="col-md-10">
                    <select name="tingkat" class="form-control" id="select-1">
                        <option <?php echo ($tingkat == '10') ? "selected": "" ?>>10</option>
                        <option <?php echo ($tingkat == '11') ? "selected": "" ?>>11</option>
                        <option <?php echo ($tingkat == '12') ? "selected": "" ?>>12</option>
                    </select>
                </div>
            </div>
            </fieldset>
                <button class="btn btn-primary" type="submit" name="simpan_kls">
                <i class="glyphicon glyphicon-save"></i>
					Submit
				</button>
            </form>
            </div>
        </div>
    </div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="js/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
    <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
</body>
</html>
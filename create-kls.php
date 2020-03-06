<?php 
 session_start();
 // Untuk mengcek apakah yang mengakses halaman ini sudah login atau belum

 if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
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
					<div class="panel-title">Tambah Data Kelas</div>
				</div>
                <div class="panel-body">
            <!-- form -->
            <form action="crud/cek-create-kls.php" method="post" class="form-horizontal">
            <fieldset>
            <div class="form-group">
				<label class="col-md-2 control-label" for="nm_kelas">Nama Kelas</label>
					<div class="col-md-10">
						<input class="form-control" placeholder="Nama Kelas" type="text" name="nm_kelas" required>
					</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="tingkat">Tingkat</label>
					<div class="col-md-10">
						<select name="tingkat" class="form-control" id="tingkat" required>
								<option>10</option>
								<option>11</option>
								<option>12</option>
						</select>
					</div>
			</div>
			<div class="form-group">
                    <label class="col-md-2 control-label" for="id_jur">Jurusan</label>
                    <div class="col-md-10">
                        <select name="id_jur" class="form-control" id="id_jur" required >
							<option disable selected> Pilih Jurusan</option>
							<?php include 'koneksi.php';
								$data = mysqli_query($koneksi,"SELECT * FROM jurusan");
								while ($d = mysqli_fetch_array($data)){
									?>
							<option value="<?php echo $d['id_jur'];?>">
								<?php echo $d['nm_jur'];?>
							</option>
							<?php } ?>
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
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-formhelpers.min.js"></script>

    <script src="assets/js/bootstrap-select.min.js"></script>

    <script src="assets/js/bootstrap-tags.min.js"></script>

    <script src="assets/js/jquery.maskedinput.min.js"></script>

    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

    <!-- bootstrap-datetimepicker -->
    <link href="assets/css/datetimepicker.css" rel="stylesheet">
    <script src="assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="assets/js/custom.js"></script>
    <script src="assets/js/forms.js"></script>
</body>
</html>
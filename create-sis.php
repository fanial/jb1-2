<?php 
 session_start();
 // Untuk mengcek apakah yang mengakses halaman ini sudah login atau belum

 if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
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
                <a href= crud/import.php class="btn btn-primary "><i class="glyphicon glyphicon-import"></i> Import </a>

					<div class="panel-title">Tambah Data Siswa</div>
				</div>
                <div class="panel-body">
            <!-- form -->
            <form action="cek-create-sis.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
				<div class="form-group">
                    <label class="col-md-2 control-label" for="id_kelas">Kelas</label>
                    <div class="col-md-10">
                        <select name="id_kelas" class="form-control" id="id_kelas" required >
							<option disable selected> Pilih Kelas</option>
							<?php include 'koneksi.php';
								$data = mysqli_query($koneksi,"SELECT kelas.id_kelas,kelas.nm_kelas,kelas.tingkat,kelas.id_jur,jurusan.nm_jur,jurusan.kaprog FROM kelas INNER JOIN jurusan ON kelas.id_jur=jurusan.id_jur");
								while ($d = mysqli_fetch_array($data)){
							?>
							<option value="<?php echo $d['id_kelas'];?>">
								<?php echo $d['nm_kelas'];?>
								<?php echo $d['tingkat'];?>
							</option>
							<?php } ?>
                        </select>
                        </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nis">NIS</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nomor Induk Siswa" type="number" name="nis" maxlength="10" required>
						</div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nama">Nama Lengkap</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nama Lengkap" type="text" name="nama" required>
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="jk">Jenis Kelamin</label>
					<div class="col-md-10">
                    <select name="jk" class="form-control" id="jk" required>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="agama">Agama</label>
                    <div class="col-md-10">
                        <select name="agama" class="form-control" id="agama" required>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Atheis</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
						<div class="col-md-10">
						<input class="form-control bfh-datepicker" placeholder="Tanggal Lahir" type="date" name="tgl_lahir" required>
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="tmpt_lahir">Tempat Lahir</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Tempat Lahir" type="text" name="tmpt_lahir" required>
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="alamat">Alamat</label>
						<div class="col-md-10">
                        <textarea class="form-control" placeholder="Alamat Lengkap" rows="4" name="alamat" required></textarea>
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nm_ortu">Nama Orangtua</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nama Lengkap Orangtua" type="text" name="nm_ortu" required>
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="foto">Upload Foto</label>
						<div class="col-md-10">
							<input class="form-control" type="file" name="foto"/>
						</div>
				</div>
                </div>
            </fieldset>
                <button class="btn btn-primary" type="submit" name="simpan">
					<i class="glyphicon glyphicon-save"></i>
					Submit
				</button>
            </form>
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
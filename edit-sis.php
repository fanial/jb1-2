<?php

include("koneksi.php");

//ambil id dari query string
$id_siswa = $_GET['id_siswa'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_array($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DATABASE SISWA</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap -->
            <link href="assets/css/bootstrap.min.css" rel="stylesheet">
            <!-- styles -->
            <link href="assets/css/styles.css" rel="stylesheet">
			<link href="assets/css/bootstrap-formhelpers.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-select.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-tags.css" rel="stylesheet">
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
					<div class="panel-title">Edit Data Siswa</div>
				</div>
                <div class="panel-body">
            <!-- form -->
            <form method="post" class="form-horizontal" action="cek-edit-sis.php?id_siswa=<?php echo $id_siswa; ?>" enctype="multipart/form-data">
            <fieldset>
            <input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'] ?>" />
				<div class="form-group">
                    <label class="col-md-2 control-label" for="id_kelas">Kelas</label>
                    <div class="col-md-10">
							<select name="id_kelas" class="form-control" id="id_kelas">
							<option disable selected> Pilih Kelas</option>
							<?php 
								include 'koneksi.php';
								$result = mysqli_query($koneksi,"SELECT kelas.id_kelas,kelas.nm_kelas,kelas.tingkat,kelas.id_jur,jurusan.nm_jur,jurusan.kaprog FROM kelas INNER JOIN jurusan ON kelas.id_jur=jurusan.id_jur");
								while($d = mysqli_fetch_array($result)){
									?>
								<option value="<?php echo $d['id_kelas']; ?>" <?php echo $siswa['id_kelas'] === $d['id_kelas'] ? "selected" : "" ?>><?php echo $d['nm_kelas']; ?>-<?php echo $d['tingkat']; ?>
								</option>
							<?php } ?>
                        </select>

                        </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nis">NIS</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nomor Induk Siswa" type="text" name="nis" value="<?php echo $siswa['nis'] ?>">
						</div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nama">Nama Lengkap</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nama Lengkap" type="text" name="nama" value="<?php echo $siswa['nama'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="jk" <?php $jk = $siswa['jk']; ?>>Jenis Kelamin</label>
					<div class="col-md-10">
                        <select name="jk" class="form-control" id="jk">
                            <option <?php echo ($jk == 'Laki-laki') ? "selected": "" ?>>Laki-laki</option>
                            <option <?php echo ($jk == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="agama">Agama</label><?php $agama = $siswa['agama']; ?>
                    <div class="col-md-10">
                        <select name="agama" class="form-control" id="agama">
                            <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                            <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
						<div class="col-md-10">
                        <input class="form-control bfh-datepicker" placeholder="Tanggal Lahir" type="date" name="tgl_lahir" value="<?php echo $siswa['tgl_lahir'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="tmpt_lahir">Tempat Lahir</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Tempat Lahir" type="text" name="tmpt_lahir" value="<?php echo $siswa['tmpt_lahir'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="alamat">Alamat</label>
						<div class="col-md-10">
                        <textarea class="form-control" placeholder="Alamat Lengkap" rows="4" name="alamat" value="<?php echo $siswa['alamat'] ?>"></textarea>
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nm_ortu">Nama Orangtua</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nama Lengkap Orangtua" type="text" name="nm_ortu" value="<?php echo $siswa['nm_ortu'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="foto">Foto</label>
						<div class="col-md-10">
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis Untuk Mengubah Foto <br>
                            <input class="form-control" type="file" name="foto"></input>
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
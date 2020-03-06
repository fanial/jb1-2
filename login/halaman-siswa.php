
<?php 
 session_start();
 // Untuk mengcek apakah yang mengakses halaman ini sudah login atau belum

 if($_SESSION['nis']==""){
  header("location:../login-sis.php?pesan=gagal");
 }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>DATABASE SEKOLAH</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap -->
            <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
            <!-- styles -->
            <link href="../assets/css/styles.css" rel="stylesheet">
            
    </head>
<body>
<!-- navbar -->
<div class="header">
	<div class="container">
	    <div class="row">
	        <div class="col-md-5">
	            <!-- Logo -->
	            <div class="logo">
	                <h1><a href="#">DATABASE SEKOLAH</a></h1>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<!-- menu -->
<div>

<div class="page-content">
    <div class="row">
		<div class="col-md-2">
		<div class="sidebar content-box" style="display: block;">
            <ul class="nav">
            <!-- Main menu -->
            <li class="submenu">
			    <a href="#">
					<i class="glyphicon glyphicon-user"></i> Akun
						<span class="caret pull-right"></span>
				</a>
				<!-- Sub menu -->
                <ul>
					<li><p><b><?php echo $_SESSION['nis']; ?></b> Anda telah berhasil login sebagai <b><?php echo $_SESSION['nama']; ?></b>.</p></li>
				    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                </ul>
            </li>
            </ul>
        </div>
        </div>
<!-- content -->
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
                    <div class="panel-title">Data Siswa</div>
                </div>
                <div class="panel-body">
                    <?php
                        include '../koneksi.php';
                        $id=$_SESSION['nis'];
                        $no=1;
                        $sql = "SELECT siswa.id_siswa,siswa.nis,siswa.foto,siswa.nama,siswa.jk, siswa.agama, siswa.tgl_lahir,siswa.tmpt_lahir,siswa.alamat,siswa.nm_ortu,siswa.foto,siswa.id_kelas,kelas.nm_kelas,kelas.tingkat,kelas.id_jur,jurusan.nm_jur,jurusan.kaprog FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN jurusan ON kelas.id_jur=jurusan.id_jur WHERE siswa.nis='$id'";
                        $query = mysqli_query($koneksi,$sql);
                            if (!$query){
                                die ('SQL Error : '.mysqli_error($koneksi));
                            }
                            while ($row = mysqli_fetch_array($query)){ ?>
                            <div class="row">
                                <div class="col-sm-3" id="foto">
                                    <img class="foto" src="<?php echo "../image/".$row['foto'];?>" width="230px" alt="Foto">
                                </div>
                            <div class="col-sm-7" id="data">
                                <div class="table-responsive">
                                <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="150px">NIS</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['nis'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Nama</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['nama'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Tempat Tanggal Lahir</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['tmpt_lahir'];?>,<?php echo $row['tgl_lahir'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Jenis Kelamin</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['jk'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Kelas</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['tingkat'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Program Keahlian</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['nm_jur'];?></td>
                                    </tr>

                                    <tr>
                                            <td width="150px">Agama</td>
                                            <td width="5px">:</td>
                                            <td><?php echo $row['agama'];?></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Alamat</td>
                                            <td width="5px">:</td>
                                            <td><?php echo $row['alamat'];?></td>
                                        </tr>
                
                                    <tr>
                                        <td width="150px">Orangtua</td>
                                        <td width="5px">:</td>
                                        <td><?php echo $row['nm_ortu'];?></td>
                                    </tr>
                                </tbody>
                            <?php }?>
                            </table>
                            </div>
                            </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
            

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>

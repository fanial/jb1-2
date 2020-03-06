<?php 
 session_start();
 // Untuk mengcek apakah yang mengakses halaman ini sudah login atau belum

 if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
 }

 ?><!DOCTYPE html>
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
            <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
                    <div class="panel-title">Data Jurusan</div>
				</div>
                <div class="panel-body">
                <a href= create-jur.php class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah Data </a>
                </div>
                <div class="table-responsive">
  				    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            <th>ID Jurusan</th> 
                            <th>Jurusan</th>
                            <th>Kepala Program</th>
                            <th>Action</th>
                        </tr>
                            <?php
                            include 'koneksi.php';
                            $no=1;
                            $sql = 'SELECT * FROM jurusan';
                            $query = mysqli_query($koneksi,$sql);

                            if (!$query){
                                die ('SQL Error : '.mysqli_error($koneksi));
                            }
                            while ($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $no++;?> </td>
                                <td><?php echo $row['id_jur'];?> </td>
                                <td><?php echo $row['nm_jur'];?> </td>
                                <td><?php echo $row['kaprog'];?> </td>
                                <td>
                                <a href=edit-jur.php?id_jur=<?php echo $row['id_jur'];?> class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href=crud/del-jur.php?id_jur=<?php echo $row['id_jur'];?> class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>        
                            </tr>
                            <?php }?>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
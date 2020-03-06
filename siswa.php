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
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            
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
                    <div class="panel-title">Data Siswa</div>
                </div>
                <div class="panel-body">
                    <a href= create-sis.php class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah Data </a>
                    <a target="_blank" href= crud/ekspor.php class="btn btn-success"><i class="glyphicon glyphicon-export"></i> Export </a>
                    <a class="btn btn-warning" href="crud/cetaks.php"><i class="glyphicon glyphicon-print"></i> Print </a>
                </div>
                <div class="table-responsive">
  				    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Id Siswa</th> 
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Gender</th>
                            <th>Agama</th>
                            <th>TTL</th> 
                            <th>Alamat</th>
                            <th>Orangtua</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                            <?php
                            include 'koneksi.php';
                            $no=1;
                            $sql = 'SELECT siswa.id_siswa,siswa.nis,siswa.nama,siswa.jk, siswa.agama, siswa.tgl_lahir,siswa.tmpt_lahir,siswa.alamat,siswa.nm_ortu,siswa.foto,siswa.id_kelas,kelas.nm_kelas,kelas.tingkat,kelas.id_jur,jurusan.nm_jur,jurusan.kaprog FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN jurusan ON kelas.id_jur=jurusan.id_jur';
                            $query = mysqli_query($koneksi,$sql);
                            if (!$query){
                                die ('SQL Error : '.mysqli_error($koneksi));
                            }
                            while ($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $no++;?> </td>
                                <td><?php echo $row['id_siswa'];?></td>
                                <td><?php echo $row['nis'];?></td>
                                <td><?php echo $row['nama'];?></td>
                                <td><?php echo $row['tingkat'];?></td>
                                <td><?php echo $row['nm_jur'];?></td>
                                <td><?php echo $row['jk'];?></td>
                                <td><?php echo $row['agama'];?></td>
                                <td><?php echo $row['tmpt_lahir'];?>,<?php echo $row['tgl_lahir'];?></td>
                                <td><?php echo $row['alamat'];?></td>
                                <td><?php echo $row['nm_ortu'];?></td>
                                <td> <img src="<?php echo "image/".$row['foto'];?>" width="80px"></td>
                                <td>
                                    <a href=edit-sis.php?id_siswa=<?php echo $row['id_siswa'];?> class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href=del-sis.php?id_siswa=<?php echo $row['id_siswa'];?> class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>        
                            </tr>
                    <?php }?>
                    </table>
                    
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
                </div>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
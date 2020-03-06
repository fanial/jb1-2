<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$nis = $_POST['nis'];
$nama = $_POST['nama'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin

		// buat session login dan username
		$_SESSION['nis'] = $nis;
		$_SESSION['nama'] = $nama;
		// alihkan ke halaman dashboard admin
		header("location:halaman-siswa.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login-sis.php?pesan=gagal");
	}



?>
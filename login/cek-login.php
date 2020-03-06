
<?php 

session_start();

// menghubungkan file php dengan koneksi ke database mysqli


include '../koneksi.php';

// menerima data yang disubmit dari form login multi user

$username = $_POST['username'];

$password = md5($_POST["password"]);;
// seleksi data user dengan username dan password apakah sesuai atau tidak
$login = mysqli_query($koneksi,"SELECT*FROM user WHERE username='$username' AND password='$password'");

// hitung jumlah data yang ditemukan dari form login

$cek = mysqli_num_rows($login);

// mengcek apakah username dan password ditemukan pada database yang ada


if($cek > 0){

 $data = mysqli_fetch_assoc($login);


 // fungsi login sebagai admin


 if($data['level']=="admin"){

  // buat session login dan username agar keamanan lebih tinggi


  $_SESSION['username'] = $username;

  $_SESSION['level'] = "admin";

  // pindahkan ke halaman dashboard admin

  header("location:../dashboard.php");

 }else if($data['level']=="siswa"){

  // buat session login dan username agar keamanan lebih tinggi

  $_SESSION['username'] = $username;

  $_SESSION['level'] = "siswa";

  // pindahkan ke halaman dashboard pengurus

  header("location:halaman-siswa.php");

 }else{

  // pindahkan ke halaman login kembali


  header("location:../index.php?pesan=gagal");

 }

}else{

 header("location:../index.php?pesan=gagal");

}

?>
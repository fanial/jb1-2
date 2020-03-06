<?php
$koneksi = mysqli_connect (
    "localhost","root","","sekolah"
);
if (!$koneksi){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
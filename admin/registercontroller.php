<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$ubah_nama = mysqli_real_escape_string($koneksi, $nama);
// // menambah data
// $rowSQL = mysqli_query( "SELECT MAX( id ) AS max FROM `users`;" );
// $row = mysqli_fetch_array( $rowSQL );
// $largestNumber = $row['max'];

if($password != $c_password){
    header("location:register.php?pesan=Konfirmasi password harus sama dengan password !");
    exit;
}

if((!empty($ubah_nama)) && (!empty($username)) && (!empty($password))){
    $query = mysqli_query($koneksi,"INSERT INTO `users` (`nama`, `username`, `password`) VALUES ('$ubah_nama', '$username', '$password');");
    header("location:register.php?pesan=Pendaftaran Berhasil !");
}
else{
    header("location:register.php?pesan=Maaf, tidak boleh ada field yang kosong !");
}

?>
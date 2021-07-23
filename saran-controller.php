<?php

include 'admin/koneksi.php';

    $date = date("Y-m-d");
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $saran = $_POST['saran'];

    $sql = "INSERT INTO saran VALUES(NULL, '$date', '$nama', '$email', '$saran')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?pesan=Terima Kasih Atas Saran dan Masukan Anda !#saranpendapat");
        exit;
    }else{
        echo mysqli_error($koneksi);
    }
?>
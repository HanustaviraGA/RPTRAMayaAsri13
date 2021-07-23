<?php
    include "../koneksi.php";
    session_start();
    
    $data = $_REQUEST;

    switch($data['aksi']){
        case 'hapus' :
            $id = $data['id'];
            $sql = "DELETE FROM saran WHERE id='$id'";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        default:
        echo 'gk masuk';
            break;
    }
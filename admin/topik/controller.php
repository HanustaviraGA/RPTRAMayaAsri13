<?php

    include "../koneksi.php";

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $nama = $data['nama'];
            $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
            $sql = "INSERT INTO topik(nama) VALUES('$ubah_nama')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=tambah");
                exit;
            }
            break;
                case 'ubah' :
                $nama = $data['nama'];
                $id = $data['id'];
                $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
                $sql = "UPDATE topik SET nama='$ubah_nama' WHERE id_topik='$id'";

                $query = mysqli_query($koneksi, $sql);
                if($query){

                header("Location: index.php?status=success&aksi=ubah");
                exit;
                }
                break;
        case 'hapus' :
            $id_topik = $data['id_topik'];
            $sql = "DELETE FROM topik WHERE id_topik='$id_topik'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        default:
            echo 'gk masuk';
    }
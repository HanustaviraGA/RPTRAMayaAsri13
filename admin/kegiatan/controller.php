<?php
    include "upload.php";
    include "../koneksi.php";
    session_start();
    
    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $tanggal = date("Y-m-d");
            $judul = $data['judul'];
            $gambar = upload();
            $status = isset($data['status']) ? 1 : 0;
            $admin = $_SESSION['nama'];
            $deskripsi = $data['deskripsi'];
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
            $sql = "INSERT INTO gambar VALUES(NULL, '$tanggal', '$ubah_judul', '$ubah_deskripsi', '$gambar', '$admin', '$status')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=tambah");
                exit;
            }else{
                echo mysqli_error($koneksi);
            }
            break;
        case 'ubah' :
            $id_gambar = $data['id_gambar'];
            $tanggal = date("Y-m-d");
            $judul = $data['judul'];
            $deskripsi = $data['deskripsi'];
            $status = isset($data['status']) ? 1 : 0;
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
            if(isset($_FILES["gambar"]) && !empty($_FILES["gambar"]["name"])){
                $filename = "../../kegiatan/img/".$data['old_img'];
                if(file_exists($filename)){
                    unlink($filename);
                }
                $gambar = upload();

                $sql = "UPDATE gambar SET judul='$ubah_judul', isi='$ubah_deskripsi', gambar='$gambar', status='$status' WHERE id_gambar='$id_gambar'";
            }else{
                $sql = "UPDATE gambar SET judul='$ubah_judul', isi='$ubah_deskripsi', status='$status' WHERE id_gambar='$id_gambar'";
            }

            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=ubah");
                exit;
            }
            break;
        case 'hapus' :
            $filename = "../../kegiatan/img/".$data['img'];

            if(file_exists($filename)){
                unlink($filename);
            }

            $id_gambar = $data['id_gambar'];
            $sql = "DELETE FROM gambar WHERE id_gambar='$id_gambar'";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        case "status":
            $id_gambar = $data['id_gambar'];
            $status = $data['status'] == 1 ? 0 : 1;
            $sql = "UPDATE gambar SET status='$status' WHERE id_gambar='$id_gambar'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=ubah");
                exit;
            }
            break;
        default:
        echo 'gk masuk';
            break;
    }
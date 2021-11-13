<?php
    include "upload.php";
    include "../koneksi.php";
    session_start();
    
    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $date = date("Y-m-d");
            $judul = $data['judul'];
            $isi = $data['isi'];
            $gambar = upload();
            $status = isset($data['status']) ? 1 : 0;

            $admin = $_SESSION['nama'];
            $topik = $data['topik'];
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_isi = mysqli_real_escape_string($koneksi, $isi);
            // $sql = "INSERT INTO artikel(tanggal, judul, gambar, isi, admin, status, id_topik) VALUES('$date', '$judul', '$gambar', '$isi', '$admin', '$status', '$topik')";
            $sql = "INSERT INTO artikel(tanggal, judul, gambar, isi, admin, status, id_topik) VALUES('$date', '$ubah_judul', '$gambar', '$ubah_isi', '$admin', '$status', '$topik')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=tambah");
                exit;
            }else{
                echo mysqli_error($koneksi);
            }
            break;
        case 'ubah' :
            $id_artikel = $data['id_artikel'];
            $date = date("Y-m-d");
            $judul = $data['judul'];
            $isi = $data['isi'];
            $status = $data['status'] ? 1 : 0;
            $topik = $data['topik'];
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_isi = mysqli_real_escape_string($koneksi, $isi);
            if(isset($_FILES["gambar"]) && !empty($_FILES["gambar"]["name"])){
                $filename = '../../artikel/img/'.$data['old_img'];
                if(file_exists($filename)){
                    unlink($filename);
                }
                $gambar = upload();

                $sql = "UPDATE artikel SET judul='$ubah_judul', gambar='$gambar', isi='$ubah_isi', status='$status',id_topik='$topik' WHERE
                id_artikel='$id_artikel'";
            }else{
                $sql = "UPDATE artikel SET judul='$ubah_judul', isi='$ubah_isi', status='$status',id_topik='$topik' WHERE id_artikel='$id_artikel'";
            }

            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=ubah");
                exit;
            }
            break;
        case 'hapus' :
            $filename = '../../artikel/img/'.$data['img'];

            if(file_exists($filename)){
                unlink($filename);
            }

            $id_artikel = $data['id_artikel'];
            $sql = "DELETE FROM artikel WHERE id_artikel='$id_artikel;'";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        case "status":
            $id_artikel = $data['id_artikel'];
            $status = $data['status'] == 1 ? 0 : 1;
            $sql = "UPDATE artikel SET status='$status' WHERE id_artikel='$id_artikel'";
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
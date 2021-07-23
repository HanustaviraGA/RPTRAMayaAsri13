<?php
    include "../koneksi.php";
    session_start();
    
    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $tanggal = date("Y-m-d");
            $judul = $data['judul'];
            $deskripsi = $data['deskripsi'];
            $video = $data['video'];
            $admin = $_SESSION['nama'];
            $status = isset($data['status']) ? 1 : 0;
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
            $sql = "INSERT INTO video VALUES(NULL, '$tanggal', '$ubah_judul', '$ubah_deskripsi', '$video', '$admin', '$status')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index-video.php?status=success&aksi=tambah");
                exit;
            }else{
                echo mysqli_error($koneksi);
            }
            break;
        case 'ubah' :
            $id_video = $data['id_video'];
            $tanggal = date("Y-m-d");
            $judul = $data['judul'];
            $deskripsi = $data['deskripsi'];
            $status = isset($data['status']) ? 1 : 0;
            $video = $data['video'];
            $ubah_judul = mysqli_real_escape_string($koneksi, $judul);
            $ubah_deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);    
            $sql = "UPDATE video SET tanggal='$tanggal', judul='$ubah_judul', isi='$ubah_deskripsi', video='$video', status='$status'  WHERE id_video='$id_video'";
    
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index-video.php?status=success&aksi=ubah");
                exit;
            }
            break;
        case 'hapus' :
            $id_video = $data['id_video'];
            $sql = "DELETE FROM video WHERE id_video='$id_video;'";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location: index-video.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        case "status":
            $id_video = $data['id_video'];
            $status = $data['status'] == 1 ? 0 : 1;
            $sql = "UPDATE video SET status='$status' WHERE id_video='$id_video'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index-video.php?status=success&aksi=ubah");
                exit;
            }
            break;
        default:
        echo 'gk masuk';
            break;
    }
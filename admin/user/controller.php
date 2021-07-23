<?php

    include "../koneksi.php";

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $nama = $data['nama'];
            $username = $data['username'];
            $password = $data['password'];
            $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
            $sql = "INSERT INTO users VALUES(NULL, '$ubah_nama', '$username', '$password')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=tambah");
                exit;
            }
            break;
                case 'ubah' :
                $nama = $data['nama'];
                $username = $data['username'];
                $password = $data['password'];
                $id_user = $data['id_user'];
                $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
                $password ? $sql = "UPDATE users SET username='$username', nama='$ubah_nama', password='$password' WHERE id='$id_user'" : $sql = "UPDATE users SET username='$username', nama='$ubah_nama' WHERE id='$id_user'";
                
                $query = mysqli_query($koneksi, $sql);
                if($query){
                    header("Location: index.php?status=success&aksi=ubah");
                    exit;
                }
                break;
        case 'hapus' :
            $id_user = $data['id_user'];
            $sql = "DELETE FROM users WHERE id='$id_user'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        default:
            echo 'gk masuk';
    }
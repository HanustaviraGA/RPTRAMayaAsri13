<?php

    include "../koneksi.php";
    include "upload.php";

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            $nama = $data['nama'];
            $jabatan = $data['jabatan'];
            $gambar = upload();
            $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
            $sql = "INSERT INTO struktur(nama, id_jabatan, gambar) VALUES('$ubah_nama', '$jabatan', '$gambar')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=tambah");
                exit;
            }
            break;
                case 'ubah' :
                $nama = $data['nama'];
                $jabatan = $data['jabatan'];
                $id_struktur = $data['id_struktur'];
                $ubah_nama = mysqli_real_escape_string($koneksi, $nama);
                if(isset($_FILES["gambar"]) && !empty($_FILES["gambar"]["name"])){
                    $filename = '../../tentang_kami/img_struktur/'.$data['old_img'];
                    if(file_exists($filename)){
                        unlink($filename);
                    }
                    $gambar = upload();
                    $sql = "UPDATE struktur SET nama='$ubah_nama', id_jabatan='$jabatan', gambar='$gambar' WHERE id_struktur='$id_struktur'";
                }else{
                    $sql = "UPDATE struktur SET nama='$ubah_nama', id_jabatan='$jabatan' WHERE id_struktur='$id_struktur'";
                }
                
                $query = mysqli_query($koneksi, $sql);
                if($query){
                    header("Location: index.php?status=success&aksi=ubah");
                    exit;
                }else{
                    echo mysqli_error($koneksi);
                }
                break;
        case 'hapus' :
            $filename = '../../tentang_kami/img_struktur/'.$data['img'];

            if(file_exists($filename)){
                unlink($filename);
            }
            $id_struktur = $data['id_struktur'];
            $sql = "DELETE FROM struktur WHERE id_struktur='$id_struktur'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        case 'detail_jabatan' :
            $detail="<ul class='list-group'>";
            $id = $data['id'];
            $sql = "SELECT * FROM detail_tupoksi WHERE id_tupoksi='$id'";
            $query = mysqli_query($koneksi,$sql);
            while($data = mysqli_fetch_assoc($query)){
                $tugas_pokok = $data['tugas_pokok'];
                $detail.="<li class='list-group-item'>$tugas_pokok</li>";
            }
            $detail.="</ul>";

            $sql2 = "SELECT * FROM tupoksi WHERE id='$id'";
            $query = mysqli_query($koneksi,$sql2);
            $misi = mysqli_fetch_array($query);

            header('Content-Type: application/json');
            $return = [
                'tugas_pokok' => $detail,
                'misi' => $misi['misi']
            ];
            echo json_encode($return);
            break;
        default:
            echo 'gk masuk';
    }
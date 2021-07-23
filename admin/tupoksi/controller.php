<?php

    include "../koneksi.php";

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah' :
            // data
            $jabatan = $data['jabatan'];
            $misi = $data['misi'];
            $tupok = $data['tupok'];
            $ubah_jabatan = mysqli_real_escape_string($koneksi, $jabatan);
            $ubah_misi = mysqli_real_escape_string($koneksi, $misi);
            // insert tupoksi
            $sql = "INSERT INTO tupoksi(posisi, misi) VALUES('$ubah_jabatan', '$ubah_misi')";
            $query = mysqli_query($koneksi, $sql);
            // insert detail tupoksi
            if($query){
                $new_id = mysqli_insert_id($koneksi);
                for($a=0; $a<count($tupok); $a++){
                    $data_tupok = $tupok[$a];
                    $sql2 = "INSERT INTO detail_tupoksi(tugas_pokok, id_tupoksi) VALUES('$data_tupok', '$new_id')";
                    $query = mysqli_query($koneksi, $sql2);
                }
                if($query){
                    header("Location: index.php?status=success&aksi=tambah");
                    exit;
                }
            }
            break;
                case 'ubah' :
                // data
                $id = $data['id'];
                $posisi = $data['posisi'];
                $misi = $data['misi'];
                $tupok = $data['tupok'];
                $ubah_posisi = mysqli_real_escape_string($koneksi, $posisi);
                $ubah_misi = mysqli_real_escape_string($koneksi, $misi);
                // update
                $sql = "UPDATE tupoksi SET misi='$ubah_misi', posisi='$ubah_posisi' WHERE id='$id'";
                $query = mysqli_query($koneksi, $sql);
                if($query){
                    // delete detail lama
                    $sql2 = "DELETE FROM detail_tupoksi WHERE id_tupoksi='$id'";
                    $query = mysqli_query($koneksi, $sql2);
                    if($query){
                        // insert detail baru
                        for($a=0; $a<count($tupok); $a++){ 
                            $data_tupok=$tupok[$a];
                            $sql3="INSERT INTO detail_tupoksi(tugas_pokok, id_tupoksi) VALUES('$data_tupok', '$id')"; 
                            $query=mysqli_query($koneksi, $sql3); 
                        }
                        if($query){
                            header("Location: index.php?status=success&aksi=ubah");
                            exit;
                        }
                    }else{
                        echo 'gagaL hapus';
                    }
                }
                break;
        case 'hapus' :
            $id = $data['id'];
            $sql = "DELETE FROM tupoksi WHERE id='$id'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("Location: index.php?status=success&aksi=hapus");
                exit;
            }    
            break;
        default:
            echo 'gk masuk';
    }
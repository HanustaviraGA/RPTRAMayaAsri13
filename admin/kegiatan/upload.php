<?php

    function upload(){
        $data = $_FILES;
        //gambar
        $nama_gambar = $data['gambar']['name'];
        $tmp_name = $data['gambar']['tmp_name'];

        //cek gambar
        $ekstensi_gambar = ['jpg', 'jpeg', 'png'];
        $ekstensi_gambar_upload = explode('.', $nama_gambar);
        $ekstensi = strtoLower(end($ekstensi_gambar_upload));

        if(!in_array($ekstensi, $ekstensi_gambar)){
            header("Location: tambah.php?status=error&aksi=tambah&pesan=Ekstensi file tidak diterima");
            exit;
        }

        $nama_file_baru = uniqid() . '.' . $ekstensi;

        move_uploaded_file($tmp_name, '../../kegiatan/img/' . $nama_file_baru);

        return $nama_file_baru;
    }
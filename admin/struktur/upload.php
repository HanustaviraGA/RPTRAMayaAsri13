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
            $aksi = $_GET['aksi'] == 'tambah' ? 'tambah' : 'ubah';
            header("Location: tambah.php?status=error&aksi=$aksi&pesan=Ekstensi file tidak diterima");
            exit;
        }

        $nama_file_baru = uniqid() . '.' . $ekstensi;

        move_uploaded_file($tmp_name, '../../tentang_kami/img_struktur/' . $nama_file_baru);

        return $nama_file_baru;
    }
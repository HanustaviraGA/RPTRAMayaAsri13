<?php
    include '../koneksi.php';
    session_start();
    if(!isset($_SESSION['status']) && !$_SESSION['status'] == "sudah_login") {
        header("Location: ../login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/logo-rptralingkaranfix.png">
    <title>Ruang Publik Terpadu Ramah Anak - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- font awesome -->
    <script src="https://use.fontawesome.com/b107056304.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatables -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- swal -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- text editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

</head>

<body id="page-top">
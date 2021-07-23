<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM saran WHERE id='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
    
    // $isi = $data['isi'];
?>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .img-fluid {
        max-width: 40%;
    }

    #textarea {
        -moz-appearance: textfield-multiline;
        -webkit-appearance: textarea;
        border: 1px solid gray;
        font: medium -moz-fixed;
        font: -webkit-small-control;
        height: auto;
        overflow: auto;
        padding: .375rem .75rem;
        resize: none;
        width: 100%;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;

    }
</style>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Saran</h1>
    <p class="mb-4">Detail Saran </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Saran</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="<?= $data['tanggal'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Saran</label>
                <textarea name="saran" id="saran" readonly class="form-control"><?= $data['saran'] ?></textarea>
            </div>

            <a href="mailto:<?= $data['email'] ?>?subject=Feedback RPTRA Maya Asri 13" class="btn btn-primary float-right">Balas</a>
            <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Saran</h1>
    <p class="mb-4">Detail Saran </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Saran</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="judul" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="judul" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="text" class="form-control" name="judul" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Saran</label>
                <input type="text" class="form-control" name="judul" readonly>
            </div>

            <a href="#" class="btn btn-primary float-right">Balas</a>
            <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>

<?php
}    
?>


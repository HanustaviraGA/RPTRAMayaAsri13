<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";

    $id = $_GET['id_video'];
    $sql = "SELECT * FROM video WHERE id_video='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
?>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .img-fluid {
        max-width: 40%;
    }
</style>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Video</h1>
    <p class="mb-4">Edit Video </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller-video.php?aksi=ubah" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" maxlength="100" value="<?= $data['judul'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" maxlength="255" value="<?= $data['isi'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link Video</label>
                    <input type="text" class="form-control" name="video" maxlength="100" value="<?= $data['video'] ?>" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                            <?= $data['status'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="check">Tampilkan</label>
                    </div>
                </div>
                <input type="hidden" name="id_video" value="<?=$id?>">
                <button type="submit" id="submit" class="btn btn-warning float-right">Ubah</button>
                <a href="index-video.php" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
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
    <h1 class="h3 mb-2 text-gray-800">Video</h1>
    <p class="mb-4">Edit Video </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
        </div>
        <div class="card-body">
            <form method="" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['isi'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link Video</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['video'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                            <?= $data['status'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="check">Tampilkan</label>
                    </div>
                </div>
                <input type="hidden" name="id_video" value="<?=$id?>">
                <a href="#" class="btn btn-warning float-right">Ubah</a>
                <a href="index-video.php" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>

<?php
}    
?>


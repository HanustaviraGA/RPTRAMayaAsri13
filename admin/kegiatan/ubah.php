<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";

    $id = $_GET['id_gambar'];
    $sql = "SELECT * FROM gambar WHERE id_gambar='$id'";
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
        <h1 class="h3 mb-2 text-gray-800">Foto</h1>
        <p class="mb-4">Edit Foto </p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="controller.php?aksi=ubah" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="<?= $data['isi'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label">Gambar Lama</label><br>
                        <input type="hidden" name="old_img" value="<?= $data['gambar'] ?>">
                        <img src="../../kegiatan/img/<?= $data['gambar'] ?>" class="img-fluid"><br><br>
                        <input type="file" class="form-control" name="gambar" id="img" onchange="previewFile(this);">
                        <small style="color:red;">Kosongkan jika tidak ingin diganti</small><br>
                        <div id="new_img" style="display: none;">
                            <label class="form-check-label" id="new_img">Gambar Baru</label>
                            <button class="btn btn-danger btn-sm" type="button" id='batal'>Batal</button><br><br>
                            <img src="" class="img-fluid" id="img_des" style="display: none;"><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                                <?= $data['status'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="check">Tampilkan</label>
                        </div>
                    </div>
                    <input type="hidden" name="id_gambar" value="<?=$id?>">
                    <button type="submit" id="submit" class="btn btn-warning float-right">Ubah</button>
                    <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
                </form>
            </div>

        </div>
    </div>


    <?php 
        include "../layout/admin-footer.php";
    ?>

    <script src="../js/artikel.js"></script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Foto</h1>
    <p class="mb-4">Edit Foto </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
        </div>
        <div class="card-body">
            <form method="" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar Lama</label><br>
                    <input type="hidden" name="old_img" value="<?= $data['gambar'] ?>">
                    <img src="../../kegiatan/img/<?= $data['gambar'] ?>" class="img-fluid"><br><br>
                    <input type="text" class="form-control" name="judul" readonly>
                    <small style="color:red;">Kosongkan jika tidak ingin diganti</small><br>
                    <div id="new_img" style="display: none;">
                        <label class="form-check-label" id="new_img">Gambar Baru</label>
                        <button class="btn btn-danger btn-sm" type="button" id='batal'>Batal</button><br><br>
                        <img src="" class="img-fluid" id="img_des" style="display: none;"><br>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                            <?= $data['status'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="check">Tampilkan</label>
                    </div>
                </div>
                <input type="hidden" name="id_gambar" value="<?=$id?>">
                <a href="#" class="btn btn-warning float-right">Ubah</a>
                <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>

    <script src="../js/artikel.js"></script>

<?php
}    
?>


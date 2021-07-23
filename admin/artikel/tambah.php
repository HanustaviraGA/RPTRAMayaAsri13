<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";
?>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .img-fluid {
        max-width: 30%;
    }
</style>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
    <p class="mb-4">Tambah Artikel </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=tambah" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" id="isi" class="form-control" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar" accept="image/*" id="img"
                        onchange="previewFile(this);" required><br>
                    <img src="" class="img-fluid" id="img_des" style="display: none;">
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Topik</label>
                    <select name="topik" class="form-control">
                        <option value="">--- Pilih Topik ---</option>
                        <?php 
                            $sqlTopik = "SELECT * FROM topik";
                            $queryTopik = mysqli_query($koneksi,$sqlTopik);
                        ?>
                        <?php while($dataTopik = mysqli_fetch_array($queryTopik)):?>
                            <option value="<?= $dataTopik['id_topik'] ?>"><?= $dataTopik['nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="1" id="check">
                        <label class="form-check-label" for="check">Tampilkan</label>
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Tambah</button>
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
    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
    <p class="mb-4">Tambah Artikel </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
        </div>
        <div class="card-body">
            <form method="" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <input type="text" class="form-control" name="isi" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar</label>
                    <input type="text" class="form-control" name="gambar" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Topik</label>
                    <input type="text" class="form-control" name="topik" readonly>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="status" type="checkbox" value="1" id="check">
                        <label class="form-check-label" for="check">Tampilkan</label>
                    </div>
                </div>
                <a href="#" class="btn btn-primary float-right">Tambah</a>
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


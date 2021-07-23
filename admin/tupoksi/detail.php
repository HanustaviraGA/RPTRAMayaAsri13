<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM tupoksi WHERE id='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);

    $sql = "SELECT * FROM detail_tupoksi WHERE id_tupoksi='$id'";
    $query = mysqli_query($koneksi,$sql);
    $a = 1;
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tupoksi Jabatan</h1>
    <p class="mb-4">Detail Tupoksi Jabatan </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tupoksi Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="posisi" value="<?= $data['posisi'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" id="misi" class="form-control" readonly><?= $data['misi'] ?></textarea>
                </div>
                <div class="mb-3 flex-justify" id="inputList">
                    <label class="form-check-label">Tugas Pokok</label>
                    <div id="target">
                        <?php while($data2 = mysqli_fetch_array($query)):?>
                        <input type="text" class="form-control mb-2" name="tupok[]" readonly
                            value="<?= $data2['tugas_pokok'] ?>">
                        <?php endwhile; ?>
                    </div>
                </div>
                <a href="index.php" class="btn btn-info float-right">Kembali</a>
            </form>
        </div>

    </div>
</div>


<?php 
    include "../layout/admin-footer.php";
?>
<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";
    
    $id = $_GET['id_struktur'];
    $sql = "SELECT * FROM struktur JOIN tupoksi ON tupoksi.id = struktur.id_jabatan WHERE id_struktur='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);

    $sql = "SELECT * FROM tupoksi";
    $query = mysqli_query($koneksi,$sql);

    $id_tupok = $data['id'];
    $sql = "SELECT * FROM detail_tupoksi WHERE id_tupoksi='$id_tupok'";
    $query2 = mysqli_query($koneksi,$sql);
?>
<style>
    /* .img-fluid {
        max-width: 30%;
    } */
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur</h1>
    <p class="mb-4">Detail Struktur </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Struktur</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar</label><br>
                    <img src="../../tentang_kami/img_struktur/<?=$data['gambar']?>" class="img-fluid rounded-circle"
                        width="200px" height="200px">
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan" disabled>
                        <option value="">--- Pilih Jabatan ---</option>
                        <?php while($jabatan = mysqli_fetch_array($query)): ?>
                        <option value="<?= $jabatan['id'] ?>" <?=$data['id'] == $jabatan['id'] ? 'selected' : ''?>>
                            <?= $jabatan['posisi'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" id="misi" value="<?= $data['misi'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tugas Pokok</label>
                    <div id="target">
                        <?php while($detail_tupoksi = mysqli_fetch_array($query2)):?>
                        <ul class='list-group'>
                            <li class='list-group-item'><?= $detail_tupoksi['tugas_pokok'] ?></li>
                        </ul>
                        <?php endwhile;?>
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
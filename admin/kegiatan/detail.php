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
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Foto</h1>
    <p class="mb-4">Detail Foto </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="<?= $data['isi'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-check-label">Gambar</label><br>
                <img src="../../kegiatan/img/<?= $data['gambar'] ?>" class="img-fluid">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="<?= $data['tanggal'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Admin</label>
                <input type="text" class="form-control" value="<?= $data['admin'] ?>" readonly>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                        <?= $data['status'] == 1 ? 'checked' : '' ?> disabled>
                    <label class="form-check-label" for="check">Tampilkan</label>
                </div>
            </div>

            <a href="index.php" class="btn btn-info float-right">Kembali</a>
        </div>

    </div>
</div>


<?php 
    include "../layout/admin-footer.php";
?>
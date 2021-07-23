<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";

    $id = $_GET['id_topik'];

    $sql = "SELECT * FROM topik WHERE id_topik='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Topik</h1>
    <p class="mb-4">Ubah Topik </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Topik</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah">
                <div class="mb-3">
                    <label class="form-label">Nama Topik</label>
                    <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" required>
                </div>
                <button type="submit" id="submit" class="btn btn-warning float-right">Ubah</button>
                <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
                <input type="hidden" name="id" value="<?=$id?>">
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
    <h1 class="h3 mb-2 text-gray-800">Topik</h1>
    <p class="mb-4">Ubah Topik </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Topik</h6>
        </div>
        <div class="card-body">
            <form method="" action="">
                <div class="mb-3">
                    <label class="form-label">Nama Topik</label>
                    <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" readonly>
                </div>
                <a href="#" class="btn btn-warning float-right">Ubah</a>
                <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
                <input type="hidden" name="id" value="<?=$id?>">
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


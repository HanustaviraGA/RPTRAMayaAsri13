<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";

?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Topik</h1>
    <p class="mb-4">Tambah Topik </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Topik</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=tambah">
                <div class="mb-3">
                    <label class="form-label">Nama Topik</label>
                    <input type="text" class="form-control" name="nama" required>
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

<?php
} else {
?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Topik</h1>
        <p class="mb-4">Tambah Topik </p>
        <p>Insufficient Permission</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Topik</h6>
            </div>
            <div class="card-body">
                <form method="" action="">
                    <div class="mb-3">
                        <label class="form-label">Nama Topik</label>
                        <input type="text" class="form-control" name="nama" readonly>
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

<?php
}    
?>


<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";

    $id = $_GET['id_user'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
    <p class="mb-4">Edit Admin </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">

                </div>
                <div class="mb-3">
                    <label class="form-check-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2">
                    <small style="color:red;">Kosongkan jika tidak ingin diganti</small>
                </div>
                <input type="hidden" name="id_user" value="<?=$id?>">
                <button type="submit" id="submit" class="btn btn-warning float-right">Ubah</button>
                <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>
    <script>
    $("#submit").on("click", function (event) {
        var pass = $("#password").val();
        var pass2 = $("#password2").val();;

        if (pass != pass2) {
            event.preventDefault();
            swal("Password tidak sama", "", "error");
        }
    });
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
    <p class="mb-4">Edit Admin </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
        </div>
        <div class="card-body">
            <form method="" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Password</label>
                    <input type="text" class="form-control" name="judul" readonly>

                </div>
                <div class="mb-3">
                    <label class="form-check-label">Konfirmasi Password</label>
                    <input type="text" class="form-control" name="judul" readonly>
                    <small style="color:red;">Kosongkan jika tidak ingin diganti</small>
                </div>
                <input type="hidden" name="id_user" value="<?=$id?>">
                <a href="#" class="btn btn-warning float-right">Ubah</a>
                <a href="index.php" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>

    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>
    <script>
    $("#submit").on("click", function (event) {
        var pass = $("#password").val();
        var pass2 = $("#password2").val();;

        if (pass != pass2) {
            event.preventDefault();
            swal("Password tidak sama", "", "error");
        }
    });
    </script>

<?php
}    
?>


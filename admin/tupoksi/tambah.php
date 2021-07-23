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
    <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
    <p class="mb-4">Tambah Jabatan </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=tambah">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" id="misi" class="form-control" rows="10" required></textarea>
                </div>
                <div class="mb-3 flex-justify" id="inputList">
                    <label class="form-check-label">Tugas Pokok</label>
                    <button type="button" class="btn btn-primary ml-2 mb-2" id="plusInput" style="font-size: 10px"><i
                            class="fas fa-plus"></i></button>
                    <input type="text" class="form-control mb-2" name="tupok[]" required>
                    <div id="target">

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
    <script>
    $('#plusInput').on('click', function () {
        var shot =
            ' <div class="input-group mb-3 parent"><input type="text" name="tupok[]" class="form-control" required><div class="input-group-append"><button class="btn btn-danger del-input" type="button" onclick="del(this)" style="font-size: 15px"><i class="fas fa-trash"></i></button></div></div>';
        $('#target').append(shot);
    });

    function del(a) {
        a.closest('.parent').remove();
    }
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
    <p class="mb-4">Tambah Jabatan </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="" action="">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3 flex-justify" id="inputList">
                    <label class="form-check-label">Tugas Pokok</label>
                    <input type="text" class="form-control" name="judul" readonly>
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
    <script>
    $('#plusInput').on('click', function () {
        var shot =
            ' <div class="input-group mb-3 parent"><input type="text" name="tupok[]" class="form-control" required><div class="input-group-append"><button class="btn btn-danger del-input" type="button" onclick="del(this)" style="font-size: 15px"><i class="fas fa-trash"></i></button></div></div>';
        $('#target').append(shot);
    });

    function del(a) {
        a.closest('.parent').remove();
    }
    </script>

<?php
}    
?>


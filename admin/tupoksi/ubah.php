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

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tupoksi Jabatan</h1>
    <p class="mb-4">Edit Tupoksi Jabatan </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tupoksi Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="posisi" value="<?= $data['posisi'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" id="misi" class="form-control" rows="10"
                        required><?= $data['misi'] ?></textarea>
                </div>
                <div class="mb-3 flex-justify" id="inputList">
                    <label class="form-check-label">Tugas Pokok</label>
                    <button type="button" class="btn btn-primary ml-2 mb-2" id="plusInput" style="font-size: 10px"><i
                            class="fas fa-plus"></i></button>
                    <div id="target">
                        <?php while($data2 = mysqli_fetch_array($query)):?>
                        <?php if($a==1): $a++?>
                        <input type="text" class="form-control mb-2" name="tupok[]" value="<?= $data2['tugas_pokok'] ?>"
                            required>
                        <?php else:  ?>
                        <div class="input-group mb-3 parent">
                            <input type="text" name="tupok[]" class="form-control" value="<?= $data2['tugas_pokok'] ?>"
                                required>
                            <div class=" input-group-append">
                                <button class="btn btn-danger del-input" type="button" onclick="del(this)"
                                    style="font-size: 15px">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$id?>">
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
    $('#plusInput').on('click', function () {
        var shot =
            '<div class="input-group mb-3 parent"><input type="text" name="tupok[]" class="form-control" required><div class="input-group-append"><button class="btn btn-danger del-input" type="button" onclick="del(this)"style="font-size: 15px"><i class="fas fa-trash"></i></button></div></div>';
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
    <h1 class="h3 mb-2 text-gray-800">Tupoksi Jabatan</h1>
    <p class="mb-4">Edit Tupoksi Jabatan </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">    
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tupoksi Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="" action="">
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="posisi" value="<?= $data['posisi'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3 flex-justify" id="inputList">
                    <label class="form-check-label">Tugas Pokok</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <input type="hidden" name="id" value="<?=$id?>">
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
    $('#plusInput').on('click', function () {
        var shot =
            '<div class="input-group mb-3 parent"><input type="text" name="tupok[]" class="form-control" required><div class="input-group-append"><button class="btn btn-danger del-input" type="button" onclick="del(this)"style="font-size: 15px"><i class="fas fa-trash"></i></button></div></div>';
        $('#target').append(shot);
    });

    function del(a) {
        a.closest('.parent').remove();
    }
    </script>

<?php
}    
?>


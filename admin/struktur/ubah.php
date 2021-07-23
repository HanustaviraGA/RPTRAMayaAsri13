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

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur</h1>
    <p class="mb-4">Ubah Struktur </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Struktur</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=ubah" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="old_img" value="<?= $data['gambar'] ?>">
                    <label class="form-check-label">Gambar Lama</label><br>
                    <img src="../../tentang_kami/img_struktur/<?=$data['gambar']?>" class="img-fluid rounded-circle"
                        width="200px" height="200px">
                    <input type="file" class="form-control" name="gambar" id="img" onchange="previewFile(this);">
                    <small style="color:red;">Kosongkan jika tidak ingin diganti</small><br>
                    <div id="new_img" style="display: none;">
                        <label class="form-check-label" id="new_img">Gambar Baru</label>
                        <button class="btn btn-danger btn-sm" type="button" id='batal'>Batal</button><br><br>
                        <img src="" class="img-fluid rounded-circle" width="200px" height="200px" id="img_des"><br>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan" required>
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
                <input type="hidden" name="id_struktur" value=<?= $id ?>>
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
    $("#jabatan").on('change', function () {
        $("#target").empty();
        id = $(this).val();
        $.ajax({
            url: "controller.php",
            type: "POST",
            data: "id=" + id + "&aksi=detail_jabatan",
            success: function (data) {
                $("#misi").val(data.misi);
                $("#target").append(data.tugas_pokok);
            },
            error: function (data) {
                console.log('err');
            }
        });

    });

    function previewFile(input) {
        var file = $("#img").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#new_img").show();
                $("#img_des").attr("src", reader.result);
                $("#img_des").show();
            }

            reader.readAsDataURL(file);
        }
    }

    $("#batal").on("click", function () {
        $(this).parent().hide();
        $("#img").val("");
    })
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur</h1>
    <p class="mb-4">Ubah Struktur </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">    
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Struktur</h6>
        </div>
        <div class="card-body">
            <form method="" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="old_img" value="<?= $data['gambar'] ?>">
                    <label class="form-check-label">Gambar Lama</label><br>
                    <img src="../../tentang_kami/img_struktur/<?=$data['gambar']?>" class="img-fluid rounded-circle"
                        width="200px" height="200px">
                    <input type="text" class="form-control" name="judul" readonly>
                    <small style="color:red;">Kosongkan jika tidak ingin diganti</small><br>
                    <div id="new_img" style="display: none;">
                        <label class="form-check-label" id="new_img">Gambar Baru</label>
                        <button class="btn btn-danger btn-sm" type="button" id='batal'>Batal</button><br><br>
                        <img src="" class="img-fluid rounded-circle" width="200px" height="200px" id="img_des"><br>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Jabatan</label>
                    <input type="text" class="form-control" name="judul" readonly>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tugas Pokok</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <input type="hidden" name="id_struktur" value=<?= $id ?>>
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
    $("#jabatan").on('change', function () {
        $("#target").empty();
        id = $(this).val();
        $.ajax({
            url: "controller.php",
            type: "POST",
            data: "id=" + id + "&aksi=detail_jabatan",
            success: function (data) {
                $("#misi").val(data.misi);
                $("#target").append(data.tugas_pokok);
            },
            error: function (data) {
                console.log('err');
            }
        });

    });

    function previewFile(input) {
        var file = $("#img").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#new_img").show();
                $("#img_des").attr("src", reader.result);
                $("#img_des").show();
            }

            reader.readAsDataURL(file);
        }
    }

    $("#batal").on("click", function () {
        $(this).parent().hide();
        $("#img").val("");
    })
    </script>

<?php
}    
?>


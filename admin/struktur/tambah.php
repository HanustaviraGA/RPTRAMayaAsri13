<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";
    
    $sql = "SELECT * FROM tupoksi";
    $query = mysqli_query($koneksi,$sql);
?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur</h1>
    <p class="mb-4">Tambah Struktur </p>
    <div class="card shadow mb-4">
       
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Struktur</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.php?aksi=tambah" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar" accept="image/*" id="img"
                        onchange="previewFile(this);" required><br>

                    <img src="" class="img-fluid rounded-circle" id="img_des" style="display: none;" width="200px"
                        height="200px">
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan" required>
                        <option value="">--- Pilih Jabatan ---</option>
                        <?php while($jabatan = mysqli_fetch_array($query)): ?>
                        <option value="<?= $jabatan['id'] ?>"><?= $jabatan['posisi'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" id="misi" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tugas Pokok</label>
                    <div id="target"></div>
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
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Struktur</h1>
    <p class="mb-4">Tambah Struktur </p>
    <p>Insufficient Permission</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Struktur</h6>
        </div>
        <div class="card-body">
            <form method="" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Gambar</label>
                    <input type="text" class="form-control" name="judul" readonly>

                    <img src="" class="img-fluid rounded-circle" id="img_des" style="display: none;" width="200px"
                        height="200px">
                </div>
                <div class="mb-3">
                    <label class="form-check-label">Jabatan</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <input type="text" class="form-control" name="judul" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tugas Pokok</label>
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
    </script>

<?php
}    
?>


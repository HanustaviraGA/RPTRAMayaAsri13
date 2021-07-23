<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";

    $sql = "SELECT * FROM gambar";
    $query = mysqli_query($koneksi,$sql);
?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Foto</h1>
        <p class="mb-4">Daftar Foto</p>

        <div class="row">
            <div class="col">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">Foto</h6>
                        <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th style="width:5%">Nomor</th>
                                        <th>Judul</th>
                                        <th>Admin</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th style="width:20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Judul</th>
                                        <th>Admin</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                    <tr role=" row" class="odd">
                                        <td class="sorting_1"><?= $a++ ?></td>
                                        <td><?= $data['judul'] ?></td>
                                        <td><?= $data['admin'] ?></td>
                                        <td><?= $data['tanggal'] ?></td>
                                        <td><?= $data['status'] == 1 ? "<p class='text-success'>Ditampilkan</p>"
                                        : "<p class='text-danger'>Disembunyikan</p>"
                                        ?></td>
                                        <td>
                                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <a class="btn btn-danger btn-sm del" data-nama="<?=$data['judul']?>"
                                                        data-id="<?= $data['id_gambar'] ?>"
                                                        data-img="<?=$data['gambar']?>">Delete</a>
                                                    <a href="detail.php?id_gambar=<?= $data['id_gambar'] ?>"
                                                        class="btn btn-info btn-sm">Detail</a>
                                                    <a href="ubah.php?id_gambar=<?= $data['id_gambar'] ?>"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <?php  if($data['status'] == 1): ?>
                                                    <a href="controller.php?id_gambar=<?= $data['id_gambar'] ?>&status=<?= $data['status'] ?>&aksi=status"
                                                        class="btn btn-success btn-sm">Status</a>
                                                    <?php  else: ?>
                                                    <a href="controller.php?id_gambar=<?= $data['id_gambar'] ?>&status=<?= $data['status']?>&aksi=status"
                                                        class="btn btn-danger btn-sm">Status</a>
                                                    <?php   endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php 
        include "../layout/admin-footer.php";
    ?>
    <script>
        $(".del").on("click", function () {
            nama = $(this).data('nama');
            id = $(this).data('id');
            img = $(this).data('img');

            swal({
                title: "Anda yakin ?",
                text: "Apa anda yakin ingin menghapus foto \n\"" + nama + "\"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = 'controller.php?id_gambar=' + id + '&img=' + img +
                        '&aksi=hapus';
                }
            });
        })
    </script>
<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Foto</h1>
    <p class="mb-4">Daftar Foto</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Foto</h6>
                    <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%">Nomor</th>
                                    <th>Judul</th>
                                    <th>Admin</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Judul</th>
                                    <th>Admin</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><?= $a++ ?></td>
                                    <td><?= $data['judul'] ?></td>
                                    <td><?= $data['admin'] ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['status'] == 1 ? "<p class='text-success'>Ditampilkan</p>"
                                    : "<p class='text-danger'>Disembunyikan</p>"
                                    ?></td>
                                    <td>
                                        <div class="btn-toolbar justify-content-between" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <a class="btn btn-danger btn-sm del">Delete</a>
                                                <a href="detail.php?id_gambar=<?= $data['id_gambar'] ?>"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="ubah.php?id_gambar=<?= $data['id_gambar'] ?>"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <?php  if($data['status'] == 1): ?>
                                                <a href="#" class="btn btn-success btn-sm">Status</a>
                                                <?php  else: ?>
                                                <a href="#" class="btn btn-danger btn-sm">Status</a>
                                                <?php   endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php 
    include "../layout/admin-footer.php";
    ?>
    <script>
    $(".del").on("click", function () {
        nama = $(this).data('nama');
        id = $(this).data('id');
        img = $(this).data('img');

        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus foto \n\"" + nama + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = 'controller.php?id_gambar=' + id + '&img=' + img +
                    '&aksi=hapus';
            }
        });
    })
    </script>

<?php
}    
?>


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
    <h1 class="h3 mb-2 text-gray-800">Tupoksi</h1>
    <p class="mb-4">Daftar Tupoksi Jabatan</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Tupoksi</h6>
                    <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%">Nomor</th>
                                    <th style="width:20%">Jabatan</th>
                                    <th>Misi</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Jabatan</th>
                                    <th>Misi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><?= $a++ ?></td>
                                    <td><?= $data['posisi'] ?></td>
                                    <td><?= $data['misi'] ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del" data-posisi="<?=$data['posisi']?>"
                                            data-id="<?= $data['id'] ?>">Delete</a>
                                        <a href="ubah.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="detail.php?id=<?= $data['id'] ?>"
                                            class="btn btn-info btn-sm">Detail</a>
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
        posisi = $(this).data('posisi');
        id = $(this).data('id');

        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus jabatan \n\"" + posisi + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = 'controller.php?id=' + id + '&aksi=hapus';
            }
        });
    })
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tupoksi</h1>
    <p class="mb-4">Daftar Tupoksi Jabatan</p>
    
    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Tupoksi</h6>
                    <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%">Nomor</th>
                                    <th style="width:20%">Jabatan</th>
                                    <th>Misi</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Jabatan</th>
                                    <th>Misi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><?= $a++ ?></td>
                                    <td><?= $data['posisi'] ?></td>
                                    <td><?= $data['misi'] ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del">Delete</a>
                                        <a href="ubah.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="detail.php?id=<?= $data['id'] ?>"
                                            class="btn btn-info btn-sm">Detail</a>
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
        posisi = $(this).data('posisi');
        id = $(this).data('id');

        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus jabatan \n\"" + posisi + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = 'controller.php?id=' + id + '&aksi=hapus';
            }
        });
    })
    </script>

<?php
}    
?>


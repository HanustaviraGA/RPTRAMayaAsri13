<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";
    include "../layout/alert.php";

    $sql = "SELECT * FROM users";
    $query = mysqli_query($koneksi,$sql);
?>

<?php
if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <p class="mb-4">Daftar Pengguna</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Pengguna</h6>
                    <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%">Nomor</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><?= $a++ ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del" data-nama="<?=$data['nama']?>"
                                            data-id="<?= $data['id'] ?>">Delete</a>
                                        <a href="ubah.php?id_user=<?= $data['id'] ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
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

        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus pengguna \n\"" + nama + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = 'controller.php?id_user=' + id + '&aksi=hapus';
            }
        });
    })
    </script>

<?php
} else {
?>

    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <p class="mb-4">Daftar Pengguna</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Pengguna</h6>
                    <a href="tambah.php" class="btn btn-primary float-right btn-md">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width:5%">Nomor</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $a = 1; while($data = mysqli_fetch_array($query)):?>
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><?= $a++ ?></td>
                                    <td>Hidden Info</td>
                                    <td>Hidden Info</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del">Delete</a>
                                        <a href="ubah.php?id_user=<?= $data['id'] ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
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

        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus pengguna \n\"" + nama + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = 'controller.php?id_user=' + id + '&aksi=hapus';
            }
        });
    })
    </script>

<?php
}    
?>


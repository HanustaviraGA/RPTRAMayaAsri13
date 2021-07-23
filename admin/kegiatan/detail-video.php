<?php 
    include "../layout/admin-header.php";
    include "../layout/admin-sidebar.php";
    include "../layout/admin-navbar.php";

    $id = $_GET['id_video'];
    $sql = "SELECT * FROM video WHERE id_video='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);

?>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .img-fluid {
        max-width: 40%;
    }

    #textarea {
        -moz-appearance: textfield-multiline;
        -webkit-appearance: textarea;
        border: 1px solid gray;
        font: medium -moz-fixed;
        font: -webkit-small-control;
        height: auto;
        overflow: auto;
        padding: .375rem .75rem;
        resize: none;
        width: 100%;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;

    }
</style>
<style>
    Iframe {
    width: 100%;
    height:auto;
    }
    .video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
    }
    .video-container iframe,
    .video-container object,
    .video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Video</h1>
    <p class="mb-4">Detail Video </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Video</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="<?= $data['isi'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Link Video</label>
                <input type="text" class="form-control" name="judul" value="<?= $data['video'] ?>" readonly>
                <br>
                <p>Video</p>
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $data['video'] ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="<?= $data['tanggal'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Admin</label>
                <input type="text" class="form-control" value="<?= $data['admin'] ?>" readonly>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="check"
                        <?= $data['status'] == 1 ? 'checked' : '' ?> disabled>
                    <label class="form-check-label" for="check">Tampilkan</label>
                </div>
            </div>
            <a href="index-video.php" class="btn btn-info float-right">Kembali</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Download Video
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Download Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="315" src="https://yt1s.com/id?q=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?= $data['video'] ?>"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>


<?php 
    include "../layout/admin-footer.php";
?>
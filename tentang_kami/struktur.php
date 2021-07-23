<?php 
    include "../layout/fitur-header.php";
    include "../admin/koneksi.php";
?>
    <title>Ruang Publik Terpadu Ramah Anak Maya Asri 13 - Struktur Organisasi</title>
    <section class="banner">
        <div class="container" style="text-align: center;">
            <h2>Struktur Organisasi</h2>
            <hr class="my-4">
        </div>
        <div class="container">
            <div class="row" style="text-align: center;">
            <?php
                $sqlStruktur = "SELECT * FROM struktur AS st INNER JOIN tupoksi AS tp ON st.id_jabatan = tp.id ORDER BY id ASC";
                $queryStruktur = mysqli_query($koneksi,$sqlStruktur);
            ?>
            <?php while($dataStruktur = mysqli_fetch_array($queryStruktur)):?>
                <div class="col mt-3">
                    <img src="img_struktur/<?= $dataStruktur['gambar'] ?>" class="rounded-circle mb-2 bulat">
                    <h3 class="nama-struktur"><?= $dataStruktur['nama'] ?></h3>
                    <a class="jabatan-struktur"><?= $dataStruktur['posisi'] ?></a>
                </div>
            <?php endwhile; ?>
                <!-- <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Han</h3>
                    <a class="jabatan-struktur">Sarana dan Prasarana</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Adi</h3>
                    <a class="jabatan-struktur">Ekonomi dan Kreatif</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Richard</h3>
                    <a class="jabatan-struktur">Humas</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Han</h3>
                    <a class="jabatan-struktur">Sarana dan Prasarana</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Adi</h3>
                    <a class="jabatan-struktur">Ekonomi dan Kreatif</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Richard</h3>
                    <a class="jabatan-struktur">Humas</a>
                </div>
                <div class="col mt-3">
                    <img src="../images/hero_3.jpg" class="rounded-circle mb-2" width="200px" height="200px">
                    <h3 class="nama-struktur">Han</h3>
                    <a class="jabatan-struktur">Sarana dan Prasarana</a>
                </div> -->
            </div>
        </div>
    </section>

<?php 
  include "../layout/fitur-footer.php";
?>
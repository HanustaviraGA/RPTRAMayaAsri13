<?php
    include '../admin/koneksi.php';
    include "../layout/artikel-header.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM artikel as AR INNER JOIN topik as TP ON AR.id_topik = TP.id_topik WHERE id_artikel = $id";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
    $day = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu');
    $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    $sqlNews = "SELECT * FROM artikel WHERE status = '1' ORDER BY 'tanggal' DESC, id_artikel DESC LIMIT 3";
    $queryNews = mysqli_query($koneksi,$sqlNews);
?>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60f1963b97b2a50019e8ec7b&product=inline-reaction-buttons' async='async'></script>
<title>Ruang Publik Terpadu Ramah Anak Maya Asri 13 - <?= $data['judul'] ?></title>
<section class="artikel-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="judul-artikel">
                    <span><?= $day[(int)date('w', strtotime($data['tanggal']))] ?>,
                        <?= (int)date('d', strtotime($data['tanggal'])) ?>
                        <?= $month[((int)date('m', strtotime($data['tanggal']))) - 1] ?>
                        <?= (int)date('Y', strtotime($data['tanggal'])) ?> / <?= $data['nama'] ?> / <?= $data['admin'] ?></span>
                    <h1><?= $data['judul'] ?></h1>
                </div>
                <div class="isi-artikel">
                    <div class="img-artikel-detail">
                        <img src="img/<?= $data['gambar'] ?>" alt="">
                    </div>
                    <div class="text-artikel">
                        <?= $data['isi'] ?>
                        <div class="sharethis-inline-reaction-buttons"></div>
                    </div>
                    <div class="commentbox"></div>
                    <script src="https://unpkg.com/commentbox.io/dist/commentBox.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.1/qs.min.js"
                        integrity="sha512-aTKlYRb1QfU1jlF3k+aS4AqTpnTXci4R79mkdie/bp6Xm51O5O3ESAYhvg6zoicj/PD6VYY0XrYwsWLcvGiKZQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        const qs = window.Qs;
                        commentBox('5726493091037184-proj', {
                            createBoxUrl(boxId, pageLocation) {

                                const queryParams = qs.parse(pageLocation.search.replace('?', ''));
                                const relevantParams = {
                                    'id': queryParams['id']
                                };
                                pageLocation.search = qs.stringify(
                                relevantParams); // we will now include "?page_id=5" in the box URL
                                pageLocation.hash =
                                boxId; // creates link to this specific Comment Box on your page
                                return pageLocation.href; // return url string
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="col-lg-3">
                <h2>Artikel Terbaru</h2>
                <?php while($dataNews = mysqli_fetch_array($queryNews)):?>
                <a href="artikelDetail.php?id=<?= $dataNews['id_artikel'] ?>">
                    <div class="card-artikel-baru">
                        <div class="img-artikel-baru">
                            <img src="img/<?= $dataNews['gambar']?>" alt="">
                        </div>
                        <div class="text-artikel-baru">
                            <p><?= $dataNews['tanggal']?></p>
                            <h3><?php if(strlen($dataNews['judul']) > 25){ echo substr($dataNews['judul'], 0, 25); echo ' ...';} else echo $dataNews['judul']; ?>
                            </h3>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>

        </div>
    </div>
</section>

<?php 
  include "../layout/fitur-footer.php";
?>
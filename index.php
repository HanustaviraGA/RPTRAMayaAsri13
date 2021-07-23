<?php 
    include "layout/index-header.php";
    include "admin/koneksi.php";
    $sql = "SELECT * FROM artikel WHERE status=1 ORDER BY tanggal DESC,id_artikel DESC LIMIT 1";
    $query = mysqli_query($koneksi,$sql);
    $dataArtikelBesar = mysqli_fetch_array($query);
    $id_artikel_besar = $dataArtikelBesar['id_artikel'];

    $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember');
?>
<title>Ruang Publik Terpadu Ramah Anak Maya Asri 13</title>
<section class="banner">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="img-banner">
          <img src="images/child.png" alt="">
        </div>
      </div>
      <div class="col-xl-6 col-lg-6">
        <div class="text-banner">
          <h1>Ruang Publik Terpadu Ramah Anak Maya Asri 13</h1>
          <p>
            RPTRA merupakan pengembanagan dari kebijakan Kota Layak Anak yang menjadi Strategi penting Pemerintah Provinsi DKI Jakarta dengan mengintegrasikan seluruh komitmen dan potensi sumber daya para pihak terkait melalui sistem perencanaan yang komperhensif, menyeluruh dan berkelanjutan dalam bentuk fasilitas fisik dan non fisik secara terpadu dalam rangka memenuhi kebutuhan hak-hak anak. 
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="tentang-kami">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col">
        <div class="tentang-kami-card">
          <figure class="figure">
            <a href="tentang_kami/sejarah.php">
              <center><img src="images/icons8-order-history-64.png" class="figure-img img-fluid rounded"></center>
              <figcaption class="figure-caption text-center">Sejarah</figcaption>
            </a>
          </figure>
        </div>
      </div>
      <div class="col">
        <div class="tentang-kami-card">
          <figure class="figure">
            <a href="tentang_kami/struktur.php">
              <center><img src="images/icons8-tree-structure-64.png" class="figure-img img-fluid rounded"></center>
              <figcaption class="figure-caption text-center">Struktur</figcaption>
            </a>
          </figure>
        </div>
      </div>
      <div class="col">
        <div class="tentang-kami-card">
          <figure class="figure">
            <a href="tentang_kami/tupoksi.php">
              <center><img src="images/icons8-task-64.png" class="figure-img img-fluid rounded"></center>
              <figcaption class="figure-caption text-center">Tupoksi</figcaption>
            </a>
          </figure>
        </div>
      </div>
      <div class="col">
        <div class="tentang-kami-card">
          <figure class="figure">
            <a href="tentang_kami/layanan.php">
              <center><img src="images/icons8-helping-hand-64.png" class="figure-img img-fluid rounded"></center>
              <figcaption class="figure-caption text-center">Layanan</figcaption>
            </a>
          </figure>
        </div>
      </div>
      <div class="col">
        <div class="tentang-kami-card">
          <figure class="figure">
            <a href="tentang_kami/sarana.php">
              <center><img src="images/icons8-structural-64.png" class="figure-img img-fluid rounded"></center>
              <figcaption class="figure-caption text-center">Sarana</figcaption>
            </a>
          </figure>
        </div>
      </div>
    </div>
</section>
<section class="latest-article">
  <div class="container">
    <div class="judul-section">
      <h2>Artikel Terbaru</h2>
      <a href="artikel/artikel.php">Tampilkan lebih banyak</a>
    </div>
    <div class="arikel-all">
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <?php 
                $sqlArtikelKecil = "SELECT * FROM artikel WHERE NOT id_artikel='$id_artikel_besar' AND status=1 ORDER BY
                tanggal DESC, id_artikel DESC LIMIT 3";
                $queryArtikelKecil = mysqli_query($koneksi,$sqlArtikelKecil);
            ?>
          <?php while($dataArtikelKecil = mysqli_fetch_array($queryArtikelKecil)):?>
          <div class="article-card-small">
            <div class="row">
              <div class="col-3">
                <div class="img-small">
                  <a href="artikel/artikelDetail.php?id=<?= $dataArtikelKecil['id_artikel'] ?>"><img src="artikel/img/<?= $dataArtikelKecil['gambar'] ?>" alt=""></a>
                </div>
              </div>
              <div class="col-9">
                <div class="text-aricle-small mt-3">
                  <h4><a href="artikel/artikelDetail.php?id=<?= $dataArtikelKecil['id_artikel'] ?>"><?php if(strlen($dataArtikelKecil['judul']) > 50){
                            echo substr($dataArtikelKecil['judul'], 0, 50);
                            echo ' ...';
                          } else {
                            echo $dataArtikelKecil['judul'];
                          } ?></a></h4>
                  <p>
                    <?php 
                            $deskripsi = strip_tags($dataArtikelKecil['isi']);
                            if(strlen($deskripsi) > 30){
                              echo substr($deskripsi, 0, 30);
                              echo ' ...';
                            } else {
                              echo $deskripsi;
                            }
                          ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <div class="col-xl-5 offset-xl-1 col-lg-6 col-12">
          <div class="flex-center">
            <!-- Artikel Besar -->
            <a href="artikel/artikelDetail.php?id=<?= $dataArtikelBesar['id_artikel'] ?>">
              <div class="article-card-large">
                <img src="artikel/img/<?= $dataArtikelBesar['gambar'] ?>" alt="">
                <div class="text-article-large">
                  <h4><?php if(strlen($dataArtikelBesar['judul']) > 50){
                              echo substr($dataArtikelBesar['judul'], 0, 50);
                              echo ' ...';
                            } else {
                              echo $dataArtikelBesar['judul'];
                            } ?></h4>
                  <p>
                    <?php 
                            $deskripsiBesar = strip_tags($dataArtikelBesar['isi']);
                            if(strlen($deskripsiBesar) > 90){
                              echo substr($deskripsiBesar, 0, 90);
                              echo ' ...';
                            } else {
                              echo $deskripsiBesar;
                            }
                          ?>
                  </p>
                </div>
                <div class="tanggal-art-index">
                  <p><?= (int)date('d', strtotime($dataArtikelBesar['tanggal'])) ?>
                    <?= $month[((int)date('m', strtotime($dataArtikelBesar['tanggal']))) - 1] ?>
                    <?= (int)date('Y', strtotime($dataArtikelBesar['tanggal'])) ?></p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="kegiatan">
  <div class="team-area">
    <div class="container">
      <div class="judul-section">
        <h2>Kegiatan</h2>
        <a href="kegiatan/kegiatan.php">Tampilkan lebih banyak</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
          </div>
        </div>
        <?php 
                $sqlkegiatan = "SELECT * FROM gambar ORDER BY id_gambar DESC LIMIT 4";
                $querykegiatan = mysqli_query($koneksi,$sqlkegiatan);
              ?>
        <?php while($dataKegiatan = mysqli_fetch_array($querykegiatan)):?>
        <!--== Single Team Item ==-->
        <div class="col-lg-3 col-md-6">
          <br>
          <div class="single-team">
            <div class="team-img">
              <img src="kegiatan/img/<?php echo $dataKegiatan['gambar'];?>" alt="" class="img-responsive">
            </div>
            <div class="team-content">
              <div class="team-judul">
                <h3>
                  <?php if(strlen($dataKegiatan['judul']) > 25){ echo substr($dataKegiatan['judul'], 0, 25); echo ' ...';} else echo $dataKegiatan['judul']; ?>
                </h3>
              </div>
              <div class="team-isi">
                <p>
                  <?php if(strlen($dataKegiatan['isi']) > 25){ echo substr($dataKegiatan['isi'], 0, 25); echo ' ...';} else echo $dataKegiatan['isi']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php 
                $sqlkegiatan2 = "SELECT * FROM video ORDER BY id_video DESC LIMIT 4";
                $querykegiatan2 = mysqli_query($koneksi,$sqlkegiatan2);
              ?>
        <?php while($dataKegiatan2 = mysqli_fetch_array($querykegiatan2)):?>
        <!--== Single Team Item ==-->
        <div class="col-lg-3 col-md-6">
          <br>
          <div class="single-team">
            <div class="team-img">
              <img src="https://img.youtube.com/vi/<?php echo $dataKegiatan2['video'];?>/maxresdefault.jpg" alt=""
                class="img-responsive">
            </div>
            <div class="team-content">
              <div class="team-judul">
                <h3>
                  <?php if(strlen($dataKegiatan2['judul']) > 25){ echo substr($dataKegiatan2['judul'], 0, 25); echo ' ...';} else echo $dataKegiatan2['judul']; ?>
                </h3>
              </div>
              <div class="team-isi">
                <p>
                  <?php if(strlen($dataKegiatan2['isi']) > 35){ echo substr($dataKegiatan2['isi'], 0, 35); echo ' ...';} else echo $dataKegiatan2['isi']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>

<?php
          include 'admin/koneksi.php';
          $sql2 = "SELECT * from saran";
          $hasil2 = mysqli_query($koneksi, $sql);
            
      ?>

<section id="saranpendapat" class="saran mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="flex-center" style="justify-content: flex-start">
          <h2>Kritik & Saran</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <form class="saran" action="saran-controller.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Nama :</label>
            <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap ...">
          </div>
          <div class="mb-3">
            <label class="form-label">Email :</label>
            <input type="text" class="form-control" name="email" required placeholder="Alamat Email ...">
          </div>
          <div class="mb-3">
            <label class="form-label">Kritik atau Saran :</label>
            <textarea name="saran" class="form-control" placeholder="Isi Kritik atau Saran ..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%">Kirim</button>
        </form>
        <br>
        <!-- Menampung jika ada pesan -->
        <?php if(isset($_GET['pesan'])) {  ?>
        <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php 
  include "layout/index-footer.php";
?>
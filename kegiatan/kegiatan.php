<?php
    include "../layout/fitur-header.php";

    include "../admin/koneksi.php";
?>
      <title>Ruang Publik Terpadu Ramah Anak Maya Asri 13 - Kegiatan</title>
      <section>
        <div class="container">
        <div class="judul-section">
            <h2>Foto</h2>
            <br>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="section-title text-center">
            </div>
          </div>
          <?php 
            $sqlkegiatan = "SELECT * FROM gambar WHERE status = '1' ORDER BY tanggal DESC, id_gambar DESC";
            $querykegiatan = mysqli_query($koneksi,$sqlkegiatan);
          ?>
          <?php while($dataKegiatan = mysqli_fetch_array($querykegiatan)):?>
                <!--== Single Team Item ==-->
          <div class="col-lg-3 col-md-6">
            <br>
            <div class="single-team">
              <div class="team-img">
                <a href="img/<?php echo $dataKegiatan['gambar'];?>"><img src="img/<?php echo $dataKegiatan['gambar'];?>" alt="" class="img-responsive"></a>
              </div>
              <div class="team-content">
                <div class="team-judul">
                  <h3><?php if(strlen($dataKegiatan['judul']) > 25){ echo substr($dataKegiatan['judul'], 0, 25); echo ' ...';} else echo $dataKegiatan['judul']; ?></h3>
                </div>
                <div class="team-isi">
                  <p><?php if(strlen($dataKegiatan['isi']) > 35){ echo substr($dataKegiatan['isi'], 0, 25); echo ' ...';} else echo $dataKegiatan['isi']; ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>

          <!-- <div class="clearfix"></div> -->
          
          <br>
          <div class="judul-section">
            <h2>Video</h2>
            <br>
          </div>
          
          <div class="row">
          <?php 
            $sqlkegiatanVideo = "SELECT * FROM video WHERE status = '1' ORDER BY tanggal DESC, id_video DESC";
            $querykegiatanVideo = mysqli_query($koneksi,$sqlkegiatanVideo);
          ?>
          <?php while($dataKegiatanVideo = mysqli_fetch_array($querykegiatanVideo)):?>
                <!--== Single Team Item ==-->
          <div class="col-lg-3 col-md-6">
            <br>
            <div class="single-team-vid">
              <div class="team-img-vid">
                <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $dataKegiatanVideo['video'];?>" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="team-content-vid">
                <div class="team-judul-vid">
                  <h3><?php if(strlen($dataKegiatanVideo['judul']) > 25){ echo substr($dataKegiatanVideo['judul'], 0, 25); echo ' ...';} else echo $dataKegiatanVideo['judul']; ?></h3>
                </div>
                <div class="team-isi-vid">
                  <p><?php if(strlen($dataKegiatanVideo['isi']) > 35){ echo substr($dataKegiatanVideo['isi'], 0, 25); echo ' ...';} else echo $dataKegiatanVideo['isi']; ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>

      </section>
      <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $data['video'];?>" frameborder="0" allowfullscreen></iframe>

      <div class="clearfix"></div> -->

      <br>

<?php 
  include "../layout/fitur-footer.php";
?>
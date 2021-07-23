<?php 
    include "../layout/fitur-header.php";
?>
    <title>Ruang Publik Terpadu Ramah Anak Maya Asri 13 - Tupoksi</title>
    <section class="banner">
        <div class="container" style="text-align: center;">
            <h4>TUPOKSI</h4>
            <hr class="my-4">
        </div>

        <div class="container">
          <?php
            include '../admin/koneksi.php';
            $sql = "SELECT * from tupoksi";
            $hasil = mysqli_query($koneksi, $sql);
            
          ?>
          <?php 
            while($data = mysqli_fetch_array($hasil)){
              ?>
                  <div class="tupok-isi">
                    <button class="koor" style="outline:none;">
                      <span><?php echo $data['posisi'];?></span>
                      <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="isi-koor">
                      <dl class="row">
                          <dt class="col-sm-3">Misi Jabatan</dt>
                          <dd class="col-sm-9">
                              <p style="color: black;"><?php echo $data['misi'];?>
                              </p>
                          </dd>

                          <dt class="col-sm-3">Tugas Pokok</dt>
                          <dd class="col-sm-9">
                             <?php
                              $tupokId = $data['id'];
                              $sqlTupok = "SELECT * FROM detail_tupoksi WHERE id_tupoksi = '$tupokId'";
                              $hasilTupok = mysqli_query($koneksi, $sqlTupok);
                              while($dataTupok = mysqli_fetch_array($hasilTupok)){?>
                                <li><?= $dataTupok['tugas_pokok'] ?></li>
                              <?php } ?>
                          </dd>
                      </dl>
                    </div>
                    <hr>
                  </div>
            <?php
            }
            ?>        
    </section>
    
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
      $('.koor').on("click", function(){
        $(this).closest(".tupok-isi").find('.isi-koor').toggle(500)
      });
    </script>

<?php 
  include "../layout/fitur-footer.php";
?>
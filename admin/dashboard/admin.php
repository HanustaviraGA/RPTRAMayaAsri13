<?php 
include "../layout/admin-header.php";
include "../layout/admin-sidebar.php";
include "../layout/admin-navbar.php";
include "../layout/alert.php";

// session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == "sudah_login") {
    echo "";
} else if (isset($_SESSION['status']) && $_SESSION['status'] == "sudah_login_guest"){
    echo "";
} else{
    header("Location: login.php");
}

$sqlArtikel = "SELECT COUNT(*) AS 'countAr' from artikel";
$hasilArtikel = mysqli_query($koneksi, $sqlArtikel);
$dataArtikel = mysqli_fetch_array($hasilArtikel);

$sqlFoto = "SELECT COUNT(*) AS 'countGam' from gambar";
$hasilFoto = mysqli_query($koneksi, $sqlFoto);
$dataFoto = mysqli_fetch_array($hasilFoto);

$sqlVideo = "SELECT COUNT(*) AS 'countVid' from video";
$hasilVideo = mysqli_query($koneksi, $sqlVideo);
$dataVideo = mysqli_fetch_array($hasilVideo);

?>

        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?php echo $_SESSION['nama']; ?> !</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Artikel</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalArticle"><?= $dataArtikel['countAr'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Foto</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalFoto"><?= $dataFoto['countGam'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-images fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Video</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalVideo"><?= $dataVideo['countVid'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-video fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <!-- <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Komentar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalComment">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-smile-beam fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <?php 
        include "../layout/admin-footer.php";
    ?>
    <!-- End of Footer -->
    
    <script src="https://unpkg.com/commentbox.io/dist/commentBox.min.js"></script>
    <!-- <script>commentBox('5691237348671488-proj')</script> -->
    <script>
        commentBox('5691237348671488-proj', {
            onCommentCount(count) {
                // use the count however you wish.
                console.log(count);
                document.querySelector("#totalComment").innerText = count;
            }
        });

        // async function getAPI(url){
        //     const response = await fetch(url);
        //     var data = await response.json();
        //     // console.log(data);
        //     showData(data);
        // }

        // getAPI("https://www.metype.com/api/v1/accounts/1000963/all_pages");

        // function showData(data){
        //     let totalArt = data.total_count;
        //     let totalCom = 0;
        //     let totalReact = 0;
        //     for(let com of data.pages.data){
        //         totalCom += com.attributes.comments_count;
        //         totalReact += Object.keys(com.attributes.reactions).length;
        //     }
        //     document.querySelector("#totalArticle").innerText = totalArt;
        //     document.querySelector("#totalComment").innerText = totalCom;
        //     document.querySelector("#totalReaction").innerText = totalReact;
        // }
    </script>
</body>
</html>
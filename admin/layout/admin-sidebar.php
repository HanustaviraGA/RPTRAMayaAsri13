<?php 
include '../koneksi.php';
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/admin.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">RPTRA ADMIN</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="../dashboard/admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <?php
        if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
        ?>

                
                <!-- Heading -->
                <div class="sidebar-heading">
                    Konfigurasi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../user/index.php">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Manage Pengguna</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Organisasi
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-sitemap"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../struktur/index.php">Struktur</a>
                            <a class="collapse-item" href="../tupoksi/index.php">Tupoksi</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Artikel
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../artikel/index.php">Artikel</a>
                            <a class="collapse-item" href="../topik/index.php">Topik</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Kegiatan
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-running"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../kegiatan/index.php">Foto</a>
                            <a class="collapse-item" href="../kegiatan/index-video.php">Video</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Feedback
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-comment"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../comment/index-comment.php">Komentar Artikel</a>
                            <a class="collapse-item" href="../comment/index-reaction.php">Reaksi Artikel</a>
                            <a class="collapse-item" href="../saranpendapat/index.php">Kritik & Saran</a>
                        </div>
                    </div>
                </li>
                <br>
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php
        } else {
        ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Konfigurasi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../user/index.php">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Manage Pengguna</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Organisasi
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-sitemap"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../struktur/index.php">Struktur</a>
                            <a class="collapse-item" href="../tupoksi/index.php">Tupoksi</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Artikel
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../artikel/index.php">Artikel</a>
                            <a class="collapse-item" href="../topik/index.php">Topik</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Kegiatan
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-running"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../kegiatan/index.php">Foto</a>
                            <a class="collapse-item" href="../kegiatan/index-video.php">Video</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Feedback
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-comment"></i>
                        <span>Manage</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../comment/index-comment.php">Komentar Artikel</a>
                            <a class="collapse-item" href="../comment/index-reaction.php">Reaksi Artikel</a>
                            <a class="collapse-item" href="../saranpendapat/index.php">Kritik & Saran</a>
                        </div>
                    </div>
                </li>
                <br>
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

        <?php
        }    
        ?>
        
        
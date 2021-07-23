<?php 
include "../layout/admin-header.php";
include "../layout/admin-sidebar.php";
include "../layout/admin-navbar.php";
include "../layout/alert.php";
?>

<?php

if(isset($_SESSION["status"]) && $_SESSION["status"] != "sudah_login_guest") {
?>

    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Komentar Artikel</h1>
    <p class="mb-4">Daftar Komentar Artikel</p>
    <a href="">REFRESH</a>
    <iframe src="https://dashboard.commentbox.io/projects/5726493091037184-proj" style="width: 100%; height: 625px;"></iframe>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php 
                include "../layout/admin-footer.php";
            ?>
<!-- End of Footer -->

<!-- Initialization Script -->
<script type='text/javascript'>
    window.talktype = window.talktype || function (f) {
        if (talktype.loaded)
            f();
        else
            (talktype.q = talktype.q || []).push(arguments);
    };
</script>
<!-- Javascript to render the widgets -->
<script src='https://www.metype.com/quintype-metype/assets/metype.js'></script>

</body>

</html>

<?php
} else {
?>

    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Komentar Artikel</h1>
    <p class="mb-4">Daftar Komentar Artikel</p>
    <a href="">REFRESH</a>
    <p>Insufficient Permision</p>
    <iframe src="https://google.com" style="width: 100%; height: 625px;"></iframe>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php 
                include "../layout/admin-footer.php";
            ?>
<!-- End of Footer -->

<!-- Initialization Script -->
<script type='text/javascript'>
    window.talktype = window.talktype || function (f) {
        if (talktype.loaded)
            f();
        else
            (talktype.q = talktype.q || []).push(arguments);
    };
</script>
<!-- Javascript to render the widgets -->
<script src='https://www.metype.com/quintype-metype/assets/metype.js'></script>

</body>

</html>

<?php
}    
?>


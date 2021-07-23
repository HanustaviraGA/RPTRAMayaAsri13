    <?php
    if(isset($_GET['status'])):
        if(($_GET['status']) == "success"):
            echo"
            <script>
                swal('Data berhasil di". $_GET['aksi'] ."', '', '". $_GET['status'] ."');
            </script>";
        elseif(($_GET['status']) == "error"):
            echo"
            <script>
                swal('Data gagal di". $_GET['aksi'] ."', '". $_GET['pesan'] ."', '". $_GET['status'] ."');
            </script>";
        else:
            echo"
            <script>
                swal('Terjadi Kesalahan harap coba lagi');
            </script>";
        endif;
    endif;
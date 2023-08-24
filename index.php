<?php
if(!empty($_SESSION)){ }else{ session_start(); }
if(empty($_SESSION['role'] == "" )){}else{ header('location:login.php?logindulu'); }
require 'database/panggil.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="assets/images/logo.png">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Demo Sero | Dashboard</title>
    <!-- Start GA -->
    <?php include 'pages/include/css.php' ?>
    <!-- /END GA -->
</head>

<body onload="redirect()">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php include 'pages/include/navbar.php' ;
            include 'pages/include/sidebar.php' ;
            // <!-- Main Content -->
                if(isset($_GET['page']) && $_GET['page'] == 'home'){
                    require 'pages/dashboard/main.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'member'){
                //     require 'act/pages/member/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'list buku'){
                //     require 'act/pages/list/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'pengadaan'){
                //     require 'act/pages/pengadaan/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'penjualan'){
                //     require 'act/pages/penjualan/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'publisher'){
                //     require 'act/pages/publisher/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'merk'){
                //         require 'act/pages/merk/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'petugas'){
                //     require 'act/pages/user/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'satuan'){
                //     require 'act/pages/satuan/default.php';
                // }elseif(isset($_GET['page']) && $_GET['page'] == 'kategori'){
                //     require 'act/pages/kategori/default.php';
                }else{
                    echo '<script>window.location="index.php?page=home"</script>';
                }


            ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <?php
    include 'pages/include/js.php'; ?>
</body>

</html>
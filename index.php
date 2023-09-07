<?php
if(!empty($_SESSION)){ }else{ session_start(); }
// if(empty($_SESSION['role'] == "" )){}else{ header('location:login.php?logindulu'); }
require 'database/panggil.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'pages/include/head.php' ?>

<body class="hold-transition sidebar-mini" onload="read()">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'pages/include/navbar.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'pages/include/side.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <?php 
        if(!empty($_GET['page'] == 'menu')){
            require 'pages/menu/main.php';
        }elseif(!empty($_GET['page'] == 'employee')){
            require 'pages/employee/main.php';
        }
        ?>
        <!-- /.content-wrapper -->
        <?php include 'pages/include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <?php include 'pages/include/js.php' ?>

    <?php 
        if(!empty($_GET['page'] == 'menu')){
            require 'pages/menu/js.php';
        }elseif(!empty($_GET['page'] == 'employee')){
            require 'pages/employee/js.php';
        }
        ?>
</body>

</html>
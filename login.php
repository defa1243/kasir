<?php
    if(!empty($_SESSION)){ }else{ session_start(); }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="x-icon" href="assets/images/logo.png">
    <title>Serotonin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost/kasir/assets/template/adminlte-v3/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://localhost/kasir/assets/template/adminlte-v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/kasir/assets/template/adminlte-v3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="http://localhost/kasir/assets/images/logo.png" alt="logo" width="100"
                                class="shadow-light rounded-circle">
            <a href="#" class="text-primary muted text-bold">現金係</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div id="logout" class="mt-2 mb-2">
                    <?php if(isset($_GET['signout'])){?>
                    <div class="alert alert-success">
                        <small>Anda Berhasil Logout</small>
                    </div>
                    <?php }?>
                </div>
                <div id="notifikasi" class="mt-2 mb-2">
                    <?php if(isset($_GET['get'])){?>
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                    </div>
                    <?php }?>
                </div>
                <div id="logindulu" class="mt-2 mb-2">
                    <?php if(isset($_GET['logindulu'])){?>
                    <div class="alert alert-danger">
                        <small>Anda tidak bisa login tanpa akun, Silahkan Login Dahulu</small>
                    </div>
                    <?php }?>
                </div>
                <form method="POST" >
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                        </div>
                        <!-- /.col -->
                        <div class="mx-auto mb-2">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="http://localhost/kasir/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://localhost/kasir/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/kasir/assets/dist/js/adminlte.min.js"></script>

</body>

    <script>
        <?php if(empty($_GET['get'])){?>
        $("#notifikasi").hide();
        <?php }?>
        var logingagal = function(){
            $("#logout").fadeOut('slow');
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script>
<?php
require 'database/panggil.php';


if(isset($_POST['login']))
    {   
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        $sql = "SELECT * FROM `user` WHERE `username`= '$user' ";
        $login = $proses->showData($sql);

        if( password_verify($pass, $login['password']) ){
            if($login['role']=="superadmin"){
                session_start();
                $_SESSION['role'] = "superadmin";
                $_SESSION['sesi'] = $login;
                echo "<script>window.location='index.php?page=dashboard';</script>";
                echo "<script>alert('superadmin')</script>";
            }elseif($login['role']=="admin"){
                session_start();
                $_SESSION['role'] = "admin";
                $_SESSION['sesi'] = $login;
                echo "<script>window.location='index.php?page=dashboard';</script>";
                echo "<script>alert('admin')</script>";
            }
        }else{
            // echo "<script>window.location='login.php?get=gagal';</script>";
            echo "<script>alert('Wrong Password')</script>";
        }

        
    }
    
    ?>

</html>
<?php 
$sql = "SELECT * FROM menu";
$hasil =$proses->listData($sql);
include '../include/css.php';
include '../include/navbar.php';
include '../include/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark mb-2">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active mb-4">copyright -Defandra-
                        </li>
                    </ol>
                </div><!-- /.col -->
                <!-- /.content-header -->
                <?php foreach($hasil as $x) {?>
                <div class="col-lg-4 col-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p class=""><?= $x['nama_menu'] ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-mug-hot"></i>
                        </div>
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModal"><?= $x['harga'] ?></button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Make Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nama Menu</label>
                                                    <input type="text" class="form-control text-center"
                                                        value="<?= $x['nama_menu'] ?>" readonly>
                                                </div>
                                                <div class="form-group align-left">
                                                    <label>tipe pembayaran</label><br>
                                                    <input type="radio" id="age2" name="age" value="60">
                                                    <label for="age2">tunai</label><br>
                                                    <input type="radio" id="age3" name="age" value="100">
                                                    <label for="age3">non-tunai</label><br>
                                                </div>
                                                <label>kuantitas</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected class="text-center">kuantitas</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                    <option value="3">6</option>
                                                    <option value="1">7</option>
                                                    <option value="2">8</option>
                                                    <option value="3">9</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <p><?= $x['harga'] ?></p>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="create" class="btn btn-primary">Make Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div> -->

<?php
include '../include/js.php';
?>
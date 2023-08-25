<?php
if(isset($_POST['create'])){
    $sql = "SELECT * FROM menu";
$datamenu = $proses->showData($sql);
$nama = strip_tags($_POST['nama_menu']);
$harga = strip_tags($_POST['harga']);

    $sql = "INSERT INTO `menu`(`id_menu`, `nama_menu`, `harga`) VALUES (0,'$nama','$harga')";
    $proses->sqlAction($sql);
    
    echo '<script>window.location="index.php?page=menu&create"</script>';


}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container center">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark mb-2">Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">menu</a></li>
                        <li class="breadcrumb-item active mb-4">copyright -Defandra-
                        </li>
                    </ol>
                </div><!-- /.col -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Menu</label>
                                        <input type="text" class="form-control" name="nama_menu"
                                            placeholder="masukkan nama menu" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" id="dengan-rupiah" class="form-control" name="harga" required>
                                </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="create" class="btn btn-primary">insert data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

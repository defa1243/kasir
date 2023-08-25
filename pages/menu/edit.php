<?php
$id= strip_tags($_GET['id']);
$sql = "SELECT * FROM menu WHERE id_menu = $id";
$hasil = $proses->showData($sql);


if(isset($_POST['edit'])){
    $nama = strip_tags($_POST['nama_menu']);
    $harga = strip_tags($_POST['harga']);
    
    $sql= "UPDATE `menu` SET `nama_menu`='$nama',`harga`='$harga' WHERE id_menu = '$id'";
    $proses->sqlAction($sql);

    echo '<script>window.location="index.php?page=menu&edit"</script>';

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
                                            value="value="<?= $hasil['nama_menu'] ?>"" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Menu</label>
                                        <input type="number" class="form-control" name="harga"
                                        value="value="<?= $hasil['harga'] ?>"" required>
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
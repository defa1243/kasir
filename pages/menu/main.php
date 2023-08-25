<?php 
$sql = "SELECT * FROM menu";
$hasil =$proses->listData($sql);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                        <li class="breadcrumb-item active mb-4">copyright -D'murf-
                        </li>
                    </ol>
                </div><!-- /.col -->

                <div class="card container">
                    <div class="card-header">
                    <a href="index.php?page=menu&acts=create" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>nama menu</th>
                                    <th>harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($hasil as $x) {?>
                                <tr>
                                    <td><?= $x['nama_menu'] ?></td>
                                    <td><?= $x['harga'] ?></td>
                                    <td>
                                                <a class="btn btn-success text-light col-11
                                                " href="index.php?page=menu&acts=edit&id=<?= $x['id_menu'] ?>"><i class="fas fa-pencil-alt mr-2"></i></i>Edit</a>
                                                <a class="btn btn-danger text-light col-11" href="index.php?page=menu&acts=delete&id=<?= $x['id_menu'] ?>"><i class="fas fa-trash-alt"></i>Delete</a>
                                        </div>
                                    </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

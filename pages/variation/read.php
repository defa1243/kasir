<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM variation AS a INNER JOIN category AS b ON a.category_id = b.id_category";
$data = $proses->listData($sql);
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Variation Type</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= $x['variation_type'] ?></td>
            <td><?= "Rp. " . number_format($x['variation_price'],0,',','.');?></td>
            <td><?= $x['category_type'] ?></td>
            <td> 
                <a class="badge badge-success text-light" href="javascript:void(0)" onclick="editModal(<?= $x['id_variation'] ?>)"><i class="fas fa-pencil-alt mr-2"></i></i>Edit</a>
                <a class="badge badge-danger text-light" href="javascript:void(0)" onclick="deleteData(<?= $x['id_variation'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });
</script>


<?php 
if(!empty($_GET['action'] =='store')){

    $variation = strip_tags($_POST['variation']);
    $price = strip_tags($_POST['price']);
    $category = strip_tags($_POST['category']);

    $sql = "INSERT INTO `variation`(`id_variation`, `variation_type`, `variation_price`,`category_id`) VALUES (0,'$variation','$price','$category')";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action'] =='update')){
    $variation = strip_tags($_POST['variation']);
    $price = strip_tags($_POST['price']);
    $id = strip_tags($_POST['id']);
    $category = strip_tags($_POST['category']);

    $sql = "UPDATE `variation` SET `variation_type`='$variation',`variation_price`='$price', `category_id` = '$category' WHERE id_variation = $id";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `variation` WHERE id_variation = $id ";
    $proses->sqlAction($sql);
}


?>
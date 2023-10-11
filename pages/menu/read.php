<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM menu AS a INNER JOIN category AS b ON a.category_id = b.id_category";
$data = $proses->listData($sql);
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Price</th>
            <th>Category</th>
            <th>Information</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= $x['menu_name'] ?></td>
            <td><?= "Rp. " . number_format($x['price'],0,',','.'); ?> </td>
            <td><?= $x['category_type'] ?></td>
            <td><?= $x['information'] ?></td>
            <td> 
                <a class="badge badge-success text-light" href="javascript:void(0)" onclick="editModal(<?= $x['id_menu'] ?>)"><i class="fas fa-pencil-alt mr-2"></i></i>Edit</a>
                <a class="badge badge-danger text-light" href="javascript:void(0)" onclick="deleteData(<?= $x['id_menu'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a></td>
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

    $menu = strip_tags($_POST['menu']);
    $price = strip_tags($_POST['price']);
    $category = strip_tags($_POST['category']);
    $info = strip_tags($_POST['info']);

    $sql = "INSERT INTO `menu`(`id_menu`,`category_id`, `menu_name`, `price`,`information`) VALUES (0,'$category','$menu','$price','$info')";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action'] =='update')){
    $menu = strip_tags($_POST['menu']);
    $price = strip_tags($_POST['price']);
    $category = strip_tags($_POST['category']);
    $info = strip_tags($_POST['info']);
    $id = strip_tags($_POST['id']);

    $sql = "UPDATE `menu` SET `menu_name`='$menu',`category_id`='$category',`price`='$price',`information`='$info' WHERE id_menu = $id";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `menu` WHERE id_menu = $id ";
    $proses->sqlAction($sql);
}


?>
<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM category";
$data = $proses->listData($sql);
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Category Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= $x['category_type'] ?></td>
            <td> 
            <?php 
            if($x['category_type'] == 'Coffee' | $x['category_type']  == 'Non Coffee' | $x['category_type']  == 'Food'){
                echo "---";
            }else{?>
                <a class="badge badge-success text-light" href="javascript:void(0)" onclick="editModal(<?= $x['id_category'] ?>)"><i class="fas fa-pencil-alt mr-2"></i></i>Edit</a>
                <a class="badge badge-danger text-light" href="javascript:void(0)" onclick="deleteData(<?= $x['id_category'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a>
                <?php } ?>
            </td>
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

    $category = strip_tags($_POST['category']);

    $sql = "INSERT INTO `category`(`id_category`, `category_type`) VALUES (0,'$category')";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action'] =='update')){
    $category = strip_tags($_POST['category']);
    $id = strip_tags($_POST['id']);

    $sql = "UPDATE `category` SET `category_type`='$category' WHERE id_category = $id";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `category` WHERE id_category = $id ";
    $proses->sqlAction($sql);
}


?>
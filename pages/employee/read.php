<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM employee";
$data = $proses->listData($sql);
?>
    
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        
            <?php foreach($data as $x) {?>
            <tr>
                <td><?= $x['employee_name'] ?></td>
                <td><?= $x['address'] ?></td>
                <td><?= $x['phone_number'] ?></td>
                <td><?= $x['email'] ?></td>
                <td>
                    <a class="badge badge-success text-light" href="javascript:void(0)"
                        onclick="editModal(<?= $x['id_employee'] ?>)"><i class="fas fa-pencil-alt mr-2"></i></i>Edit</a>
                    <a class="badge badge-danger text-light" href="javascript:void(0)"
                        onclick="deleteData(<?= $x['id_employee'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a></td>
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
    $name = strip_tags($_POST['name']);
    $address = strip_tags($_POST['address']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    

    $sql = "INSERT INTO `employee`(`id_employee`, `employee_name`, `address`, `phone_number`, `email`) VALUES (0,'$name','$address','$phone','$email')";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action'] =='update')){
    $name = strip_tags($_POST['name']);
    $address = strip_tags($_POST['address']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $id = strip_tags($_POST['id']);
    // var_dump($_POST);die;

    $sql = "UPDATE `employee` SET `employee_name`='$name',`address`='$address',`phone_number`='$phone',`email`='$email' WHERE  id_employee = $id";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `employee` WHERE id_employee = $id ";
    $proses->sqlAction($sql);
}


?>
<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM expense_report";
$data = $proses->listData($sql);
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Amount</th>
            <th>Information</th>
            <th>Datetime</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= "Rp. " . number_format($x['amount'],0,',','.'); ?></td>
            <td><?= $x['information'] ?></td>
            <td><?= $x['datetime'] ?></td>
            <td>
                <a class="badge badge-danger text-light" href="javascript:void(0)" onclick="deleteData(<?= $x['id_expense_report'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a>
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
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });
</script>


<?php 
if(!empty($_GET['action'] =='store')){
    


    $amount = strip_tags($_POST['amount']);
    $am= preg_replace("/[^0-9]+/", "", $amount);
    $sql = "SELECT * FROM wallet WHERE id_wallet = 1";
    $wallet = $proses->showData($sql);
    $wallet = $wallet['balance'];
    $newbalance = $wallet - $am;

    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sql = "UPDATE `wallet` SET `balance`='$newbalance',`date`='$date',`time`='$time' WHERE id_wallet = 1";
    $proses->sqlAction($sql);





    $information = strip_tags($_POST['information']);
    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `expense_report`(`id_expense_report`, `amount`, `information`,`datetime`) VALUES (0,'$am','$information','$datetime')";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `expense_report` WHERE id_expense_report = '$id'";
    $amount = $proses->showData($sql);
    $amount= $amount['amount'];


    $sql = "SELECT * FROM wallet WHERE id_wallet = 1";
    $wallet = $proses->showData($sql);
    $wallet = $wallet['balance'];

    $value = $wallet + $amount;

    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sql = "UPDATE `wallet` SET `balance`='$value',`date`='$date',`time`='$time' WHERE id_wallet = 1";
    $proses->sqlAction($sql);







    $sql = "DELETE FROM `expense_report` WHERE id_expense_report = $id ";
    $proses->sqlAction($sql);
}


?>
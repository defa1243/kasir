<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

if($_GET['begin'] != '' && $_GET['end'] != ''){
    $begin = $_GET['begin']. " " . "00:00:00";
    $end = $_GET['end']. " " . "00:00:00";


    $sql = "SELECT * FROM `transaction` WHERE `datetime` BETWEEN '$begin' AND '$end'";
    $data = $proses->listData($sql);
}else{
    $sql = "SELECT * FROM `transaction`";
    $data = $proses->listData($sql);
}
?>



<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Date</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= $x['transaction_code'] ?></td>
            <td><?= $x['datetime'] ?></td>
            <td><?= $x['total'] ?></td>
            <td> 
                <a class="p-1 badge badge-info text-light mr-1" href="javascript:void(0)" onclick="detailData(<?= $x['id_transaction'] ?>)"><i class="fas fa-list-alt mr-2"></i></i>Detail</a>
                <a class="p-1 badge badge-danger text-light mr-1" href="javascript:void(0)" onclick="deleteData(<?= $x['id_transaction'] ?>)"><i class="fas fa-trash-alt"></i>Delete And Restore Balance</a>
                <a class="p-1 badge badge-danger text-light" href="javascript:void(0)" onclick="deleteDatabal(<?= $x['id_transaction'] ?>)"><i class="fas fa-trash-alt"></i>Delete</a></td>
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
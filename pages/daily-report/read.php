<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);
date_default_timezone_set('Asia/Jakarta');

$time = date("Y-m-d");
$sql = "SELECT * FROM daily_report";
$data = $proses->listData($sql);

if(count($data) != 0){
    $sql = "SELECT max(id_daily_report) as id FROM daily_report";
    $dataid = $proses->showData($sql);
    $id = $dataid['id'];


    $sql = "SELECT * FROM wallet WHERE id_wallet = 1";
    $value = $proses->showData($sql);
}
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Balance</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= "Rp. " . number_format($x['balance'],0,',','.')?></td>
            <td><?= $x['date']  ?></td>
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
    $sql = "SELECT * FROM daily_report";
        $listdatadr = $proses->listData($sql);
        if(count($listdatadr) != 0){
            $balance = strip_tags($_GET['balance']);

            $sql = "SELECT * FROM wallet WHERE id_wallet = 1";
            $datawallet = $proses->showData($sql);
            $walletbal = $datawallet['balance'];

            $value = $walletbal + $balance;
            date_default_timezone_set('Asia/Jakarta');
            $date = date("Y-m-d");

            $sql = "UPDATE `wallet` SET `balance`='$value', `date`='$date', `time`='$time' WHERE id_wallet = 1";
            $proses->sqlAction($sql); 

            $sql = "INSERT INTO `daily_report`(`id_daily_report`, `balance`, `date`) VALUES (0,'0','$date' )";
            $proses->sqlAction($sql);
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $time = date("Y-m-d");

            $sql = "INSERT INTO `daily_report`(`id_daily_report`, `balance`, `date`) VALUES (0,'0','$date')";
            $proses->sqlAction($sql);
        }





    

}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `daily_report` WHERE `id_daily_report` = $id";
    $valdr= $proses->showData($sql);
    $valdr = $valdr['balance'];

    $sql = "SELECT * FROM wallet WHERE id_wallet = 1";
    $valwal= $proses->showData($sql);
    $valwal = $valwal['balance'];

    $value = $valwal - $valdr;

    $sql = "UPDATE `wallet` SET `balance`='$value' WHERE id_wallet = 1";
    $proses->sqlAction($sql);
    $sql = "DELETE FROM `daily_report` WHERE id_daily_report = $id ";
    $proses->sqlAction($sql);
}


?>
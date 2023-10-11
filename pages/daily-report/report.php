<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

header("Content-Type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=daily-report.xls");

$sql = "SELECT * FROM daily_report";
$data = $proses->listData($sql);
?>

<table border="1">
    <h3>Daily Report</h3>
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
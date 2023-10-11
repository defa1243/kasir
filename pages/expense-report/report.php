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
header("content-Disposition: attachment; filename=expense-report.xls");

$sql = "SELECT * FROM expense_report";
$data = $proses->listData($sql);
?>
<table border="1">
    <h3>Expense Report</h3>
    <tr>
        <th>Amount</th>
        <th>Information</th>
        <th>Datetime</th>
    </tr>
    <?php foreach($data as $x) {?>
    <tr>
        <td><?= "Rp. " . number_format($x['amount'],0,',','.'); ?></td>
        <td><?= $x['information'] ?></td>
        <td><?= $x['datetime'] ?></td>
    </tr>
    <?php } ?>
</table>
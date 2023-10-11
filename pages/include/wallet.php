<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM wallet WHERE id_wallet = 1";
$listdata = $proses->showData($sql);

?>
<form id="formbalance" class="nav-link">
    <a href="javascript:void(0)"><i class="fas fa-wallet mr-2"></i><?= "Rp. " . number_format($listdata['balance'],0,',','.') ?></a>
</form>
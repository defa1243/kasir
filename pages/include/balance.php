<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM daily_report";
$listdata = $proses->listData($sql);

if(count($listdata) != 0){

    
    $sql = "SELECT max(id_daily_report) as id FROM daily_report";
    $dataid = $proses->showData($sql);
    $id = $dataid['id'];
    
    $sql = "SELECT * FROM daily_report WHERE id_daily_report = $id";
    $data = $proses->showData($sql);
}
?>
<form id="formbalance" class="nav-link">
    <?php if(count($listdata) == 0) {?>
        <a href="javascript:void(0)"><?= "Rp. " . number_format(0,0,',','.'); ?></a>
    <?php }else{ ?>
        <a href="javascript:void(0)"><?= "Rp. " . number_format($data['balance'],0,',','.'); ?></a>
        <input type="hidden" name="balance" id="balance" value="<?= $data['balance'] ?>">
        <?php } ?>
</form>
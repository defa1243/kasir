<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql= "SELECT * FROM employee";
$employee = $proses->listData($sql);
?>

<form method="post" id="absentform">
    <?php foreach($employee as $x) {?>

    <div class="row">
        <div class="input-group mb-3 col-xl-5 col-lg-6 col-md-7 col-sm-8 col-12">
            <div class="input-group-prepend">
                <div class="input-group-text">

                    <input type="checkbox" value="<?= $x['id_employee'] ?>" name="absent[]" id="absent"
                        aria-label="Checkbox for following text input">
                </div>
            </div>
            <a href="javascript:void(0)" onclick="">
                <input type="text" value="<?= substr($x['employee_name'],0,17); ?>" class="form-control"
                    aria-label="Text input with checkbox" readonly>
            </a>
        </div>
    </div>

    <?php }  ?>
</form>
<!-- Modal -->
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
$employee = $proses->listData($sql);
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Absent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" id="absentform">
            <?php foreach($employee as $x) {?>

            <div class="row">
                <div class="input-group mb-3 col-12">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" value="<?= $x['id_employee'] ?>" name="absent[]" id="absent"
                                aria-label="Checkbox for following text input">
                        </div>
                    </div>
                    <input type="text" value="<?= substr($x['employee_name'],0,17); ?>" class="form-control"
                        aria-label="Text input with checkbox" readonly>
                </div>
            </div>

            <?php }  ?>
            <div class="mb-3">
                <label>Info</label>
                <select name="info" id="info" class="form-control">
                    <option value="">-- Select Info --</option>
                    <option value="come in">Come In</option>
                    <option value="come Out">Come Out</option>
                </select>
                <small style="display: none;" class="text-danger" id="requiredinfo">*Info Can't be NULL</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" onclick="absent()">Save</button>

    </div>
</div>
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

$sql = "SELECT * FROM category";
$category = $proses->listData($sql);
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="table" id="dataStore">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredname">*Name Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" id="address" name="address" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredaddress">*Address Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="number" id="phone" name="phone" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredphone">*Photo Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredemail">*Email Can't be NULL</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="store()" id="submitbutton">Save</button>
        <small class="text-warning" style="display: none;" id="longvalues">Too Long Values</small>
    </div>
</div>

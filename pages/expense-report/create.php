<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);
$id = strip_tags($_GET['id']);
// var_dump($id);die;
$sql = "SELECT * FROM wallet WHERE id_wallet=1";
$data = $proses->showData($sql);
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Expense Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="table" id="dataStore">
            <div class="mb-3">
                <label>Wallet</label>
                <input type="text" id="wallets" name="wallets" class="form-control" value="<?= "Rp. " . number_format($data['balance'],0,',','.'); ?>" readonly>
            </div>
            <div class="mb-3">
                <label>Amount</label>
                <input type="text" id="amount" name="amount" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredamount">*Amount Type Can't be NULL</small>
                <small style="display: none;" class="text-danger" id="valuebalance">*Balance is not enough</small>
            </div>
            <div class="mb-3">
                <label>Information</label>
                <textarea name="information" id="information" class="form-control" onkeyup="check()" cols="30" rows="10"></textarea>
                <small style="display: none;" class="text-danger" id="requiredinformation">*Information Type Can't be NULL</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="store()" id="submitbutton">Save</button>
        <small class="text-warning" style="display: none;" id="longvalues">Too Long Values</small>
    </div>
</div>

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
        <h5 class="modal-title" id="exampleModalLabel">Create Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="table" id="dataStore">
            <div class="mb-3">
                <label>Menu</label>
                <input type="text" id="menu" name="menu" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredmenu">*Menu Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" id="price" name="price" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredprice">*Price Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">-- Select Category --</option>
                    <?php foreach($category as $x) {?>
                    <option value="<?= $x['id_category'] ?>"><?= $x['category_type'] ?></option>
                    <?php } ?>
                </select>
                <small style="display: none;" class="text-danger" id="requiredcategory">*Category Can't be NULL</small>
            </div>
            <div class="mb-3">
                <label>Information</label>
                <textarea name="info" id="information" class="form-control" onkeyup="check()" cols="30" rows="10"></textarea>
                <small class="text-info">*Information can be NULL*</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" onclick="store()">Save</button>
        <small class="text-warning" style="display: none;" id="longvalues">Too Long Values</small>

    </div>
</div>

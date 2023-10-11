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
$id = strip_tags($_GET['id']);
// var_dump($id);die;
$sql = "SELECT * FROM category WHERE id_category=$id";
$data = $proses->showData($sql);
?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="table" id="dataStore">
            <div class="mb-3">
                <label>Category Type</label>
                <input type="text" id="category" value="<?= $data['category_type'] ?>" name="category" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredcategory">*Category Type Can't be NULL</small>
                <input type="hidden" name="id" value="<?= $id ?>">
            </div>
            <div class="mb-3">
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update()" id="submitbutton">Save</button>
        <small class="text-warning" style="display: none;" id="longvalues">Too Long Values</small>
    </div>
</div>
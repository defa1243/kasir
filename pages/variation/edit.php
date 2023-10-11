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
$sql = "SELECT * FROM category";
$category = $proses->listData($sql);

$sql = "SELECT * FROM variation WHERE id_variation=$id";
$data = $proses->showData($sql);
?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Variation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="table" id="dataStore">
            <div class="mb-3">
                <label>Variation Type</label>
                <input type="text" id="variation" value="<?= $data['variation_type'] ?>" name="variation" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredvariation">*Variation Type Can't be
                    NULL</small>
            </div>
            <div class="mb-3">
                <label>Variation Price</label>
                <input type="number" id="price" value="<?= $data['variation_price'] ?>" name="price" class="form-control" onkeyup="check()">
                <small style="display: none;" class="text-danger" id="requiredprice">*Price Type Can't be NULL</small>  
                <input type="hidden" value="<?= $data['id_variation'] ?>" name="id">
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">-- Select Category --</option>
                    <?php foreach($category as $x){ ?>
                    <option <?php if($x['id_category'] == $data['category_id']){ echo 'selected'; } ?> value="<?= $x['id_category'] ?>"><?= $x['category_type'] ?></option>
                    <?php }?>
                </select>
                <small style="display: none;" class="text-danger" id="requiredcategory">*Category Type Can't be NULL</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update()" id="submitbutton">Save</button>
        <small class="text-warning" style="display: none;" id="longvalues">Too Long Values</small>
    </div>
</div>
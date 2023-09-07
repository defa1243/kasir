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
$sql = "SELECT * FROM menu WHERE id_menu=$id";
$data = $proses->showData($sql);
?>
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="table" id="dataStore">
                    <div class="mb-3">
                        <label>Menu</label>
                        <input value="<?= $data['menu_name'] ?>" type="text" name="menu" class="form-control">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input value="<?= $data['price'] ?>" type="text" id="formatRupiah" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Information</label>
                        <textarea name="info" class="form-control" id="" cols="30" rows="10"><?= $data['information'] ?></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="update()">Save changes</button>
            </div>
        </div>

        
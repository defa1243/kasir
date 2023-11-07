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
$sql = "SELECT * FROM menu AS a INNER JOIN category AS b ON a.category_id = b.id_category WHERE id_menu = $id";
$menu = $proses->showData($sql);
$idcatmenu = $menu['category_id'];


$sql = "SELECT * FROM variation WHERE category_id = $idcatmenu";
$variation = $proses->listData($sql);
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="mb-2">
            <label>Menu</label>
            <input type="text" class="form-control" value="<?= $menu['menu_name'] ?>" id="name" readonly>
        </div>
        <div class="mb-2">
            <label>Price</label>
            <input type="text" class="form-control" value="<?= "Rp. " . number_format($menu['price'],0,',','.'); ?>"
                id="price" readonly>
        </div>
        <div class="mb-2">
            <label>Category</label>
            <input type="text" class="form-control" value="<?= $menu['category_type'] ?>" id="category" readonly>
        </div>
        <?php if($menu['category_type'] == 'Food'){}else{ ?>
        <div class="mb-2">
            <label>Ice</label>
            <select id="ice" class="form-control">
                <option <?php if($menu['category_type'] == 'Food'){ echo 'selected'; } ?> value="">-- Select Option --</option>
                <option value="No Ice">No</option>
                <option value="Less Ice">Less</option>
                <option <?php if($menu['category_type'] != 'Food'){ echo 'selected'; } ?> value="Normal Ice">Normal</option>
                <option value="Extra Ice">Extra</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Sugar</label>
            <select id="sugar" class="form-control">
                <option <?php if($menu['category_type'] == 'Food'){ echo 'selected'; } ?> value="">-- Select Option --</option>
                <option value="No Sugar">No</option>
                <option value="Less Sugar">Less</option>
                <option <?php if($menu['category_type'] != 'Food'){ echo 'selected'; } ?> value="Normal Sugar">Normal</option>
                <option value="Extra Sugar">Extra</option>
            </select>
        </div>
        <?php } ?>
        <div class="mb-2">
            <label>Variation</label>
            <select id="variation1" class="form-control" onchange="addSelect(1)">
                <option value="">-- Select Variation --</option>
                <?php foreach($variation as $x) {?>
                <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                <?php } ?>
            </select>
            <div class="var mt-1" style="display: none;">
                <select id="variation2" class="form-control" onchange="addSelect(2)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation3" class="form-control" onchange="addSelect(3)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation4" class="form-control" onchange="addSelect(4)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation5" class="form-control" onchange="addSelect(5)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation6" class="form-control" onchange="addSelect(6)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation7" class="form-control" onchange="addSelect(7)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation8" class="form-control" onchange="addSelect(8)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation9" class="form-control" onchange="addSelect(9)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="var mt-1" style="display: none;">
                <select id="variation10" class="form-control" onchange="addSelect(10)">
                    <option value="">-- Select Variation --</option>
                    <?php foreach($variation as $x) {?>
                    <option value="<?= $x['variation_type'] ?> + <?= "Rp. " . number_format($x['variation_price'],0,',','.');?>  "><?= $x['variation_type'] ?> --> <?= $x['variation_price'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="mb-2">
            <label>Qty</label>
            <input type="number" name="qty" id="qty" class="form-control">
            <small style="display: none;" class="text-danger" id="requiredqty">*Qty Can't be NULL</small>
        </div>
        <div class="mb-2">
            <label>Information</label>
            <textarea class="form-control" readonly cols="30" rows="10"><?= $menu['information'] ?></textarea>
        </div>

        <input type="hidden" id="idmenu" value="<?= $menu['id_menu'] ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="saveOrder()" id="submitbutton">Save</button>
    </div>
</div>
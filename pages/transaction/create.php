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

$ids = $_GET['id'];
$names = $_GET['name'];
$qtys = $_GET['qty'];
$ices = $_GET['ice'];
$sugars = $_GET['sugar'];
$categorys = $_GET['category'];
$prices = $_GET['price'];
$tomenvars = $_GET['tomenvar'];
$variations1 = $_GET['variation1'];
$variations2 = $_GET['variation2'];
$variations3 = $_GET['variation3'];
$variations4 = $_GET['variation4'];
$variations5 = $_GET['variation5'];
$variations6 = $_GET['variation6'];
$variations7 = $_GET['variation7'];
$variations8 = $_GET['variation8'];
$variations9 = $_GET['variation9'];
$variations10 = $_GET['variation10'];

$tomvalue = array($tomenvars);
$qtyvalue = array($qtys);
$total = 0;

foreach($tomvalue as $t => $row1){
    foreach($qtyvalue as $q => $row2){
        $result[$t][$q] = 0;
        foreach($row1 as $v => $value){
            $result[$t][$q] += $value * $row2[$v];
        }
    }
}
foreach ($result as $row) {
    $total = implode(' ', $row) ;
}


// Inisialisasi array untuk hasil perkalian
$hasil = array();

// Melakukan perulangan untuk mengalikan masing-masing elemen
for ($i = 0; $i < count($qtyvalue); $i++) {
    for ($j = 0; $j < count($qtyvalue[$i]); $j++) {
        $hasil[$i][$j] = $qtyvalue[$i][$j] * $tomvalue[$i][$j];
        foreach($hasil as $x){
            $resultmenu = $x;
        }
    }
}

// Menampilkan hasil perkalian
// foreach ($hasil as $baris) {
//     foreach ($baris as $angka) {
//         echo $angka . " ";
//     }
//     echo "<br>";
// }


?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="dataStore">
            <?php  foreach($ids as $index => $id){?>
            <div class="col-lg-3 col-12">
                <div class="small-box bg-primary text-left">
                    <div class="inner">
                        <h4 class="text-center"><?= $names[$index] ?></h4>
                        <hr>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Price</th>
                                    <td>:</td>
                                    <td><?= $prices[$index] ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>:</td>
                                    <td><?= $categorys[$index] ?></td>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <td>:</td>
                                    <td><?= $qtys[$index] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="ml-2">
                            <div class="row"><strong><?= $sugars[$index] ?></strong></div>
                            <div class="row"><strong><?= $ices[$index] ?></strong></div>
                            <?php   if($variations1[$index] != '') {?>
                            <div class="row"><strong>Variation</strong></div>
                            <p><?= $variations1[$index] ?>
                                <?php    if($variations2[$index] != ''){?>
                                    <?= " "."&"." ".$variations2[$index]  ?>
                                    <?php    if($variations3[$index] != ''){?>
                                        <?= " "."&"." ".$variations3[$index]  ?>
                                        <?php    if($variations4[$index] != ''){?>
                                            <?= " "."&"." ".$variations4[$index]  ?>
                                            <?php    if($variations5[$index] != ''){?>
                                                <?= " "."&"." ".$variations5[$index]  ?>
                                                <?php    if($variations6[$index] != ''){?>
                                                    <?= " "."&"." ".$variations6[$index]  ?>
                                                    <?php    if($variations7[$index] != ''){?>
                                                        <?= " "."&"." ".$variations7[$index]  ?>
                                                        <?php    if($variations8[$index] != ''){?>
                                                            <?= " "."&"." ".$variations8[$index]  ?>
                                                            <?php    if($variations9[$index] != ''){?>
                                                                <?= " "."&"." ".$variations9[$index]  ?>
                                                                <?php    if($variations10[$index] != ''){?>
                                                                    <?= " "."&"." ".$variations10[$index]  ?>
                                                                    
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </p>
                            <?php } ?>
                            <hr>
                            <div class="row">
                                <h6 class="text-center"><?=  "Rp. " . number_format($resultmenu[$index],0,',','.'); ?></h6>
                            </div>
                        </div>
                        

                        <input type="hidden" name="id[]" value="<?= $ids[$index] ?>">
                        <input type="hidden" name="name[]" value="<?= $names[$index] ?>">
                        <input type="hidden" name="qty[]" value="<?= $qtys[$index] ?>">
                        <input type="hidden" name="ice[]" value="<?= $ices[$index] ?>">
                        <input type="hidden" name="sugar[]" value="<?= $sugars[$index] ?>">
                        <input type="hidden" name="price[]" value="<?= $prices[$index] ?>">
                        <input type="hidden" name="resultmenu[]" value="<?= $resultmenu[$index] ?>">
                        <input type="hidden" name="variation1[]" value="<?= $variations1[$index] ?>">
                        <input type="hidden" name="variation2[]" value="<?= $variations2[$index] ?>">
                        <input type="hidden" name="variation3[]" value="<?= $variations3[$index] ?>">
                        <input type="hidden" name="variation4[]" value="<?= $variations4[$index] ?>">
                        <input type="hidden" name="variation5[]" value="<?= $variations5[$index] ?>">
                        <input type="hidden" name="variation6[]" value="<?= $variations6[$index] ?>">
                        <input type="hidden" name="variation7[]" value="<?= $variations7[$index] ?>">
                        <input type="hidden" name="variation8[]" value="<?= $variations8[$index] ?>">
                        <input type="hidden" name="variation9[]" value="<?= $variations9[$index] ?>">
                        <input type="hidden" name="variation10[]" value="<?= $variations10[$index] ?>">
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label>Payment Method</label>
                <select name="method" id="method" class="form-control" onchange="methodpay()">
                    <option value="cash">Cash</option>
                    <option value="non-cash">Non-Cash</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Total</label>
                <input type="text" name="total" class="form-control" id="total" readonly value="<?= "Rp. " . number_format($total,0,',','.'); ?>">
                
            </div>
            <div id="cash">
                
                    
                    
                
                
                    
                    
                </div>
                
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="store()" id="submitbutton">Save</button>
        <button type="submit" class="btn btn-success" onclick="storeprint()" id="submitbutton">Save & Print</button>
        <!-- <a href="pages/transaction/print.php" target="_blank" onclick="storeprint()" id="submitbutton" class="btn btn-success">Save & Print</a> -->
    </div>
</div>
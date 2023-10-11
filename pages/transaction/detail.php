<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$id = $_GET['id'];

$sql = "SELECT * FROM `transaction` WHERE id_transaction = '$id'";
$data = $proses->showData($sql);
$sql = "SELECT * FROM `transaction_detail` AS a INNER JOIN `transaction` AS b ON a.transaction_id = b.id_transaction INNER JOIN menu AS c ON a.menu_id = c.id_menu WHERE transaction_id = '$id'";
$datadetail = $proses->listData($sql);
// foreach($datadetail as $index => $x){
//     $ids = $x['id_transaction_detail'];
//     $sql1 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_1 = b.id_variation WHERE id_transaction_detail = $ids";
//     $sql2 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_2 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql3 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_3 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql4 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_4 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql5 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_5 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql6 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_6 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql7 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_7 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql8 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_8 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql9 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_9 = b.id_variation WHERE transaction_id = '$ids'";
//     $sql10 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_10 = b.id_variation WHERE transaction_id = '$ids'";
    
//     $data1 = $proses->showData($sql1);
//     $data2 = $proses->showData($sql2);
//     $data3 = $proses->showData($sql3);
//     $data4 = $proses->showData($sql4);
//     $data5 = $proses->showData($sql5);
//     $data6 = $proses->showData($sql6);
//     $data7 = $proses->showData($sql7);
//     $data8 = $proses->showData($sql8);
//     $data9 = $proses->showData($sql9);
//     $data10 = $proses->showData($sql10);
// } 

// die;
?>
<div class="row">
    <table>
        <tr>
            <th>Code</th>
            <td>:</td>
            <td><?= $data['transaction_code'] ?></td>
        </tr>
        <tr>
            <th>Datetime</th>
            <td>:</td>
            <td><?= $data['datetime'] ?></td>
        </tr>

    <?php foreach($datadetail as $index => $x) {
        
        $ids = $x['id_transaction_detail'];
        $sql1 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_1 = b.id_variation WHERE id_transaction_detail = $ids";
        $sql2 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_2 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql3 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_3 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql4 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_4 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql5 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_5 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql6 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_6 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql7 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_7 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql8 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_8 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql9 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_9 = b.id_variation WHERE id_transaction_detail = '$ids'";
        $sql10 ="SELECT * FROM `transaction_detail` AS a INNER JOIN variation AS b ON a.variation_10 = b.id_variation WHERE id_transaction_detail = '$ids'";
        
        $data1 = $proses->showData($sql1);
        $data2 = $proses->showData($sql2);
        $data3 = $proses->showData($sql3);
        $data4 = $proses->showData($sql4);
        $data5 = $proses->showData($sql5);
        $data6 = $proses->showData($sql6);
        $data7 = $proses->showData($sql7);
        $data8 = $proses->showData($sql8);
        $data9 = $proses->showData($sql9);
        $data10 = $proses->showData($sql10);
        
        
        
        ?>
        <tr>
            <th>Menu</th>
            <td>:</td>
            <td><?= $x['menu_name'] ?></td>
        </tr>
        <tr>
            <th>Qty</th>
            <td>:</td>
            <td><?= $x['qty'] ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td>:</td>
            <td><?= $x['price_detail'] ?></td>
        </tr>
        <?php  if($data1 != ''){?>
        <tr>
            <th>Variation</th>
            <td>:</td>
            <td class="text-justify"><?php 
            echo $data1['variation_type']; 
            if($data2['variation_type'] != ''){
                echo ","." ". $data2['variation_type'];
                echo '<br>';
                if($data3['variation_type'] != ''){
                    echo $data3['variation_type'];
                    if($data4['variation_type'] != ''){
                        echo ","." ". $data4['variation_type'];
                        echo '<br>';
                        if($data5['variation_type'] != ''){
                            echo $data5['variation_type'];
                            if($data6['variation_type'] != ''){
                                echo ","." ". $data6['variation_type'];
                                echo '<br>';
                                if($data7['variation_type'] != ''){
                                    echo $data7['variation_type'];
                                    if($data8['variation_type'] != ''){
                                        echo ","." ". $data8['variation_type'];
                                        echo '<br>';
                                        if($data9['variation_type'] != ''){
                                            echo $data9['variation_type'];
                                            if($data10['variation_type'] != ''){
                                                echo ","." ". $data10['variation_type'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            

            
            ?></td>
        </tr>
        <?php } ?>
        
        <tr>
            <th><hr></th>
            <td><hr></td>
            <td><hr></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div class="row">
    <a href="pages/transaction/print.php?id=<?= $id ?>" target="_blank" class="btn btn-info">Print</a>

</div>
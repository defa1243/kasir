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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<style>
    center {
        margin-right: 14px;
    }

    * {
        font-size: 10px;
        font-family: 'Times New Roman';
    }

    @media print {
        body {
            margin: 1px!important;
        }
        button {
            display: none;
        }
        @page {
            size: auto;
            size: portrait;
        }
    }
</style>

<body style="width: 58mm; padding: 0px 5px 5px 5px;">
    <div>
        <center>
            <img src="../../assets/dist/img/logo.png" alt="" width="75px" height="75px"><br>
            <strong>Serotonin</strong><br>
            <span>Jl. Abdul Muis no.17</span><br>
            <span>Pekanbaru, Riau</span><br>
            <span style="font-size: 11px;">
            <img src="ig.png" width="10px" height="10px" alt=""> : serotonin.pku
        </span>
        </center>
        <table style="margin-top: 10px;">
            <tr>
                <th>Waktu</th>
                <td>:</td>
                <td><?= $data['datetime'] ?></td>
            </tr>
        </table>
        <span>#<?= $data['transaction_code'] ?></span>
        <table style="margin-top: 5px;">
            <tr>
                <th width="50%">Item</th>
                <th width="10%">Qty</th>
                <th width="40%">Price</th>
            </tr>
            <tr>
                <td colspan='5'>
                    <hr>
                </td>
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
                <td><?= $x['menu_name'] ?></td>
                <td><?= $x['qty'] ?></td>
                <td><?= "Rp." .number_format($x['price_detail'],0,',','.') ?></td>
            </tr>

            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- <hr style="margin-top: 5px;"> -->
        <table style="margin-top: 5px;">
            <tr>
                <th>Total</th>
                <td>:</td>
                <td>&ensp;<?= "Rp." .number_format($data['total'],0,',','.') ?></td>
            </tr>
            <?php if($data['cash'] !== NULL) {?>
            <tr>
                <th>Cash</th>
                <td>:</td>
                <td>&ensp;<?= "Rp." .number_format($data['cash'],0,',','.') ?></td>
            </tr>
            <tr>
                <th>Change</th>
                <td>:</td>
                <td>&ensp;<?= "Rp." .number_format($data['change'],0,',','.') ?></td>
            </tr>
            <?php }else{ ?>
                <tr>
                    <th>Payment</th>
                    <td>:</td>
                    <td>&ensp;Qris</td>
                </tr>
            <?php } ?>
        </table>
        <div style="margin-top: 10px;">
            <span>
                WIFI : SEROTONIN <br>
                No Password
            </span>
        </div>
        
        <center style="margin-top: 10px;">
            <strong> ありがとう </strong>
            <br>
            <strong> THANK YOU </strong><br>
            <button onclick="closeWindow()">Close Window</button>
        </center>

        <script>
            window.print();
            function closeWindow(){
                window.close();
            }

            setTimeout(function(){
                closeWindow();
            }, 10000);

        </script>
    </div>
</body>

</html>
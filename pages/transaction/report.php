<?php  
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);



header("Content-Type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=transaction-report.xls");

if($_GET['begin'] != '' && $_GET['end'] != ''){
    $begin = $_GET['begin']. " " . "00:00:00";
    $end = $_GET['end']. " " . "00:00:00";

    $sql = "SELECT * FROM `transaction_detail` AS a INNER JOIN `transaction` AS b ON a.transaction_id = b.id_transaction INNER JOIN menu AS c ON a.menu_id = c.id_menu WHERE `datetime` BETWEEN '$begin' AND '$end'";
    $data = $proses->listData($sql);
}else{
    $sql = "SELECT * FROM `transaction_detail` AS a INNER JOIN `transaction` AS b ON a.transaction_id = b.id_transaction INNER JOIN menu AS c ON a.menu_id = c.id_menu";
    $data = $proses->listData($sql);
}


?>
<table border="1">
    <h3>Transaction Report</h3>
    <tr>  
        <th>Code</th>      
        <th>Menu</th>      
        <th>Ice</th>      
        <th>Sugar</th>      
        <th>Var 1</th>      
        <th>Var 2</th>      
        <th>Var 3</th>      
        <th>Var 4</th>      
        <th>Var 5</th>      
        <th>Var 6</th>      
        <th>Var 7</th>      
        <th>Var 8</th>      
        <th>Var 9</th>      
        <th>Var 10</th>      
        <th>Price</th>      
        <th>Qty</th>      
        <th>Datetime</th>      
        <th>Cash</th>      
        <th>Total</th>      
        <th>Change</th>      
    </tr>
    <?php foreach($data as $x) {
        $tyvar1 = $x['variation_1'];
        $tyvar2 = $x['variation_2'];
        $tyvar3 = $x['variation_3'];
        $tyvar4 = $x['variation_4'];
        $tyvar5 = $x['variation_5'];
        $tyvar6 = $x['variation_6'];
        $tyvar7 = $x['variation_7'];
        $tyvar8 = $x['variation_8'];
        $tyvar9 = $x['variation_9'];
        $tyvar10 = $x['variation_10'];




        $sql1 = "SELECT * FROM variation WHERE id_variation = '$tyvar1'";
        $data1 = $proses->showData($sql1);
        $typevar1 = $data1['variation_type'];
        
        $sql2 = "SELECT * FROM variation WHERE id_variation = '$tyvar2'";
        $data2 = $proses->showData($sql2);
        $typevar2 = $data2['variation_type'];

        $sql3 = "SELECT * FROM variation WHERE id_variation = '$tyvar3'";
        $data3 = $proses->showData($sql3);
        $typevar3 = $data3['variation_type'];

        $sql4 = "SELECT * FROM variation WHERE id_variation = '$tyvar4'";
        $data4 = $proses->showData($sql4);
        $typevar4 = $data4['variation_type'];

        $sql5 = "SELECT * FROM variation WHERE id_variation = '$tyvar5'";
        $data5 = $proses->showData($sql5);
        $typevar5 = $data5['variation_type'];

        $sql6 = "SELECT * FROM variation WHERE id_variation = '$tyvar6'";
        $data6 = $proses->showData($sql6);
        $typevar6 = $data6['variation_type'];

        $sql7 = "SELECT * FROM variation WHERE id_variation = '$tyvar7'";
        $data7 = $proses->showData($sql7);
        $typevar7 = $data7['variation_type'];

        $sql8 = "SELECT * FROM variation WHERE id_variation = '$tyvar8'";
        $data8 = $proses->showData($sql8);
        $typevar8 = $data8['variation_type'];

        $sql9 = "SELECT * FROM variation WHERE id_variation = '$tyvar9'";
        $data9 = $proses->showData($sql9);
        $typevar9 = $data9['variation_type'];

        $sql10 = "SELECT * FROM variation WHERE id_variation = '$tyvar10'";
        $data10 = $proses->showData($sql10);
        $typevar10 = $data10['variation_type'];
        
        
        ?>
        <tr>
            <td><?= $x['transaction_code'] ?></td>
            <td><?= $x['menu_name'] ?></td>
            <td><?= $x['ice'] ?></td>
            <td><?= $x['sugar'] ?></td>
            <td><?= $typevar1 ?></td>
            <td><?= $typevar2 ?></td>
            <td><?= $typevar3 ?></td>
            <td><?= $typevar4 ?></td>
            <td><?= $typevar5 ?></td>
            <td><?= $typevar6 ?></td>
            <td><?= $typevar7 ?></td>
            <td><?= $typevar8 ?></td>
            <td><?= $typevar9 ?></td>
            <td><?= $typevar10 ?></td>
            <td><?= $x['price_detail'] ?></td>
            <td><?= $x['qty'] ?></td>
            <td><?= $x['datetime'] ?></td>
            <td><?= $x['cash'] ?></td>
            <td><?= $x['total'] ?></td>
            <td><?= $x['change'] ?></td>
        </tr>
    <?php } ?>
        
</table>
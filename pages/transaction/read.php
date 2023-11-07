<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql ="SELECT MAX(id_transaction) as id FROM transaction";
    $idtr= $proses->showData($sql);
    $id = $idtr['id'];

    $sql = "SELECT * FROM menu AS a INNER JOIN category AS b ON a.category_id = b.id_category";
    $data = $proses->listData($sql);



?>





<div class="row">

<button onclick="butPrint(<?= $id ?>)" id="butPrint" style="display: none;">asd</button>

    <?php foreach($data as $x) {?>
    <div class="col-lg-3 col-6">
        <div onclick="order(<?= $x['id_menu'] ?>)" class="small-box <?php if($x['category_type'] == 'Coffee'){echo 'bg-warning'; }elseif($x['category_type'] == 'Non Coffee'){ echo 'bg-success'; }elseif($x['category_type'] == 'Food'){echo 'bg-primary'; }else{ echo 'bg-danger'; } ?>">
            <div class="inner">
                <h5 class="text-justify"><?= $x['menu_name'] ?></h5>

                <p class="mt-3"><?= "Rp. " . number_format($x['price'],0,',','.'); ?></p>
                <strong><?= $x['category_type'] ?></strong>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="javascript:void(0)" class="small-box-footer">Click to Order <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php } ?>
</div>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });
</script>


<?php 
date_default_timezone_set('Asia/Jakarta');
if(!empty($_GET['action'] =='store')){


    $sql = "SELECT max(id_daily_report) as id FROM daily_report";
    $dataid = $proses->showData($sql);
    $id = $dataid['id'];
    
    $sql = "SELECT * FROM daily_report WHERE id_daily_report = $id";
    $data = $proses->showData($sql);

    $datenow = date("Y-m-d");
    
    if($data['date'] !== $datenow ){
        $sql = "INSERT INTO `daily_report`(`id_daily_report`, `balance`, `date`) VALUES (0,'0','$datenow')";
        $proses->sqlAction($sql);
    }





    $ids = $_GET['id'];
    $change = $_GET['change'];
    $names = $_GET['name'];
    $qtys = $_GET['qty'];
    $ices = $_GET['ice'];
    $sugars = $_GET['sugar'];
    $total = $_GET['total'];
    $cash = $_GET['cash'];
    $prices = $_GET['price'];
    $resultmenus = $_GET['resultmenu'];
    $variations1 =$_GET['variation1'];
    $variations2 =$_GET['variation2'];
    $variations3 =$_GET['variation3'];
    $variations4 =$_GET['variation4'];
    $variations5 =$_GET['variation5'];
    $variations6 =$_GET['variation6'];
    $variations7 =$_GET['variation7'];
    $variations8 =$_GET['variation8'];
    $variations9 =$_GET['variation9'];
    $variations10 =$_GET['variation10'];
    
    function hapusAngkaDariString($string) {
        $position = strpos($string, '+');
        $positions = $position -1;
        return substr($string ,0 ,$positions);
    
    }

    for ($i = 0; $i < count($variations1); $i++) {
        $vari1[$i] = hapusAngkaDariString($variations1[$i]);
        $vari2[$i] = hapusAngkaDariString($variations2[$i]);
        $vari3[$i] = hapusAngkaDariString($variations3[$i]);
        $vari4[$i] = hapusAngkaDariString($variations4[$i]);
        $vari5[$i] = hapusAngkaDariString($variations5[$i]);
        $vari6[$i] = hapusAngkaDariString($variations6[$i]);
        $vari7[$i] = hapusAngkaDariString($variations7[$i]);
        $vari8[$i] = hapusAngkaDariString($variations8[$i]);
        $vari9[$i] = hapusAngkaDariString($variations9[$i]);
        $vari10[$i] = hapusAngkaDariString($variations10[$i]);
    }

    $sql = "SELECT max(transaction_code) AS max FROM `transaction`";
    $datacode = $proses->showData($sql);
    $codemax = $datacode['max'];
    $list = (int) substr($codemax, 3 ,3);
    $list++;

    $letter = 'SRT';
    $listcode= $letter . sprintf('%03s', $list);

    $totals= preg_replace("/[^0-9]+/", "", $total);
    $cashs= preg_replace("/[^0-9]+/", "", $cash);
    $changess= preg_replace("/[^0-9]+/", "", $change);
    $changes =  (int) substr($changess, 0 ,-2);   
    $date = date("Y-m-d H:i:s");
    
    // $date = "";
    if($cash != ''){
        $sql = "INSERT INTO `transaction`(`id_transaction`, `transaction_code`, `datetime`, `cash`, `total`, `change`) VALUES (0,'$listcode','$date','$cashs','$totals', $changes)";
    }else{
        $sql = "INSERT INTO `transaction`(`id_transaction`, `transaction_code`, `datetime`, `total`) VALUES (0,'$listcode','$date','$totals')";
    }
    $proses->sqlAction($sql);


    $sql ="SELECT MAX(id_transaction) as id FROM transaction";
    $idtr= $proses->showData($sql);
    $id = $idtr['id'];
    
    foreach($ids as $index => $value){
        $pridets= preg_replace("/[^0-9]+/", "", $resultmenus);
        $noices = $ices[$index];
        


        $sql1 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari1[$index]'";
        $data1 = $proses->showData($sql1);
        $idvar1 = $data1['id'];
        

        $sql2 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari2[$index]'";
        $data2 = $proses->showData($sql2);
        $idvar2 = $data2['id'];

        $sql3 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari3[$index]'";
        $data3 = $proses->showData($sql3);
        $idvar3 = $data3['id'];

        $sql4 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari4[$index]'";
        $data4 = $proses->showData($sql4);
        $idvar4 = $data4['id'];

        $sql5 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari5[$index]'";
        $data5 = $proses->showData($sql5);
        $idvar5 = $data5['id'];

        $sql6 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari6[$index]'";
        $data6 = $proses->showData($sql6);
        $idvar6 = $data6['id'];

        $sql7 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari7[$index]'";
        $data7 = $proses->showData($sql7);
        $idvar7 = $data7['id'];

        $sql8 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari8[$index]'";
        $data8 = $proses->showData($sql8);
        $idvar8 = $data8['id'];

        $sql9 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari9[$index]'";
        $data9 = $proses->showData($sql9);
        $idvar9 = $data9['id'];

        $sql10 = "SELECT id_variation AS id FROM variation WHERE variation_type = '$vari10[$index]'";
        $data10 = $proses->showData($sql10);
        $idvar10 = $data10['id'];

        

        if($noices != ''){
            if ($idvar10 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `variation_10`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$idvar9','$idvar10','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar9 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$idvar9','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar8 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar7 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar6 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar5 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar4 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar3 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar2 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar1 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$pridets[$index]','$qtys[$index]','$id')";
    
            }else{
    
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$pridets[$index]','$qtys[$index]','$id')";
            }

        }else{


            if ($idvar10 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `variation_10`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$idvar9','$idvar10','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar9 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$idvar9','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar8 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar7 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar6 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$pridets[$index]','$qtys[$index]','$id')";
                
    
            }elseif($idvar5 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar4 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$idvar4','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar3 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `variation_3`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$idvar3','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar2 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `variation_2`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$idvar2','$pridets[$index]','$qtys[$index]','$id')";
    
            }elseif($idvar1 != ''){
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `variation_1`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$idvar1','$pridets[$index]','$qtys[$index]','$id')";
    
            }else{
    
                $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$pridets[$index]','$qtys[$index]','$id')";
            }
        }
        
        // $sql= "INSERT INTO `transaction_detail`(`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `variation_10`, `price_detail`, `qty`, `transaction_id`) VALUES (0,'$value','$ices[$index]','$sugars[$index]','$idvar1','$idvar2','$idvar3','$idvar4','$idvar5','$idvar6','$idvar7','$idvar8','$idvar9','$idvar10','$pridets[$index]','$qtys[$index]','$id')";
    
        $proses->sqlAction($sql);


        




        // var_dump($index);
        // echo $index;
    }

    $sql = "SELECT * FROM daily_report";
        $listdatadr = $proses->listData($sql);
        if(count($listdatadr) != 0){
            $sql = "SELECT max(id_daily_report) as id FROM daily_report";
            $dataid = $proses->showData($sql);
            $id = $dataid['id'];    
            
            $sql = "SELECT * FROM daily_report WHERE id_daily_report = '$id'";
            $databal = $proses->showData($sql);
            
            $valuebalance = $databal['balance'] + $totals;
            
            $sql = "UPDATE `daily_report` SET  `balance`='$valuebalance' WHERE id_daily_report = '$id'";
            $proses->sqlAction($sql);
        }else{
            $time = date("Y-m-d");

            $sql = "INSERT INTO `daily_report`(`id_daily_report`, `balance`, `date`) VALUES (0,'$totals','$time')";
            $proses->sqlAction($sql);
        }

}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);

    $sql = "SELECT * FROM daily_report";
    $listdatadr = $proses->listData($sql);

    if(count($listdatadr) != 0){
        $sql = "SELECT * FROM transaction WHERE id_transaction = $id";
        $totals = $proses->showData($sql);
        $total = $totals['total'];

        $sql = "SELECT max(id_daily_report) as id FROM daily_report";
        $dataid = $proses->showData($sql);
        $iddr = $dataid['id'];

        $sql = "SELECT * FROM daily_report WHERE id_daily_report = $iddr";
        $datadr = $proses->showData($sql);
        $datadr = $datadr['balance'];

        $value = $datadr - $total;

        $sql = "UPDATE `daily_report` SET  `balance`='$value' WHERE id_daily_report = '$iddr'";
        $proses->sqlAction($sql);
    }

    



    $sql = "DELETE FROM `transaction` WHERE id_transaction = $id ";
    $proses->sqlAction($sql);
}elseif(!empty($_GET['action']=='deletebal')){
    $id = strip_tags($_GET['id']);

    $sql = "DELETE FROM `transaction` WHERE id_transaction = $id ";
    $proses->sqlAction($sql);
}



?>

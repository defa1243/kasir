<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);


if(!empty($_GET['action'] =='confirm')){

    
    
    $idem = $_GET['absent'];
    $info = $_GET['info'];
    date_default_timezone_set('Asia/Jakarta');
    $time = date("Y-m-d");
    $timeclock = date("Y-m-d H:i:s");
    $date =substr($time,-2);
    $month =substr($time,5,-3);
    $year =substr($time,0,4);
    $clock = substr($timeclock,-8);


    foreach($idem as $x){
        $sql = "INSERT INTO `absent`(`id_absent`, `employee_id`, `date`, `month`, `year`, `time`, `info`) VALUES (0,'$x','$date','$month','$year','$clock', '$info' )";
        $proses->sqlAction($sql);
    }
}elseif(!empty($_GET['action']=='delete')){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `absent` WHERE id_absent = $id ";
    $proses->sqlAction($sql);
}



if(!empty($_GET['month'])){
    $month= $_GET['month'];

    $sql = "SELECT * FROM `absent` AS a INNER JOIN employee AS b ON a.employee_id = b.id_employee WHERE month = $month";
}else{
    $sql = "SELECT * FROM `absent` AS a INNER JOIN employee AS b ON a.employee_id = b.id_employee";
}
    $data=$proses->listData($sql);
?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Info</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $x) {?>
        <tr>
            <td><?= substr($x['employee_name'],0,15); ?></td>
            <td><?php 
                $now = date('d-m-y');
                $date =$x['date'];
                $month =$x['month'];
                if($month <10){
                $month = "0".$month;
                }
                if($date <10){
                $date = "0".$date;
                }
                $year =$x['year'];
                $dateabsent = $date."-".$month."-".$year;
                echo ($dateabsent);
                ?>

            </td>
            <td><?= $x['time'] ?></td>
            <td><?= $x['info'] ?></td>
            <td>
            <a class="badge badge-danger text-light" href="javascript:void(0)" onclick="deleteData(<?= $x['id_absent'] ?>)"><i class="fas fa-trash mr-2"></i></i>Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

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
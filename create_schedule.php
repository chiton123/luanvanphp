<?php
include "connect.php";

$idrecuiter = $_POST['idrecruiter'];
$idjob = $_POST['idjob'];
$iduser = $_POST['iduser'];
$type_schedule = $_POST['type_schedule'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
$note = $_POST['note'];;
// status : 0 chưa xác nhận, 1 đồng ý , 2 từ chối , 3 dời lịch pv
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO schedule values (null, '$idrecuiter','$idjob', '$iduser', '$type_schedule', '$date','$start', '$end','$note','', 0, '$timestamp', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	$query1 = "SELECT * FROM schedule WHERE sc_date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	$r = mysqli_fetch_row($result1);
	$id = $r['0'];
	echo "success" . $id;

}else{
	echo "fail";
}


?>
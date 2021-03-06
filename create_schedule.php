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

$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO schedule values (null, '$idrecuiter','$idjob', '$iduser', '$type_schedule', '$date','$start', '$end','$note', '$timestamp', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}


?>
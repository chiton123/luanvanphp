<?php
include "connect.php";

$id_sche = $_POST['id_sche'];
$idjob = $_POST['idjob'];
$iduser = $_POST['iduser'];
$type_schedule = $_POST['type_schedule'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
$note = $_POST['note'];;

$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE schedule SET sc_idjob = '$idjob', sc_iduser = '$iduser', sc_type = '$type_schedule',
sc_date = '$date', sc_start = '$start' , sc_end = '$end', sc_note = '$note', sc_note_candidate = '',
sc_status = 0 WHERE sc_id = '$id_sche'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";

}else{
	echo "fail";
}


?>
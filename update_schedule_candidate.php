<?php
include "connect.php";

$id_sche = $_POST['id_sche'];
$note_candidate = $_POST['note_candidate'];
$status = $_POST['status'];

// $id_sche = 35;
// $note_candidate = '';
// $status = 0;

$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE schedule SET sc_note_candidate = '$note_candidate', sc_status = '$status' WHERE sc_id = '$id_sche'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}


?>
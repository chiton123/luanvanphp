<?php
include "connect.php";

$ap_id = $_POST['ap_id'];
$status = $_POST['status'];
$note = $_POST['note'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE application set ap_status = '$status', ap_note = '$note' where ap_id = '$ap_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
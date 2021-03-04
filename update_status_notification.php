<?php
include "connect.php";
$status = $_POST['status'];
$n_id = $_POST['n_id'];

// $status = 1;
// $n_id = 17;

$timestamp = date('Y-m-d H:i:S', time());

$query = "UPDATE notification SET n_status = '$status', n_read_at = '$timestamp' where n_id = '$n_id'";

$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>
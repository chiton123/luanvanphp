<?php
include "connect.php";
$iduser = $_POST['iduser'];

// $status = 1;

$timestamp = date('Y-m-d H:i:S', time());

$query = "UPDATE notification SET n_status = 1, n_read_at = '$timestamp' where n_iduser = '$iduser'
	and n_status = 0";

$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>
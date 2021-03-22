<?php
include "connect.php";
$iduser = $_POST['iduser'];
$kind = $_POST['kind'];
// kind: 1: candidate, recruiter, 2: admin


$timestamp = date('Y-m-d H:i:S', time());
if($kind == 1){
	$query = "UPDATE notification SET n_status = 1, n_read_at = '$timestamp' where n_iduser = '$iduser'and n_status = 0";
}else{
	$query = "UPDATE notification_admin SET n_status = 1, n_read_at = '$timestamp' where n_type_user = 0 and n_status = 0";
}


$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>
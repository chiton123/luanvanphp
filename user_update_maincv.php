<?php
include "connect.php";

$iduser = $_POST['iduser'];
$idcv = $_POST['idcv'];
$timestamp = date('Y-m-d H:i:S', time());

$query = "UPDATE cv set cv_main  = 1, date_update = '$timestamp' where cv_iduser = '$iduser'
and cv_idcv = '$idcv'";

$result = mysqli_query($conn, $query);
if($result){
	$query1 = "UPDATE cv set cv_main  = 0, date_update = '$timestamp' where cv_iduser = '$iduser'
	and cv_idcv != '$idcv'";
	$result1 = mysqli_query($conn, $query1);
	if($result1){
		echo "success";
	}else{
		echo "fail";
	}
	
}else {
	echo "fail";
}


?>
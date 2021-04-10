<?php
include "connect.php";
$iduser = $_POST['iduser'];
$idcv = $_POST['idcv'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO cv values (null, '$iduser', '$idcv', 0, '$timestamp','$timestamp')";
$data = mysqli_query($conn, $query);
if($data){
	echo "success";
}else{
	echo "fail";
}


?>
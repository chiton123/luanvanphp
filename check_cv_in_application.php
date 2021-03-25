<?php
include "connect.php";
$iduser = $_POST['iduser'];
$idcv = $_POST['idcv'];

// $iduser = 28;
// $idcv = 3;

$query = "SELECT * FROM application WHERE ap_userid = '$iduser' and ap_cvid = '$idcv'";

$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);
if($number > 0){
	echo "success";
}else {
	echo "fail";
}


?>
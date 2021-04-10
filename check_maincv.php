<?php
include "connect.php";
$iduser = $_POST['iduser'];
$idcv = $_POST['idcv'];
// $iduser = 33;
// $idcv = 22;
// chính
$query = "SELECT * FROM cv where cv_iduser = '$iduser' and cv_idcv = '$idcv' and cv_main = 1";
$data = mysqli_query($conn, $query);
if($data){
	if(mysqli_num_rows($data) > 0){
		echo "success";
	}else{
		echo "fail";
	}
}else{
	echo "fail";
}


?>
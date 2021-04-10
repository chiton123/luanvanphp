<?php
include "connect.php";
$iduser = $_POST['iduser'];
$idcv = $_POST['idcv'];
// $iduser = 33;
// $idcv = 12;
$query = "DELETE FROM cv where cv_iduser = '$iduser' and cv_idcv = '$idcv'";
$data = mysqli_query($conn, $query);
if($data){
	echo "success";
}else{
	echo "fail";
}


?>
<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
$iduser = $_POST['iduser'];
$remark = $_POST['remark'];
$star = $_POST['star'];

// $idcompany = 1;
// $iduser = 27;
// $remark = 'sasa';
// $star = 4.5;
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO evaluation VALUES (null, '$idcompany', '$iduser', '$remark', '$star', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	$query1 = "SELECT * FROM evaluation WHERE ev_date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	if($result1){
		$r = mysqli_fetch_row($result1);
		echo $r['0'];
	}else{
		echo "fail";
	}
	
}else{
	echo "fail";
}



?>
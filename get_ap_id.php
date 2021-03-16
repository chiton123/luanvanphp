<?php
include "connect.php";

$idjob = $_POST['idjob'];
$iduser = $_POST['iduser'];


$query = "SELECT * FROM application where ap_jobid = '$idjob' and ap_userid = '$iduser'";
$result = mysqli_query($conn, $query);
if($result){
	$r = mysqli_fetch_row($result);
	$id = $r['0'];
	echo $id;
}else{
	echo "fail";
}


?>
<?php
include "connect.php";

$idrecruiter = $_POST['idrecruiter'];
// $idrecruiter = 3;
$query = "SELECT * FROM recruiter WHERE r_id = '$idrecruiter'";
$result = mysqli_query($conn, $query);

if($result){
	$r = mysqli_fetch_row($result);
	$id_f = $r['1'];
	echo $id_f;
}else{
	echo "fail";
}



?>
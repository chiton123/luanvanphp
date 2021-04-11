<?php
include "connect.php";

$iduser = $_POST['iduser'];
$school = $_POST['school'];
$major = $_POST['major'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO candidate_study values (null, '$iduser', '$school', '$major', '$start',
'$end','$description', '$timestamp', '$timestamp')";
$result = mysqli_query($conn , $query);

if($result){
	echo "success";
}else{
	echo "fail";
}



?>
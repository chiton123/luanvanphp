<?php
include "connect.php";

$iduser = $_POST['iduser'];
$idskill = $_POST['idskill'];
$star = $_POST['star'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO candidate_skill values (null, '$iduser', '$idskill', '$star', 
'$description', '$timestamp', '$timestamp')";
$result = mysqli_query($conn , $query);
if($result){
	echo "success";
}else{
	echo "fail";
}



?>
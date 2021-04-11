<?php
include "connect.php";

$id = $_POST['id'];
$idskill = $_POST['idskill'];
$star = $_POST['star'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE candidate_skill set ck_idskill = '$idskill', ck_star = '$star',
ck_description = '$description', date_update = '$timestamp'
WHERE ck_id = '$id'";
$result = mysqli_query($conn , $query);

if($result){
	echo "success";
}else{
	echo "fail";
}



?>
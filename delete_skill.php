<?php
include "connect.php";

$id = $_POST['id'];

$query = "DELETE FROM candidate_skill WHERE ck_id = '$id'";
$result = mysqli_query($conn , $query);

if($result){
	echo "success";
}else{
	echo "fail";
}



?>
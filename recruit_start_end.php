<?php
include "connect.php";

$job_id = $_POST['job_id'];
$status = $_POST['status'];

$query = "UPDATE job set j_status = '$status' where j_id = '$job_id'";
$result = mysqli_query($conn, $query);

if($result){
	echo "success";
}else{
	echo "fail";
}





?>
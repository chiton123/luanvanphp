<?php
include "connect.php";

$job_id = $_POST['job_id'];

$query1 = "DELETE FROM application where ap_jobid = '$job_id'";
$result1 = mysqli_query($conn, $query1);
if($result1){
	$query2 = "DELETE FROM job where j_id = '$job_id'";
	$result2 = mysqli_query($conn, $query2);
	if($result2){
		echo "success";
	}else{
		echo "fail";
	}
	
}else {
	echo "fail";
}



?>
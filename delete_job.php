<?php
include "connect.php";

$job_id = $_POST['job_id'];
// $job_id = 6;
$queryjob = "UPDATE job SET j_status_delete = 1 where j_id = '$job_id'";
$resultjob = mysqli_query($conn, $queryjob);
if($resultjob){
	$query_ap = "UPDATE application set ap_status_delete = 1 where ap_jobid = '$job_id'";
	$result_ap = mysqli_query($conn, $query_ap);
	if($result_ap){
		$query_sche = "DELETE FROM schedule where sc_idjob = '$job_id'";
		$result_sche = mysqli_query($conn, $query_sche);
		if($result_sche){
			echo "success";
		}else {
			echo "fail";
		}
	}else{
		echo "fail";
	}
	
}else {
	echo "fail";
}




?>
<?php
include "connect.php";

$job_id = $_POST['job_id'];
$user_id = $_POST['user_id'];
$user_id_f = $_POST['user_id_f'];
$cv_id = $_POST['cv_id'];
$id_apply = 0;
// $job_id = 1;
// $user_id = 31;
// $user_id_f = 'abc';
// $cv_id = 1;
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO application values (null, '$job_id', '$user_id', '$user_id_f','$cv_id', 0,'', '$timestamp', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	$query1 = "SELECT * FROM application WHERE ap_jobid='$job_id' and ap_userid = '$user_id' and ap_cvid = '$cv_id' and ap_date_create = '$timestamp'";
	$result1 = mysqli_query($conn, $query1);
	$r = mysqli_fetch_row($result1);
	$id_apply = $r['0'];
	echo "success" . $id_apply;
}else{
	echo "fail";
}


?>
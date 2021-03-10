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
$query = "UPDATE application SET ap_status_delete = 0, ap_cvid = '$cv_id', ap_status = 0, ap_note = '', ap_date_update = '$timestamp' where ap_jobid = '$job_id' and ap_userid = '$user_id'";
$result = mysqli_query($conn, $query);
if($result){
	$query1 = "SELECT * FROM application WHERE ap_jobid='$job_id' and ap_userid = '$user_id'";
	$result1 = mysqli_query($conn, $query1);
	$r = mysqli_fetch_row($result1);
	$id_apply = $r['0'];
	echo "success" . $id_apply;
}else{
	echo "fail";
}


?>
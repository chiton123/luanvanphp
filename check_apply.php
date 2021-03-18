<?php
include "connect.php";

$job_id = $_POST['job_id'];
$user_id = $_POST['user_id'];

// $job_id = 1;
// $user_id = 27;

$query = "SELECT * FROM application where ap_jobid = '$job_id' and ap_userid = '$user_id'";

$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);
// khi nó xóa -> status = 1 thì mới dc ứng tuyển lại nhe
if($number > 0){
	$query1 = "SELECT * FROM application where ap_jobid = '$job_id' and ap_userid = '$user_id' 
	order by ap_id desc";
	$result1 = mysqli_query($conn, $query1);
	$r = mysqli_fetch_row($result1);
	$status_delete = $r['6'];
	$ap_id = $r['0'];
	if($status_delete == 1){
		echo "again" . $ap_id;
	}else{
		echo "apply" . $ap_id;
	}
}else{
	echo "fail";
}


?>
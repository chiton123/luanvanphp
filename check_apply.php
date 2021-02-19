<?php
include "connect.php";

$job_id = $_POST['job_id'];
$user_id = $_POST['user_id'];

// $job_id = 8;
// $user_id = 19;

$query = "SELECT * FROM application where ap_jobid = '$job_id' and ap_userid = '$user_id'";

$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);

if($number > 0){
	echo "success";
}else{
	echo "fail";
}


?>
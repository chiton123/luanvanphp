<?php
include "connect.php";

$job_id = $_POST['job_id'];
$user_id = $_POST['user_id'];
$user_id_f = $_POST['user_id_f'];
$cv_id = $_POST['cv_id'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO application values (null, '$job_id', '$user_id', '$user_id_f','$cv_id', 0, '$timestamp', '$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}


?>
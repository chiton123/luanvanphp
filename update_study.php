<?php
include "connect.php";

$id = $_POST['id'];
$school = $_POST['school'];
$major = $_POST['major'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = $_POST['description'];
$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE candidate_study set cs_school = '$school', cs_major = '$major',
cs_start = '$start', cs_end = '$end', cs_description = '$description', date_update = '$timestamp'
WHERE cs_id = '$id'";
$result = mysqli_query($conn , $query);

if($result){
	echo "success";
}else{
	echo "fail";
}



?>
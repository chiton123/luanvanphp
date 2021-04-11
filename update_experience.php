<?php
include "connect.php";

// $id = $_POST['id'];
// $company = $_POST['company'];
// $position = $_POST['position'];
// $start = $_POST['start'];
// $end = $_POST['end'];
// $description = $_POST['description'];

$id = 1;
$company = 'sas';
$position = 'sdsd';
$start = '2019-04-11';
$end = '2019-04-11';
$description = 'sybase_get_last_message()';

$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE candidate_experience set ce_company = '$company', ce_position = '$position',
ce_start = '$start', ce_end = '$end', ce_description = '$description', date_update = '$timestamp'
WHERE ce_id = '$id'";
$result = mysqli_query($conn , $query);

if($result){
	echo "success";
}else{
	echo "fail";
}



?>
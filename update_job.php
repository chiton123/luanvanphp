<?php
include "connect.php";

$job_id = $_POST['job_id'];

$position = $_POST['position'];
$address = $_POST['address'];
$benefit = $_POST['benefit'];
$description = $_POST['description'];
$requirement = $_POST['requirement'];
$number = $_POST['number'];
$salary = $_POST['salary'];
$start = $_POST['start'];
$end = $_POST['end'];
$idarea = $_POST['idarea'];
$idprofession = $_POST['idprofession'];
$idexperience = $_POST['idexperience'];
$idKindJob = $_POST['idKindJob'];

// $job_id = 1;

// $position = 'aaa';
// $address = 'aaa';
// $benefit = 'aaa';
// $description ='aaa';
// $requirement = 'aaa';
// $number = 3;
// $salary =333333;
// $start = '2021-02-12 21:00:24';
// $end = '2021-02-12 21:00:24';
// $idarea =1;
// $idprofession = 2;
// $idexperience = 2;
// $idKindJob = 2;

$timestamp = date('Y-m-d H:i:S', time());
$query = "UPDATE job set j_name = '$position', j_address = '$address', j_benefit = '$benefit',
j_description = '$description', j_requirement = '$requirement', j_number = '$number', j_salary = '$salary',
j_start_date = '$start', j_end_date = '$end', j_idtype = '$idKindJob', j_idprofession = '$idprofession',
j_idarea = '$idarea', j_experience = '$idexperience' where j_id = '$job_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
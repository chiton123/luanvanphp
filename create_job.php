<?php
include "connect.php";

// status: đang hiển thị: 0, chờ xác thực : 1, 2: từ chối

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
$query = "INSERT INTO job values (null, ";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
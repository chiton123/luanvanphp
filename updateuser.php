<?php
include "connect.php";
// $iduser = 8;
// $name = 'tuanabc';
// $address = 'abcae';
// $gender = 0;
// $email = 'tuan@gmail.com';
// $phone = '932938282';
// $position = 'dba';
// $birthday = '1988-12-20';
// $introduction = 'hhaa';

$iduser = $_POST['iduser'];
$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$birthday = $_POST['birthday'];
$introduction = $_POST['introduction'];

$query = "UPDATE user set u_name = '$name',u_address = '$address', u_gender = '$gender', u_email = '$email',
u_phone = '$phone', u_birthday = '$birthday', u_introduction = '$introduction', u_position = '$position' where u_id = '$iduser'";
// $query = "UPDATE user set u_name = '$name',u_address = '$address', u_gender = '$gender', u_email = '$email' where u_id = '$iduser'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}


?>
<?php
include "connect.php";

$email = $_POST['email'];

$pass = $_POST['pass'];
// $email = 'manh@gmail.com';
// $pass = 'manh123';
$query = "SELECT * FROM recruiter WHERE r_email = '$email'";

$data = mysqli_query($conn, $query);

$r = mysqli_fetch_row($data);
$iduser = $r['0'];

$hash_pass = $r['3'];

$status = $r['7'];

if($status == 1){
	echo "fail";
}else {
	$dematkhau = password_verify($pass,$hash_pass);
	if($dematkhau){
		echo $iduser;
	}else {
		echo "fail";
	}
}


?>
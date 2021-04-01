<?php
include "connect.php";

$email = $_POST['email'];
// $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
// $email = 'teo@gmail.com';

$query = "SELECT * FROM user WHERE u_email = '$email'";

$data = mysqli_query($conn, $query);

if(mysqli_num_rows($data) >0){
	$r = mysqli_fetch_row($data);
	$iduser = $r['0'];

	$status = $r['10'];
	if($status == 1){
		echo "fail";
	}else {
		echo $iduser;
	}
}else{
	echo "fail";
}




?>
<?php
include "connect.php";

$email = $_POST['email'];

// $email = 'manh@gmail.com';

$query = "SELECT * FROM recruiter WHERE r_email = '$email'";

$data = mysqli_query($conn, $query);

if(mysqli_num_rows($data) > 0){
	$r = mysqli_fetch_row($data);
	$iduser = $r['0'];

	$status = $r['7'];

	if($status == 1){
		echo "fail";
	}else {
		echo $iduser;
	}
}else{
	echo "fail";
}



?>
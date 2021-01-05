<?php
include "connect.php";

$email = $_POST['email'];
// $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$pass = $_POST['pass'];
// $email = 'tuan@gmail.com';
// $pass = 'tuan12345';
$query = "SELECT * FROM user WHERE u_email = '$email'";

$data = mysqli_query($conn, $query);

$r = mysqli_fetch_row($data);
$iduser = $r['0'];

$hash_pass = $r['6'];


$status = $r['11'];
if($status == 1){
	echo "fail";
}else {
	$dematkhau = password_verify($pass,$hash_pass);
	if($dematkhau){
		echo $iduser	;
	}else {
		echo "fail";
}
}


?>
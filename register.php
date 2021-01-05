<?php
include "connect.php";
$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

// $name = 'ton';
// $email = 'ton@gmail.com';
// $pass = password_hash('ton12345', PASSWORD_BCRYPT);
// $timestamp = date('Y-m-d H:i:S', time());

$query = "INSERT INTO user (u_id,u_name,u_email,u_password) values (null, '$name','$email','$pass')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}



?>
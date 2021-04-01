<?php
include "connect.php";
$name = $_POST['name'];
$email = $_POST['email'];
// $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

// $name = 'ton122';
// $email = 'ton1121@gmail.com';


$timestamp = date('Y-m-d H:i:S', time());

$query = "INSERT INTO user (u_id,u_name,u_email, date_create, date_update) values (null, '$name','$email','$timestamp','$timestamp')";

$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}





?>
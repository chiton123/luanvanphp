<?php
include "connect.php";

$tendangnhap = $_POST['username'];
$matkhau = password_hash($_POST['password'], PASSWORD_BCRYPT);
// $tendangnhap = 'admin';
// $matkhau = password_hash('admin', PASSWORD_BCRYPT);

$query = "SELECT * FROM admin WHERE username = '$tendangnhap'";

$data = mysqli_query($conn, $query);

$r = mysqli_fetch_row($data);
$pass = $r['2'];
$dematkhau = password_verify($_POST['password'],$pass);

if($dematkhau){
	echo "success";
}else {
	echo "fail";
}

?>
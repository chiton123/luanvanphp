<?php
include "connect.php";
// 0: candidate, 1: recruiter
$type_user = $_POST['type_user'];

$type_notification = $_POST['type_notification'];
$iduser = $_POST['iduser'];
$content = $_POST['content'];
$id_application = $_POST['id_application'];

$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO notification values (null,'$id_application', '$type_notification', '$type_user', '$iduser','$content',
'$timestamp','$timestamp','$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
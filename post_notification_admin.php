<?php
include "connect.php";
// 0: admin, 1: recruiter
$type_user = $_POST['type_user'];
$type_notification = $_POST['type_notification'];
$iduser = $_POST['iduser'];
$content = $_POST['content'];

// $type_user = 0;
// $type_notification = 'a';
// $iduser = 1;
// $content = 'sasas';


// status: 0: chưa đọc thông báo, 1: đã đọc
// kind: phân biệt dữ liệu bảng nào, 1: notification , 2: notification_admin
$timestamp = date('Y-m-d H:i:S', time());
$query = "INSERT INTO notification_admin values (null ,'$type_notification', '$type_user', '$iduser','$content',0, '$timestamp',2,'$timestamp','$timestamp')";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
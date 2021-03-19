<?php
include "connect.php";
// status_post: đang hiển thị: 0, chờ xác thực : 1, 2: từ chối
$job_id = $_POST['job_id'];
$status = $_POST['status'];
$note_reject = $_POST['note_reject'];

// $job_id = 23;
// $status = 2;
// $note_reject = 'k dung';

$query = "UPDATE job set j_status_post = '$status', j_note_reject = '$note_reject' where j_id = '$job_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else{
	echo "fail";
}




?>
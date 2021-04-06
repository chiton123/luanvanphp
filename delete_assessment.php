<?php
include "connect.php";

$id = $_POST['id'];


$query = "DELETE FROM evaluation where ev_id = '$id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
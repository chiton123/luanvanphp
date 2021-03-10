<?php
include "connect.php";

$ap_id = $_POST['ap_id'];


$query = "UPDATE application set ap_status_delete = 1 where ap_id = '$ap_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
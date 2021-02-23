<?php
include "connect.php";

$ap_id = $_POST['ap_id'];


$query = "DELETE FROM application where ap_id = '$ap_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
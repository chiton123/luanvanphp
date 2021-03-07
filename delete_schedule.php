<?php
include "connect.php";

$sche_id = $_POST['sche_id'];


$query = "DELETE FROM schedule where sc_id = '$sche_id'";
$result = mysqli_query($conn, $query);
if($result){
	echo "success";
}else {
	echo "fail";
}



?>
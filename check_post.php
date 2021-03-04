<?php
include "connect.php";
// 0: candidate, 1: recruiter

$iduser = $_POST['iduser'];

$id_application = $_POST['id_application'];

$query = "SELECT * FROM notification WHERE n_id_application = '$id_application' and n_iduser = '$iduser'";
$result = mysqli_query($conn, $query);


$number = mysqli_num_rows($result);

if($number > 0){
    echo "success";
}else{
    echo "fail";
}



?>
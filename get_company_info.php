<?php
include "connect.php";
$id_recruiter = $_POST['id_recruiter'];
// $id_recruiter = 4;


$query = "SELECT * FROM company WHERE c_idrecruiter = '$id_recruiter'";
$result = mysqli_query($conn, $query);
$r = mysqli_fetch_row($result);
$idcompany = $r['0'];

echo $idcompany;



?>
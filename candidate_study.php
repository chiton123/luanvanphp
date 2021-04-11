<?php
include "connect.php";

$iduser = $_POST['iduser'];
class study{
	function study($id, $iduser, $school, $major, $start, $end, $description){
		$this->id = $id;
		$this->iduser = $iduser;
		$this->school = $school;
		$this->major = $major;
		$this->start = $start;
		$this->end = $end;
		$this->description = $description;
	}
}

$query = "SELECT * FROM candidate_study WHERE cs_iduser = '$iduser'";
$result = mysqli_query($conn ,$query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new user(
		$row['cs_id'],
		$row['cs_iduser'],
		$row['cs_school'],
		$row['cs_major'],
		$row['cs_start'],
		$row['cs_end'],
		$row['cs_description']
	));
}
echo json_encode($mang);



?>
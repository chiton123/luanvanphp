<?php
include "connect.php";

$iduser = $_POST['iduser'];
class experience{
	function experience($id, $iduser, $company, $position, $start, $end, $description){
		$this->id = $id;
		$this->iduser = $iduser;
		$this->company = $company;
		$this->position = $position;
		$this->start = $start;
		$this->end = $end;
		$this->description = $description;
	}
}

$query = "SELECT * FROM candidate_experience WHERE ce_iduser = '$iduser'";
$result = mysqli_query($conn ,$query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new experience(
		$row['ce_id'],
		$row['ce_iduser'],
		$row['ce_company'],
		$row['ce_position'],
		$row['ce_start'],
		$row['ce_end'],
		$row['ce_description']
	));
}
echo json_encode($mang);



?>
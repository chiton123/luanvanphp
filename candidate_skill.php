<?php
include "connect.php";

$iduser = $_POST['iduser'];
class skill{
	function skill($id, $iduser, $idskill, $name, $star, $description){
		$this->id = $id;
		$this->iduser = $iduser;
		$this->idskill = $idskill;
		$this->name = $name;
		$this->star = $star;
		$this->description = $description;
	}
}

$query = "SELECT * FROM candidate_skill c, skill s WHERE ck_iduser = '$iduser' and s.sk_id = c.ck_id";
$result = mysqli_query($conn ,$query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new user(
		$row['ck_id'],
		$row['ck_iduser'],
		$row['ck_idskill']
		$row['sk_name'],
		$row['ck_star'],
		$row['ck_description']
	));
}
echo json_encode($mang);



?>
<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
// $idcompany = 1;
class company{
	function company($id, $name, $introduction, $address, $idarea, $idowner, $image, $website, $status, $vido, $kinhdo){
		$this->id = $id;
		$this->name = $name;
		$this->introduction = $introduction;
		$this->address = $address;
		$this->idarea = $idarea;
		$this->idowner = $idowner;
		$this->image = $image;
		$this->website = $website;
		$this->status = $status;
		$this->vido = $vido;
		$this->kinhdo = $kinhdo;
	}
}
$query = "SELECT * FROM company where c_id = '$idcompany'";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new company(
		$row['c_id'],
		$row['c_name'],
		$row['c_introduction'],
		$row['c_address'],
		$row['c_idarea'],
		$row['c_idrecruiter'],
		$row['c_image'],
		$row['c_website'],
		$row['c_status'],
		$row['latitude'],
		$row['longitude']));

}
echo json_encode($mang);




?>
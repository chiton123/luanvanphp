<?php
include "connect.php";
$iduser = $_POST['iduser'];
// $iduser = 7;
class user{
	function user($id, $name, $birthday, $gender, $address, $email, $introduction,$position,$phone, $status,$idcv, $mode){
		$this->id = $id;
		$this->name = $name;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->address = $address;
		$this->email = $email;
		$this->introduction = $introduction;
		$this->position = $position;
		$this->phone = $phone;
		$this->status = $status;
		$this->idcv = $idcv;
		$this->mode = $mode;
	}
}
$query = "SELECT * FROM user u, cv c where u_id = '$iduser' and u.u_id = c.cv_iduser and c.cv_main = 1";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new user(
		$row['u_id'],
		$row['u_name'],
		$row['u_birthday'],
		$row['u_gender'],
		$row['u_address'],
		$row['u_email'],
		$row['u_introduction'],
		$row['u_position'],
		$row['u_phone'],
		$row['u_status'],
		$row['cv_idcv'],
		$row['u_mode']
	));
}
echo json_encode($mang);

?>
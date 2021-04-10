<?php
include "connect.php";

$job_id = $_POST['job_id'];
// $job_id = 8;
class user{
	function user($id,$ap_id, $name, $birthday, $gender, $address, $email, $introduction, $position, $phone, $status, $idcv, $mode){
		$this->id = $id;
		$this->ap_id = $ap_id;
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

$query = "SELECT * FROM application a, user u, cv c WHERE a.ap_jobid = '$job_id' and a.ap_userid = u.u_id and u.u_id = c.cv_iduser and c.cv_main = 1";
$result = mysqli_query($conn ,$query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new user(
		$row['u_id'],
		$row['ap_id'],
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
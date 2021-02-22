<?php
include "connect.php";

//$job_id = $_POST['job_id'];
$job_id = 8;
class filter{
	function filter($id, $job_id, $user_id, $user_id_f, $username, $email, $address, $phone, $cv_id, $status)
	{
		$this->id = $id;
		$this->job_id = $job_id;
		$this->user_id = $user_id;
		$this->user_id_f = $user_id_f;
		$this->username = $username;
		$this->email = $email;
		$this->address = $address;
		$this->phone = $phone;
		$this->cv_id = $cv_id;
		$this->status = $status;
		
	}

}
$mang = array();
$query = "SELECT * FROM user u, application a WHERE a.ap_jobid = '$job_id' and u.u_id = a.ap_userid";


$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new filter(
		$row['ap_id'],
		$row['ap_jobid'],
		$row['ap_userid'],
		$row['ap_userid_f'],
		$row['u_name'],
		$row['u_email'],
		$row['u_address'],
		$row['u_phone'],
		$row['ap_cvid'],
		$row['ap_status']
	));

}
echo json_encode($mang);




?>
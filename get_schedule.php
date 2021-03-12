<?php
include "connect.php";

$id_recruiter = $_POST['id_recruiter'];
//$id_recruiter = 4;

class schedule{
	function schedule($id, $id_recruiter, $id_job, $job_name, $id_user, $username, $type, $date, $start_hour, $end_hour, $note ){
		$this->id = $id;
		$this->id_recruiter = $id_recruiter;
		$this->id_job = $id_job;
		$this->job_name = $job_name;
		$this->id_user = $id_user;
		$this->username = $username;
		$this->type = $type;
		$this->date = $date;
		$this->start_hour = $start_hour;
		$this->end_hour = $end_hour;
		$this->note = $note;
	}
}

$query = "SELECT * FROM schedule s, user u, job j WHERE s.sc_idrecruiter = '$id_recruiter' and u.u_id = s.sc_iduser and j.j_id = s.sc_idjob and j.j_status_delete = 0";
$result = mysqli_query($conn ,$query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new schedule(
		$row['sc_id'],
		$row['sc_idrecruiter'],
		$row['sc_idjob'],
		$row['j_name'],
		$row['sc_iduser'],
		$row['u_name'],
		$row['sc_type'],
		$row['sc_date'],
		$row['sc_start'],
		$row['sc_end'],
		$row['sc_note']
	));
}
echo json_encode($mang);



?>
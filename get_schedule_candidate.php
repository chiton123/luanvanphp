<?php
include "connect.php";

$iduser = $_POST['iduser'];
$idjob = $_POST['idjob'];

// $iduser = 27;
// $idjob = 1;
class schedule{
	function schedule($id, $id_recruiter, $id_job, $job_name, $id_user, $username, $type, $date, $start_hour, $end_hour, $note, $note_candidate, $status ){
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
		$this->note_candidate = $note_candidate;
		$this->status = $status;
	}
}

$query = "SELECT * FROM schedule s, user u, job j WHERE s.sc_iduser = '$iduser' and s.sc_idjob = '$idjob' and u.u_id = s.sc_iduser and j.j_id = s.sc_idjob and j.j_status_delete = 0 and j.j_status_post = 0 and s.sc_status = 0 ORDER BY s.sc_id DESC LIMIT 1"; // nghĩa là chưa trả lời 
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
		$row['sc_note'],
		$row['sc_note_candidate'],
		$row['sc_status']
	));
}
echo json_encode($mang);



?>
<?php
include "connect.php";

$iduser = $_POST['iduser'];
// $iduser = 27;
class notification{
	function notification($id, $ap_id, $job_id, $type_notification, $type_user, $id_user, $content, $img, $date_read){
		$this->id = $id;
		$this->ap_id = $ap_id;
		$this->job_id = $job_id;
		$this->type_notification = $type_notification;
		$this->type_user = $type_user;
		$this->id_user = $id_user;
		$this->content = $content;
		$this->img = $img;
		$this->date_read = $date_read;
	}
}
$query = "SELECT * FROM application a, notification n, job j, company c where a.ap_id = n.n_id_application and n.n_iduser = '$iduser' and j.j_id = a.ap_jobid and c.c_id = j.j_idcompany";
$result = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($result)){
	array_push($mang, new notification(
		$row['n_id'],
		$row['ap_id'],
		$row['j_id'],
		$row['n_type_notification'],
		$row['n_type_user'],
		$row['n_iduser'],
		$row['n_content'],
		$row['c_image'],
		$row['n_read_at']
	));
}
echo json_encode($mang);



?>
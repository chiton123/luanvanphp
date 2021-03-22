<?php
include "connect.php";
$id_recruiter = $_POST['id_recruiter'];
// $id_recruiter = 3;
class notification{
	function notification($id, $ap_id, $job_id, $type_notification, $type_user, $id_user, $content,$status, $kind, $img, $date_read, $ap_status, $ap_note){
		$this->id = $id;
		$this->ap_id = $ap_id;
		$this->job_id = $job_id;
		$this->type_notification = $type_notification;
		$this->type_user = $type_user;
		$this->id_user = $id_user;
		$this->content = $content;
		$this->status = $status;
		$this->kind = $kind;
		$this->img = $img;
		$this->date_read = $date_read;
		$this->ap_status = $ap_status;
		$this->ap_note = $ap_note;
	}
}
$query = "SELECT n_id, ap_id, j_id, n_type_notification, n_type_user, n_iduser, n_content, n_status, n_kind, c_image,n_read_at,ap_status,ap_note FROM application a, notification n, job j, company c where a.ap_id = n.n_id_application and n.n_iduser = '$id_recruiter' and j.j_id = a.ap_jobid and c.c_id = j.j_idcompany and j.j_status_delete = 0 and j.j_status_post = 0 
	union 
	SELECT n_id, null as ap_id, j_id, n_type_notification, n_type_user, n_iduser,n_content,n_status,n_kind, c_image,n_read_at, null as ap_status, null as ap_note FROM notification_admin n, job j, company c where c.c_id = j.j_idcompany and n.n_jobid = j.j_id and n.n_iduser = '$id_recruiter' and j.j_status_delete = 0";
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
		$row['n_status'],
		$row['n_kind'],
		$row['c_image'],
		$row['n_read_at'],
		$row['ap_status'],
		$row['ap_note']
	));
}
echo json_encode($mang);



?>
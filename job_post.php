<?php
include "connect.php";

class job{
	function job($id, $name, $idcompany,$id_recruiter, $img, $area, $idtype, $idprofession, $start_date, $end_date, $salary_min, $salary_max, $idarea, $experience, $number, $description, $requirement, $benefit, $status, $status_post,$note_reject, $company_name, $type_job )
	{
		$this->id = $id;
		$this->name = $name;
		$this->idcompany = $idcompany;
		$this->id_recruiter = $id_recruiter;
		$this->img = $img;
		$this->area = $area;
		$this->idtype = $idtype;
		$this->idprofession = $idprofession;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->salary_min = $salary_min;
		$this->salary_max = $salary_max;
		$this->idarea = $idarea;
		$this->experience = $experience;
		$this->number = $number;
		$this->description = $description;
		$this->requirement = $requirement;
		$this->benefit = $benefit;
		$this->status = $status;
		$this->status_post = $status_post;
		$this->note_reject = $note_reject;
		$this->company_name = $company_name;
		$this->type_job = $type_job;
	}

}
$mang = array();
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j.j_status_delete = 0";
// status_post: đang hiển thị: 0, chờ xác thực : 1, 2: từ chối
// status: dừng tuyển hay k

$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new job(
		$row['j_id'],
		$row['j_name'],
		$row['j_idcompany'],
		$row['c_idrecruiter'],
		$row['c_image'],
		$row['j_address'],
		$row['j_idtype'],
		$row['j_idprofession'],
		$row['j_start_date'],
		$row['j_end_date'],
		$row['j_salary_min'],
		$row['j_salary_max'],
		$row['j_idarea'],
		$row['e_name'],
		$row['j_number'],
		$row['j_description'],
		$row['j_requirement'],
		$row['j_benefit'],
		$row['j_status'],
		$row['j_status_post'],
		$row['j_note_reject'],
		$row['c_name'],
		$row['t_name']
	));

}
echo json_encode($mang);




?>
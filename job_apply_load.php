<?php
include "connect.php";

$iduser = $_POST['iduser'];
$page = $_GET['page'];
$start = ((int)$page - 1) * 4;
// $iduser = 31;
class job{
	function job($id, $name, $idcompany,$id_recruiter, $id_cv, $img, $area, $idtype, $idprofession, $start_date, $end_date, $salary, $idarea, $experience, $number, $description, $requirement, $benefit, $status,$company_name, $type_job )
	{
		$this->id = $id;
		$this->name = $name;
		$this->idcompany = $idcompany;
		$this->id_recruiter = $id_recruiter;
		$this->id_cv = $id_cv;
		$this->img = $img;
		$this->area = $area;
		$this->idtype = $idtype;
		$this->idprofession = $idprofession;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->salary = $salary;
		$this->idarea = $idarea;
		$this->experience = $experience;
		$this->number = $number;
		$this->description = $description;
		$this->requirement = $requirement;
		$this->benefit = $benefit;
		$this->status = $status;
		$this->company_name = $company_name;
		$this->type_job = $type_job;
	}

}
$mang = array();
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e, application ap where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and ap.ap_jobid = j.j_id and ap.ap_userid = '$iduser' LIMIT $start,4";



$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new job(
		$row['j_id'],
		$row['j_name'],
		$row['j_idcompany'],
		$row['c_idrecruiter'],
		$row['ap_cvid'],
		$row['c_image'],
		$row['j_address'],
		$row['j_idtype'],
		$row['j_idprofession'],
		$row['j_start_date'],
		$row['j_end_date'],
		$row['j_salary'],
		$row['j_idarea'],
		$row['e_name'],
		$row['j_number'],
		$row['j_description'],
		$row['j_requirement'],
		$row['j_benefit'],
		$row['j_status'],
		$row['c_name'],
		$row['t_name']
	));

}
echo json_encode($mang);




?>
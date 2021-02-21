<?php
include "connect.php";

$idrecuiter = $_POST['idrecuiter'];
// $idrecuiter = 4;
class job{
	function job($id, $name, $idcompany, $img, $area, $idtype, $idprofession, $date, $salary, $idarea, $gender, $experience, $number, $position, $description, $requirement, $benefit, $status,$company_name, $type_job )
	{
		$this->id = $id;
		$this->name = $name;
		$this->idcompany = $idcompany;
		$this->img = $img;
		$this->area = $area;
		$this->idtype = $idtype;
		$this->idprofession = $idprofession;
		$this->date = $date;
		$this->salary = $salary;
		$this->idarea = $idarea;
		$this->gender = $gender;
		$this->experience = $experience;
		$this->number = $number;
		$this->position = $position;
		$this->description = $description;
		$this->requirement = $requirement;
		$this->benefit = $benefit;
		$this->status = $status;
		$this->company_name = $company_name;
		$this->type_job = $type_job;
	}

}
$mang = array();
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e, recruiter r where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and r.r_id = c.c_idrecruiter and r.r_id = '$idrecuiter'";




$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new job(
		$row['j_id'],
		$row['j_name'],
		$row['j_idcompany'],
		$row['c_image'],
		$row['ar_name'],
		$row['j_idtype'],
		$row['j_idprofession'],
		$row['j_submission_date'],
		$row['j_salary'],
		$row['j_idarea'],
		$row['j_gender'],
		$row['e_name'],
		$row['j_number'],
		$row['j_position'],
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
<?php
require "connect.php";

$idjob = $_POST['idjob'];
// $idjob = 36;
$document = 0;
$newDocument = 0;
$interview = 0;
$work = 0;
$skip = 0;

class job{
	function job($id, $name, $idcompany, $img, $area, $idtype, $idprofession, $start_date, $end_date, $salary_min, $salary_max, $idarea, $experience, $number, $description, $requirement, $benefit, $status,$company_name, $type_job, $note_reject
	,$document, $new_document, $interview, $work, $skip )
	{
		$this->id = $id;
		$this->name = $name;
		$this->idcompany = $idcompany;
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
		$this->company_name = $company_name;
		$this->type_job = $type_job;
		$this->note_reject = $note_reject;
		$this->document = $document;
		$this->new_document = $new_document;
		$this->interview = $interview;
		$this->work = $work;
		$this->skip = $skip;
	}

}



$mang = array();
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e, recruiter r where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and r.r_id = c.c_idrecruiter and j.j_id = '$idjob' and j.j_status_delete = 0";



$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new job(
		$row['j_id'],
		$row['j_name'],
		$row['j_idcompany'],
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
		$row['c_name'],
		$row['t_name'],
		$row['j_note_reject'],
		$document,
		$newDocument,
		$interview,
		$work,
		$skip
	));
}
echo json_encode($mang);




?>
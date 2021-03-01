<?php
require "connect.php";

$idrecuiter = $_POST['idrecuiter'];

$document = 0;
$newDocument = 0;
$interview = 0;
$work = 0;
$skip = 0;
// $idrecuiter = 4;




class job{
	function job($id, $name, $idcompany, $img, $area, $idtype, $idprofession, $start_date, $end_date, $salary, $idarea, $experience, $number, $description, $requirement, $benefit, $status,$company_name, $type_job
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
		$this->document = $document;
		$this->new_document = $new_document;
		$this->interview = $interview;
		$this->work = $work;
		$this->skip = $skip;
	}

}
// lấy số lượng hồ sơ
function getDocument($job_id){
	global $conn;

	$query1 = "SELECT * FROM application WHERE ap_jobid = '$job_id'";
	$resutl1 = mysqli_query($conn, $query1);
	if($resutl1){
		$document = mysqli_num_rows($resutl1);
		//echo "s: " . $document;
	}
	return $document;
}

function getNewDocument($job_id){
	global $conn;
	$query2 = "SELECT * FROM application WHERE ap_jobid = '$job_id' and ap_status in (0,1)";
	$resutl2 = mysqli_query($conn, $query2);
	if($resutl2){
		$newDocument = mysqli_num_rows($resutl2);
		//echo "s: " . $newDocument;
	}
	return $newDocument;

}

function getInterview($job_id){
	global $conn;
	$query3 = "SELECT * FROM application WHERE ap_jobid = '$job_id' and ap_status in (3,4,5,6,7,8)";
	$resutl3 = mysqli_query($conn, $query3);
	if($resutl3){
		$interview = mysqli_num_rows($resutl3);
		//echo "s: " . $interview;
	}

	return $interview;
}

function getWork($job_id){
	global $conn;
	$query4 = "SELECT * FROM application WHERE ap_jobid = '$job_id' and ap_status in (9,10,11)";
	$resutl4 = mysqli_query($conn, $query4);
	if($resutl4){
		$work = mysqli_num_rows($resutl4);
		//echo "s: " . $work;
	}
	return $work;
}
function getSkip($job_id){
	global $conn;
	$query5 = "SELECT * FROM application WHERE ap_jobid = '$job_id' and ap_status = 2";
	$resutl5 = mysqli_query($conn, $query5);
	if($resutl5){
		$skip = mysqli_num_rows($resutl5);
		//echo "s: " . $skip;
	}
	return $skip;
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
		$row['t_name'],
		getDocument($row['j_id']),
		getNewDocument($row['j_id']),
		getInterview($row['j_id']),
		getWork($row['j_id']),
		getSkip($row['j_id'])
	));
}
echo json_encode($mang);




?>
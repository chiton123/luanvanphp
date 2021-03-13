<?php
include "connect.php";
//khu vực, nghề, loại hình thì lấy trực tiếp từ CSDL, sau đó, trên app xử lý Lọc lại kinh nghiệm, lương,...
$idArea = $_POST['idarea'];
$idProfession = $_POST['idprofession'];
$idTypeWork = $_POST['idkindjob'];
$idExperience = $_POST['idexperience'];
$min_salary = $_POST['min_salary'];
$max_salary = $_POST['max_salary'];
$idSalary = $_POST['idsalary'];

// $idArea = 0;
// $idProfession = 0;
// $idTypeWork = 0;
// $idExperience = 0;
// $idSalary = 6;
// $min_salary = 12000000;
// $max_salary = 15000000;
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j.j_status_delete = 0 and j.j_status_post = 0";
$queryEx = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_experience = '$idExperience' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";


$querySa = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id
	and (j.j_salary_min + j.j_salary_max)/2 > '$min_salary' and (j.j_salary_min + j.j_salary_max)/2 <= '$max_salary'";

$queryPro = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idprofession = '$idProfession' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";

$queryType = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idType = '$idTypeWork' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";

$queryArea = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idarea = '$idArea' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";

if($idProfession != 0){
	$query = $query . $queryPro;
}

if($idArea != 0){
	$query = $query . $queryArea;
}

if($idTypeWork != 0){
	$query = $query . $queryType;
}

if($idExperience != 0){
	$query = $query .  $queryEx;
}
if($idSalary != 0){
	$query = $query . $querySa;
}
class job{
	function job($id, $name, $idcompany,$id_recruiter, $img, $area, $idtype, $idprofession, $start_date, $end_date, $salary_min, $salary_max, $idarea, $experience, $number, $description, $requirement, $benefit, $status,$company_name, $type_job )
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
		$this->company_name = $company_name;
		$this->type_job = $type_job;
	}

}
$mang = array();
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
		$row['c_name'],
		$row['t_name']
	));

}
echo json_encode($mang);




?>
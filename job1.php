<?php
include "connect.php";
// kind : 0 : all, 1: luong cao,2: lam tu xa, 3: thuc tap, 4: moi nhat

$kind = $_POST['kind'];
// $kind = 4;
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
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
$queryThucTap = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j_idtype = 3";
// lương cao: salary >= 10;
$queryLuongCao = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j_salary > 10000000";
$queryLamTuXa = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and t_id = 4";
$queryMoiNhat = " order by j_id desc";

if($kind == 3){
	$query = $query . $queryThucTap;
}
if($kind == 1){
	$query = $query . $queryLuongCao;
}
if($kind == 2){
	$query = $query . $queryLamTuXa;
}
if($kind == 4){
	$query = $query . $queryMoiNhat;
}

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
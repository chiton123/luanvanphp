<?php
include "connect.php";
// kind : 0 : all, 1: luong cao,2: lam tu xa, 3: thuc tap, 4: moi nhat

$kind = $_POST['kind'];
$page = $_GET['page'];


// $kind = 5;
// $page = $_GET['page'];
// $iduser = 0;
// if($kind == 5){
// 	$iduser = 27;
// }

$start = ((int)$page - 1) * 4;

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
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id and j.j_status_delete = 0 and j.j_status_post = 0";
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


$load = " LIMIT $start,4";


$query = $query . $load;
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
<?php
include "connect.php";
//khu vực, nghề, loại hình thì lấy trực tiếp từ CSDL, sau đó, trên app xử lý Lọc lại kinh nghiệm, lương,...
$idArea = $_POST['idarea'];
$idProfession = $_POST['idprofession'];
$idTypeWork = $_POST['idkindjob'];
$idExperience = $_POST['idexperience'];
$idSalary = $_POST['idsalary'];
// $idArea = 7;
// $idProfession = 1;
// $idTypeWork = 1;
// $idExperience = 6;
// $idSalary = 5;
$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
$queryEx = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_experience = '$idExperience'";


$querySa = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_salary_range = '$idSalary'";

$queryPro = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idprofession = '$idProfession'";

$queryType = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idType = '$idTypeWork'";

$queryArea = " INTERSECT SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idarea = '$idArea'";

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



// if($idArea == 0){
// 	if($idProfession == 0){
// 		if($idTypeWork == 0){

// 		}else{
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idType = '$idTypeWork' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}
		
// 	}else{
// 		if($idTypeWork == 0){
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idprofession = '$idProfession' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}else{
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idType = '$idTypeWork' and j_idprofession = '$idProfession' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}
// 	}
	
// }else{
// 	if($idProfession == 0){
// 		if($idTypeWork == 0){
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idarea = '$idArea' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}else{
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idarea = '$idArea' and j_idType = '$idTypeWork' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}

// 	}else{
// 		if($idTypeWork == 0){
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idprofession = '$idProfession' and j_idarea = '$idArea' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}else{
// 			$query = "SELECT * FROM job j, company c, area a, typeofwork t, experience e where j_idType = '$idTypeWork' and j_idprofession = '$idProfession' and j_idarea = '$idArea' and j.j_idcompany = c.c_id and a.ar_id = j.j_idarea and t.t_id = j.j_idtype and j.j_experience = e.e_id";
// 		}
// 	}
// }

?>
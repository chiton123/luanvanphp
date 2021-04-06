<?php
include "connect.php";

$idcompany = $_POST['idcompany'];
// $idcompany = 1;
class remark{
	function remark($id, $idcompany, $iduser, $username, $remark, $star){
		$this->id = $id;
		$this->idcompany = $idcompany;
		$this->iduser = $iduser;
		$this->username = $username;
		$this->remark = $remark;
		$this->star = $star;
	}
}

$query = "SELECT * FROM evaluation e, user u where e.ev_idcompany = '$idcompany' and ev_iduser = u.u_id";
$data = mysqli_query($conn, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data)){
	array_push($mang, new remark(
		$row['ev_id'],
		$row['ev_idcompany'],
		$row['ev_iduser'],
		$row['u_name'],
		$row['ev_remark'],
		$row['ev_star'] ));

}
echo json_encode($mang);




?>
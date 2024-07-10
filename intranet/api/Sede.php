<?php
require("conectInfocat.php");
$data = json_decode(file_get_contents('php://input'), true);

switch ($data['pedir']) {
	case 'listar': listar($datab); break;
	default:
		# code...
		break;
}

function listar($db){
	$filas = [];
	$sql= $db->prepare("SELECT * FROM `sedes` where activo=1");
	$sql->execute();
	while($row= $sql->fetch(PDO::FETCH_ASSOC))
		$filas [] = $row;
	echo json_encode($filas);
}

?>
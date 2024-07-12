<?php
require("conectInfocat.php");
$data = json_decode(file_get_contents('php://input'), true);

switch ($data['pedir']) {
	case 'listar': listar($datab); break;
	case 'crear': crear($datab, $data); break;
	default:
		# code...
		break;
}

function listar($db){
	$filas = [];
	$sql= $db->prepare("SELECT * FROM `medicos` where activo=1 order by nombre");
	$sql->execute();
	while($row= $sql->fetch(PDO::FETCH_ASSOC))
		$filas [] = $row;
	echo json_encode($filas);
}

function crear($db, $data){
	$id='';
	$sql = $db->prepare("INSERT INTO `medicos`(`nombre`) VALUES (?)");
	$sent = $sql->execute([ $data['sede']['sede'] ]);
	if($sent) $id = $db->lastInsertId();
	echo json_encode( array('id' => $id));

}

?>
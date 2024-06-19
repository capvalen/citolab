<?php 
require("conectKarl.php");

$sql=$datab->prepare("SELECT * FROM usuarios where usuNombre = ? and usuPass = MD5(?) and usuActivo = 1;");
if($sql->execute([
	$_POST['usuario'], $_POST['clave']
])){
	$filas = $sql->rowCount();
	//echo $filas;
	if($filas > 0){
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		setcookie("ckNombre", $row['usuNombre'], 0, "/");
		setcookie("ckPoder", $row['usuPoder'], 0, "/");

		echo "ok";
	}else
		echo 'erro1';
}else
	echo 'erro2';
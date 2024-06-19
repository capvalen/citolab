<?php 
require("conectKarl.php");

$muestra  = json_decode($_POST['muestra'],true);

$sql= $datab->prepare("UPDATE `analisis` SET 
`codigo`=?,`nombre`=?,`muestra`=?,`contenedor`=?,`volumen`=?,`conservacion`=?,
`metodologia`=?,`especialidad`=?,`entrega`=?,`condiciones`=?,`precio`=?
WHERE `id`=?");

if($sql->execute([
	$muestra['codigo'], $muestra['nombre'], $muestra['muestra'], $muestra['contenedor'], $muestra['volumen'], $muestra['conservacion'], 
	$muestra['metodologia'], $muestra['especialidad'], $muestra['entrega'], $muestra['condiciones'], $muestra['precio'], $muestra['id']
])){
	echo 'ok';
}

?>
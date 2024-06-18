<?php
require("conectKarl.php");
$filas = [];

//or muestra like concat(?, '%')


	$sql = $datab->prepare( "SELECT * FROM `analisis`
	where nombre like concat('%',?,'%') or codigo like ? 
	and activo=1 order by nombre asc;");
	
	$sql->execute([$_POST['texto'], $_POST['texto']]);
	
	while($rows = $sql->fetch(PDO::FETCH_ASSOC))
		$filas[] = $rows;
	echo json_encode( $filas );//code...

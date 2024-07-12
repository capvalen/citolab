<?php
require("conectKarl.php");
$filas = [];

$sql = $datab->prepare( "SELECT * FROM `analisis`
where nombre like concat(?,'%')
and activo=1 order by nombre asc;");

$sql->execute([$_POST['texto']]);

while($rows = $sql->fetch(PDO::FETCH_ASSOC))
	$filas[] = $rows;
echo json_encode( $filas );//code...

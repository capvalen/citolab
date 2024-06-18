
<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conectKarl.php");


$sql= "INSERT INTO `analisis`(`idAnalisis`, `codigo`, `nombre`, `muestra`, `anaCondiciones`, `anaPlazo`, `anaEspecialidad`, activo) 
VALUES (null,'{$_POST['codig']}','{$_POST['nombr']}','{$_POST['muestr']}','{$_POST['condicion']}','{$_POST['plazo']}','{$_POST['especialida']}', 1)";
//echo $sql;
if($conection->query($sql)){
	echo true;
}

mysqli_close($conection);

?>
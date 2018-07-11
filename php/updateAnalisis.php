
<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conectKarl.php");


$sql= "UPDATE `analisis` SET `anaCodigo`=upper('{$_POST['codig']}'),`anaNombre`=upper('{$_POST['nombr']}'),`anaMuestra`=upper('{$_POST['muestr']}'),`anaCondiciones`=upper('{$_POST['condicion']}'),`anaPlazo`=upper('{$_POST['plazo']}'),`anaEspecialidad`=upper('{$_POST['especialida']}')
 WHERE `idAnalisis` = {$_POST['codigo']};";
echo $sql;
if($conection->query($sql)){
	echo true;
}

mysqli_close($conection);

?>
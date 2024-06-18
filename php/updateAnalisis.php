
<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conectKarl.php");


$sql= "UPDATE `analisis` SET `codigo`=upper('{$_POST['codig']}'),`nombre`=upper('{$_POST['nombr']}'),`muestra`=upper('{$_POST['muestr']}'),`anaCondiciones`=upper('{$_POST['condicion']}'),`anaPlazo`=upper('{$_POST['plazo']}'),`anaEspecialidad`=upper('{$_POST['especialida']}')
 WHERE `idAnalisis` = {$_POST['codigo']};";
echo $sql;
if($conection->query($sql)){
	echo true;
}

mysqli_close($conection);

?>
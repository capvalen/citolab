
<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conectKarl.php");


$sql= "UPDATE `analisis` SET `activo` = '0' WHERE `idAnalisis` = {$_POST['codigo']};";
//echo $sql;
if($conection->query($sql)){
	echo true;
}

mysqli_close($conection);

?>
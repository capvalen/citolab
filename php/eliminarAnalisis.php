<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conectKarl.php");


$sql= "UPDATE `analisis` SET `activo` = '0' WHERE `id` = {$_POST['id']};";
//echo $sql;
if($conection->query($sql)){
	echo 'ok';
}

mysqli_close($conection);

?>
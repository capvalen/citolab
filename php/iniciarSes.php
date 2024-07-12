<?php 
require("conectKarl.php");
header('Content-Type: text/html; charset=utf8');

$filas=array();
$sql = mysqli_query($conection,"select * from usuarios where usuNombre like '{$_POST['nick']}' and `usuPass` = md5('{$_POST['pss']}')");
$numRows= mysqli_num_rows($sql);
if($numRows ==1){
	$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	$expira=time()+60*60*2; //sesión de 2 horas
	setcookie('ckAtiende', $row['usuNombre'], $expira, '/huancayo/directorio');
	setcookie('ckPower', $row['usuPoder'], $expira, '/huancayo/directorio');
}

echo $numRows;
/*while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{
	$filas[$i]= $row;
	$i++;
}
mysqli_close($conection); //desconectamos la base de datos
echo json_encode($filas);*/
?>
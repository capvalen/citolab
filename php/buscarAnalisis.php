<?php 
require("conectKarl.php");

$sentencia = "SELECT * FROM `analisis`
where nombre like concat('%','".$_GET['buscar']."', '%') or codigo like '".$_GET['buscar']."' or muestra like concat('".$_GET['buscar']."', '%')
 and activo=1 order by nombre asc";

$sql = mysqli_query($conection,$sentencia);
?>
<div class="row text-muted pb-3 text-uppercase">Resultados para: <strong><?php echo $_GET['buscar']; ?></strong></div>
<?php 
while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{ ?>

	<div class="row d-flex justify-content-between oneTest p-2 pl-3">
		<a href="#!" class="aNombre text-uppercase" data-nombre><?php echo $row['nombre']; ?> </a>
		 <button class="btn btn-outline-secondary btn-sm d-none d-md-block btnDetalles" ><i class="icofont icofont-caret-right"></i> Ver Detalle</button>
		 <div class="d-none divCodigo" data-codigo="<?php echo $row['codigo']; ?>" data-id="<?php echo $row['idAnalisis']; ?>"></div>
		 <div class="d-none divMuestra" data-muestra="<?php echo $row['muestra']; ?>"></div>
		 <div class="d-none divCondicion" data-condicion="<?php echo $row['anaCondiciones']; ?>"></div>
		 <div class="d-none divPlazo" data-plazo="<?php echo $row['anaPlazo']; ?>"></div>
		 <div class="d-none divEspecialidad" data-especialidad="<?php echo $row['anaEspecialidad']; ?>"></div>
	</div>
<?php  }

mysqli_close($conection); //desconectamos la base de datos

?>
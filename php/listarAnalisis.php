<?php 
require("conectKarl.php");

$filas=array();

$sql = mysqli_query($conection,"SELECT * FROM `analisis`
where nombre like concat('".$_GET['filtro']."', '%') and activo=1
order by nombre asc");


while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{ ?>
	<div class="row d-flex oneTest p-2 pl-3"> <!-- d-flex justify-content-between -->
		<a href="#!" class="aNombre text-uppercase mr-auto" data-nombre='<?php echo $row['nombre']; ?>'><?php echo $row['nombre']; ?> </a>
		<?php if( isset($_COOKIE['ckAtiende']) ) : ?>
		<button class="btn btn-outline-secondary d-md-block btnEditar mr-1 btn-sm "><i class="icofont icofont-blood-test"></i> Editar</button>
		<?php endif; ?>
		<button class="btn btn-outline-secondary btn-sm d-none d-md-block btnDetalles" ><i class="icofont icofont-caret-right"></i> Ver Detalle</button>
		<div class="d-none divCodigo" data-codigo="<?php echo $row['codigo']; ?>"  data-id="<?php echo $row['idAnalisis']; ?>"></div>
		<div class="d-none divMuestra" data-muestra="<?php echo $row['muestra']; ?>"></div>
		<div class="d-none divCondicion" data-condicion="<?php echo $row['anaCondiciones']; ?>"></div>
		<div class="d-none divPlazo" data-plazo="<?php echo $row['anaPlazo']; ?>"></div>
		<div class="d-none divEspecialidad" data-especialidad="<?php echo $row['anaEspecialidad']; ?>"></div>
	</div>
<?php  }

mysqli_close($conection); //desconectamos la base de datos

?>
<h2>Ver paquetes</h2>
<?php

//Control de acciones
if(!empty($_GET['accion']))
{
	switch($_GET['accion'])
	{
		case 'borrar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `paquete` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
		case 'activar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `paquete` SET estado='AC' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;	}
}
?>
<h3>Paquetes activos</h3>
<?php
	$sql="SELECT paquete.id, producto.nombre producto, paquete.nombre, paquete.numeroPublicaciones, paquete.diasVigencia, paquete.precio 
		  FROM paquete left join producto ON producto.id = paquete.id_producto 
		  where paquete.estado='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=admingral&accion=borrar&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-down"></span></a>
		</td>
		<td>PQT'.str_pad($fl['id'], 3, "0", STR_PAD_LEFT).'</td>
		<td>'.$fl['producto'].'</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['numeroPublicaciones'].'</td>
		<td>'.$fl['diasVigencia'].'</td>
		<td>'.$fl['precio'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Folio</th>
			<th>Producto</th>
			<th>Nombre del paquete</th>
			<th>Número de publicaciones</th>
			<th>Dias de vigencia</th>
			<th>Precio</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<h3>Paquetes inactivos</h3>
<?php
	$sql="SELECT paquete.id, producto.nombre producto, paquete.nombre, paquete.numeroPublicaciones, paquete.diasVigencia, paquete.precio 
		  FROM paquete left join producto ON producto.id = paquete.id_producto 
		  where paquete.estado='BA'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=admingral&accion=activar&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span></a>
		</td>
		<td>PQT'.str_pad($fl['id'], 3, "0", STR_PAD_LEFT).'</td>
		<td>'.$fl['producto'].'</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['numeroPublicaciones'].'</td>
		<td>'.$fl['diasVigencia'].'</td>
		<td>$ '.number_format($fl['precio']).'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Folio</th>
			<th>Producto</th>
			<th>Nombre del paquete</th>
			<th>Número de publicaciones</th>
			<th>Dias de vigencia</th>
			<th>Precio</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>

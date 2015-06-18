<h2>Pedidos activos</h2>
<?php

//Control de acciones
if(!empty($_GET['accion']))
{
	switch($_GET['accion'])
	{
		case 'borrar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `pedido` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
	}
}

	$sql="SELECT pedido.id, usuario.nombreComercial, producto.nombre FROM `pedido` 
LEFT JOIN usuario ON usuario.id = pedido.id_usuario 
LEFT JOIN producto ON producto.id = pedido.id_producto
WHERE pedido.estado='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&accion=borrar&id='.$fl['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</td>
		<td>'.$fl['id'].'</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['nombreComercial'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Folio</th>
			<th>Producto</th>
			<th>Empresa</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>





<h2>Pedidos inctivos</h2>
<?php
	$sql="SELECT pedido.id, usuario.nombreComercial, producto.nombre FROM `pedido` 
LEFT JOIN usuario ON usuario.id = pedido.id_usuario 
LEFT JOIN producto ON producto.id = pedido.id_producto
WHERE pedido.estado='BA'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>'.$fl['id'].'</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['nombreComercial'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th>Folio</th>
			<th>Producto</th>
			<th>Empresa</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>



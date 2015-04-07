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
				$sql="UPDATE `veo_seccion` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
		case 'activar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `veo_seccion` SET estado='AC' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;	}
}
?>
<h3>Paquetes activos</h3>
<?php
	$sql="SELECT * from veo_seccion WHERE estado ='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=VolanteoEfectivo&accion=borrar&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-down"></span></a>
		</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['momento'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Nombre de la sección</th>
			<th>Fecha de alta</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<h3>Paquetes inactivos</h3>
<?php
	$sql="SELECT * from veo_seccion WHERE estado ='BA'";

	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=VolanteoEfectivo&accion=activar&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span></a>
		</td>
		<td>'.$fl['nombre'].'</td>
		<td>'.$fl['momento'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Nombre de la sección</th>
			<th>Fecha de alta</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>

<h2>Ver estampas</h2>
<?php

//Control de acciones
if(!empty($_GET['accion']))
{
	switch($_GET['accion'])
	{
		case 'borrar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `estampa` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
	}
}

	$sql="SELECT * FROM `estampa` WHERE estado='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&accion=borrar&id='.$fl['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</td>
		<td>'.$fl['tipo'].str_pad($fl['id_usuario'], 3, "0", STR_PAD_LEFT).str_pad($fl['id'], 5, "0", STR_PAD_LEFT).'</td>
		<td><img width="150px" src="../img/'.$fl['urlPortada'].'"></td>
		<td><img width="150px" src="../img/'.$fl['urlCupon'].'"></td>
		<td>'.number_format($fl['tiraje']).'</td>
		<td>'.explode(' ',$fl['momento'])[0].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Folio</th>
			<th>Diseño Web</th>
			<th>Diseño Correo</th>
			<th>Tiraje</th>
			<th>Fecha de alta</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<?php

?>
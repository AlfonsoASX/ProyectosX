<h2>Ver Volantes</h2>
<?php

//Control de acciones
if(!empty($_GET['accion']))
{
	switch($_GET['accion'])
	{
		case 'borrar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `veo_volante` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
	}
}




	$sql="SELECT * FROM veo_volante 
	LEFT JOIN veo_seccion ON veo_seccion.id = veo_volante.id_veo_seccion 
	WHERE veo_volante.estado='AC'";



	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=VolanteoEfectivo&accion=borrar&id='.$fl['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</td>
		<td>'.$fl['nombre'].'</td>
		<td><img width="150px" src="../img/'.$fl['url'].'"></td>
		<td>'.$fl['momento'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Sección</th>
			<th>Diseño</th>
			<th>Fecha de alta</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<?php

?>
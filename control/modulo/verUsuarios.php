<h2>Ver usuarios</h2>
<?php
$tipos_usuario=array(
	'AM'=> 'Administrador',
	'CL'=> 'Cliente',
	);
//Control de acciones
if(!empty($_GET['accion']))
{
	switch($_GET['accion'])
	{
		case 'borrar':
			if(!empty($_GET['id']))
			{
				$sql="UPDATE `usuario` SET estado='BA' WHERE id=".$_GET['id'];
				$result= mysqli_query ($db,$sql);
			}
		break;
	}
}

	$sql="SELECT * FROM `usuario` WHERE estado='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo=altaUsuario&menu=admingral&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
		<td>
			<a href="?modulo='.$_GET['modulo'].'&menu=admingral&accion=borrar&id='.$fl['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</td>

		<td>'.$fl['nombreComercial'].'</td>

		<td>'.$fl['nombre'].' '.$fl['apellido'].'</td>
		<td>'.$fl['email'].'</td>
		<td>'.$fl['contrasena'].'</td>
		<td>'.$tipos_usuario[$fl['tipo']].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th></th>
			<th>Nombre comercial</th>
			<th>Contacto</th>

			<th>Correo electrónico</th>
			<th>Contraseña</th>
			<th>Tipo de usuario</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
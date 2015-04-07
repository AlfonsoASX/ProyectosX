<h2>Campañas activas</h2>
<?php

	$sql="SELECT * FROM `estampa` WHERE estado='AC'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td><img width="150px" src="../img/'.$fl['urlPortada'].'"></td>
		<td><img width="150px" src="../img/'.$fl['urlCupon'].'"></td>
		<td>'.$fl['titulo'].'</td>
		<td>'.$fl['visitas'].'</td>
		<td>'.$fl['tiraje'].'</td>
		<td>'.$fl['momento'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th>Diseño pùblico</th>
			<th>Diseño correo</th>
			<th>Titulo</th>
			<th>Visitas</th>
			<th>Tiraje</th>
			<th>Fecha de alta</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<?php

?>
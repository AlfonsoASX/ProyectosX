<h2>Alta de pedido</h2>
<p>Selecciona al usuario al que le deseas dar de alta el pedido.</p>
<?php
	$sql="SELECT * FROM `usuario` WHERE estado='AC' AND tipo= 'CL'";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>			
		<a href="?modulo=altaPedido&menu=admingral&id_producto='.$_GET['id_producto'].'&id_usuario='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Dar de alta pedido</a>
		</td>
		<td>'.$fl['nombreComercial'].'</td>

		<td>'.$fl['nombre'].' '.$fl['apellido'].'</td>
		<td>'.$fl['email'].'</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Nombre comercial</th>
			<th>Contacto</th>

			<th>Correo electrónico</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<?php

?>
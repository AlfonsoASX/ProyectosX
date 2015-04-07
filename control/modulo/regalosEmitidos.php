<?php
if(!empty($_GET['id']))
{
?>
  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Petición de envío de correo electrónico enviada con éxito. 
  </div>
<?php
}
?>
<h2>Ver estampas</h2>
<?php


	$sql="SELECT * FROM cliente left join estampa ON estampa.id = cliente.id_estampa";
	$filas='';
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		$filas.='
		<tr>
		<td>
			<a href="?modulo=regalosEmitidos&id='.$fl['id'].'" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Reenviar correo</a>
		</td>
		<td><img width="150px" src="../img/'.$fl['urlPortada'].'"></td>
		<td>'.$fl['titulo'].'</td>

		<td>'.$fl['email'].'</td>
		<td>Enviado</td>
		</tr>';
	}
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table table-hover">
		<tr>
			<th></th>
			<th>Estampa</th>
			<th>Titulo</th>

			<th>Correo de destinatario</th>
			<th>Estatus</th>
		</tr>
			<?php echo $filas; ?>
	</table>
</div>
<?php

?>
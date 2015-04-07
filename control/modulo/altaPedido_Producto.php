<h2>Alta de pedido</h2>

<p>Seleccione el producto del que quiere hacer el pedido</p>

<?php
	$sql="SELECT * FROM `producto` WHERE estado='AC'";
	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
?>
<a class="btn btn-primary btn-lg " href="?modulo=altaPedido_usuario&menu=admingral&id_producto=<?php echo $fl['id']; ?>"><?php echo $fl['nombre']; ?><br>(<?php echo $fl['dominio']; ?>) </a> <?php
	}
?>
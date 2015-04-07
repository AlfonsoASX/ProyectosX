<?php
require '../lib/db.php';
require '../lib/funciones.php';
require '../lib/sesion.php';

//Conexion a todo el sistema


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>IC Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="../3rasPartes/bootstrap/3/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilo.css">


</head>
<body>

	<div class="container">
		<div id="top" class="row">

		</div>
		<div id="cuerpo" class="row">
<?php
if(!sesionValida($_AS['clave'], $db))
{
?>
	<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"></div>
	<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
		<h2>Inicia sesión</h2>
		<form action="" method="post">
		  <div class="form-group">
		    <label for="email">Correo electrónico</label>
		    <input type="email" class="form-control" id="email" name="email" requerid placeholder="Escribe tu correo">
		  </div>
		  <div class="form-group">
		    <label for="contrasena">Contraseña</label>
		    <input type="password" class="form-control" id="contrasena" name="contrasena" requerid placeholder="Contraseña">
		  </div>
		  
		  <button type="submit" class="btn btn-default">Iniciar sesión</button>
		</form>
	</div>

<?php
}
else
{

?>			
			<div id="menu" class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
								<div>Bienvenido: <?php echo datoUsuario($_AS['clave'], 'nombre', $db) ?> <?php echo datoUsuario($_AS['clave'], 'apellido', $db) ?></div>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingUno">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseUno" aria-expanded="false" aria-controls="collapseUno">
          Administración general
        </a>
      </h4>
    </div>
    <div id="collapseUno" class="panel-collapse collapse <?php if(!empty($_GET['menu'])&&$_GET['menu']=='admingral') echo 'in'; ?>" role="tabpanel" aria-labelledby="headingUno">
      <div class="panel-body">
      	<h4><span class="glyphicon glyphicon-check"></span> Altas</h4>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=altaUsuario&menu=admingral">
				<span class="glyphicon glyphicon-user"></span> Dar de alta usuario</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=altaPedido_Producto&menu=admingral">
				<span class="glyphicon glyphicon-shopping-cart"></span> Dar de alta pedido</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=altaPaquete&menu=admingral">
				<span class="glyphicon glyphicon-tasks"></span> Dar de alta paquete</a>
			</li>
		</ul>

		<h4><span class="glyphicon glyphicon-eye-open"></span> Visualizaciones</h4>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=verUsuarios&menu=admingral">
				<span class="glyphicon glyphicon-user"></span> Ver usuarios</a>
			</li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=verPedidos&menu=admingral">
		      	<span class="glyphicon glyphicon-th-list"></span> Ver pedidos</a>
		    </li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=verPaquetes&menu=admingral">
		      	<span class="glyphicon glyphicon-gift"></span> Ver paquetes</a>
		    </li>
		</ul>
      	<h4><span class="glyphicon glyphicon-signal"></span> Reportes</h4>

		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteVentas&menu=admingral">
				<span class="glyphicon glyphicon-usd"></span> Ventas</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteCuentasPorCobrar&menu=admingral">
				<span class="glyphicon glyphicon-earphone"></span> Cuentas por cobrar</a>
			</li>
		</ul>
			
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingDos">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
          Remates y regalos
        </a>
      </h4>
    </div>
    <div id="collapseDos" class="panel-collapse collapse <?php if(!empty($_GET['menu'])&&$_GET['menu']=='rematesyregalos') echo 'in'; ?>" role="tabpanel" aria-labelledby="headingDos">
      <div class="panel-body">
      	<h4><span class="glyphicon glyphicon-check"></span> Altas</h4>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=altaEstampa_Pedido&menu=rematesyregalos">
				<span class="glyphicon glyphicon-user"></span> Dar de alta estampa</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=altaPedido_Usuario&menu=admingral">
				<span class="glyphicon glyphicon-shopping-cart"></span> Dar de alta pedido</a>
			</li>			
		</ul>

		<h4><span class="glyphicon glyphicon-eye-open"></span> Visualizaciones</h4>
		<ul class="nav nav-pills nav-stacked">
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=verEstampas&menu=rematesyregalos">
		      	<span class="glyphicon glyphicon-th-list"></span> Ver estampas</a>
		    </li>
		</ul>
		<h4><span class="glyphicon glyphicon-signal"></span> Reportes</h4>

		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=campanasActivas&menu=rematesyregalos">
				<span class="glyphicon glyphicon-th-list"></span> Campañas activas</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=regalosEmitidos&menu=rematesyregalos">
				<span class="glyphicon glyphicon-th-list"></span> Regalos emitidos</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteVentas&id_producto=1&menu=rematesyregalos">
				<span class="glyphicon glyphicon-usd"></span> Ventas</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteCuentasPorCobrar&id_producto=1&menu=rematesyregalos">
				<span class="glyphicon glyphicon-earphone"></span> Cuentas por cobrar</a>
			</li>			
		</ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTres">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
          A la mano
        </a>
      </h4>
    </div>
    <div id="collapseTres" class="panel-collapse collapse <?php if(!empty($_GET['menu'])&&$_GET['menu']=='alamano') echo 'in'; ?>" role="tabpanel" aria-labelledby="headingTres">
      <div class="panel-body">
      
      	<h4><span class="glyphicon glyphicon-signal"></span> Reportes</h4>

		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteVentas&id_producto=3&menu=alamano">
				<span class="glyphicon glyphicon-usd"></span> Ventas</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteCuentasPorCobrar&id_producto=3&menu=alamano">
				<span class="glyphicon glyphicon-earphone"></span> Cuentas por cobrar</a>
			</li>
		</ul>
			
      </div>
    </div>
  </div>    
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingCuatro">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro">
          Más empleos
        </a>
      </h4>
    </div>
    <div id="collapseCuatro" class="panel-collapse collapse <?php if(!empty($_GET['menu'])&&$_GET['menu']=='masempleos') echo 'in'; ?>" role="tabpanel" aria-labelledby="headingCuatro">
      <div class="panel-body">

      	<h4><span class="glyphicon glyphicon-signal"></span> Reportes</h4>

		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteVentas&id_producto=2&menu=masempleos">
				<span class="glyphicon glyphicon-usd"></span> Ventas</a>
			</li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modulo=reporteCuentasPorCobrar&id_producto=2&menu=masempleos">
				<span class="glyphicon glyphicon-earphone"></span> Cuentas por cobrar</a>
			</li>
		</ul>


			
      </div>
    </div>
  </div>
  	<a class="btn btn-danger form-control" href="?Salir=1">Salir</a>
</div>
			</div>
			<div id="contenido" class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
<?php
				if(!empty($_GET['modulo']))
				{
					$url='modulo/'.$_GET['modulo'].'.php';
					if(file_exists($url))
					{
						require ($url);
					}
				}
?>
			</div>

			<?php 
} //Fin de contenido con sesión iniciada
			?>
		</div>
	</div>

    <script src="../3rasPartes/jquery/1.11.2/jquery.min.js"></script>
    <script src="../3rasPartes/bootstrap/3/js/bootstrap.min.js"></script>
</body>
</html>
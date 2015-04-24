<?php
require 'lib/cfg.php';

$titulo='';
if(!empty($_GET['tipoInmueble']))
{
    $titulo=$_GET['tipoInmueble'];
}
else
{
    $titulo= 'Casas, terrenos y más inmuebles';
}

if(!empty($_GET['operacionInmueble']))
{
    $titulo.=' en '.$_GET['operacionInmueble'];
}

if(!empty($_GET['ciudad']))
{
    $titulo.=' en '.$_GET['ciudad'];
}

?><!DOCTYPE html>
<html lang="es-mx">
    <head> 
        <meta charset="utf-8">
        <title> <?php echo $titulo; ?> - CasasX.com </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Descripción de la sección">
        <meta name="author" content="ASX.mx">
        <link href="3rasPartes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="3rasPartes/offcanvas/offcanvas.css" rel="stylesheet">
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          

          <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Categorías</span>
            <span class="glyphicon glyphicon-menu-hamburger"></span>
          </button>


          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Buscar</span>
            <span class="glyphicon glyphicon-search"></span>
          </button>

  

          <a href="#"><img src="img/logoHorizontal.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" class="form-control" id="q" name="q">
            </div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Buscar</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>


    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          
<h1><?php echo $titulo; ?></h1>


<?php
if(!empty($_GET['id']))
{
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Colonia del inmueble</h4>
      </div>
      <div class="modal-body">
        <div class="row">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<?php
}
?>
          <div class="row">
<?php



$sql=armaSQLbuscarInmuebles();


$rs= mysqli_query ($db,$sql);
$contadorInmuebles=0;

while($fl=mysqli_fetch_array($rs))
{



  
  $img=explode('.',$fl["fotoURL"]);

  if($contadorInmuebles<$_AS['maximoInmuebles'])
  {
      $contadorInmuebles++;
?>
  <div class="col-xs-6 col-lg-4">
      <a href="#"  data-toggle="modal" data-target="#fichaTecnica<?php echo $fl['id'] ?>">
          <div class="item">
            <figure><img width="100%" src="<?php echo $_AS['urlPublico'] ?>?a=<?php echo $img[0]; ?>"></figure>
            <h2><?php echo $fl['titulo']; ?></h2>
            <h3><?php 
    echo ucfirst ($_GLOBAL->tipoInmueble->$fl['tipoInmueble']); 

    if($fl['operacionInmueble']!='')
    {
      echo ' en '.$_GLOBAL->operacionInmueble->$fl['operacionInmueble'];
    }
            ?></h3>
            <img class='logo' src="<?php echo $_AS['urlPublico'] ?>Usuario<?php echo $fl['id_Usuario'] ?>.jpg">
            <p class="precio">$ <?php echo number_format($fl["precio"]); ?></p>
          </div>
      </a>
  </div><!--/.col-xs-6.col-lg-4-->




<!-- Large modal -->

<div class="modal fade" id="fichaTecnica<?php echo $fl['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="colonia" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="colonia"><?php echo $fl["titulo"]; ?></h4>
</div>
<div class="modal-body">
  <div class="container-fluid">        
    <div class="row">
      <div class="col-xs-12 col-sm-7 col-lg-7">
        <img width="100%" src="<?php echo $_AS['urlPublico'] ?>?a=<?php echo $img[0]; ?>">
      </div>
      <div class="col-xs-12 col-sm-5 col-lg-5">
        <p><?php echo $fl['descripcion'] ?></p>
        <p class="precio">Precio: $ <?php echo number_format($fl["precio"]); ?></p>



<div class="panel-group" id="accordion<?php echo $fl['id'] ?>" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?php echo $fl['id'] ?>">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion<?php echo $fl['id'] ?>" href="#collapseOne<?php echo $fl['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $fl['id'] ?>">
          Datos de contacto
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo $fl['id'] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?php echo $fl['id'] ?>">
      <div class="panel-body">
        <div class="row fichaInmobiliaria">
            <div class="col-xs-4 col-sm-5 col-lg-4"><img class='logo' src="<?php echo $_AS['urlPublico'] ?>Usuario<?php echo $fl['id_Usuario'] ?>.jpg"></div>
            <div class="col-xs-8 col-sm-7 col-lg-8">
<strong><?php echo $fl["nombreComercial"]; ?></strong><br>
<?php 
if(!empty($fl['telefono']))
{
  echo '<a href="tel:'.$fl['telefono'].'" class="btn btn-success"><span class="glyphicon glyphicon-earphone"></span> '.$fl['telefono'].' </a>';
}
?>

</div>

        </div>
        <div class="row fichaAsesor">
          <h4>Asesor inmobiliario</h4>
            <div class="col-xs-8 col-sm-7 col-lg-8">
              <strong><?php echo $fl["contacto"]; ?></strong>
              <?php 
if(!empty($fl['campo2']))
{
  echo '<a href="tel:'.$fl['campo2'].'" class="btn btn-success"><span class="glyphicon glyphicon-earphone"></span> '.$fl['campo2'].' </a>';
}


?>
            </div>
            <div class="col-xs-4 col-sm-5 col-lg-4">
              <img class="foto" src="<?php echo $_AS['urlPublico'] ?>Usuario<?php echo $fl['id_Usuario'] ?>aa.jpg">
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo<?php echo $fl['id'] ?>">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion<?php echo $fl['id'] ?>" href="#collapseTwo<?php echo $fl['id'] ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo $fl['id'] ?>">
          Tabla de detalles
        </a>
      </h4>
    </div>
    <div id="collapseTwo<?php echo $fl['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo<?php echo $fl['id'] ?>">
      <div class="panel-body">
        <table class="table table-striped">
<?php if(!empty($fl['terreno'])) { ?>
          <tr><td>Terreno</td><td><?php echo number_format($fl['terreno']); ?> m<sup>2</sup></td></tr><?php } ?>
<?php if(!empty($fl['construccion'])) { ?>
          <tr><td>Construcción</td><td><?php echo number_format($fl['construccion']); ?> m<sup>2</sup></td></tr><?php } ?>
<?php if(!empty($fl['areaDeJardin'])) { ?>
          <tr><td>Área de jardín</td><td><?php echo number_format($fl['areaDeJardin']); ?> m<sup>2</sup></td></tr><?php } ?>
<?php if(!empty($fl['numeroDeRecamaras'])) { ?>
          <tr><td>Recamaras</td><td><?php echo $fl['numeroDeRecamaras']; ?></td></tr><?php } ?>
<?php if(!empty($fl['numeroDeNiveles'])) { ?>
          <tr><td>Niveles</td><td><?php echo $fl['numeroDeNiveles']; ?></td></tr><?php } ?>
<?php if(!empty($fl['numeroDeBanos'])) { ?>
          <tr><td>Baños</td><td><?php echo $fl['numeroDeBanos']; ?></td></tr><?php } ?>
<?php if(!empty($fl['cocheraSinTecho'])) { ?>
          <tr><td>Cochera sin techar</td><td><?php echo $fl['cocheraSinTecho']; ?></td></tr><?php } ?>
<?php if(!empty($fl['cocheraTechada'])) { ?>
          <tr><td>Cochera techada</td><td><?php echo $fl['cocheraTechada']; ?></td></tr><?php } ?>

        </table>
      </div>
    </div>
  </div>
</div>








      </div>

    </div>
  </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

</div>
</div>
</div>
</div>

<?php
  }




}

?>

          </div><!--/row-->


        </div><!--/.col-xs-12.col-sm-9-->

        <?php require 'ctn/barraLateral.php';?>
      </div><!--/row-->

      <hr>

      <footer>
        <p>CasasX.com - <a href="http://casasx.com/control">Acceso a inmobiliarios</a></p>
      </footer>

    </div><!--/.container-->


    <script src="3rasPartes/jquery/1.11.2/jquery.js"></script>

    <script src="3rasPartes/bootstrap/js/bootstrap.min.js"></script>
    <script src="3rasPartes/offcanvas/offcanvas.js"></script>
    <script>
<?php
if(!empty($_GET['id']))
{
?>
    $('#myModal').modal('show');
<?php
}
?>
</script>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4281819-50', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<?php    
}
?>


          <div class="row">
    <?php
$sql="SELECT * FROM `Inmueble` WHERE precio!=0 AND status=1 

";
$rs= mysqli_query ($db,$sql);
$contadorInmuebles=0;

while($fl=mysqli_fetch_array($rs))
{
    if($contadorInmuebles<$_AS['maximoInmuebles'])
    {
        if(file_exists("publico/".$fl["fotoURL"]))
        {
            $contadorInmuebles++;
            $img=explode('.',$fl["fotoURL"]);
?>
            <div class="col-xs-6 col-lg-4">
                <a  data-toggle="modal" data-target="#fichaTecnica<?php echo $fl['id'] ?>">
                    <div class="item">
                      <figure><img width="100%" src="publico/?a=<?php echo $img[0]; ?>"></figure>
                      <h2><?php echo $fl["titulo"]; ?></h2>
                      <p>$ <?php echo number_format($fl["precio"]); ?></p>
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
        <div class="row">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>




<?php
            if(empty($contInmuebles['tipoInmueble'][$fl['tipoInmueble']]))
            {
                $contInmuebles['tipoInmueble'][$fl['tipoInmueble']]=1;
            }
            else
            {
                $contInmuebles['tipoInmueble'][$fl['tipoInmueble']]++;        
            }

            if(empty($contInmuebles['operacionInmueble'][$fl['operacionInmueble']]))
            {
                $contInmuebles['operacionInmueble'][$fl['operacionInmueble']]=1;
            }
            else
            {
                $contInmuebles['operacionInmueble'][$fl['operacionInmueble']]++;
            }
            if(empty($contInmuebles['ciudad'][$fl['ciudad']]))
            {
                $contInmuebles['ciudad'][$fl['ciudad']]=1;
            }
            else
            {
                $contInmuebles['ciudad'][$fl['ciudad']]++;
            }

    

        }
    }
}

?>

          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">

            
<?php

foreach ($_GLOBAL->operacionInmueble as $id => $valor)
{
    if(!empty($contInmuebles['operacionInmueble'][$id]))
    {    
?>
        <a href="#" class="list-group-item"><?php echo $valor ?> (<?php echo $contInmuebles['operacionInmueble'][$id] ?>)</a>
<?php
    }
    else
    {
?>
        <a href="#" class="list-group-item"><?php echo $valor ?></a>
<?php

    }
}
?>
          </div>
<div class="list-group">

            
<?php

foreach ($_GLOBAL->tipoInmueble as $id => $valor)
{
    if(!empty($contInmuebles['tipoInmueble'][$id]))
    {

?>
<a href="#" class="list-group-item"><?php echo $valor ?> (<?php echo $contInmuebles['tipoInmueble'][$id] ?>)</a>
<?php
    }
}
?>
          </div> 
          <div class="list-group">

            
<?php

$sql="SELECT DISTINCT ciudad FROM Inmueble WHERE status=1 AND ciudad!=''";
$rs= mysqli_query ($db,$sql);


while($fl=mysqli_fetch_array($rs))
{
    if(!empty($contInmuebles['ciudad'][$fl['ciudad']]))
    {    
?>
        <a href="#" class="list-group-item"><?php echo $fl['ciudad'] ?> (<?php echo $contInmuebles['ciudad'][$fl['ciudad']] ?>)</a>
<?php
    }
    else
    {
?>
        <a href="#" class="list-group-item"><?php echo $fl['ciudad'] ?></a>
<?php

    }
}
?>
          </div> </div><!--/.sidebar-offcanvas-->
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
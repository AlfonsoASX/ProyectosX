<?php
require 'lib/db.php';
?><!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alfonso Sánchez">
    <link rel="icon" href="favicon.ico">
    <title>Volanteo efectivo</title>
    <link href="3rasPartes/bootstrap/3/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
  </head>

  <body>
<div id="top">
  <div class="container">
    <img src="img_int/top.png">
  </div>
</div>
    <div class="container">
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
<?php
  $sql="SELECT * FROM `veo_seccion` WHERE estado='AC' ORDER BY orden ASC";
  $result= mysqli_query ($db,$sql);
  while($fl=mysqli_fetch_array($result))
  {
    if(empty($_GET['as']))
    {
      $_GET['as']=$fl['id'];;
    }
?>      <li><a href="?as=<?php echo $fl['id']; ?>"><?php echo $fl['nombre']; ?></a></li>
<?php
  }
?>
          </ul>
        </nav>
      </div>


<?php
  $sql="SELECT * FROM veo_volante WHERE estado='AC' AND id_veo_seccion=".$_GET['as'];



  $filas='';
  $result= mysqli_query ($db,$sql);
  $li='';
  $img='';
  $cont=0;
  while($fl=mysqli_fetch_array($result))
  {
    if(empty($li))
    {
      $li='<li data-target="#volantes" data-slide-to="'.$cont.'" class="active"></li>';
      $img='<div class="item active">
      <img src="img/'.$fl['url'].'">
      <div class="carousel-caption">
      </div>
    </div>';
    }
    else
    {
      $li.='<li data-target="#volantes" data-slide-to="'.$cont.'" ></li>';
      $img.='<div class="item">
      <img src="img/'.$fl['url'].'">
      <div class="carousel-caption">
      </div>
    </div>';      
    }

    $cont++;
  }
?><br>
      <div class="row">
        <div class="col-lg-12">
          <div class="sombra"></div>
<div id="volantes" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    
    <?php echo $li ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
        <?php echo $img ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#volantes" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#volantes" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        </div>
      </div>

      <!-- Site footer -->
      <footer id="footer">
        <br>
        <p>Volanteo Efectivo<br>
          Llamanos: (477) 776-1047 y (477) 776-1048</p>
      </footer>

    </div> <!-- /container -->
    <script src="3rasPartes/jquery/1.11.2/jquery.min.js"></script>
    <script src="3rasPartes/bootstrap/3/js/bootstrap.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4281819-40', 'volanteoefectivo.com');
  ga('send', 'pageview');

</script>
  </body>
</html>

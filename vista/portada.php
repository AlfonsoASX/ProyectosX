<!DOCTYPE html>
<html lang="es-mx">
    <head> 
        <meta charset="utf-8">
        <title><?php echo $titulo ?> - Comprarama.com</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="asx.mx">
        <link rel="shortcut icon" href="img/favicon.png" type="image/png" />
        <link href="lib/bootstrap/3.1.0/css/bootstrap.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="https://html5shim.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]--> 
	</head>
	<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <img src="img/logo_Comprarama.png" width="200" />
<p class="navbar-text navbar-right"><button class="btn btn-primary">Vender</button></p>
  </div>
</nav>

		<div class="container">
			<div id="top" class="row">
				<div class="col-lg-12 col-xs-12"><img src="img/logo_Comprarama.png" width="200" /></div>
			</div>


      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">

          

          <h2>Tendencias </h2>
          <ul>
            <li>#Autos</li>
            <li>#Tecnología</li>
            <li>#Hogar</li>
            <li>#Empleo</li>
            <li>#Mascota</li>
            <li>#Nutrición</li>
            <li>#PielyCalzado</li>
          </ul>



        </div>
        <div class="col-sm-12 col-md-6 col-lg-7">
          <h2> ¿Qué te gustaría comprar hoy? </h2>




          <div class="row">
          <?php echo $anuncios; ?>
          </div>

        </div>
        <div class="col-sm-12 col-md-3 col-lg-2">
      <h2>Hola</h2>
<p>sdfasdf
asdf
asdf
asdf</p>
        </div>
      </div>

			<div id="pie" class="row">
				Comprarama.com, Todos los derechos reservados
			</div>
		</div>
		<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=sgalfonso"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'right',
      'numPreferredServices' : 5
    }   
  });
</script>
<!-- AddThis Smart Layers END -->
        <script src="lib/jquery/1.10.2/jquery.min.js"></script>
        <script src="lib/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4281819-38', 'auto');
  ga('send', 'pageview');

</script>
	</body>
</html>


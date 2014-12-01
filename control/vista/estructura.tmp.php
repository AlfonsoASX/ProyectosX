<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Alfonso Sánchez">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>Comprarama.com</title>
        <link href="assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="assets/biccalendar/css/bic_calendar.css" rel="stylesheet">
        <link href="assets/humane/css/bigbox.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/leftmenu.css" rel="stylesheet">
        <link href="app/<?php echo $_ASX['app']; ?>/<?php echo $_ASX['app']; ?>.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php echo $_ASX['menu']; ?>
        <div class="overlay"></div>
        <div class="controlshint"><img src="assets/img/swipe.png" alt="Menu Help"></div>
        <section class="wrap">
        	<div class="container">
        		<ol class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li class="pull-right"><a href="" class="text-muted"><i class="fa fa-refresh"></i></a></li>
				</ol>
                <?php echo $_ASX['contenido']; ?>
        		<footer class="text-center">&copy Comprarama.com 2014</footer>
        	</div>
        </section>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">$(document).bind("mobileinit", function(){$.extend(  $.mobile , {autoInitializePage: false})});</script>
        <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/flot/js/jquery.flot.js" type="text/javascript"></script>
        <script src="assets/flot/js/jquery.flot.stack.js" type="text/javascript"></script>
        <script src="assets/flot/js/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="assets/flot/js/jquery.flot.pie.js" type="text/javascript"></script>
        <script src="assets/flot/js/jquery.flot.categories.js" type="text/javascript"></script>
        <script src="assets/flot/js/jquery.flot.fillbetween.js" type="text/javascript"></script>
        <script src="assets/humane/js/humane.min.js"></script>
        <script src="assets/easypiechart/js/jquery.easypiechart.min.js"></script>
        <script src="assets/biccalendar/js/bic_calendar.min.js"></script>
        <script src="assets/skycons/js/skycons.js"></script>
        <script src="assets/sparkline/js/jquery.sparkline.js"></script>
        <script src="assets/js/leftmenu.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="kernel/js/general.js"></script>
        <script src="app/<?php echo $_ASX['app']; ?>/<?php echo $_ASX['app']; ?>.js"></script>
        <script>autorun();</script>
    </body>
</html>

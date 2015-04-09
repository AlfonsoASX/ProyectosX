<?php 
include("../lib/cfg.php"); 

if(empty($_GET["as"]))
  $_GET["as"]='Inmuebles';




if(sesionValida($ASclave,$db)==0)
{
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fondoBarraHerramientas.jpg">
  <tr>
    <td width="81"><a href="http://casasx.com"><img src="img/logoCliente.jpg" alt="Logo" width="81" height="54" border="0" /></a></td>
    <td> </td>
    <td><form action="" method="post">
      <div align="right">Correo electrónico
        <input name="email" type="email" id="email" />
        Contraseña
        <input name="contrasena" id="contrasena" type="password" />
          <input type="submit" name="button" id="button" value="Entrar" />
          <br />
          <a href="http://maspropiedades.as3w.com/acontrol/recuperaContrasena.php" class="Estilo2">¿Olvidaste tu contraseña?</a>      </div>
    </form></td>
    <td width="96"><img src="img/logoAdControl.jpg" alt="ad control" width="96" height="54" /></td>
  </tr>
</table>
<p>&nbsp;</p>
<div id="cuerpo">
<h1>Bienvenido</h1>
<div align="center"><img src="img/logoadcontrolInicio.jpg" width="464" height="454" /></div>
</div>

<?php
}
else
{


$fotoPerfil=campoUsuario($ASclave,'foto',$db);
$nombrePerfil=nombre($ASclave,$db);

// Módulo activo
$app='';
  switch($_GET["as"])
    {
    case 'Inmuebles':

    $app='{
      "titulo": "Inmuebles",
      "tituloMenu": "Mis inmuebles",
      "menu": {
        "Dar de alta inmueble": "'."javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?at=".time()."','contenido'".');",
        "Ver inmuebles": "'."javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?'+urlGlobal,'contenido'".');",
        "Ver borradores": "'."javascript:AS3Wxmlhttp('ctn/inmueble/verBorradores2.php','contenido'".');"
      }
    }';
    break;
    case 'Asesores':

    $app='{
      "titulo": "Asesores",
      "tituloMenu": "Asesores",
      "menu": {
        "Dar de alta asesor": "'."javascript:AS3Wxmlhttp('ctn/inmueble/altaAsesor.php','contenido'".');",
        "Ver asesores": "'."javascript:AS3Wxmlhttp('ctn/inmueble/verAsesor.php','contenido'".');"
      }
    }';

    break;
    case 'Usuarios':

    $app='{
      "titulo": "Administración de Asociados",
      "tituloMenu": "Herramientas",
      "menu": {
        "Alta de asociado": "'."javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php','contenido'".');",
        "Ver asociados": "'."javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php','contenido'".');"
      }
    }';
    break;
    case 'config':

    $app='{
      "titulo": "Configuración",
      "tituloMenu": "",
      "menu": {}
    }';

    break;
    }

    $_AS['app']=json_decode($app);




?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Panel de control</title>

    <!-- Bootstrap core CSS -->
    <link href="../3rasPartes/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="estilos.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body onload="<?php

if(empty($_GET['as']))
{
  $_GET['as']=0;
}

switch($_GET["as"])
{
  case 'Asesores':
  echo "javascript:AS3Wxmlhttp('ctn/inmueble/verAsesor.php','contenido');";
  break;
  case 'config':
  echo "javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php?id=".$ASid."','contenido');";
  break;
  case 'Inmuebles':
  echo "javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?'+urlGlobal,'contenido');";
  break;
  case 'Usuarios':
  echo "javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php','contenido');";
  break;
  case 'AdminNoticias':
    if($_POST["titulo"]=="")
    {
      echo "javascript:AS3Wxmlhttp('ctn/noticia/verNoticia.php','contenido');";
    }
  break;
  case 'Solicitudes':
    if($_POST["tipoInmueble"]=="")
    { 
      echo "javascript:AS3Wxmlhttp('ctn/solicitud/verSolicitud.php','contenido');";   
    }
  break;
}
?>">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CasasX.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
<?php 
if($ASid==1||$ASid==2||$ASid==7)
{
?>  
            <li><a href="?as=Usuarios">Administración de asociados</a></li>
<?php
}
?>
            <li><a href="?as=Inmuebles">Inmuebles</a></li>
            <li><a href="?as=Asesores">Asesores</a></li>
            <li><a href="?as=config"><?php echo $nombrePerfil ?></a></li>
            <li><a href="?Salir=1">Salir</a></li>



          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php 
            foreach ($_AS['app']->menu as $caption => $href) 
            {
              echo '<li><a href="'.$href.'">'.$caption.'</a></li>';
            }
            ?>            
          </ul>


          <h3>Soporte</h3>
          <p>
            Teléfono: (477) 347.22.39<br>
            Correo electrónico: soporte@asx.mx
          </p>
          <div id="guardar"> </div>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <h1 class="page-header"><?php echo $_AS['app']->titulo; ?></h1>
          <div id="contenido"></div>
         
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script language="javascript" src="../js/AjaxAS3W.js"  type="text/javascript"></script>
    <script src="../3rasPartes/jquery/1.11.2/jquery.js"></script>
    <script src="../3rasPartes/bootstrap/js/bootstrap.min.js"></script>

    <script language="JavaScript" type="text/JavaScript"> 
      var checkBox = new Array();
      urlGlobal='ayt=1';
      function limpiarUrlGlobal()
      {
        for (var i = 0, long = checkBox.length; i < long; i++) 
        {
          checkBox[i]=0;
        }
        urlGlobal='ayt=1';
      } 

      function AScheckBox(obj) 
      {
        url='ayt=1';
        if(obj.checked) 
        {
          checkBox[obj.value]=1;
        } 
        else 
        {          
          checkBox[obj.value]=0;
        }
        for (var i = 0, long = checkBox.length; i < long; i++) 
        {
          if(checkBox[i]==1)
          {
            url+='&'+i;
          }
        }
        urlGlobal=url;
        if(url=='ayt=1')
        {
          javascript:AS3Wxmlhttp('ctn/inmueble/borrar.php','herramientas');
        }
        else
        {
          javascript:AS3Wxmlhttp('ctn/inmueble/verInmuebleHerramientas.php?'+urlGlobal,'herramientas');
        }
        url='';
      }   
    </script>
  </body>
</html>
<?php
}
?>



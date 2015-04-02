<?php 
include("../lib/cfg.php"); 
$fotoPerfil=campoUsuario($ASclave,'foto',$db);
$nombrePerfil=nombre($ASclave,$db);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<title>aControl - Bienes raices</title>
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

<script language="javascript" src="../js/AjaxAS3W.js"  type="text/javascript"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
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
<?php
if(sesionValida($ASclave,$db)==0)
{
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fondoBarraHerramientas.jpg">
  <tr>
    <td width="81"><a href="http://maspropiedades.com.mx"><img src="img/logoCliente.jpg" alt="Logo" width="81" height="54" border="0" /></a></td>
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
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fondoBarraHerramientas.jpg">
  <tr>
    <td width="81"><a href="http://maspropiedades.com.mx"><img src="img/logoCliente.jpg" alt="Logo" width="81" height="54" border="0" /></a></td>
    <td>&nbsp;</td>
    <td><div align="right"><?php echo $nombrePerfil ?> | <a href="?Salir=1">Salir</a></div></td>
    <td width="96"><img src="img/logoAdControl.jpg" alt="ad control" width="96" height="54" /></td>
  </tr>
</table>
<div align="center">
    <a class="menu" href="?as=Asesores">Asesores</a>
    <a class="menu" href="?as=Inmuebles">Inmuebles</a>
	<a class="menu" href="?as=Noticias">Noticias</a>
	<a class="menu" href="?as=Solicitudes">Solicitudes</a>
	<a class="menu" href="?as=config">Configuración</a>
<br />
<br />
<?php 
if($ASid==1||$ASid==2||$ASid==7)
{
?>	<a class="menu" href="?as=Usuarios">Administración de asociados</a>
    <a class="menu" href="?as=Web">Portal Web</a>
    <a class="menu" href="?as=AdminNoticias">Administración de Noticias</a><?php
}
?>
    
</div><br />
<div id="cuerpo">
	<?php 
	switch($_GET["as"])
    {
    case 'Inmuebles':
		?>
		<h1>Inmuebles</h1>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top" bgcolor="#F7F7F7"><div id="menuLateral">
              <h2>Mis inmuebles</h2>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?at=<?php echo time(); ?>','contenido');" class="botonLateral">Dar de alta inmueble</a></p>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?'+urlGlobal,'contenido');" class="botonLateral">Ver inmuebles</a></p>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verBorradores2.php','contenido');" class="botonLateral">Ver borradores</a></p>
              <p>&nbsp;</p>
              <h2>Todos los inmuebles</h2>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verTodosInmueble.php?at=<?php echo time(); ?>','contenido');" class="botonLateral">Ver inmuebles</a></p>
            </div></td>
            <td valign="top">
            <div id="guardar"></div>
            <div id="contenido">
              <h2>Administración de inmuebles</h2>
              <div style="background:#F7F7F7" align="center"><img src="img/logoadcontrolInicio.jpg" alt="" width="464" height="454" vspace="20" /></div>
            </div></td>
          </tr>
        </table>
        <?php
    break;
    case 'Asesores':
		?>
		<h1>Asesores</h1>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="250" valign="top" bgcolor="#F7F7F7"><div id="menuLateral">
              <h2>Asesores</h2>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaAsesor.php','contenido');" class="botonLateral">Dar de alta asesor</a></p>
              <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verAsesor.php','contenido');" class="botonLateral">Ver asesores</a></p>
            </div></td>
            <td valign="top">
            <div id="guardar"></div>
            <div id="contenido">
              <h2>Administración de inmuebles</h2>
              <div style="background:#F7F7F7" align="center"><img src="img/logoadcontrolInicio.jpg" alt="" width="464" height="454" vspace="20" /></div>
            </div></td>
          </tr>
        </table>
        <?php
    break;
    case 'Usuarios':
		?>
<h1>Administración de Asociados</h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="200" valign="top" bgcolor="#F7F7F7"><div id="menulateral">
          <h2>Herramientas</h2>
          <p><a href="javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php','contenido');" class="botonLateral">Alta de asociado</a></p>
          <p><a href="javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php','contenido');" class="botonLateral">Ver asociados</a></p>
      </div></td>
      <td valign="top">        <div id="guardar"></div><div id="contenido">
        <div style="background:#F7F7F7" align="center"><img src="img/logoadcontrolInicio.jpg" alt="" width="464" height="454" vspace="20" /></div>
        <p>&nbsp;</p>
      </div></td>
    </tr>
  </table>
  <?php
    break;
    case 'Web':
		?>
<h1>Portal Web</h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="102" valign="top" bgcolor="#F7F7F7">&nbsp;</td>
      <td width="731" valign="top">
      <div id="contenido">
        <h3>Portada</h3>
		<iframe src="/publico/subirPortada.php" frameborder="0" marginheight="0" marginwidth="" scrolling="auto" width="100%" height="1000px" ></iframe>
      </div></td>
    </tr>
  </table>
  <?php
    break;
    case 'AdminNoticias':
		?>
		<h1>Administración de noticias</h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td width="200" valign="top" bgcolor="#F7F7F7"><div id="herramientas">
                <h2>Herramientas</h2>
                <p><a href="javascript:AS3Wxmlhttp('ctn/noticia/altaNoticia.php','contenido');" class="botonLateral">Dar de alta noticia</a></p>
                <p><a href="javascript:AS3Wxmlhttp('ctn/noticia/verNoticia.php','contenido');" class="botonLateral">Ver noticias</a></p>
            </div></td>
            <td valign="top"><div id="contenido">
<?php
if($_POST["titulo"]!="")
{
?>
	<h2>Noticia dada de alta con &eacute;xito</h2>
<?php
	if($_FILES[fotoURL][name]!="")
	{
		$res=subirImagen($_FILES[fotoURL],$_GET["id"]);
		echo "La imagen ";
		switch($res)
		{
		case 1:
		  echo " no se guardo correctamente<br />";
		  $res="";
		break;
		case 2:
		  echo " no se guardo, ya que es superior a los 2Mb<br />";
		  $res="";
		break;
		case 3:
		  echo " no se guardo, ya que no es una imagen valida (jpg, gif, png)<br />";
		  $res="";
		break;
		default:
		  echo " se guardo con &eacute;xito<br />";
		  //guardar registro en la base de datos
	
		}
	}
	$sql= "INSERT INTO Noticia VALUES('','".$_POST["titulo"]."','".$_POST["noticia"]."',NOW(),'".$res."')";
	mysqli_query($db, $sql);
	
	
	
		$asunto=$_POST["titulo"];
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	//$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: MasPropiedades <maspropiedades@asx.mx>' . "\r\n";
	
		$sql="SELECT * FROM  `Usuario` WHERE nombres!='' AND estado=0";
		$rs= mysqli_query ($db,$sql);
		while($fl=mysqli_fetch_array($rs))
		{
		mail($fl["email"], $asunto, $_POST["noticia"], $cabeceras);
		}
		mail("sg.alfonso@gmail.com", $asunto, $_POST["noticia"], $cabeceras);
}
?>
              <div style="background:#F7F7F7" align="center"><img src="img/logoadcontrolInicio.jpg" alt="" width="464" height="454" vspace="20" /></div>
            </div></td>
    </tr>
        </table>
<?php
    break;
    case 'Solicitudes':
		?>
		<h1>Solicitudes</h1>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td width="250" valign="top" bgcolor="#F7F7F7"><div id="herramientas">
              <h2>&nbsp;</h2>
                <p><a href="javascript:AS3Wxmlhttp('ctn/solicitud/altaSolicitud.php','contenido');" class="botonLateral">Dar de alta solicitud</a></p>
                <p><a href="javascript:AS3Wxmlhttp('ctn/solicitud/verMisSolicitud.php','contenido');" class="botonLateral">Ver mis solicitudes</a></p>
                <p><a href="javascript:AS3Wxmlhttp('ctn/solicitud/verSolicitud.php','contenido');" class="botonLateral">Ver solicitudes</a></p>
            </div></td>
            <td valign="top"><div id="contenido">
<?php
if($_POST["tipoInmueble"]!="")
{
?>
<h2>Solicitud dada de alta con &eacute;xito</h2>
<?php
$sql= "INSERT INTO Solicitud VALUES('','".$ASid."','".$_POST["tipoInmueble"]."','".$_POST["operacionInmueble"]."','".$_POST["valInicial"]."','".$_POST["valFinal"]."','".$_POST["descripcion"]."',NOW())";
mysqli_query ($db,$sql);



$tipoInmueble['1']='Bodega';
$tipoInmueble['2']='Casa';
$tipoInmueble['3']='Cuarto';
$tipoInmueble['4']='Departamento';
$tipoInmueble['5']='Edificio';
$tipoInmueble['6']='Local';
$tipoInmueble['7']='Oficina';
$tipoInmueble['8']='Terreno';
$tipoInmueble['9']='Rancho y granja';


$operacionInmueble['1']='Venta';	  
$operacionInmueble['2']='Renta';	  
	  



$texto=$nombrePerfil.' SOLICITA: <br>

Tipo del inmueble: '.$tipoInmueble[$_POST["tipoInmueble"]].'<br />
Operación del inmueble: '.$operacionInmueble[$_POST["operacionInmueble"]].'<br />
Valor entre: '.number_format($_POST["valInicial"]).' y '.number_format($_POST["valFinal"]).'pesos<br />
Descripci&oacute;n:<br />
'.$_POST["descripcion"].' 
<br />
<br /> Consulta más solicitudes en nuestro portal web: http://www.maspropiedades.com.mx/acontrol
'.$pieCorreo;

$asunto="Nueva solicitud";
// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
//$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: MasPropiedades <info@maspropiedades.com.mx>' . "\r\n";

	$sql="SELECT * FROM  `Usuario` WHERE nombres!='' AND estado=0";
	$rs= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
		mail($fl["email"], $asunto, $texto, $cabeceras);
	}
	mail("sg.alfonso@gmail.com", $asunto, $texto, $cabeceras);
}
?>
              <div style="background:#F7F7F7" align="center"></div>
            </div></td>
    </tr>
        </table>
<?php
    break;
    case 'config':
		?>
		<h1>Configuración</h1>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td width="57" valign="top" bgcolor="#F7F7F7"><div id="herramientas">
              <h2>&nbsp;</h2>
                <p>&nbsp;</p>
                </div></td>
            <td valign="top"><div id="guardar"></div>
                <div id="contenido">
                  <div style="background:#F7F7F7" align="center"><img src="img/logoadcontrolInicio.jpg" alt="" width="464" height="454" vspace="20" /></div>
                  <p>&nbsp;</p>
                </div></td>
</tr>
        </table>
<?php
    break;
    case 'Noticias':
	default:
		?>
		<h1>Noticias</h1>

    <div id="contenido" style="margin:0px;">

<?php
	$sql="SELECT * FROM  `Noticia` ORDER BY fechaHora DESC LIMIT 0,10";
	$rs= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>

<img src="/publico/<?php 
	echo $fl["fotoURL"]; ?>" height="200px" hspace="5" vspace="5" <?php if($fl["id"]%2==0) { ?> align="right"<?php } else { echo ' align="left"'; } ?> />    <h2 style="padding:0px; margin:0px;"><?php echo $fl["titulo"]; ?></h2>
    <p><?php if($fl["fotoURL"]) { ?>
      <?php } ?><?php echo substr(nl2br($fl["noticia"]), 0, 600 ); ?>... <a href="javascript:AS3Wxmlhttp('ctn/noticia/verUnaNoticia.php?id=<?php echo $fl["id"]; ?>','contenido');">Lee más</a></p>
    <?php echo nl2br($fl["fechaHora"]); ?>
    <hr />

<?php
	}
?>    
</div>        
        <?php
    break;
    }
    ?>
</div>
<div align="center"><br />
  <br />
Software para control de inmuebles<br />
<img src="../img/acceso_acontrol.png" width="185" height="46" /><br />
</div>
<?php
}
?>
</body>
</html>

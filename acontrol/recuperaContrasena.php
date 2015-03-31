<?php 
include("../lib/cfg.php"); 
$fotoPerfil=campoUsuario($ASclave,foto,$db);
$nombrePerfil=nombre($ASclave,$db);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<body>


<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fondoBarraHerramientas.jpg">
  <tr>
    <td width="81">&nbsp;</td>
    <td> </td>
    <td>&nbsp;</td>
    <td width="96"><img src="img/logoAdControl.jpg" alt="ad control" width="96" height="54" /></td>
  </tr>
</table>
<p>&nbsp;</p>
<div id="cuerpo">
<?php
if($_POST[emailRecuperar]!="")
{
	$sql="SELECT * FROM  `Usuario` WHERE email='".$_POST[emailRecuperar]."' LIMIT 0,1";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
		$txt='Estimado usuario del sistema aControl
Tu contraseña para entrar al panel de control es: '.$fl["contrasena"].'

Tu usuario es el correo electrónico

Si no pediste recuperar tu contraseña notifica al administrador.';
		mail($_POST[emailRecuperar],'Contraseña del sistema',$txt);
		
	}


	?>
	<h1>Tu contraseña está en camino</h1>
	<p align="center">La contraseña fue enviada a tu correo electrónico</p>
	<?php
}
else
{
?>

<h1>Recupera tu contraseña</h1>
<div align="center">
  <form id="form1" name="form1" method="post" action="">
    <p>&nbsp;</p>
    <p>Correo electrónico:
      <input type="text" name="emailRecuperar" id="emailRecuperar" />
        <input type="submit" name="button" id="button" value="Enviar" />
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;  </p>
  </form>
  </div>
</div>

<?php
}
?>
</body>
</html>

<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql='UPDATE Usuario  SET estado= '.$_GET["estado"].' WHERE id='.$_GET["id"];
	$rs= mysql_query ($sql,$db);
	$sql='UPDATE Inmueble  SET estadoInmobiliaria= '.$_GET["estado"].' WHERE id_Usuario='.$_GET["id"];
	$rs= mysql_query ($sql,$db);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>aControl - Bienes raices</title>
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="?as=1"><img name="logocabecera" src="/img/logocabecera.png" width="185" height="84" border="0" id="logocabecera" alt="" /></a>
<?php
	$sql="SELECT * FROM  `Usuario` WHERE id=".$_GET[id];
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th width="200" scope="row"><img width="200px" src="/publico/Usuario<?php echo $fl["id"]; ?>.jpg" /></th>
    <td><p><strong>Asociado: <?php echo $fl["apellidos"]; ?></strong><br />
      Usuario de acceso:   <?php echo $fl["email"]; ?><br />
      Contraseña:    <?php echo $fl["contrasena"]; ?><br />
      Nextel: <?php echo $fl["campo3"]; ?><br />
      id Nextel: <?php echo $fl["nextel"]; ?><br />
      Celular: <?php echo $fl["campo2"]; ?></p>
      <table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Inmobiliaria:</td>
    <td><?php echo $fl["nombres"]; ?></td>
  </tr>
  <tr>
    <td>Dirección:</td>
    <td><?php echo $fl["direccion"]; ?></td>
  </tr>
  <tr>
    <td>Tel. Oficina:</td>
    <td><?php echo $fl["telefono"]; ?></td>
  </tr>
  <tr>
    <td>Sitio Web:</td>
    <td><?php echo $fl["campo4"]; ?></td>
  </tr>
</table>
</td>
  </tr>
</table><div style="background:#DBE5F1"><p><?php echo $campo5; ?></p>
</div><br />
  
  
  <?php
	}
?>
  
  
  
  <?php
}
?>
  </p>
<p align="center"><a href="/acontrol"><img src="/img/acceso_acontrol.png" alt="A control - Panel de control" width="185" height="46" border="0" /></a></p>
</body></html>
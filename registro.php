<?php

include("lib/cfg.php"); 

$sql="INSERT INTO `Usuario` VALUES(NULL, '$_POST[nombres]', '$_POST[apellidos]', '', $_POST[genero], '', '', '', '', '$_POST[email]', '', '', '', '$_POST[contrasena]','','','', '".date("Y-m-d")."', '".date("Y-m-d")."', '1', '-1', 'Tere Te Amo');";
mysql_query ($sql,$db);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body style="margin:0px; background:#E2ECF8; font-family:Verdana, Arial, Helvetica, sans-serif;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th background="img/fondoLogo.jpg" scope="col"><img src="img/logo.jpg" alt="logo" width="312" height="98" /></th>
  </tr>
  <tr>
    <td>      <p>&nbsp;</p>
      <blockquote>
        <p>Estimad@ <?php echo $_POST[nombres]; ?></p>
        <p>Felicidades, tu regsitro fue efectuado con éxito, ahora puedes iniciar sesión por primera vez.</p>
        <form id="form1" name="form1" method="post" action="index.php">

          <input type="hidden" name="email" id="email" value="<?php echo $_POST[email]; ?>" />
          <input type="hidden" name="contrasena" id="contrasena" value="<?php echo $_POST[contrasena]; ?>"/>
            <input type="submit" name="Entrar" id="Entrar" value="Iniciar sesión" />
        </form>
        <p>&nbsp;</p>
    </blockquote></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<div></div>
</body>
</html>

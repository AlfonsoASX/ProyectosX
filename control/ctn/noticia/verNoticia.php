<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql="DELETE FROM Noticia WHERE id=".$_GET["id"];
	$rs= mysqli_query($db,$sql);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Herramientas</th>
    <th scope="col">Titulo</th>
  </tr>
<?php
	$sql="SELECT * FROM  `Noticia` ORDER BY fechaHora DESC LIMIT 0,10";
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>
  <tr>
    <td><a href="javascript:AS3Wxmlhttp('ctn/noticia/verNoticia.php?id=<?php echo $fl["id"]; ?>','contenido');">Borrar</a></td>
    <td><?php echo $fl["titulo"]; ?></td>
  </tr>
<?php
	}
?>    
</table>
</body>
</html>
<?php
	}
?>
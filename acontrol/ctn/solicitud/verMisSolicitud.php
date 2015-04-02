<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql="DELETE FROM Solicitud WHERE id=".$_GET["id"];
	$rs= mysql_query ($sql,$db);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<h2>Mis solicitudes</h2>
<table class="tabla1" width="100%" border="0" cellspacing="2" cellpadding="5">
  <tr>
    <th width="16" scope="col">&nbsp;</th>
    <th scope="col">Tipo de inmueble</th>
    <th scope="col">Rango de precio</th>
    <th scope="col">Descripción</th>
  </tr>
<?php
	$sql="SELECT * FROM  `Solicitud` WHERE id_Usuario = ".$ASid." ORDER BY fechaHora DESC LIMIT 0,10";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>





  <tr>
    <td><a href="javascript:AS3Wxmlhttp('ctn/solicitud/verSolicitud.php?id=<?php echo $fl["id"]; ?>','contenido');"><img src="/acontrol/img/borrar.png" alt="Borrar" width="14" height="15" border="0" /></a></td>
    <td><?php
		switch($fl["tipoInmueble"])
		{
			case 1:
			echo "bodegas";
			break;
			case 2:
			echo "casas";
			break;
			case 3:
			echo "cuartos";
			break;
			case 4:
			echo "departamentos";
			break;
			case 5:
			echo "edificios";
			break;
			case 6:
			echo "locales";
			break;
			case 7:
			echo "oficinas";
			break;
			case 8:
			echo "terrenos";
			break;
			case 9:
			echo "ranchos y granjas";
			break;
			default:
			echo "cualquier tipo de inmueble";
		}
 ?> en <?php 
 
		switch($fl[operacionInmueble])
		{
			case 1:
			echo "venta";
			break; 
			case 2:
			echo "renta";
			break; 
			case 3:
			echo "traspaso";
			break; 
		}

 
 
 ?></td>
    <td>De <?php echo number_format($fl["valInicial"]); ?> a <?php echo number_format($fl["valFinal"]); ?></td>
    <td><?php echo $fl["descripcion"]; ?></td>
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
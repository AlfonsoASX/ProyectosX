<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql="DELETE FROM Solicitud WHERE id=".$_GET["id"];
	$rs= mysqli_query($db,$sql);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<h2>Solicitudes generales</h2>
<table width="100%" border="0" cellpadding="5" cellspacing="2" class="tabla1">
  <tr>
    <th scope="col">Inmueble</th>
    <th scope="col">Rango de precio</th>
    <th scope="col">Descripción</th>
    <th scope="col">Solicitado por:</th>
  </tr>
  <?php
	$sql="SELECT * FROM  `Solicitud` WHERE id_Usuario ORDER BY fechaHora DESC LIMIT 0,20";
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>
  <tr>
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
 ?>
      en
      <?php 
 
		switch($fl['operacionInmueble'])
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

 
 
 ?>
      <br /></td>
    <td>De <?php echo number_format($fl["valInicial"]); ?> a <?php echo number_format($fl["valFinal"]); ?></td>
    <td><?php echo $fl["descripcion"]; ?></td>
    <td><?php 

    $sql2="SELECT * FROM  `Usuario` WHERE id=".$fl["id_Usuario"];
    $rs2= mysqli_query($db,$sql2);
    while($fl2=mysqli_fetch_array($rs2))
    {
        foreach($fl2 as $nombre_campo => $valor)
        {
            $asignacion = $nombre_campo;
            $$asignacion= $valor;
        }
    }
echo $nombres.'<br>'.$email;
?></td>
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
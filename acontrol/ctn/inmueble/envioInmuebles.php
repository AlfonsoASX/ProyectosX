<?php include("../../../lib/cfg.php"); 

$contRegistros=-1;

foreach($_GET as $nombre_campo => $valor){ 
	$contRegistros++;
	if($_GET["status"]!=""&&$nombre_campo!="status"&&$nombre_campo!="ayt")
	{
		$sql="UPDATE  `Inmueble` SET  `status` =  '".$_GET["status"]."' WHERE  `Inmueble`.`id` =".$nombre_campo;
		$rs= mysqli_query($db,$sql);
	}
}

?>
<div id="herramientas" style="height:40px;"><?php 
if($contRegistros>=1&&$_GET["status"]=="") 
{ 
	include("verInmuebleHerramientas.php"); 
}

$texto='<h2>Inmuebles a disposición de Más Propiedades capturados el día de ayer</h2>';

$texto.='<table class="tabla1" width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <th></th>
    <th>Foto</th>
    <th>Tipo y Operaci&oacute;n</th>
    <th>Colonia</th>
    <th>Descripci&oacute;n</th>
  </tr>';

?></div>
<?php 
	$ayer= date('Y-m-d 00:00:00',time()-(24*60*60));
	$sql="SELECT * FROM `Inmueble` WHERE estadoInmobiliaria=0 AND status=1 AND fechacreado >= '".$ayer."'";
//	$sql="SELECT * FROM `Inmueble` WHERE estadoInmobiliaria=0 AND status=1";

	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
$texto.='  <tr>
    <td><a href="http://maspropiedades.com.mx/?as=8&id='.$fl["id"].'" >Ver detalles</a></td>

    <td width="100"><img src="http://maspropiedades.com.mx/publico/'.$fl["fotoURL"].'" height="60"  /></td>
    <td><div align="center">';

		switch($fl[tipoInmueble])
		{
			case 1:
			$texto.= "bodegas";
			break;
			case 2:
			$texto.= "casas";
			break;
			case 3:
			$texto.= "cuartos";
			break;
			case 4:
			$texto.= "departamentos";
			break;
			case 5:
			$texto.= "edificios";
			break;
			case 6:
			$texto.= "locales";
			break;
			case 7:
			$texto.= "oficinas";
			break;
			case 8:
			$texto.= "terrenos";
			break;
			case 9:
			$texto.= "ranchos y granjas";
			break;
			default:
			$texto.= "cualquier tipo de inmueble";
		}
		if($fl[operacionInmueble]!="")
		{
			
			switch($fl[operacionInmueble])
			{
				case 1:
				$texto.= " en venta";
				break; 
				case 2:
				$texto.= " en renta";
				break; 
				case 3:
				$texto.= " en traspaso";
				break; 
			}
		}

$texto.='   </b></div></td>
    <td>'.strtoupper($fl["titulo"]).'</td>
    <td width="250">'.$fl["descripcion"].'</td>
  </tr>';

	}
$texto.='</table>';

echo $texto;

$asunto="Lista de nuevas propiedades a la fecha: ".$ayer;
// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
//$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: MasPropiedades <info@maspropiedades.com.mx>' . "\r\n";

	$sql="SELECT * FROM  `Usuario` WHERE nombres!='' AND estado=0";
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
		mail($fl["email"], $asunto, $texto, $cabeceras);
	}

	mail("sg.alfonso@gmail.com", $asunto, $texto, $cabeceras);
	mail("sergio@libertybienesraices.com", $asunto, $texto, $cabeceras);
?>
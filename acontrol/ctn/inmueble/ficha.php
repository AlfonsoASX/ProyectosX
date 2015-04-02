<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.maspropiedades.com.mx</title>
</head>
<body>

<link href="/estilos.css" rel="stylesheet" type="text/css">



 <?php



$sql2="SELECT * FROM  `Inmueble` WHERE estadoInmobiliaria=0 AND id=".$_GET["id"];
$rs2= mysqli_query ($db,$sql2);
while($fl2=mysqli_fetch_array($rs2))
{
	foreach($fl2 as $nombre_campo => $valor)
	{
		$asignacion = $nombre_campo;
		$$asignacion=$valor;
	}
}
	$sql2="SELECT * FROM  `Usuario` WHERE id=".$ASid;
	$rs2= mysqli_query ($db,$sql2);
	while($fl2=mysqli_fetch_array($rs2))
	{
	
$datosInmo='	
<strong>Datos de contacto:</strong><br />

<img width="200px" src="http://maspropiedades.com.mx/publico/Usuario'.$ASid.'.jpg" />	
'.$fl2["apellidos"].'<br />
 Nextel: '.$fl2["campo3"].'<br />
 id Nextel: '.$fl2["nextel"].'<br />
<br />

 Inmobiliaria:
    '.$fl2["nombres"].'<p>Dirección:<br />
'.$fl2["direccion"].'<br />
Tel. Oficina:
'.$fl2["telefono"].'</p>';
	}
?>



<?php
    $sqlInmo="SELECT * FROM  `Usuario` WHERE id=".$id_Usuario;
    $rsInmo= mysqli_query ($sqlInmo,$db);
    while($flInmo=mysqli_fetch_array($rsInmo))
    {
        foreach($flInmo as $nombre_campo => $valor)
        {
            $asignacion = "INMO_".$nombre_campo;
            $$asignacion=$valor;
        }
    }
    ?>
    </div>
    </tr>
</table>
<div align="right">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><h2 class="h2Directorio">
           <?php 
		switch($tipoInmueble)
		{
			case 1:
			echo "Bodegas";
			break;
			case 2:
			echo "Casas";
			break;
			case 3:
			echo "Cuartos";
			break;
			case 4:
			echo "Departamentos";
			break;
			case 5:
			echo "Edificios";
			break;
			case 6:
			echo "Locales";
			break;
			case 7:
			echo "Oficinas";
			break;
			case 8:
			echo "Terrenos";
			break;
			case 9:
			echo "Ranchos y granjas";
			break;
		}
		if($operacionInmueble!="")
		{
			?>
        en
        <?php 
			switch($operacionInmueble)
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
		}
		?>
      </h2></td>
      <td><div align="right"><a href="javascript:window.print()" class="menuformato Estilo2"><img src="/img/imprimir.png" alt="Imprimir ficha técnica del inmueble" width="13" height="13" border="0" />Imprimir</a></div></td>
    </tr>
  </table>
  </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="350" rowspan="2" valign="top"><div id="fotos"><img src="/publico/<?php 

		echo "?a=".substr($fotoURL,0,-4)."&s=".substr($fotoURL,(strlen($fotoURL)-3),3);
		?>" /></div>    </td>
    
    <td><h1><?php 
		echo strtoupper ($titulo);
		?></h1>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><div id="descripcion"><?php echo $descripcion; ?>
          <div id="precio"><strong>$ <?php echo number_format($precio); ?></strong><br />
          </div>
          </div>
          <br />
          <div align="center">
    <?php if($antiguedad!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"> <div align="right">Antiguedad</div></td>
          <td bgcolor="#F9F9F9"><?php echo $antiguedad ?> a&ntilde;os</td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($terreno!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Terreno</div></td>
          <td bgcolor="#F9F9F9"><?php echo $terreno; ?> m<sup class="Estilo1">2</sup></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($construccion!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Construcci&oacute;n</div></td>
          <td bgcolor="#F9F9F9"><?php echo $construccion; ?> m<sup class="Estilo1">2</sup></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($numeroDeRecamaras!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Recamaras</div></td>
          <td bgcolor="#F9F9F9"><?php echo $numeroDeRecamaras; ?></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($numeroDeBanos!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Ba&ntilde;os</div></td>
          <td bgcolor="#F9F9F9"><?php echo $numeroDeBanos; ?></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($numeroDeNiveles!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Niveles</div></td>
          <td bgcolor="#F9F9F9"><?php echo $numeroDeNiveles; ?></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($areaDeJardin!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">&Aacute;rea de jard&iacute;n</div></td>
          <td bgcolor="#F9F9F9"><?php echo $areaDeJardin; ?> m<sup class="Estilo1">2</sup></td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($cocheraSinTecho!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Cochera sin techar</div></td>
          <td bgcolor="#F9F9F9"><?php echo $cocheraSinTecho; ?> autos</td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <?php if($cocheraTechada!="") { ?>
    <div class="bloque2">
      <table width="230" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="135" bgcolor="#F0F0F0"><div align="right">Cochera techada</div></td>
          <td bgcolor="#F9F9F9"><?php echo $cocheraTechada; ?> autos</td>
        </tr>
      </table>
    </div>
    <?php } ?>
    </div>          </td>
        </tr>
    </table>    </td>
    <td>
   

<?php echo $datosInmo; ?>


    </td>
  </tr>
</table>
<div id="detallesFicha">
<h2> Detalles del inmueble </h2>
<?php echo $detalles; ?></div>
<?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
while (false !== ($archivo = readdir($directorio))) {

	$validador=explode("___",$archivo);
	if($validador[0]==$_GET["id"]&&$archivo!=$fotoURL)
	{
	?><a href="#<?php echo substr($archivo,0,-4); ?>"><img class="galeriaFotos" src="/publico/?a=<?php echo substr($archivo,0,-4); ?>&s=<?php echo substr($archivo,(strlen($archivo)-3),3); ?>&ancho=200" /></a> <?php
	}
}
closedir($directorio); 

}
?>
</body>
</html>
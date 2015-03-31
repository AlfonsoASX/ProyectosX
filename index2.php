<?php 

if(!isset($_COOKIE["ASX_key"]))
{
	setcookie("ASX_key", rand(10,99)."a".rand(1,9)."y".rand(1,9)."t".time());
}


include("lib/cfg.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mas propiedades</title>
<link rel="stylesheet" type="text/css" href="web/carrusel/inicio.css" />

<script type="text/javascript" src="js/AjaxAS3W.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="web/carrusel/script.js"></script>

<link href="normalize.css" rel="stylesheet" type="text/css"/>
<link href="estilos.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
<!--
.Estilo1 {font-size: 10px}
.Estilo2 {font-size: 14px}
.Estilo3 {	font-size: 12px;
	color: #BD2A1A;
}
-->
</style>
</head>
<body onload="<?php if($_GET["as"]==3){ ?>javascript:AS3Wxmlhttp('ctn/seleccionados.php','seleccion');<?php } ?>"><div id="sitio">
<table width="1000" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<?php if($_GET["as"]!=8) { ?>  <tr>
    <td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fodoTop.jpg" bgcolor="#C2291B">
  <tr>
    <td width="185"><a href="?as=1"><img name="logocabecera" src="img/logocabecera.png" width="185" height="84" border="0" id="logocabecera" alt="" /></a></td>
    <td>
        <p><a class="menuformato" href="?as=1">INICIO</a>
            <a class="menuformato" href="?as=2">QUIENES SOMOS</a>
            <a class="menuformato" href="?as=3">INMUEBLES</a>
          <a class="menuformato" href="?as=4">DIRECTORIO</a></p>
        </td>
    <td width="160">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a></div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=sgalfonso"></script>
<!-- AddThis Button END -->    </td>
  </tr>
</table></td>
  </tr>
 <tr>
    <td height="35" background="img/fodoBuscador.jpg" bgcolor="#EAEAEA"><form id="form1" name="form1" method="get" action="">
      
        <div align="right">
          <input name="buscar" type="text" id="buscar" size="50" value="<?php 
if($_POST["precioMayor"]!=""||$_POST["precioMenor"]!="") $_GET["buscar"]='Precio:{'.$_POST["precioMayor"].'-'.$_POST["precioMenor"].'}:'.$_GET["buscar"];
		  
		  
		  
		  echo $_GET["buscar"]; ?>" />
          <input name="as" type="hidden" value="3"  />
          <input name="operacionInmueble" type="hidden" value="<?php echo $_GET["operacionInmueble"]; ?>"  />
          <input name="tipoInmueble" type="hidden" value="<?php echo $_GET["tipoInmueble"]; ?>"  />
          <input type="submit" name="button" id="button" value="Buscar" />
          <a href="javascript:AS3Wxmlhttp('ctn/busquedaA.php','buscador');" class="Estilo1">Busqueda avanzada</a></div>
    </form>    <div id="buscador"></div></td>
  </tr>
  <tr><?php } ?>
<td>
<?php
switch($_GET["as"])
{
	case 2:
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="210" valign="top"><a href="?as=3&amp;operacionInmueble=1&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/compra2.jpg" width="210" height="37" border="0"/></a> <a href="?as=3&amp;operacionInmueble=2&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/renta2.jpg" width="210" height="37" vspace="1" border="0"/></a> <a href="?as=4&amp;serv=1"><img src="img/traspaso2.jpg" width="210" height="37" border="0"/></a>
<or esoh2></h2></td>
        <td valign="top"><h1>¿Quienes somos?</h1></td>
      </tr>
    </table>
	<?php
	break;
	case 3:



//Algoritmo de búsqueda

$buscarURL=$_GET["buscar"];


$sql="SELECT * FROM  `Inmueble` WHERE status = 1 AND estadoInmobiliaria=0 AND fotoURL!='' ";

// Rango de precios




if($_GET[operacionInmueble]!="")
{
	$sql.=" AND operacionInmueble=".$_GET[operacionInmueble];
}
if($_GET[tipoInmueble]!="")
{
	$sql.=" AND tipoInmueble=".$_GET[tipoInmueble];
}

$buscar=$buscarURL;

//Comandos que agregan detalles al buscador






//ORDENADO
$buscar=str_replace('ordenar:precio,a','',$buscar);
if($buscar!=$buscarURL)
{
	$ordenar= ' ORDER BY precio ASC';
	$buscarURL=$buscar;
}

$buscar=str_replace('ordenar:precio,d','',$buscar);
if($buscar!=$buscarURL)
{
	$ordenar= ' ORDER BY precio DESC';
	$buscarURL=$buscar;
}

$buscar=str_replace('ordenar:titulo,a','',$buscar);
if($buscar!=$buscarURL)
{
	$ordenar= ' ORDER BY titulo ASC';
	$buscarURL=$buscar;
}

$buscar=str_replace('ordenar:titulo,d','',$buscar);
if($buscar!=$buscarURL)
{
	$ordenar= ' ORDER BY titulo DESC';
	$buscarURL=$buscar;
}


//RANGO
$buscar=str_replace('Precio:{','',$buscar);
if($buscar!=$buscarURL)
{
$buscarOriginal='Precio:{'.ltrim($buscar);
	$campoBusqueda=explode("}:",$buscar);
	$valores=explode("-",$campoBusqueda[0]);
	if($valores[0]>0)
		$sql.=' AND precio <'.$valores[0];
	if($valores[1]>0)
		$sql.=' AND precio >'.$valores[1];
	$buscar=$campoBusqueda[1];
	$buscarURL=$buscar;
}



$buscar=ltrim($buscar);



if($buscar!="")
{
	$sql.=" AND (
	titulo LIKE '%".$buscar."%' OR 
	descripcion LIKE '%".$buscar."%'
	)";
}
$sql.=$ordenar;

$buscar=str_replace('marcados()','',$buscar);
$marca=0;
if($buscar!=$buscarURL)
{
$marca=1;
$sql="SELECT Marcado.*, Inmueble.* FROM Marcado, Inmueble WHERE Inmueble.id=Marcado.id_Inmueble AND Marcado.ASX_key='".$_COOKIE[ASX_key]."' ORDER BY Marcado.id DESC";

	$buscarURL=$buscar;
}

$buscarCuadro=$buscar;
$buscar=$buscarOriginal;

//Fin de algoritmo de búsqueda
?>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="210" valign="top">
        <a href="?as=3&operacionInmueble=1&tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/compra2.jpg" width="210" height="37" border="0"/></a>
        <a href="?as=3&operacionInmueble=2&tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/renta2.jpg" width="210" height="37" vspace="1" border="0"/></a>
<?php  
$sqlCont="SELECT * FROM  `Inmueble` WHERE status = 1 AND estadoInmobiliaria=0 AND fotoURL!='' ";

if($_GET[operacionInmueble]!="")
{
	$sqlCont.=" AND operacionInmueble=".$_GET[operacionInmueble];
}

$rsCont= mysql_query ($sqlCont,$db);
while($flCont=mysql_fetch_array($rsCont))
{
	$contInmuebles[$flCont["tipoInmueble"]]+=1;
}

?>

<table class="tablaBusqueda" width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="<?php
switch($_GET[operacionInmueble])
{
	case 1: 
	echo "#CFDFF5";
	break;
	case 2: 
	echo "#DAF7CE";
	break;
	case 3: 
	echo "#FBDAC6";
	break;
	default:
	echo "#F9F9F9";
}
 ?>">
<?php if($contInmuebles[2]!="") { ?><tr <?php if($_GET["tipoInmueble"]==2) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=2&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/casa.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=2&amp;buscar=<?php echo $_GET["buscar"]; ?>">Casas</a>(<?php echo $contInmuebles[2]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[4]!="") { ?><tr <?php if($_GET["tipoInmueble"]==4) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=4&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/departamento.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=4&amp;buscar=<?php echo $_GET["buscar"]; ?>">Departamentos</a>(<?php echo $contInmuebles[4]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[3]!="") { ?><?php
    if($_GET[operacionInmueble]==2) {
        ?><tr <?php if($_GET["tipoInmueble"]==3) echo 'bgcolor="#Fc0"'; ?>>
        <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php 
        echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=3&amp;buscar=<?php 
        echo $_GET["buscar"]; ?>"><img src="img/cuartos.png" alt="" border="0" /></a></td>
        <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php 
        echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=3&amp;buscar=<?php 
        echo $_GET["buscar"]; ?>">Cuartos</a>(<?php echo $contInmuebles[3]; ?>)</div></td>
        </tr>
        <?php
    }
    ?><?php } ?>
<?php if($contInmuebles[6]!="") { ?><tr <?php if($_GET["tipoInmueble"]==6) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=6&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/local.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=6&amp;buscar=<?php echo $_GET["buscar"]; ?>">Locales</a>(<?php echo $contInmuebles[6]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[7]!="") { ?><tr <?php if($_GET["tipoInmueble"]==7) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=7&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/oficina.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=7&amp;buscar=<?php echo $_GET["buscar"]; ?>">Oficinas</a>(<?php echo $contInmuebles[7]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[1]!="") { ?><tr <?php if($_GET["tipoInmueble"]==1) echo 'bgcolor="#fc0"'; ?>>
    <td width="50" bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=1&buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/bodega.png" width="48" height="48" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=1&amp;buscar=<?php echo $_GET["buscar"]; ?>">Bodegas</a>(<?php echo $contInmuebles[1]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[8]!="") { ?><tr <?php if($_GET["tipoInmueble"]==8) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=8&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/terreno.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=8&amp;buscar=<?php echo $_GET["buscar"]; ?>">Terrenos</a> (<?php echo $contInmuebles[8]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[5]!="") { ?><tr <?php if($_GET["tipoInmueble"]==5) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=5&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/edificio.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=5&amp;buscar=<?php echo $_GET["buscar"]; ?>">Edificios</a> (<?php echo $contInmuebles[5]; ?>)</div></td>
    </tr><?php } ?>
<?php if($contInmuebles[9]!="") { ?><tr <?php if($_GET["tipoInmueble"]==9) echo 'bgcolor="#Fc0"'; ?>>
    <td bgcolor="#000000"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=9&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/terreno.png" alt="" border="0" /></a></td>
    <td><div align="center"><a href="?as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=9&amp;buscar=<?php echo $_GET["buscar"]; ?>">Ranchos y granjas (<?php echo $contInmuebles[9]; ?>)</a></div></td>
    </tr><?php } ?>
</table>
</td>
        <td valign="top"><div align="left" style="font-size:16px; margin:5px;"> Buscando <b style="font-size:16px">
          <?php 
		switch($_GET[tipoInmueble])
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
		if($_GET[operacionInmueble]!="")
		{
			?>
          </b> en <b style="font-size:16px">
            <?php 
			switch($_GET[operacionInmueble])
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
            </b>
          <?php
		if($buscarCuadro!="")
		{
			?> 
          que contengan "<b style="font-size:16px">
            <?php 
            echo $buscarCuadror; 
            ?>
            </b>"
          <?php
		}
		?>
        </div>
        <div align="right">
          <?php if($marca==0) { ?><table border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td><div id="seleccion"></div></td>
              <td>Ordenar por:</td>
              <td>
<span class="filtro1"><?php if($_GET["filtro"]=="pd"){ ?><a href="?filtro=pa&as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&buscar=ordenar:precio,d <?php echo $buscar; ?>"><?php } else { ?><a href="?filtro=pd&as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=ordenar:precio,a <?php echo $buscar; ?>"><?php } ?>Precio</a></span>
<span class="filtro1"><?php if($_GET["filtro"]=="cd"){ ?><a href="?as=3&filtro=ca&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=ordenar:titulo,a <?php echo $buscar; ?>" ><?php } else { ?><a href="?filtro=cd&as=3&amp;operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=ordenar:titulo,d <?php echo $buscar; ?>" ><?php } ?>Colonia</a></span>
              </td>
            </tr>
          </table><?php } ?>
          </div>
        <?php
$sqlM="SELECT id_Inmueble FROM Marcado WHERE ASX_key ='".$_COOKIE[ASX_key]."'";
$rsM= mysql_query ($sqlM,$db);
while($flM=mysql_fetch_array($rsM))
{
	$marcados[$flM["id_Inmueble"]]=1;
}
$rs= mysql_query ($sql,$db);
while($fl=mysql_fetch_array($rs))
{
	if(file_exists("publico/".$fl["fotoURL"]))
	{
		?><div class="resultado2">
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="88%" scope="col"><h2><?php echo strtoupper ($fl["titulo"]); ?></h2></td>
            <td width="12%" valign="top" scope="col"><div class="squaredFour">
	<input <?php if($marcados[$fl[id]]==1) echo 'checked="checked"'; ?> style="display:none;" onclick="javascript:AS3Wxmlhttp('ctn/seleccionados.php?id=<?php echo $fl["id"]; ?>&checked='+this.checked,'seleccion');" type="checkbox" value="1" id="id<?php 
	echo $fl["id"]; ?>" name="id<?php 
	echo $fl["id"]; ?>" />
	<label for="id<?php echo $fl["id"]; ?>"></label>
</div></td>
          </tr>
        </table>
		<div style="background:url(publico/<?php 

		echo "?a=".rawurlencode(substr($fl["fotoURL"],0,-4))."&s=".substr($fl["fotoURL"],(strlen($fl["fotoURL"])-3),3)."&ancho=260";
		?>); background-repeat: no-repeat; background-position: center center;" class="img">        </div>
		<p><?php echo $fl["descripcion"]; ?></p>
		<div style="margin:9px;" align="right"> $ <?php echo number_format($fl["precio"]); ?></div>
		<a class="menuformato" style="padding:7px;" href="?as=8&id=<?php echo $fl["id"]; ?>">Ver detalles</a>
		</div>
          <?php
	}
}
?></td>
      </tr>
    </table>
	<?php
	break;
	case 4:
	?>
	<h1>Directorio</h1>
<?php
$titular="";

	$sql="SELECT * FROM  `Usuario` WHERE nombres!='' AND estado=0 ORDER BY campo1 ASC, nombres DESC";
if($_GET["serv"]==1) 
{
	$sql="SELECT * FROM `Usuario` WHERE nombres!='' AND estado=0 AND campo1!=1 ORDER BY campo1 ASC, nombres DESC";
}
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
<?php

if($fl["campo1"]!=$titular)
{
?><h2 class="h2Directorio"><?php	
switch($fl["campo1"])
{
case 1:
	echo "Inmobiliarias";
break;
case 2:
	echo "Abogados";
break;
case 3:
	echo "Notarias";
break;
case 4:
	echo "Agencias publicitarias";
break;
case 5:
	echo "Tramitaci&oacute;n de cr&eacute;ditos";
break;
case 6:
	echo "Servicios financieros";
break;
case 7:
	echo "Valuadores";
break;
	
}



?></h2><?php 
}
$titular=$fl["campo1"];
?>
<a href="?as=6&id=<?php echo $fl["id"]; ?>">
	<div class="resultado2">
    <h2><?php	echo $fl["nombres"]; ?></h2>
    <div class="img" style="background:url(publico/?a=Usuario<?php	echo $fl["id"]; ?>&s=jpg&ancho=300); background-repeat: no-repeat; background-position: center center;"></div>
    <p><?php	echo $fl["apellidos"]; ?><br />
Teléfono: <?php	echo $fl["telefono"]; ?><br />
Nextel: <?php	echo $fl["nextel"]; ?></p>

</div>
</a>
<?php
	}
?>
	<?php
	break;
	case 5:
	?>
	<h1>Noticias</h1>
	<?php
	break;
	case 6:
	?>   
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="210" valign="top"><a href="?as=3&amp;operacionInmueble=1&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/compra2.jpg" width="210" height="37" border="0"/></a> <a href="?as=3&amp;operacionInmueble=2&amp;tipoInmueble=<?php echo $_GET["tipoInmueble"]; ?>&amp;buscar=<?php echo $_GET["buscar"]; ?>"><img src="img/renta2.jpg" width="210" height="37" vspace="1" border="0"/></a> <a href="?as=4&amp;serv=1"><img src="img/traspaso2.jpg" width="210" height="37" border="0"/></a>
<or esoh2></h2></td>
        <td valign="top">
        
        
        
        <?php
	$sql="SELECT * FROM  `Usuario` WHERE id=".$_GET[id];
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
<h1><?php echo $fl["apellidos"]; ?></h1>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th width="200" scope="row"><img width="200px" src="/publico/Usuario<?php echo $fl["id"]; ?>.jpg" /></th>
    <td>Nextel: <?php echo $fl["campo3"]; ?><br />
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

        
        
        
        
        
        </td>
      </tr>
    </table>

	<?php
	break;
	case 7:
	?>
	<h1>Gracias por enviar tu mensaje</h1>
	<?php
	break;
	case 8:
	?>
    

<?php
$sql="SELECT * FROM  `Inmueble` WHERE estadoInmobiliaria=0 AND id=".$_GET["id"];
$rs= mysql_query ($sql,$db);
while($fl=mysql_fetch_array($rs))
{
	foreach($fl as $nombre_campo => $valor)
	{
		$asignacion = $nombre_campo;
		$$asignacion=$valor;
	}
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/fodoTop.jpg" bgcolor="#C2291B">
  <tr>
    <td width="185"><a href="?as=1"><img name="logocabecera" src="img/logocabecera.png" width="185" height="84" border="0" id="logocabecera2" alt="" /></a></td>
    <td><p><a class="menuformato" href="?as=1">INICIO</a> <a class="menuformato" href="?as=2">QUIENES SOMOS</a> <a class="menuformato" href="?as=3">INMUEBLES</a> <a class="menuformato" href="?as=4">DIRECTORIO</a></p></td>
    <td valign="bottom"><div align="right">
<?php
    $sqlInmo="SELECT * FROM  `Usuario` WHERE id=".$id_Usuario;
    $rsInmo= mysql_query ($sqlInmo,$db);
    while($flInmo=mysql_fetch_array($rsInmo))
    {
        foreach($flInmo as $nombre_campo => $valor)
        {
            $asignacion = "INMO_".$nombre_campo;
            $$asignacion=$valor;
        }
    }
echo "<b>".$INMO_nombres."</b><br />";	
echo formatoTelefono($INMO_telefono);
    ?>
    </div></td>
    <td><div align="center"><img src="/publico/Usuario<?php echo $INMO_id; ?>.jpg" alt="" height="80px" hspace="10" vspace="10" /></div>    </td>
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
      <td><div align="right"><a href="javascript:window.print()" class="menuformato Estilo2"><img src="img/imprimir.png" alt="Imprimir ficha técnica del inmueble" width="13" height="13" border="0" />Imprimir</a><a href="javascript:history.back()" class="menuformato Estilo2"><img src="img/regresar.png" alt="Regresar a la página de busquedas de inmuebles" border="0" />Regresar</a></div></td>
    </tr>
  </table>
  </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="350" rowspan="2" valign="top"><div id="fotos"><img src="publico/<?php 

		echo "?a=".substr($fotoURL,0,-4)."&s=".substr($fotoURL,(strlen($fotoURL)-3),3);
		?>" /></div>
    </td>
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
    </div>
    
            
          </td>
        <td width="200" valign="top" bgcolor="#FFF9F9">
<?php
if($id_Asesor==0)
{

    $sql="SELECT * FROM  `Usuario` WHERE id=".$id_Usuario;
    $rs= mysql_query ($sql,$db);
    while($fl=mysql_fetch_array($rs))
    {
        foreach($fl as $nombre_campo => $valor)
        {
            $asignacion = "Usuario_".$nombre_campo;
            $$asignacion=$valor;
        }
    }
    ?>
          <h2 align="center">Contáctenos</h2>
          <div align="center"><img src="/publico/Usuario<?php echo $id_Usuario; ?>aa.jpg" height="100px" hspace="10" vspace="10" />
          </div>
          <div style="margin:10px;">
              <b><?php echo $Usuario_apellidos; ?></b> <br />
              <span class="Estilo3">Asesor Inmobiliario<br />
              </span>Nextel: <?php echo $Usuario_campo3; ?><br />
id Nextel: <?php echo $Usuario_nextel; ?><br />
Celular: <?php echo $Usuario_campo2; ?></div>           
<?php
}
else
{
?>
		<?php 
    $sql="SELECT * FROM  `Asesor` WHERE id=".$id_Asesor;
    $rs= mysql_query ($sql,$db);
    while($fl=mysql_fetch_array($rs))
    {
        foreach($fl as $nombre_campo => $valor)
        {
            $asignacion = "Asesor_".$nombre_campo;
            $$asignacion=$valor;
        }
    }
    ?>
          <h2 align="center">Contáctenos</h2>
          <div align="center"><img src="/publico/Asesor<?php echo $id_Asesor; ?>.jpg" height="100px" hspace="10" vspace="10" />
          </div>
          <div style="margin:10px;">
              <b><?php echo $Asesor_nombre; ?></b> <br />
              <span class="Estilo3">Asesor Inmobiliario<br />
              </span><?php echo str_replace("--","<br>",$Asesor_datos); ?>
           </div>
<?php
}
?>  <!-- AddThis Button BEGIN -->
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style"> <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a><br />
        </div>
      <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=sgalfonso"></script>
        <!-- AddThis Button END -->  
</td>
      </tr>
    </table>
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
?>

<div align="center">
  <?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
while (false !== ($archivo = readdir($directorio))) {

	$validador=explode("___",$archivo);
	if($validador[0]==$_GET["id"])
	{
	?><a id="<?php echo substr($archivo,0,-4); ?>"></a><img class="gotosGrandes" src="/publico/?a=<?php echo substr($archivo,0,-4); ?>&s=<?php echo substr($archivo,(strlen($archivo)-3),3); ?>&ancho=600" /><br /><?php
	}
}
closedir($directorio); 
?>
</div>
	<?php
	break;
	case 1:
	default:
	?>
	<?php 
if($_GET[operacionInmueble]=="") 
{ 
	?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="245" valign="top">
<a href="?operacionInmueble=1"><img src="img/compra.jpg" width="245" height="87" border="0"/></a>
<a href="?operacionInmueble=2"><img src="img/renta.jpg" width="245" height="87" border="0"/></a>
<a href="?as=4&amp;serv=1"><img src="img/traspaso.jpg" width="245" height="87" border="0"/></a></td>
    <td>
<div id="main">
  <div id="gallery">
    <div id="slides">    
<?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
$contPortada=0;
while (false !== ($archivo = readdir($directorio))) 
{
	$validador=explode("___",$archivo);
	if($validador[0]=='')
	{
		$contPortada++;
		$archivoParte=explode(".",$archivo); ?>
		<div class="slide"><img src="/publico/?a=<?php  echo $archivoParte["0"]; ?>&s=<?php  echo $archivoParte["1"]; ?>&ancho=751" height="261" width="751" border="0" /></div><?php
	}
}
closedir($directorio); 
?>
    </div>
    <div id="menu">
    <ul>
<?php
$i=0;
while($contPortada>$i)
{
$i++;
?>
        <li class="menuItem"><a href=""><img src="web/carrusel/img/sample_slides/thumb_macbook.png" alt="thumbnail" /></a></li>
<?php
}
?>
    </ul>
    </div>
  </div>
</div>    </td>
  </tr>
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="210" valign="top"><div align="center">
      <p>Publicidad<br />
        <img src="img/depoPublicidad.jpg" alt="" width="160" height="600" /></p>
      </div></td>
    <td valign="top"><h1>Inmuebles recientes</h1>
        <?php 

$sql="SELECT * FROM `Inmueble` WHERE status=1 AND  estadoInmobiliaria=0 AND fotoURL!='' ORDER BY fechaCreado DESC LIMIT 0,4";

$rs= mysql_query ($sql,$db);
while($fl=mysql_fetch_array($rs))
{
	if(file_exists("publico/".$fl["fotoURL"]))
	{
		?>
      <div class="resultado">
          <h2><?php echo strtoupper ($fl["titulo"]); ?></h2>
        <div style="background:url(publico/<?php 
		echo "?a=".rawurlencode(substr($fl["fotoURL"],0,-4))."&s=".substr($fl["fotoURL"],(strlen($fl["fotoURL"])-3),3);


		?>); background-repeat: no-repeat; background-position: center center;" class="img">
          <?php 	
		if(file_exists("publico/".$fl["id_Etiqueta"]))
		{
			echo '<img src="publico/'.$fl["id_Etiqueta"].'"/>';

		}
		?>
          <img src="<?php 
		switch($fl["operacionInmueble"])
		{
			case 1:
			echo "img/fotoEnVenta.png";
			break;
			case 2:
			echo "img/fotoEnRenta.png";
			break;
			case 3:
			echo "img/fotoTraspaso.png";
			break;
		}
		?>" /></div>
        <p><?php echo $fl["descripcion"]; ?></p>
        <div style="margin:9px;" align="right"> $ <?php echo number_format($fl["precio"]); ?></div>
        <a class="menuformato" href="?as=8&amp;id=<?php echo $fl["id"]; ?>">Ver detalles</a> </div>
      <?php
	}
}

?>
    </td>
  </tr>
</table><?php 
} 
else
{ 
	?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="245" valign="top">
<a href="?operacionInmueble=1"><img src="img/compra.jpg" width="245" height="87" border="0"/></a>
<a href="?operacionInmueble=2"><img src="img/renta.jpg" width="245" height="87" border="0"/></a>
<a href="?as=4"><img src="img/traspaso.jpg" width="245" height="87" border="0"/></a></td>
    <td bgcolor="<?php 
	
	switch($_GET[operacionInmueble])
	{
	case 1: 
	echo "#CFDFF5";
	break;
	case 2: 
	echo "#DAF7CE";
	break;
	case 3: 
	echo "#FBDAC6";
	break;
	}
	 ?>">   
    <div align="center">
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=1"><img src="img/bodega.png" width="48" height="48" vspace="10" /><br />
      Bodegas</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=2"><img src="img/casa.png" vspace="10" /><br />Casas</a></div><?php if($_GET[operacionInmueble]==2) { ?>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=3"><img src="img/cuartos.png" vspace="10" /><br />Cuartos</a></div><?php } ?>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=4"><img src="img/departamento.png" vspace="10" /><br />Departamentos</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=5"><img src="img/edificio.png" vspace="10" /><br />Edificios</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=6"><img src="img/local.png" vspace="10" /><br />Locales</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=7"><img src="img/oficina.png" vspace="10" /><br />Oficinas</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=8"><img src="img/terreno.png" vspace="10" /><br />Terrenos</a></div>
    <div class="botonTipoInmueble"><a href="?as=3&operacionInmueble=<?php echo $_GET["operacionInmueble"]; ?>&tipoInmueble=9"><img src="img/terreno.png" vspace="10" /><br />Ranchos y granjas</a></div>
    </div>    </td>
  </tr>
</table><?php 
} 
?>
<?php
}
?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>     </td>
  </tr>
  <tr>
    <td height="120" bgcolor="#F0F0F0"><div align="center">
      <p><strong>MÁS PROPIEDADES</strong><br />
        <a href="?as=1">Inicio</a> |
        <a href="?as=2">Quienes somos</a> |
        <a href="?as=3">Inmuebles</a> |
        <a href="?as=4">Directorio</a><br />
        <br />
      </p>
      </div></td>
  </tr>
</table>
</div>
<div align="center">
  <p>&nbsp;</p>
  <p>Acceso privado para asociados:<br />
    <a href="http://www.maspropiedades.com.mx/acontrol"><img src="img/acceso_acontrol.png" alt="A control - Panel de control" width="185" height="46" border="0" /></a></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>	
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4281819-32']);
  _gaq.push(['_setDomainName', 'maspropiedades.com.mx']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
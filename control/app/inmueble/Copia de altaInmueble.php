<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
if($_GET["valor"]!="")
{
	$sql="UPDATE Inmueble SET `".$_GET["campo"]."` = '".$_GET["valor"]."' , `fechamodif`= NOW() WHERE id =".$_GET["id_Inmueble"].";";
	mysql_query($sql,$db);
}
if($_GET["id_Inmueble"]=="")
{
	$sql="INSERT INTO  `ganas001_maspro`.`Inmueble` VALUES ('',  '".$ASid."', '', '', '', '', '',  '',  '',  '',  '',  '',  '',  '',  '12',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  NOW(),  '');";
	mysql_query($sql,$db);
	$_GET["id_Inmueble"]=mysql_insert_id($db);
}
if($_GET[a]=="") $_GET[a]=0;

//Recuperar todos los datos de los inmuebles.

	$sql="SELECT * FROM  Inmueble WHERE id='".$_GET["id_Inmueble"]."'";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
		foreach($fl as $nombre_campo => $valor){ 
			$asignacion = "db_".$nombre_campo;
			$$asignacion=$valor;
		} 
	}







if($_GET[a]!=12)
{
?>
<style type="text/css">
<!--
.Estilo3 {font-size: 12px}
-->
</style>

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="7%" align="center" <?php if($_GET["a"]==0) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=0&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">0</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==1) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">1</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==2) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">2</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==3) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">3</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==4) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">4</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==5) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">5</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==6) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=6&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">6</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==7) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">7</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==8) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=8&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">8</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==9) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=9&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">9</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==10) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=10&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">10</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==11) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=11&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">11</a></td>
    <td width="7%" align="center" <?php if($_GET["a"]==13) { echo 'bgcolor="#828790"'; } else { ?>bgcolor="#F0F0F0"<?php } ?>><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=13&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">12</a></td>
  </tr>
</table>
<?php
}
switch($_GET[a])
{
	case 0:
?>
<h3>Elegir asesor al que se le asignar&aacute;</h3>
	<?php
    $sql="SELECT * FROM  `Asesor` WHERE id_Usuario='".$ASid."' AND nombre!=''";
    $rs= mysql_query ($sql,$db);
    while($fl=mysql_fetch_array($rs))
    {
    ?>
    <div class="bloque2">
    <table border="0" cellpadding="8" cellspacing="3">
      <tr>
        <td bgcolor="#F0F0F0"><img src="/publico/Asesor<?php echo $fl["id"]; ?>.jpg" width="50px" /></td>
        <td bgcolor="#F9F9F9"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=1&campo=id_Asesor&valor=<?php echo $fl["id"]; ?>&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton"><?php echo $fl["nombre"]; ?></a></td>
      </tr>
    </table>
    </div>
    <?php
    }
    ?>
<?php
	break;
	case 1:
?>
<h3>Elegir el tipo de inmueble</h3>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Bodega</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Casas</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Cuartos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Departamentos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=5&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Edificos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=6&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Locales</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Oficinas</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&campo=tipoInmueble&valor=8&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Terrenos y Ranchos</a></div>
<?php
	break;
	case 2:
?>
<h3>Elegir el tipo de operaci&oacute;n</h3>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&campo=operacionInmueble&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Venta</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&campo=operacionInmueble&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Renta</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&campo=operacionInmueble&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Traspaso</a></div>
<?php
	break;
	case 3:
?>
<h3>Elegir la condici&oacute;n del inmueble</h3>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&campo=condicion&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Nuevo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&campo=condicion&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Seminuevo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&campo=condicion&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Usado</a></div>
<?php
	break;
	case 4:
?>
<h3>Eligir el estado en donde se encuentra el inmueble</h3>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Aguascalientes</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Baja California </a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Baja California Sur</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Campeche</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=5&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Chihuahua</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=6&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Chiapas</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Coahuila</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=8&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Colima</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=9&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Distrito Federal</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=10&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Durango</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=11&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Guerrero</a></div>
    <div class="bloque" style="background:#63a2ff"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=12&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Guanajuato</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=13&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Hidalgo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=14&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Jalisco</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=15&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Michoac&aacute;n</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=16&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Estado de M&eacute;xico</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=17&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Morelos</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=18&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Nayarit</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=19&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Nuevo Le&oacute;n</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=20&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Oaxaca</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=21&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Puebla</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=22&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Quintana Roo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=23&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Queretaro</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=24&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Sinaloa</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=25&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">San Luis Potos&iacute;</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=26&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Sonora</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=27&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Tabasco</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=28&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Tamaulipas</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=29&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Tlaxcala</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=30&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Veracruz</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=31&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Yucatan</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=5&campo=estado&valor=32&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Zacatecas</a></div>
<?php
	break;
	case 5:
?>
<h3>Definir la ciudad donde se encuentra el inmueble</h3>
    <div align="center">
      <form id="form1" name="form1" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td bgcolor="#F0F0F0">Ciudad</td>
            <td bgcolor="#F9F9F9"><input name="ciudad" type="text" id="estado3" value="<?php echo $db_ciudad; ?>" list="listCiudades" /></td>
          </tr>
        </table>
            </form>
      <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=6&campo=ciudad&valor='+form1.ciudad.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
    </div>
<datalist id="listCiudades"><option value="Abasolo"><option value="Pueblo Nuevo"><option value="Ac&aacute;mbaro"><option value="Pur&iacute;sima de Bustos"><option value="San Miguel de Allende"><option value="Romita"><option value="Apaseo el Alto"><option value="Salamanca"><option value="Apaseo el Grande"><option value="Salvatierra"><option value="Atarjea"><option value="San Diego de la Uni&oacute;n"><option value="Celaya"><option value="San Felipe"><option value="Manuel Doblado"><option value="San Francisco del Rinc&oacute;n"><option value="Comonfort"><option value="San Jos&eacute; Iturbide"><option value="Coroneo"><option value="San Luis de la Paz"><option value="Cort&aacute;zar"><option value="Santa Catarina"><option value="Cuer&aacute;maro"><option value="Juventino Rosas"><option value="Doctor Mora"><option value="Santiago Maravat&iacute;o"><option value="Dolores Hidalgo"><option value="Silao"><option value="Guanajuato"><option value="Tarandacuao"><option value="Huan&iacute;maro"><option value="Tarimoro"><option value="Irapuato"><option value="Tierra Blanca"><option value="Jaral del Progreso"><option value="Uriangato"><option value="Jer&eacute;cuaro"><option value="Valle de Santiago"><option value="Le&oacute;n"><option value="Victoria"><option value="Morole&oacute;n"><option value="Villagr&aacute;n"><option value="Ocampo"><option value="Xich&uacute;"><option value="P&eacute;njamo"><option value="Yuriria"></datalist>
<?php
	break;
	case 6:
?>
<h3>Eligir la ubicaci&oacute;n del inmueble</h3>
    <div align="center"><table border="0" cellpadding="0" cellspacing="0" background="/acontrol/img/rosaVientos.png">
      <tr>
        <td width="133" height="133">	<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Noroeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Noroeste</a></div></td>
        <td width="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Norte&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Norte</a></div></td>
        <td width="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Noreste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Noreste</a></div></td>
      </tr>
      <tr>
        <td height="134">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Oeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Oeste</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Centro&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Centro</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Este&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Este</a></div></td>
      </tr>
      <tr>
        <td height="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Suroeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Suroeste</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Sur&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Sur</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&campo=zona&valor=Sureste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Sureste</a></div></td>
      </tr>
    </table>
    <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Omitir</a></p>
</div>
<?php
	break;
	case 7:
?>
<h3>Indicar la direcci&oacute;n del inmueble</h3>
    <div align="center">
      <form id="form2" name="form2" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td width="150" bgcolor="#F0F0F0"> Direcci&oacute;n</td>
            <td bgcolor="#F9F9F9"><textarea name="direccion" id="direccion" cols="45" rows="2"><?php echo $db_direccion; ?></textarea></td>
          </tr>
        </table>
      </form>
    <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=8&campo=direccion&valor='+form2.direccion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
    </div>
<?php
	break;
	case 8:
?>
<h3>Describir el inmueble</h3>
    <div align="center">
      <form id="form4" name="form4" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td bgcolor="#F0F0F0">Titulo</td>
            <td bgcolor="#F9F9F9"><input name="titulo" type="text" id="titulo" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=titulo&valor='+form4.titulo.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_titulo ?>" size="50" /></td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0">Descripci&oacute;n</td>
            <td bgcolor="#F9F9F9"><textarea onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=descripcion&valor='+form4.descripcion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="descripcion" id="descripcion" cols="50" rows="3"><?php echo $db_descripcion; ?></textarea></td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0">Precio</td>
            <td bgcolor="#F9F9F9">$
              <input name="precio" type="text" id="precio" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=precio&valor='+form4.precio.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_precio; ?>" /></td>
          </tr>
        </table>
      </form>
      <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=titulo&valor='+form4.titulo.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=descripcion&valor='+form4.descripcion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=precio&valor='+form4.precio.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=9&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
    </div>
<?php
	break;
	case 9:
?>
<h3>Definir dimenciones del inmueble</h3>
      <form id="form4" name="form4" method="post" action="">
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0"> Antiguedad</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_antiguedad ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=antiguedad&valor='+form4.antiguedad.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="antiguedad" type="number" id="antiguedad" min="0" max="900" />
          a&ntilde;os</td>
        </tr>
      </table>
    </div>
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Terreno</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_terreno; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=terreno&valor='+form4.terreno.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="terreno" type="number" id="terreno" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div>
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Construcci&oacute;n</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_construccion; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=construccion&valor='+form4.construccion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="construccion" type="number" id="construccion" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div>

    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">No. de recamaras</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_numeroDeRecamaras; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeRecamaras&valor='+form4.numeroDeRecamaras.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="numeroDeRecamaras" type="number" id="numeroDeRecamaras" max="999" min="0" /></td>
        </tr>
      </table>
    </div>
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">N&uacute;mero de niveles</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_numeroDeNiveles; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeNiveles&valor='+form4.numeroDeNiveles.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="numeroDeNiveles" type="number" id="numeroDeNiveles" max="999" min="0" /></td>
        </tr>
      </table>
    </div>    
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">&Aacute;rea de jard&iacute;n</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_areaDeJardin; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=areaDeJardin&valor='+form4.areaDeJardin.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="areaDeJardin" type="number" id="areaDeJardin" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div>
    
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Cochera sin techar</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_cocheraSinTecho; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraSinTecho&valor='+form4.cocheraSinTecho.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="cocheraSinTecho" type="number" id="cocheraSinTecho" max="999" min="0" />autos</td>
        </tr>
      </table>
    </div><div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">N&uacute;mero de ba&ntilde;os</td>
          <td bgcolor="#F9F9F9"><input name="numeroDeBanos" type="text" id="numeroDeBanos" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeBanos&valor='+form4.numeroDeBanos.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_numeroDeBanos; ?>" size="3" max="999" min="0" /></td>
        </tr>
      </table>
    </div>
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Cochera techada</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_cocheraTechada; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraTechada&valor='+form4.cocheraTechada.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="cocheraTechada" type="number" id="cocheraTechada" max="999" min="0" />autos</td>
        </tr>
      </table>
    </div>
      </form>
      <p>&nbsp;</p>
<p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=antiguedad&valor='+form4.antiguedad.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=terreno&valor='+form4.terreno.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=construccion&valor='+form4.construccion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeRecamaras&valor='+form4.numeroDeRecamaras.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeNiveles&valor='+form4.numeroDeNiveles.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=areaDeJardin&valor='+form4.areaDeJardin.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraSinTecho&valor='+form4.cocheraSinTecho.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeBanos&valor='+form4.numeroDeBanos.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraTechada&valor='+form4.cocheraTechada.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=10&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
<?php
	break;
	case 10:
?>
<h3>Definir detalles adicionales del inmueble</h3>
    <div align="center">
      <form id="form3" name="form3" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td width="150" bgcolor="#F0F0F0"> Detalles adicionales</td>
            <td bgcolor="#F9F9F9"><textarea name="detalles" id="detalles" cols="60" rows="6"></textarea></td>
          </tr>
        </table>
      </form>
    <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=11&campo=detalles&valor='+form3.detalles.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
    </div>
<?php
	break;
	case 11:
?><br />
<br />
<br />

<a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=13&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a> </p>
<iframe src="/publico/subir.php?id=<?php echo $_GET["id_Inmueble"]; ?>" frameborder="0" marginheight="0" marginwidth="" scrolling="auto" width="90%" height="300px" ></iframe>
  <?php
	break;
	case 12:
	//se guarda solamente el campo enviado
	break;
	case 13: //Subir fotos del inmueble
?>
<br />
<div align="center">Da clic sobre la fotograf&iacute;a que desees que sea la principal</div>

<h1><?php echo $db_tipoInmueble; ?> en <?php echo $db_operacionInmueble; ?> en la ciudad de <?php echo $db_ciudad; ?></h1>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td width="355" valign="top" bgcolor="#F0F0F0"><div align="center"><img src="/publico/<?php echo $db_fotoURL; ?>" width="350" /></div></td>
    <td valign="top"><p><?php echo $db_titulo; ?> - <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=8&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a>
      </p><p><?php echo $db_descripcion; ?></p>
    <p>$<?php echo $db_precio; ?></p>
    <p>Informes con: - <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=0&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></p>
    <p><?php echo $db_id_Asesor; ?></p></td>
  </tr>
</table>
<div align="right">
<a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=11&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></div>
  <?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
while (false !== ($archivo = readdir($directorio))) {

	$validador=explode("___",$archivo);
	if($validador[0]==$_GET["id_Inmueble"]&&$archivo!=$db_fotoURL)
	{
		$archivoParte=explode(".jp",$archivo);
	?>
<div class="bloque" style="height:120px;">		
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=13&campo=fotoURL&valor=<?php 
	echo $archivo; ?>&id_Inmueble=<?php 
	echo $_GET["id_Inmueble"]; ?>','contenido');"><img src="/publico/?a=<?php  
	echo $archivoParte["0"];
	?>&s=jpg&ancho=300" height="100px" hspace="5px" vspace="5px" border="0" /></a></div>
	<?php
	}
}
closedir($directorio); 
?>

<div align="right"> <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=9&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></div>

<?php if($db_antiguedad!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">Antiguedad</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_antiguedad; ?></span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_terreno!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">Terreno</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_terreno; ?>m2</span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_construccion!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">Construcci&oacute;n</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_construccion; ?>m2</span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_numeroderecamaras!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">N&uacute;mero. de recamaras</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_numeroderecamaras; ?></span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_numeroDeNiveles!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">N&uacute;mero de niveles</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_numeroDeNiveles; ?></span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_areaDeJardin!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">&Aacute;rea de jard&iacute;n</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3"><?php echo $db_areaDeJardin; ?></span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_numeroDeBanos!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">N&uacute;mero de ba&ntilde;os</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3">
        <?php echo $db_numeroDeBanos; ?>
      </span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_cocheraSinTecho!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">Cochera sin techar</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3">
        <?php echo $db_cocheraSinTecho ?> autos
      </span></td>
    </tr>
  </table>
</div>
<?php } 
if($db_cocheraTechada!="") { ?>
<div class="bloque">
  <table border="0" cellpadding="8" cellspacing="3">
    <tr>
      <td bgcolor="#F0F0F0"><span class="Estilo3">Cochera techada</span></td>
      <td bgcolor="#F9F9F9"><span class="Estilo3">
        <?php echo $db_cocheraTechada ?>
autos      </span></td>
    </tr>
  </table>
</div>
<?php } ?>
<div align="right"> <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=10&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></div>
<p><?php echo $db_detalles ?></p>
<?php
	break;
}
}
?>

<?php header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada 
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE 

include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
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
.BotonBlanco {
	font-weight: bold;
	color: #FFFFFF;
	text-decoration:none;
}
-->
</style>


<table width="100%" border="0" cellpadding="2" cellspacing="5" background="/acontrol/img/fondoBarraHerramientas.jpg">
  <tr background="/acontrol/img/fondoBarra2.jpg">
    <td width="20%" align="center" <?php if($_GET["a"]==0) echo 'background="/acontrol/img/fondoBarraActiva2.jpg"'; ?>>

<a class="BotonBlanco" href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=0&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');"> Clasificaci&oacute;n</a></td>
    <td width="20%" align="center" <?php if($_GET["a"]==1) echo 'background="/acontrol/img/fondoBarraActiva2.jpg"'; ?>>
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=1&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="BotonBlanco">Ubicaci&oacute;n</a></td>
    <td width="20%" align="center" <?php if($_GET["a"]==2) echo 'background="/acontrol/img/fondoBarraActiva2.jpg"'; ?>>
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="BotonBlanco">Especificaciones</a></td>
    <td width="20%" align="center" <?php if($_GET["a"]==3) echo 'background="/acontrol/img/fondoBarraActiva2.jpg"'; ?>>
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="BotonBlanco">Fotograf&iacute;a</a></td>
    <td width="20%" height="37" align="center" <?php if($_GET["a"]==4) 
	echo 'background="/acontrol/img/fondoBarraActiva2.jpg"'; ?>>
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="BotonBlanco">Revisi&oacute;n final</a></td>
  </tr>
</table>
<?php
}
switch($_GET[a])
{
	case 0:
?>
<div id="1_1">
  <h3>1.- Elige el asesor del inmueble</h3>
	<?php
    $sql="SELECT * FROM  `Asesor` WHERE id_Usuario='".$ASid."' AND nombre!=''";
    $rs= mysql_query ($sql,$db);
    while($fl=mysql_fetch_array($rs))
    {
    ?>
    <div class="bloque" style="height:100px; width:250px;">
<img src="/publico/Asesor<?php echo $fl["id"]; ?>.jpg" height="50px" /><br />
<br />

<a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=id_Asesor&valor=<?php echo $fl["id"]; ?>&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton" style="font-size:10px; overflow:hidden"><?php echo $fl["nombre"]; ?></a>

</div>
    <?php
    }
    ?><br />
</div>
<div id="1_2">
<h3>2.- Elige el tipo de inmueble</h3>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Bodega</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Casas</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Cuartos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Departamentos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=5&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Edificos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=6&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Locales</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=tipoInmueble&valor=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Oficinas</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=tipoInmueble&amp;valor=8&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Terrenos</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=tipoInmueble&amp;valor=9&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Ranchos y granjas</a></div>
</div>
<div id="1_3">
<h3>3.- Elige el tipo de operaci&oacute;n</h3>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=operacionInmueble&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Venta</a></div>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=operacionInmueble&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Renta</a></div>
</div>
<div id="1_4">
<h3>4.- Elige la condici&oacute;n del inmueble</h3>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=condicion&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Nuevo</a><br /><span style="font-size:9px">&nbsp;</span></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=condicion&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Seminuevo</a><br /><span style="font-size:9px">Menos de 3 a&ntilde;os</span></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=condicion&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Usado</a><br /><span style="font-size:9px">&nbsp;</span>
  </div>
</div>
<p align="right"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=1&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
      <?php
	break;
	case 1:
?>
<div id="2_1"><h3>1. Elige el estado en donde se encuentra el inmueble</h3>
<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=12&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Guanajuato</a></div><br />
<a href="javascript:mostrar('estados')">Morstrar u ocultar otros estados</a>
<div id="estados" style="display:none;">

<div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=1&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Aguascalientes</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=2&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Baja California </a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=3&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Baja California Sur</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Campeche</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=5&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Chihuahua</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=6&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Chiapas</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=7&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Coahuila</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=8&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Colima</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=9&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Distrito Federal</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=10&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Durango</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=11&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Guerrero</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=13&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Hidalgo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=14&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Jalisco</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=15&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Michoac&aacute;n</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=16&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Estado de M&eacute;xico</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=17&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Morelos</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=18&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Nayarit</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=19&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Nuevo Le&oacute;n</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=20&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Oaxaca</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=21&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Puebla</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=22&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Quintana Roo</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=23&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Queretaro</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=24&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Sinaloa</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=25&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">San Luis Potos&iacute;</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=26&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Sonora</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=27&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Tabasco</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=28&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Tamaulipas</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=29&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Tlaxcala</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=30&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Veracruz</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=31&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Yucatan</a></div>
    <div class="bloque"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=estado&valor=32&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Zacatecas</a></div>
</div>
</div>
<br />
<div id="2_3">
  <h3>3. Indicar la direcci&oacute;n del inmueble</h3>
  <div align="center">
    <form id="form2" name="form2" method="post" action="">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Ciudad</td>
          <td bgcolor="#F9F9F9"><input name="ciudad" type="text" id="estado3" value="<?php 
		  if($db_ciudad=="") echo "Le&oacute;n"; else echo $db_ciudad; 
		  ?>" list="listCiudades" onchange="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=ciudad&amp;valor='+form2.ciudad.value+'&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=ciudad&amp;valor='+form2.ciudad.value+'&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');"/> 
            <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=ciudad&amp;valor='+form2.ciudad.value+'&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Guardar ciudad</a>              
            <datalist id="listCiudades">
                <option value="Abasolo"></option>
                <option value="Pueblo Nuevo"></option>
                <option value="Ac&aacute;mbaro"></option>
                <option value="Pur&iacute;sima de Bustos"></option>
                <option value="San Miguel de Allende"></option>
                <option value="Romita"></option>
                <option value="Apaseo el Alto"></option>
                <option value="Salamanca"></option>
                <option value="Apaseo el Grande"></option>
                <option value="Salvatierra"></option>
                <option value="Atarjea"></option>
                <option value="San Diego de la Uni&oacute;n"></option>
                <option value="Celaya"></option>
                <option value="San Felipe"></option>
                <option value="Manuel Doblado"></option>
                <option value="San Francisco del Rinc&oacute;n"></option>
                <option value="Comonfort"></option>
                <option value="San Jos&eacute; Iturbide"></option>
                <option value="Coroneo"></option>
                <option value="San Luis de la Paz"></option>
                <option value="Cort&aacute;zar"></option>
                <option value="Santa Catarina"></option>
                <option value="Cuer&aacute;maro"></option>
                <option value="Juventino Rosas"></option>
                <option value="Doctor Mora"></option>
                <option value="Santiago Maravat&iacute;o"></option>
                <option value="Dolores Hidalgo"></option>
                <option value="Silao"></option>
                <option value="Guanajuato"></option>
                <option value="Tarandacuao"></option>
                <option value="Huan&iacute;maro"></option>
                <option value="Tarimoro"></option>
                <option value="Irapuato"></option>
                <option value="Tierra Blanca"></option>
                <option value="Jaral del Progreso"></option>
                <option value="Uriangato"></option>
                <option value="Jer&eacute;cuaro"></option>
                <option value="Valle de Santiago"></option>
                <option value="Le&oacute;n"></option>
                <option value="Victoria"></option>
                <option value="Morole&oacute;n"></option>
                <option value="Villagr&aacute;n"></option>
                <option value="Ocampo"></option>
                <option value="Xich&uacute;"></option>
                <option value="P&eacute;njamo"></option>
                <option value="Yuriria"></option>
              </datalist></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<br />
<div id="2_2"><h3>2. Elige la ubicaci&oacute;n del inmueble</h3>
    <div align="center"><table border="0" cellpadding="0" cellspacing="0" background="/acontrol/img/rosaVientos.png">
      <tr>
        <td width="133" height="133">	<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Noroeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Noroeste</a></div></td>
        <td width="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Norte&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Norte</a></div></td>
        <td width="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Noreste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Noreste</a></div></td>
      </tr>
      <tr>
        <td height="134">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Oeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Oeste</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Centro&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Centro</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Este&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Este</a></div></td>
      </tr>
      <tr>
        <td height="133">				<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Suroeste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Suroeste</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Sur&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Sur</a></div></td>
        <td>							<div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=zona&valor=Sureste&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" class="boton">Sureste</a></div></td>
      </tr>
    </table></div></div>
    
<p align="right"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>
<?php
	break;
	case 2:
?>
<h3>Describir el inmueble</h3>

      <form id="form4" name="form4" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td width="150" bgcolor="#F0F0F0">Colonia</td>
            <td bgcolor="#F9F9F9"><input name="titulo" type="text" id="titulo" onchange="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=titulo&valor='+form4.titulo.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=titulo&valor='+form4.titulo.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_titulo ?>" size="50" list="listColonias" /><datalist id="listColonias">
<option value="&Aacute;lvaro Obreg&oacute;n">
<option value="&Aacute;ngeles y Medina">
<option value="10 de Mayo">
<option value="27 de Septiembre (const Gto)">
<option value="8 de Marzo">
<option value="Acr&oacute;polis">
<option value="Adquirientes de Ibarrilla">
<option value="Agua Azul">
<option value="Alameda de La Presa">
<option value="Alameda Diamante">
<option value="Alfaro">
<option value="Alfaro">
<option value="Andrade">
<option value="Antenas de Arriba">
<option value="Anturia">
<option value="Arbide">
<option value="Arboleda del Refugio">
<option value="Arboleda San Hilari&oacute;n">
<option value="Arboleda San Jos&eacute;">
<option value="Arboledas de Ibarrilla">
<option value="Arboledas de La Luz">
<option value="Arboledas de Los Castillos I">
<option value="Arboledas de los Castillos II">
<option value="Arboledas de los L&oacute;pez I">
<option value="Arboledas de los L&oacute;pez II">
<option value="Arboledas de San Pedro">
<option value="Arboledas de Se&ntilde;ora">
<option value="Arboledas del Campo">
<option value="Arboledas del Campo">
<option value="Arboledas del Valle">
<option value="Arco iris">
<option value="Arcos Antiqua">
<option value="Arroyo Hondo">
<option value="Aztecas">
<option value="Azul Maguey">
<option value="Balc&oacute;n de las Hilamas">
<option value="Balcones de Jerez">
<option value="Balcones de La Joya">
<option value="Balcones de La Presa">
<option value="Balcones del Campestre">
<option value="Balcones Tulipanes">
<option value="Barranca de Venaderos">
<option value="Barretos">
<option value="Bel&eacute;n">
<option value="Bellavista">
<option value="Benito Ju&aacute;rez">
<option value="Betania La Lucita">
<option value="Bosques (Misael N&uacute;&ntilde;ez)">
<option value="Bosques de La Pradera">
<option value="Bosques de La Presa">
<option value="Bosques de los Cedros">
<option value="Bosques de Los Naranjos">
<option value="Bosques de Los Naranjos Secci&oacute;n Villas">
<option value="Bosques de Renter&iacute;a">
<option value="Bosques del Campestre">
<option value="Bosques del Refugio">
<option value="Bosques del Sur">
<option value="Bosques del Valle">
<option value="Bosques Reales">
<option value="Brisas de San Francisco">
<option value="Brisas de San Nicol&aacute;s">
<option value="Brisas del Campo I">
<option value="Brisas del Campo II">
<option value="Brisas del Carmen">
<option value="Brisas del Lago">
<option value="Brisas del Pedregal">
<option value="Brisas del Sol">
<option value="Brisas del Vergel">
<option value="Buenavista">
<option value="Buenos Aires">
<option value="Ca&ntilde;&oacute;n de La India">
<option value="Ca&ntilde;ada de Alfaro">
<option value="Ca&ntilde;ada de Jerez">
<option value="Ca&ntilde;ada del Campestre">
<option value="Camelinas">
<option value="Camino a San Juan">
<option value="Campestre de Jerez">
<option value="Campestre El Sol">
<option value="Campestre Nuevo Jerez">
<option value="Campestre San Jos&eacute;">
<option value="Campo Palmyra">
<option value="Campo Verde">
<option value="Campo Vi&ntilde;a">
<option value="Cantarranas">
<option value="Canteritas de Echeveste">
<option value="Capellan&iacute;a de Loera">
<option value="Casa Blanca">
<option value="Casa de Piedra">
<option value="Castillos Viejos">
<option value="Caudal del R&iacute;o">
<option value="Cementos">
<option value="Central de Abastos">
<option value="Centro">
<option value="Centro Bodeguero las Trojes">
<option value="Centro de Prevenci&oacute;n Social">
<option value="Centro Familiar La Piedad">
<option value="Centro Familiar Soledad">
<option value="Cerrito Amarillo">
<option value="Cerrito de Guadalupe">
<option value="Cerrito de Jerez">
<option value="Cerrito de La Joya">
<option value="Chalet La Cumbre">
<option value="Chapalita">
<option value="Chulavista">
<option value="Cima Diamante">
<option value="Ciudad Aurora">
<option value="Ciudad del Ni&ntilde;o">
<option value="Ciudad Industrial">
<option value="Ciudad Sat&eacute;lite">
<option value="Club Campestre">
<option value="Club H&iacute;pico">
<option value="Club Loyola">
<option value="Coecillo">
<option value="Colina de La Hacienda">
<option value="Colina Real">
<option value="Colinas de Gran Jard&iacute;n">
<option value="Colinas de Le&oacute;n">
<option value="Colinas de Plata">
<option value="Colinas de San Francisco">
<option value="Colinas de San Isidro">
<option value="Colinas de Santa Julia">
<option value="Colinas del Carmen">
<option value="Complejo La Cima">
<option value="Condominio Industrial Le&oacute;n">
<option value="Convive">
<option value="Cortijo de La Gloria">
<option value="Country Club los Naranjos">
<option value="Cristo Rey">
<option value="Cumbres de Arbide">
<option value="Cumbres de La Piscina">
<option value="Cumbres del Campestre">
<option value="Cumbres del Sol">
<option value="Del Cosmos (san Bernardo)">
<option value="Del Roc&iacute;o">
<option value="Delta 2000">
<option value="Delta de Jerez">
<option value="Derramadero">
<option value="Desarrollo Baleares">
<option value="Desarrollo El Potrero">
<option value="Duarte">
<option value="Echeveste 2000">
<option value="Ecol&oacute;gico de Le&oacute;n">
<option value="El &aacute;lamo">
<option value="El Cacer&iacute;o">
<option value="El Campanario">
<option value="El Carmen">
<option value="El Carmen">
<option value="El Carmen CTM">
<option value="El Castillo">
<option value="El Cid">
<option value="El Coecillo">
<option value="El Condado">
<option value="El Condado Plus">
<option value="El Cortijo">
<option value="El Cuarente&ntilde;o">
<option value="El Cuije">
<option value="El Duraznal">
<option value="El Faro">
<option value="El Granjeno">
<option value="El Granjeno (iveg)">
<option value="El Guajito">
<option value="El Lucero">
<option value="El Lucero">
<option value="El Maguey">
<option value="El Mezquite">
<option value="El Mirador Campestre">
<option value="El Mirador Oriental">
<option value="El Nacimiento">
<option value="El Observatorio 2">
<option value="El Paisaje">
<option value="El Palmar">
<option value="El Palote">
<option value="El Palote Sur Fracciones">
<option value="El Para&iacute;so I">
<option value="El Para&iacute;so II">
<option value="El Parador">
<option value="El Pe&ntilde;&oacute;n">
<option value="El Peluchan">
<option value="El Penitente">
<option value="El Pochote">
<option value="El Porvenir">
<option value="El Potrero">
<option value="El Pueblito">
<option value="El Puente">
<option value="El Recuerdo">
<option value="El Refugio">
<option value="El Refugio Campestre">
<option value="El Refugio de los Sauces">
<option value="El Resplandor">
<option value="El Retiro">
<option value="El Rosario">
<option value="El Salto">
<option value="El Suspiro">
<option value="El Tlacuache Oriente">
<option value="El Tlacuache Poniente">
<option value="El Tr&eacute;bol">
<option value="El Trianon">
<option value="El Valladito">
<option value="El Vivero">
<option value="Ermita">
<option value="Espa&ntilde;a">
<option value="Espa&ntilde;ita">
<option value="Estancia de La Sandia">
<option value="Estancia de los Sapos">
<option value="Estancia de Vaqueros">
<option value="Estancia Los Naranjos">
<option value="Estrella">
<option value="Ex Hacienda La More&ntilde;a">
<option value="Eyupol">
<option value="Fideicomiso Ciudad Industrial">
<option value="Fincas Sayavedra">
<option value="Ford del Campestre">
<option value="Foresta Jard&iacute;n">
<option value="Fracci&oacute;n del Coecillo">
<option value="Fracci&oacute;n del Granjeno">
<option value="Fracciones Corral de Piedra">
<option value="Fracciones de Echeveste (pro)">
<option value="Fracciones de Hacienda La Pompa">
<option value="Fracciones de Jerez">
<option value="Fracciones de los Arcos">
<option value="Fracciones de los G&oacute;mez">
<option value="Fracciones de los Sauces de Abajo">
<option value="Fracciones de Mesa Medina">
<option value="Fracciones de San Nicol&aacute;s">
<option value="Fracciones de Santa Lucia">
<option value="Fracciones del Crespo">
<option value="Fracciones del Palote">
<option value="Fracciones del Rosario">
<option value="Fracciones San Pedro">
<option value="Francisco Lozornio">
<option value="Frutales de La Hacienda">
<option value="Frutales de La Hacienda II">
<option value="Futurama Monterrey">
<option value="Gran Jard&iacute;n">
<option value="Granada Infonavit">
<option value="Granja Ceres">
<option value="Granjas Campestre">
<option value="Granjas del Rosario">
<option value="Granjas Echeveste">
<option value="Granjas Econ&oacute;micas">
<option value="Granjas Econ&oacute;micas los Sauces">
<option value="Granjas El Palote">
<option value="Granjas Jardines de Jerez">
<option value="Granjas las Amalias">
<option value="Granjas las Palomas">
<option value="Granjas San Carlos">
<option value="Guadalupe">
<option value="Guadalupe">
<option value="H&eacute;roes de Chapultepec">
<option value="Hacienda de Arriba (san Jos&eacute; de La Concepci&oacute;n)">
<option value="Hacienda de Guadalupe">
<option value="Hacienda de los Naranjos">
<option value="Hacienda del Campestre">
<option value="Hacienda del Carmen">
<option value="Hacienda Echeveste">
<option value="Hacienda La Huaracha">
<option value="Hacienda las Mandarinas">
<option value="Hacienda San Miguel">
<option value="Hacienda Santa Fe">
<option value="Haciendas de Le&oacute;n">
<option value="Hernandez Rougon">
<option value="Hidalgo">
<option value="Hidalgo del Valle">
<option value="Horizonte Azul">
<option value="Ibarrilla">
<option value="Inca">
<option value="Independencia">
<option value="Independencia Infonavit">
<option value="Industrial">
<option value="Industrial Brisas del Campo">
<option value="Industrial del Norte">
<option value="Industrial Delta">
<option value="Industrial G&eacute;nesis">
<option value="Industrial Hidalgo">
<option value="Industrial Ju&aacute;rez">
<option value="Industrial Juli&aacute;n de Obreg&oacute;n">
<option value="Industrial La Capilla">
<option value="Industrial La Pompa">
<option value="Industrial La Trinidad">
<option value="Industrial las Cruces">
<option value="Industrial Pamplona">
<option value="Industrial San Jorge">
<option value="Industrial Santa CROCCE">
<option value="Industrial Santa Julia">
<option value="Insurgentes">
<option value="Islas de Le&oacute;n">
<option value="Jaime Nun&oacute;">
<option value="Jard&iacute;n Delta">
<option value="Jardines de Echeveste">
<option value="Jardines de Jerez">
<option value="Jardines de Jerez II">
<option value="Jardines de Jerez III">
<option value="Jardines de La Pradera">
<option value="Jardines de Los Reyes">
<option value="Jardines de Maravillas">
<option value="Jardines de Oriente">
<option value="Jardines de Providencia">
<option value="Jardines de San Juan">
<option value="Jardines de San Miguelito">
<option value="Jardines de San Pedro">
<option value="Jardines de San Sebasti&aacute;n">
<option value="Jardines de San Sebasti&aacute;n II">
<option value="Jardines de Santa Julia">
<option value="Jardines del Bosque">
<option value="Jardines del Campestre">
<option value="Jardines del Moral">
<option value="Jardines del Sol">
<option value="Jardines del Valle">
<option value="Jardines Lomas de Medina">
<option value="Jes&uacute;s de Nazareth">
<option value="Jes&uacute;s Mar&iacute;a">
<option value="John F Kennedy">
<option value="Jol-gua-ber">
<option value="Josefina">
<option value="Joya de La Loma">
<option value="Joyas de Castilla">
<option value="Joyas de La Loma">
<option value="Juan Jos&eacute; Torres Landa">
<option value="Juan Valle">
<option value="Juli&aacute;n Carrillo">
<option value="Killian I">
<option value="Killian II">
<option value="La Alameda">
<option value="La Antiqua">
<option value="La Arcina">
<option value="La Barca">
<option value="La Brisa">
<option value="La Ca&ntilde;ada">
<option value="La Campi&ntilde;a">
<option value="La Candelaria">
<option value="La Capilla de Alfaro">
<option value="La Carmona">
<option value="La Condesa">
<option value="La Cuesta Blanca">
<option value="La Escondida">
<option value="La Esmeralda">
<option value="La Esperanza">
<option value="La Esperanza de Alfaro">
<option value="La Esperanza de Jerez">
<option value="La Floresta">
<option value="La Florida">
<option value="La Foresta">
<option value="La Fragua">
<option value="La Gloria">
<option value="La Hacienda">
<option value="La Haciendita">
<option value="La Herradura">
<option value="La Herradura">
<option value="La India">
<option value="La Joya">
<option value="La Joya">
<option value="La Laborcita">
<option value="La Lagunita">
<option value="La Lluvia">
<option value="La Lluvia Secc Brisas">
<option value="La Loma">
<option value="La Luz">
<option value="La Marina">
<option value="La Martinica">
<option value="La Medalla">
<option value="La Merced (ramirez Garc&iacute;a)">
<option value="La Mora">
<option value="La Mora (cruz de Cantera)">
<option value="La Mora Alta">
<option value="La More&ntilde;a">
<option value="La Nopalera">
<option value="La Noria">
<option value="La Pati&ntilde;a">
<option value="La Pechuga">
<option value="La Perita">
<option value="La Piedrera">
<option value="La Pir&aacute;mide">
<option value="La Piscina CTM">
<option value="La Piscina Km. 3.5">
<option value="La Placita">
<option value="La Pradera">
<option value="La Providencia">
<option value="La Puerta de Hierro">
<option value="La Raza">
<option value="La Reserva">
<option value="La Rioja">
<option value="La Sandia">
<option value="La Selva II">
<option value="La Toscana">
<option value="La Trilla">
<option value="La Trinidad">
<option value="La Venta">
<option value="Ladera de Jerez">
<option value="Ladrilleras del Refugio">
<option value="Lagos del Campestre">
<option value="Lagos del Country">
<option value="Lagunillas">
<option value="Las &aacute;guilas">
<option value="Las Am&eacute;ricas">
<option value="Las Arboledas">
<option value="Las Arrayanes II">
<option value="Las Bugambilias">
<option value="Las Camelinas">
<option value="Las Canelas">
<option value="Las Flores">
<option value="Las Fuentes">
<option value="Las Fuentes de San Pedro">
<option value="Las Glorias">
<option value="Las Hilamas">
<option value="Las Huertas">
<option value="Las Mandarinas">
<option value="Las Maravillas">
<option value="Las Margaritas Norte">
<option value="Las Margaritas Sur">
<option value="Las Palmas">
<option value="Las Palomas">
<option value="Las Praderas 2">
<option value="Las Presitas del Consuelo">
<option value="Las Presitas I">
<option value="Las Presitas II">
<option value="Las Quintas">
<option value="Las Quintas II">
<option value="Las Rosas">
<option value="Las Tiritas I">
<option value="Las Tiritas II">
<option value="Las Toronjas">
<option value="Las Torres">
<option value="Las Torres de Santa Rosa">
<option value="Las Trojes">
<option value="Las Villas">
<option value="Latinoamericana">
<option value="Laureles de La Selva">
<option value="Laureles Vallarta">
<option value="Le&oacute;n I">
<option value="Le&oacute;n I">
<option value="Le&oacute;n II">
<option value="Le&oacute;n Moderno">
<option value="Libertad">
<option value="Linares">
<option value="Lindavista">
<option value="Loma Bonita">
<option value="Loma de los Sauces">
<option value="Loma Griega">
<option value="Loma Hermosa">
<option value="Loma Real">
<option value="Loma Verde">
<option value="Lomas de Arbide">
<option value="Lomas de Echeveste">
<option value="Lomas de Gran Jard&iacute;n">
<option value="Lomas de Guadalupe">
<option value="Lomas de Jerez">
<option value="Lomas de La Paz">
<option value="Lomas de La Piscina">
<option value="Lomas de La Presa">
<option value="Lomas de La Providencia">
<option value="Lomas de La Trinidad">
<option value="Lomas de las Hilamas">
<option value="Lomas de las Presitas">
<option value="Lomas de los Castillos">
<option value="Lomas de los Naranjos">
<option value="Lomas de los Olivos">
<option value="Lomas de los Sauces">
<option value="Lomas de Medina">
<option value="Lomas de San Jos&eacute;">
<option value="Lomas del Campestre">
<option value="Lomas del Condado">
<option value="Lomas del Ed&eacute;n">
<option value="Lomas del Mirador">
<option value="Lomas del Pedregal">
<option value="Lomas del Refugio">
<option value="Lomas del Sol">
<option value="Lomas del Valle">
<option value="Lomas Vista Hermosa Sur">
<option value="Los &aacute;ngeles">
<option value="Los &aacute;ngeles II">
<option value="Los Abedules">
<option value="Los Aguacates">
<option value="Los Alisos">
<option value="Los Arcos">
<option value="Los Arrayanes">
<option value="Los Carcamos">
<option value="Los Castillos">
<option value="Los Cedros">
<option value="Los Cipreses">
<option value="Los Colorines">
<option value="Los Fresnos">
<option value="Los Gavilanes">
<option value="Los Jacales">
<option value="Los L&oacute;pez">
<option value="Los Laureles">
<option value="Los Limones">
<option value="Los Murales II">
<option value="Los Naranjos">
<option value="Los Olivos">
<option value="Los Para&iacute;sos">
<option value="Los Pinitos">
<option value="Los Pinos">
<option value="Los Pirules">
<option value="Los Portones">
<option value="Los Ramirez">
<option value="Los Sauces">
<option value="Los Sauces del Moral">
<option value="Los Tepetates">
<option value="Lourdes">
<option value="Loza de los Padres">
<option value="Lucio Blanco">
<option value="Luz Mar&iacute;a Diaz Infante">
<option value="Magisterial">
<option value="Maguro AC">
<option value="Malagana">
<option value="Manantiales">
<option value="Mar&iacute;a de La Luz">
<option value="Mar&iacute;a de La Luz">
<option value="Mar&iacute;a Dolores">
<option value="Maravillas II">
<option value="Maravillas III">
<option value="Marfil">
<option value="Medina">
<option value="Mega Price">
<option value="Mezquital 2000">
<option value="Mezquital de Jerez">
<option value="Mezquital del Carmen">
<option value="Michoac&aacute;n">
<option value="Miguel de Cervantes Saavedra">
<option value="Miguel Hidalgo">
<option value="Mirador de Arbide">
<option value="Misi&oacute;n de La Florida">
<option value="Misi&oacute;n de La Joya">
<option value="Misi&oacute;n de La Luz">
<option value="Misi&oacute;n de La Presa">
<option value="Misi&oacute;n de San Jos&eacute;">
<option value="Misi&oacute;n de San Jos&eacute; 2a Secc">
<option value="Misi&oacute;n del Norte">
<option value="Misi&oacute;n La Ca&ntilde;ada">
<option value="Misi&oacute;n Santa Fe">
<option value="Moderna">
<option value="Monta&ntilde;a del Sol de La Joya">
<option value="Monte de Cristo">
<option value="Montebello">
<option value="Montebello">
<option value="Morelos">
<option value="Morelos (el Guaje)">
<option value="Murales">
<option value="Natura">
<option value="Negrete">
<option value="Noria de Septien">
<option value="Norte Echeveste">
<option value="Norte los Castillos">
<option value="Norte San Antonio del Alambrado">
<option value="Norte Santa Mar&iacute;a de Cementos">
<option value="Nortefa">
<option value="Nueva Candelaria">
<option value="Nueva Santa Rosa de Lima">
<option value="Nuevo Amanecer">
<option value="Nuevo Le&oacute;n">
<option value="Nuevo Lindero">
<option value="Nuevo Milenio">
<option value="Nuevo Valle de Moreno">
<option value="Oasis">
<option value="Obreg&oacute;n">
<option value="Obrera">
<option value="Observatorio">
<option value="Oriental">
<option value="Oriental Anaya">
<option value="Oriente Monte de Cristo">
<option value="Oriente Villas Santa Julia">
<option value="P&iacute;a Monte">
<option value="Palenque de Ibarrilla">
<option value="Palmas 2000">
<option value="Palomares">
<option value="Panorama">
<option value="Para&iacute;so Real">
<option value="Parque Ecol&oacute;gico Industrial Santa Lucia">
<option value="Parque La Noria">
<option value="Parque Manzanares">
<option value="Parques del Sur">
<option value="Paseos de Country 3">
<option value="Paseos de La Castellana">
<option value="Paseos de la Cima">
<option value="Paseos de La Cima Plus">
<option value="Paseos de La Joya">
<option value="Paseos de Las Torres">
<option value="Paseos de Miravalle">
<option value="Paseos del Bosque">
<option value="Paseos del Country">
<option value="Paseos del Maurel">
<option value="Paseos del Molino">
<option value="Paso del R&iacute;o de los Castillo">
<option value="Pe&ntilde;a Alta">
<option value="Pe&ntilde;itas">
<option value="Pedregal de Jerez">
<option value="Pedregal de Sat&eacute;lite">
<option value="Pedregal del Campestre">
<option value="Pedregal del Carmen">
<option value="Pedregal del Carmen 2a Secci&oacute;n">
<option value="Pedregal del Gigante">
<option value="Pedregales de Echeveste">
<option value="Periodistas Mexicanos (j L&oacute;pez)">
<option value="Piletas I">
<option value="Piletas II">
<option value="Piletas III">
<option value="Piletas IV">
<option value="Plan de Ayala O Santa Rosa">
<option value="Plan Guanajuato">
<option value="Plaza de Toros I">
<option value="Plaza de Toros II">
<option value="Plaza de Toros III">
<option value="Plaza Hidalgo">
<option value="Plaza Mayor">
<option value="Poblado de Ibarrilla">
<option value="Pol&iacute;gono Industrial Milenio">
<option value="Popular Anaya">
<option value="Popular Guadalajara">
<option value="Popular La Luz">
<option value="Popular Maya">
<option value="Popular Polanco">
<option value="Porta Fontana">
<option value="Portales de La Arboleda">
<option value="Portales de San Sebasti&aacute;n">
<option value="Portales de Santa Julia">
<option value="Portones de San Pedrito">
<option value="Portones del Campestre">
<option value="Portones del Carmen">
<option value="Portones del Moral">
<option value="Praderas de Agua Azul">
<option value="Praderas de Santa Rosa">
<option value="Praderas del Bosque">
<option value="Praderas del Sol">
<option value="Praderas del Sur">
<option value="Prado Hermoso">
<option value="Prado Hermoso 2">
<option value="Prados Verdes">
<option value="Presidentes de M&eacute;xico">
<option value="Privada del Moral">
<option value="Privada Echeveste">
<option value="Privada La Viga">
<option value="Privada Real de Camelinas">
<option value="Privada Rinconada de las Flores">
<option value="Providencia">
<option value="Providencia 1">
<option value="Pueblo Nuevo">
<option value="Puerta de San Germ&aacute;n">
<option value="Puerta de San Rafael">
<option value="Puerta del Cerro">
<option value="Puertas de La Alborada">
<option value="Punta Campestre">
<option value="Punto Verde">
<option value="Pur&iacute;sima de Jerez">
<option value="Pur&iacute;sima de Mu&ntilde;oz">
<option value="Quinta los Castillos">
<option value="Quintas San Lorenzo">
<option value="R&iacute;o Escondido">
<option value="R&iacute;o Mayo">
<option value="Ramillete">
<option value="Rancho La Florida">
<option value="Rancho Nuevo de La Luz">
<option value="Real 2000">
<option value="Real Campestre">
<option value="Real de Bugambilias">
<option value="Real de Jerez">
<option value="Real de La Joya">
<option value="Real de Las Palmas">
<option value="Real de Le&oacute;n">
<option value="Real de los Naranjos">
<option value="Real de San Jos&eacute;">
<option value="Real del Bosque">
<option value="Real del Bosque II">
<option value="Real del Castillo">
<option value="Real Delta I y II">
<option value="Real Providencia">
<option value="Real Providencia II">
<option value="Refugio de San Jos&eacute;">
<option value="Residencial Ca&ntilde;ada del Refugio">
<option value="Residencial del Parque">
<option value="Residencial El Carmen">
<option value="Residencial El Moral I">
<option value="Residencial El Moral II">
<option value="Residencial San Carlos">
<option value="Residencial San Isidro">
<option value="Residencial San Jos&eacute;">
<option value="Residencial Verandas">
<option value="Residencial Victoria">
<option value="Revoluci&oacute;n">
<option value="Ricardo Flores Mag&oacute;n">
<option value="Rinc&oacute;n de Bugambilias">
<option value="Rinc&oacute;n de La Florida">
<option value="Rinc&oacute;n de los Olivos">
<option value="Rinc&oacute;n del Campestre">
<option value="Rinconada de Echeveste">
<option value="Rinconada de San Pedro">
<option value="Rinconada del Bosque">
<option value="Rinconada del Sur">
<option value="Rivera de La Joya">
<option value="Rivera de La Presa">
<option value="Rivera de La Presa Country">
<option value="Rivera de los Castillo">
<option value="Rivera de San Bernardo">
<option value="Rivera del R&iacute;o">
<option value="Rizos del Saucillo I">
<option value="Rizos del Saucillo II">
<option value="Rustico Norte&ntilde;a">
<option value="Rustico San Pedro">
<option value="San &aacute;ngel Campestre">
<option value="San Agustin">
<option value="San Antonio">
<option value="San Antonio del Alambrado">
<option value="San Benigno">
<option value="San Carlos">
<option value="San Carlos La Rocha">
<option value="San Crisp&iacute;n">
<option value="San Crist&oacute;bal">
<option value="San Felipe de Jes&uacute;s">
<option value="San Francisco">
<option value="San Francisco">
<option value="San Ignacio">
<option value="San Isidro">
<option value="San Isidro">
<option value="San Isidro de Jerez">
<option value="San Isidro de Jerez II">
<option value="San Isidro de Jerez III">
<option value="San Isidro de las Colonias">
<option value="San Isidro de los Sauces">
<option value="San Isidro Labrador">
<option value="San Javier">
<option value="San Jer&oacute;nimo I">
<option value="San Jer&oacute;nimo II">
<option value="San Jorge">
<option value="San Jos&eacute; de Cementos">
<option value="San Jos&eacute; de Duran">
<option value="San Jos&eacute; de La Concepci&oacute;n">
<option value="San Jos&eacute; de los Sapos">
<option value="San Jos&eacute; de los Tanques">
<option value="San Jos&eacute; de Otates">
<option value="San Jos&eacute; del Alto">
<option value="San Jos&eacute; del Clavel">
<option value="San Jos&eacute; del Consuelo">
<option value="San Jos&eacute; del Consuelo II">
<option value="San Jos&eacute; del Potrero">
<option value="San Jos&eacute; El Alto">
<option value="San Jos&eacute; Obrero">
<option value="San Juan Bautista">
<option value="San Juan de Abajo">
<option value="San Juan de Dios">
<option value="San Juan de Otates">
<option value="San Judas">
<option value="San Luis">
<option value="San Manuel">
<option value="San Marcos">
<option value="San Mart&iacute;n de Porres">
<option value="San Miguel">
<option value="San Miguel de Rentar&iacute;a">
<option value="San Miguel Infonavit">
<option value="San Miguel Rustico">
<option value="San Nicol&aacute;s">
<option value="San Nicol&aacute;s de los Gonz&aacute;lez">
<option value="San Nicol&aacute;s del Palote">
<option value="San Nicol&aacute;s del Palote II">
<option value="San Pablo">
<option value="San Pedro de los Hernandez">
<option value="San Pedro de los Hernandez">
<option value="San Pedro del Monte">
<option value="San Pedro Plus">
<option value="San Rafael">
<option value="San Rafael">
<option value="San Sebasti&aacute;n">
<option value="San Sebasti&aacute;n">
<option value="Sangre de Cristo">
<option value="Santa Ana AC">
<option value="Santa Ana del Conde">
<option value="Santa Catalina">
<option value="Santa Cecilia">
<option value="Santa Cecilia II">
<option value="Santa Clara">
<option value="Santa Cruz">
<option value="Santa Fe">
<option value="Santa Gertrudis">
<option value="Santa Lucia">
<option value="Santa Mar&iacute;a de Cementos">
<option value="Santa Mar&iacute;a del Granjeno">
<option value="Santa Rita">
<option value="Santa Rita de los Naranjos">
<option value="Santa Rosa de Lima">
<option value="Santiago">
<option value="Santo Domingo">
<option value="Saucillo de La Joya">
<option value="Se&ntilde;ora Frausto">
<option value="Sinarquista">
<option value="Solidaridad Leonesa (pedregal)">
<option value="Sur Cementos">
<option value="Sur de los L&oacute;pez">
<option value="Sur El Granjeno">
<option value="Sur Industrial Delta">
<option value="Sur La More&ntilde;a">
<option value="Sur Loma Hermosa">
<option value="Sur los Naranjos">
<option value="Tablas de La Virgen">
<option value="Tajo de Santa Ana">
<option value="Tepeyac">
<option value="Terracota">
<option value="Torre Cumbres">
<option value="Torre Molinos">
<option value="Torres del Country">
<option value="Torres del Lago">
<option value="Torres Metr&oacute;poli">
<option value="Trinidad">
<option value="Uni&oacute;n Comunitaria de Le&oacute;n">
<option value="Uni&oacute;n Comunitaria los Laureles">
<option value="Uni&oacute;n Obrera">
<option value="Unidad Deportiva">
<option value="Unidad Deportiva II">
<option value="Unidad Obrera Infonavit">
<option value="Unidad y Esfuerzo Popular">
<option value="Universidad Torres E Insurgentes">
<option value="Valle de Alborada">
<option value="Valle de Aranzazu">
<option value="Valle de Arbide">
<option value="Valle de Jerez">
<option value="Valle de Jerez II">
<option value="Valle de Jerez III">
<option value="Valle de La Hacienda">
<option value="Valle de La Luz">
<option value="Valle de las Haciendas">
<option value="Valle de las Joyas">
<option value="Valle de las Torres">
<option value="Valle de Le&oacute;n">
<option value="Valle de los Castillos">
<option value="Valle de los Naranjos">
<option value="Valle de Los Pinos">
<option value="Valle de San Bernardo">
<option value="Valle de San Carlos">
<option value="Valle de San Fernando">
<option value="Valle de San Isidro">
<option value="Valle de San Jos&eacute;">
<option value="Valle de San Nicol&aacute;s">
<option value="Valle de San Pedro">
<option value="Valle de San Pedro">
<option value="Valle de Se&ntilde;ora">
<option value="Valle de Se&ntilde;ora II">
<option value="Valle del Campestre">
<option value="Valle del Consuelo">
<option value="Valle del Maguey">
<option value="Valle del Moral">
<option value="Valle del Real">
<option value="Valle del Roc&iacute;o">
<option value="Valle del Sol">
<option value="Valle del Sur">
<option value="Valle Delta">
<option value="Valle deSan Javier">
<option value="Valle Dorado">
<option value="Valle Hermoso I">
<option value="Valle Hermoso II">
<option value="Valle Hermoso III">
<option value="Valle Hermoso IV">
<option value="Valle Hermoso V">
<option value="Valle Imperial">
<option value="Valle Palermo">
<option value="Valtierra">
<option value="Vaquer&iacute;as">
<option value="Versalles">
<option value="Villa Antigua">
<option value="Villa Contempor&aacute;nea">
<option value="Villa de La Rosa">
<option value="Villa de las Flores">
<option value="Villa de las Torres">
<option value="Villa del Palmar">
<option value="Villa Insurgentes">
<option value="Villa Magna">
<option value="Villa Residencial Arbide">
<option value="Villa Verde">
<option value="Villanueva">
<option value="Villas Bugambilias">
<option value="Villas de Echeveste">
<option value="Villas de La Joya">
<option value="Villas de La Presa">
<option value="Villas de Le&oacute;n">
<option value="Villas de San Isidro">
<option value="Villas de San Juan">
<option value="Villas de San Nicol&aacute;s">
<option value="Villas del Campestre">
<option value="Villas del Carmen">
<option value="Villas del Juncal">
<option value="Villas del Moral">
<option value="Villas del Rosario">
<option value="Villas del Valle">
<option value="Villas Mariana">
<option value="Villas Pradera">
<option value="Villas Santa Julia">
<option value="Villas Santa Julia Secci&oacute;n II">
<option value="Villas Santa Teresita">
<option value="Villas Vasco de Quiroga">
<option value="Vista Hermosa (san Juan Bosco)">
<option value="Vivar">
<option value="Xoconoxtle"></datalist></td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0">Descripci&oacute;n</td>
            <td bgcolor="#F9F9F9"><textarea onchange="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=descripcion&valor='+form4.descripcion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" onkeyup="javascript:form4.car.value=140-form4.descripcion.value.length ;AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=descripcion&valor='+form4.descripcion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="descripcion" id="descripcion" cols="50" rows="3"><?php echo $db_descripcion; ?></textarea>
            <br />
            Caracteres restantes 
            <input style="background-color:#F9F9F9; border:none;" type="text" value="<?php echo 140-strlen($db_descripcion); ?>" name="car" id="car" /></td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0">Direcci&oacute;n</td>
            <td bgcolor="#F9F9F9"><textarea onchange="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=direccion&amp;valor='+form4.direccion.value+'&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&amp;campo=direccion&amp;valor='+form4.direccion.value+'&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="direccion" id="direccion" cols="50" rows="3"><?php echo $db_direccion; ?></textarea></td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0">Precio</td>
            <td bgcolor="#F9F9F9">$
              <input name="precio" onchange="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=precio&valor='+form4.precio.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" type="text" id="precio" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=precio&valor='+form4.precio.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_precio; ?>" /></td>
          </tr>
        </table>

<?php if($db_tipoInmueble!=8){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0"> Antiguedad</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_antiguedad ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=antiguedad&valor='+form4.antiguedad.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="antiguedad" type="number" id="antiguedad" min="0" max="900" />
          a&ntilde;os</td>
        </tr>
      </table>
    </div> <?php } ?>
    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Terreno</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_terreno; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=terreno&valor='+form4.terreno.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="terreno" type="number" id="terreno" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div>
<?php if($db_tipoInmueble!=8&&$db_tipoInmueble!=3&&$db_tipoInmueble!=7){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Construcci&oacute;n</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_construccion; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=construccion&valor='+form4.construccion.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="construccion" type="number" id="construccion" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8&&$db_tipoInmueble!=1&&$db_tipoInmueble!=3&&$db_tipoInmueble!=6&&$db_tipoInmueble!=7){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">No. de recamaras</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_numeroDeRecamaras; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeRecamaras&valor='+form4.numeroDeRecamaras.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="numeroDeRecamaras" type="number" id="numeroDeRecamaras" max="999" min="0" /></td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8&&$db_tipoInmueble!=3&&$db_tipoInmueble!=4){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">N&uacute;mero de niveles</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_numeroDeNiveles; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeNiveles&valor='+form4.numeroDeNiveles.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="numeroDeNiveles" type="number" id="numeroDeNiveles" max="999" min="0" /></td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8&&$db_tipoInmueble!=1&&$db_tipoInmueble!=3){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">&Aacute;rea de jard&iacute;n</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_areaDeJardin; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=areaDeJardin&valor='+form4.areaDeJardin.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="areaDeJardin" type="number" id="areaDeJardin" min="0" max="99999999" />m<sup>2</sup></td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Cochera sin techar</td>
          <td bgcolor="#F9F9F9"><input value="<?php echo $db_cocheraSinTecho; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraSinTecho&valor='+form4.cocheraSinTecho.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="cocheraSinTecho" type="number" id="cocheraSinTecho" max="999" min="0" />autos</td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">N&uacute;mero de ba&ntilde;os</td>
          <td bgcolor="#F9F9F9"><input name="numeroDeBanos" type="text" id="numeroDeBanos" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=numeroDeBanos&valor='+form4.numeroDeBanos.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" value="<?php echo $db_numeroDeBanos; ?>" size="3" max="999" min="0" /></td>
        </tr>
      </table>
    </div> <?php } ?>
<?php if($db_tipoInmueble!=8){ 
?>    <div class="bloque2">
      <table border="0" cellpadding="8" cellspacing="3">
        <tr>
          <td width="150" bgcolor="#F0F0F0">Cochera techada</td>
          <td bgcolor="#F9F9F9"><input  value="<?php echo $db_cocheraTechada; ?>" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=12&campo=cocheraTechada&valor='+form4.cocheraTechada.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','guardar');" name="cocheraTechada" type="number" id="cocheraTechada" max="999" min="0" />autos</td>
        </tr>
      </table>
</div> <?php } ?>
</form>
<form id="form3" name="form3" method="post" action="">
        <table border="0" cellpadding="8" cellspacing="3">
          <tr>
            <td width="150" bgcolor="#F0F0F0"> Detalles adicionales</td>
            <td bgcolor="#F9F9F9"><textarea name="detalles" id="detalles" cols="60" rows="6"><?php echo $db_detalles ?></textarea></td>
          </tr>
        </table>
</form>
<p align="right"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&campo=detalles&valor='+form3.detalles.value+'&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>

<?php
	break;
	case 3:

?>
<iframe src="/publico/subir.php?id=<?php echo $_GET["id_Inmueble"]; ?>" frameborder="0" marginheight="0" marginwidth="" scrolling="auto" width="90%" height="300px" ></iframe>

<p align="right"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');" class="boton">Siguiente</a></p>

  <?php
	break;
	case 12:
	//se guarda solamente el campo enviado
	break;
	case 4: //Subir fotos del inmueble
?>
  <br />
<div align="center">Da clic sobre la fotograf&iacute;a que desees que sea la principal</div>

<h1><?php 
		switch($db_tipoInmueble)
		{
			case 1:
			echo "Bodega";
			break;
			case 2:
			echo "Casa";
			break;
			case 3:
			echo "Cuarto";
			break;
			case 4:
			echo "Departamento";
			break;
			case 5:
			echo "Edificio";
			break;
			case 6:
			echo "Locale";
			break;
			case 7:
			echo "Oficina";
			break;
			case 8:
			echo "Terreno";
			break;
			case 9:
			echo "Rancho o granja";
			break;
			default:
			echo "cualquier tipo de inmueble";
		}
		if($_GET[operacionInmueble]!="")
		{
			?> en <?php 
			echo $db_operacionInmueble;
			switch($db_operacionInmueble)
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
		?> en la ciudad de <?php echo $db_ciudad; ?></h1>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td width="355" valign="top" bgcolor="#F0F0F0"><div align="center"><img src="/publico/<?php echo $db_fotoURL; ?>" width="350" /></div></td>
    <td valign="top"><p><?php echo $db_titulo; ?> - <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a>
      </p>
    <p><?php echo $db_descripcion; ?></p>
    <p>$<?php echo $db_precio; ?></p>
    </td>
  </tr>
</table>
<div align="right">
<a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=3&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></div>
<?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
while (false !== ($archivo = readdir($directorio))) {

	$validador=explode("___",$archivo);
	if($validador[0]==$_GET["id_Inmueble"]&&$archivo!=$db_fotoURL)
	{
		$archivoParte=explode(".",$archivo);
	?>
<div class="bloque" style="height:120px;">		
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&campo=fotoURL&valor=<?php 
	echo $archivo; ?>&id_Inmueble=<?php 
	echo $_GET["id_Inmueble"]; ?>','contenido');"><img src="/publico/?a=<?php  
	echo $archivoParte["0"];
	?>&s=<?php echo $archivoParte["0"]; ?>&ancho=300" height="100px" hspace="5px" vspace="5px" border="0" /></a></div>
	<?php
	}
}
closedir($directorio); 
?>

<div align="right"> <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=2&amp;id_Inmueble=<?php echo $_GET["id_Inmueble"]; ?>','contenido');">editar</a></div>
<?php 

if($db_antiguedad!="") { ?>
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
<p><?php echo $db_detalles ?></p>
<p align="right"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?'+urlGlobal,'contenido');" class="boton">Guardar Inmueble</a></p>

  <?php
	break;
}
}
?>
<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
$contRegistros=-1;

foreach($_GET as $nombre_campo => $valor){ 
	$contRegistros++;
	if(!empty($_GET["status"])&&$nombre_campo!="status"&&$nombre_campo!="ayt")
	{
		$sql="UPDATE  `Inmueble` SET  `status` =  '".$_GET["status"]."' WHERE  `Inmueble`.`id` =".$nombre_campo;
		$rs= mysqli_query($db,$sql);
	}
}

?>
<div id="barraCongelad" style="height:40px;">
<a class="boton" href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?status=3&'+urlGlobal,'contenido');limpiarUrlGlobal();">
	<img src="img/borrar.png" width="14" height="15" /> Borrar</a>
<a class="boton" href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?status=2&'+urlGlobal,'contenido');limpiarUrlGlobal();">
	<img src="img/rojoSemaforo.png" width="15" height="15" /> Suspender</a>
<a class="boton" href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?status=0&'+urlGlobal,'contenido');limpiarUrlGlobal();">
	<img src="img/amarilloSemaforo.png" width="15" height="15" /> Interno</a>
<a class="boton" href="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?status=1&'+urlGlobal,'contenido');limpiarUrlGlobal();">
	<img src="img/verdeSemaforo.png" width="15" height="15" /> Externo</a>
	

</div><br />

<input name="q" id="q" value="<?php 
if(!empty($_GET['q']))
{
	echo $_GET["q"];	
}
?>" />
<button type="button" onclick="javascript:AS3Wxmlhttp('ctn/inmueble/verInmueble.php?at=1379998981&q='+$('#q').val(),'contenido');">Buscar...</button>

<div class="cuadro2">
<table class="tabla1" width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="15">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <th>Foto</th>
    <th>Tipo</th>
    <th>Operaci&oacute;n</th>
    <th>Colonia</th>
    <th>Descripci&oacute;n</th>
    <th>Estado</th>
  </tr>
<?php 
	$sql="SELECT * FROM `Inmueble` WHERE id_Usuario=".$ASid." AND fotoURL!='' AND status!=3";
	
	if(!empty($_GET['q']))
	{
		$sql.=" AND (descripcion LIKE '%".$_GET['q']."%' OR titulo LIKE '%".$_GET['q']."%') ";
	}
	$sql.=" ORDER BY id ASC";
	
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>
  <tr>
    <td><input name="chck<?php echo $fl["id"] ?>" type="checkbox" onChange="AScheckBox(this)" value="<?php 
	echo $fl["id"];
	?>" <?php
	if(isset($_GET[$fl["id"]])&&$_GET["status"]=="")
	{
		echo 'checked="checked"';
	}

	?> /></td>
    <td><div align="center">
      <p><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&amp;id_Inmueble=<?php 
	echo $fl["id"]; ?>','contenido');"><img src="img/editar.png" alt="" width="14" height="15" border="0" />Editar</a></p>
      <p><a href="ctn/inmueble/ficha.php?as=8&id" target="_blank">Ver ficha</a></p>
    </div>
      <br /></td>
    <td width="100"><div style="width:100px; overflow:hidden;" align="center"><img src="../publico/<?php echo $fl["fotoURL"]; ?>" height="60"  /></div></td>
    <td><div align="center"><b>
      <?php 
		switch($fl['tipoInmueble'])
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
		if($fl['operacionInmueble']!="")
		{
			?>
    </b></div></td>
    <td><div align="center"><b>
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
		}
		?>
    </b></div></td>
    <td><div align="center"><?php echo strtoupper($fl["titulo"]); ?><br /><?php echo $fl["direccion"]; ?></div></td> 
    <td width="250"><div align="left" style="width:250px; height:45px; overflow:hidden;"><?php echo $fl["descripcion"]; ?></div></td>
    <td><div align="center"><?php 
	switch( $fl["status"])
	{
		case 2:
		?><img src="img/rojoSemaforo.png" width="15" height="15" /><?php 
		break;
		case 0:
		?><img src="img/amarilloSemaforo.png" width="15" height="15" /><?php 
		break;
		case 1:
		?><img src="img/verdeSemaforo.png" width="15" height="15" /><?php 
	}
	?></div></td>
  </tr>
<?php
	}
?>
</table>
</div>
<p>Tabla de definiciones</p>
<table class="tabla1" width="100%" border="0" cellspacing="3" cellpadding="5">
  <tr>
    <th scope="row"><img src="img/editar.png" width="14" height="15" /></th>
    <td>Editar</td>
    <td>Herramienta que nos permite editar el inmueble</td>
  </tr>
  <tr>
    <th scope="row"><img src="img/rojoSemaforo.png" width="15" height="15" /></th>
    <td>Suspender</td>
    <td>Nos permite suspender una propiedad temporalmente, no se publicar&aacute;</td>
  </tr>
  <tr>
    <th scope="row"><img src="img/amarilloSemaforo.png" width="15" height="15" /></th>
    <td>Interno</td>
    <td>Nos permite dar de alta propiedades que solo queremos que vean socios.</td>
  </tr>
  <tr>
    <th scope="row"><img src="img/verdeSemaforo.png" alt="" width="15" height="15" /></th>
    <td>Externo</td>
    <td>-Es visible tanto en el sitio Web como en el sitio interno.</td>
  </tr>
</table>
<?php
}
?>
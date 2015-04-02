<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
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

<input name="q" id="q" value="<?php echo $_GET["q"]; ?>" />
<button type="button" onclick="javascript:AS3Wxmlhttp('ctn/inmueble/verTodosInmueble.php?at=1379998981&q='+$('#q').val(),'contenido');">Buscar...</button>

<div class="cuadro2">
<table class="tabla1" width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="20">&nbsp;</td>
    <th>Foto</th>
    <th>Tipo</th>
    <th>Operaci&oacute;n</th>
    <th>Ubicación</th>
    <th>Descripci&oacute;n</th>
    <th>Estado</th>
  </tr>
<?php 
	$sql="SELECT * FROM `Inmueble` WHERE estadoInmobiliaria=0 AND status=1";

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

    <td><div align="center">
      <p><a href="/acontrol/ctn/inmueble/ficha.php?as=8&id=<?php echo $fl['id']; ?>" target="_blank">Para imprimir</a></p>
      <p><a href="http://casasx.com/?as=8&id=<?php echo $fl['id']; ?>" target="_blank">Web</a></p>
    </div>
      <br /></td>
    <td width="100"><div style="width:100px; overflow:hidden;" align="center"><img src="/publico/<?php echo $fl["fotoURL"]; ?>" height="60"  /></div></td>
    <td><div align="center"><b>
      <?php 
		switch($fl[tipoInmueble])
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
		if($fl[operacionInmueble]!="")
		{
			?>
    </b></div></td>
    <td><div align="center"><b>
      <?php 
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
		}
		?>
    </b></div></td>
    <td><div align="center"><?php echo strtoupper($fl["titulo"]); ?><br /><?php echo $fl["direccion"]; ?></div></td>
    <td width="250"><div align="left" style="width:250px; height:45px; overflow:hidden;"><?php echo $fl["descripcion"]; ?></div></td>
    <td><div align="center"><?php 
	switch( $fl["status"])
	{
		case 2:
		?><img src="/acontrol/img/rojoSemaforo.png" width="15" height="15" /><?php 
		break;
		case 0:
		?><img src="/acontrol/img/amarilloSemaforo.png" width="15" height="15" /><?php 
		break;
		case 1:
		?><img src="/acontrol/img/verdeSemaforo.png" width="15" height="15" /><?php 
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
    <th scope="row"><img src="/acontrol/img/editar.png" width="14" height="15" /></th>
    <td>Editar</td>
    <td>Herramienta que nos permite editar el inmueble</td>
  </tr>
  <tr>
    <th scope="row"><img src="/acontrol/img/rojoSemaforo.png" width="15" height="15" /></th>
    <td>Suspender</td>
    <td>Nos permite suspender una propiedad temporalmente, no se publicar&aacute;</td>
  </tr>
  <tr>
    <th scope="row"><img src="/acontrol/img/amarilloSemaforo.png" width="15" height="15" /></th>
    <td>Interno</td>
    <td>Nos permite dar de alta propiedades que solo queremos que vean socios.</td>
  </tr>
  <tr>
    <th scope="row"><img src="/acontrol/img/verdeSemaforo.png" alt="" width="15" height="15" /></th>
    <td>Externo</td>
    <td>Es visible tanto en el sitio Web como en el sitio interno.</td>
  </tr>
</table>
<?php
}
?>

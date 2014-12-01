<link href="../../estilo.css" rel="stylesheet" type="text/css" />
<table class="tabla1" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>&nbsp;</th>
    <th>Colonia</th>
    <th>Descripci&oacute;n</th>
    <th>Estado</th>
  </tr>
<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 


	$sql="SELECT * FROM `Inmueble` WHERE id_Usuario=".$ASid." AND fotoURL=''";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
  <tr>
    <td><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&amp;id_Inmueble=<?php 
	echo $fl["id"]; ?>','contenido');"><img src="/acontrol/img/editar.png" alt="" width="14" height="15" /></a></td>
    <td><?php echo $fl["titulo"]; ?></td>
    <td><?php echo $fl["descripcion"]; ?></td>
    <td>&nbsp;</td>
  </tr>
<?php
	}
?>
</table>
<?php
}
?>
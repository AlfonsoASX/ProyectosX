<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
if($_GET["id"]!="")
{
	$sql="UPDATE  `Inmueble` SET  `status` =  '3' WHERE `id` =".$_GET["id"];
	$rs= mysql_query ($sql,$db);
}

?>
</div>
<table class="tabla1" width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="40">&nbsp;</td>

    <td width="40">&nbsp;</td>
    <th>Tipo</th>
    <th>Operaci&oacute;n</th>
    <th>Colonia</th>
    <th>Descripci&oacute;n</th>
  </tr>
<?php 


	$sql="SELECT * FROM `Inmueble` WHERE id_Usuario=".$ASid." AND fotoURL='' AND status!=3";

	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
  <tr>
    <td><div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaInmueble.php?a=4&amp;id_Inmueble=<?php 
	echo $fl["id"]; ?>','contenido');"><img src="/acontrol/img/editar.png" alt="" width="14" height="15" border="0" /></a></div></td>

    <td><div align="center"><a href="javascript:AS3Wxmlhttp('ctn/inmueble/verBorradores2.php?id=<?php 
	echo $fl["id"]; ?>','contenido');"><img src="/acontrol/img/borrar.png" alt="" width="14" height="15" border="0" /></a></div></td>
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
    <td><div align="center"><?php echo $fl["titulo"]; ?></div></td>
    <td width="250"><div align="left" style="width:250px; height:45px; overflow:hidden;"><?php echo $fl["descripcion"]; ?></div></td>
  </tr>
<?php
	}
?>
</table>


<p>
  <?php
}
?>
</p>

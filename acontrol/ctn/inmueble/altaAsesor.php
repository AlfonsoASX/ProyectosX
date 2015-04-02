<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

$nombre='';
$datos='';

if(empty($_GET["id"])) //si no hay id, entonces se da de alta un nuevo asesor
{
	$sql="INSERT INTO `ganas001_maspro`.`Asesor` VALUES ('',  '".$ASid."',  '',  '',  '');";
	mysqli_query($db,$sql);
	$id_Asesor=mysqli_insert_id($db);
	$sql="UPDATE Asesor SET foto='Asesor".$id_Asesor.".jpg' WHERE id=".$id_Asesor;
  mysqli_query($db,$sql);
}
else
{
	$sql="SELECT * FROM  `Asesor` WHERE id_Usuario='".$ASid."' AND id=".$_GET["id"];
	$rs= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
		$id_Asesor=$fl["id"];
		$nombre=$fl["nombre"];
		$datos=$fl["datos"];
	}
}
?>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>

<p>Dar de alta asesor</p>
<form action="ctn/inmueble/subirFotoAsesor.php?id=<?php echo $id_Asesor; ?>" method="post"  enctype="multipart/form-data" name="form2" target="subirFotoAsesor" id="form2">
  Agregar fotograf&iacute;a:<br />
<input type="file" name="foto" id="foto" onchange="javascrip:document.form2.submit()" /></form>
<iframe name="subirFotoAsesor" width="500px" height="20px" scrolling="no" frameborder="0"></iframe>
<p></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><div id="formAsesor">
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <p> Nombre:<br />
            <input name="Nombre" type="text" id="Nombre" onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/updateAsesor.php?id_Asesor=<?php echo $id_Asesor; ?>&amp;nombre='+document.form1.Nombre.value+'&amp;datos='+document.form1.datos.value,'credencial');" value="<?php echo $nombre; ?>" size="25" />
        </p>
        <p> Datos:<br />
            <textarea onkeyup="javascript:AS3Wxmlhttp('ctn/inmueble/updateAsesor.php?id_Asesor=<?php echo $id_Asesor; ?>&amp;nombre='+document.form1.Nombre.value+'&amp;datos='+document.form1.datos.value,'credencial');" name="datos" id="datos" cols="22" rows="2"><?php echo $datos; ?></textarea>
            <br />
            <span class="Estilo1">Para agregar un renglon en la tarjeta,<br />
            use dos guiones (--)</span></p>
        <p>
          <input onclick="javascript:AS3Wxmlhttp('ctn/inmueble/updateAsesor.php?id_Asesor=<?php echo $id_Asesor; ?>&amp;nombre='+document.form1.Nombre.value+'&amp;datos='+document.form1.datos.value,'credencial');" type="button" name="button" id="button" value="Guardar" />
        </p>
      </form>
    </div></td>
    <td valign="top"><div id="credencial"></div></td>
  </tr>
</table>

<?php
}
?>

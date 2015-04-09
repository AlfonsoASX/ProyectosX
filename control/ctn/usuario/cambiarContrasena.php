<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["contrasena"]!="")
{
	$sqlselect="SELECT * FROM `Usuario` WHERE id ='".$ASid."' LIMIT 0,1";
	$result= mysqli_query ($db,$sqlselect);
	while($fl=mysqli_fetch_array($result))
	{
		if ($_GET["contrasenaActual"]==$fl["contrasena"])
		{
			$sqlUpdate="UPDATE `Usuario` SET `contrasena` = '".$_GET["contrasena"]."' WHERE `id` =".$ASid;
			mysqli_query ($db,$sqlUpdate);

			echo "Contrase&ntilde;a modificada con &eacute;xito";
		}
		else
		{
			echo "ERROR: Contrase&ntilde;a actual no valida";
		}
	}
}
?>
<form id="form1" name="form1" method="post" action="">
  <h2>Cambiar mi contraseña
  </h2>
  <table border="0" cellspacing="2" cellpadding="5">
    <tr>
      <td bgcolor="#F0F0F0">Contraseña actual</td>
      <td bgcolor="#EBF0F5"><input type="password" name="contrasenaActual" id="contrasenaActual" /></td>
    </tr>
    <tr>
      <td bgcolor="#F0F0F0">Nueva contraseña</td>
      <td bgcolor="#EBF0F5"><input type="password" name="contrasena" id="contrasena" /></td>
    </tr>
    <tr>
      <td bgcolor="#F0F0F0">Repetir nueva contraseña</td>
      <td bgcolor="#EBF0F5"><input type="password" name="RepetirContrasena" id="RepetirContrasena" /></td>
    </tr>
    <tr>
      <td bgcolor="#F0F0F0">&nbsp;</td>
      <td bgcolor="#EBF0F5"><input onclick="javascript:if(form1.contrasena.value==form1.RepetirContrasena.value&&form1.contrasena.value!='') AS3Wxmlhttp('ctn/usuario/cambiarContrasena.php?contrasenaActual='+form1.contrasenaActual.value+'&contrasena='+form1.contrasena.value,'contenido'); else alert('ERROR: Verifique la nueva contraseña');" type="button" name="button" id="button" value="Actualizar" /></td>
    </tr>
  </table>
</form>
<?php
}
?>
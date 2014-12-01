<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql="DELETE FROM Asesor WHERE id=".$_GET["id"];
	$rs= mysql_query ($sql,$db);
}
?>
<style type="text/css">
<!--
.Estilo2 {
	font-size: 12px;
	color: #BD2A1A;
}
.Estilo3 {font-size: 14px}
.Estilo4 {color: #FFFFFF}
-->
</style>
<table border="0" cellpadding="3" cellspacing="3" bgcolor="#FBFBFB">
  <?php
	$sql="SELECT * FROM  `Usuario` WHERE id='".$ASid."'";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo4"><a href="/acontrol/?as=config">Editar</a></span></div></td>
    <td><table width="478" border="0" cellpadding="0" cellspacing="0" background="/acontrol/img/tarjeta.jpg">
      <tr>
        <td width="137" height="274" rowspan="2">&nbsp;</td>
        <td width="341" height="114" valign="top">&nbsp;<img src="/publico/Usuario<?php echo $fl["id"]; ?>aa.jpg" alt="" height="100px" /><br /></td>
      </tr>
      <tr>
        <td height="160" valign="top"><b><?php echo $fl["apellidos"]; ?></b> <br />
              <span class="Estilo2">Administrador</span>
              <p class="Estilo3"><?php echo str_replace("--","<br>",$fl["datos"]); ?></p></td>
      </tr>
    </table></td>
  </tr>
  <?php
	}
?>
</table>
<p>&nbsp;</p>
<table border="0" cellpadding="3" cellspacing="3" bgcolor="#FBFBFB">
  <tr>
    <th bgcolor="#EBEBEB" scope="col">Herramientas</th>
    <th bgcolor="#EBEBEB" scope="col">Asesor</th>
  </tr>
<?php
	$sql="SELECT * FROM  `Asesor` WHERE id_Usuario='".$ASid."' AND nombre!=''";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
?>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo4"><a href="javascript:if (confirm('Se eliminar&aacute; al asesor'))AS3Wxmlhttp('ctn/inmueble/verAsesor.php?id=<?php echo $fl["id"]; ?>','contenido');">Borrar</a><br />
    <a href="javascript:AS3Wxmlhttp('ctn/inmueble/altaAsesor.php?id=<?php echo $fl["id"]; ?>','contenido');">Editar</a></span></div></td>
    <td><table width="478" border="0" cellpadding="0" cellspacing="0" background="/acontrol/img/tarjeta.jpg">
  <tr>
    <td width="137" height="274" rowspan="2">&nbsp;</td>
    <td width="341" height="114" valign="top">&nbsp;<img src="/publico/Asesor<?php echo $fl["id"]; ?>.jpg" height="100px" /><br /></td>
  </tr>
  <tr>
    <td height="160" valign="top"><b><?php echo $fl["nombre"]; ?></b>
      <br />
      <span class="Estilo2">Asesor Inmobiliario</span>
    <p class="Estilo3"><?php echo str_replace("--","<br>",$fl["datos"]); ?></p></td>
  </tr>
</table></td>
  </tr>
<?php
	}
?>
</table>


<?php
}
?>

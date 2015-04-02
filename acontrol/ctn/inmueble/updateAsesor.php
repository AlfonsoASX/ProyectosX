<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
$sql="UPDATE  `ganas001_maspro`.`Asesor` SET  
`nombre` =  '".$_GET["nombre"]."', 
`datos`='".$_GET["datos"]."' 
WHERE `Asesor`.`id` =".$_GET["id_Asesor"].";";
mysqli_query($db,$sql);

?>
<style type="text/css">
<!--
.Estilo2 {
	font-size: 12px;
	color: #BD2A1A;
}
.Estilo3 {font-size: 14px}
-->
</style>

<table width="478" border="0" cellpadding="0" cellspacing="0" background="/acontrol/img/tarjeta.jpg">
  <tr>
    <td width="137" height="274" rowspan="2">&nbsp;</td>
    <td width="341" height="114" valign="top">&nbsp;<img src="/publico/Asesor<?php echo $_GET["id_Asesor"]; ?>.jpg" height="100px" /><br /></td>
  </tr>
  <tr>
    <td height="160" valign="top"><b><?php echo $_GET[nombre]; ?></b>
      <br />
      <span class="Estilo2">Asesor Inmobiliario</span>
    <p class="Estilo3"><?php echo str_replace("--","<br>",$_GET[datos]); ?></p></td>
  </tr>
</table>
<?php
}
?>
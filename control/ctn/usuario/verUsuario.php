<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 

if($_GET["id"]!="")
{
	$sql='UPDATE Usuario  SET estado= '.$_GET["estado"].' WHERE id='.$_GET["id"];
	$rs= mysqli_query($db,$sql);
	$sql='UPDATE Inmueble  SET estadoInmobiliaria= '.$_GET["estado"].' WHERE id_Usuario='.$_GET["id"];
	$rs= mysqli_query($db,$sql);
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
<table border="0" cellpadding="3" cellspacing="3" class="tabla1">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Estado</th>
    <th scope="col">Clave</th>
    <th scope="col">Logo</th>
    <th scope="col">Empresa</th>
    <th scope="col">Datos de acceso</th>
    <th scope="col">Inmuebles</th>
  </tr>
<?php
	$sql="SELECT * FROM  `Usuario` WHERE nombres!=''";
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>
  <tr>
    <td><?php 
	if($fl["estado"]==1) 
	{ 
		?><a href="javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php?estado=0&id=<?php echo $fl["id"]; 
		?>','contenido');"><img title="Reactivar" src="/acontrol/img/verdeSemaforo.png" width="14" height="15" /></a><?php
	} 
	else 
	{
		?><a href="javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php?estado=1&id=<?php echo $fl["id"];
		?>','contenido');"><img title="Suspender" src="/acontrol/img/rojoSemaforo.png" width="14" height="15" /></a><?php 
	}
	?></td>
    <td><div align="center"><span class="Estilo4"><a href="javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php?id=<?php echo $fl["id"]; ?>','contenido');"><img src="/acontrol/img/editar.png" alt="" width="14" height="15" /></a></span></div></td>
    <td><?php 
	if($fl["estado"]==1) 
	{ 
		?>
      <img src="/acontrol/img/rojoSemaforo.png" width="14" height="15" /> Suspendido
      <?php
	} 
	else 
	{
		?>
      <img src="/acontrol/img/verdeSemaforo.png" width="14" height="15" /> Activo
    <?php 
	}
	?></td>
    <td><a href="http://maspropiedades.as3w.com/acontrol/ctn/usuario/fichaUsuario.php?id=<?php echo $fl["id"]; ?>" target="_blank">MP-<?php echo $fl["id"]; ?></a></td>
    <td><img width="50px" src="/publico/Usuario<?php echo $fl["id"]; ?>.jpg" />&nbsp;</td>
    <td><?php echo $fl["nombres"]; ?><br />
    <?php echo $fl["apellidos"];
 ?></td>
    <td><?php echo $fl["email"]; ?><br />
      <?php echo $fl["contrasena"]; ?></td>
    <td><div align="center">
      <?php 
	$sql2="SELECT * FROM `Inmueble` WHERE id_Usuario=".$fl["id"]." AND fotoURL!='' AND status!=3";
$contInmuebles=0;
	$rs2= mysqli_query($db,$sql2);
	while($fl2=mysqli_fetch_array($rs2))
	{ 
	    $contInmuebles++;

	}
	echo $contInmuebles;
?>
    </div></td>
  </tr>
<?php
	}
?>
</table>


<?php
}
?>

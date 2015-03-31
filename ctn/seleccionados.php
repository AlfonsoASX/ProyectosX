<?php include("../lib/cfg.php"); 
if($_GET["checked"]=="true")
	$sql="INSERT INTO Marcado VALUE ('','".$_GET[id]."', '".$_COOKIE["ASX_key"]."', NOW())";
else
	$sql="DELETE FROM Marcado WHERE id_Inmueble = ".$_GET["id"]." AND ASX_key = '".$_COOKIE["ASX_key"]."'";

mysql_query ($sql,$db);
if($_GET["borrar"]==1)
{
	$sql="DELETE FROM Marcado WHERE ASX_key = '".$_COOKIE["ASX_key"]."'";
	mysql_query ($sql,$db);
}
?>
<?php
$cont=0;
	$sql="SELECT * FROM `Marcado` WHERE ASX_key='".$_COOKIE["ASX_key"]."' ORDER BY id ASC";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
		$cont++;
	}


if($cont>0)
{
?><div id="inmueblesMarcados"><a href="/?marcados=1&amp;as=3">Inmuebles<br>
Marcados<br>
<?php 
	$sql="SELECT Inmueble.fotoURL, Marcado.id_Inmueble FROM Inmueble, Marcado WHERE Inmueble.id=Marcado.id_Inmueble AND Marcado.ASX_key='".$_COOKIE[ASX_key]."' ORDER BY Marcado.id DESC LIMIT 0,4";
	$rs= mysql_query ($sql,$db);
	while($fl=mysql_fetch_array($rs))
	{
	?>
<img hspace="5px" vspace="5px" src="publico/<?php	echo $fl["fotoURL"]; ?>" width="70px">
  <?php 
	}
if(($cont-4)>0)
	echo '+'.($cont-4);
?></a><br />
<a href="javascript:AS3Wxmlhttp('ctn/seleccionados.php?borrar=1','seleccion');">Borrar marcados</a></div>
<div id="tituloMarcados"><a href="javascript:AS3Wxmlhttp('ctn/seleccionados.php?borrar=1','seleccion');">Borrar marcados</a> - <a href="?buscar=marcados()&amp;as=3">Ver inmuebles marcados </a></div>
<?php 
} ?>
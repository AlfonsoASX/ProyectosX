<?php
$directorio=opendir($_SERVER["DOCUMENT_ROOT"]."/publico"); 
while (false !== ($archivo = readdir($directorio))) {

	$validador=explode("___",$archivo);
	if($validador[0]==$_GET["id"])
	{
	?><img class="galeriaFotos" src="/publico/?a=<?php echo substr($archivo,0,-4); ?>&s=<?php echo substr($archivo,(strlen($archivo)-3),3); ?>&ancho=270" /> <?php
	}
}
closedir($directorio); 

?>
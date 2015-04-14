<?php

require '../lib/cfg.php';


$directorio=opendir($_AS['directorioImg']); 


while (false !== ($archivo = readdir($directorio))) {
	//Por seguridad, solo si es un archivo de este inmueble podrá ser borrado
	if(!empty($_GET["archivo"])&&$_GET["archivo"]==$archivo){
		unlink($_GET["archivo"]);
	}
	else{//Si no está nombrado para ser borrado, se mostrará
		$validador=explode("___",$archivo);
		if($validador[0]==$_GET["id"])
		{

		?>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<div class="archivo">
    <img src="<?php echo $archivo ?>" height="50px" hspace="5px" vspace="5px" border="0" />
	<br />
	<a href="javascript:AS3Wxmlhttp('ver.php?archivo=<?php echo $archivo; ?>&id=<?php echo $_GET["id"] ?>','guardarArchivo');">Borrar archivo</a>
</div>
		<?php
		}
	}
}
closedir($directorio); 
?>
<br />
<a href="javascript:AS3Wxmlhttp('ver.php?id=<?php echo $_GET["id"] ?>','guardarArchivo');">Actualizar</a>
<?php
require 'lib/cfg.php';


$sql="SELECT * FROM `Inmueble` WHERE status=1 limit 0,10";

$rs= mysqli_query ($db,$sql);
$contadorInmuebles=0;

while($fl=mysqli_fetch_array($rs))
{
	$directorio=opendir($_AS['directorioImg']); 
	while (false !== ($archivo = readdir($directorio))) 
	{
			$validador=explode("___",$archivo);
			if($validador[0]==$fl["id"])
			{
				$archivoSeparado=explode(".",$archivo);

			?>
			    <img src="publico/?a=<?php echo $archivoSeparado[0] ?>"   border="0" />
			<?php
			
		}
	}
	closedir($directorio); 
}
?>
hola
<?php
require 'lib/cfg.php';
?><!DOCTYPE html>
<html lang="es-mx">
    <head> 
        <meta charset="utf-8">
        <title> Casas increibles, precios insuperables - CasasX.com </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Descripción de la sección">
        <meta name="author" content="ASX.mx">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    <?php
    $sql="SELECT * FROM `Inmueble` where precio!=0";
$rs= mysqli_query ($db,$sql);
while($fl=mysqli_fetch_array($rs))
{
	if(file_exists("publico/".$fl["fotoURL"]))
	{
        echo $fl["titulo"];
	}
}

?>
    </body>
</html>
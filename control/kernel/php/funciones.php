<?php

function formatoTelefono($numero) 
{
	$numero = str_replace(array(" ", "-"), array(""), $numero);
	$comienzo = strlen($numero);
	$resultado =substr($numero, -10, 3)."-".substr($numero, -7, 3)."-".substr($numero, -4);
	return $resultado;
}

function fechaHora()
{
	return date("Y-m-d h:i:s");
}

function sesionValida($clave,$db)
{
	$sqlselect="SELECT * FROM `Usuario` WHERE sesion ='".$clave."'";

	$result= mysql_query ($sqlselect,$db);
	while($fila=mysql_fetch_array($result))
	{
	   if($fila[sesion]==$clave)
	      return(1);
	}
	return(0);
}


function subirImagen($arch)
{
	if($arch[error]==0)
	{
		$extension = explode(".",strtolower($arch[name])); $num = count($extension)-1;
		if($extension[$num]=="jpg"||$extension[$num]=="gif"||$extension[$num]=="png") 
		{
			if($arch['size'] < 2000000) 
			{
				$nombre="tere-".time()."-".rand(1000,9999).".".$extension[$num];
				$archivo="../img/".$nombre;
				if (move_uploaded_file($arch[tmp_name], $archivo))
				{
				   return $nombre;
				} else return 1; //Ocurrió algún error al subir la imagen. No pudo guardarse
			} else return 2; //"La imagen no fue enviada.El archivo supera los 2Mb"; 
		} else return 3; // "La imagen no fue enviada. El formato de archivo no es valido, solo jpg y gif"; 
	}
}


function nombreMes($mes)
{
	switch($mes)
	{
		case 1:
		return "Enero";
		break;
		
		case 2:
		return "Febrero";
		break;
		
		case 3:
		return "Marzo";
		break;
		
		case 4:
		return "Abril";
		break;
		
		case 5:
		return "Mayo";
		break;
		
		case 6:
		return "Junio";
		break;
		
		case 7:
		return "Julio";
		break;
		
		case 8:
		return "Agosto";
		break;
		
		case 9:
		return "Septiembre";
		break;
		
		case 10:
		return "Octubre";
		break;
		
		case 11:
		return "Noviembre";
		break;

		case 12:
		return "Diciembre";
		break;
	}
}
?>
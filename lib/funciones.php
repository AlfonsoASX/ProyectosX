<?php
function sesionValida($claveSesion,$db)
{
	$sql="SELECT * FROM `usuario` WHERE claveSesion ='".$claveSesion."'";

	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
	   if($fl['claveSesion']==$claveSesion)
	      return true;
	}
	return false;
}

function datoUsuario($claveSesion, $dato, $db)
{
	$sql="SELECT * FROM `usuario` WHERE claveSesion ='".$claveSesion."'";

	$result= mysqli_query ($db,$sql);
	while($fl=mysqli_fetch_array($result))
	{
		if(!empty($fl[$dato]))
		{
			return $fl[$dato];
		}
		else
		{
		    return false;
		}
	}
	return false;
}

function fechaAtras($dias)
{
   $d=date(j);
   $a=date(Y);
   $m=date(n);
   $d-=$dias;
   if($d<1)
   {
      $m--;
	  if($m<1)
	  {
	     $a--;
		 $m=12;
      }
      switch($m)
	  {
		  case 1:
		  case 3:
		  case 5:
		  case 7:
		  case 8:
		  case 10:
		  case 12:
		  $d=31;
		  break;
		  case 2:
		  $d=28;
		  break;
		  case 4:
		  case 6:
		  case 9:
		  case 11:
		  $d=30;
	   }
   }
   if($d<10) $d="0".$d;
   if($m<10) $m="0".$m;
   $fecha=$a."-".$m."-".$d;
   return ($fecha);
}
function fechaHoy()
{
   $d=date(j);
   $a=date(Y);
   $m=date(n);
   if($d<10) $d="0".$d;
   if($m<10) $m="0".$m;
   $fecha=$a."-".$m."-".$d;
   return ($fecha);
}



	function as_subirImagen($arch)
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
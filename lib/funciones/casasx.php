<?php
function armaURLmenu($variable, $valor)
{
	$return='';


	if(!empty($_GET['tipoInmueble']))
	{
		if('inmueble'==$_GET['tipoInmueble'])
		{
			$_GET['tipoInmueble']='';
		}

		$partes['tipoInmueble']=explode('-o-', $_GET['tipoInmueble']);
	}

	if(!empty($_GET['operacionInmueble']))
	{//Se extrae las operaciones del inmueble que se solicitan en el link
		$partes['operacionInmueble']=explode('-o-', $_GET['operacionInmueble']);
	}

	if(!empty($_GET['ciudad']))
	{
		$partes['ciudad']=explode('-o-', $_GET['ciudad']);
	}




	if(!empty($partes[$variable]))
	{
		$elemento=array_search($valor, $partes[$variable]);

		if($elemento!==false)
		{//El valor se encuentra en el vínculo, por tanto, se elimina del mismo
			unset($partes[$variable][$elemento]);
		}
		else
		{//El valor no se encuentra en el array, por tanto se agrega al mismo
			array_push($partes[$variable], $valor);
		}
	}
	else
	{
		$partes[$variable]= array(
			'0'=> $valor);
	}




	$url='';
	$extencion='';
	if(!empty($partes['tipoInmueble']))
	{		
		$url.=implode('-o-',$partes['tipoInmueble']);
		$extencion.='a';
	}
	else
	{
		$url='inmueble';
	}

	if(!empty($partes['operacionInmueble']))
	{
		$url.='-en-';
		$url.=implode('-o-',$partes['operacionInmueble']);
		$extencion.='s';
	}

	if(!empty($partes['ciudad']))
	{
		$url.='-en-la-ciudad-de-';
		$url.=implode('-o-',$partes['ciudad']);
		$extencion.='x';
	}


	if(!empty($extencion))
	{
		$extencion='.'.$extencion;
	}
	return $url.$extencion;
}


function menuActivo($variable, $valor)
{
	$return='';
	if(!empty($_GET[$variable]))
	{
		$partes[$variable]=explode('-o-', $_GET[$variable]);
		if(!empty($partes[$variable]))
		{
			$elemento=array_search($valor, $partes[$variable]);
			if($elemento!==false)
			{//El valor se encuentra en el vínculo
				$return='active';
			}
		}		
	}
	return $return;
}







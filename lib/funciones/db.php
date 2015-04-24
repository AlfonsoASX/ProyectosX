<?php
function armaSQLbuscarInmuebles()
{
	global $_GLOBAL;
	$sql='SELECT 
      Inmueble.id, 
      Inmueble.id_Usuario, 
      Inmueble.status, 
      Inmueble.tipoInmueble, 
      Inmueble.operacionInmueble, 
      Inmueble.titulo, 
      Inmueble.fotoURL,  
      Inmueble.descripcion,  
      Inmueble.detalles,  
      Inmueble.precio,
      Inmueble.ciudad,
      Inmueble.antiguedad,  
      Inmueble.terreno,  
      Inmueble.construccion,  
      Inmueble.areaDeJardin,  
      Inmueble.numeroDeRecamaras,  
      Inmueble.numeroDeNiveles,  
      Inmueble.numeroDeBanos,  
      Inmueble.cocheraSinTecho,  
      Inmueble.cocheraTechada,  
      Usuario.nombreComercial,
      Usuario.contacto,
      Usuario.campo2,
      Usuario.campo3,
      Usuario.campo4,
      Usuario.telefono,
      Usuario.nextel,
      Asesor.nombre nombreAsesor,      
      Asesor.foto fotoAsesor,
      Asesor.datos datosAsesor

      FROM `Inmueble` 

      LEFT JOIN Usuario ON Usuario.id = Inmueble.id_Usuario
      LEFT JOIN Asesor ON Asesor.id = Inmueble.id_Asesor
      WHERE Inmueble.precio!=0 
      AND Inmueble.status!=3 
      AND Inmueble.operacionInmueble!=""
      AND Inmueble.tipoInmueble!=""
      AND Inmueble.fotoURL !=""
      AND Inmueble.estadoInmobiliaria=0
';


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

//-------------

	if(!empty($partes['tipoInmueble']))
	{		
		$sql.=' AND (';
		foreach ($partes['tipoInmueble'] as $key => $value) 
		{
			if(0==$key)
			{
				$sql.='Inmueble.tipoInmueble = '.array_search($value, (array)$_GLOBAL->tipoInmueble);
			}
			else
			{
				$sql.= ' OR Inmueble.tipoInmueble = '.array_search($value, (array)$_GLOBAL->tipoInmueble);
			}
		}
		$sql.=') ';
	}


	if(!empty($partes['operacionInmueble']))
	{
		$sql.=' AND (';
		foreach ($partes['operacionInmueble'] as $key => $value) 
		{
			if(0==$key)
			{
				$sql.='Inmueble.operacionInmueble = '.array_search($value, (array)$_GLOBAL->operacionInmueble);
			}
			else
			{
				$sql.= ' OR Inmueble.operacionInmueble = '.array_search($value, (array)$_GLOBAL->operacionInmueble);
			}
		}
		$sql.=') ';
	}

	if(!empty($partes['ciudad']))
	{
		$sql.=' AND (';
		foreach ($partes['ciudad'] as $key => $value) 
		{
			if(0==$key)
			{
				$sql.='Inmueble.ciudad = "'.$value.'"';
			}
			else
			{
				$sql.= ' OR Inmueble.ciudad = "'.$value.'"';
			}
		}
		$sql.=') ';
	}


	return $sql;

}
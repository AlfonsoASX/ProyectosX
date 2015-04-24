<?php
//session_start();
//Conexion a todo el sistema
if('localhost'==$_SERVER['SERVER_NAME'])
{//Configuración local

  $_AS= array(
    'host'            => 'localhost',
    'user'            => 'root',
    'pass'            => 'root',
    'basedatos'       => 'casasx',
    'dominio'         => 'http://localhost:2110/Proyectos/',
    'urlPublico'      => 'http://localhost:2110/Control.mx/publico/',
    'maximoInmuebles' => 6,
    );
}
else
{//Configuración producción

  $_AS= array(
    'host'            => '174.136.30.159',
    'user'            => 'control_admin',
    'pass'            => '$?]fr*?J7Z]Q',
    'basedatos'       => 'control_mx',
    'dominio'         => 'http://casasx.com/',
    'urlPublico'      => 'http://control.mx/publico/',
    'maximoInmuebles' => 100,
    );
}

$db=mysqli_connect($_AS['host'], $_AS['user'], $_AS['pass'],$_AS['basedatos']);
mysqli_select_db ($db,$_AS['basedatos']);



$jsonGlobal='
{
  "tipoInmueble": {
    "1": "bodega",
    "2": "casa",
    "4": "departamento",
    "5": "edificio",
    "6": "locale",
    "7": "oficina",
    "8": "terreno"
  },
  "operacionInmueble": {
    "1": "venta",
    "2": "renta"  
}
}';
$_GLOBAL=json_decode($jsonGlobal);




//Conexion al área de mensajes
include_once("sesion.php");
include_once("funciones.php");
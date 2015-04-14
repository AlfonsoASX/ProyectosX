<?php
session_start();

//Conexion a todo el sistema

/*
// omnis

$host="ganas001.mysql.guardedhost.com";
$user="ganas001_maspro";
$pass="s428MpCz";
$basedatos="ganas001_maspro";
*/

/*
//Control.mx

$host="ganas001.mysql.guardedhost.com";
$user="control_admin";
$pass="$?]fr*?J7Z]Q";
$basedatos="control_mx";
*/

/*




$host="localhost";
$user="root";
$pass="root";
$basedatos="casasx";
*/
$db=mysqli_connect($host, $user, $pass,$basedatos);
mysqli_select_db ($db,$basedatos);


//Conexion al área de mensajes
include("sesion.php");
include("funciones.php");


//Array de configuración

$_AS= array(
	'directorioImg'=> $_SERVER["DOCUMENT_ROOT"].'/Proyectos/publico',
	'maximoInmuebles'=> 100,
	);


$jsonGlobal='
{
  "tipoInmueble": {
    "1": "bodega",
    "2": "casa",
    "3": "cuarto",
    "4": "departamento",
    "5": "edificio",
    "6": "locale",
    "7": "oficina",
    "8": "terreno",
    "9": "rancho o granja"
  },
  "operacionInmueble": {
    "1": "venta",
    "2": "renta",
    "3": "traspaso"
  }
}
';


$_GLOBAL=json_decode($jsonGlobal);







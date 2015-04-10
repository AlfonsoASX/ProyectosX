<?php
session_start();

//Conexion a todo el sistema
$host="ganas001.mysql.guardedhost.com";
$user="ganas001_maspro";
$pass="s428MpCz";
$basedatos="ganas001_maspro";

$host="localhost";
$user="root";
$pass="root";
$basedatos="casasx";

$db=mysqli_connect($host, $user, $pass,$basedatos);
mysqli_select_db ($db,$basedatos);


//Conexion al área de mensajes
include("sesion.php");
include("funciones.php");


//Array de configuración

$_AS= array(
	'directorioImg'=> $_SERVER["DOCUMENT_ROOT"].'/Proyectos/publico'
	);


$jsonGlobal='
{
  "tipoInmueble": {
    "1": "Bodega",
    "2": "Casa",
    "3": "Cuarto",
    "4": "Departamento",
    "5": "Edificio",
    "6": "Locale",
    "7": "Oficina",
    "8": "Terreno",
    "9": "Rancho o granja"
  },
  "operacionInmueble": {
    "1": "Venta",
    "2": "Renta",
    "3": "Traspaso"
  }
}
';


$_GLOBAL=json_decode($jsonGlobal);







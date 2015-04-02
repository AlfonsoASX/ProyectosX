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

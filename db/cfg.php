<?php
//Conexion a todo el sistema

$host="ganas001.mysql.guardedhost.com";
$user="ganas001_camba";
$pass="7bR8d(Ka";
$basedatos="ganas001_camba";

//
/*
$host="localhost";
$user="root";
$pass="";
$basedatos="ganas001_camba";
*/

$db=mysql_connect($host, $user, $pass);
mysql_select_db ($basedatos,$db);

//Variables de entorno
$dominio= 'comprarama.com';

session_start();
//include("sesion.php");
//include("funciones.php");
?>
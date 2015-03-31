<?php
//Conexion a todo el sistema

$host="ganas001.mysql.guardedhost.com";
$user="ganas001_maspro";
$pass="s428MpCz";
$basedatos="ganas001_maspro";
session_start();

/*
$host="localhost";
$user="root";
$pass="";
$basedatos="activ023_maspropiedades";
*/

$db=mysql_connect($host, $user, $pass);
mysql_select_db ($basedatos,$db);

//Conexion al área de mensajes
include("sesion.php");
include("funciones.php");

$fechaHora=date("Y-n-d H:i");

/*
Código para cerrar conexiones

mysql_close($db);
mysql_close($db);
*/
define("UTF_8", 1);
define("ASCII", 2);
define("ISO_8859_1", 3);

function codificacion($texto) //Fuente http://php.apsique.com/node/536
{
  $texto=htmlentities($texto);

  $c = 0;
  $ascii = true;
  for ($i = 0;$i<strlen($texto);$i++) 
  {
    $byte = ord($texto[$i]);
    if ($c>0) 
    {
      if (($byte>>6) != 0x2) 
      {
        return ISO_8859_1;
      } 
      else 
      {
        $c--;
      }
    } 
    elseif ($byte&0x80) 
    {
      $ascii = false;
      if (($byte>>5) == 0x6) 
      {
        $c = 1;
      } 
      elseif (($byte>>4) == 0xE) 
      {
        $c = 2;
      } 
      elseif (($byte>>3) == 0x1E) 
      {
        $c = 3;
      } 
      else 
      {
      return ISO_8859_1;
      }
    }
  }
  return ($ascii) ? ASCII : UTF_8;
}
function AS_cadena_encode($texto)
{
  return (codificacion($texto)==ISO_8859_1) ? utf8_encode($texto) : $texto;
}
?>
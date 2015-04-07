<?php 


$host="ganas001.mysql.guardedhost.com";
$user="ganas001";
$pass="gananuevo";
$basedatos="ganas001_cine";


$host="localhost";
$user="root";
$pass="root";
$basedatos="veo";




$db=mysqli_connect($host, $user, $pass,$basedatos);
mysqli_select_db ($db,$basedatos);

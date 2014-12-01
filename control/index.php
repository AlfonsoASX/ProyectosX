<?php

session_start();

require 'kernel/php/cfg.php';
require 'kernel/php/db.php';
require 'kernel/php/sesion.php';
require 'kernel/php/funciones.php';



if(!empty($_GET['app']))
{//Si estamos haciendo la llamada a un app
	$_ASX['app']=$_GET['app'];
}
else
{//Se establece el app por default
	header('Location: ?app='.$app_default);
}








$archivo = 'app/'.$_ASX['app'].'/'.$_ASX['app'].'.php';

if (file_exists($archivo))
{
    require ($archivo);
}


$_app= new $_ASX['app']();


$_ASX['menu']      = file_get_contents('vista/menu.tmp');

$_ASX['contenido'] = $_app->_ejecutar();


require 'vista/estructura.tmp.php';

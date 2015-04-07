<?php
//si se envia un email, se tratara de iniciar sesion
if(!empty($_POST['email']))
{
    $sqlselect="SELECT * FROM `usuario` WHERE email ='".$_POST['email']."'";
    $result= mysqli_query ($db,$sqlselect);
    while($fl=mysqli_fetch_array($result))
    {
		if ($_POST['contrasena']==$fl['contrasena'])
		{
			if(!isset($COOKIE))  //  $cookie es nuestra variable de control de flujo, refresca la pantalla antes de iniciar
			{
				//generacion de clave única
				$a=rand(1,5);
				switch($a)
				{
				   case 1:	$clave=rand(1000,9999)."a".rand(10,99)."s".rand(10,99)."g".rand(10,99);
				   break;
				   case 2:  $clave=rand(10,99)."a".rand(100,999)."y".rand(100,999)."t".rand(10,99);
				   break;
				   case 3:  $clave=rand(100,999)."a".rand(10,99)."a".rand(100,999)."a".rand(100,999);
				   break;
				   case 4:  $clave=rand(100,99)."a".rand(10,99)."a".rand(100,999)."a".rand(1000,9999);
				   break;
				   case 5:  $clave=rand(100,99)."a".rand(10,99)."y".rand(100,999)."t".rand(100,999);
				   break;
				   default: $clave=rand(100,999)."a".rand(100,999)."y".rand(10,99)."t".rand(100,999);
				}
                $sqlupdate="UPDATE `usuario` SET claveSesion='".$clave."' WHERE id=".$fl['id'];
				mysqli_query ($db,$sqlupdate);
				setcookie("clave", $clave);
				setcookie("key", $fl['id']);
				header("Location:?C=1");  // ponemos cookie como true
				exit;
            }
        }
    }
}


if(!empty($_GET['Salir']))
{
    if(!isset($COOKIE_SET))  //  $cookie_set es nuestra variable de control de flujo, refresca la pantalla antes de iniciar
    {
        $clave=rand(100,999)."a".rand(100,999)."y".rand(10,99)."t".rand(100,999);
		$sqlupdate="UPDATE `usuario` SET claveSesion='".$clave."' WHERE claveSesion=".$_COOKIE['clave'];
		mysqli_query ($db,$sqlupdate);
        setcookie("clave");
        header("Location: $PHP_SELF?COOKIE_SET=1");  // ponemos cookie_set como true
        exit;
    }
}

if(!empty($_COOKIE['clave']))
{
	$_AS['clave'] = $_COOKIE['clave'];
	$_AS['key'] = $_COOKIE['key'];
}
else
{
	$_AS['clave'] = -123;
	$_AS['key'] = -1;
}








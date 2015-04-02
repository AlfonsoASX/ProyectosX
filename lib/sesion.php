<?php
$sesioniniciada=0;
//si se envia un email, se tratara de iniciar sesion
if(!empty($_POST["email"]))
{
    $sqlselect="SELECT * FROM `Usuario` WHERE email ='".$_POST["email"]."'";
    $result= mysqli_query ($db,$sqlselect);
    while($registro=mysqli_fetch_array($result))
    {
		if ($_POST["contrasena"]==$registro["contrasena"])
		{
			if(!isset($COOKIE))  //  $cookie es nuestra variable de control de flujo, refresca la pantalla antes de iniciar
			{ 
			//generacion de clave única
				
				$a=rand(1,5);
				switch($a)
				{
				   case 1: 
				   $clave=rand(1000,9999)."a".rand(10,99)."s".rand(10,99)."g".rand(10,99);
				   break;
				   case 2: 
				   $clave=rand(10,99)."a".rand(100,999)."y".rand(100,999)."t".rand(10,99);
				   break;
				   case 3: 
				   $clave=rand(100,999)."a".rand(10,99)."a".rand(100,999)."a".rand(100,999);
				   break;
				   case 4: 
				   $clave=rand(100,99)."a".rand(10,99)."a".rand(100,999)."a".rand(1000,9999);
				   break;
				   case 5: 
				   $clave=rand(100,99)."a".rand(10,99)."y".rand(100,999)."t".rand(100,999);
				   break;
				   //faltan 2 algoritmos generadores de claves más.
				   default:
				   $clave=rand(100,999)."a".rand(100,999)."y".rand(10,99)."t".rand(100,999);
				}
                $sqlupdate="UPDATE `Usuario` SET sesion='".$clave."' WHERE id=".$registro["id"];
				mysqli_query ($db,$sqlupdate);
				setcookie("clave", $clave);
				setcookie("no", $registro["noIdentificacion"]);
				setcookie("id", $registro["id"]);
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
			$sqlupdate="UPDATE `Usuario` SET sesion='".$clave."' WHERE sesion=".$_COOKIE['clave'];
			mysqli_query ($db,$sqlupdate);
            setcookie("clave");
            header("Location: $PHP_SELF?COOKIE_SET=1");  // ponemos cookie_set como true
            exit;
        }
}
if(!empty($_COOKIE['clave']))
{
	$ASclave=$_COOKIE['clave'];
	$clave=$ASclave;
	$ASno=$_COOKIE['no'];
	$ASid=$_COOKIE['id'];
}
else
{
	$ASclave=0;
	$clave=0;
	$ASno=0;
	$ASid=0;
}
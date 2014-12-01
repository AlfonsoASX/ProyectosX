<style>
*
{
margin:0px;
}</style>
<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
	if($_FILES[foto][name]!="")
	{
		$res=subirFotoAsesor($_FILES[foto],$_GET["id"]);
		echo "La imagen ";
		switch($res)
		{
		case 1:
		  echo " no se guardo correctamente<br />";
		  $res="";
		break;
		case 2:
		  echo " no se guardo, ya que es superior a los 2Mb<br />";
		  $res="";
		break;
		case 3:
		  echo " no se guardo, ya que no es una imagen valida (jpg, gif, png)<br />";
		  $res="";
		break;
		default:
		  echo " se guardo con &eacute;xito<br />";
		  //guardar registro en la base de datos
	
		}
	}
} ?>
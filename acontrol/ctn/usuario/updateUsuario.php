<?php 
include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
$sql="UPDATE  Usuario SET `".$_GET["campo"]."` =  '".$_GET["valor"]."' WHERE `id` =".$_GET["id"].";";
mysql_query($sql,$db);

}
?>
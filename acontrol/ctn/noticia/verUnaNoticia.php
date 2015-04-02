<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 


?>

<?php
	$sql='SELECT * FROM  `Noticia` WHERE id='.$_GET["id"].' ORDER BY fechaHora DESC LIMIT 0,1';
	$rs= mysqli_query($db,$sql);
	while($fl=mysqli_fetch_array($rs))
	{
?>
    <h2><?php echo $fl["titulo"]; ?></h2>
    <p><?php if($fl["fotoURL"]) { ?><img src="/publico/<?php 
	echo $fl["fotoURL"]; ?>" height="200px" hspace="5" vspace="5"  align="right" />
      <?php } ?><?php echo nl2br($fl["noticia"]); ?></p>
    <?php echo $fl["fechaHora"]; 
	}
?>
    <p>  <a href="?as=Noticias">Regresar</a>
        </p>
<?php
	}
?>
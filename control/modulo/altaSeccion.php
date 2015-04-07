<h2>Dar de alta sección</h2>
<?php

if(!empty($_POST))
{

  $sql = "INSERT INTO `veo_seccion`(`id`, `nombre`,  `orden`, `asKey`, `momento`, `estado`) 
  VALUES (NULL, '".$_POST['nombre']."',  ".$_POST['orden'].", ".$_AS['key'].", NOW(),'AC')";
  $result= mysqli_query ($db,$sql);

?>
<div class="alert alert-success" role="alert">Sección dada de alta con éxito</div>
<?php
}
else
{
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">



  <div class="form-group">
    <label for="nombre" class="col-sm-3 control-label">Nombre de la sección</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
  </div>

  <div class="form-group">
    <label for="orden" class="col-sm-3 control-label">Orden</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="orden" name="orden" value="0" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Dar de alta sección</button>
    </div>
  </div>
</form>
<?php  
}
?>


 
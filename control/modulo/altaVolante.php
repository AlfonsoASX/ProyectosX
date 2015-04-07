<h2>Alta de volante</h2>
<?php

if(!empty($_POST))
{

 $sql = "INSERT INTO `veo_volante` (`id`, `id_veo_seccion`, `url`,  `asKey`, `momento`, `estado`)
 VALUES (null,".$_POST['id_veo_seccion'].",'".as_subirImagen($_FILES['url'])."','".$_AS['key']."',NOW(),'AC')";

$result= mysqli_query ($db,$sql);
?>

<div class="alert alert-success" role="alert">El volante fue dado de alta con éxito</div>

<?php
}
else
{

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="id_veo_seccion" class="col-sm-3 control-label">Sección</label>
    <div class="col-sm-9">

      <select name="id_veo_seccion" id="id_veo_seccion" class="form-control">
<?php
  $sql="SELECT * FROM `veo_seccion` WHERE estado='AC' ORDER BY orden ASC";
  $result= mysqli_query ($db,$sql);
  while($fl=mysqli_fetch_array($result))
  {
?>
        <option value="<?php echo $fl['id'] ?>"><?php echo $fl['nombre'] ?></option>
<?php
  }
?>
      </select>
    </div>
  </div>

  


  <div class="form-group">
    <label for="url" class="col-sm-3 control-label">Diseño</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="url" name="url">
    </div>
  </div>





    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Dar de alta pedido</button>
    </div>
  </div>
</form>
<?php  
}
?>


 
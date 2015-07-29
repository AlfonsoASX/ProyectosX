<h2>Alta de paquete</h2>
<?php

if(!empty($_POST['nombre']))
{

  $sql = "INSERT INTO `paquete`(`id`, `id_producto`, `nombre`, `numeroPublicaciones`, `diasVigencia`, `precio`, `asKey`, `momento`, `estado`) 
  VALUES (NULL, ".$_POST['id_producto'].", '".$_POST['nombre']."', ".$_POST['numeroPublicaciones'].", ".$_POST['diasVigencia'].", ".$_POST['precio'].", ".$_AS['key'].", NOW(),'AC')";
  $result= mysqli_query ($db,$sql);

?>
<div class="alert alert-success" role="alert">Paquete dado de alta con éxito.</div>
<?php
}
else
{
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 



    <div class="form-group">
    <label for="id_producto" class="col-sm-3 control-label">Producto</label>
    <div class="col-sm-9">

      <select name="id_producto" id="id_producto" class="form-control">
<?php
  $sql="SELECT * FROM `producto` WHERE estado='AC'";
  $result= mysqli_query ($db,$sql);
  while($fl=mysqli_fetch_array($result))
  {
?>
        <option value="<?php echo $fl['id'] ?>"><?php echo $fl['nombre'] ?> (<?php echo $fl['dominio'] ?>)</option>
<?php
  }
?>
      </select>
    </div>
  </div>

<h3>Configuración del paquete</h3>

  <div class="form-group">
    <label for="nombre" class="col-sm-3 control-label">Nombre del nombre</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="numeroPublicaciones" class="col-sm-3 control-label">Tiraje</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="numeroPublicaciones" name="numeroPublicaciones" placeholder="Número de impactos incluidos">
    </div>
  </div>

  <div class="form-group">
    <label for="diasVigencia" class="col-sm-3 control-label">Vigencia</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="diasVigencia" name="diasVigencia" placeholder="Número de días (30 para un mes)">
    </div>
  </div>

  <div class="form-group">
    <label for="precio" class="col-sm-3 control-label">Precio</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio con IVA incluido y sin decimales">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Dar de alta paquete</button>
    </div>
  </div>
</form>
<?php  
}
?>


 
<h2>Alta de pedido</h2>
<?php
if(!empty($_POST['id_usuario']))
{

$sql = "INSERT INTO 

`pedido`(`id`, `id_usuario`, `id_producto`, `id_paquete`, `fechaInicio`, `formaPago`, `pagado`, `autoRenovacion`, `asKey`, `momento`, `estado`) 
VALUES ('',".$_POST['id_usuario'].",".$_GET['id_producto'].",".$_POST['id_paquete'].",'".$_POST['fechaInicio']."','','','','','','AC')";



$result= mysqli_query ($db,$sql);
?>

<div class="alert alert-success" role="alert">El pedido fue dado de alta con éxito</div>

<?php
}
else
{
?>
<form class="form-horizontal" action="" method="post">
<input type="hidden" value="<?php echo $_GET["id_usuario"] ?>" name="id_usuario" id="id_usuario">  
<input type="hidden" value="<?php echo $_GET["id_producto"] ?>" name="id_producto" id="id_usuario">  



<h3>Configuración del pedido</h3>

    <div class="form-group">
    <label for="id_paquete" class="col-sm-3 control-label">Paquete contratado.</label>
    <div class="col-sm-9">

      <select name="id_paquete" id="id_paquete" class="form-control">
<?php
  $sql="SELECT * FROM `paquete` WHERE estado='AC' AND id_producto = ".$_GET['id_producto'];
  $result= mysqli_query ($db,$sql);
  while($fl=mysqli_fetch_array($result))
  {
?>
        <option value="<?php echo $fl['id'] ?>"><?php echo $fl['nombre'] ?> - $<?php echo $fl['precio'] ?></option>
<?php
  }
?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="fechaInicio" class="col-sm-3 control-label">Fecha de inicio</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Número de estampas, empleos o artículos a los que tiene derecho">
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


 
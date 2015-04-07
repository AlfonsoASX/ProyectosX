<h2>Alta de usuario</h2>
<?php
$modo='insert';
if(!empty($_GET['id']))
{
  $modo='edit';
}



if(!empty($_POST['nombre']))
{

  if($modo!='edit')
  {
    $sql = "INSERT INTO usuario 
    (id ,nombre, apellido, nombreComercial, RFC, calleFiscal, NoExteriorFiscal, NoInteriorFiscal, codigoPostalFiscal, coloniaFiscal, calleComercial, noExteriorComercial, noInteriorComercial, codigoPostalComercial, coloniaComercial, telefonoComercial, emailComercial, sitioWeb, facebook, twitter, email, contrasena, claveSesion, ultimaSesion, urlFoto, asKey, momento, tipo, estado) 
    VALUES (NULL,  
      '".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['nombreComercial']."', '".$_POST['RFC']."', 
      '".$_POST['calleFiscal']."', '".$_POST['NoExteriorFiscal']."', '".$_POST['NoInteriorFiscal']."', '".$_POST['codigoPostalFiscal']."', 
      '".$_POST['coloniaFiscal']."', '".$_POST['calleComercial']."', '".$_POST['noInteriorComercial']."', '".$_POST['noInteriorComercial']."', 
      '".$_POST['codigoPostalComercial']."', '".$_POST['coloniaComercial']."', '".$_POST['telefonoComercial']."', '', 
      '', '', '', '".$_POST['alta-email']."', '".$_POST['contrasena']."', '1', '', '', NOW(), ".$_AS['key'].", '".$_POST['tipo']."', 'AC');";
    $msg='El usuario fue dado de alta con éxito';
  }
  else
  {
    $sql="UPDATE `usuario` SET 
    `nombre`='".$_POST['nombre']."',
    `apellido`='".$_POST['apellido']."',
    `nombreComercial`='".$_POST['nombreComercial']."',
    `RFC`='".$_POST['RFC']."',
    `calleFiscal`='".$_POST['calleFiscal']."',
    `NoExteriorFiscal`='".$_POST['NoExteriorFiscal']."',
    `NoInteriorFiscal`='".$_POST['NoInteriorFiscal']."',
    `codigoPostalFiscal`='".$_POST['codigoPostalFiscal']."',
    `coloniaFiscal`='".$_POST['coloniaFiscal']."',
    `calleComercial`='".$_POST['calleComercial']."',
    `noExteriorComercial`='".$_POST['noExteriorComercial']."',
    `noInteriorComercial`='".$_POST['noInteriorComercial']."',
    `codigoPostalComercial`='".$_POST['codigoPostalComercial']."',
    `coloniaComercial`='".$_POST['coloniaComercial']."',
    `telefonoComercial`='".$_POST['telefonoComercial']."',
    `email`='".$_POST['alta-email']."',
    `contrasena`='".$_POST['contrasena']."',
    `tipo`='".$_POST['tipo']."'
    WHERE id=".$_GET['id'];

    $msg='El usuario fue actualizado con éxito';
  }


$result= mysqli_query ($db,$sql);

?>
<div class="alert alert-success" role="alert"><?php echo $msg ?></div>
<?php
}
else
{




  $nombre='';
  $apellido='';
  $nombreComercial='';
  $RFC='';
  $calleFiscal='';
  $NoExteriorFiscal='';
  $NoInteriorFiscal='';
  $codigoPostalFiscal='';
  $coloniaFiscal='';
  $calleComercial='';
  $noExteriorComercial='';
  $noInteriorComercial='';
  $codigoPostalComercial='';
  $coloniaComercial='';
  $telefonoComercial='';
  $emailComercial='';
  $sitioWeb='';
  $facebook='';
  $twitter='';
  $email='';
  $contrasena='';
  $claveSesion='';
  $ultimaSesion='';
  $urlFoto='';
  $asKey='';
  $momento='';
  $tipo='';
  $estado='';

  if($modo=='edit')
  {
    $sql="SELECT * FROM `usuario` WHERE estado='AC' AND id=".$_GET['id'];
    $filas='';
    $result= mysqli_query ($db,$sql);
    while($fl=mysqli_fetch_array($result))
    {
      extract($fl);
    }

  }




?>
<form class="form-horizontal" action="" method="post">
  



  <div class="form-group">
    <label for="tipo" class="col-sm-3 control-label">Tipo de usuario</label>
    <div class="col-sm-9">
    	<select class="form-control" id="tipo" name="tipo">
    		<option <?php if($tipo=='CL') echo 'selected'; ?> value="CL">Cliente</option>
    		<option <?php if($tipo=='AM') echo 'selected'; ?> value="AM">Administrador</option>
    	</select>
    </div>
  </div>	
<h3>Datos de contacto</h3>

  <div class="form-group">
    <label for="nombre" class="col-sm-3 control-label">Nombre</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $nombre ?>" class="form-control" id="nombre" name="nombre" placeholder="Nombre del contacto" required>
    </div>
  </div>

  <div class="form-group">
    <label for="apellido" class="col-sm-3 control-label">Apellidos</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $apellido ?>" class="form-control" id="apellido" name="apellido" placeholder="Apellidos del contacto" required >
    </div>
  </div>






<h3>Datos comerciales</h3>
<p>Los siguientes datos pueden ser publicados en Internet</p>
	
  <div class="form-group">
    <label for="nombreComercial" class="col-sm-3 control-label">Nombre comercial</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $nombreComercial ?>" class="form-control" id="nombreComercial" name="nombreComercial" placeholder="Empresa ejemplo S.A. de C.V." >
    </div>
  </div>	

  <div class="form-group">
    <label for="calleComercial" class="col-sm-3 control-label">Calle</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $calleComercial ?>" class="form-control" id="calleComercial" name="calleComercial" place-holder="calleComercial">
    </div>
  </div>

  <div class="form-group">
    <label for="noExteriorComercial" class="col-sm-3 control-label">Número exterior</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $noExteriorComercial ?>" class="form-control" id="noExteriorComercial" name="noExteriorComercial" place-holder="noExteriorComercial">
    </div>
  </div>
	
  <div class="form-group">
    <label for="noInteriorComercial" class="col-sm-3 control-label">Número interior</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $noInteriorComercial ?>" class="form-control" id="noInteriorComercial" name="noInteriorComercial" place-holder="noInteriorComercial">
    </div>
  </div>
	
  <div class="form-group">
    <label for="codigoPostalComercial" class="col-sm-3 control-label">Código postal</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $codigoPostalComercial ?>" class="form-control" id="codigoPostalComercial" name="codigoPostalComercial" place-holder="codigoPostalComercial">
    </div>
  </div>
	
  <div class="form-group">
    <label for="coloniaComercial" class="col-sm-3 control-label">Colonia</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $coloniaComercial ?>" class="form-control" id="coloniaComercial" name="coloniaComercial" place-holder="coloniaComercial">
    </div>
  </div>

  <div class="form-group">
    <label for="telefonoComercial" class="col-sm-3 control-label">Teléfono</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $telefonoComercial ?>" class="form-control" id="telefonoComercial" name="telefonoComercial" place-holder="telefonoComercial">
    </div>
  </div>

<h3>Datos fiscales</h3>
<p>Los siguientes datos NO serán publicados en Internet</p>

  <div class="form-group">
    <label for="RFC" class="col-sm-3 control-label">RFC</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $RFC ?>" class="form-control" id="RFC" name="RFC" place-holder="RFC">
    </div>
  </div>

  <div class="form-group">
    <label for="calleFiscal" class="col-sm-3 control-label">Calle</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $calleFiscal ?>" class="form-control" id="calleFiscal" name="calleFiscal" place-holder="calleFiscal">
    </div>
  </div>

  <div class="form-group">
    <label for="NoExteriorFiscal" class="col-sm-3 control-label">Número exterior</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $NoExteriorFiscal ?>" class="form-control" id="NoExteriorFiscal" name="NoExteriorFiscal" place-holder="NoExteriorFiscal">
    </div>
  </div>
  
  <div class="form-group">
    <label for="NoInteriorFiscal" class="col-sm-3 control-label">Número interior</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $NoInteriorFiscal ?>" class="form-control" id="NoInteriorFiscal" name="NoInteriorFiscal" place-holder="NoInteriorFiscal">
    </div>
  </div>
  
  <div class="form-group">
    <label for="codigoPostalFiscal" class="col-sm-3 control-label">Código postal</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $codigoPostalFiscal ?>" class="form-control" id="codigoPostalFiscal" name="codigoPostalFiscal" place-holder="codigoPostalFiscal">
    </div>
  </div>

  <div class="form-group">
    <label for="coloniaFiscal" class="col-sm-3 control-label">Colonia</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $coloniaFiscal ?>" class="form-control" id="coloniaFiscal" name="coloniaFiscal" place-holder="coloniaFiscal">
    </div>
  </div>


<h3>Datos de acceso al sistema</h3>

  <div class="form-group">
    <label for="x-email" class="col-sm-3 control-label">Correo electrónico</label>
    <div class="col-sm-9">
      <input type="email" value="<?php echo $email ?>" class="form-control" id="alta-email" name="alta-email" required>
    </div>
  </div>
	
  <div class="form-group">
    <label for="contrasena" class="col-sm-3 control-label">Contraseña</label>
    <div class="col-sm-9">
      <input type="text" value="<?php echo $contrasena ?>" class="form-control" id="contrasena" name="contrasena" required >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">
        <?php
        if($modo=='edit')
        {
          echo 'Actualizar los datos del usuario';
        }
        else
        {
        ?>
        Dar de alta usuario
        <?php
        }
        ?>

      </button>
    </div>
  </div>
</form>
<?php
}
?>


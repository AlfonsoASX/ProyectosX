<?php include("../../../lib/cfg.php"); if(sesionValida($ASclave,$db)==0) { echo "Sesi&oacute;n finalizada"; } else { 
if($_GET["id"]==""){ 

	$sql="INSERT INTO `Usuario` VALUES ('', '', '', '', '', '', '', '', '', '', '', '', NOW(), '', '', '', '', '', '', '', '', '', 'as');";
	mysqli_query($db,$sql);
	$_GET["id"]=mysqli_insert_id($db);

}
$sql="SELECT * FROM `Usuario` WHERE id=".$_GET["id"];
$rs= mysqli_query($db,$sql);
while($fl=mysqli_fetch_array($rs)){
	foreach($fl as $nombre_campo => $valor){ 
		$asignacion = $nombre_campo;
		$$asignacion = $valor;
	}
}

?>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo2 {	font-size: 12px;
	color: #BD2A1A;
}
.Estilo3 {font-size: 14px}
-->
</style>

<form action="/acontrol/ctn/usuario/subirFotoUsuario.php?id=<?php echo $_GET["id"]; ?>" method="post"  enctype="multipart/form-data" name="form2" target="subirFoto" id="form2">
  Agregar Logotipo:<br />
  <input type="file" name="foto" id="foto" onchange="javascrip:document.form2.submit()" />
</form>
<form action="/acontrol/ctn/usuario/subirFotoUsuario.php?id=<?php echo $_GET["id"]; ?>aa" method="post"  enctype="multipart/form-data" name="form4" target="subirFoto" id="form4">
  Foto del asociado:<br />
  <input type="file" name="foto" id="foto" onchange="javascrip:document.form4.submit()" />
</form>
<iframe name="subirFoto" width="500px" height="20px" scrolling="No" frameborder="0" id="subirFotoAsesor"></iframe>
<p>&nbsp;</p>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><div id="formAsesor">
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table class="tabla1" border="0" cellspacing="3" cellpadding="5">
          <tr>
            <th scope="row"><div align="left">Asociado:</div></th>
            <td><?php 
if($ASid==1||$ASid==2||$ASid==7)
{
 ?>
                <input name="apellidos" type="text" id="apellidos" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $apellidos; ?>" size="50" />
                <?php 
}
else
{

 ?>
                <?php 
 echo $apellidos; ?>
                <?php 
}
 ?></td>
            <td rowspan="7"><img width="100px" src="/publico/Usuario<?php echo $_GET["id"]; ?>.jpg"><br />
              <a href="javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php?id=<?php echo $_GET["id"]; ?>','contenido');">Actualizar</a></td>
          </tr>
          <tr>
            <th scope="row"><div align="left">Correo electr&oacute;nico:</div></th>
            <td><input name="email" type="text" id="email" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $email; ?>" size="50" /></td>
            </tr>

          <tr>
            <th valign="top" scope="row"><div align="left">Contrase&ntilde;a:</div></th>
            <td><input name="contrasena" type="text" id="telefono3" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $contrasena; ?>" size="25" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Nextel:</div></th>
            <td><input name="campo3" type="text" id="telefono3" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $campo3; ?>" size="25" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"> <div align="left">Id Nextel:</div></th>
            <td><input name="nextel" type="text" id="telefono7" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $nextel; ?>" size="25" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Celular:</div></th>
            <td><input name="campo2" type="text" id="telefono3" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $campo2; ?>" size="25" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <th scope="row"><div align="left">Empresa:</div></th>
            <td><?php 
if($ASid==1||$ASid==2||$ASid==7)
{
 ?>
                <input name="nombres" type="text" id="nombres" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $nombres; ?>" size="50" />
                <?php 
}
else
{

 ?>
                <?php 
 echo $nombres;
 ?>
                <?php 
}
 ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Categor&iacute;a:</div></th>
            <td><select name="campo1" id="campo1" onchange="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');">
                <option value="1" <?php if($campo1=='1') echo 'selected="selected"'; ?> >Inmobiliaria</option>
                <option value="2" <?php if($campo1=='2') echo 'selected="selected"'; ?> >Abogados</option>
                <option value="3" <?php if($campo1=='3') echo 'selected="selected"'; ?> >Notarias</option>
                <option value="4" <?php if($campo1=='4') echo 'selected="selected"'; ?> >Agencia Publicidad</option>
                <option value="5" <?php if($campo1=='5') echo 'selected="selected"'; ?> >Tramitaci&oacute;n de cr&eacute;dito</option>
                <option value="5" <?php if($campo1=='6') echo 'selected="selected"'; ?> >Servicios financieros</option>
                <option value="7" <?php if($campo1=='7') echo 'selected="selected"'; ?> >Valuadores</option>
                <option <?php if($campo1=='') echo 'selected="selected"'; ?> >Seleccione un valor</option>
              </select>
</td>
            <td rowspan="6"><img src="/publico/Usuario<?php echo $_GET["id"]; ?>aa.jpg" alt="" width="100px" /><br />
              <a href="javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php?id=<?php echo $_GET["id"]; ?>','contenido');">Actualizar</a></td>
          </tr>
          <tr>
            <th scope="row"> <div align="left">Tel&eacute;fono:</div></th>
            <td><input name="telefono" type="text" id="telefono" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $telefono; ?>" size="25" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Direcci&oacute;n</div></th>
            <td><textarea name="direccion" cols="50" rows="5" id="campo2" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');"><?php echo $direccion; ?></textarea></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Sitio Web:</div></th>
            <td>http://
              <input name="campo4" type="text" id="telefono3" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $campo4; ?>" size="50" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Facebook</div></th>
            <td>http://www.facebook.com/
              <input name="facebook" type="text" id="facebook" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $facebook; ?>" size="20" /></td>
            </tr>
          <tr>
            <th height="29" valign="top" scope="row"><div align="left">Twitter</div></th>
            <td>@
              <input name="twitter" type="text" id="twitter" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');" value="<?php echo $twitter; ?>" size="50" /></td>
            </tr>
          <tr>
            <th valign="top" scope="row"><div align="left">Descripci&oacute;n del servicio</div></th>
            <td><textarea name="campo5" cols="50" rows="5" id="campo5" onkeyup="javascript:AS3Wxmlhttp('ctn/usuario/updateUsuario.php?id=<?php echo $id; ?>&amp;campo='+this.name+'&amp;valor='+this.value,'guardar');"><?php echo $campo5; ?></textarea></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th valign="top" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th height="29" valign="top" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th valign="top" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
<?php 
if($ASid==1||$ASid==2||$ASid==7)
{
 ?>        <p><a href="javascript:AS3Wxmlhttp('ctn/usuario/verUsuario.php','contenido');" class="botonLateral">Guardar</a></p><?php 
}
else
{

 ?>        <p><a href="javascript:AS3Wxmlhttp('ctn/usuario/altaUsuario.php?id=<?php echo $ASid; ?>','contenido');" class="botonLateral">Guardar</a></p><?php 
}
 ?>
      </form>
    </div></td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>

<?php
}
?>

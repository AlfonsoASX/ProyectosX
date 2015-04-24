<?php


?>

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
 <div class="list-group">
<?php

foreach ($_GLOBAL->operacionInmueble as $id => $valor)
{   
?>
        <a href="<?php echo armaURLmenu('operacionInmueble', $valor) ?>" class="list-group-item <?php echo menuActivo('operacionInmueble', $valor) ?>"><?php echo $valor ?></a>
<?php
}
?>
</div>

<div class="list-group">
<?php

foreach ($_GLOBAL->tipoInmueble as $id => $valor)
{
?>
<a href="<?php echo armaURLmenu('tipoInmueble', $valor) ?>" class="list-group-item <?php echo menuActivo('tipoInmueble', $valor) ?> "><?php echo $valor ?> </a>
<?php

}
?>
          </div> 
          <div class="list-group">

            
<?php

$sql="SELECT DISTINCT ciudad 
      FROM Inmueble 
      WHERE status=1 
      AND ciudad!='' 
      AND operacionInmueble!=''
      AND tipoInmueble!=''
      AND fotoURL !=''
      AND estadoInmobiliaria=0";
$rs= mysqli_query ($db,$sql);


while($fl=mysqli_fetch_array($rs))
{

?>
        <a href="<?php echo armaURLmenu('ciudad', $fl['ciudad']) ?>" class="list-group-item <?php echo menuActivo('ciudad', $fl['ciudad']) ?> "><?php echo $fl['ciudad'] ?></a>
<?php
}
?>
          </div> </div><!--/.sidebar-offcanvas-->
<?php 
include("lib/cfg.php");

echo '<?xml version="1.0" encoding="utf-8"?>
<propiedades>';

$sql="SELECT * FROM `Inmueble` WHERE status=1 AND  estadoInmobiliaria=0 AND fotoURL!='' ORDER BY fechaCreado DESC";

$rs= mysql_query ($sql,$db);
while($fl=mysql_fetch_array($rs))
{

switch($fl["operacionInmueble"])
		{
			case 1:
			$operacion="venta";
			break;
			case 2:
			$operacion="renta";
			break;
				}
		?>
	<propiedad>
		<operacion><![CDATA[<?php echo $operacion; ?>]]></operacion>
		<tipo><![CDATA[<?php echo $operacion; ?>]]></tipo>
		<pais><![CDATA[México]]></pais>
		<estado><![CDATA[Guanajuato]]></estado>
		<ciudad_municipio><![CDATA[León]]></ciudad_municipio>
		<colonia><![CDATA[<?php echo $fl["titulo"]; ?>]]></colonia>
		<cp><![CDATA[51200]]></cp>
		<moneda><![CDATA[Pesos]]></moneda>
		<precio_final><![CDATA[<?php echo $fl["precio"]; ?>.00]]></precio_final>
		<comentarios><![CDATA[<?php echo $fl["descripcion"]; ?>]]></comentarios>
		<m2_terreno><![CDATA[<?php echo $fl["terreno"]; ?>]]></m2_terreno>
		<m2_construccion><![CDATA[<?php echo $fl["construccion"]; ?>]]></m2_construccion>
		<num_recamaras><![CDATA[<?php echo $fl["numeroDeRecamaras"]; ?>]]></num_recamaras>
		<num_baños><![CDATA[<?php echo $fl["numeroDeBanos"]; ?>]]></num_baños>
		<imagenes>
			<imagen pie=""><![CDATA[<?php echo $fl["fotoURL"]; ?>]]></imagen>
		</imagenes>
	</propiedad>
<?php
}
?>
</propiedades>


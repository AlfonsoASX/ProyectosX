<?php
require 'db/cfg.php';
require 'db/funciones.php';

	$titulo='El arte de hacer negocio';



if(!empty($_GET['urlVolante']))
{
	$urlVolante = '';
	$urlFoto='';
	$descripcion = '';
	$paginaWeb= '';
	$nombrePaginaWeb='';
	$precio='';
	$telefono='';
	$titulo='';
	$urlVinculoVolante='';

	$sqlselect="SELECT * FROM Volante WHERE urlVolante='".$_GET['urlVolante']."' LIMIT 1";
	$result= mysql_query ($sqlselect,$db);
	while($fila=mysql_fetch_array($result))
	{
		$urlVolante = $fila['urlVolante'];
		$urlFoto=$fila['urlFoto'];
		$descripcion = $fila['descripcion'];
		$paginaWeb= $fila['paginaWeb'];
		$nombrePaginaWeb=$fila['nombrePaginaWeb'];
		$precio=$fila['precio'];
		$telefono=$fila['telefono'];
		$titulo=$fila['titulo'];
		$urlVinculoVolante=$fila['urlVinculoVolante'];
	}
	$urlVolante = $_GET['urlVolante'];
	require 'vista/volante.php';
}
else
{
	$anuncios='';
	$sqlselect="SELECT * FROM Anuncio ORDER BY fechaAlta DESC LIMIT 1,20";
	$result= mysql_query ($sqlselect,$db);
	while($fila=mysql_fetch_array($result))
	{
		$anuncio=$fila['titulo'].' '.$fila['descripcion'];
		$anuncio=substr($anuncio,0,120);
		$url_anuncio=asx::formato($anuncio, 'url');
		$anuncios.='
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		    
		    <div class="anuncio">
			    <p class="">
			    	<a href=" http://localhost:8888/comprarama.com/'.$fila['id'].'-'.$url_anuncio.'">'.$anuncio.'a</a>
			    </p>
			    <a href=" http://localhost:8888/comprarama.com/'.$fila['id'].'-'.$url_anuncio.'">
			    	<img src="img/sinImagen.png"/>
		    	</a>
			    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Me gusta</a>
		    	<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-phone-alt"></span> Contactar</a>
	    	</div>
		</div>';
	}
// $anuncios.='<div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div><div class="col-sm-12 col-md-6 col-lg-4"><p class="anuncio"><a href=" http://localhost:8888/comprarama.com">a</a></p></div>';
	require 'vista/portada.php';
}

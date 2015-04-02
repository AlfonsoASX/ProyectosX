<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="/js/as/uploadify.css" type="text/css" />
<script language="javascript" src="/js/AjaxAS3W.js"  type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.uploadify.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#fileUploadname2").fileUpload({
		'uploader': '/js/as/uploader.swf',
		'cancelImg': '/js/as/cancel.png',
		'script': '/js/as/upload_name.php',
		'folder': '',
		'multi': true,
		'auto': true,
		'buttonText': 'Subir fotos',
		'fileExt'     : '*.jpg',
  		'fileDesc'    : 'Archivos de Documentos (.jpg)',
		'displayData': 'percentage',	
		'scriptData': {'name':'<?php echo $_GET["id"] ?>__'},
		'simUploadLimit' : 5,
		onComplete: function (evt, queueID, fileObj, response, data) {
		//	alert("nombre del archivo "+response);
			AS3Wxmlhttp('ver.php?id=<?php echo $_GET["id"] ?>','guardarArchivo');
		}
	});
	$('#name2').bind('change', function(){
		$('#fileUploadname2').fileUploadSettings('scriptData','&name');
	});
});
</script>
</head>
<body onLoad="javascript:AS3Wxmlhttp('ver.php?id=<?php echo $_GET["id"] ?>','guardarArchivo');">
<div id="fileUploadname2">Cargando...</div>
<div id="guardarArchivo"></div>
</body>
</html>
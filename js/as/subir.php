<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.uploadify.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#fileUploadname2").fileUpload({
		'uploader': 'uploadify/uploader.swf',
		'cancelImg': 'uploadify/cancel.png',
		'script': 'uploadify/upload_name.php',
		'folder': 'files',
		'multi': true,
		'auto': true,
		'buttonText': 'Subir fotos',
		'fileExt'     : '*.jpg',
		'sizeLimit'   : 204800,
  		'fileDesc'    : 'Archivos de Documentos (.jpg)',
		'displayData': 'percentage',
		'scriptData': {'name':'233__'},
		onComplete: function (evt, queueID, fileObj, response, data) {
			alert("nombre del archivo "+response);
		}
	});
	$('#name2').bind('change', function(){
		$('#fileUploadname2').fileUploadSettings('scriptData','&name');
	});
});

</script>
</head>

<body>
<div id="fileUploadname2">Cargando...</div>

</body>
</html>
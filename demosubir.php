<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Script de ejemplo para subir archivos al servidor con un formulario</title>
<link href="/js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/uploadify/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#uploadify").uploadify({
		'uploader'       : '/js/uploadify/uploadify.swf',
		'script'         : '/js/uploadify/uploadify.php',
		'cancelImg'      : '/js/uploadify/cancel.png',
		'folder'         : '/publico',
		'queueID'        : 'fileQueue',
		'auto'           : true,
		'multi'          : true,
		'displayData' 	 : 'speed',
		'simUploadLimit' : 10,
		'buttonText'  	 : 'Subir fotos',
		'fileExt'     	 : '*.jpg',
  		'fileDesc'    	 : 'Archivos de Imagen (.jpg)'
});	});




</script>
</head>
<body>
<input type="file" name="uploadify" id="uploadify" />
<a href="javascript:$('#uploadify').uploadifyUpload();">Comenzar uploads</a>





</body>
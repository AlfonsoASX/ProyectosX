// Documento JavaScript
// Esta función cargará las paginas
function AS3Wxmlhttp(url, id_div){


var pagina_requerida = false
if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
pagina_requerida = new XMLHttpRequest()
} else if (window.ActiveXObject){ // pero si es IE
try {
pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){ // en caso que sea una versión antigua
try{
pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
pagina_requerida.onreadystatechange=function(){ // función de respuesta
cargarpagina(pagina_requerida, id_div)
}
pagina_requerida.open('GET', url, true) // asignamos los métodos open y send
pagina_requerida.send(null)
}
// todo es correcto y ha llegado el momento de poner la información requerida
// en su sitio en la pagina xhtml
function cargarpagina(pagina_requerida, id_div){
document.getElementById(id_div).innerHTML='<img src="/img/cargando.gif" width="21" height="12" />';
if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(id_div).innerHTML=pagina_requerida.responseText

}

function mostrar(id) {
  obj = document.getElementById(id);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
}

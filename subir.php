<?php 
    $cant = $_POST['cant']; 
     
    $no_sub = 0; 
    $sub = 0; 
     
    $x = 1; 
    while($x <= $cant){ 
        if(is_uploaded_file($_FILES["archivo".$x]['tmp_name'])){ 
            $nombre = $_FILES["archivo".$x]['tmp_name']; 
            $ruta = "./" . $_FILES["archivo".$x]['name']; 
            copy($nombre, $ruta); 
            $sub++; 
        } 
        else{ 
            $no_sub++; 
        } 
        $x++; 
    } 
    echo "Cantidad de archivos subidos: $sub<br/>"; 
    echo "Cantidad de archivos no subidos: $no_sub<br/>"; 
?>
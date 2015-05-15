<?php

$result = mysqli_query($con,"SELECT * FROM articulos");  
while ($row = mysqli_fetch_array($result)) {

    $content = $row['contenido'];
    $content = preg_replace("/<img[^>]+\>/i", "", $content); 
    $content = addslashes($content);
    $id = $row['id'];
    if(!mysqli_query($con,"UPDATE articulos SET contenido='".$content."' WHERE id='".$id."'")){
	    echo "<p>Problemas, ".mysqli_error($con)."</p>";
    }else{
	    echo "<p>Solucionado</p>";
    }

}

?>
<?php
// defino la carpeta para subir
$uploaddir = '../../Public/files/suppliers/';
// defino el nombre del archivo
$prefijo = substr(md5(uniqid(rand())),0,4); //Para evitar que se sobreescriban files

$uploadfile = $uploaddir . $prefijo . "_" . basename($_FILES['userfile']['name']) ;
// Lo mueve a la carpeta elegida
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo $prefijo;
} else {
  echo "error";
}
?>


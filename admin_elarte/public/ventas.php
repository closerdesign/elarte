<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require('../Application/Component/ventasComponent.php');
require('../Application/Services/ventasServices.php');
require('../Application/Component/sajaxconfig.php');
require('../Application/Component/generalComponent.php');

ValidarSession();

if($_POST['boton'])
{
	$target_path = "";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { $mensaje_file = "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	} else{
	$mensaje_file = "Ha ocurrido un error, trate de nuevo!";
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/ventas.js"></script>
<title>Documento sin título</title>
</head>
<body>

<?php mostrarCabeceraPrincipal(); ?>

<div>
<br />
<?php echo $mensaje_file; ?>
<form enctype="multipart/form-data" action="" method="POST">
<input id="uploadedfile" name="uploadedfile" type="file" />
<input type="submit" name="boton" value="Subir archivo" />
</form>
<br />
<input type="button" name="BotonPrueba" id="BotonPrueba" value="Pedidos (El arte)" onclick="mostrarPedidos()" />


<br /><br />

</div>
<!--<input type="button" name="BotonPrueba2" id="BotonPrueba2" value="MosrtrarPopUp" onclick="MostrarPopup('Prueba')" />-->


<div id="PruebaDiv"></div>
 
<div id='LayerDiv' align="center" class="layer" style="visibility:hidden" ></div>
<div id='PopupDiv' class="pop_up_container" align="center">
<table  width="700px" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="18" align="left" class="titulo_popup"><div style="padding:3px;" id="TituloPopupDiv"></div></td>
	  <td align="right" class="boton_cerrar_popup" onclick="OcultarPopup()"></td>
	</tr>
    <tr>
        <td colspan="2"><div style="padding:20px; overflow:auto; max-height:500px;" id="ContenidoPopupDiv" class="ContenidoPopup"></div></td>
    </tr>
</table> 
</div>

</body>
</html>
<script>
 <?php
 sajax_show_javascript();
 ?>
</script>
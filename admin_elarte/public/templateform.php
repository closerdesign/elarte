<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require('../application/Component/conciliacionComponent.php');
require('../Application/Component/sajaxconfig.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/template.js"></script>
<title>Documento sin título</title>
</head>
<body>
  
<input type="button" name="BotonPrueba" id="BotonPrueba" value="Enviar" onclick="prueba()" />
<input type="button" name="BotonPrueba2" id="BotonPrueba2" value="MosrtrarPopUp" onclick="MostrarPopup('Prueba')" />
<div id="PruebaDiv"></div>
 
<div id='LayerDiv' align="center" class="layer" style="visibility:hidden" ></div>
<div id='PopupDiv' class="pop_up_container" align="center">
<table width="400px" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="18" align="left" class="titulo_popup"><div id="TituloPopupDiv"></div></td>
	  <td align="right" class="boton_cerrar_popup" onclick="OcultarPopup()"></td>
	</tr>
    <tr>
        <td colspan="2"><div id="ContenidoPopupDiv" class="ContenidoPopup"></div></td>
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
<?php 
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require('../Application/Component/informesComponent.php');
require('../Application/Services/informesServices.php');
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
<link rel="stylesheet" type="text/css" href="css/calendar/jscal2.css" />
<link rel="stylesheet" type="text/css" href="css/calendar/steel/steel.css" />


<script type="text/javascript" src="js/informes.js"></script>

<script src="js/calendar/jscal2.js"></script>
<script src="js/calendar/lang-en.js"></script>

<title>Documento sin título</title>
</head>
<body>

<?php mostrarCabeceraPrincipal(); ?>

<div>
<br />
<?php echo $mensaje_file; ?>
<!--<form enctype="multipart/form-data" action="" method="POST">
<input id="uploadedfile" name="uploadedfile" type="file" />
<input type="submit" name="boton" value="Subir archivo" />
</form>
-->

<span class='texto_secundario'>Date From:</span><br><input name='FromDateFind' id='FromDateFind', type='text' value='' class='text_box_peq' size='13' /> <input type='image' src='images/calendario.gif' id='Date_FromButtonEventList' /> 
<br />
<span class='texto_secundario'>Date To:</span><br><input name='ToDateFind' id='ToDateFind', type='text' value='' class='text_box_peq' size='13' />  <input type='image' src='images/calendario.gif' id='Date_ToButtonEventList' />

<script language="javascript">
var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
      cal.manageFields('Date_FromButtonEventList', 'FromDateFind', '%Y-%m-%d');
      cal.manageFields('Date_ToButtonEventList', 'ToDateFind', '%Y-%m-%d');
</script>

<br />

<input type="button" name="BotonPrueba" id="BotonPrueba" value="Ventas por producto (PRESTASHOP)" onclick="mostrarVentasPorProducto()" /> 
<input type="button" name="BotonPrueba" id="BotonPrueba" value="Ventas por producto (EL ARTE)" onclick="mostrarVentasPorProductoElArte()" />



<br /><br />

</div>
<!--<input type="button" name="BotonPrueba2" id="BotonPrueba2" value="MosrtrarPopUp" onclick="MostrarPopup('Prueba')" />-->


<div id="PruebaDiv"></div>
 
<div id='LayerDiv' align="center" class="layer" style="visibility:hidden" ></div>
<div id='PopupDiv' class="pop_up_container" align="center">
<table  width="400px" border="0" cellpadding="0" cellspacing="0">
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
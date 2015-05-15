<?php session_start(); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/conn.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="es">
	
	<?php require_once('blocks/head.php'); ?>
	
	<body>
	
	<?php require_once('blocks/finRegistro.php'); ?>
	
	<?php require_once('blocks/header.php'); ?>
	
	<?php
		if(!isset($_REQUEST['content'])){
			require_once('blocks/home.php');
		}elseif($_REQUEST['content']=='obras'){
			require_once('blocks/obras.php');
		}elseif($_REQUEST['content']=='publicacion'){
			require_once('blocks/publicacion.php');
		}elseif($_REQUEST['content']=='biblioteca'){
			require_once('blocks/biblioteca.php');
		}elseif($_REQUEST['content']=='registrarme'){
			require_once('blocks/registrarme.php');
		}elseif($_REQUEST['content']=='mi-cuenta'){
			require_once('blocks/mi-cuenta.php');
		}elseif($_REQUEST['content']=='articulos'){
			require_once('blocks/articulos.php');
		}elseif($_REQUEST['content']=='recuperar-contrasena'){
			require_once('blocks/recuperar-contrasena.php');
		}elseif($_REQUEST['content']=='migracion'){
			require_once('blocks/migracion.php');
		}elseif($_REQUEST['content']=='eliminar-imagenes'){
			require_once('blocks/eliminar-imagenes.php');
		}elseif($_REQUEST['content']=='que-es-phronesis'){
			require_once('blocks/que-es-phronesis.php');
		}elseif($_REQUEST['content']=='paquetes'){
			require_once('blocks/paquetes.php');
		}elseif($_REQUEST['content']=='colecciones'){
			require_once('blocks/colecciones.php');
		}elseif($_REQUEST['content']=='coleccion'){
			require_once('blocks/coleccion.php');
		}elseif($_REQUEST['content']=='politica-de-privacidad'){
			require_once('blocks/politica-de-privacidad.php');
		}elseif($_REQUEST['content']=='darse-de-baja'){
			require_once('blocks/darse-de-baja.php');
		}elseif($_REQUEST['content']=='conferencia-virtual'){
			require_once('blocks/conferencia-virtual.php');
		}else{
			require_once('blocks/articulos.php');
		}
	?>
	
	<?php require_once('blocks/footer.php'); ?>
	
	<?php require_once('blocks/modal.php'); ?>
	
	<div class="carrito">
		<a href="index.php?content=mi-cuenta&task=mi-pedido"><img src="/img/carrito.png" /></a>
	</div>
	
	</body>
	
	<!-- Phronesis -->
	<script src="/js/phronesis.js"></script>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-46120323-1', 'auto');
		ga('send', 'pageview');
	</script>
	
	<?php if(isset($_SESSION['id'])){ require_once('blocks/jsUsers.php'); } ?>
	
	<?php
		
		require_once('blocks/validaRegistro.php');
		require_once('blocks/procesoPedido.php');
		
	?>
	
</html>

<?php if ( isset($_REQUEST['task']) && $_REQUEST['task']=='reflexiones' ) {
	require_once('blocks/mi-cuenta/reflexiones.php');
	return;
} ?>


<?php if(!isset($_SESSION['id'])){
	echo "
	<div class='row'>
		<div class='container'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<p class='lead'>Contenido exclusivo para miembros de la comunidad.</p>
				<p>Para poder disfrutar de este contenido, <a class='btn btn-default' href='javascript:void(0)' onclick='openRegisterModal()'>regístrate</a> o <a class='btn btn-default' href='javascript:void(0)' onclick='openLoginModal()'>inicia sesión</a> con tu cuenta.</p>
			</div>
		</div>
	</div>";
}else{ ?>
<div class="row top">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<?php
					if(!isset($_REQUEST['task'])){
						require_once('blocks/mi-cuenta/home.php');
					}elseif($_REQUEST['task']=='cambiar-contrasena'){
						require_once('blocks/mi-cuenta/cambiar-contrasena.php');
					}elseif($_REQUEST['task']=='mi-perfil'){
						require_once('blocks/mi-cuenta/mi-perfil.php');
					}elseif($_REQUEST['task']=='mi-pedido'){
						require_once('blocks/mi-cuenta/mi-pedido.php');
					}elseif($_REQUEST['task']=='mis-publicaciones'){
						require_once('blocks/mi-cuenta/mis-publicaciones.php');
					}elseif($_REQUEST['task']=='articulos-favoritos'){
						require_once('blocks/mi-cuenta/articulos-favoritos.php');
					}elseif($_REQUEST['task']=='reflexiones'){
						require_once('blocks/mi-cuenta/reflexiones.php');
					}elseif($_REQUEST['task']=='combatiendo-la-obesidad'){
						require_once('blocks/mi-cuenta/combatiendo-la-obesidad.php');
					}elseif($_REQUEST['task']=='historico-pedidos'){
						require_once('blocks/mi-cuenta/historico-pedidos.php');
					}else{
						require_once('blocks/mi-cuenta/home.php');
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
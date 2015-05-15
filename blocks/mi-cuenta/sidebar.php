<h4>Mi cuenta</h4>
<div class="menuMiCuenta">
	<ul class="nav nav-pills nav-stacked">
		<li <?php if(($_REQUEST['content']=='mi-cuenta')&&(!isset($_REQUEST['task']))){echo('class="active"');} ?>><a href="/index.php?content=mi-cuenta"><i class="fa fa-home"></i> Inicio</a></li>
		<li <?php if($_REQUEST['task']=='articulos-favoritos'){echo('class="active"');} ?>><a href="/index.php?content=mi-cuenta&task=articulos-favoritos"><i class="fa fa-bookmark"></i> Artículos favoritos</a></li>
		<li <?php if($_REQUEST['task']=='mi-perfil'){echo('class="active"');} ?>><a href="/index.php?content=mi-cuenta&task=mi-perfil"><i class="fa fa-user"></i> Mi perfil</a></li>
		<li <?php if($_REQUEST['task']=='historico-pedidos'){echo('class="active"');} ?>><a href="/index.php?content=mi-cuenta&task=historico-pedidos"><i class="fa fa-clock-o"></i> Historial de pedidos</a></li>
		<li <?php if($_REQUEST['task']=='cambiar-contrasena'){echo('class="active"');} ?>><a href="/index.php?content=mi-cuenta&task=cambiar-contrasena"><i class="fa fa-key"></i> Cambiar contraseña</a></li>
	</ul>
</div>
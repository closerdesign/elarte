<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li<?php if(!isset($_REQUEST['content'])){ echo(" class='active' "); } ?>><a href="/"><i class="fa fa-home"></i> Inicio</a></li>
				<li<?php if($_REQUEST['content']=='obras'){ echo(" class='active' "); } ?>><a href="/?content=obras"><i class="fa fa-align-justify"></i> Biblioteca</a></li>
				<?php
					if(isset($_SESSION['id'])){
						?>
						<li<?php if($_REQUEST['task']=='mis-publicaciones'){ echo(" class='active' "); } ?>><a href="/?content=mi-cuenta&task=mis-publicaciones"><i class="fa fa-book"></i> Mi Biblioteca</a></li>
						<?php
					}
				?>
				<li<?php if($_REQUEST['content']=='articulos'){ echo(" class='active' "); } ?>><a href="/?content=articulos"><i class="fa fa-pencil"></i> Artículos</a></li>
				<?php
					if(isset($_SESSION['id'])){
						?>
						<li<?php if($_REQUEST['task']=='articulos-favoritos'){ echo(" class='active' "); } ?>><a href="/?content=mi-cuenta&task=articulos-favoritos"><i class="fa fa-bookmark"></i> Artículos Favoritos</a></li>
						<?php
					}
				?>
				<?php
					if(isset($_SESSION['id'])){
						?>
						<li<?php if($_REQUEST['task']=='mi-pedido'){ echo(" class='active' "); } ?>>
							<a href="/?content=mi-cuenta&task=mi-pedido">
								<i class="fa fa-shopping-cart"></i> Mi pedido 
								<?php if(isset($_COOKIE['pedido'])){
									$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$_COOKIE[pedido]'";
									$q=mysqli_query($con, $sql);
									$n=mysqli_num_rows($q);
									if($n>0){
										echo '<span class="label label-danger">'.$n.'</span>';
									}
								} ?>
							</a>
						</li>
						<?php
					}
				?>
				<!--<li<?php if($_REQUEST['content']=='comunidad'){ echo(" class='active' "); } ?>><a href="#">Comunidad</a></li>-->
				<!--<li<?php if($_REQUEST['content']=='eventos'){ echo(" class='active' "); } ?>><a href="#">Eventos</a></li>-->
				<!--<li<?php if($_REQUEST['content']=='suscripciones'){ echo(" class='active' "); } ?>><a href="#">Suscripciones</a></li>-->
				<li><a data-toggle="modal" data-target="#myModalContacto" href="#"><i class="fa fa-envelope"></i> Contacto</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs">
				<li><a href="https://www.facebook.com/phronesisvirtual" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/phronesisvir" target="_blank"><i class="fa fa-twitter"></i></a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<div class="load">
	<img src="/img/ajax-loader.gif" alt="Cargando..." />
</div>

<div class="row module parallax parallax-1 top">
	
	<div class="row header-top">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<a href="/"><img class="img img-responsive img-rounded" src="/img/logo.png" alt="Phronesis, el arte de saber vivir" /></a>
				</div>
				<?php
					if(!isset($_SESSION['id'])){
						?>
						<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6 hidden-xs">
							<form name="login" id="login" class="navbar-form navbar-right" role="search" action="index.php" method="post">
								<p><i class="fa fa-user"></i> Ingresar a mi cuenta. <a href="/?content=registrarme">¡Regístrate!</a> <a href="/index.php?content=recuperar-contrasena">¿Olvidaste tu contraseña?</a></p>
								<div class="form-group">
									<input type="email" class="form-control" name="login-email" id="login-email" placeholder="Email" required />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="login-password" id="login-password" placeholder="Contraseña" required />
								</div>
								<button type="submit" class="btn btn-primary">Entrar</button>
							</form>
						</div>
						<?php
					}else{
						?>
						<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6">
							<p class="text-right">
								<a href="/index.php?content=mi-cuenta">Mi cuenta <i class="fa fa-user"></i></a><br />
								<a href="/index.php?task=cerrar-sesion">Cerrar sesión <i class="fa fa-power-off"></i></a>
							</p>
						</div>
						<?php
					}
				?>			
			</div>
		</div>
	
	</div>
	
	<div class="row">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 bannerTop">
				<h1>¡Haz parte de nuestra comunidad!</h1>
				<p><a href="/index.php?content=registrarme" class="btn btn-success btn-lg">¡Regístrate ahora!</a></p>
			</div>
		</div>	
	</div>
	<div class="row bannerInner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<h4>Disfruta de todos los beneficios.</h4>
					<p>Suscríbete sin costo y disfruta de los mejores contenidos a través de nuestras herramientas diseñadas únicamente para usuarios registrados.</p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<ul class="destacadosPortada">
						<li>Crea tu propia selección de contenido</li>
						<li>Diseña tu propia biblioteca</li>
						<li>Guarda tus artículos favoritos</li>
						<li>Disfruta de nuestra selección solo para usuarios registrados</li>
					</ul>
				</div>
				<!--
				<div class="col-lg-2 col-md-2 col-sm-2">
					<img src="img/DocPrincipiosParaVivirMejor.png" class="img img-responsive" />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h5><b>DESCARGA SIN COSTO</b></h5>
					<h4 class="text-left">Principios para vivir mejor<br /><i>(Parte I)</i></h4>
					<p>La primera publicación de tu biblioteca es por cuenta nuestra. Regístrate y podrás acceder sin costo a esta increíble publicación de Walter Riso.</p>
				</div>
				
				-->
			</div>
		</div>
	</div>
</div>
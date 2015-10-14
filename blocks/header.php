<div class="load">
	<img src="/img/ajax-loader.gif" alt="Cargando..." />
</div>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
        
        	<?php
            if(!isset($_SESSION['id'])){
				echo '
        		<div class="inicioMoviles" style="float:left; width:130px; font-size:14px;  margin:10px; margin-top:15px;">
        			<a class="muestraLogin" href="#" title="Iniciar sesión"><i class="fa fa-user"></i> Iniciar sesión</a>
            	</div>';
			}else
			{
			
				$nombreUsuarioLogin = getNombreUsuario($_SESSION['id']);
			
				echo '
						<div class="inicioMoviles" style="float:left; width:250px; margin:5px;">
						
							<span style="font-size:14px"><b>Bienvenido '.$nombreUsuarioLogin.'</b></span><br />
							
							<a href="/?content=mi-cuenta&task=mi-pedido" title="Carrito"><i class="fa fa-shopping-cart"></i> Carrito de compras <span class="label label-danger" id="noProductos" style="display:none"></span></a> 
							
						</div>';
			}
			?>
            
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".menuPrincipal">
			<span>Menú principal <i class="fa fa-align-justify"></i></span>
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse menuPrincipal" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
					/*
					if(!isset($_SESSION['id'])){
						echo '<li><a class="muestraLogin inicioMoviles" href="#" title="Iniciar sesión"><i class="fa fa-user"></i> Iniciar sesión</a></li>';
					}*/
				?>
				<li<?php if(!isset($_REQUEST['content'])){ echo(" class='active' "); } ?>>
					<a href="/" title="Inicio">
						<i class="fa fa-home"></i> Inicio
					</a>
				</li>
				<li<?php if( isset($_REQUEST['content']) && $_REQUEST['content']=='obras'){ echo(" class='active' "); } ?>>
					<a href="/?content=obras" title="Guías y Obras Editoriales"><i class="fa fa-align-justify"></i> Guías y Obras Editoriales</a>
				</li>
				<li<?php if( isset($_REQUEST['task']) && $_REQUEST['task']=='mis-publicaciones'){ echo(" class='active' "); } ?>>
					<a href="/?content=mi-cuenta&task=mis-publicaciones" title="Mi Biblioteca"><i class="fa fa-book"></i> Mi Biblioteca</a>
				</li>
				<li<?php if( isset($_REQUEST['content']) && $_REQUEST['content']=='articulos' && !isset( $_REQUEST['slug'] ) ){ echo(" class='active' "); } ?>>
					<a href="http://www.elartedesabervivir.com/?content=articulos" title="Artículos"><i class="fa fa-pencil"></i> Artículos</a>
				</li>
				<li<?php if( isset($_REQUEST['task']) && $_REQUEST['task']=='articulos-favoritos'){ echo(" class='active' "); } ?>>
					<a href="/?content=mi-cuenta&task=articulos-favoritos" title="Artículos Favoritos"><i class="fa fa-bookmark"></i> Artículos Favoritos</a>
				</li>
				<?php
				
				/*
					if(isset($_SESSION['id'])){
						?>
						<li<?php if( isset($_REQUEST['task']) && $_REQUEST['task']=='mi-pedido'){ echo(" class='active' "); } ?>>
							<a href="/?content=mi-cuenta&task=mi-pedido" title="Carrito">
								<i class="fa fa-shopping-cart"></i> Carrito de compras
								<span class="label label-danger" id="noProductos" style="display:none"></span>
							</a>
						</li>
						<?php
					}
				*/
				?>
				<!-- <li><a data-toggle="modal" data-target="#myModalEspeciales" href="javascript:void(0)"><i class="fa fa-star"></i> Programas Especiales</a></li> -->
				<li <?php echo ( isset($_REQUEST['slug']) || isset($_REQUEST['content']) && $_REQUEST['content'] == 'programas-especiales' ? 'class="active"' : '' ); ?>>
					<a href="/index.php?content=programas-especiales" title="Programas Especiales"><i class="fa fa-star"></i> Programas Especiales</a>
				</li>
				<li <?php echo ( isset($_REQUEST['slug']) || isset($_REQUEST['content']) && $_REQUEST['content'] == 'que-es-phronesis' ? 'class="active"' : '' ); ?>>
					<a href="/index.php?content=que-es-phronesis" title="¿Qué es Phronesis?"><i class="fa fa-question"></i> ¿Qué es Phronesis?</a>
				</li>
                <li class='inicioMoviles' <?php echo ( isset($_REQUEST['slug']) || isset($_REQUEST['content']) && $_REQUEST['content'] == 'mi-cuenta' ? 'class="active"' : '' ); ?>>
					<a href="/index.php?content=mi-cuenta" title="Mi cuenta"><i class="fa fa-user"></i> Mi cuenta</a>
				</li>
				
				<li>
					<a data-toggle="modal" data-target="#myModalContacto" href="#" title="Contacto"><i class="fa fa-envelope"></i> Contacto</a>
				</li>
				<?php
					if(isset($_SESSION['id'])){
						echo("<li class='inicioMoviles'><a href='#' class='cerrarSesion'><i class='fa fa-sign-out'></i> Salir</a></li>");
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs">
				<?php
					if(!isset($_SESSION['id'])){
						?>
						<li><button class="muestraLogin btn btn-primary" style="margin: 8px;"><i class="fa fa-user"></i> Iniciar sesión</button></li>
						<?php
					}else{
						
						$nombreUsuarioLogin = getNombreUsuario($_SESSION['id']);
			
						echo '
						<div style="float:left; margin:5px;">
						
						
							
						
							<span style="font-size:14px"><b>Bienvenido '.$nombreUsuarioLogin.'</b></span><br />
							
							<a href="/?content=mi-cuenta&task=mi-pedido" title="Carrito"><i class="fa fa-shopping-cart"></i> Carrito de compras <span class="label label-danger" id="noProductos" style="display:none"></span>		</a> | 
							<a href="/index.php?content=mi-cuenta" title="Mi cuenta"><i class="fa fa-user"></i> Mi cuenta</a> | <a href="#" class="cerrarSesion"><i class="fa fa-sign-out"></i> Salir</a>
						</div>';
						
						
						
						//echo('<li><a class="cerrarSesion" href="javascript:void(0)">Salir <i class="fa fa-sign-out"></i></a></li>');
					}
				?>
				
				<!--<li><a href="https://www.facebook.com/phronesisvirtual" target="_blank"><i class="fa fa-facebook"></i></a></li>-->
				<!--<li><a href="https://twitter.com/phronesisvir" target="_blank"><i class="fa fa-twitter"></i></a></li>-->
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<?php if(isset($_REQUEST['content'])){
	?>
	<div class="row header-top">			
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<a href="/" title="Phronesis, el arte de saber vivir">
						<img class="img img-responsive img-rounded" src="/img/logo.png" alt="Phronesis, el arte de saber vivir" />
					</a>
				</div>
				<?php
					if(!isset($_SESSION['id'])){
						?>
						<?php if($_REQUEST['content']!='conferencia-virtual'){ ?>
						<?php if($_REQUEST['content']!='inscripcion-conferencia'){ ?>
						<?php if($_REQUEST['content']!='amar-sin-apegos'){ ?>
						<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6 hidden-xs form-group">
							<button type="button" onclick="openRegisterModal()" class="btn btn-success btn-lg pull-right">Regístrate</button>
						</div>
						<?php } ?>
						<?php } ?>
						<?php } ?>
						<?php
					}else{
						?>
						<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6">
							<p class="text-right">
								<a href="/index.php?content=mi-cuenta" title="Mi cuenta">
									Mi cuenta <i class="fa fa-user"></i>
								</a>
							</p>
						</div>
						<?php
					}
				?>			
			</div>
		</div>
	</div>	
	<?php
} ?>
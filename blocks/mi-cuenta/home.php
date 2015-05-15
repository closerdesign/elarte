<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3>Hola <?php echo getNombreUsuario($_SESSION['id']) ?>!</h3>
				<p>Gracias por hacer parte de nuestra comunidad. Gestionando tu cuenta podrás acceder a todos nuestros contenidos y acceder a una serie de beneficios diseñados para aquellos que valoran nuestra literatura y la utilizan para mejorar su vida.</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php
					$sql="SELECT * FROM publicaciones WHERE status = 1 AND banner != '' ORDER BY RAND() LIMIT 1";
					$q=mysqli_query($con,$sql);
					while($banner=mysqli_fetch_assoc($q)){
						?>
						<a href="index.php?content=publicacion&id=<?php echo $banner['id'] ?>">
							<img src="/admin/_lib/file/imgbanners/<?php echo $banner['banner'] ?>" class="img img-responsive img-rounded" />
						</a>
						<?php
					}
				?>
			</div>
		</div>
		<hr>
		<div class="row features">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4 class="text-center">Mi biblioteca</h4>
				<img class="img img-responsive" src="/img/biblioteca.jpg">
				<p>¡Así es! Tienes una biblioteca personal. Allí encontrarás las publicaciones que has adquirido. Podrás descargarlas cuando quieras, y tener acceso a su información detallada. Puedes agregar más literatura visitando la <a href="/index.php?content=obras"><b>Biblioteca Phronesis.</b></a></p>
				<p><a class="btn btn-success" href="/index.php?content=mi-cuenta&task=mis-publicaciones"><i class="fa fa-book"></i> Ir a mi biblioteca</a></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4 class="text-center">Articulos favoritos</h4>
				<img class="img img-responsive" src="/img/articulos.jpg">
				<p>Como miembro de la comunidad, puedes guardar tus artículos favoritos para que los leas después o cuando quieras hacerlo. Puedes agregar o eliminar artículos y mantener la literatura de tu interés organizada. <b>¡Genial!</b></p>
				<p><a class="btn btn-success" href="/index.php?content=mi-cuenta&task=articulos-favoritos"><i class="fa fa-bookmark"></i> Ir a mis articulos</a></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h4 class="text-center">Mi perfil</h4>
				<img class="img img-responsive" src="/img/perfil.jpg">
				<p>Mantener la información de tu perfil actualizada te permites gestionar tus compras de manera más fácil, descargar obras cuando quieras, y nos haces posible mantenernos en contacto para que no pierdas ninguno de tus beneficios.</p>
				<p><a class="btn btn-success" href="/index.php?content=mi-cuenta&task=mi-perfil"><i class="fa fa-user"></i> Ir a mi perfil</a></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<p>Si tienes dificultades o inquietudes acerca de la utilización de tu cuenta, por favor no dudes en consultarnos a través de nuestro <a href="#" data-toggle="modal" data-target="#myModalContacto"><b>Formulario de Contacto</a></b>.</p>
			</div>
		</div>		
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<?php require_once('blocks/mi-cuenta/sidebar.php'); ?>
	</div>
</div>
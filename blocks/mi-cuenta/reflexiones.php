<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Reflexiones para Vivir Mejor</h1>
			<p class="lead">Con Walter Riso</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<p>Programa en video conducido por el psicólogo y escritor Walter Riso en el que se busca crear un espacio de reflexión sobre los comportamientos que hacer parte de nuestra vida.</p>
			</div>
			<hr>
			<div class="row">
				<?php
					$sql="SELECT * FROM reflexiones WHERE status = 1 ORDER BY creado DESC";
					$q=mysqli_query($con, $sql);
					while($ref=mysqli_fetch_assoc($q)){
						?>
						<div class="row" data-sr="enter bottom and scale up 20% over 2s">
							<div class="col-md-8">
								<a href="https://www.youtube.com/watch?v=<?php echo $ref['video'] ?>" class="popup-youtube">
									<img src="http://img.youtube.com/vi/<?php echo $ref['video'] ?>/0.jpg" class="img img-responsive img-rounded" />
								</a>
							</div>
							<div class="col-md-4">
								<p><?php echo $ref['descripcion'] ?></p>
								<p><a class="btn btn-default popup-youtube" href="https://www.youtube.com/watch?v=<?php echo $ref['video'] ?>">Ver video</a></p>
							</div>
						</div>
						<hr>
						<?php
					}
				?>
			</div>
		</div>
		<?php require_once('blocks/articulos_sidebar.php'); ?>
	</div>
</div>
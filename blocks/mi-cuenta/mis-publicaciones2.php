<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<?php
			$sql="SELECT publicaciones.id as id_pub,titulo,portada,descripcion,precio,isbn,edicion,paginas,video,descargable,muestra,formato,idioma,autor FROM publicaciones,publicacionesxusuario WHERE publicacionesxusuario.usuario = '$_SESSION[id]' AND publicaciones.id = publicacionesxusuario.publicacion";
			$q=mysqli_query($con, $sql);
			$n=mysqli_num_rows($q);
			if($n<1){
				echo "<p>No hay publicaciones disponibles.</p>";
			}else{
				echo '<div class="row publicacion">';
				while($pub=mysqli_fetch_array($q)){
				?>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="publicacionBiblioteca">
							<div class="row titulo-publicacion">
								<div class="col-lg-12 col-ms-12 col-sm-12">
									<h5><?php echo $pub['titulo'] ?><br /><?php echo getNombreAutor($pub['autor']) ?></h5>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<img class="img img-responsive img-rounded" src="admin/_lib/file/imgpublicaciones/<?php echo $pub['portada'] ?>" alt="<?php echo $pub['autor'] ?>"/>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 form-group acciones-publicacion">
											<?php echo getBtnDescarga($pub['id']); ?>
											<?php echo getBtnDescripcion($pub['id']); ?>
											<?php echo getBtnMuestra($pub['id']); ?>
											<?php echo getBtnVideo($pub['id']); ?>
											<?php // echo getBtnCalificar($pub['id']); ?>
										</div>
									</div>
									
								</div>		
							</div>
						</div>
					</div>
				<?php
				}
				echo '</div>';
			}
		?>
	</div>
</div>
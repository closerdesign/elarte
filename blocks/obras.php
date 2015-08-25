<div class="row top">
	<div class="container">
		<div class="row hidden-xs">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="filtroPublicaciones">
					<form class="form-inline">
					  <div class="form-group">
					  	<select class="form-control" id="filtrarIdioma">
						  	<option value="">Filtrar idioma...</option>
						  	<?php echo selectIdiomas(); ?>
					  	</select>
					  </div>
					  <div class="form-group">
					    <select class="form-control" id="filtrarFormato">
						    <option value="">Filtrar formato...</option>
						    <?php echo selectFormatos(); ?>
					    </select>
					  </div>
					</form>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<?php
					$sql="SELECT * FROM publicaciones WHERE status = 1 ORDER BY titulo";
					$q=mysqli_query($con, $sql);
					$n=mysqli_num_rows($q);
					if($n<1){
						echo "<p>No hay publicaciones disponibles.</p>";
					}else{
						echo("<div class='row'>");
						while($pub=mysqli_fetch_array($q)){
							if ( isset($_SESSION['id']) ) {
								$sql1="SELECT * FROM publicacionesxusuario WHERE usuario = '$_SESSION[id]' AND publicacion = '$pub[id]'";
								$q1=mysqli_query($con, $sql1);
								$n1=mysqli_num_rows($q1);
							}else{
								$n1 = 0;
							}
							if($n1<1){
							?>
							<div class="col-lg-4 col-md-4 col-sm-4 displayPublicacion displayIdioma<?php echo $pub['idioma'] ?> displayFormato<?php echo $pub['formato'] ?>">
								<div class="publicacionContainer">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h1>
												<?php echo $pub['titulo'] ?><br />
												<span class="autor"><?php echo getNombreAutor($pub['autor']) ?></span>
											</h1>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<a href="/index.php?content=publicacion&id=<?php echo $pub['id'] ?>" title="<?= $pub['titulo'] ?>">
											<img 
												class="img img-responsive img-rounded" 
												src="/admin/_lib/file/imgpublicaciones/<?php echo $pub['portada'] ?>"
												alt="<?= $pub['titulo']; ?>"
											/>
											</a>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<?php
												$formato="pdf";
												$formatoCaption="PDF";
												if($pub['formato']!=1){
													$formato="audio";
													$formatoCaption="MP3";
												}
											?>
											<h1 class="text-right"><span style="font-weight: 300">USD <?php echo $pub['precio'] ?></span><br /><i class="fa fa-file-<?php echo($formato); ?>-o"></i> - <?php echo $formatoCaption; ?></h1>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="descPublicacion">
												<p><?php echo limit_words(strip_tags($pub['descripcion']),25); ?>...</p>
												<p><a href="/index.php?content=publicacion&id=<?php echo $pub['id'] ?>" title="Más información">(Más información...)</a></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="accionesPublicacion">
												<?php echo getBtnDescarga($pub['id']); ?>
												<?php //echo getBtnDescripcion($pub['id']); ?>
												<?php echo getBtnVideo($pub['id']); ?>
												<?php echo getBtnMuestra($pub['id']); ?>
												<?php // echo getBtnCalificar($pub['id']); ?>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
						}
						echo("</div>");
					}
				?>
			</div>
		</div>
	</div>
</div>
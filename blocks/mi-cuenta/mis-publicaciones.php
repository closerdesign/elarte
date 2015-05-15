
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
					$sql="
						SELECT 
							* 
						FROM 
							publicaciones 
						JOIN 
							publicacionesxusuario 
						ON 
							publicaciones.id = publicacionesxusuario.publicacion 
						WHERE 
							status = 1
						AND
							usuario = $_SESSION[id]
						GROUP BY 
							publicaciones.id
						";
					if(isset($_REQUEST['filtro'])){
						if($_REQUEST['filtro']=='autor'){
							$sql.=" AND autor = '$_REQUEST[val]'";
						}
						if($_REQUEST['filtro']=='idioma'){
							$sql.=" AND idioma = '$_REQUEST[val]'";
						}
						if($_REQUEST['filtro']=='formato'){
							$sql.=" AND formato = '$_REQUEST[val]'";
						}
					}
					$sql.=" ORDER BY titulo";
					$q=mysqli_query($con, $sql);
					$n=mysqli_num_rows($q);
					if($n<1){
						echo "<p>No hay publicaciones disponibles.</p>";
					}else{
						echo("<div class='row'>");
						while($pub=mysqli_fetch_array($q)){
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
											<a href="/index.php?content=publicacion&id=<?php echo $pub['id'] ?>">
											<img 
												class="img img-responsive img-rounded" 
												src="/admin/_lib/file/imgpublicaciones/<?php echo $pub['portada'] ?>" 
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
											<h1 class="text-right"><i class="fa fa-file-<?php echo($formato); ?>-o"></i> - <?php echo $formatoCaption; ?></h1>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="descPublicacion">
												<p><?php echo limit_words(strip_tags($pub['descripcion']),25); ?>...</p>
												<p><a href="/index.php?content=publicacion&id=<?php echo $pub['id'] ?>">(Más información...)</a></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="accionesPublicacion">
												<?php echo getBtnDescarga($pub['id']); ?>
												<?php //echo getBtnDescripcion($pub['id']); ?>
												<?php echo getBtnMuestra($pub['id']); ?>
												<?php echo getBtnVideo($pub['id']); ?>
												<?php // echo getBtnCalificar($pub['id']); ?>	
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						echo("</div>");
					}
				?>
			</div>
		</div>

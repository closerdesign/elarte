<?php
	if(!isset($_REQUEST['id'])){
		echo '<meta http-equiv="refresh" content="0;url=index.php?content=obras" />';
	}else{
		$sql="SELECT * FROM publicaciones WHERE id = '$_REQUEST[id]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo '<meta http-equiv="refresh" content="0;url=index.php?content=obras" />';
		}else{
			$data=mysqli_fetch_array($q);
			?>
			<div class="row top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1 class="text-center tituloPublicacionInner"><?php echo $data['titulo'] ?></h1>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<img class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/<?php echo $data['portada'] ?>" alt="<?php echo $data['titulo'] ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<h1 class="text-center tituloPublicacionInner">USD <?php echo $data['precio'] ?></h1>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<?php
								if($data['video']!=""){
									?>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='http://www.youtube.com/embed/<?php echo $data['video'] ?>' frameborder='0' allowfullscreen></iframe></div>
										</div>
									</div>
									<hr>
									<?php
								}
							?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<?php echo $data['descripcion'] ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 accionesPublicacionInner">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<?php echo getBtnDescarga($data['id']); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<?php echo getBtnMuestra($data['id']); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<button class="btn btn-primary compartirAmigo"><i class="fa fa-share-square-o"></i> Compartir con un amigo</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<button class="btn btn-primary compartirFacebook"><i class="fa fa-facebook"></i> Compartir en Facebook</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<a class="btn btn-primary" href="/index.php?content=obras">Ir a la biblioteca</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
?>

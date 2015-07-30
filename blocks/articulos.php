<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<nav class="navbar navbar-inverse" id="nav2">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
						<span>Categorías  <i class="fa fa-align-justify"></i></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<?php
								$sql="SELECT * FROM categorias WHERE status = 1 AND id != 1 ORDER BY nombre ASC";
								$q=mysqli_query($con, $sql);
								while($categorias=mysqli_fetch_assoc($q)){
									$sql1="SELECT * FROM articulos WHERE categoria LIKE '%$categorias[id]%'";
									$q1=mysqli_query($con, $sql1);
									$n1=mysqli_num_rows($q1);
									$active="";
									if( isset($_REQUEST['categoria']) && $_REQUEST['categoria']==$categorias['id']){
										$active="active";
									}
									if($n1>0){
										echo('<li class="'.$active.'"><a href="/index.php?content=articulos&categoria='.$categorias['id'].'">'.$categorias['nombre'].'</a></li>');
									}
								}
							?>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>
	</div>
</div>
<?php
	$n=0;
	if(isset($_REQUEST['id'])===true){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM articulos WHERE id='$_REQUEST[id]' AND status = 1"));	
	}
	if( (isset($_REQUEST['id'])===true) && ($n==1) ){
		// Aquí va el contenido del artículo
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM articulos WHERE id = $_REQUEST[id]"));
		?>
		<div class="row top">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="row hidden-xs">
							<div class="col-lg-12 col-md-12 col-sm-12 banner">
								<div class="banner728x90">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Web App - Banner Artículo Top -->
									<ins class="adsbygoogle"
									     style="display:inline-block;width:728px;height:90px"
									     data-ad-client="ca-pub-5955686545071577"
									     data-ad-slot="2764324843"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
						<div class="row publicidadMoviles">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Web App - Banner Top Artículo Móvil -->
								<ins class="adsbygoogle"
								     style="display:block"
								     data-ad-client="ca-pub-5955686545071577"
								     data-ad-slot="1419115243"
								     data-ad-format="auto"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
						</div>
						
						<?php if(
								($data['programas_especiales']>0) &&
								(!isset($_SESSION['id']))
							){
								?>
								<div class="row">
									<div class="col-md-12">
										<p class='lead'>Contenido exclusivo para miembros de la comunidad.</p>
										<p>Para poder disfrutar de este contenido, <a class='btn btn-default' href='javascript:void(0)' onclick='openRegisterModal()'>regístrate</a> o <a class='btn btn-default' href='javascript:void(0)' onclick='openLoginModal()'>inicia sesión</a> con tu cuenta.</p>
									</div>
								</div>
								<?php
							}else{ ?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 articulo-detalle">
									
									<div class="row articulos-titulo">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<?php if($data['programas_especiales'] > 0){ ?>
											<h5 style="text-transform: uppercase; background: #f5f5f5; padding: 10px; border-radius: 4px; border-bottom: solid 3px #ddd;">
												<?php echo getTituloPrograma($data['programas_especiales']) ?>
											</h5>
											<?php } ?>
											<h2><?php echo $data['titulo'] ?></h2>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="articulo-meta">
												<?php
													$fecha=strtotime($data['fecha_publicacion']);
													$dia=date('d',$fecha);
													$vistames=array(
														"01"=>"Enero",
														"02"=>"Febrero",
														"03"=>"Marzo",
														"04"=>"Abril",
														"05"=>"Mayo",
														"06"=>"Junio",
														"07"=>"Julio",
														"08"=>"Agosto",
														"09"=>"Septiembre",
														"10"=>"Octubre",
														"11"=>"Noviembre",
														"12"=>"Diciembre"
														);
													$mes=$vistames[date('m',$fecha)];
													$anio=date('Y',$fecha);
												?>
												<p><i class="fa fa-calendar"></i> <?php echo $mes." ".$dia.", ".$anio; ?></p>
											</div>
											
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<img class="img img-responsive inner" src="/admin/_lib/file/imgarticulos/<?php echo $data['imagen'] ?>" />
										</div>
									</div>
									
									
									
									<div class="row articulos-compartir">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<?php
												$favUser="";
												if(isset($_SESSION['id'])){
													$favUser=$_SESSION['id'];
												}
											?>
											<button articulo="<?php echo $_REQUEST['id'] ?>" usuario="<?php echo $favUser; ?>" class="btn btn-primary btnFavoritos">
												<i class="fa fa-heart"></i> Agregar a favoritos
											</button>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<button class="btn btn-primary compartirAmigo"><i class="fa fa-share-square-o"></i> Compartir con un amigo</button>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<button class="btn btn-primary compartirFacebook"><i class="fa fa-facebook"></i> Compartir en Facebook</button>
										</div>
									</div>
									
									<hr>
									
									<div class="row">
										<div class="col-md-12 contenidoArticulos">
											<?php echo $data['contenido'] ?>
										</div>
									</div>
									
								</div>	
							</div>
							
							<div class="row comentarios-articulo">
								<div class="row hidden-xs">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="banner728x90">
											<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
											<!-- Web App - Banner Artículo Comentarios -->
											<ins class="adsbygoogle"
											     style="display:inline-block;width:728px;height:90px"
											     data-ad-client="ca-pub-5955686545071577"
											     data-ad-slot="7194524442"></ins>
											<script>
											(adsbygoogle = window.adsbygoogle || []).push({});
											</script>
										</div>
									</div>
								</div>
								<div class="row publicidadMoviles">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
										<!-- Web App - Móvil Categoría -->
										<ins class="adsbygoogle"
										     style="display:inline-block;width:320px;height:100px"
										     data-ad-client="ca-pub-5955686545071577"
										     data-ad-slot="5988915648"></ins>
										<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
										</script>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<p class="lead">Comparte tus comentarios</p>
									<?php
										if(!isset($_SESSION['id'])){
											echo '
												<p>Para poder comentar este artículo debes ser un usuario registrado. <a class="btn btn-default" href="javascript:void(0)" onclick="openRegisterModal()">Regístrate</a> o ingresa haciendo click <a class="btn btn-default" href="javascript:void(0)" onclick="openLoginModal()">aquí</a>.</p>
											';
										}else{
											?>
											<form name="comentarios" id="comentarios">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 form-group">
														<textarea class="form-control" name="comentario" id="comentario" placeholder="Escribe aquí tu comentario" required ></textarea>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 form-group">
														<input type="hidden" name="articulo" id="articulo" value="<?php echo $data['id'] ?>" />
														<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['id'] ?>" />
														<button type="submit" class="btn btn-primary">Enviar comentario</button>
													</div>
												</div>
											</form>
											<?php
										}
									?>
									<?php
										$sql="SELECT * FROM comentarios WHERE articulo = '$data[id]' AND status = 1 ORDER BY creado DESC";
										$q=mysqli_query($con, $sql);
										$n=mysqli_num_rows($q);
										
										echo '
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<h4>Comentarios</h4>
													<hr>
												</div>
											</div>';
										
										if($n<1){
											echo "
												<div class='row'>
													<div class='col-lg-12 col-md-12 col-sm-12'>
														<p>Este artículo aún no tiene comentarios.</p>
													</div>
												</div>
											";
										}else{
											while($c=mysqli_fetch_assoc($q)){
												echo "
													<div class='row'>
														<div class='col-lg-12 col-md-12 col-sm-12'>
															<div class='globo-comentarios'>
																$c[comentarios]
															</div>
															<div class='meta-comentarios'>
																Por ".getMetaComentarios($c['usuario'])."
															</div>
														</div>
													</div>
												";
											}
										}
										
									?>
								</div>
							</div>		
							<?php } ?>
						
						<!-- INICIO DE BANNER MOVIL CAMPAÑA -->
						<div class="row">
							<div class="col-md-12">
								<div class="bannerMovilCampana">
									<a href="index.php?content=paquetes&id=1" target="_blank">
										<img src="/img/bannerPaquete1.jpg" />
									</a>
								</div>
							</div>
						</div>
						<!-- FIN DE BANNER MOVIL CAMPAÑA -->
						
					</div>
					<?php require_once('blocks/articulos_sidebar.php'); ?>
				</div>
			</div>
		</div>
		<?php
	}else{
		// Aquí va el esquema de categoría
		?>
		<div class="row top">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 articulos-content">
						<div class="row hidden-xs">
							<div class="col-lg-12 col-md-12 col-sm-12 banner">
								<div class="banner728x90">
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Web App - Articulos Categoria Top -->
									<ins class="adsbygoogle"
									     style="display:inline-block;width:728px;height:90px"
									     data-ad-client="ca-pub-5955686545071577"
									     data-ad-slot="8950459247"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>
						<?php
							if(isset($_REQUEST['categoria'])){
								echo("
									<div class='row'>
										<div class='col-lg-12 col-md-12 col-sm-12'>
											<h2>".getNombreCategoria($_REQUEST['categoria'])."</h2>
										</div>
									</div>
									<hr>
								");
							}
						?>
						<?php if( isset($_REQUEST['categoria']) && $_REQUEST['categoria']==1){ ?>
						<div class="row">
							<div class="col-md-12">
								Iris Luna Montaño es médico psiquiatra, Especialista en adicciones y magister en Nutrición Especializado en Sobrepeso y Obesidad. Desde hace quince años trabaja como psicoterapeuta, docente y conferencista. Ha publicado cuatro libros académicos, así como múltiples artículos para revistas científicas sobre temas de psicopatología femenina. Dentro de sus actividades cabe destacar aquellas relacionadas con los temas de salud y prevención en salud mental y trastornos del comportamiento.
							</div>
						</div>
						<hr>
						<?php } ?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 divArticulos">
								<?php
									$sql="SELECT * FROM articulos WHERE status = 1 AND categoria != 1";
									if(isset($_REQUEST['categoria'])){
										$sql.=" AND categoria LIKE '%$_REQUEST[categoria]%'";
									}
									$sql.=" AND programas_especiales < 1";
									$sql.=" ORDER BY fecha_publicacion DESC";
									$q=mysqli_query($con, $sql);
									$n=mysqli_num_rows($q);
									if($n<1){
										echo "<p>No hay contenidos disponibles.</p>";
									}else{
										while($post=mysqli_fetch_assoc($q)){
											echo getArticuloCategoria($post['id']);
										}
									}
								?>		
							</div>
						</div>
					</div>
					<?php require_once('blocks/articulos_sidebar.php'); ?>
				</div>
			</div>
		</div>
		<?php
	}
?>

<?php
	if(
		(
			isset($_REQUEST['categoria']) &&
			isset($_REQUEST['content']) &&
			$_REQUEST['content']=='articulos') &&
		(!isset($_REQUEST['id']))
	){
		?>
		<script>
			$(document).ready(function(){
				var load = 0;
				$(window).scroll(function(){
					if($(window).scrollTop() == $(document).height() - $(window).height())
					{
						$('.load').fadeIn();
						load++;
						$.post('/includes/php.php',{
						  consulta: "cargarArticulos",
						  categoria: "<?php echo $_REQUEST['categoria'] ?>",
						  load: load
						}).done(function(data){
						  $('.divArticulos').append(data);
						  $('.load').fadeOut();
						})
					}
				})
			})
		</script>
		<?php
	}
?>
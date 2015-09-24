<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'fitness-set' ) : ?>
<div class="container">
	<div class="col-lg-12 DescripcionPrograma">
		<div class="row">
			<div class="col-lg-12">
				<p>
					<a class="btn btn-default" href='index.php?content=programas-especiales' title="Programas Especiales">
						<i class='fa fa-arrow-left'></i> Volver a Programas Especiales
					</a>
				</p>
				<h3 class="DescripcionPrograma-titulo">Fitness Set</h3>
				<span class="DescripcionPrograma-subTitulo">Por Lic. Daniel Martínez (Licenciado en Ciencias de la Actividad Física y el Deporte)</span>
				<br>
				<!-- <p>
					Armonía entre cuerpo y mente. En este espacio la Dra. Iris Luna pretende a través de artículos, documentos, videos y otros materiales poner al alcance de nuestra comunidad herramientas y pautas para alcanzar un balance de bienestar entre cuerpo y mente.
				</p> -->
				<img class="img-responsive" src="/img/COLLAGE-DANIEL.png" alt="">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="DescripcionPrograma-imgAutor col-lg-1">
				<img class="img-circle" src="/images/daniel-martinez.png" width="80" alt="Daniel Martínez">
			</div>
			<div class="DescripcionPrograma-autorAbout col-lg-11">
				<strong>Sobre Daniel Martínez:</strong> Licenciado en Ciencias de la Actividad Física y el Deporte de la Universidad de Barcelona en INEFC (2008-2013), Técnico de fitness en complejos deportivos municipales en El Prat de Llobregat, Barcelona (2008-2009), Técnico de fitness en Complejo Deportivo Baldiri Aleu, Sant Boi, Barcelona (2010-2011), Federado en Taekwondo desde los 6 años (1996), actividad que ejerció dictando clases y enseñando su importancia. Desde el año 2013 es entrenador Personal en Dir Seven, Barcelona.
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1 col-lg-offset-9 text-center instagram-programa">
				<a href="https://instagram.com/danimrfit/" title="Instagram" target="_blank">
					<i class="fa fa-instagram"></i>
				</a>
			</div>
			<div class="col-lg-1 text-center facebook-programa">
				<a href="https://www.facebook.com/daniel.martinezramirez.334" title="Facebook" target="_blank">
					<i class="fa fa-facebook"></i>
				</a>
			</div>
			<div class="col-lg-1 text-center twitter-programa">
				<a href="https://twitter.com/@danimrfitt" title="Twitter" target="_blank">
					<i class="fa fa-twitter"></i>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<nav class="navbar navbar-inverse" id="nav2">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
				<span>Secciones  <i class="fa fa-align-justify"></i></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && $_REQUEST['section'] == 'rutinas' ? 'active' : '' ) ?>">
						<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=rutinas" title="Rutinas de Fitness set">
							Rutinas de ejercicio
						</a>
					</li>
					<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && $_REQUEST['section'] == 'recetas' ? 'active' : '' ) ?>">
						<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=recetas" title="Recetas de Fitness set">
							Recetas
						</a>
					</li>
					<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && $_REQUEST['section'] == 'tips' ? 'active' : '' ) ?>">
						<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=tips" title="Tips de Fitness set">
							Tips
						</a>
					</li>
					<li>
						<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de Fitness set">
							Artículos
						</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</div>
<?php endif; ?>


<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'mente-sana-vida-sana' ) : ?>
<div class="container">
	<div class="col-lg-12 DescripcionPrograma">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="DescripcionPrograma-titulo">Mente sana, vida sana</h3>
				<span class="DescripcionPrograma-subTitulo">Por Dra. Iris Luna (Psiquiatra)</span>
				<br>
				<p>
					Armonía entre cuerpo y mente. En este espacio la Dra. Iris Luna pretende a través de artículos, documentos, videos y otros materiales poner al alcance de nuestra comunidad herramientas y pautas para alcanzar un balance de bienestar entre cuerpo y mente.
				</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="DescripcionPrograma-imgAutor col-lg-1">
				<img class="img-circle" src="/images/iris.jpg" width="80" alt="Iris Luna">			
			</div>
			<div class="DescripcionPrograma-autorAbout col-lg-11">
				<strong>Sobre Iris Luna:</strong> Iris Luna es médico psiquiatra, especialista en adicciones, magister en nutrición y especialista en sobrepeso y obesidad. Desde hace quince años trabaja como psicoterapeuta, docente y conferencista. Ha publicado cuatro libros académicos, así como múltiples artículos para revistas científicas sobre temas de psicopatología femenina. Dentro de sus actividades cabe destacar aquellas relacionadas con los temas de salud y prevención en salud mental y trastornos del comportamiento.
			</div>
		</div>
		<br>
		<br>
	</div>
</div>
<div class="container">
	<nav class="navbar navbar-inverse" id="nav2">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
				<span>Secciones  <i class="fa fa-align-justify"></i></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de Mente sana, vida sana">
							Artículos
						</a>
					</li>
					<li class="">
						<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=documentos" title="Documentos de Mente sana, vida sana">
							Documentos y herramientas de ayuda
						</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</div>
<?php endif; ?>


<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'angeles-caidos-o-antropoides-erguidos' ) : ?>
<div class="container">
	<div class="col-lg-12 DescripcionPrograma">
		<div class="row">
			<div class="col-lg-12">
				<p>
					<a class="btn btn-default" href='index.php?content=programas-especiales' title="Programas Especiales">
						<i class='fa fa-arrow-left'></i> Volver a Programas Especiales
					</a>
				</p>
				<h1 class="DescripcionPrograma-titulo">¿Ángeles caídos o antropoides erguidos?</h1>
				<span class="DescripcionPrograma-subTitulo">Por Dr. Luis Flórez Alarcón (Psicólogo)</span>
				<br>
				<p>
					Esta columna pretende analizar las motivaciones humanas a la luz de algunos principios científicos acerca del proceso motivacional, mirando este proceso desde una perspectiva teórica de corte cognitivo.
				</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="DescripcionPrograma-imgAutor col-lg-1">
				<img class="img-circle" src="/img/Luis_Florez_Alarcon.jpg" width="80" alt="Luis Flórez Alarcón">
			</div>
			<div class="DescripcionPrograma-autorAbout col-lg-11">
				<strong>Sobre Luis Flórez:</strong> Psicólogo, Magister en Análisis Experimental de la Conducta y Doctor en Psicología Experimental. Actualmente es profesor Titular, adscrito al Departamento de Psicología de la Universidad Nacional de Colombia y director de la línea de investigación sobre Modelos Psicosociales en Prevención y Promoción de la Salud, en el grupo de investigación Estilo de Vida y Desarrollo Humano.
			</div>
		</div>
		<br>
		<br>
	</div>
</div>
<div class="container">
	<nav class="navbar navbar-inverse" id="nav2">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
				<span>Secciones  <i class="fa fa-align-justify"></i></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de ¿Ángeles caídos o antropoides erguidos?">
							Artículos
						</a>
					</li>
					<li class="">
						<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=documentos" title="Documentos de ¿Ángeles caídos o antropoides erguidos?">
							Documentos y herramientas de ayuda
						</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</div>
<?php endif; ?>


<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'el-arte-y-la-virtud-del-cuidado' ) : ?>
	<div class="container">
		<div class="col-lg-12 DescripcionPrograma">
			<div class="row">
				<div class="col-lg-12">
					<p>
						<a class="btn btn-default" href='index.php?content=programas-especiales' title="Programas Especiales">
							<i class='fa fa-arrow-left'></i> Volver a Programas Especiales
						</a>
					</p>
					<h1 class="DescripcionPrograma-titulo">El arte y la virtud del cuidado</h1>
					<span class="DescripcionPrograma-subTitulo">Por Dra. Nancy Castrillón (Psicóloga)</span>
					<br>
					<p>
						Cuidar es un arte. En este espacio la Dra. Nancy Castrillón, licenciada en psicología, máster en Neurorehabilitación y Humanidades; nos enseña sobre el arte de cuidar. "Cuidar de mi para poder cuidar de otros".
					</p>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="DescripcionPrograma-imgAutor col-lg-1">
					<img class="img-circle" src="/img/Nancy_Castrillon.png" width="80" alt="Nancy Castrillón">
				</div>
				<div class="DescripcionPrograma-autorAbout col-lg-11">
					<strong>Sobre Nancy Castrillón:</strong> Psicóloga con especialización en Psicología clínica; máster en Humanidades, y máster en Neurorehabilitación y Enfermedades Neurodegenerativas.
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
	<div class="container">
		<nav class="navbar navbar-inverse" id="nav2">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
					<span>Secciones  <i class="fa fa-align-justify"></i></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de El arte y la virtud del cuidado">
								Artículos
							</a>
						</li>
						<li class="">
							<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=documentos" title="Documentos de El arte y la virtud del cuidado">
								Documentos y herramientas de ayuda
							</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
<?php endif; ?>


<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'infantopsicologia' ) : ?>
	<div class="container">
		<div class="col-lg-12 DescripcionPrograma">
			<div class="row">
				<div class="col-lg-12">
					<p>
						<a class="btn btn-default" href='index.php?content=programas-especiales' title="Programas Especiales">
							<i class='fa fa-arrow-left'></i> Volver a Programas Especiales
						</a>
					</p>
					<h1 class="DescripcionPrograma-titulo">Infantopsicología</h1>
					<span class="DescripcionPrograma-subTitulo">Por Lic. Marcela Monte (Psicóloga)</span>
					<br>
					<p>
						Espacio desarrollado para ofrecer, a los adultos responsables de la crianza y 
						educación de niños y niñas, herramientas y recursos que apoyen un 
						desarrollo temprano saludable.
					</p>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="DescripcionPrograma-imgAutor col-lg-1">
					<img class="img-circle" src="/images/Marcela_Monte.jpg" width="80" alt="Marcela Monte">
				</div>
				<div class="DescripcionPrograma-autorAbout col-lg-11">
					<strong>Sobre Marcela Monte:</strong> Licenciada en Psicología mención Cognitivo-Integrativa y Diploma de Honor de la Universidad Nacional de San Luis, especializada en Psicoterapia Breve Infantojuvenil. Trabaja actualmente como psicoterapeuta infantil. Se ha desempeñado en Servicios de Neonatología, Pediatría y Obstetricia, en diseño y ejecución de programas de asistencia a futuros padres y madres, recién nacidos sanos y de alto riesgo hospitalizados, bebés y niños en procesos de intervenciones quirúrgicas, y con enfermedades crónicas, talleres de capacitación en prevención y promoción de la salud mental infanto-juvenil para Equipos Interdisciplinarios de Salud y Educación.
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
	<div class="container">
		<nav class="navbar navbar-inverse" id="nav2">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed btnCategorias" data-toggle="collapse" data-target=".menuArticulos">
					<span>Secciones  <i class="fa fa-align-justify"></i></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menuArticulos" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&alias=infantopsicologia' ? 'active' : '' ); ?>">
							<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de Infantopsicología">
								Artículos
							</a>
						</li>
						<li class="active">
							<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>" title="Documentos de Infantopsicología">
								Documentos y herramientas de ayuda
							</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
<?php endif; ?>


<?php if ( !isset($_REQUEST['slug']) ) : ?>
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
											echo('<li class="'.$active.'"><a href="/index.php?content=articulos&categoria='.$categorias['id'].'" title="'.$categorias['nombre'].'">'.$categorias['nombre'].'</a></li>');
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
<?php endif; ?>
<?php
	$n=0;
	if(isset($_REQUEST['id'])===true){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM articulos WHERE id='$_REQUEST[id]' AND status = 1"));	
	}
	if( (isset($_REQUEST['id'])===true) && ($n==1) ){
		// Aquí va el contenido del artículo
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM articulos WHERE id = $_REQUEST[id] AND status = 1 ORDER BY fecha_publicacion DESC"));
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
						
						<?php 
							/*if(
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
							}else{ */?>
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
											<img class="img img-responsive inner" src="/admin/_lib/file/imgarticulos/<?php echo $data['imagen'] ?>" alt="<?= $data['titulo']; ?>" />
										</div>
									</div>
									
									<div class="row SocialMenu">
										<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
											<?php
												$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
												$actual_link = urlencode($actual_link);
											?>
											<button class="SocialMenu-button facebook" data-title="<?= $data['titulo']; ?>" data-href="https://www.facebook.com/share.php?u=<?= $actual_link ?>&title=<?= $data['titulo']; ?>">
												<i class="fa fa-facebook"></i> Compartir en Facebook
											</button>
										</div>
										<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
											<button class="SocialMenu-button twitter" data-title="<?= $data['titulo']; ?>" data-href="https://twitter.com/intent/tweet?status=<?= $data['titulo']; ?>+<?= $actual_link; ?>">
												<i class="fa fa-twitter"></i> Compartir en Twitter
											</button>
										</div>
										<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
											<button class="SocialMenu-button google" data-title="<?= $data['titulo']; ?>" data-href="https://plus.google.com/share?url=<?= $actual_link; ?>" rel="publisher">
												<i class="fa fa-google"></i> Compartir en Google
											</button>
										</div>
									</div>
									
									<div class="row articulos-compartir">
										<div class="col-lg-6 col-md-6 col-sm-6">
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
										<div class="col-lg-6 col-md-6 col-sm-6">
											<button class="btn btn-primary compartirAmigo"><i class="fa fa-share-square-o"></i> Compartir con un amigo</button>
										</div>
									</div>
									
									<hr>
									
									<div class="row">
										<div class="col-md-12 contenidoArticulos">
											<?php
												$length = strlen( $data['contenido'] );
												$length = $length/2;
												$length = round( $length );

												$str_to_insert = '<div class="banner300x250" style="float: right; margin-left: 1rem;">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Web App - Artículos Categoría Der 1 -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-5955686545071577"
				     data-ad-slot="2903925647"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>';

												$newstr = substr_replace($data['contenido'], $str_to_insert, $length, 0);

												$newstr = inject_ad_text_after_n_chars($data['contenido']);

												echo $newstr;
											?>
											<p><a href="https://www.elartedesabervivir.com/guias/7" target="_blank"><img alt="Guías prácticas de Walter Riso con precio especial" src="https://www.mediafire.com/convkey/6e86/ww4mxv6neumw39r6g.jpg" style="height:250px; width:300px" /></a></p>
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
								<div class="row SocialMenu">
									<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
										<button class="SocialMenu-button facebook" data-title="<?= $data['titulo']; ?>" data-href="https://www.facebook.com/share.php?u=<?= $actual_link ?>&title=<?= $data['titulo']; ?>">
											<i class="fa fa-facebook"></i> Compartir en Facebook
										</button>
									</div>
									<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
										<button class="SocialMenu-button twitter" data-title="<?= $data['titulo']; ?>" data-href="https://twitter.com/intent/tweet?status=<?= $data['titulo']; ?>+<?= $actual_link; ?>">
											<i class="fa fa-twitter"></i> Compartir en Twitter
										</button>
									</div>
									<div class="SocialMenu-container col-lg-4 col-md-4 col-sm-4 text-center">
										<button class="SocialMenu-button google" data-title="<?= $data['titulo']; ?>" data-href="https://plus.google.com/share?url=<?= $actual_link; ?>" rel="publisher">
											<i class="fa fa-google"></i> Compartir en Google
										</button>
									</div>
								</div>
								<br>
								<hr>
								<div class="row">
									<h3>Artículos recomendados</h3>
									<?php
										/*echo "<pre>";
										var_dump($_REQUEST);
										echo "</pre>";*/
										if ( !empty( $_REQUEST['content'] ) && $_REQUEST['content'] == 'articulos' && !isset($_REQUEST['slug']) ) {
											$sql_rel = 'SELECT * FROM articulos WHERE categoria like "%'.$data['categoria'].'%" AND status = 1 ORDER BY RAND() LIMIT 3';
										}else if ( !empty( $_REQUEST['slug'] ) && $_REQUEST['slug'] == 'programas-especiales' ) {
											$id_program = getIdPrograma($_REQUEST['alias']);

											/*echo "<pre>";
											var_dump($id_program);
											echo "</pre>";*/

											$sql_rel = 'SELECT * FROM articulos WHERE programas_especiales = '.$id_program.' AND status = 1 ORDER BY RAND() LIMIT 3';
										}
										$result = mysqli_query($con, $sql_rel);
										/*$related_cat = mysqli_fetch_array(mysqli_query($con, $sql_rel));*/
										
										/*echo "<pre>";
										var_dump($data['categoria']);
										echo "</pre>";*/
										/*echo "<pre>";
										var_dump(count($related_cat));
										echo "</pre>";*/
										$num_articles = mysqli_num_rows($result);

										if ( $num_articles > 0 ) {
											while($c = mysqli_fetch_assoc($result)){
												$titulo = removeUnwantedChars($c['titulo']);
									?>
									<div class="col-lg-4">
										<?php
											if ( $c['programas_especiales'] > 0 ) {
										?>
										<a href="/index.php?slug=programas-especiales&alias=<?= $_REQUEST['alias'] ?>&content=articulos&titulo=<?= $titulo ?>&id=<?= $c['id'] ?>" title="<?= $c['titulo']; ?>">
										<?php
											}else{
										?>
										<a href="/index.php?content=articulos&titulo=<?= $titulo ?>&id=<?= $c['id'] ?>" title="<?= $c['titulo']; ?>">
										<?php
											}
										?>
											<img class="img img-responsive inner" src="/admin/_lib/file/imgarticulos/<?php echo $c['imagen'] ?>" alt="<?= $c['titulo']; ?>"/>
										</a>

										<?php
											if ( $c['programas_especiales'] > 0 ) {
										?>
										<a href="/index.php?slug=programas-especiales&alias=<?= $_REQUEST['alias'] ?>&content=articulos&titulo=<?= $titulo ?>&id=<?= $c['id'] ?>" title="<?= $c['titulo']; ?>">
										<?php
											}else{
										?>
										<a href="/index.php?content=articulos&titulo=<?= $titulo ?>&id=<?= $c['id'] ?>" title="<?= $c['titulo']; ?>">
										<?php
											}
										?>
											<h3>
												<?= strtok(wordwrap($c['titulo'], 40, "...\n"), "\n") ?>
											</h3>
										</a>
										<p class="text-justify">
											<?= substr(strip_tags($c['contenido']), 0, 200); ?>...
										</p>
									</div>
									<?php
											}
										}

									?>
								</div>
								<hr>
								<br>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<p class="lead">Comparte tus comentarios</p>
									<hr>
									<?php
										$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									?>
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1555280741417343";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									
									<div class="fb-comments" data-href="<?= $actual_link; ?>" data-width="100%" data-numposts="5"></div>
									
									<hr>
									<?php
										if(!isset($_SESSION['id'])){
											echo '
												<p>Para poder comentar este artículo debes ser un usuario registrado. <a class="btn btn-default" href="javascript:void(0)" onclick="openRegisterModal()" title="Regístrate">Regístrate</a> o ingresa haciendo click <a class="btn btn-default" href="javascript:void(0)" onclick="openLoginModal()" title="ingresa haciendo click">aquí</a>.</p>
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
										$sql="SELECT * FROM comentarios WHERE articulo = '$data[id]' AND status = 1 AND ISNULL(parent) ORDER BY creado DESC";
										$q=mysqli_query($con, $sql);
										$n=mysqli_num_rows($q);
									?>
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<h4>Comentarios</h4>
													<hr>
												</div>
											</div>
											<div class="SeccionComentarios">
												
									<?php
										if($n<1){
									?>
												<div class='row'>
													<div class='col-lg-12 col-md-12 col-sm-12'>
														<p>Este artículo aún no tiene comentarios.</p>
													</div>
												</div>
									<?php
										}else{
											while($c=mysqli_fetch_assoc($q)){
									?>
													<div class='row'>
														<div class='col-lg-12 col-md-12 col-sm-12'>
															<div class="row">
																<div class='globo-comentarios'>
																	<?= $c['comentarios'] ?>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-3 col-lg-offset-9 col-md-3 col-sm-12">
																	<div class='meta-comentarios'>
																		Por <?= getMetaComentarios($c['usuario']); ?>
																		<?php if ( !empty( $_SESSION['id'] ) ): ?>
																		<a href="javascript:;" class="getResponseForm">Responder</a>
																		<?php endif; ?>
																	</div>
																</div>
															</div>
															<?php if ( !empty( $_SESSION['id'] ) ): ?>
															<div class="row ResponseContainerForm" style="display:none;">
																<form class="ResponseForm">
																	<div class="col-lg-10 col-lg-offset-2">
																		<div class="row">
																			<div class="col-lg-12 col-md-12 col-sm-12 form-group">
																				<textarea class="form-control" name="comentario" placeholder="Escribe aquí tu respuesta" required ></textarea>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-lg-12 col-md-12 col-sm-12 form-group">
																				<input type="hidden" name="articulo" value="<?= $data['id'] ?>" />
																				<input type="hidden" name="usuario" value="<?= $_SESSION['id'] ?>" />
																				<input type="hidden" name="parent" value="<?= $c['idComentarios'] ?>">
																				<button type="submit" class="btn btn-primary">Enviar comentario</button>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
															<?php endif ?>
														</div>
														<?php
															$sql2="SELECT * FROM comentarios WHERE articulo = '$data[id]' AND status = 1 AND parent = $c[idComentarios] ORDER BY creado DESC";
															$l=mysqli_query($con, $sql2);
															$m=mysqli_num_rows($l);
															while($d=mysqli_fetch_assoc($l)){
														?>
														<div class="row sub-comment">
															<div class="col-lg-10 col-lg-offset-2">
																<div class='globo-comentarios'>
																	<?= $d['comentarios'] ?>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-3 col-lg-offset-9 col-md-3 col-sm-12">
																	<div class='meta-comentarios'>
																		Por <?= getMetaComentarios($d['usuario']); ?>
																	</div>
																</div>
															</div>
														</div>
														<?php
															}
														?>	
													</div>
									<?php
											}
										}
									?>
											</div>
								</div>
							</div>		
							<?php /*}*/ ?>
						
						<!-- INICIO DE BANNER MOVIL CAMPAÑA -->
						<!-- <div class="row">
							<div class="col-md-12">
								<div class="bannerMovilCampana">
									<a href="index.php?content=paquetes&id=1" target="_blank">
										<img src="/img/bannerPaquete1.jpg" />
									</a>
								</div>
							</div>
						</div> -->
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
									/*$sql="SELECT * FROM articulos WHERE status = 1 AND categoria != 1 AND categoria != 15 AND categoria != 16";
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
									}*/
									echo getAjaxArticle();
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
				var load = 1;
				$(window).scroll(function(){
					if($(window).scrollTop() == $(document).height() - $(window).height())
					{
						$('.load').fadeIn();
						load++;

						$.ajax({
							url: '/includes/php.php',
							type: 'POST',
							dataType: 'json',
							data: {
										consulta: 'getAjaxArticle',
										page: load,
										categoria: "<?= (int)$_REQUEST['categoria']; ?>"
									},
						})
						.done(function(data) {
							$('.divArticulos').append(data.html);
						  	$('.load').fadeOut();
						  	window.sr.init();
						  	/*console.log('success');*/
						})
						.fail(function() {
							/*console.log("error");*/
						})
						.always(function() {
							/*console.log("complete");*/
						});
						


						/*$.post('/includes/php.php',{
						  consulta: "getAjaxArticle",
						  categoria: "<?php echo $_REQUEST['categoria'] ?>",
						  load: load
						}).done(function(data){
						  $('.divArticulos').append(data);
						  $('.load').fadeOut();
						});*/
					}
				});
			});
		</script>
		<?php
	}elseif ( isset($_REQUEST['content']) && $_REQUEST['content']=='articulos' && !isset($_REQUEST['id']) ) {
?>
		<script>
			$(document).ready(function(){
				var load = 1;
				$(window).scroll(function(){
					if($(window).scrollTop() == $(document).height() - $(window).height())
					{
						$('.load').fadeIn();
						load++;

						$.ajax({
							url: '/includes/php.php',
							type: 'POST',
							dataType: 'json',
							data: {
										consulta: 'getAjaxArticle',
										page: load,
									},
						})
						.done(function(data) {
							$('.divArticulos').append(data.html);
						  	$('.load').fadeOut();
						  	window.sr.init();
						  	/*console.log('success');*/
						})
						.fail(function() {
							/*console.log("error");*/
						})
						.always(function() {
							/*console.log("complete");*/
						});
						


						/*$.post('/includes/php.php',{
						  consulta: "getAjaxArticle",
						  categoria: "<?php echo $_REQUEST['categoria'] ?>",
						  load: load
						}).done(function(data){
						  $('.divArticulos').append(data);
						  $('.load').fadeOut();
						});*/
					}
				});
			});
		</script>			
<?php
	}
?>

<script>
	$('body').on('click', 'button[data-href]', function(event) {
		event.preventDefault();
		var url = $(this).data('href');
		var title = $(this).data('title');
		var features = 'scrollbars=yes,width=650,height=500';
		window.open(url,title,features);
	});

	if ( $('.getResponseForm').length > 0 ) {
		$('body').on('click', '.getResponseForm', function(event) {
			event.preventDefault();
			$(this).parents('.row').next('.ResponseContainerForm').slideToggle('fast');
		});

		$('.ResponseForm').each(function(index, el) {
			$(this).submit(function(e) {
				e.preventDefault();
			}).validate({
				rules: {
					new_password: {
						minlength: 8
					}
				},
				submitHandler: function(form){

					$('.load').fadeIn();
					
					console.log($(form).find('.form-control').val());

					$.ajax({
						type: "POST",
						url: "/includes/php.php",
						dataType: 'json',
						context: $(form),
						data: {
							consulta: "agregarSubComentarios",
							comment: $(form).find('.form-control').val(),
							articulo: $(form).find('input[name="articulo"]').val(),
							usuario: $(form).find('input[name="usuario"]').val(),
							parent: $(form).find('input[name="parent"]').val()
						}
					})
					.done(function(data){
						if ( parseInt(data.error) === 0 ) {
							var parent = $(form).parents('.ResponseContainerForm').parent();
							var firstEl = parent.next();

							$( data.comment ).insertAfter( parent );
						}else{
							bootbox.alert(data.message, function() {console.log("Alert Callback");});
						}

						$('.form-control').val('');
						$('.load').fadeOut();
					});
				}
			});
		});

	}
</script>
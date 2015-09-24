<div class="row top">
	<div class="container">
		<div class="col-md-12">
			<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'fitness-set' ) : ?>
			<div class="row">
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
							<img class="img-circle" src="/img/daniel-martinez.png" width="80" alt="Daniel Martínez">
						</div>
						<div class="DescripcionPrograma-autorAbout col-lg-11">
							<strong>Sobre Daniel Martínez:</strong> Licenciado en Ciencias de la Actividad Física y el Deporte de la Universidad de Barcelona en INEFC (2008-2013), Técnico de fitness en complejos deportivos municipales en El Prat de Llobregat, Barcelona (2008-2009), Técnico de fitness en Complejo Deportivo Baldiri Aleu, Sant Boi, Barcelona (2010-2011), Federado en Taekwondo desde los 6 años (1996), actividad que ejerció dictando clases y enseñando su importancia. Desde el año 2013 es entrenador Personal en Dir Seven, Barcelona.
						</div>
					</div>
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
			<div class="row">
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
									<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=rutinas" title="Artículos de Mente sana, vida sana">
										Rutinas de ejercicio
									</a>
								</li>
								<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && $_REQUEST['section'] == 'recetas' ? 'active' : '' ) ?>">
									<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=recetas" title="Recetas de Mente sana, vida sana">
										Recetas
									</a>
								</li>
								<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && $_REQUEST['section'] == 'tips' ? 'active' : '' ) ?>">
									<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>&section=tips" title="Tips de Mente sana, vida sana">
										Tips
									</a>
								</li>
								<li class="<?= ( $_REQUEST['alias'] == 'fitness-set' && !isset( $_REQUEST['section'] ) ? 'active' : '' ) ?>">
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
				<div class="row">
					<div class="col-lg-12 DescripcionPrograma">
						<div class="row">
							<div class="col-lg-12">
								<p>
									<a class="btn btn-default" href='index.php?content=programas-especiales' title="Programas Especiales">
										<i class='fa fa-arrow-left'></i> Volver a Programas Especiales
									</a>
								</p>
								<h1 class="DescripcionPrograma-titulo">Mente sana, vida sana</h1>
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
								<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&alias=mente-sana-vida-sana' ? 'active' : '' ); ?>">
									<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Articulos de Mente sana, vida sana">
										Articulos
									</a>
								</li>
								<li class="active">
									<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>" title="Documentos de Mente sana, vida sana">
										Documentos y herramientas de ayuda
									</a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
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
								<strong>Sobre Luis Flórez:</strong> Psicólogo, Magister en Análisis Experimental de la Conducta y Doctor en Psicología Experimental. Actualmente es profesor Titular, adscrito al Departamento de Psicología de la Universidad Nacional de Colombia y director de la línea de investigación sobre Modelos Psicosociales en Prevención y Promoción de la Salud, en el grupo de investigación Estilo de Vida y Desarrollo Humano. Director del Centro de Estudios e Investigaciones sobre Adicciones y Violencia (CEIAV) de la Universidad Católica de Colombia.
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
									<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&angeles-caidos-o-antropoides-erguidos' ? 'active' : '' ); ?>">
										<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Articulos de ¿Ángeles caídos o antropoides erguidos?">
											Articulos
										</a>
									</li>
									<li class="active">
										<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>" title="Documentos de ¿Ángeles caídos o antropoides erguidos?">
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
										<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&alias=el-arte-y-la-virtud-del-cuidado' ? 'active' : '' ); ?>">
											<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>" title="Artículos de El arte y la virtud del cuidado">
												Articulos
											</a>
										</li>
										<li class="active">
											<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>" title="Documentos de El arte y la virtud del cuidado">
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
												Articulos
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
		</div>
	</div>
</div>
<?php if ( $_REQUEST['section'] == 'documentos' ): ?>
	<div class="row">
		<div class="container">
			<div class="col-lg-12">
				<?php

					$dir = getcwd().'/archivos-programas/'.$_REQUEST['alias'];

					$files2 = scandir($dir, 1);
					$files = preg_grep('/^([^.])/', $files2);

					$special_links = array();
					$special_title = array();
				?>

					
				<ul>
				<?php 
					if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'mente-sana-vida-sana' ) {
						$special_links[] = 'data-jsfunction="indiceMasaCorporal"';
						$special_title[] = 'Indice de masa corporal.';
					}
				?>
				<?php
					foreach ($files as $key => $value) {
				?>
					<li>
						<a href="javascript:;" data-filename="<?php echo $value; ?>" data-alias="<?php echo $_REQUEST['alias']; ?>" title="<?= $value; ?>">
							<?php echo $value; ?>
						</a>
					</li>
				<?php
					}
					foreach ($special_links as $key => $value) {
				?>
					<li>
						<a href="javascript:;" <?php echo $value; ?> data-titulo="<?php echo $special_title[$key]; ?>" title="<?= $special_title[$key]; ?>">
							<?php echo $special_title[$key]; ?>
						</a>
					</li>
				<?php
					}
				?>
				</ul>


				<?php
					if ( count($files) == 0 && count($special_links) == 0 ) {
				?>
					<h4>No hay documentos en estos momentos.</h4>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		$('body').on('click', 'a[data-filename]', function(event) {
			event.preventDefault();
			
			$.ajax({
				url: 'http://www.elartedesabervivir.com/includes/php.php',
				type: 'POST',
				dataType: 'json',
				data: {
					consulta: 'validarLoggeo'
				},
				context: this
			})
			.done(function(data) {
				if ( parseInt(data.error) === 0 ) {
					$('<form action="http://www.elartedesabervivir.com/includes/php.php" method="POST"><input type="hidden" name="file_name" value="' + $(this).data('filename') + '" /> <input type="hidden" name="alias" value="' + $(this).data('alias') + '" /><input type="hidden" name="consulta" value="descargarArchivosProgramas" /></form>').appendTo('body').submit();
				}else{
					modal('Error al descargar el archivo', '<p>Debe estar registrado para poder descargar los documentos.</p>');
				}
			})
			.fail(function() {
				
			})
			.always(function() {
				
			});
		});

		$('body').on('click', 'a[data-jsfunction]', function(event) {
			event.preventDefault();
			
			var fn = window[$(this).data('jsfunction')];

			console.log($(this).data('jsfunction'));
			fn( $(this).data('titulo') );
		});

		function indiceMasaCorporal (titulo) {

				var string = '<div>';
					string += '<iframe src="http://widgets.calculatestuff.com/?token=1e3ba18e1113" frameborder="0" width="100%" height="500" scrolling="no" style="border:none;" id="1e3ba18e1113"></iframe>';
					string += '<script type="text/javascript">';
					string += '(function() {var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src="http://cdn.calculatestuff.com/resizer.js";(document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(s);})();';
					string += '</scr'+'ipt>';
					string += '</div>';
					
					modal(titulo, string);
		}	
	</script>
<?php endif ?>

<?php if ( $_REQUEST['section'] == 'rutinas' ): ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/hdpvgphaANA" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<p>
					En este video de introducción, Daniel nos explica qué debemos hacer día a día y cómo lo debemos hacer para así trabajar continuamente. Serán 5 los videos de rutina de ejercicios, el ideal es repartir estas 5 rutinas en los 7 días de la semana.
				</p>
				
				<h4>
					Estos videos se pueden describir así:
				</h4>
				 
			 	<ul>
			 		<li>
						<strong>VIDEO #1:</strong> Nos enseña ejercicios de plancha, se realizan ejercicios cardiovasculares, se trabajan cadenas de empuje y se realizan ejercicios de fuerza y resistencia.
			 		</li>
			 		<li>
						<strong>VIDEO #2:</strong> Cuenta con 8 ejercicios en un circuito, se mezcla trabajo cardiovascular con trabajo muscular.
			 		</li>
			 		<li>
						<strong>VIDEO #3:</strong> Este video nos muestra trabajo totalmente cardiovascular. Se muestran 8 ejercicios aeróbicos.
			 		</li>
			 		<li>
						<strong>VIDEO #4:</strong> Aquí nos muestra 9 ejercicios de core abdominal, lumbar y de gluteos.
			 		</li>
			 		<li>
						<strong>VIDEO #5:</strong> Este video es una mezcla de los 4 videos antes explicados, Se mezcla trabajo de resistencia, aeróbico y de fuerza.
			 		</li>
			 	</ul>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/dBK_AGZlDWE" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>Rutina Fitness Estiramiento - Todos los días</h3>
				<p>
					En este video Daniel nos enseña ejercicios de estiramiento para aplicar día a día antes y después de la rutina de entrenamiento.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/iDiHEjxAVZc" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>
					Rutina Fitness - Día 1:	<br> Fuerza y Resistencia
				</h3>
				<p>
					Nos enseña ejercicios de plancha, se realizan ejercicios cardiovasculares, se trabajan cadenas de empuje y se realizan ejercicios de fuerza y resistencia.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/fXKZta7qnUM" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>
					Rutina Fitness - Día 2: <br> Cardiovascular - Muscular
				</h3>
				<p>
					Cuenta con 8 ejercicios en un circuito, se mezcla trabajo cardiovascular con trabajo muscular.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/Z3pMxc44Rt4" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>
					Rutina Fitness - Día 3: <br> Aeróbicos
				</h3>
				<p>
					Este video nos muestra trabajo totalmente cardiovascular. Se muestran 8 ejercicios aeróbicos.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/zFDvBg-ClnY" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>
					Rutina Fitness - Día 4: <br> Abdomen, Espalda y Glúteos
				</h3>
				<p>
					Aquí nos muestra 9 ejercicios de core abdominal, lumbar y de gluteos.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" width="853" height="480" src="https://www.youtube.com/embed/MKVeqEw60Y4" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>
					Rutina Fitness - Día 5: <br> Resistencia, Aeróbico y Fuerza.
				</h3>
				<p>
					Este video es una mezcla de los 4 videos antes explicados, Se mezcla trabajo de resistencia, aeróbico y de fuerza.
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1555280741417343";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-comments" data-href="http://www.elartedesabervivir.com/programas-especiales/fitness-set/rutinas" data-width="100%" data-numposts="5"></div>
		</div>
	</div>
<?php endif ?>
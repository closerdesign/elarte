<div class="row top">
	<div class="container">
		<div class="col-md-12">
				<?php if ( isset($_REQUEST['alias']) && $_REQUEST['alias'] == 'mente-sana-vida-sana' ) : ?>
				<div class="row">
					<div class="col-lg-12 DescripcionPrograma">
						<div class="row">
							<div class="col-lg-12">
								<p><a class="btn btn-default" href='index.php?content=programas-especiales'><i class='fa fa-arrow-left'></i> Volver a Programas Especiales</a></p>
								<h1 class="DescripcionPrograma-titulo">Mente sana, vida sana</h1>
								<span class="DescripcionPrograma-subTitulo">Por Dra. Iris Luna (Psiquiatra y nutricionista)</span>
								<br>
								<p>
									Armonía entre cuerpo y mente. En este espacio la Dra. Iris Luna pretende a través de artículos, documentos, videos y otros materiales poner al alcance de nuestra comunidad herramientas y pautas para alcanzar un balance de bienestar entre cuerpo y mente.
								</p>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="DescripcionPrograma-imgAutor col-lg-1">
								<img class="img-circle" src="/images/iris.jpg" width="80">			
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
									<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>">
										Articulos
									</a>
								</li>
								<li class="active">
									<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>">
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
									<a class="btn btn-default" href='index.php?content=programas-especiales'>
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
								<img class="img-circle" src="/img/Luis_Florez_Alarcon.jpg" width="80">
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
									<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&alias=mente-sana-vida-sana' ? 'active' : '' ); ?>">
										<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>">
											Articulos
										</a>
									</li>
									<li class="active">
										<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>">
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
										<a class="btn btn-default" href='index.php?content=programas-especiales'>
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
									<img class="img-circle" src="/img/Nancy_Castrillon.png" width="80">
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
										<li class="<?php echo ( $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] == '/index.php?content=programas-especiales&alias=mente-sana-vida-sana' ? 'active' : '' ); ?>">
											<a href="/index.php?content=programas-especiales&alias=<?php echo $_REQUEST['alias']; ?>">
												Articulos
											</a>
										</li>
										<li class="active">
											<a href="/index.php?content=archivos-programas&alias=<?php echo $_REQUEST['alias']; ?>">
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
<div class="row">
	<div class="container">
		<div class="col-lg-12">
			<?php

				$dir = getcwd().'/archivos-programas/'.$_REQUEST['alias'];

				$files2 = scandir($dir, 1);
				$files = preg_grep('/^([^.])/', $files2);

				if ( count($files) == 0 ) {
			?>
			<h4>No hay documentos en estos momentos.</h4>
			<?php
				}

			?>
			<ul>
			<?php
				foreach ($files as $key => $value) {
			?>
				<li>
					<a href="javascript:;" data-filename="<?php echo $value; ?>" data-alias="<?php echo $_REQUEST['alias']; ?>"><?php echo $value; ?></a>
				</li>
			<?php
				}
			?>
			</ul>
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
			if ( data.error == 0 ) {
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

			
</script>
<?php
	$sql="SELECT * FROM paquetes WHERE idPaquete = '$_REQUEST[id]' AND status = 1";
	$q=mysqli_query($con, $sql);
	$data=mysqli_fetch_array($q);

	if( (isset($_SESSION['id']) && (!isset($_COOKIE['modal'])) ))
	{
	?>
		<script>
				$(document).ready(function(){
	
					if (!$('#myModalCompletaRegistro').is(':visible')) {
						$('#PaquetesModal').modal('show');
						$.cookie('modal',1);
					}
				});
		</script>
	<?php
	} 
	?>
	<div class="row top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1 class="text-center tituloPublicacionInner">
						Colección de las 5 guías prácticas de Walter Riso en formato PDF
					</h1>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<p>Estas guías son una excelente herramienta para iniciar un proceso de mejora y crecimiento personal. Basado en sus más de 30 años de experiencia como psicólogo terapeuta y en sus amplias investigaciones y estudios, Walter Riso nos muestra de una forma sencilla y totalmente práctica los pasos a seguir para lograr objetivos de crecimiento y mejora en nuestra vida emocional.</p>
									<p>Cada tomo de este paquete puede ser leí­do y llevado a la práctica de forma independiente, no llevan una secuencia ni son parte integral de una misma obra. Sin embargo, la unión de todas son un excelente complemento para tener una vida emocional saludable.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<img class="img img-rounded img-responsive" src="/admin/_lib/file/imgpaquetes/<?= $data['portada'] ?>" alt="<?= $data['nombre'] ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php if(isset($_SESSION['id'])){ ?>
									<p class="text-center">
										<center>
											<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar</button>
										</center>
									</p>
									<?php }else{ ?>
									<p class="text-center">
										<center>
											<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar</button>
										</center>
									</p>
									<?php } ?>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2 class="text-center the_grey">
								Lleva hoy la colección completa de guías prácticas de Walter Riso con <span class="orange">30% dto</span>
							</h2>
							<h3 class="text-center">
								Precio actual: USD <?= number_format($data['precio'],2) ?>
							</h3>
							<h4 class="text-center tachado">
								<s>Precio normal: USD $34.95</s>
							</h4>
							<?php
								$pubahorro=explode(',', $data['publicaciones']);
								$total_normal=0;
								foreach($pubahorro as $pah){
									$total_normal+=getPrecioPublicacion($pah);
								}
								$ahorro=$total_normal-$data['precio'];
							?>
							<!-- <p class="text-center">
								<span style="color:red">¡AHORRAS USD <?= number_format($ahorro,2) ?>!</span>
							</p> -->
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<h1 class="text-center">¡Una oportunidad que no te puedes perder!</h1>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<style>
								.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
							</style>
							<div class='embed-container'>
								<iframe src='https://www.youtube.com/embed/<?= $data['video'] ?>?autoplay=true&rel=0' frameborder='0' allowfullscreen>
								</iframe>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<p class="lead">Esta colección contiene:</p>
							<ul>
								<?php
									$publicaciones=explode(',', $data['publicaciones']);
									foreach($publicaciones as $pub){
								?>
									<li><?= getNombrePublicacion($pub) ?> - <?= $displayFormatos[getFormatoPublicacion($pub)] ?></li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<p class="lead text-center">-BEST SELLER-<br />"Más de 65,000 copias vendidas"</p>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModalRegistroPaquete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">¡Atención!</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>Para poder agregar esta colección a tu biblioteca, debes registrarte o iniciar sesión en tu cuenta.</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="iniciaPaquete" type="button" class="btn btn-primary">Registrarme</button>
					<button id="RegistraPaquete" type="button" class="btn btn-primary">Iniciar sesión</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$('#iniciaPaquete').click(function(){
			$('#myModalRegistroPaquete').modal('hide');
			openRegisterModal();
		});
		$('#RegistraPaquete').click(function(){
			$('#myModalRegistroPaquete').modal('hide');
			openLoginModal();
		});
	</script>
	
	<!-- Modal -->
	<div class="modal fade" id="myModalPagoPaquetes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Agregar a Mi Biblioteca</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>
								<select class="form-control" name="paisMetodo" id="paisMetodo" required>
									<option value="">Selecciona el país desde donde realizarás el pago ...</option>
									<?= selectPaises(); ?>
								</select>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p>
								<select class="form-control" name="metodo" id="metodo" required style="display: none;">
								</select>
							</p>
						</div>
					</div>
					<hr>
					<div id="metodoPago" style="display:none;">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$('body').on('change', '#paisMetodo', function(event) {
			event.preventDefault();
			$('#metodo').slideUp();
			$('#metodoPago').slideUp();
			if ( $(this).val() !== '' ) {
				var data = {
								pais : $(this).val(),
								consulta : 'obtenerMediosDePago2'
							};
				$.ajax({
					url: '/includes/php.php',
					type: 'POST',
					dataType: 'json',
					data: data,
				})
				.done(function(data) {
					if ( data.error ) {
						$('#metodo').empty().html(data.html);
						$('#metodo').slideDown();
					}else{
						$('#metodo').slideUp();
					}
				});
			}else{
				$('#metodo').slideUp();
			}
		});
	
		$('body').on('change', '#metodo', function(event) {
			event.preventDefault();
			$('#metodoPago').slideUp();
			var data = {
				consulta : 'obtenerFormularioDePago2',
				metodo : $(this).val(),
				pagina : '',
				value : <?= $data['precio']; ?>,
				coleccion : true,
				id : <?= $_REQUEST['id'] ?>,
				nombre : '<?= $data["nombre"]; ?>'
			};
	
			$('#metodoPago').empty();
			$('#metodoPago').slideUp();
	
			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'html',
				data: data,
			})
			.done(function(data) {
				$('#metodoPago').html(data);
				$('#metodoPago').slideDown();
			});
		});
	</script>
	<!-- ClickDesk Live Chat Service for websites -->
	<script type='text/javascript'>
		var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDgsSBXVzZXJzGOKqsw4M');
		var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
		'http://my.clickdesk.com/clickdesk-ui/browser/');
		var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
		var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
		glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
		var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
	</script>
	<!-- End of ClickDesk -->
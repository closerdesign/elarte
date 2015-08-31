<?php if ( $_REQUEST['id'] == 2 ): ?>
	<?php include 'paquetes2.php'; ?>
<?php else: ?>
	<?php if( validaPaquete($_REQUEST['id']) == 1 ){ ?>

		<?php
			$sql="SELECT * FROM paquetes WHERE idPaquete = '$_REQUEST[id]' AND status = 1";
			$q=mysqli_query($con, $sql);
			$data=mysqli_fetch_array($q);
		?>
		<?php
			if( (isset($_SESSION['id']) && (!isset($_COOKIE['modal'])) ))
			{
				?>
				<script>
					$(document).ready(function(){
						$('#myModalPagoPaquetes').modal('show');
						$.cookie('modal',1);	
					});
				</script>
				<?php
			}
		?>
		<div class="row top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center tituloPublicacionInner"><?php echo $data['nombre'] ?></h1>
					</div>
				</div>
				<hr>
				<div class="row">
					
					<div class="col-md-6">
						<div class="row">
							
							<div class="col-md-12">
								<?php echo $data['descripcion'] ?>
							</div>
							
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<img class="img img-rounded img-responsive" src="/admin/_lib/file/imgpaquetes/<?php echo $data['portada'] ?>" alt="<?php echo $data['nombre'] ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<?php if(isset($_SESSION['id'])){ ?>
										<p class="text-center"><center><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar</button></center></p>
										<?php }else{ ?>
										<p class="text-center"><center><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar</button></center></p>
										<?php } ?>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-center">Precio Especial<br />USD <?php echo number_format($data['precio'],2) ?></h1>
								<?php
									$pubahorro=explode(',', $data['publicaciones']);
									$total_normal=0;
									foreach($pubahorro as $pah){
										$total_normal+=getPrecioPublicacion($pah);
									}
									$ahorro=$total_normal-$data['precio'];
								?>
								<p class="text-center"><span style="color:red">¡AHORRAS USD <?php echo number_format($ahorro,2) ?>!</span></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<p class="lead text-center">-BEST SELLER-<br />"Más de 65,000 copias vendidas"</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12">
									<h1 class="text-center">¡Una oportunidad que no te puedes perder!</h1>
									<?php
										if(
											($_REQUEST['id']==4) ||
											($_REQUEST['id']==5)
										){
											
											echo("<p class='lead text-center'>Lleva HOY las 5 guías prácticas de Walter Riso y quedarás inscrito completamente gratis a la conferencia virtual 'El Arte de Amar sin Apegos' que se llevará a cabo el próximo 25 de julio.</p><p class='text-center'><button data-toggle='modal' data-target='#myModalInfoConferencia' class='btn btn-default'>Conozca más acerca del evento <i class='fa fa-arrow-right'></i></button></p>");
										}
									?>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/<?php echo $data['video'] ?>?autoplay=true&rel=0' frameborder='0' allowfullscreen></iframe></div>
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
											echo("<li>".getNombrePublicacion($pub)." - ".$displayFormatos[getFormatoPublicacion($pub)]."</li>");
										}
										
									?>
								</ul>
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
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
										<?php echo selectPaises(); ?>
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
					value : <?php echo $data['precio']; ?>,
					coleccion : true,
					id : <?php echo $_REQUEST['id'] ?>,
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
		
			/*$('#pagoPaquete').validate({
				rules: {
					numero: {
						creditcard: true
					}
				},
				submitHandler: function(form){
					$('#myModalPagoPaquetes').modal('hide');
					$('.load').fadeIn();
					$.post('/includes/payu/loadTarjetasDeCreditoPaquetes.php',$('#pagoPaquete').serialize())
					.done(function(data){
						$('.form-control').val('');
						var response = JSON.parse(data);
						if(response.transactionResponse.state=='DECLINED'){
							$('#myModalVacioTitulo').html('Transacción rechazada');
							$('#myModalVacioContenido').html('<p>El medio de pago que utilizaste ha sido rechazado. Por favor inténtalo con otro medio de pago o comunícate con tu entidad bancaria.</p>');
							$('.load').fadeOut();
							$('#myModalVacio').modal('show');
						} else {
							
							if(
								(response.transactionResponse.state=='APPROVED') || 
								(response.transactionResponse.state=='PENDING') )
							{
								$.post('/includes/php.php',{
									consulta: "procesaPaquete",
									paquete: "<?php echo $_REQUEST['id'] ?>",
									usuario: "<?php echo $_SESSION['id'] ?>",
									estado: response.transactionResponse.state,
									orderId: response.transactionResponse.orderId,
									transactionId: response.transactionResponse.transactionId,
									pendingReason: response.transactionResponse.pendingReason,
									responseCode: response.transactionResponse.responseCode
								}).done(function(msg){
									if(msg===0){
										alert('Lo sentimos, se ha presentado un error. Por favor notificanos acerca de este inconveniente.');
										$('.load').fadeOut();
									}
									if( (msg==1) && (response.transactionResponse.state=='PENDING') ){
										$('#myModalVacioTitulo').html('Transacción en proceso de verificación');
										$('#myModalVacioContenido').html('<p>En este momento la transacción se encuentra en proceso de verificación por parte de la entidad bancaria.</p><p>Una vez culmine el proceso, recibirás una notificación por correo electrónico acerca del estado de tu compra.</p>');
										$('.load').fadeOut();
										$('#myModalVacio').modal('show');
									}
									if( (msg==1) && (response.transactionResponse.state=='APPROVED') ){
										alert('Transacción Aprobada. Ahora ya puedes descargar las publicaciones de "Mi Biblioteca". Pronto recibirás nuestras instrucciones para acceder a la Conferencia Virtual.');
										window.location.href="index.php?content=mi-cuenta&task=mis-publicaciones";
									}
								});
							}
						}
					});
				}
			});*/
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

	<?php }else{ ?>

		<div class="row top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>No se ha encontrado el paquete seleccionado.</p>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
<?php endif ?>
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
			})
			
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
			
			<div class="col-md-7">
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
						<?php echo $data['descripcion'] ?>
					</div>
				</div>
			</div>
			
			<div class="col-md-5">
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
					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<img class="img img-rounded img-responsive" src="/admin/_lib/file/imgpaquetes/<?php echo $data['portada'] ?>">
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
	})
	$('#RegistraPaquete').click(function(){
		$('#myModalRegistroPaquete').modal('hide');
		openLoginModal();
	})
</script>

<!-- Modal -->
<div class="modal fade" id="myModalPagoPaquetes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="pagoPaquete">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title" id="myModalLabel">Agregar a Mi Biblioteca</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p><button class="btn btn-default pull-right" id="btnPaypalPaquetes" codigoPaquete=<?php echo $_REQUEST['id'] ?> formaDePago="2" >
								<i class="fa fa-paypal"></i> Pagar con Paypal
							</button></p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<p class="lead text-center">Pagar con tarjeta de crédito</p>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Tipo</label>
									<select class="form-control" name="tipo" id="tipo" required >
										<option value="">Seleccione...</option>
										<option value="VISA">VISA</option>
										<option value="MASTERCARD">MASTERCARD</option>
										<option value="AMEX">AMERICAN EXPRESS</option>
										<option value="DINERS">DINERS</option>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<label>Número de tarjeta</label>
									<input type="text" class="form-control" name="numero" id="numero" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Nombre que figura en la tarjeta</label>
									<input type="text" class="form-control" name="nombre" id="nombre" required />
								</div>
								<div class="col-md-6 form-group">
									<label>Mes vencimiento</label>
									<select class="form-control" name="mes" id="mes" required >
										<option value="">Seleccione...</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Año vencimiento</label>
									<select class="form-control" name="ano" id="ano" required >
										<option value="">Seleccione...</option>
										<option value='2015'>15</option>
										<option value='2016'>16</option>
										<option value='2017'>17</option>
										<option value='2018'>18</option>
										<option value='2019'>19</option>
										<option value='2020'>20</option>
										<option value='2021'>21</option>
										<option value='2022'>22</option>
										<option value='2023'>23</option>
										<option value='2024'>24</option>
										<option value='2025'>25</option>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<label>Código de Seguridad</label>
									<input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" required />
								</div>
							</div>		
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="email" id="email" value="<?php echo getEmailUsuario($_SESSION['id']) ?>" />
					<input type="hidden" name="ciudad" id="ciudad" value="<?php echo getCiudadUsuario($_SESSION['id']) ?>" />
					<input type="hidden" name="precio" id="precio" value="<?php echo $data['precio'] ?>" />
					<input type="hidden" name="pais" id="pais" value="<?php echo getPaisUsuario($_SESSION['id']) ?>" />
					<input type="hidden" name="descripcion" id="descripcion" value="<?php echo $data['nombre'] ?>" />
					<input type="hidden" name="referencia" id="referencia" value="PKG-<?php echo $_SESSION['id'] ?>-<?php echo $_REQUEST['id'] ?>" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-credit-card"></i> Comprar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('#pagoPaquete').validate({
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
							if(msg==0){
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
						})
					}
					
				}
			})
		}
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
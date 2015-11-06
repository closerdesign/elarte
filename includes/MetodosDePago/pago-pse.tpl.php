<form id="pagoConPSE">
	<div>
		<h4>
			<i class="fa fa-university"></i> Pagar con Transferencia Bancaria PSE
		</h4>
	</div>
	<div class="modal-body">

		<div class="row">
			<div class="col-md-6 form-group">
				<select class="form-control" name="bancos" id="bancos" required >
					<option value=''>Seleccione banco...</option>
					<?php
						foreach ($banks as $bank) {
					?>
					<option value="<?= $bank->pseCode; ?>"><?= $bank->description; ?>"</option>
					<?php
						}			
					?>
				</select>
			</div>
			<div class="col-md-6 form-group">
				<input type="text" class="form-control" name="noIdentificacion" id="noIdentificacion" placeholder="No. Identificacion" required />
			</div>
		</div>
		<?php
		if (isset($_POST['pagina']) && $_POST['pagina'] == 'conferencia-amar-sin-apegos' || $_POST['pagina'] == 'conferencia-walter-riso') {
		?>
		<div class="row">
			<h5>Ingrese su código de descuento</h5>
			<div class="col-md-6 form-group">
				<input type="text" class="form-control" name="codigoDescuento" id="codigoDescuento" />
			</div>
			<div class="col-md-6 form-group">
				<button id="validarDecuento" type="button" class="btn btn-primary"><i class="fa fa-university"></i> Aplicar código</button>
			</div>
		</div>
		<div class="row">
			<span id="descuentoMensaje"></span>
		</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-lg-9 col-md-9">
				<p class="lead">
					Valor a pagar: USD 
					<span id="valorConferencia"><?= number_format($valor,2); ?></span>
				</p>
			</div>
			<div class="col-lg-3 col-md-3">
				<button type='submit' class='btn btn-primary'><i class='fa fa-paypal'></i> Continuar</button>
			</div>
		</div>
		<input type="hidden" name="tipoPersona" id="tipoPersona" value="N" />
		<input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?= getNombreUsuario($_SESSION['id']).' '.getApellidoUsuario($_SESSION['id']) ?>"/>
		<input type="hidden" name="emailPSE" id="emailPSE" value="<?= getEmailUsuario($_SESSION['id']);  ?>" />
		<input type="hidden" name="telefonoDiurno" id="telefonoDiurno" value="5717442384" />
		<input type="hidden" name="pedido" id="pedido" value="U<?php echo $_SESSION['id'] ?>L<?= $landing; ?>P<?php echo $_REQUEST['id'] ?>" />
		<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor; ?>" />
		<input type="hidden" name="consulta" id="consulta" value="pseRequest" />
		<input type="hidden" name="email" id="email" value="<?= getEmailUsuario($_SESSION['id']) ?>" />

		<script>
			$('#pagoConPSE').validate({
				submitHandler: function(form){
					<?php
						if ( isset($_POST['coleccion']) ) {
					?>
					$('#myModalPagoPaquetes').modal('hide');
					<?php
						}else{
					?>
					$('#myNuevoModal').modal('hide');
					<?php
						}
					?>
					cargar();

					$.ajax({
						url: '/includes/php.php',
						type: 'POST',
						dataType: 'json',
						data: $('#pagoConPSE').serialize(),
						timeout: 70000
					})
					.done(function(data) {
						<?php
							if ( isset($_POST['coleccion']) ) {
						?>
						if(data.transactionResponse.state=='DECLINED'){
							$('#myModalVacioTitulo').html('Transacción rechazada');
							$('#myModalVacioContenido').html('<p>El medio de pago que utilizaste ha sido rechazado. Por favor inténtalo con otro medio de pago o comunícate con tu entidad bancaria.</p>');
							$('.load').fadeOut();
							$('#myModalVacio').modal('show');
						} else {

							if(
								(data.transactionResponse.state=='APPROVED') || 
								(data.transactionResponse.state=='PENDING') )
							{
								$.post('/includes/php.php',{
									consulta: "procesaPaquete",
									paquete: "<?php echo $_REQUEST['id'] ?>",
									usuario: "<?php echo $_SESSION['id'] ?>",
									landing: "<?php echo $landing ?>",
									formaPago: "3",
									estado: data.transactionResponse.state,
									orderId: data.transactionResponse.orderId,
									transactionId: data.transactionResponse.transactionId,
									pendingReason: data.transactionResponse.pendingReason,
									responseCode: data.transactionResponse.responseCode
								}).done(function(msg){
									if( msg == 1 ){
										var metodo = 3;
										if(metodo == 3){
											localStorage.setItem('return_url_pse', window.location.href);
											window.location.href = data.transactionResponse.extraParameters.BANK_URL;
										}
									} else {
										alert(msg);
										descargar();
									}
								});
							}
						}
						<?php
							}else{
						?>
							almacenaPendientePSE(
								'<?= $_SESSION["id"]; ?>',
								'2',
								'<?= $metodo; ?>',
								data.transactionResponse.transactionId,
								$('#vrPedido').val(),
								data.transactionResponse.extraParameters.BANK_URL
							);
						<?php
							}
						?>
					})
					.fail(function(data) {
						if ( data.statusText === 'timeout' ) {
							var info = {
								id_usuario: "<?= $_SESSION['id']; ?>",
								url: window.location.href,
								metodo: '<?= $metodo; ?>',
								consulta: 'logErroresPagos'
							};
							$.ajax({
								url: '/includes/php.php',
								type: 'POST',
								dataType: 'json',
								data: info,
							})
							.done(function(data) {
								if ( data.error === 1 ) {
									descargar();
									bootbox.confirm('Ha ocurrido un error con su pedido<br>desea intentarlo nuevamente?', function(result) {
										if (result === true) {
											location.reload();
										}else{
											window.location = 'http://www.elartedesabervivir.com/';
										}
									}); 
								}
							});
						}
					})
					.always(function() {
						console.log('complete');
					});
				}
			});
		</script>
	</div>
</form>
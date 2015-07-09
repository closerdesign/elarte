<form id="pagoConPSE">
	<div class="modal-header">
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
		if (isset($_POST['pagina']) && $_POST['pagina'] == 'conferencia-amar-sin-apegos') {
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
		<hr>
		<div class="row">
			<div class="col-md-12">
				<p class="lead pull-right">
					Valor a pagar: USD 
					<span id="valorConferencia"><?= number_format($valor,2); ?></span>
				</p>
			</div>
		</div>
		<input type="hidden" name="tipoPersona" id="tipoPersona" value="N" />
		<input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?= getNombreUsuario($_SESSION['id']).' '.getApellidoUsuario($_SESSION['id']) ?>"/>
		<input type="hidden" name="emailPSE" id="emailPSE" value="<?= getEmailUsuario($_SESSION['id']);  ?>" />
		<input type="hidden" name="telefonoDiurno" id="telefonoDiurno" value="5717442384" />
		<input type="hidden" name="pedido" id="pedido" value="<?= 'CONF'.$_SESSION['id'] ?>" />
		<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor; ?>" />
		<input type="hidden" name="consulta" id="consulta" value="pseRequest" />
		<input type="hidden" name="email" id="email" value="<?= getEmailUsuario($_SESSION['id']) ?>" />

		<script>
			$('#pagoConPSE').validate({
				submitHandler: function(form){
					$('#myNuevoModal').modal('hide');
					cargar();

					$.ajax({
						url: '/includes/php.php',
						type: 'POST',
						dataType: 'json',
						data: $('#pagoConPSE').serialize(),
						timeout: 70000
					})
					.done(function(data) {
						console.log('success');
						console.log(data);
						almacenaPendientePSE(
							'<?= $_SESSION[id]; ?>',
							'2',
							'<?= $metodo; ?>',
							data.transactionResponse.transactionId,
							'<?= $valor; ?>',
							data.transactionResponse.extraParameters.BANK_URL
						);
					})
					.fail(function(data) {
						if ( data.statusText === 'timeout' ) {
							var info = {
								id_usuario: '<?= $_SESSION[id]; ?>',
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
											window.location = 'http://elarte.desarrollo.closerdesign.co/';
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
	<div class='modal-footer'>
		<button type='submit' class='btn btn-primary'><i class='fa fa-paypal'></i> Continuar</button>
	</div>
</form>
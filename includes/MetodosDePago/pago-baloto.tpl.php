<form id="pagoConBaloto">
	<div class="modal-header">
		<h4>
			<i class="fa fa-money"></i> Pagos en puntos VIA Baloto
		</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<p>A continuación efectuaremos el procedimiento de generación de su recibo para pago en efectivo a través de puntos VIA Baloto</p><p>Le agradecemos que revise atentamente el email que enviaremos a su cuenta <?= getEmailUsuario($_SESSION['id']); ?> para evitar inconvenientes en su proceso de pago.</p>
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
				<button id="validarDecuento" type="button" class="btn btn-primary"><i class="fa fa-university"></i> Verificar</button>
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

		<input type="hidden" name="noDocumentoBaloto" id="noDocumentoBaloto" value="900476732" />
		<input type="hidden" name="noPedido" id="noPedido" value="<?= 'CONF'.$_SESSION['id'];  ?>" />
		<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor; ?>" />
		<input type="hidden" name="email" id="email" value="<?= getEmailUsuario($_SESSION['id']); ?>" />
		<input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?= getNombreUsuario($_SESSION['id']); ?> <?= getApellidoUsuario($_SESSION['id']); ?>" />
		<input type="hidden" name="consulta" id="consulta" value="requestBaloto" />
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Continuar</button>
	</div>
</form>

<script>
	$('#pagoConBaloto').validate({
		submitHandler: function(form){
			cargar();
			
			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'json',
				data: $('#pagoConBaloto').serialize(),
				timeout: 70000
			})
			.done(function(data) {
				var response = JSON.parse(data);
				almacenaPendientePSE(
					'<?= $_SESSION[id]; ?>',
					'2',
					'<?= $metodo; ?>',
					response.transactionResponse.transactionId,
					'<?= $valor; ?>',
					response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML
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
				console.log("complete");
			});
		}
	});
</script>
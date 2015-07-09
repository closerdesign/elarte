<form id="pagoTarjetaDeCredito">
	<div class="modal-header">
		<h4>
			<i class="fa fa-credit-card"></i> Pagar con tarjeta de crédito
			<a href="http://www.payulatam.com/logos/pol.php?l=150&c=556df33bef3cd" target="_blank"><img class="pull-right" src="http://www.payulatam.com/logos/logo.php?l=150&c=556df33bef3cd" height="30" alt="PayU Latam" border="0" /></a>
		</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-3 form-group">
				<select class="form-control" name="tipoTarjeta" id="tipoTarjeta" required >
					<option value="">Tipo de tarjeta ...</option>
					<option value="VISA">VISA</option>
					<option value="MASTERCARD">MASTERCARD</option>
					<option value="AMEX">AMEX</option>
					<option value="DINERS">DINERS</option>
				</select>
			</div>
			<div class="col-md-4 form-group">
				<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="noTarjeta" id="noTarjeta" placeholder="Número de tarjeta" required />
			</div>
			<div class="col-md-5 form-group">
				<input type="text" class="form-control" name="nombreTarjeta" id="nombreTarjeta" placeholder="Nombre tarjeta" required />
			</div>
		</div>

			
		<div class="row">
			<div class="col-md-4 form-group">
				<select class="form-control" name="mesTarjeta" id="mesTarjeta" required >
					<option value="">Mes vencimiento</option>
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
			<div class="col-md-4 form-group">
				<select class="form-control" name="yearTarjeta" id="yearTarjeta" required >
					<option value="">Año vencimiento</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
				</select>
			</div>
			<div class="col-md-4 form-group">
				<input type="text" class="form-control" name="codigoSeguridad" id="codigoSeguridad" placeholder="Código de seguridad" required />
			</div>

			<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor; ?>" />
			<input type="hidden" name="pedido" id="pedido" value="CF<?= $_SESSION['id'] ?>" />
			<input type="hidden" name="email" id="email" value="<?= getEmailUsuario($_SESSION['id']); ?>" />
			<input type="hidden" name="ciudad" id="ciudad" value="<?= getCiudadUsuario($_SESSION['id']); ?>" />
			<input type="hidden" name="cuotas" id="cuotas" value="1" />
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
				<button id="validarDecuento" type="button" class="btn btn-primary"><i class="fa fa-university"></i> Verificar</button>
			</div>
		</div>
		<div class="row">
			<span id="descuentoMensaje"></span>
		</div>
		<?php
		}
		?>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<p class="lead pull-right">
				Valor a pagar: USD <span id="valorConferencia"><?= number_format($valor,2); ?></span>
			</p>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary"><i class="fa fa-credit-card"></i> Pagar</button>
	</div>
</form>

<script type="text/javascript">
	$('#pagoTarjetaDeCredito').validate({
		submitHandler: function(form){
			$('#myNuevoModal').modal('hide');
			cargar();
			$.ajax({
				url: '/includes/payu/loadTarjetasDeCredito.php',
				type: 'POST',
				dataType: 'json',
				data: $('#pagoTarjetaDeCredito').serialize(),
				timeout: 70000
			})
			.done(function(data) {
				console.log('success');
				var response = data;
				procesaInscripcionConferencia(
					'<?= $_SESSION[id]; ?>',
					'<?= $metodo; ?>',
					response.transactionResponse.transactionId,
					response.transactionResponse.state,
					'<?= $valor; ?>'
					);
			})
			.fail(function() {
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
						/*console.log('success');*/
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
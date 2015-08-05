<form id="pagoConOxxo">
	<div class="modal-header">
		<h4><i class="fa fa-money"></i> Pagos en puntos OXXO - 7 Eleven</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<p>A continuación efectuaremos en procedimiento de generación de su recibo para pago en efectivo a través de puntos OXXO.</p><p>Le agradecemos que revise atentamente el email que enviaremos a su cuenta <?= getEmailUsuario($_SESSION['id']) ?> para evitar inconvenientes en su proceso de pago.</p>
				<input type="hidden" name="noDocumentoOxxo" id="noDocumentoOxxo" value="900476732" />
				<input type="hidden" name="noPedido" id="noPedido" value="PKG-<?php echo $_SESSION['id'] ?>-<?php echo $_REQUEST['id'] ?>" />
				<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor ?>" />
				<input type="hidden" name="consulta" id="consulta" value="oxxoRequest" />
				<input type="hidden" name="nombreOxxo" id="nombreOxxo" value="<?= getNombreUsuario($_SESSION['id']); ?> <?= getApellidoUsuario($_SESSION['id']); ?>" />
				<input type="hidden" name="emailOxxo" id="emailOxxo" value="<?= getEmailUsuario($_SESSION['id']) ?>">
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
		<hr>
		<div class="row">
			<div class="col-md-12">
				<p class="lead pull-right">
					Valor a pagar: USD <span id="valorConferencia"><?= number_format($valor,2); ?></span>
				</p>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Continuar</button>
	</div>
</form>
<script>
	$('#pagoConOxxo').validate({
		submitHandler: function(form){
			cargar();
			
			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'json',
				data: $('#pagoConOxxo').serialize(),
				timeout: 70000
			})
			.done(function(data) {
				var response = data;

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
							formaPago: "5",
							estado: data.transactionResponse.state,
							orderId: data.transactionResponse.orderId,
							transactionId: data.transactionResponse.transactionId,
							pendingReason: data.transactionResponse.pendingReason,
							responseCode: data.transactionResponse.responseCode
						}).done(function(msg){
							if( msg == 1 ){
								var metodo = 5;
								var url = data.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML;
								if( (metodo > 3) && (metodo < 7) ){
								   notificaComprobante('<?= $_SESSION["id"]; ?>',url,metodo);
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
								   modal("Pagos en efectivo","<p>Por favor haga click en el enlace a continuación para descargar su desprendible de pago:</p><p class='text-center'><a target='_blank' class='btn btn-default' style='width:100%' href='" + url + "'>Descargar desprendible de pago</a></p><p><b>Importante:</b> Te hemos enviado a tu correo un mensaje que contiene algunas recomendaciones que debes tener en cuenta para poder realizar tu pago, así mismo como un enlace para que puedas generar tu recibo en caso de requerirlo nuevamente.</p>");
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
					response.transactionResponse.transactionId,
					$('#vrPedido').val(),
					response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML
				);
				<?php
					}
				?>			
			})
			.fail(function(data) {
				if ( data.statusText === 'timeout' ) {
					var info = {
						id_usuario: '<?= $_SESSION["id"]; ?>',
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
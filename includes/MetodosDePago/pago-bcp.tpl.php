<?php
if (isset($_POST['landing']) && $_POST['landing'] == 750 ) {
?>
<!-- <div class="row">
	<h4>¿Tienes un código de descuento? Ingrésalo aquí:</h4>
	<div class="col-md-6 form-group">
		<input type="text" class="form-control" name="codigoDescuento" id="codigoDescuento" />
	</div>
	<div class="col-md-6 form-group">
		<button id="validarDescuento" type="button" class="btn btn-primary"><i class="fa fa-university"></i> Aplicar código</button>
	</div>
</div>
<div class="row">
	<div id="descuentoMensaje"></div>
</div> -->
<?php
}
?>
<form id="pagoConBcp">
	<div>
		<h4>
			<i class="fa fa-money"></i> Pagos en Banco de Crédito - BCP
		</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<p>
					A continuación efectuaremos el procedimiento de generación de su recibo para pago en efectivo a través de BCP.
				</p>
				<p>
					Le agradecemos que revise atentamente el email que enviaremos a su cuenta <?= getEmailUsuario($_SESSION['id']); ?> para evitar inconvenientes en su proceso de pago.
				</p>
				<input type="hidden" name="noDocumentoBcp" id="noDocumentoBcp" value="900476732" />
				<input type="hidden" name="noPedido" id="noPedido" value="U<?php echo $_SESSION['id'] ?>L<?= $landing; ?>P<?php echo $_REQUEST['id'] ?>" />
				<input type="hidden" name="vrPedido" id="vrPedido" value="<?= $valor; ?>" />
				<input type="hidden" name="consulta" id="consulta" value="bcpRequest" />
				<input type="hidden" name="nombreBcp" id="nombreBcp" value="<?= getNombreUsuario($_SESSION['id']); ?> <?= getApellidoUsuario($_SESSION['id']); ?>" />
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<p class="lead">
				Valor a pagar: USD <span id="valorConferencia"><?= number_format($valor,2); ?></span>
				</p>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Continuar</button>
			</div>
		</div>
	</div>
</form>

<script>
	$('#pagoConBcp').validate({
		submitHandler: function(form){
			cargar();
			
			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'json',
				data: $('#pagoConBcp').serialize(),
				timeout: 70000
			})
			.done(function(data) {
				var response = data;
				$.post('/includes/php.php',{
					consulta: "procesaPaquete",
					paquete: "<?php echo $_REQUEST['id'] ?>",
					usuario: "<?php echo $_SESSION['id'] ?>",
					landing: "<?php echo $landing ?>",
					formaPago: "6",
					estado: data.transactionResponse.state,
					orderId: data.transactionResponse.orderId,
					transactionId: data.transactionResponse.transactionId,
					pendingReason: data.transactionResponse.pendingReason,
					responseCode: data.transactionResponse.responseCode
				}).done(function(msg){
					if( msg == 1 ){
						var metodo = 6;
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
						   modal("Pagos en efectivo","<p>Por favor pulsa el siguiente botón para generar tu desprendible de pago:</p><p class='text-center'><a target='_blank' class='btn btn-success btn-lg' style='width:100%' href='" + url + "'>Generar desprendible de pago</a></p><p><b>Ten presente:</b> Enviaremos a tu correo electrónico un mensaje con algunas recomendaciones para poder realizar tu pago y el enlace desde el cual podrás consultar este desprendible.</p>");
						}

					} else {
						alert(msg);
						descargar();
					}
				});
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
<form name="pagoPaypal" id="pagoPaypal" action="../includes/php.php" method="POST">
	<div class="modal-header">
		<h4>
		<i class="fa fa-paypal"></i> Pagar con Paypal
		</h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="consulta" value="requestPayPal" />
		<input type="hidden" name="description" value="Inscripción Conferencia" />
		<input type="hidden" name="business" value="<?= $data['merchant_email']; ?>" />
		<input type="hidden" name="notify_url" value="<?= $data['notify_url']; ?>" />
		<input type="hidden" name="cancel_return" value="<?= $data['cancel_url'] ?>" />
		<input type="hidden" name="return" value="<?= $data['thanks_page']; ?>" />
		<input type="hidden" name="rm" value="2" />
		<input type="hidden" name="lc" value="" />
		<input type="hidden" name="no_shipping" value="1" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="currency_code" value="<?= $data['currency_code']; ?>" />
		<input type="hidden" name="page_style" value="paypal" />
		<input type="hidden" name="charset" value="utf-8" />
		<input type="hidden" name="item_name" value="<?= $data['product_name']; ?>" />
		<input type="hidden" value="_xclick" name="cmd"/>
		<input type="hidden" id="vrPedido" name="amount" value="15.99" />
		<p>Ahora será dirigido a plataforma de Paypal para procesar su transacción.</p>
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
	</div>
	<div class="modal-footer">
		<button id="pagarPaypal" type="submit" class="btn btn-primary"><i class="fa fa-paypal"></i> Continuar</button>
	</div>
</form>
<script>
	$('body').on('click', '#pagarPaypal', function(event) {
		cargar();
	});
</script>
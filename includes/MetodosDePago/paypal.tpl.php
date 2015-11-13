<?php
if (isset($_POST['landing']) && $_POST['landing'] == 52 ) {
?>
<div class="row">
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
</div>
<?php
}
?>
<form name="pagoPaypal" id="pagoPaypal" action="../includes/php.php" method="POST">
	<div>
		<h4>
		<i class="fa fa-paypal"></i> Pagar con Paypal
		</h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="consulta" value="<?= ( isset($_POST['coleccion']) ? 'requestPayPalPaquete' : 'requestPayPal' ); ?>" />
		<input type="hidden" name="description" value="<?= ( isset($_POST['coleccion']) ? strip_tags( $_POST['nombre'] ) : 'inscripcion Conferencia' ); ?>" />	
		<input type="hidden" name="currency_code" value="<?= $data['currency_code']; ?>" />
		<input type="hidden" name="page_style" value="paypal" />
		<input type="hidden" name="charset" value="utf-8" />
		<input type="hidden" name="item_name" value="<?= ( isset($_POST['coleccion']) ? strip_tags( $_POST['nombre'] ) : $data['product_name'] ); ?>" />
		<input type="hidden" value="_xclick" name="cmd"/>
		<input type="hidden" id="vrPedido" name="amount" value="<?= ( isset($_POST['coleccion']) ? $_POST['value'] : '9.99' ) ?>" />
		<input type="hidden" name="codigoPaquete" value="<?= ( isset($_POST['coleccion']) ? $_REQUEST['id'] : '' ) ?>">
		<input type="hidden" name="formaDePago" value="<?= ( isset($_POST['coleccion']) ? 2 : '' ) ?>">
		<p>Ahora será dirigido a plataforma de Paypal para procesar su transacción.</p>
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<p class="lead">
					Valor a pagar: USD 
					<span id="valorConferencia"><?= number_format($valor,2); ?></span>
				</p>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<button id="pagarPaypal" type="submit" class="btn btn-primary"><i class="fa fa-paypal"></i> Continuar</button>
			</div>
		</div>
	</div>
</form>
<script>
	$('body').on('click', '#pagarPaypal', function(event) {
		cargar();
	});
</script>
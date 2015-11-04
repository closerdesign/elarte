<?php
	require_once 'rest-api-sample-app-php/app/bootstrap.php';
	require_once('php.php');
	use PayPal\Api\ExecutePayment;
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	if(isset($_GET['success']) && isset( $_GET['pagina'] ) ) {
		// We were redirected here from PayPal after the buyer approved/cancelled
		// the payment
		
		if( isset($_GET['success']) && $_GET['success'] == 'true' && isset($_GET['PayerID']) && isset($_GET['orderPaypalId']) ) {
			$orderId = $_GET['orderPaypalId'];
			try {
				$order = obtenerOrden($orderId);
				$payment = executePayment($_GET['paymentId'], $_GET['PayerID']);
				
				if ( $payment->getState() == 'approved' ) {
					$status = 2;
				}
				else if ( $payment->getState() == 'failed' || $payment->getState() == 'canceled' || $payment->getState() == 'expired' ) {
					$status = 3;
				}else{
					$status = 1;
				}

				if ( $_GET['pagina'] == 'obras' ) {
					actualizaOrdenPaquete($orderId, $status, null, null, $payment->getState(), $payment->getState());
				}else if( $_GET['pagina'] == 'coleccion' ){
					$pedido = getPedido($orderId);

					actualizaOrdenPaquete($orderId, $status, null, null, $payment->getState(), $payment->getState());
					/*actualizarInscripcionFromPaquete($orderId, null, 1, null, $pedido['transactionId'], null);*/
				}

				if ( $payment->getState() == 'approved' ) {
					$estado = 1;
					$estadoTexto = 'Aprobada';
					entregarPedido($orderId);
					unset($_COOKIE['pedido']);
    				setcookie('pedido', null, -1, '/');
				}
				else if ( $payment->getState() == 'failed' || $payment->getState() == 'canceled' || $payment->getState() == 'expired' ) {
					$estado = 0;
					$estadoTexto = 'Fallida';
				}else{
					$estado = 2;
					$estadoTexto = 'Pendiente';
					unset($_COOKIE['pedido']);
    				setcookie('pedido', null, -1, '/');
				}
				$messageType = "success";
				$message = "Your payment was successful. Your order id is $orderId.";

				$mensaje = "";
				$mensaje .= "<p>Hola ".getNombreUsuario($_SESSION['id']).",</p>";
				$mensaje .= "<p>Queremos informarle que el estado de su orden es: ".$estadoTexto."</p>";
				if( $estado == 1 ){
					$mensaje .= "<p>Ya puede descargar las obras adquiridas en la sección <a href='https://www.elartedesabervivir.com/mi-cuenta/mis-publicaciones'>'Mi Biblioteca'</a>. Si su compra incluye acceso a una conferencia pronto recibirá un email con la confirmación y las instrucciones para acceder</p>";
				}elseif( $estado == 0 ){
					$mensaje .= "<p>Le invitamos a que lo intente nuevamente con otro medio de pago.</p>";
				}elseif( $estado == 2 ){
					$mensaje .= "<p>Pronto estará recibiendo información adicional acerca del estado de su transacción.</p>";
				}
				
				/*$notificar = notificar(getEmailUsuario($_SESSION['id']),"Acerca de tu proceso de inscripción",$mensaje);*/
					
				?>
					<script>
						$(document).ready(function(){
							descargar();
							modal("Proceso de compra","<?= $mensaje; ?>");
							<?php 
							if ($estado == 1 || $estado == 2) {
							?>
							$.removeCookie('pedido');
							<?php 
							} 
							?>
						});
					</script>
				<?php
			} catch (\PayPal\Exception\PPConnectionException $ex) {
				$message = parseApiError($ex->getData());
				$messageType = "error";
			} catch (Exception $ex) {
				$message = $ex->getMessage();
				$messageType = "error";
			}
			
		} elseif ( isset($_GET['success']) && $_GET['success'] == 'false' ){
			$orderId = $_GET['orderPaypalId'];
			$estado = 3;
			$estadoTexto = 'failed';
			$estadoTexto2 = 'Fallida';
			if ( $_GET['pagina'] == 'obras' ) {
				$order = obtenerOrden($orderId);
				actualizarOrden($orderId, $estadoTexto, $order['transaction_id']);
			}else if( $_GET['pagina'] == 'coleccion' ){
				$pedido = getPedido($orderId);
				actualizaOrdenPaquete($orderId, $estado, $pedido['transactionId'], $pedido['transactionId'], $estadoTexto, $estadoTexto);
				/*actualizarInscripcionFromPaquete($orderId, null, 0, null, $pedido['transactionId'], null);*/
			}
			/*actualizarOrden($orderId, $estadoTexto, $order['transaction_id']);*/
			$mensaje = "";
			$mensaje .= "<p>Hola ".getNombreUsuario($_SESSION['id']).",</p>";
			$mensaje .= "<p>Queremos informarle que el pago ha sido: ".$estadoTexto2."</p>";
			if( $estado == 1 ){
				/*$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";*/
			}elseif( $estado == 0 || $estado == 3 ){
				$mensaje .= "<p>Le invitamos a que lo intente nuevamente con otro medio de pago.</p>";
			}elseif( $estado == 2 ){
				$mensaje .= "<p>Pronto estará recibiendo información adicional acerca del estado de su transacción.</p>";
			}
			?>
				<script>
					$(document).ready(function(){
						descargar();
						modal("Proceso de inscripción","<?php echo $mensaje; ?>");
					});
				</script>
			<?php
		}
	}
	?>
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
				/*$payment = executePayment($order['transaction_id'], $_GET['PayerID']);*/
				actualizarOrden($orderId, $payment->getState(), $order['transaction_id']);

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
					$mensaje .= "<p>Ya puede disfrutar de sus obras en esta sección.</p>";
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
							$.removeCookie('pedido');
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
			$order = obtenerOrden($orderId);
			$estado = 3;
			$estadoTexto = 'failed';
			$estadoTexto2 = 'Fallida';
			actualizarOrden($orderId, $estadoTexto, $order['transaction_id']);
			$mensaje = "";
			$mensaje .= "<p>Hola ".getNombreUsuario($_SESSION['id']).",</p>";
			$mensaje .= "<p>Queremos informarle que el pago de la inscripción en nuestra conferencia virtual ha sido: ".$estadoTexto2."</p>";
			if( $estado == 1 ){
				$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";
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
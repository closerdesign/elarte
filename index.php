<?php session_start(); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/conn.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php require_once('includes/functions.php'); ?>

<!DOCTYPE html>
<html lang="es">
	
	<?php require_once('blocks/head.php'); ?>
	
	<body class="body">
	
	<?php require_once('blocks/finRegistro.php'); ?>
	
	<?php require_once('blocks/header.php'); ?>
	
	<?php
		if(!isset($_REQUEST['content'])){
			require_once('blocks/home.php');
		}elseif($_REQUEST['content']=='obras'){
			require_once('blocks/obras.php');
		}elseif($_REQUEST['content']=='publicacion'){
			require_once('blocks/publicacion.php');
		}elseif($_REQUEST['content']=='biblioteca'){
			require_once('blocks/biblioteca.php');
		}elseif($_REQUEST['content']=='registrarme'){
			require_once('blocks/registrarme.php');
		}elseif($_REQUEST['content']=='mi-cuenta'){
			require_once('blocks/mi-cuenta.php');
		}elseif($_REQUEST['content']=='articulos'){
			require_once('blocks/articulos.php');
		}elseif($_REQUEST['content']=='recuperar-contrasena'){
			require_once('blocks/recuperar-contrasena.php');
		}elseif($_REQUEST['content']=='migracion'){
			require_once('blocks/migracion.php');
		}elseif($_REQUEST['content']=='eliminar-imagenes'){
			require_once('blocks/eliminar-imagenes.php');
		}elseif($_REQUEST['content']=='que-es-phronesis'){
			require_once('blocks/que-es-phronesis.php');
		}elseif($_REQUEST['content']=='paquetes'){
			require_once('blocks/paquetes.php');
		}elseif($_REQUEST['content']=='colecciones'){
			require_once('blocks/colecciones.php');
		}elseif($_REQUEST['content']=='coleccion'){
			require_once('blocks/coleccion.php');
		}elseif($_REQUEST['content']=='politica-de-privacidad'){
			require_once('blocks/politica-de-privacidad.php');
		}elseif($_REQUEST['content']=='darse-de-baja'){
			require_once('blocks/darse-de-baja.php');
		}elseif($_REQUEST['content']=='conferencia-virtual'){
			require_once('blocks/inscripcion-conferencia.php');
		}elseif($_REQUEST['content']=='conferencia-virtual-inscripcion'){
			require_once('blocks/inscripcion-conferencia-v2.php');
		}elseif($_REQUEST['content']=='inscripcion-conferencia-elarte'){
			require_once('blocks/inscripcion-conferencia-v3.php');
		}elseif($_REQUEST['content']=='conferencia-inscripcion-elarte'){
			require_once('blocks/inscripcion-conferencia-v4.php');
		}elseif( $_REQUEST['content'] == 'inscripcion-conferencia' ){
			require_once( 'blocks/inscripcion-conferencia.php' );
		}elseif($_REQUEST['content']=='programas-especiales'){
			require_once('blocks/programas-especiales.php');
		}elseif($_REQUEST['content']=='migracion'){
			require_once('blocks/migracion.php');
		}elseif($_REQUEST['content']=='migracion_passwords'){
			require_once('blocks/migracion_passwords.php');
		}elseif($_REQUEST['content']=='conferencia-amar-sin-apegos'){
			require_once('blocks/inscripcion-conferencia-v5.php');
		}else{
			require_once('blocks/articulos.php');
		}
	?>
	
	<?php require_once('blocks/footer.php'); ?>
	
	<?php require_once('blocks/modal.php'); ?>
	
	<div class="carrito">
		<a href="index.php?content=mi-cuenta&task=mi-pedido"><img src="/img/carrito.png" /></a>
	</div>
	
	</body>
	
	<!-- Phronesis -->
	<script src="/js/phronesis.js"></script>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-46120323-1', 'auto');
		ga('send', 'pageview');
	</script>
	
	<?php if(isset($_SESSION['id'])){ require_once('blocks/jsUsers.php'); } ?>
	
	<?php
		
		require_once('blocks/validaRegistro.php');
		require_once('blocks/procesoPedido.php');
		
	?>
	
	<?php
		
		if(
			(isset($_REQUEST['transactionId'])) &&
			(isset($_REQUEST['lapTransactionState']))
		){
			$q = mysqli_query($con, "SELECT usuario_id,metodo_pago,valor_inscripcion FROM inscritos_conferencia WHERE transaction_id = '$_REQUEST[transactionId]'");
			$n = mysqli_num_rows($q);
			if($n==1){
				$data = mysqli_fetch_array($q);
				?>
				<script>
					$(document).ready(function(){
						actualizaInscripcionConferencia(
						   '<?php echo $data['usuario_id'] ?>',
						   '<?php echo $data['metodo_pago'] ?>',
						   '<?php echo $_REQUEST['transactionId'] ?>',
						   '<?php echo $_REQUEST['lapTransactionState'] ?>',
						   '<?php echo $data['valor_inscripcion'] ?>'
						);
					})
				</script>
				<?php	
			}
		}
		
	?>
	<?php
	if(isset($_GET['success'])) {
		require_once 'includes/rest-api-sample-app-php/app/bootstrap.php';
		require_once('includes/php.php');

		// We were redirected here from PayPal after the buyer approved/cancelled
		// the payment
		
		if($_GET['success'] == 'true' && isset($_GET['PayerID']) && isset($_GET['orderPaypalId'])) {
			$orderId = $_GET['orderPaypalId'];
			try {
				$order = obtenerOrden($orderId);
				$payment = executePayment($order['transaction_id'], $_GET['PayerID']);
				actualizarOrden($orderId, $payment->getState(), $order['transaction_id']);
				if ( $payment->getState() == 'approved' ) {
					$estado = 2;
					$estadoTexto = 'Aprovada';
				}
				else if ( $payment->getState() == 'failed' || $payment->getState() == 'canceled' || $payment->getState() == 'expired' ) {
					$estado = 3;
					$estadoTexto = 'Fallida';
				}else{
					$estado = 1;
					$estadoTexto = 'Pendiente';
				}
				$messageType = "success";
				$message = "Your payment was successful. Your order id is $orderId.";

				$mensaje = "";
				$mensaje .= "<p>Hola ".getNombreUsuario($_SESSION['id']).",</p>";
				$mensaje .= "<p>Queremos informarle que el pago de la inscripción en nuestra conferencia virtual ha sido: ".$estadoTexto."</p>";
				if( $estado == 1 ){
					$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";
				}elseif( $estado == 0 ){
					$mensaje .= "<p>Le invitamos a que lo intente nuevamente con otro medio de pago.</p>";
				}elseif( $estado == 2 ){
					$mensaje .= "<p>Pronto estará recibiendo información adicional acerca del estado de su transacción.</p>";
				}
				
				$notificar = notificar(getEmailUsuario($_SESSION['id']),"Acerca de tu proceso de inscripción",$mensaje);
				
				
				?>
						<script>
							$(document).ready(function(){
								descargar();
								modal("Proceso de inscripción","<?php echo $mensaje; ?>");
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
			
		} else {
			$orderId = $_GET['orderPaypalId'];
			$order = obtenerOrden($orderId);
			actualizarOrden($orderId, 3, $order['transaction_id']);
			$messageType = "error";
			$message = "Your payment was cancelled.";
		}
	}
	?>
	<?php
		if(
			(!isset($_REQUEST['content'])) ||
			($_REQUEST['content'] != 'inscripcion-conferencia')
		){
			?>
			<script>
				$(document).ready(function(){
					var evento = $.cookie('evento');
					if(evento != 1){
					    modal('¡No te la pierdas!...','<p><a href="index.php?content=conferencia-virtual"><img src="/images/popup_conferencia.jpg" class="img img-responsive" /></a></p>');
					    $.cookie('evento',1);
					}
				})
			</script>
			<?php
		}
	?>
	
	<?php
		if(
			(!isset($_REQUEST['content'])) ||
			($_REQUEST['content']!='conferencia-virtual')
		){
			?>
			<div class="pieEvento">
				<p class="text-center"><a onclick="modalEx()" href="#">¡No te la pierdas!: <b>Conferencia Virtual por Walter Riso</</b> <i class="fa fa-arrow-circle-right"></i></a></p>
			</div>
			<?php
		}
	?>
</html>
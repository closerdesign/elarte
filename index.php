<?php session_start(); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/conn.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="es">
	
	<?php require_once('blocks/head.php'); ?>
	
	<body class="body">
		<div id="fb-root">&nbsp;</div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1555280741417343";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	<?php require('blocks/franja-conferencia.php'); ?>
	
	<?php require_once('includes/paypalResponse.php'); ?>
	
	<?php
		echo validatePSEResponseTransferencia();
	?>
	
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
		}elseif($_REQUEST['content']=='paquetes'){ //Template paquetes

			require_once('blocks/paquetes.php');

		}elseif($_REQUEST['content']=='colecciones'){ //Template paquetes

			require_once('blocks/colecciones.php');

		}elseif($_REQUEST['content']=='coleccion'){ //Template paquetes

			require_once('blocks/coleccion.php');

		}elseif($_REQUEST['content']=='promocion'){ //Template paquetes

			require_once('blocks/promocion.php');
			
		}elseif($_REQUEST['content']=='guias'){ //Template paquetes

			require_once('blocks/guias.php');

		}elseif($_REQUEST['content']=='politica-de-privacidad'){
			require_once('blocks/politica-de-privacidad.php');
		}elseif($_REQUEST['content']=='darse-de-baja'){
			require_once('blocks/darse-de-baja.php');
		}elseif($_REQUEST['content']=='programas-especiales'){
			require_once('blocks/programas-especiales.php');
		}elseif($_REQUEST['content']=='archivos-programas'){
			require_once('blocks/archivos-programas.php');
		}elseif($_REQUEST['content']=='conferencia-virtual'){
			require_once('blocks/inscripcion-conferencia.php');
		}elseif( $_REQUEST['content'] == 'inscripcion-conferencia' ){
			require_once( 'blocks/inscripcion-conferencia.php' );
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
	<script src="/js/phronesis.js?verion=127"></script>
	
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
		
		if( isset($_GET['success']) && $_GET['success'] == 'true' && isset($_GET['PayerID']) && isset($_GET['orderPaypalId']) ) {
			$orderId = $_GET['orderPaypalId'];
			try {
				$order = obtenerOrden($orderId);
				$payment = executePayment($order['transaction_id'], $_GET['PayerID']);
				actualizarOrden($orderId, $payment->getState(), $order['transaction_id']);
				if ( $payment->getState() == 'approved' ) {
					$estado = 2;
					$estadoTexto = 'Aprobada';
		?>
			<!-- Google Code for Compra de la Gu&iacute;as Conversion Page -->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 977034816;
			var google_conversion_language = "en";
			var google_conversion_format = "3";
			var google_conversion_color = "ffffff";
			var google_conversion_label = "7Ww2CPqe9mAQwLzx0QM";
			var google_remarketing_only = false;
			/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/977034816/?label=7Ww2CPqe9mAQwLzx0QM&amp;guid=ON&amp;script=0"/>
			</div>
			</noscript>
		<?php
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
				$mensaje .= "<p>Queremos informarle que el pago ha sido: ".$estadoTexto."</p>";
				if( $estado == 1 ){
					/*$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";*/
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
							modal("Proceso de inscripción","<?= $mensaje; ?>");
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
			$mensaje .= "<p>Queremos informarle que el pago ha sido: ".$estadoTexto2."</p>";
			if( $estado == 1 ){
				//$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";
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
		
		
	if(
		(!isset($_REQUEST['content'])) ||
		($_REQUEST['content'] != 'inscripcion-conferencia') ||
		($_REQUEST['content'] != 'coleccion') ||
		($_REQUEST['content'] != 'colecciones')
	){
		?>
		<script>
		//   $(document).ready(function(){
		//   	var evento = $.cookie('evento');
		//   	if(evento != 1){
		//   	    modal('¡No te la pierdas!...','<p><a href="/coleccion/4"><img src="/img/HOY.png" class="img img-responsive" /></a></p>');
		//   	    $.cookie('evento',1);
		//   	}
		//   });
		</script>
		<?php
	}
	
	
	if(
		(!isset($_REQUEST['content'])) ||
		($_REQUEST['content']!='conferencia-virtual')
	){
		?>
		<!--
		<div class="pieEvento">
			<p class="text-center"><a onclick="modalEx()" href="#">¡No te la pierdas!: <b>Conferencia Virtual por Walter Riso</</b> <i class="fa fa-arrow-circle-right"></i></a></p>
		</div>
		-->
		<?php
	}
	
	if ( !empty($_GET['facebook']) && $_GET['facebook'] == 'error' && !empty( $_GET['message'] ) ) {
	?>
	<script type="text/javascript">
		modal('Error','<p>El correo <?php echo $_GET["email"]; ?> ya está registrado, por favor intente ingresar con su cuenta previamente registrada.</p><p>Si no recuerda los datos de su cuenta puede acceder a la opción recuperar contraseña de la ventana de Iniciar Sesión.</p>');
		$('#myModalVacio').on('hide.bs.modal', function (e) {
			location.reload();
		});
	</script>
<?php
	}
?>	
</html>
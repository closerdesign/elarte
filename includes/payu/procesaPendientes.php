<?php
	require_once('../conn.php');
	require_once('../functions.php');
	require_once('../php.php');
	require_once '../rest-api-sample-app-php/app/bootstrap.php';
	use PayPal\Api\Payment;
	
	$sql="SELECT * FROM pedidos WHERE status = 1 AND formaPago != 2 AND transactionId != ''";
	$q=mysqli_query($con, $sql);
	$n=mysqli_num_rows($q);
	
	if($n>0){		
		while($p=mysqli_fetch_assoc($q)){
			
			require_once('PayU.php');
	
			Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
			Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
			Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/');
		
			PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
			PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
			PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
			$accountId = "501716";

			/*var_dump($p);*/
		
			$parameters = array(PayUParameters::TRANSACTION_ID => "$p[transactionId]");
		
			$response = PayUReports::getTransactionResponse($parameters);
			
			if ($response) {
				$response->state;
				$response->trazabilityCode;
				$response->authorizationCode;
				$response->responseCode;
				$response->operationDate;
			}
			
			if( ($response->state != 'PENDING') ){
				$status=0;
				if($response->state=='APPROVED'){
					$status=2;
					$mensaje = 'Queremos confirmarle que su inscripci&oacute;n a la conferencia ha sido procesada exitosamente. Pronto le estaremos enviando informaci&oacute;n adicional para el acceso al evento.';
					notificar(getEmailUsuario($p["usuario"]),'Comprobante de pago: Inscripción Conferencia Virtual',$mensaje);
					actualizarInscripcionFromPaquete($p['id'], $p["usuario"], 1, 7, $p["transactionId"], 15.99);
				}elseif($response->state=='DECLINED'){
					$status=3;
				}elseif($response->state=='EXPIRED'){
					$status=3;
				}
				$sql1="UPDATE pedidos SET status = '$status', state = '".$response->state."', pendingReason = '', responseCode = '".$response->responseCode."' WHERE transactionId = '$p[transactionId]'";
				$q1=mysqli_query($con, $sql1);
				if(!$q1){
					echo mysqli_error($con);
				}else{
					echo 1;
				}
			}
			transaccionPendiente($p['transactionId'],$response->state);	
		}
	}
	validarListaPedidosPendientes();
?>
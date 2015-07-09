<?php
	require_once('../conn.php');
	require_once('../functions.php');
	require_once('../php.php');
	$sql="SELECT * FROM pedidos WHERE status = 1 AND formaPago != 2";
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
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
			$accountId = "501716";
		
			$parameters = array(PayUParameters::TRANSACTION_ID => "$p[transactionId]");
		
			$response = PayUReports::getTransactionResponse($parameters);
			
			if ($response) {
				$response->state;
				$response->trazabilityCode;
				$response->authorizationCode;
				$response->responseCode;
				$response->operationDate;
			}
			
			if( ($response->state == 'APPROVED') || ($response->state == 'DECLINED') ){
				$status=0;
				if($response->state=='APPROVED'){
					$status=2;
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
?>
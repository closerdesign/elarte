<?php

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

	$parameters = array(PayUParameters::TRANSACTION_ID => "15fec3ac-8318-48d9-af8c-cb5a2b4f55cd");

	$response = PayUReports::getTransactionResponse($parameters);
	
	if ($response) {
		$response->state;
		$response->trazabilityCode;
		$response->authorizationCode;
		$response->responseCode;
		$response->operationDate;
	}
	
	print(json_encode($response));

?>
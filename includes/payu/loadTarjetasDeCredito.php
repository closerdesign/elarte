<?php
    
	require_once('PayU.php');

    $reference = $_POST['pedido'];
	$value = $_POST['vrPedido'];
	$expiration = $_POST['yearTarjeta']."/".$_POST['mesTarjeta'];

   /* if ( _TESTING_ ) {
    	Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
    	Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
    	Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");

    	PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c"; //Ingrese aquí su propio apiKey.
    	PayU::$apiLogin = "11959c415b33d0c"; //Ingrese aquí su propio apiLogin.
    	PayU::$merchantId = "500238"; //Ingrese aquí su Id de Comercio.
    	PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
    	PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
    	$accountId = "500538";
    }else{*/
		Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
		Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
		Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
		
		PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
		PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
		PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
		PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
		PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
		$accountId = "501716";
    /*}*/

	$parameters = array(
	//Ingrese aquí el identificador de la cuenta.
	PayUParameters::ACCOUNT_ID => $accountId,
	//Ingrese aquí el código de referencia.
	PayUParameters::REFERENCE_CODE => $reference,
	//Ingrese aquí la descripción.
	PayUParameters::DESCRIPTION => "Tu compra en Phronesis, el arte de saber vivir.",
	
	// -- Valores --
	//Ingrese aquí el valor.        
	PayUParameters::VALUE => $value,
	//Ingrese aquí la moneda.
	PayUParameters::CURRENCY => "USD",
	
	// -- Comprador 
	//Ingrese aquí el nombre del comprador.
	PayUParameters::BUYER_NAME => $_POST['nombreTarjeta'],
	//Ingrese aquí el email del comprador.
	PayUParameters::BUYER_EMAIL => $_POST['email'],
	
	// -- pagador --
	//Ingrese aquí el nombre del pagador.
	//PayUParameters::PAYER_NAME => $_POST['nombreCompleto'],
	PayUParameters::PAYER_NAME => $_POST['nombreTarjeta'],
	//Ingrese aquí el email del pagador.
	PayUParameters::PAYER_EMAIL => $_POST['email'],
	PayUParameters::PAYER_CITY => $_POST['ciudad'],
	//PayUParameters::PAYER_STATE => "Bogota",
	PayUParameters::PAYER_COUNTRY => 'US',
	
	// -- Datos de la tarjeta de crédito -- 
	//Ingrese aquí el número de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_NUMBER => $_POST['noTarjeta'],
	//Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $expiration,
	//Ingrese aquí el código de seguridad de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_SECURITY_CODE=> $_POST['codigoSeguridad'],
	//Ingrese aquí el nombre de la tarjeta de crédito
	//PaymentMethods::VISA||PaymentMethods::MASTERCARD||PaymentMethods::AMEX||PaymentMethods::DINERS
	PayUParameters::PAYMENT_METHOD => $_POST['tipoTarjeta'],
	
	//Ingrese aquí el número de cuotas.
	PayUParameters::INSTALLMENTS_NUMBER => $_POST['cuotas'],
	//Ingrese aquí el nombre del pais.
	PayUParameters::COUNTRY => PayUCountries::CO,
	
	//Session id del device.
	PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
	//IP del pagadador
	PayUParameters::IP_ADDRESS => "127.0.0.1",
	//Cookie de la sesión actual.
	PayUParameters::PAYER_COOKIE=>session_id(),
	//Cookie de la sesión actual.        
	PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
);
	
$response = PayUPayments::doAuthorizationAndCapture($parameters);

if ($response) {
	$response->transactionResponse->orderId;
	$response->transactionResponse->transactionId;
	$response->transactionResponse->state;
	if ($response->transactionResponse->state=="PENDING") {
		$response->transactionResponse->pendingReason;	
	}
	/*$response->transactionResponse->paymentNetworkResponseCode;*/
	/*$response->transactionResponse->paymentNetworkResponseErrorMessage;*/
	/*$response->transactionResponse->trazabilityCode;*/
	$response->transactionResponse->responseCode;
	/*$response->transactionResponse->responseMessage;*/
	
	print json_encode($response);
	
}

?>
<?php
    require_once('PayU.php');

    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        	$ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        	$ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    //Quitar estas variables de entorno para poder pasar a producccion
    //Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi"); 
    //Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi"); 
    //Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/"); 
    //Fin variables de Entorno
	
	// Variables de producción
	Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
	Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
	Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
	// Fin variables de producción
	
    //Estos Datos son para hacer pruebas.. cuando pase a produccion toca colocar aca los datos del cliente
	PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
	PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
	PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
	PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
	PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
		
	$reference = $_POST['noPedido'];
	$value = $_POST['vrPedido'];
	
	$parameters = array(
		//Ingrese aquí el identificador de la cuenta.
		PayUParameters::ACCOUNT_ID => "501789",
		//Ingrese aquí el código de referencia.
		PayUParameters::REFERENCE_CODE => $reference,
		//Ingrese aquí la descripción.
		PayUParameters::DESCRIPTION => "Tu compra en Phronesis | El arte de saber vivir",
		
		// -- Valores --
		//Ingrese aquí el valor.        
		PayUParameters::VALUE => $value,
		//Ingrese aquí la moneda.
		PayUParameters::CURRENCY => "USD",
		
		//Ingrese aquí el email del comprador.
		PayUParameters::BUYER_EMAIL => $_POST['emailOxxo'],
		//Ingrese aquí el nombre del pagador.
		PayUParameters::PAYER_NAME => $_POST['nombreOxxo'],
		//Ingrese aquí el documento de contacto del pagador.
		PayUParameters::PAYER_DNI=> $_POST['noDocumentoOxxo'],
		
		//Ingrese aquí el nombre del método de pago
		//"SANTANDER"||"SCOTIABANK"||"IXE"||"BANCOMER"||PaymentMethods::OXXO||PaymentMethods::SEVEN_ELEVEN
		PayUParameters::PAYMENT_METHOD => PaymentMethods::OXXO,
	   
		//Ingrese aquí el nombre del pais.
		PayUParameters::COUNTRY => PayUCountries::MX,
		
		//Ingrese aquí la fecha de expiración. Sólo para OXXO y SEVEN_ELEVEN
		PayUParameters::EXPIRATION_DATE => "2015-12-5T00:00:00",
		//IP del pagadador
		PayUParameters::IP_ADDRESS => getRealIpAddr(),
	   
	);
		
	$response = PayUPayments::doAuthorizationAndCapture($parameters);
	
	if($response){
		$response->transactionResponse->orderId;
		$response->transactionResponse->transactionId;
		$response->transactionResponse->state;
		if($response->transactionResponse->state=="PENDING"){
			$response->transactionResponse->pendingReason;
			$response->transactionResponse->extraParameters->URL_PAYMENT_RECEIPT_HTML;
			$response->transactionResponse->extraParameters->REFERENCE;
		}
		$response->transactionResponse->responseCode;		  
	} 
	
	print json_encode($response);
	
?>
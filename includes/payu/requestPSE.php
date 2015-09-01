<?php
    	
    	require_once('PayU.php');

    	$reference = $_POST['pedido'];
	$value = $_POST['vrPedido'];
	//$value = 2.3;
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
	
    	// PRUEBAS
     //Quitar estas variables de entorno para poder pasar a producccion
     //Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi"); 
     //Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi"); 
     //Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/"); 
     //Fin variables de Entorno
	
	//Estos Datos son para hacer pruebas.. cuando pase a produccion toca colocar aca los datos del cliente
	//PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c"; //Ingrese aquí su propio apiKey.
	//PayU::$apiLogin = "11959c415b33d0c"; //Ingrese aquí su propio apiLogin.
	//PayU::$merchantId = "500238"; //Ingrese aquí su Id de Comercio.
	//PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
	//PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
	//$accountId = "500538";
	
	// PRODUCCIÓN
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
	$accountId = "501716";
	
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
		
		//Ingrese aquí el email del comprador.
		PayUParameters::BUYER_EMAIL => $_POST['email'],
		//Ingrese aquí el nombre del pagador.
		PayUParameters::PAYER_NAME => $_POST['nombreCompleto'],
		//Ingrese aquí el email del pagador.
		PayUParameters::PAYER_EMAIL => $_POST['email'],
		//Ingrese aquí el teléfono de contacto del pagador.
		PayUParameters::PAYER_CONTACT_PHONE=> $_POST['telefonoDiurno'],
			   
		// -- infarmación obligatoria para PSE --
		//Ingrese aquí el código pse del banco.
		PayUParameters::PSE_FINANCIAL_INSTITUTION_CODE => $_POST['bancos'],
		//Ingrese aquí el tipo de persona (N natural o J jurídica)
		PayUParameters::PAYER_PERSON_TYPE => $_POST['tipoPersona'],
		//Ingrese aquí el documento de contacto del pagador.
		PayUParameters::PAYER_DNI => $_POST['noIdentificacion'],
		//Ingrese aquí el tipo de documento del pagador: CC, CE, NIT, TI, PP,IDC, CEL, RC, DE.
		PayUParameters::PAYER_DOCUMENT_TYPE => $_POST['tipoDocumento'],
	
		//Ingrese aquí el nombre del método de pago
		PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
	   
		//Ingrese aquí el nombre del pais.
		PayUParameters::COUNTRY => PayUCountries::CO,
		
		//IP del pagadador
		PayUParameters::IP_ADDRESS => getRealIpAddr(),
		//Cookie de la sesión actual.
		PayUParameters::PAYER_COOKIE=>session_id(),
		//Cookie de la sesión actual.        
		PayUParameters::USER_AGENT=>$_SERVER['HTTP_USER_AGENT']
	   
	);
		
	$response = PayUPayments::doAuthorizationAndCapture($parameters);
	
	if($response){
		$response->transactionResponse->orderId;
		$response->transactionResponse->transactionId;
		$response->transactionResponse->state;
		if($response->transactionResponse->state)
		if($response->transactionResponse->state=="PENDING"){
			$response->transactionResponse->pendingReason;
			$response->transactionResponse->extraParameters->BANK_URL;		
		}
		$response->transactionResponse->responseCode;		  
	}
	
	if($response->transactionResponse->state=="PENDING"){
		header('Location: '.$response->transactionResponse->extraParameters->BANK_URL);
	}else{
		header('Location: http://www.elartedesabervivir.com/app/index.php?content=mi-cuenta&task=mi-pedido&paymentResponse=failed&paymentMsg='.$response->transactionResponse->responseCode);
	}
	
?>
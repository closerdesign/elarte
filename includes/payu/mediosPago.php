<?php
    require_once('PayU.php');

    //Quitar estas variables de entorno para poder pasar a producccion
    Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi"); 
    Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi"); 
    Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/"); 
    //Fin variables de Entorno
	
	// Variables de producción
	//Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
	//Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
	//Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
	// Fin variables de producción
	
    //Estos Datos son para hacer pruebas.. cuando pase a produccion toca colocar aca los datos del cliente
	PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c"; //Ingrese aquí su propio apiKey.
	PayU::$apiLogin = "11959c415b33d0c"; //Ingrese aquí su propio apiLogin.
	PayU::$merchantId = "500238"; //Ingrese aquí su Id de Comercio.
	PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
	PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
		
	$array=PayUPayments::getPaymentMethods();
	$payment_methods=$array->paymentMethods;
	foreach ($payment_methods as $payment_method){
		$payment_method->country;
		$payment_method->description;
		$payment_method->id;
	} 
	
	print json_encode($payment_method);
	
?>
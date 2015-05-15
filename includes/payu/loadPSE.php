<?php
    require_once('PayU.php');

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
	PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
	
	
	//Ingrese aquí el nombre del medio de pago
	$parameters = array(
		//Ingrese aquí el identificador de la cuenta.
		PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
		//Ingrese aquí el nombre del pais.
		PayUParameters::COUNTRY => PayUCountries::CO,
	);
	$array=PayUPayments::getPSEBanks($parameters);
	$banks=$array->banks;
	
	$html="<option value=''>Seleccione...</option>";
	
	foreach ($banks as $bank) {
		$html.="<option value='".$bank->pseCode."'>".$bank->description."</option>";
		//print json_encode($bank->description);
		//print json_encode($bank->pseCode);
	}
	
	echo $html;
	
?>
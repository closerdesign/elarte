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

    /*if ( _TESTING_ ) {
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
    /*}	*/
	
	//Ingrese aquí el nombre del medio de pago
	$parameters = array(
		//Ingrese aquí el identificador de la cuenta.
		PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
		//Ingrese aquí el nombre del pais.
		PayUParameters::COUNTRY => PayUCountries::CO,
	);
	$array=PayUPayments::getPSEBanks($parameters);
	$banks=$array->banks;
	
	$html="<option value=''>Seleccione banco...</option>";
	
	foreach ($banks as $bank) {
		$html.="<option value='".$bank->pseCode."'>".$bank->description."</option>";
		//print json_encode($bank->description);
		//print json_encode($bank->pseCode);
	}
	
	echo $html;
	
?>
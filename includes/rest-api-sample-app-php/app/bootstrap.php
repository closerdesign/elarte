<?php

// Include the composer autoloader
if(!file_exists(__DIR__ .'/../vendor/autoload.php')) {
	echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.\nPlease see the README for more information.\n";
	exit(1);
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/common/user.php';
require_once __DIR__ . '/common/order.php';
require_once __DIR__ . '/common/paypal.php';
require_once __DIR__ . '/common/util.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// Define connection parameters
define('MYSQL_HOST', 'localhost:3306');
define('MYSQL_USERNAME', 'elarte_paypuser');
define('MYSQL_PASSWORD', 'hclRi@~0&5L_');
define('MYSQL_DB', 'elarte_paypaltest');

return getApiContext();

// SDK Configuration
function getApiContext() {


    // Define the location of the sdk_config.ini file
    if (!defined("PP_CONFIG_PATH")) {
        define("PP_CONFIG_PATH", dirname(__DIR__));
    }

	$apiContext = new ApiContext(new OAuthTokenCredential(
		'AaYcH5C5po5JzpEmYQtkzAtpT6Zr0XfbEcT-hwXkLAp7YSlIurguZ1Gc8Cb1o0glE-X2qIfsHj63Kg8A',
		'EE-BMK6xECpomSV2D7r3kukeKQSqzVEiLcMgX02gOs0-ysyV0tYbvwjpNIysHcKWubf4IVyQOeyJyq3j'
	));

	
	// Alternatively pass in the configuration via a hashmap.
	// The hashmap can contain any key that is allowed in
	// sdk_config.ini	
	
	$apiContext->setConfig(array(
		'http.ConnectionTimeOut' => 70,
		'http.Retry' => 1,
		'mode' => 'sandbox',
		'log.LogEnabled' => true,
		'log.FileName' => '../PayPal.log',
		'log.LogLevel' => 'DEBUG'		
	));
	
	return $apiContext;
}

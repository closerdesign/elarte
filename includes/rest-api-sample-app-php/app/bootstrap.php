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
		'AUakaP5mJUXlBNuHc2NmGmIAvySNL10ySPfOwceRLd4FglRyBukTTm5-j7PtjyGzROZquDnjjW89uS0O',
		'EBAsNM7Kqdztgt0Q0VkrZdEXCie8r_BiV8gZzY14F_88q56B0ArNU-inAqaC0bLX6PF7trHx4vGNMoJp'
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

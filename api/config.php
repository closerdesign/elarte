<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();
define('SMTP_HOST', "email-smtp.us-east-1.amazonaws.com");
define('SMTP_USER', "AKIAJ5DSSNZIJI3HBCMA");
define('SMTP_PASS', "Aux5EaH0pYg7QsfsRINQAsic2ThGgFZuNGD4FvuUg2sX");

define('DBHOST', 'localhost');
define('DBUSER', 'elarte_phrosapp');
define('DBPASS', "Z,'VT,?x3*LdjMvR");
define('DBNAME', 'elarte_phronesisapp');

define('URL', "http://www.elartedesabervivir.com/");
define('URL_API', "http://www.elartedesabervivir.com/api/");
define('URL_CSS', "http://www.elartedesabervivir.com/api/resources/css/");
define('URL_JS', "http://www.elartedesabervivir.com/api/resources/js/");
define('URL_IMG', "http://www.elartedesabervivir.com/api/resources/imgs/");
define('NOTIFICACION', URL."/email/conferenciaPre.html");
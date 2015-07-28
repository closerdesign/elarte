<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();
define('BASE_URL', "http://conferencia.elartedesabervivir.com/");
define('URL', "http://conferencia.elartedesabervivir.com/");
define('URL_US', "http://conferencia.elartedesabervivir.com/");
define('FB_APP_ID', "1555280741417343");
define('FB_APP_SECRET', "3b972cb244f2e6b202c87dad6d57412d");
if ( isset($_SERVER['HTTPS']) ) {
	define('CURRENT_URL', ($_SERVER['HTTPS'] == 'on' || $_SERVER['SERVER_PORT'] == 443 ? URL : URL_US ) );
}else{
	define('CURRENT_URL', ($_SERVER['SERVER_PORT'] == 443 ? URL : URL_US ) );
}

/*=====================================
=            Base de datos            =
=====================================*/
define('DBHOST', 'localhost');
define('DBNAME', 'elarte_conferencia');
define('DBUSER', 'elarte_conf');
define('DBPASS', 'K9lv]@gac%)R');

define('SMTP_HOST', "email-smtp.us-east-1.amazonaws.com");
define('SMTP_USER', "AKIAJ5DSSNZIJI3HBCMA");
define('SMTP_PASS', "Aux5EaH0pYg7QsfsRINQAsic2ThGgFZuNGD4FvuUg2sX");

/*
SELECT 
	usu.id, 
	usu.nombreCompleto, 
	usu.nombre, 
	usu.apellido,
	usu.email, 
	inco.id_inscripcion
	IF(usu.fbId = '', NULL, usu.fbId) fbId, 
	IF(usu.password = '', NULL, usu.password) password,
	NULL,
	NULL
	FROM usuarios usu
INNER JOIN inscritos_conferencia inco on inco.usuario_id = usu.id
WHERE inco.estado_inscripcion = 1 AND inco.migrado IS NULL > 1 GROUP BY usu.id ORDER BY usu.id ASC
*/
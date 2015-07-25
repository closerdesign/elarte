<?php

/*
 * El frontend controller se encarga de
 * configurar nuestra aplicacion
 */
require 'config.php';
require 'helpers.php';

//Library
require 'library/Request.php';
require 'library/Inflector.php';
require 'library/Response.php';
require 'library/View.php';
require_once 'library/MysqliDb.php';
require_once 'library/phpmailer.php';

$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

//Llamar al controlador indicado
if (empty($_GET['url']))
{
    $url = "";
}
else
{
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();
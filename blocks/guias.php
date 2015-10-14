<?php

if ( !empty( $_REQUEST['id'] ) ) {
	switch ( $_REQUEST['id'] ) {
		// Guias en PDF
		case 1:
			$_REQUEST['id'] = 1;
			require 'guias1.php';
			break;

		case 2:
			$_REQUEST['id'] = 1;
			require 'guias2.php';
			break;

		case 3:
			$_REQUEST['id'] = 1;
			require 'guias3.php';
			break;

		case 4:
			$_REQUEST['id'] = 1;
			require 'guias4.php';
			break;

		//Guias en Audio
		case 5:
			$_REQUEST['id'] = 3;
			require 'guias5.php';
			break;
		case 6:
			$_REQUEST['id'] = 3;
			require 'guias6.php';
			break;
		case 7:
			$_REQUEST['id'] = 3;
			require 'guias7.php';
			break;
		case 8:
			$_REQUEST['id'] = 3;
			require 'guias8.php';
			break;
		case "guias-practicas-de-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias9.php';
			break;
			
		case "guias-practicas-para-vivir-mejor":
			$_REQUEST['id'] = 1;
			require 'guias11.php';
			break;
			
		case "guias-de-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias12.php';
			break;
			
		case "guias-para-vivir-mejor-de-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias13.php';
			break;
			
		case "promocion-guias-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias14.php';
			break;
			
		case "mejorar-vida-emocional-con-guias-de-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias15.php';
			break;
			
		case "guias-practicas-para-no-sufrir-de-amor":
			$_REQUEST['id'] = 1;
			require 'guias16.php';
			break;
			
		case "guias-practicas-para-relaciones-sanas-17":
			$_REQUEST['id'] = 1;
			require 'guias17.php';
			break;
			
		case "guias-para-construir-un-amor-completo-18":
			$_REQUEST['id'] = 1;
			require 'guias18.php';
			break;
			
			
		case "guias-de-walter-riso-para-construir-un-amor-sano-19":
			$_REQUEST['id'] = 1;
			require 'guias19.php';
			break;
			
		case "entrevista-sobre-guia-para-no-sufrir-de-amor":
			$_REQUEST['id'] = 1;
			require 'guias20.php';
			break;
			
		case "herramienta-practica-para-vivir-mejor":
			$_REQUEST['id'] = 1;
			require 'guias21.php';
			break;
			
		case "guias-practicas-para-vivir-bien-en-pareja":
			$_REQUEST['id'] = 1;
			require 'guias22.php';
			break;
			
		case "es-un-error-prometer-amor-eterno":
			$_REQUEST['id'] = 1;
			require 'guias23.php';
			break;
			
		case "guia-practica-para-vencer-la-dependencia-emocional":
			$_REQUEST['id'] = 7;
			require 'guias24.php';
			break;
			
		case "mejorar-tu-relacion-de-pareja-con-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias25.php';
			break;
			
		case "los-cuatro-pilares-de-la-autoestima-por-walter-riso":
			$_REQUEST['id'] = 1;
			require 'guias26.php';
			break;
			
		case "cuando-renunciar-a-un-amor-27":
			$_REQUEST['id'] = 1;
			require 'guias27.php';
			break;
			
		case "hasta-donde-sacrificarse-por-amor":
			$_REQUEST['id'] = 1;
			require 'guias28.php';
			break;

		case "como-afrontar-la-soledad-afectiva-29":
			$_REQUEST['id'] = 1;
			require 'guias29.php';
			break;
			
		case "carta-de-adolecente-que-ama-con-independencia-30":
			$_REQUEST['id'] = 1;
			require 'guias30.php';
			break;
			
		case "la-culpa-en-la-infidelidad-31":
			$_REQUEST['id'] = 1;
			require 'guias31.php';
			break;
			
		//Otros paquetes
		case 10:
			$_REQUEST['id'] = 2;
			require 'guias10.php';
			break;
		default:
			break;
	}
}

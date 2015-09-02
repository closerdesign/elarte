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
		default:
			break;
	}
}

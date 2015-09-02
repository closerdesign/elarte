<?php

if ( !empty( $_REQUEST['id'] ) ) {
	switch ( $_REQUEST['id'] ) {
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
		default:
			break;
	}
}

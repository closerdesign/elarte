<?php 
//////////////////////////////////*** SAJAX CONFIG ***/////////////////////////////////////// 	
require ('../Application/lib/Sajax.php');
	$sajax_request_type = "GET";
	sajax_init();
	
	
	
	sajax_export("ConciliarElArteRespectoPayu", "ConciliarPayuRespectoElArte");
	
	
	sajax_handle_client_request();
?>

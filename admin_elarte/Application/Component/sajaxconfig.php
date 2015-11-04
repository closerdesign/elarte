<?php 
//////////////////////////////////*** SAJAX CONFIG ***/////////////////////////////////////// 	
require ('../Application/lib/Sajax.php');
	$sajax_request_type = "GET";
	sajax_init();
	
	
	
	sajax_export("ConciliarElArteRespectoPayu", "ConciliarPayuRespectoElArte", "ConciliarPayuRespectoElArtePEDIDOS", "ConciliarElArteRespectoPayuPEDIDOS", "agregarInscritosConferencia", "conciliarPrestashopRespectoPayu", "ConciliarPayuRespectoPrestashop", "conciliarPrestashopRespectoPaypal", "ConciliarPaypalRespectoPrestashop", "conciliarPaypalConElArtes", "facturar", "mostrarFacturacion", "anularFactura", "conciliarPaypalConElarte");
	
	sajax_export("mostrarPedidos", "mostrarVentasPorProducto", "mostrarVentasPorProductoElArte", "mostrarMasInfoDePedido", "mostrarReporteVentas");
	
	sajax_export("inscritosConf1");
	
	
	
	
	sajax_handle_client_request();
?>

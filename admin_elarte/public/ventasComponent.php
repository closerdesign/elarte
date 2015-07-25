<?php 


function mostrarPedidos()
{
	

	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();

	$hoy = getdate();
	
	echo date('Y-m-d H:i:s', $hoy[0]);
	
	
	//$query = "SELECT SUM(pedidos.valor) FROM pedidos WHERE creado >= ''";
		
			
	$q->ejecutar($query, "");





	$query = "SELECT pedidos.*, usuarios.email, inscritos_conferencia.estado_inscripcion, inscritos_conferencia.metodo_pago  FROM pedidos 
		LEFT JOIN usuarios ON pedidos.usuario = usuarios.id
		LEFT JOIN inscritos_conferencia ON pedidos.id = inscritos_conferencia.id_pedido
		WHERE pedidos.creado >= '2015-07-14'
		ORDER BY pedidos.id DESC";
		
			
	$q->ejecutar($query, "");
	
	echo "
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>ID</td>
					<td>Fecha</td>
					<td>Usario ID</td>
					<td>Email</td>
					<td>Valor</td>
					<td>Status</td>
					<td>Forma de pago</td>
					
					
					<td>Estado Inscripcion</td>
					<td>Metodo Pago Inscripcion</td>
				</tr>
	";
	
	$estados = array("", "Pendiente", "Aprobado", "Rechazado");
	$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
	
	$estados_inscripciones = array("Rechazado", "Aprobado", "Pendiente");
	
	$cont = 0;
	
	while($q->Cargar())
	{
		
		$id = $q->dato('id');
		$usuario = $q->dato('usuario');
		$valor = $q->dato('valor');
		$status = $q->dato('status');
		$formaPago = $q->dato('formaPago');
		$transactionId = $q->dato('transactionId');
		$state = $q->dato('state');
		$pendingReason	 = $q->dato('pendingReason	');
		$responseCode = $q->dato('responseCode');
		$urlPaymentReceiptHtml	 = $q->dato('urlPaymentReceiptHtml	');
		$creado = $q->dato('creado');
		$email = $q->dato('email');
		
		
		
		$estado_inscripcion = $q->dato('estado_inscripcion');
		
		$metodo_pago = $q->dato('metodo_pago');
		
		
		
		
		
		
		if($valor == "24.70"  && $metodo_pago <> 7 && $status == 2)
		{
			$alerta_transaccion = "bgcolor='red'";
			
			if($status == 1)
				$estado_inscripcion_agregar = 2;
			elseif($status == 2)
				$estado_inscripcion_agregar = 1;
			elseif($status == 3)
				$estado_inscripcion_agregar = 0;
				
			$creado_agregar = split(" ", $creado);
			
			$boton_arreglar = "<span class='link1' onclick=agregarInscritosConferencia('$usuario','$estado_inscripcion_agregar','7','$transactionId','0','".$creado_agregar[0]."','".$creado_agregar[1]."',$id,$cont)>Arreglar</span>";
			
		}
		elseif($metodo_pago == "7" && $status == 2 && $valor <> 24.70 )
		{
			$alerta_transaccion = "bgcolor='yellow'";
			$boton_arreglar = "";
		}
		else
		{
			$alerta_transaccion = "";
			$boton_arreglar = "";	
		}
			
			
			
		if($estados[$status] <> $estados_inscripciones[$estado_inscripcion] && $metodo_pago == "7")
		{
			$alert_estado = "bgcolor='red'";	
		}
		else
			$alert_estado = "";
		
		
		//Silverio Perez		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$id</td>
			<td>$creado</td>
			<td>$usuario</td>
			<td>$email</td>
			<td>$valor</td>
			<td>$estados[$status]</td>
			<td>$metodos_pago[$formaPago]</td>
			
			<td $alert_estado>$estados_inscripciones[$estado_inscripcion]</td>
			<td $alerta_transaccion><span id='metodo_pago_mensaje$cont'>$metodo_pago</span> $boton_arreglar</td>
			
		</tr>	
		";
		
		$cont++;
		
	}
	
	
	echo "</table>";
	
	
}



?>
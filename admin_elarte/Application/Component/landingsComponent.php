<?php 


function mostrarPedidos()
{
	

	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();

	$hoy = getdate();
	$hoy = date('Y-m-d', $hoy[0]);
	
	$ayer = strtotime ( '-1 day', strtotime ( $hoy ) ) ;
	$ayer = date('Y-m-d', $ayer);
	
	$antesAyer = strtotime ( '-1 day', strtotime ( $ayer ) ) ;
	$antesAyer = date('Y-m-d', $antesAyer);
	
	$antes_antesAyer = strtotime ( '-1 day', strtotime ( $antesAyer ) ) ;
	$antes_antesAyer = date('Y-m-d', $antes_antesAyer);
	
	
	
	$query = "SELECT SUM(pedidos.valor) valor  FROM pedidos WHERE status = 2 AND creado >= '$hoy' AND valor <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_hoy = $q->dato('valor');
		$valor_total_hoy = number_format($valor_total_hoy, 2, '.', ',');
	}
	
	
	$query = "SELECT SUM(pedidos.valor) valor FROM pedidos WHERE status = 2 AND creado >= '$ayer' AND creado < '$hoy' AND valor <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_ayer = $q->dato('valor');
		$valor_total_ayer = number_format($valor_total_ayer, 2, '.', ',');
	}
	
	
	$query = "SELECT SUM(pedidos.valor) valor  FROM pedidos WHERE status = 2 AND creado >= '$antesAyer' AND creado < '$ayer' AND valor <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_antes_ayer = $q->dato('valor');
		$valor_total_antes_ayer = number_format($valor_total_antes_ayer, 2, '.', ',');
	}
	
	
	$query = "SELECT SUM(pedidos.valor) valor  FROM pedidos WHERE status = 2 AND creado >= '$antes_antesAyer' AND creado < '$antesAyer' AND valor <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_antes_antes_ayer = $q->dato('valor');
		$valor_total_antes_antes_ayer = number_format($valor_total_antes_antes_ayer, 2, '.', ',');
	}
	
	
	$query = "SELECT SUM(pedidos.valor) valor  FROM pedidos WHERE status = 2 AND creado >= '2015/10/01' AND creado < '2015/11/01' AND valor <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_mes_pedidos = $q->dato('valor');
		$valor_total_mes_pedidos = number_format($valor_total_mes_pedidos, 2, '.', ',');
	}
	
	
	
	///////////
	
	
	$query = "SELECT SUM(valor_inscripcion) valor  FROM inscritos_conferencia WHERE estado_inscripcion = 1 AND creado >= '$hoy' AND valor_inscripcion <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_hoy_inscripcion = $q->dato('valor');
		$valor_total_hoy_inscripcion = number_format($valor_total_hoy_inscripcion, 2, '.', ',');
	}
	
	$query = "SELECT SUM(valor_inscripcion) valor  FROM inscritos_conferencia WHERE estado_inscripcion = 1 AND creado >= '$ayer' AND creado < '$hoy' AND valor_inscripcion <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_ayer_inscripcion = $q->dato('valor');
		$valor_total_ayer_inscripcion = number_format($valor_total_ayer_inscripcion, 2, '.', ',');
	}
	
	$query = "SELECT SUM(valor_inscripcion) valor  FROM inscritos_conferencia WHERE estado_inscripcion = 1 AND creado >= '$antesAyer' AND creado < '$ayer' AND valor_inscripcion <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_antesAyer_inscripcion = $q->dato('valor');
		$valor_total_antesAyer_inscripcion = number_format($valor_total_antesAyer_inscripcion, 2, '.', ',');
	}
	
	$query = "SELECT SUM(valor_inscripcion) valor  FROM inscritos_conferencia WHERE estado_inscripcion = 1 AND creado >= '$antes_antesAyer' AND creado < '$antesAyer' AND valor_inscripcion <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_antesAntesAyer_inscripcion = $q->dato('valor');
		$valor_total_antesAntesAyer_inscripcion = number_format($valor_total_antesAntesAyer_inscripcion, 2, '.', ',');
	}
	
	$query = "SELECT SUM(valor_inscripcion) valor  FROM inscritos_conferencia WHERE estado_inscripcion = 1 AND creado >= '2015/07/01' AND creado < '2015/08/01' AND valor_inscripcion <>  ''";	
	$q->ejecutar($query, "");
	if($q->Cargar())
	{
		$valor_total_mes_inscripcion = $q->dato('valor');
		$valor_total_mes_inscripcion = number_format($valor_total_mes_inscripcion, 2, '.', ',');
	}
	
	

	echo "
		PEDIDOS:<br>
		HOY: $$valor_total_hoy<br>
		AYER: $$valor_total_ayer<br>
		ANTES DE AYER: $$valor_total_antes_ayer<br>
		ANTES ANTES DE AYER: $$valor_total_antes_antes_ayer<br>
		MES: $valor_total_mes_pedidos
		<br><br>
	";


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
					
					
					<td>Referencia Payu</td>
					<td>Landing Page</td>
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
		
		$referenciaLanding = $q->dato('referenciaLanding');
		$landing = $q->dato('landing');
		
		
		
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
			
			if($estados[$status] == "Pendiente" && $estados_inscripciones[$estado_inscripcion] == "Rechazado" && $metodos_pago[$formaPago] == "Paypal")
				$alert_estado = "bgcolor='yellow'";
			else
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
			
			<td>$referenciaLanding</td>
			<td>$landing</td>
			
		</tr>	
		";
		
		$cont++;
		
	}
	
	
	echo "</table>";
	
	
}



?>
<?php 



function mostrarReporteVentas()
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	$fecha1 = "2015-10-01";
    $fecha2 = "2015-10-31";

    $dias = (strtotime($fecha1)-strtotime($fecha2))/86400;
	$dias = abs($dias); $dias = floor($dias);		
	$dias = $dias + 1;
    
	for($i=1; $i<=$dias; $i++)
	{
		$query = "SELECT SUM(pedidos.valor) valor FROM pedidos WHERE status = 2 AND creado >= '2015-10-".$i."' AND creado <= '2015-10-".$i." 23:59:59' AND valor <>  ''";
		$q->ejecutar($query, "");
		if($q->Cargar())
		{
			
			$valor = $q->dato('valor');
			$total+= $valor;
			$valor = number_format($valor, 2, '.', ',');
			echo "2015-10-$i: $valor <br>";
			
			
			
		}
		
	}
	
	$prom = $total / $dias;
	$prom = number_format($prom, 2, '.', ',');
	echo "TOTAL: $total<br>";
	echo "PROMEDIO: $prom";
	
	
	
}



function mostrarMasInfoDePedido($pedidoID, $usuarioID)
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	$query = "SELECT pedidos.*, usuarios.email, inscritos_conferencia.estado_inscripcion, inscritos_conferencia.metodo_pago  FROM pedidos 
		LEFT JOIN usuarios ON pedidos.usuario = usuarios.id
		LEFT JOIN inscritos_conferencia ON pedidos.id = inscritos_conferencia.id_pedido
		WHERE pedidos.id = $pedidoID";
		
	$q->ejecutar($query, "");
	
	$estados = array("", "Pendiente", "Aprobado", "Rechazado");
	$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
	
	if($q->Cargar())
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
		
		
		echo "
		<b>Pedido No:</b> $id<br>
		<b>Usuario:</b> $email ($usuario)<br>
		<b>Valor Pedido:</b> USD $$valor<br>
		<b>Estado:</b> $estados[$status]<br>
		<b>Forma de pago:</b> $metodos_pago[$formaPago]<br>
		<b>Transaction ID:</b> $transactionId<br>
		<b>Recibo de pago:</b> $urlPaymentReceiptHtml<br>
		<b>Fecha creacion:</b> $creado<br>
		<b>Referencia Landing:</b> $referenciaLanding<br>
		<b>Landing:</b> $landing<br>
		<br><br>
		
		
		
		
		
		";
		
		
	}
	
	echo "</table>";
	
	
	//////////////////////////////
	
	
	$query = "SELECT * FROM publicacionesxpedido INNER JOIN publicaciones ON publicaciones.id = publicacionesxpedido.publicacion WHERE pedido = $pedidoID";	
	$q->ejecutar($query, "");
	
	echo "Publicaciones del pedido:<br><br>
	
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>ID Publicacion</td>
			<td>Nombre Publicacion</td>
			<td>Valor</td>		
		</tr>
	
	";
	
	
	while($q->Cargar())
	{
		$publicacion = $q->dato('publicacion');
		$valor = $q->dato('valor');
		$titulo = $q->dato('titulo');
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$publicacion</td>
			<td align='left'>$titulo</td>
			<td width='100px' align='right'>USD $$valor</td>
		
		</tr>";
		
		
	}
	
	echo "</table>";
	
	
	/////////////////////////
	
	
	$query = "SELECT * FROM publicacionesxusuario INNER JOIN publicaciones ON publicaciones.id = publicacionesxusuario.publicacion WHERE usuario = $usuarioID";	
	$q->ejecutar($query, "");
	
	echo "<br><br>Publicaciones del usuario:<br><br>
	
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>ID Publicacion</td>
			<td>Nombre Publicacion</td>	
		</tr>
	
	";
	
	
	while($q->Cargar())
	{
		$publicacion = $q->dato('publicacion');
		$titulo = $q->dato('titulo');
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$publicacion</td>
			<td align='left'>$titulo</td>
		
		</tr>";
		
		
	}
	
	echo "</table>";
	
	
	/////////////////////////
	
	
	$query = "SELECT * FROM pedidos WHERE usuario = $usuarioID";	
	$q->ejecutar($query, "");
	
	echo "<br><br>Otros pedidos del usuario:<br><br>
	
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>ID Pedido</td>
			<td>Valor</td>
			<td>Estado</td>
			<td>Forma de pago</td>	
			<td>Fecha</td>
		</tr>
	
	";
	
	
	while($q->Cargar())
	{
		$id = $q->dato('id');
		$valor = $q->dato('valor');
		$status = $q->dato('status');
		$formaPago = $q->dato('formaPago');
		$creado = $q->dato('creado');
		
		if($id <> $pedidoID)
		{
		
			echo "
			<tr bgcolor='#FFFFFF'>
				<td><span class='link3' href='#' onClick='mostrarMasInfoDePedido($id, $usuarioID)'>$id</span></td>
				<td>$valor</td>
				<td>$estados[$status]</td>
				<td>$metodos_pago[$formaPago]</td>
				<td>$creado</td>
			
			</tr>";
		}
		
		
	}
	
	echo "</table>";
	
	
}


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
	
       $fecha1 = "2015-10-01";
       $fecha2 = "2015-10-30";

       	$dias = (strtotime($fecha1)-strtotime($fecha2))/86400;
	$dias = abs($dias); $dias = floor($dias);		
	
       
	
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
		<a href='#' onclick='mostrarReporteVentas()'>Ver mas</a>
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
			<td><span class='link3' href='#' onClick='mostrarMasInfoDePedido($id, $usuario)'>$id</span></td>
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
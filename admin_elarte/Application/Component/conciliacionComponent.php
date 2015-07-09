<?php 




function mostrarFacturacion()
{
	
		
	echo"
	
		<div>
			Anular Facturas <br><br>
		
			Factura No: <input type='text' id='fact_num' value='' name='fact_num'></input> <input type='submit' value='Anular' id='boton_anular_fac' name='boton_anular_fac' onclick='anularFactura()'></input>
			<div id='mensaje_anular_fac'></div>
			
		
		</div>
		
		<br><br>
	
	";	
	
	
	
	
	echo"
	
		<div>
			Imprimir facturas Junio<br><br>";
			
			for($i=1;$i<=30;$i++)
			{	
				$dia1 = $i;
				$dia2 = $i+1;	
				echo "<a href='../public/facturas.php?fechaInicial=2015-06-0$dia1&fechaFinal=2015-06-0$dia2' target='_blank'>$dia1 de junio de 2015</a><br>";
			}
		
		echo "</div>
	
	";	
	
	
	
}



function facturar()
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	$q2 = new ConecteMysql();

	
	
	
	//AGREGAMOS A LA TABLA DE FACTURACION LOS INSCRITOS A LA CONFERENCIA
	
	
	$query = "Select * from inscritos_conferencia where not exists (select 1 from admin_pedidos_aprobados where admin_pedidos_aprobados.id_pedido = inscritos_conferencia.id_inscripcion AND admin_pedidos_aprobados.medio = 1) AND inscritos_conferencia.estado_inscripcion = 1";

	
	$q->ejecutar($query, "");
	
	
	$i=0;
	
	
	while($q->Cargar())
	{
		
		
		$id_inscripcion = $q->dato('id_inscripcion');
		$creado = $q->dato('creado');		
		
		$query = "INSERT INTO `elarte_phronesisapp`.`admin_pedidos_aprobados` (`id`, `medio`, `id_pedido`, `fecha_pedido`, `num_factura`, `fecha_factura`) VALUES (NULL, '1', '$id_inscripcion', '$creado', '', '$creado');";
		
		$q2->ejecutar($query, "");
		
		$i++;
		
		//if($i==5)
			//break;
				
		
		
	}
	
	////////////////////////////////////////
	
	
	
	
	
	
	
	
	//AGREGAMOS A LA TABLA DE FACTURACION LOS PEDIDOS DEL ARTE
	
	
	$query = "Select * from pedidos where not exists (select 1 from admin_pedidos_aprobados where admin_pedidos_aprobados.id_pedido = pedidos.id AND admin_pedidos_aprobados.medio = 2) AND pedidos.status = 2";

	
	$q->ejecutar($query, "");
	
	
	$i=0;
	
	
	while($q->Cargar())
	{
		
		
		$id = $q->dato('id');
		$creado = $q->dato('creado');		
		
		$query = "INSERT INTO `elarte_phronesisapp`.`admin_pedidos_aprobados` (`id`, `medio`, `id_pedido`, `fecha_pedido`, `num_factura`, `fecha_factura`) VALUES (NULL, '2', '$id', '$creado', 0, '$creado');";
		
		$q2->ejecutar($query, "");
		
		$i++;
		
		//if($i==5)
			//break;
				
		
		
	}
	
	////////////////////////////////////////
	
	
	
	
	//AGREGAMOS A LA TABLA DE FACTURACION LOS PEDIDOS DE PRESTASHOP
	
	
	$query = "Select * from admin_ps_orders where not exists (select 1 from admin_pedidos_aprobados where admin_pedidos_aprobados.id_pedido = admin_ps_orders.id_order AND admin_pedidos_aprobados.medio = 3) AND admin_ps_orders.current_state = 2 AND id_order >= 38961";

	
	$q->ejecutar($query, "");
	
	
	$i=0;
	
	
	while($q->Cargar())
	{
		
		
		$id_order = $q->dato('id_order');
		$date_add = $q->dato('date_add');		
		
		$query = "INSERT INTO `elarte_phronesisapp`.`admin_pedidos_aprobados` (`id`, `medio`, `id_pedido`, `fecha_pedido`, `num_factura`, `fecha_factura`) VALUES (NULL, '3', '$id_order', '$date_add', 0, '$date_add');";
		
		$q2->ejecutar($query, "");
		
		$i++;
		
		//if($i==5)
			//break;
				
		
		
	}
	
	////////////////////////////////////////
	
	
	echo "Proceso concluido satisfactoriamente";
	
	
	
	
	//LEEMOS EL ÚLTIMO CONSECUTIVO DE FACTURA
	
	
	$query = "Select MAX(num_factura) consecutivo FROM admin_pedidos_aprobados";	
	$q->ejecutar($query, "");
	
	
	if($q->Cargar())
		$consecutivo_actual = $q->dato('consecutivo');
		
		
	//LEEMOS TABLA DE PEDIDOS APROBADOS EN ORDEN DE FECHA DE PEDIDO
	
	$query = "Select id, fecha_pedido FROM admin_pedidos_aprobados WHERE num_factura = 0 Order By fecha_pedido Asc";
	$q->ejecutar($query, "");
	
	
	while($q->Cargar())
	{
		$id = $q->dato('id');
		$fecha_pedido = $q->dato('fecha_pedido');
		
		$consecutivo_actual++;
		
		$dia_inicial_mes_facturacion = new DateTime('2015-06-01');
		
		$fecha_pedido = new DateTime($fecha_pedido);
		
		$fecha_para_pedidos_de_otros_meses = "2015-06-05";
		
		
		if($fecha_pedido < $dia_inicial_mes_facturacion)
		{
			$query = "UPDATE `admin_pedidos_aprobados` SET `num_factura` = $consecutivo_actual, fecha_factura = '$fecha_para_pedidos_de_otros_meses'  WHERE `id` = $id";
		}
		else
		{
			$query = "UPDATE `admin_pedidos_aprobados` SET `num_factura` = $consecutivo_actual WHERE `id` = $id";

		}
		
		$q2->ejecutar($query, "");
		
	}

	
	
		
	
}






function conciliarPaypalConElArtes()
{
	

	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();


	$query = "(SELECT pedidos.id, pedidos.usuario, pedidos.creado, usuarios.email, pedidos.valor, pedidos.status FROM `pedidos` LEFT JOIN usuarios ON pedidos.usuario = usuarios.id WHERE pedidos.formaPago = 2) UNION (SELECT inscritos_conferencia.id_inscripcion,  inscritos_conferencia.usuario_id, inscritos_conferencia.creado, usuarios.email, inscritos_conferencia.valor_inscripcion, inscritos_conferencia.estado_inscripcion FROM `inscritos_conferencia` LEFT JOIN usuarios ON inscritos_conferencia.usuario_id = usuarios.id WHERE inscritos_conferencia.metodo_pago = 2) order by creado DESC";
	$q->ejecutar($query, "");
	
	
	$i=0;
	
	
	$estados_pedidos = array("", "Pendiente", "Aprobado", "Rechazado");
	$estados_inscritos = array("Rechazado", "Aprobado", "Iniciado");
	
	
	while($q->Cargar())
	{
		
		
		
		$pedidos_el_arte[$i][0] = $q->dato('usuario');
		$pedidos_el_arte[$i][1] = $q->dato('creado');
		$pedidos_el_arte[$i][2] = $q->dato('email');
		$pedidos_el_arte[$i][3] = $q->dato('valor');
		
		
		
		
		
		
		
		$fecha = date($q->dato('creado'));
		
		$fecha2 = strtotime ( '-2 hour', strtotime ( $fecha ) ) ;
		
		$fecha2 = date ( 'Y-m-j H:i:s' , $fecha2 );
		
		
		$pedidos_el_arte[$i][4] = $fecha2;
		
		$pedidos_el_arte[$i][5] = $q->dato('id');
		
		if($q->dato('id') > 100000)
		{
			$pedidos_el_arte[$i][6] = "pedidos";
			$pedidos_el_arte[$i][7] = $estados_pedidos[$q->dato('status')];
			
		}
		else
		{
			$pedidos_el_arte[$i][6] = "Inscripcion";
			$pedidos_el_arte[$i][7] = $estados_inscritos[$q->dato('status')];	
			
			
				
		}
		
		
		
		$i++;	
	
	}

	echo "
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>ID</td>
					<td>Tipo Venta</td>
					<td>Estado</td>
					<td>Valor</td>
					<td>Fecha El arte</td>
					<td>Email</td>
					<td>Fecha Paypal</td>
				</tr>
	";
	
	for($i=0; $i<count($pedidos_el_arte); $i++)
	{
		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>".$pedidos_el_arte[$i][5]."</td>
			<td>".$pedidos_el_arte[$i][6]."</td>
			<td>".$pedidos_el_arte[$i][7]."</td>
			<td>".$pedidos_el_arte[$i][3]."</td>
			<td>".$pedidos_el_arte[$i][1]."</td>
			<td>".$pedidos_el_arte[$i][2]."</td>
			<td>".$pedidos_el_arte[$i][4]."</td>
		
		</tr>
		";
		
		
		
	}
	
	
	echo "</table>";

	
	
}



function ConciliarPaypalRespectoPrestashop() 
{
	
	require_once "../Application/Model/FuncionesSQL_Prestashop.php";
    $q = new ConecteMysql();


	$query = "SELECT ps_orders.*, ps_order_state_lang.name, ps_paypal_order.id_transaction
	FROM ps_orders 
	INNER JOIN ps_order_state_lang ON ps_order_state_lang.id_order_state = ps_orders.current_state 
	LEFT JOIN ps_paypal_order ON ps_paypal_order.id_order = ps_orders.id_order 
	WHERE payment = 'PayPal' AND ps_order_state_lang.id_lang = 4 AND ps_orders.date_add >= '2015-05-01 00:00:00'";
	
	
	$q->ejecutar($query, "");
	
	$i=0;
	
	
		//$estados = array("Rechazado", "Aprobado", "Iniciado");
		//$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Iniciado");
		//$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		//$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
	
	while($q->Cargar())
	{	
		
		$pedidos_prestashop[$i][0] = $q->dato('id_transaction');
		
		$i++;	
	
	}
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	$tabla_paypal = retornarPedidosPrestashopDeTablaPaypal();
	
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>ID PAYPAL</td>
			<td>Nombre Paypal</td>
			<td>Email Paypal</td>
			<td>Estado Paypal</td>
			
			<td>Valor Paypal</td>
			<td>Fecha Paypal</td>
			<td></td>
		
		</tr>
	
	
	";
	
	for($i=0; $i<count($tabla_paypal); $i++)
	{
		
		
		$encontrado_en_el_arte = "NO ENCONTRADO EN EL ARTE";
		//$boton_arreglar = "<span class='link1'>Arreglar</span>";
		
		for($j=0; $j<count($pedidos_prestashop); $j++)
		{
			if($tabla_paypal[$i][12] == $pedidos_prestashop[$j][0])
			{
				$encontrado_en_el_arte = "OK";	
				$boton_arreglar = "";
				break;
			}
			
		}
		
			
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$tabla_paypal[$i][12]."</td>
			<td>".$tabla_paypal[$i][3]."</td>
			<td>".$tabla_paypal[$i][10]."</td>
			<td>".$tabla_paypal[$i][5]."</td>
			
			<td>".$tabla_paypal[$i][7]."</td>
			<td>".$tabla_paypal[$i][0]." ".$tabla_paypal[$i][1]."</td>
			<td>$encontrado_en_el_arte</td>
		
		</tr>";
		
		
		
				  
	}
	
	echo "</table>";
	
}




function conciliarPrestashopRespectoPaypal()
{
	require_once "../Application/Model/FuncionesSQL_Prestashop.php";
    $q = new ConecteMysql();
	
	
	
	$tabla_paypal = retornarPedidosPrestashopDeTablaPaypal();
	

	$query = "SELECT ps_orders.*, ps_order_state_lang.name, ps_paypal_order.id_transaction
	FROM ps_orders 
	INNER JOIN ps_order_state_lang ON ps_order_state_lang.id_order_state = ps_orders.current_state 
	LEFT JOIN ps_paypal_order ON ps_paypal_order.id_order = ps_orders.id_order 
	WHERE payment = 'PayPal' AND ps_order_state_lang.id_lang = 4 AND ps_orders.date_add >= '2015-05-01 00:00:00'";
	
	///$query = "select ps_orders.*, ps_order_state_lang.name from ps_orders, ps_order_state_lang where ps_order_state_lang.id_order_state = ps_orders.current_state AND payment <> 'PayPal' AND ps_order_state_lang.id_lang = 4 AND date_add >= '2015-01-01 00:00:00'";
	$q->ejecutar($query, "");
	
		
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>id_order Presta</td>
			<td>Referencia Presta</td>
			<td>ID Cliente Presta</td>
			<td>Medio de pago</td>
			<td>Valor Presta</td>
			<td>Valor Paypal</td>
			<td>Conciliacion Valor</td>
			<td>Factura No.</td>
			<td>Fecha</td>
			<td>Estado Presta</td>
			<td>transaction id Paypal</td>
			<td>Encontrado en Paypal</td>
		
		</tr>
	
	
	";
	
	
	$cont=0;
	
	while($q->Cargar())
	{ 
		
		$id_order = $q->dato('id_order');
		$reference = $q->dato('reference');
		$id_customer = $q->dato('id_customer');
		$payment = $q->dato('payment');
		$total_paid_tax_incl = $q->dato('total_paid_tax_incl');
		$invoice_number = $q->dato('invoice_number');		
		$date_add = $q->dato('date_add');
		$current_state = $q->dato('current_state');
		$current_state_texto = $q->dato('name');
		$transaction_id = $q->dato('id_transaction');
	
		
		
		
		//VAMOS CONCILIANDO CADA PEDIDO
			
			
			$encontrado_en_paypal = "NO ENCONTRADO";
			$encontrado_en_paypal_alerta = "";
			$estado_paypal = "-";
	
			$conciliacion_valor_alerta = "";
			$conciliacion_valor = "";
			$valor_paypal = "";
			
			/*$conciliacion_metodo_pago = "-";
			
			$metodo_pago_payu = "-";
			
			
			
			
			$conciliacion_metodo_pagoo_alerta = "";
			*/
			
			
			for($i=0; $i<count($tabla_paypal); $i++)
			{
				if($transaction_id == $tabla_paypal[$i][12])
				{
					$encontrado_en_paypal = "OK";
					$encontrado_en_paypal_alerta = "";
					$estado_paypal = $tabla_paypal[$i][5];
					$valor_paypal = $tabla_paypal[$i][7];
					
	
					if($valor_paypal - $total_paid_tax_incl == 0)
						$conciliacion_valor = "OK";
					else
					{
						$conciliacion_valor = "ERROR";
						$conciliacion_valor_alerta = "bgcolor='red'";
						//$cant_errores_valores++;
					}
				
					break;	
				}
				else
				{
					
					$encontrado_en_paypal_alerta = "bgcolor='red'";
					
					
				}
				
			}
			
			//if($encontrado_en_paypal == "NO ENCONTRADO")
				//$cant_no_encontrados_payu++;
			
			///////////////////////////////
		
		
		
		
		
		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$cont</td>
			<td>$id_order</td>
			<td>$reference</td>
			<td>$id_customer</td>
			<td>$payment</td>
			<td>$total_paid_tax_incl</td>
			<td>$valor_paypal</td>
			<td $conciliacion_valor_alerta>$conciliacion_valor</td>
			<td>$invoice_number</td>
			<td>$date_add</td>
			<td>$current_state_texto</td>
			<td>$transaction_id</td>
			<td $encontrado_en_paypal_alerta>$encontrado_en_paypal</td>
			
		
		</tr>";
		
		
		$cont++;
		
		
	}
	
	
	echo "</table>";
	
	
}








function ConciliarPayuRespectoPrestashop() 
{
	
	require_once "../Application/Model/FuncionesSQL_Prestashop.php";
    $q = new ConecteMysql();


	$query = "SELECT ps_orders.*, ps_order_state_lang.name, ps_owd_payuapi_transaction.id_transaction_payu 
	FROM ps_orders 
	INNER JOIN ps_order_state_lang ON ps_order_state_lang.id_order_state = ps_orders.current_state 
	LEFT JOIN ps_owd_payuapi_transaction ON ps_owd_payuapi_transaction.id_order = ps_orders.id_order 
	WHERE payment <> 'PayPal' AND ps_order_state_lang.id_lang = 4 AND ps_orders.date_add >= '2015-06-01 00:00:00'";
	
	
	$q->ejecutar($query, "");
	
	$i=0;
	
	
		//$estados = array("Rechazado", "Aprobado", "Iniciado");
		//$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Iniciado");
		//$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		//$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
	
	while($q->Cargar())
	{	
		
		$pedidos_prestashop[$i][0] = $q->dato('id_transaction_payu');
		
		$i++;	
	
	}
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	$tabla_payu = retornarPedidosPrestashopDeTablaPayu();
	
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>ID PAYU</td>
			<td>Referencia Payu</td>
			<td>Estado Payu</td>
			<td>Forma de pago Payu</td>
			<td>Valor Payu</td>
			<td>Fecha Payu</td>
			<td></td>
		
		</tr>
	
	
	";
	
	for($i=0; $i<count($tabla_payu); $i++)
	{
		
		
		$encontrado_en_el_arte = "NO ENCONTRADO EN EL ARTE";
		//$boton_arreglar = "<span class='link1'>Arreglar</span>";
		
		for($j=0; $j<count($pedidos_prestashop); $j++)
		{
			if($tabla_payu[$i][0] == $pedidos_prestashop[$j][0])
			{
				$encontrado_en_el_arte = "OK";	
				$boton_arreglar = "";
				break;
			}
			
		}
		
		if($tabla_payu[$i][5] == "APPROVED" && $encontrado_en_el_arte == "NO ENCONTRADO EN EL ARTE")
			$no_encontrado_alerta = "bgcolor='red'";
		elseif($tabla_payu[$i][5] == "PENDING" && $encontrado_en_el_arte == "NO ENCONTRADO EN EL ARTE")
			$no_encontrado_alerta = "bgcolor='yellow'";
		else
			$no_encontrado_alerta = "";
			
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$tabla_payu[$i][0]."</td>
			<td>".$tabla_payu[$i][2]."</td>
			<td $no_encontrado_alerta>".$tabla_payu[$i][5]."</td>
			<td>".$tabla_payu[$i][7]."</td>
			<td>".$tabla_payu[$i][3]."</td>
			<td>".$tabla_payu[$i][14]."</td>
			<td $no_encontrado_alerta>$encontrado_en_el_arte $boton_arreglar</td>
		
		</tr>";
		
		
		
				  
	}
	
	echo "</table>";
	
}





function conciliarPrestashopRespectoPayu()
{
	require_once "../Application/Model/FuncionesSQL_Prestashop.php";
    $q = new ConecteMysql();
	
	
	
	$tabla_payu = retornarPedidosPrestashopDeTablaPayu();
	


	//
	$query = "SELECT ps_orders.*, ps_order_state_lang.name, ps_owd_payuapi_transaction.id_transaction_payu 
	FROM ps_orders 
	INNER JOIN ps_order_state_lang ON ps_order_state_lang.id_order_state = ps_orders.current_state 
	LEFT JOIN ps_owd_payuapi_transaction ON ps_owd_payuapi_transaction.id_order = ps_orders.id_order 
	WHERE payment <> 'PayPal' AND ps_order_state_lang.id_lang = 4 AND ps_orders.date_add >= '2015-06-01 00:00:00' ORDER BY ps_orders.id_order";
	
	///$query = "select ps_orders.*, ps_order_state_lang.name from ps_orders, ps_order_state_lang where ps_order_state_lang.id_order_state = ps_orders.current_state AND payment <> 'PayPal' AND ps_order_state_lang.id_lang = 4 AND date_add >= '2015-01-01 00:00:00'";
	$q->ejecutar($query, "");
	
		
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>id_order Presta</td>
			<td>Referencia Presta</td>
			<td>ID Cliente Presta</td>
			<td>Medio de pago</td>
			<td>Valor Presta</td>
			<td>Valor Payu</td>
			<td>Conciliacion Valor</td>
			<td>Factura No.</td>
			<td>Fecha</td>
			<td>Estado Presta</td>
			<td>Estado Payu</td>
			<td>Conciliacion estado</td>
			<td>transaction id Payu</td>
			<td>Encontrado en Payu</td>
		
		</tr>
	
	
	";
	
	
	$cont=0;
	
	while($q->Cargar())
	{ 
		
		$id_order = $q->dato('id_order');
		$reference = $q->dato('reference');
		$id_customer = $q->dato('id_customer');
		$payment = $q->dato('payment');
		$total_paid_tax_incl = $q->dato('total_paid_tax_incl');
		$invoice_number = $q->dato('invoice_number');		
		$date_add = $q->dato('date_add');
		$current_state = $q->dato('current_state');
		$current_state_texto = $q->dato('name');
		$transaction_id = $q->dato('id_transaction_payu');
		
		
		$current_state_traduccion = "";
		
		if($current_state == 2 || $current_state == 4 || $current_state == 19 )
			$current_state_traduccion = "APPROVED";
		elseif($current_state == 6 || $current_state == 8 || $current_state == 26 || $current_state == 28 || $current_state == 29 || ($current_state >= 31 && $current_state <= 42) || $current_state == 45 || $current_state == 46)
			$current_state_traduccion = "DECLINED";
		elseif($current_state == 10 || $current_state == 11 || $current_state == 13 || $current_state == 16 || $current_state == 18 || $current_state == 20 || $current_state == 21 || $current_state == 22 || $current_state == 23 || $current_state == 24 || $current_state == 27 || $current_state == 30 || $current_state == 44)
			$current_state_traduccion = "PENDING";
			
		
		
		
		//VAMOS CONCILIANDO CADA PEDIDO
			
			
			$encontrado_en_payu = "NO ENCONTRADO";
			$encontrado_en_payu_alerta = "";
			$estado_payu = "-";
			$conciliacion_estado = "-";
			$conciliacion_estado_alerta = "";
			$conciliacion_valor_alerta = "";
			$conciliacion_valor = "";
			$valor_payu = "";
			
			/*$conciliacion_metodo_pago = "-";
			
			$metodo_pago_payu = "-";
			
			
			
			
			$conciliacion_metodo_pagoo_alerta = "";
			*/
			
			
			for($i=0; $i<count($tabla_payu); $i++)
			{
				if($transaction_id == $tabla_payu[$i][0])
				{
					$encontrado_en_payu = "OK";
					$encontrado_en_payu_alerta = "";
					$estado_payu = $tabla_payu[$i][5];
					$metodo_pago_payu = $tabla_payu[$i][7];
					$valor_payu = $tabla_payu[$i][3];
					
					
					
					
					
					if($estado_payu == $current_state_traduccion)
						$conciliacion_estado = "OK";
					elseif($estado_payu == "EXPIRED" && $current_state_traduccion == "DECLINED")
						$conciliacion_estado = "OK";
					else
						{
							$conciliacion_estado = "ERROR";
							$conciliacion_estado_alerta = "bgcolor='red'";
							//$cant_errores_estados++;
						}
					
					/*if($traduccion_metodos_pago_payu[$metodo_pago_payu] == $metodo_pago_texto)
						$conciliacion_metodo_pago = "OK";
					else
					{
						$conciliacion_metodo_pago = "ERROR";
						$conciliacion_metodo_pagoo_alerta = "bgcolor='red'";
						$cant_errores_metodos_pago++;
					}
					
					*/
					
					
					if($valor_payu - $total_paid_tax_incl == 0)
						$conciliacion_valor = "OK";
					else
					{
						$conciliacion_valor = "ERROR";
						$conciliacion_valor_alerta = "bgcolor='red'";
						//$cant_errores_valores++;
					}
					
					
					
					
					break;	
				}
				else
				{
					if($current_state_texto <> "Capturando datos de tarjeta")
						$encontrado_en_payu_alerta = "bgcolor='red'";
					else
						$encontrado_en_payu_alerta = "";
					
				}
				
			}
			
			//if($encontrado_en_payu == "NO ENCONTRADO")
				//$cant_no_encontrados_payu++;
			
			///////////////////////////////
		
		
		
		
		
		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$cont</td>
			<td>$id_order</td>
			<td>$reference</td>
			<td>$id_customer</td>
			<td>$payment</td>
			<td>$total_paid_tax_incl</td>
			<td>$valor_payu</td>
			<td $conciliacion_valor_alerta>$conciliacion_valor</td>
			<td>$invoice_number</td>
			<td>$date_add</td>
			<td>$current_state_texto</td>
			<td>$estado_payu
			<td $conciliacion_estado_alerta>$conciliacion_estado</td>
			<td>$transaction_id</td>
			<td $encontrado_en_payu_alerta>$encontrado_en_payu</td>
			
		
		</tr>";
		
		
		$cont++;
		
		
	}
	
	
	echo "</table>";
}


function ConciliarPayuRespectoElArtePEDIDOS($orden) 
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();


	$query = "select * from pedidos where transactionId <> ''";
	$q->ejecutar($query, "");
	
	$i=0;
	
	
		$estados = array("Rechazado", "Aprobado", "Iniciado");
		$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Iniciado");
		$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
	
	while($q->Cargar())
	{
		
		$pedidos_el_arte[$i][0] = $q->dato('transactionId');
		$pedidos_el_arte[$i][1] = $q->dato('id');
		$pedidos_el_arte[$i][2] = $q->dato('usuario');
		$pedidos_el_arte[$i][9] = $q->dato('creado');
		
		$i++;	
	
	
	}
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	$tabla_payu = retornarPedidosElArteDeTablaPayu();
	
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>ID PAYU</td>
			<td>Referencia</td>
			<td>Estado</td>
			<td>Forma de pago</td>
			<td>Valor</td>
			<td>Fecha</td>
			<td></td>
		
		</tr>
	
	
	";
	
	for($i=0; $i<count($tabla_payu); $i++)
	{
		
		
		$encontrado_en_el_arte = "NO ENCONTRADO EN EL ARTE";
		//$boton_arreglar = "<span class='link1'>Arreglar</span>";
		
		for($j=0; $j<count($pedidos_el_arte); $j++)
		{
			if($tabla_payu[$i][0] == $pedidos_el_arte[$j][0])
			{
				$encontrado_en_el_arte = "OK";	
				$boton_arreglar = "";
				break;
			}
			
		}
		
		if($tabla_payu[$i][5] == "APPROVED" && $encontrado_en_el_arte == "NO ENCONTRADO EN EL ARTE")
			$no_encontrado_alerta = "bgcolor='red'";
		elseif($tabla_payu[$i][5] == "PENDING" && $encontrado_en_el_arte == "NO ENCONTRADO EN EL ARTE")
			$no_encontrado_alerta = "bgcolor='yellow'";
		else
			$no_encontrado_alerta = "";
			
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$tabla_payu[$i][0]."</td>
			<td>".$tabla_payu[$i][2]."</td>
			<td $no_encontrado_alerta>".$tabla_payu[$i][5]."</td>
			<td>".$tabla_payu[$i][7]."</td>
			<td>".$tabla_payu[$i][3]."</td>
			<td>".$tabla_payu[$i][14]."</td>
			<td $no_encontrado_alerta>$encontrado_en_el_arte $boton_arreglar</td>
		
		</tr>";
		
		
		
				  
	}
	
	echo "</table>";
	
}






function ConciliarPayuRespectoElArte($orden) //CONCILIACION DE INSCRITOS AL EVENTO DE EL ARTE DE AMAR SIN APEGOS
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	$inscritos_el_arte = array();

	$query = "select * from inscritos_conferencia $ordenar";
	$q->ejecutar($query, "");
	
	$i=0;
	
	
		$estados = array("Rechazado", "Aprobado", "Iniciado");
		$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Iniciado");
		$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
		
		
		$traduccion_estados_payu_a_id = array("APPROVED" => "1", "DECLINED" => "0", "EXPIRED" => "0", "ERROR" => "0", "PENDING" => "2");
		$traduccion_metodos_pago_payu_a_id = array("VISA" => "1", "DINERS" => "1", "MASTERCARD" => "1", "AMEX" => "1", "PSE" => "3", "BALOTO" => "4", "Oxxo" => "5", "BCP" => "6");
	
	while($q->Cargar())
	{
		
		$inscritos_el_arte[$i][0] = $q->dato('transaction_id');
		$inscritos_el_arte[$i][1] = $q->dato('id_inscripcion');
		$inscritos_el_arte[$i][2] = $q->dato('usuario_id');
		$inscritos_el_arte[$i][3] = $q->dato('usuario_id');
		$inscritos_el_arte[$i][4] = $q->dato('estado_inscripcion');
		$inscritos_el_arte[$i][5] = $estados[$estado_inscripcion];
		$inscritos_el_arte[$i][6] = $q->dato('metodo_pago');
		$inscritos_el_arte[$i][7] = $metodos_pago[$metodo_pago];
		$inscritos_el_arte[$i][8] = $q->dato('valor_inscripcion');
		$inscritos_el_arte[$i][9] = $q->dato('creado');
		
		$i++;	
	
	
	}
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	$tabla_payu = retornarInscritosConfDeTablaPayu();
	
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>Num</td>
			<td>ID PAYU</td>
			<td>Usuario ID</td>
			<td>Referencia</td>
			<td>Estado</td>
			<td>Forma de pago</td>
			<td>Valor</td>
			<td>Fecha</td>
			<td></td>
		
		</tr>
	
	
	";
	
	for($i=0; $i<count($tabla_payu); $i++)
	{
		
		
		
		
		if($traduccion_metodos_pago_payu[$tabla_payu[$i][7]]  == "Tarjeta de credito") 
			$usuario_id = substr($tabla_payu[$i][2], 2);
		else
			$usuario_id = substr($tabla_payu[$i][2], 4);
		
		$encontrado_en_el_arte = "NO ENCONTRADO EN EL ARTE";
		
		//$usuario_id,".$traduccion_estados_payu_a_id[$tabla_payu[$i][5]].","..",'".."','".."','".$tabla_payu[$i][14]."'
		
		$fecha_creado = split(" ", $tabla_payu[$i][14]);
		
		
		
		
		$boton_arreglar = "<span class='link1' onclick=agregarInscritosConferencia($usuario_id,".$traduccion_estados_payu_a_id[$tabla_payu[$i][5]].",".$traduccion_metodos_pago_payu_a_id[$tabla_payu[$i][7]].",'".$tabla_payu[$i][0]."','".$tabla_payu[$i][3]."','".$fecha_creado[0]."','".$fecha_creado[1]."',$i)>Arreglar</span>";
		
		for($j=0; $j<count($inscritos_el_arte); $j++)
		{
			if($tabla_payu[$i][0] == $inscritos_el_arte[$j][0])
			{
				$encontrado_en_el_arte = "OK";	
				$boton_arreglar = "";
				break;
			}
			
		}
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$tabla_payu[$i][0]."</td>
			<td>$usuario_id</td>
			<td>".$tabla_payu[$i][2]."</td>
			<td>".$tabla_payu[$i][5]."</td>
			<td>".$tabla_payu[$i][7]."</td>
			<td>".$tabla_payu[$i][3]."</td>
			<td>".$tabla_payu[$i][14]."</td>
			<td id='encontrado_payu$i'><span id='encontrado_payu_texto$i'>$encontrado_en_el_arte</span> $boton_arreglar </td>
		
		</tr>";
		
		
		
				  
	}
	
	echo "</table>";
	
}


function ConciliarElArteRespectoPayuPEDIDOS($orden) 
{
	
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	
	$query = "select * from pedidos where transactionId <> ''";
	$q->ejecutar($query, "");
	
	
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	
	
	$tabla_payu = retornarPedidosElArteDeTablaPayu();
	
	
	
	/////////////////////////////////////
	
	
	
	
	echo "
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>id Pedido</td>
			<td>ID Payu</td>
			<td>Usuario</td>
			<td>Estado El arte</td>
			<td>Estado Payu</td>
			<td>Conciliacion Estado</td>
			<td>Metodo pago El arte</td>
			<td>Metodo pago Payu</td>
			<td>Conciliacion Metodo Pago</td>
			<td>Valor El arte</td>
			<td>Valor Payu</td>
			<td>Conciliacion Valor</td>
			<td>Fecha</td>
			<td>REVISA SI EL PEDIDO ESTÁ EN EL ARTE PERO NO EN PAYU</td>
		
		</tr>
	
	";
	
	$cant_no_encontrados_payu = 0;
	$cant_errores_estados = 0;
	$cant_errores_metodos_pago = 0;
	$cant_errores_valores = 0;
	
	while($q->Cargar())
	{
		$estados = array("", "Pendiente", "Aprobado", "Rechazado");
		$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Pendiente");
		$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
		
		
		$transaction_id = $q->dato('transactionId');
		$id_pedido = $q->dato('id');
		$usuario_id = $q->dato('usuario');
		$estado_inscripcion = $q->dato('status');
		$estado_inscripcion_texto = $estados[$estado_inscripcion];
		$metodo_pago = $q->dato('formaPago');
		$metodo_pago_texto = $metodos_pago[$metodo_pago];
		$valor_pedido = $q->dato('valor');
		$creado = $q->dato('creado');
				
			
		if($metodo_pago <> 2) //SI ES UN PEDIDO DE PAYPAL NO HACE NADA
		{
		
		
			//VAMOS CONCILIANDO CADA PEDIDO
			
			
			$encontrado_en_payu = "NO ENCONTRADO";
			$conciliacion_estado = "-";
			$conciliacion_metodo_pago = "-";
			$estado_payu = "-";
			$metodo_pago_payu = "-";
			$valor_payu = "";
			$conciliacion_valor = "";
			
			$conciliacion_estado_alerta = "";
			$conciliacion_metodo_pagoo_alerta = "";
			$conciliacion_valor_alerta = "";
			
			
			for($i=0; $i<count($tabla_payu); $i++)
			{
				if($transaction_id == $tabla_payu[$i][0])
				{
					$encontrado_en_payu = "OK";
					$estado_payu = $tabla_payu[$i][5];
					$metodo_pago_payu = $tabla_payu[$i][7];
					$valor_payu = $tabla_payu[$i][3];
					
					if($traduccion_estados_payu[$estado_payu] == $estado_inscripcion_texto)
						$conciliacion_estado = "OK";
					else
					{
						$conciliacion_estado = "ERROR";
						$conciliacion_estado_alerta = "bgcolor='red'";
						$cant_errores_estados++;
					}
					
					if($traduccion_metodos_pago_payu[$metodo_pago_payu] == $metodo_pago_texto)
						$conciliacion_metodo_pago = "OK";
					else
					{
						$conciliacion_metodo_pago = "ERROR";
						$conciliacion_metodo_pagoo_alerta = "bgcolor='red'";
						$cant_errores_metodos_pago++;
					}
					
					
					
					if($valor_payu - $valor_pedido == 0)
						$conciliacion_valor = "OK";
					else
					{
						$conciliacion_valor = "ERROR";
						$conciliacion_valor_alerta = "bgcolor='red'";
						$cant_errores_valores++;
					}
					
					
					
					
					break;	
				}
				
			}
			
			if($encontrado_en_payu == "NO ENCONTRADO")
				$cant_no_encontrados_payu++;
			
			///////////////////////////////
					
			
			
				echo 
				"<tr bgcolor='#FFFFFF'>
					<td>$id_pedido</td>
					<td>$transaction_id</td>
					<td $usuario_repetido_alerta>$usuario_id</td>
					<td>$estado_inscripcion_texto</td>
					<td>$estado_payu</td>
					<td $conciliacion_estado_alerta>$conciliacion_estado</td>
					<td>$metodo_pago_texto</td>
					<td>$metodo_pago_payu</td>
					<td $conciliacion_metodo_pagoo_alerta>$conciliacion_metodo_pago</td>
					<td>$valor_pedido</td>
					<td>$valor_payu</td>
					<td $conciliacion_valor_alerta>$conciliacion_valor</td>
					<td>$creado</td>
					<td>$encontrado_en_payu</td>
				
				</tr>
				";
				
		}
		
		
		
	
	}
	
	echo "</table>";
	
	echo "<br>
		TOTAL NO ENCONTRADOS EN PAYU: $cant_no_encontrados_payu <br>
		TOTAL ERRORES EN ESTADOS: $cant_errores_estados <br>
		TOTAL ERRORES EN METODOS DE PAGO: $cant_errores_metodos_pago <br>
		TOTAL ERRORES EN VALOR: $cant_errores_valores <br>
		";
	
}





















function ConciliarElArteRespectoPayu($orden) //CONCILIACION DE INSCRITOS AL EVENTO DE EL ARTE DE AMAR SIN APEGOS
{
	
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	if($orden == 1)
		$ordenar = "Order By usuario_id, id_inscripcion Asc";
	
	$query = "select * from inscritos_conferencia $ordenar";
	$q->ejecutar($query, "");
	
	
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	
	
	$tabla_payu = retornarInscritosConfDeTablaPayu();
	
	
	
	/////////////////////////////////////
	
	
	
	
	echo "
	<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
		<tr class='tabla1_cabecera'>
			<td>id Pedido</td>
			<td>ID Payu</td>
			<td>Referencia Pago</td>
			<td onclick='ConciliarElArteRespectoPayu(1)'><a href='#'>Usuario</a></td>
			<td>Estado El arte</td>
			<td>Estado Payu</td>
			<td>Conciliacion Estado</td>
			<td>Metodo pago El arte</td>
			<td>Metodo pago Payu</td>
			<td>Conciliacion Metodo Pago</td>
			<td>Valor El arte</td>
			<td>Valor Payu</td>
			<td>Conciliacion Valor</td>
			<td>Fecha</td>
			<td>REVISA SI EL PEDIDO ESTÁ EN EL ARTE PERO NO EN PAYU</td>
		
		</tr>
	
	";
	
	$cant_no_encontrados_payu = 0;
	$cant_errores_estados = 0;
	$cant_errores_metodos_pago = 0;
	$cant_errores_valores = 0;
	
	while($q->Cargar())
	{
		$estados = array("Rechazado", "Aprobado", "Iniciado");
		$traduccion_estados_payu = array("APPROVED" => "Aprobado", "DECLINED" => "Rechazado", "EXPIRED" => "Rechazado", "ERROR" => "Rechazado", "PENDING" => "Iniciado");
		$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		$traduccion_metodos_pago_payu = array("VISA" => "Tarjeta de credito", "DINERS" => "Tarjeta de credito", "MASTERCARD" => "Tarjeta de credito", "AMEX" => "Tarjeta de credito", "PSE" => "PSE", "BALOTO" => "Baloto", "Oxxo" => "Oxxo", "BCP" => "BCP");
		
		
		
		
		if($orden == 1)
		{
			$usuario_repetido_alerta = ""; 
		
			if($usuario_id_anterior ==  $q->dato('usuario_id'))
				$usuario_repetido_alerta = "bgcolor='yellow'";
			else
				$usuario_repetido_alerta = "";
		}
		
		$transaction_id = $q->dato('transaction_id');
		$id_inscripcion = $q->dato('id_inscripcion');
		$usuario_id = $q->dato('usuario_id');
		$usuario_id_anterior = $q->dato('usuario_id');
		$estado_inscripcion = $q->dato('estado_inscripcion');
		$estado_inscripcion_texto = $estados[$estado_inscripcion];
		$metodo_pago = $q->dato('metodo_pago');
		$metodo_pago_texto = $metodos_pago[$metodo_pago];
		$valor_inscripcion = $q->dato('valor_inscripcion');
		$creado = $q->dato('creado');
		
		if($metodo_pago==1)
			$referencia_pago = "CF".$usuario_id;
		else
			$referencia_pago = "CONF".$usuario_id;
			
			
		if($metodo_pago <> 2) //SI ES UN PEDIDO DE PAYPAL NO HACE NADA
		{
		
		
			//VAMOS CONCILIANDO CADA PEDIDO
			
			
			$encontrado_en_payu = "NO ENCONTRADO";
			$conciliacion_estado = "-";
			$conciliacion_metodo_pago = "-";
			$estado_payu = "-";
			$metodo_pago_payu = "-";
			$valor_payu = "";
			$conciliacion_valor = "";
			
			$conciliacion_estado_alerta = "";
			$conciliacion_metodo_pagoo_alerta = "";
			$conciliacion_valor_alerta = "";
			
			
			for($i=0; $i<count($tabla_payu); $i++)
			{
				if($transaction_id == $tabla_payu[$i][0])
				{
					$encontrado_en_payu = "OK";
					$estado_payu = $tabla_payu[$i][5];
					$metodo_pago_payu = $tabla_payu[$i][7];
					$valor_payu = $tabla_payu[$i][3];
					
					if($traduccion_estados_payu[$estado_payu] == $estado_inscripcion_texto)
						$conciliacion_estado = "OK";
					else
					{
						$conciliacion_estado = "ERROR";
						$conciliacion_estado_alerta = "bgcolor='red'";
						$cant_errores_estados++;
					}
					
					if($traduccion_metodos_pago_payu[$metodo_pago_payu] == $metodo_pago_texto)
						$conciliacion_metodo_pago = "OK";
					else
					{
						$conciliacion_metodo_pago = "ERROR";
						$conciliacion_metodo_pagoo_alerta = "bgcolor='red'";
						$cant_errores_metodos_pago++;
					}
					
					
					
					if($valor_payu - $valor_inscripcion == 0)
						$conciliacion_valor = "OK";
					else
					{
						$conciliacion_valor = "ERROR";
						$conciliacion_valor_alerta = "bgcolor='red'";
						$cant_errores_valores++;
					}
					
					
					
					
					break;	
				}
				
			}
			
			if($encontrado_en_payu == "NO ENCONTRADO")
				$cant_no_encontrados_payu++;
			
			///////////////////////////////
			
			
			
			
			
				echo 
				"<tr bgcolor='#FFFFFF'>
					<td>$id_inscripcion</td>
					<td>$transaction_id</td>
					<td>$referencia_pago</td>
					<td $usuario_repetido_alerta>$usuario_id</td>
					<td>$estado_inscripcion_texto</td>
					<td>$estado_payu</td>
					<td $conciliacion_estado_alerta>$conciliacion_estado</td>
					<td>$metodo_pago_texto</td>
					<td>$metodo_pago_payu</td>
					<td $conciliacion_metodo_pagoo_alerta>$conciliacion_metodo_pago</td>
					<td>$valor_inscripcion</td>
					<td>$valor_payu</td>
					<td $conciliacion_valor_alerta>$conciliacion_valor</td>
					<td>$creado</td>
					<td>$encontrado_en_payu</td>
				
				</tr>
				";
				
		}
		
		
		
	
	}
	
	echo "</table>";
	
	echo "<br>
		TOTAL NO ENCONTRADOS EN PAYU: $cant_no_encontrados_payu <br>
		TOTAL ERRORES EN ESTADOS: $cant_errores_estados <br>
		TOTAL ERRORES EN METODOS DE PAGO: $cant_errores_metodos_pago <br>
		TOTAL ERRORES EN VALOR: $cant_errores_valores <br>
		";
	
}



function retornarInscritosConfDeTablaPayu()
{

	$i=0;
	
	$fp = fopen ( "orders1.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		
		
		if($data[2][0] == "C")
		{
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		}
		
		
	
	} 
	fclose ( $fp );
	
	
	//////////
	
	$fp = fopen ( "orders2.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2][0] == "C")
		{
		
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		
		}
	
	} 
	fclose ( $fp );
	
	
	////////
	
	$fp = fopen ( "orders3.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2][0] == "C")
		{
			$j=0;
		
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
		
			$i++;
		}
		
	
	} 
	fclose ( $fp );
	 
	return $tabla_payu;

	
}


function retornarPedidosElArteDeTablaPayu()
{

	$i=0;
	
	$fp = fopen ( "orders1.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		
		
		if($data[2] >= 100000 || $data[2][0] == "P")
		{
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		}
		
		
	
	} 
	fclose ( $fp );
	
	
	//////////
	
	$fp = fopen ( "orders2.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2] >= 100000 || $data[2][0] == "P")
		{
		
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		
		}
	
	} 
	fclose ( $fp );
	
	
	////////
	
	$fp = fopen ( "orders3.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2] >= 100000 || $data[2][0] == "P")
		{
			$j=0;
		
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
		
			$i++;
		}
		
	
	} 
	fclose ( $fp );
	 
	return $tabla_payu;

	
}






function retornarPedidosPrestashopDeTablaPayu()
{

	$i=0;
	
	$fp = fopen ( "orders1.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		
		
		if($data[2] > 0 && $data[2] < 100000)
		{
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		}
		
		
	
	} 
	fclose ( $fp );
	
	
	//////////
	
	$fp = fopen ( "orders2.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2] > 0 && $data[2] < 100000)
		{
		
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		
		}
	
	} 
	fclose ( $fp );
	
	
	////////
	
	$fp = fopen ( "orders3.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		if($data[2] > 0 && $data[2] < 100000)
		{
			$j=0;
		
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
		
			$i++;
		}
		
	
	} 
	fclose ( $fp );
	 
	return $tabla_payu;

	
}





function retornarPedidosPrestashopDeTablaPaypal()
{

	$i=0;
	
	$fp = fopen ( "paypal.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		
		
		if($data[7] > 0 && $data[15] <> "Compra en elartedesabervivir.com") //Si el valor del movimeinto es positivo tengalo en cuenta sino ignorelo. Solo nos interesan los pagos recibidos, no los enviados. 
		{
			$j=0;
			
			foreach($data as $row) 
			{
				$tabla_payu[$i][$j++] = $row; 
			}
			
			$i++;
		}
		
		
	
	} 
	fclose ( $fp );
	
	

	 
	return $tabla_payu;

	
}























function mostrarTablaPayu()
{

	
	echo "<table border='1'>";
	
	$fp = fopen ( "paypal.csv" , "r" ); 
while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) 
{ 	// Mientras hay líneas que leer...
	
	echo "<tr>";
	
	foreach($data as $row) // Muestra todos los campos de la fila actual 
	{
		echo "<td>$row</td>"; 
	}
	
	echo "</tr>";
	

} 
fclose ( $fp ); 


	



echo "</table>";
	
	
	
	

	
}

?>
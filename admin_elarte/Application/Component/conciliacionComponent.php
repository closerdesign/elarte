<?php 

function ConciliarPayuRespectoElArte($orden)
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
	$tabla_payu = retornarTablaPayu();
	
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
		
		for($j=0; $j<count($inscritos_el_arte); $j++)
		{
			if($tabla_payu[$i][0] == $inscritos_el_arte[$j][0])
			{
				$encontrado_en_el_arte = "OK";	
				break;
			}
			
		}
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$tabla_payu[$i][0]."</td>
			<td>".$tabla_payu[$i][2]."</td>
			<td>".$tabla_payu[$i][5]."</td>
			<td>".$tabla_payu[$i][7]."</td>
			<td>".$tabla_payu[$i][3]."</td>
			<td>".$tabla_payu[$i][14]."</td>
			<td>$encontrado_en_el_arte</td>
		
		</tr>";
		
		
		
				  
	}
	
	echo "</table>";
	
}


function ConciliarElArteRespectoPayu($orden)
{
	
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	if($orden == 1)
		$ordenar = "Order By usuario_id, id_inscripcion Asc";
	
	$query = "select * from inscritos_conferencia $ordenar";
	$q->ejecutar($query, "");
	
	
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	
	
	$tabla_payu = retornarTablaPayu();
	
	
	
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



function retornarTablaPayu()
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








function mostrarTablaPayu()
{

	
	echo "<table border='1'>";
	
	$fp = fopen ( "orders1.csv" , "r" ); 
while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
{ 	// Mientras hay líneas que leer...
	
	echo "<tr>";
	
	foreach($data as $row) // Muestra todos los campos de la fila actual 
	{
		echo "<td>$row</td>"; 
	}
	
	echo "</tr>";
	

} 
fclose ( $fp ); 


	$fp = fopen ( "orders2.csv" , "r" ); 
while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
{ 	// Mientras hay líneas que leer...
	
	echo "<tr>";
	
	foreach($data as $row) // Muestra todos los campos de la fila actual 
	{
		echo "<td>$row</td>"; 
	}
	
	echo "</tr>";
	

} 
fclose ( $fp ); 


$fp = fopen ( "orders3.csv" , "r" ); 
while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
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
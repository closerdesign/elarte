<?php 
function prueba($orden)
{
	
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	if($orden == 1)
		$ordenar = "Order By usuario_id, id_inscripcion Asc";
	
	$query = "select * from inscritos_conferencia $ordenar";
	$q->ejecutar($query, "");
	
	
	
	//LEEMOS ARCHIVO CVS Y LO METEMOS EN UN ARRAY
	
	$i=0;
	
	$fp = fopen ( "orders.csv" , "r" ); 
	while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ) 
	{ 	// Mientras hay líneas que leer...
		
		$j=0;
		
		foreach($data as $row) // Muestra todos los campos de la fila actual 
		{
			$tabla_payu[$i][$j++] = $row; 
		}
		
		$i++;
		
		
	
	} 
	fclose ( $fp ); 
	
	
	
	
	/////////////////////////////////////
	
	
	
	
	echo "
	<table border='1'>
		<tr>
			<td>ID</td>
			<td>Referencia Pago</td>
			<td onclick='prueba(1)'><a href='#'>Usario</a></td>
			<td>Estado El arte</td>
			<td>Estado Payu</td>
			<td>Conciliacion Estado</td>
			<td>Metodo pago El arte</td>
			<td>Metodo pago Payu</td>
			<td>Valor</td>
			<td>Fecha</td>
			<td>REVISA SI EL PEDIDO ESTÁ EN EL ARTE PERO NO EN PAYU</td>
		
		</tr>
	
	";
	
	$cant_no_encontrados_payu = 0;
	$cant_errores_estados = 0;
	
	while($q->Cargar())
	{
		$estados = array("Rechazado", "Aprobado", "Iniciado");
		$traduccion_estados_payu = array("Capturada" => "Aprobado", "Cancelada" => "Rechazado", "Declinada" => "Rechazado", "En progreso" => "Iniciado");
		$metodos_pago = array("", "Tarjeta de credito", "Paypal", "PSE", "Baloto", "Oxxo", "BCP");
		
		
		
		
		if($orden == 1)
		{
			$usuario_repetido_alerta = ""; 
		
			if($usuario_id_anterior ==  $q->dato('usuario_id'))
				$usuario_repetido_alerta = "bgcolor='#FF0000'";
			else
				$usuario_repetido_alerta = "";
		}
		
		
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
			$estado_payu = "-";
			$metodo_pago_payu = "-";
			
			for($i=0; $i<count($tabla_payu); $i++)
			{
				if($referencia_pago == $tabla_payu[$i][1])
				{
					$encontrado_en_payu = "OK";
					$estado_payu = $tabla_payu[$i][6];
					$metodo_pago_payu = $tabla_payu[$i][16];
					
					if($traduccion_estados_payu[$estado_payu] == $estado_inscripcion_texto)
						$conciliacion_estado = "OK";
					else
					{
						$conciliacion_estado = "ERROR";
						$cant_errores_estados++;
					}
					
					break;	
				}
				
			}
			
			if($encontrado_en_payu == "NO ENCONTRADO")
				$cant_no_encontrados_payu++;
			
			///////////////////////////////
			
			
			
			
			
				echo 
				"<tr>
					<td>$id_inscripcion</td>
					<td>$referencia_pago</td>
					<td $usuario_repetido_alerta>$usuario_id</td>
					<td>$estado_inscripcion_texto</td>
					<td>$estado_payu</td>
					<td>$conciliacion_estado</td>
					<td>$metodo_pago_texto</td>
					<td>$metodo_pago_payu</td>
					<td>$valor_inscripcion</td>
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
		";
	
}




function mostrarTablaPayu()
{

	
	echo "<table border='1'>";
	
	$fp = fopen ( "orders.csv" , "r" ); 
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
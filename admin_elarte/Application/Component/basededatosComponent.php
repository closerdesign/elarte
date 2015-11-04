<?php 




function inscritosConf1()
{
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	$q2 = new ConecteMysql();


	$query = "SELECT * FROM usuarios";
		
		
		
	$q->ejecutar($query, "");
	
	
	echo "<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>id</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Email</td>
					<td>Ciudad</td>
					<td>Pais</td>
					<td>Genero</td>
					<td>Fecha Nacimiento</td>
					<td>Status</td>
					<td>Optin</td>
					<td>Perfil</td>
					<td>Prestashop User</td>
					<td>Fecha de creacion</td>
				</tr>
				
				";
	
	$cont = 0;
		
	while($q->Cargar())
	{
		$id = $q->dato('id');
		$nombre = $q->dato('nombre');
		$apellido = $q->dato('apellido');
		$email = $q->dato('email');
		$ciudad = $q->dato('ciudad');
		$pais = $q->dato('pais');
		$genero = $q->dato('genero');
		$fecha_nacimiento = $q->dato('fecha_nacimiento');
		
		$status = $q->dato('status');
		$optin = $q->dato('optin');
		$perfil = $q->dato('perfil');
		$prestashop_user = $q->dato('ps');
		$creado = $q->dato('creado');
		
		
		
		

		
		
		
		echo "
						
				<tr bgcolor='#FFFFFF'>
					<td>$id</td>
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$email</td>
					<td>$ciudad</td>
					<td>$pais</td>
					<td>$genero</td>
					<td>$fecha_nacimiento</td>
					<td>$status</td>
					<td>$optin</td>
					<td>$perfil</td>
					<td>$prestashop_user</td>
					<td>$creado</td>
				</tr>
					
						";
		
		 
		$cont++;
	
	}
	
	echo "</table>";
	
	echo "<br>$cont";
	
	
	
	
	/*$tabla_paypal = retornarPedidosElArteDeTablaPaypal();
	
	
	$fechaActual = "";
	
	
	
	
	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();


	$query = "(SELECT pedidos.id pedido_id, pedidos.usuario, pedidos.creado, usuarios.email, usuarios.nombreCompleto, pedidos.valor, pedidos.status, admin_pedidos_aprobados.*  FROM `pedidos` 
		LEFT JOIN usuarios ON pedidos.usuario = usuarios.id
		LEFT JOIN admin_pedidos_aprobados ON pedidos.id = admin_pedidos_aprobados.id_pedido
		WHERE pedidos.formaPago = 2) 
		
        UNION 
		
		(SELECT inscritos_conferencia.id_inscripcion,  inscritos_conferencia.usuario_id, inscritos_conferencia.creado, usuarios.email, usuarios.nombreCompleto, inscritos_conferencia.valor_inscripcion, inscritos_conferencia.estado_inscripcion, admin_pedidos_aprobados.* FROM `inscritos_conferencia` 
 		LEFT JOIN usuarios ON inscritos_conferencia.usuario_id = usuarios.id 
        LEFT JOIN admin_pedidos_aprobados ON inscritos_conferencia.id_inscripcion = admin_pedidos_aprobados.id_pedido
        WHERE inscritos_conferencia.metodo_pago = 2) 
        ORDER BY creado DESC";
		
		
		
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
		$pedidos_el_arte[$i][4] = $q->dato('creado');
		$pedidos_el_arte[$i][5] = $q->dato('pedido_id');
		
		if($q->dato('pedido_id') > 100000)
		{
			$pedidos_el_arte[$i][6] = "pedidos";
			$pedidos_el_arte[$i][7] = $estados_pedidos[$q->dato('status')];
			
		}
		else
		{
			$pedidos_el_arte[$i][6] = "Inscripcion";
			$pedidos_el_arte[$i][7] = $estados_inscritos[$q->dato('status')];	
			
			
				
		}
		
		$pedidos_el_arte[$i][8] = $q->dato('nombreCompleto');
		
		
		
		$i++;
		
	}
		
	
	
	
	$cont = 0;
	
	
	for($i=0; $i<count($tabla_paypal); $i++)
	{
			
			$fechaAjustada = split("/", $tabla_paypal[$i][0]);
			$fechaAjustada = strtotime ( '+2 hour', strtotime ( $fechaAjustada[2]."/".$fechaAjustada[1]."/".$fechaAjustada[0]." ".$tabla_paypal[$i][1] ) ) ;
			$fechaAjustada = date ( 'Y-m-d H:i:s' , $fechaAjustada );
			
			$fechaAjustadaSinHora = split(" ",$fechaAjustada);
			
			
			if($fechaAjustadaSinHora[0] <> $fechaActual)
			{
				
				$fechaActual = $fechaAjustadaSinHora[0];
								
				if($i>0)
					echo "</table>";
					
					
				
									
				
				echo "
				<br><br>Fecha: $fechaActual <br>
				
				<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>Fecha en El arte</td>
					<td>Nombre El arte</td>
					<td>Email El arte</td>
					<td>Valor El arte</td>
					<td>Estado El arte</td>
					<td>Tipo de compra</td>
				</tr>
				
				";

				
				$k = 0;	
					
				while($cont<count($pedidos_el_arte))
				{
					
					$fechaElArte = split(" ", $pedidos_el_arte[$cont][4]);
					
					if($fechaElArte[0] == $fechaActual)
					{
						$k = 1;
					
						echo "
						
							<tr bgcolor='#FFFFFF'>
							<td>".$pedidos_el_arte[$cont][4]."</td>
							<td>".$pedidos_el_arte[$cont][8]."</td>
							<td>".$pedidos_el_arte[$cont][2]."</td>
							<td>".$pedidos_el_arte[$cont][3]."</td>
							<td>".$pedidos_el_arte[$cont][7]."</td>
							<td>".$pedidos_el_arte[$cont][6]."</td>
							</tr>
					
						";
						
						$cont++;
						
					}else
					{
						if($k == 1)
							break;	
						else
							$cont++;
					}
						
						
					
				}
						
					
					
				
				echo "
				
				
				</table>
				<br>
								
				<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>Fecha en Paypal</td>
					<td>Fecha ajustada a El Arte (+2 horas)</td>
					<td>Nombre Paypal</td>
					<td>Email Paypal</td>
					<td>Valor Paypal</td>
					<td>Estado Paypal</td>
					<td>Descripcion Paypal</td>
				</tr>
				";
					
				
			}
	
			
			echo "
				<tr bgcolor='#FFFFFF'>
					<td>".$tabla_paypal[$i][0]." ".$tabla_paypal[$i][1]."</td>
					<td>$fechaAjustada</td>
					<td>".$tabla_paypal[$i][3]."</td>
					<td>".$tabla_paypal[$i][10]."</td>
					<td>".$tabla_paypal[$i][7]."</td>
					<td>".$tabla_paypal[$i][5]."</td>
					<td>".$tabla_paypal[$i][15]."</td>
				</tr>
			
			";
			
			
			
			
	}
		*/
	
}




?>
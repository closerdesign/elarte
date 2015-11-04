<?php 

function mostrarVentasPorProductoElArte($fecha_inicial, $fecha_final)
{


require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	
	
	$query = "SELECT  pedidos.id pedido, pedidos.creado creado, publicacionesxpedido.valor valor_producto, publicacionesxpedido.publicacion 
		FROM  `publicacionesxpedido` 
		INNER JOIN pedidos ON publicacionesxpedido.pedido = pedidos.id
		WHERE (
		publicacionesxpedido.publicacion =17
		OR publicacionesxpedido.publicacion =18
		OR publicacionesxpedido.publicacion =19
		)
		AND pedidos.status =2
		AND pedidos.creado >=  '$fecha_inicial 00:00:00'
		AND pedidos.creado <=  '$fecha_final 23:59:59'
		ORDER BY pedidos.creado";	
		
	$q->ejecutar($query, "");
	$i=0;
	
	
	echo "
			<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>Num</td>
					<td>Order ID</td>
					<td>Publicacion</td>
					<td>Fecha</td>
					<td>Valor producto</td>
					<td>Descuento</td>
					<td>Valor venta</td>
				</tr>
	";
	
	
	$TOTAL = 0;
	
	while($q->Cargar())
	{
	
		$i++;
		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$q->dato('pedido')."</td>
			<td>".$q->dato('publicacion')."</td>
			<td>".$q->dato('creado')."</td>
			<td>".$q->dato('valor_producto')."</td>
			<td>0</td>
			<td>".$q->dato('valor_producto')."</td>
			
		</tr>	
		";
		
		$TOTAL+= $q->dato('valor_producto');
	
	}
	
	echo "</table>";
	
	echo "<br><br>TOTAL: $TOTAL";



}


function mostrarVentasPorProducto($fecha_inicial, $fecha_final)
{
	

	require_once "../Application/Model/FuncionesSQL_Prestashop.php";
    $q = new ConecteMysql();
	
	
	$query = "SELECT * 
		FROM ps_order_detail
		INNER JOIN ps_orders ON ps_orders.id_order = ps_order_detail.id_order
		WHERE ps_orders.current_state =2
		AND
		(ps_order_detail.product_id =17
		OR ps_order_detail.product_id =18
		OR ps_order_detail.product_id =19)
		AND ps_orders.date_add >=  '$fecha_inicial 00:00:00'
		AND ps_orders.date_add <=  '$fecha_final 23:59:59'
		ORDER BY ps_order_detail.product_id, ps_orders.date_add";	
		
		
		
	$q->ejecutar($query, "");
	$i=0;
	
	
	echo "
			<table border='0' cellpadding='1' cellspacing='1' class='tabla1' style='color:black'>
				<tr class='tabla1_cabecera'>
					<td>Num</td>
					<td>Order ID</td>
					<td>Publiacion id</td>
					<td>Publiacion</td>
					<td>Fecha</td>
					<td>Valor producto</td>
					<td>Descuento</td>
					<td>Valor venta</td>
				</tr>
	";
	
	
	$TOTAL = 0;
	
	while($q->Cargar())
	{
	
		$i++;
		
		
		echo "
		<tr bgcolor='#FFFFFF'>
			<td>$i</td>
			<td>".$q->dato('id_order')."</td>
			<td>".$q->dato('product_id')."</td>
			<td>".$q->dato('product_name')."</td>
			<td>".$q->dato('date_add')."</td>
			<td>".$q->dato('product_price')."</td>
			<td>0</td>
			<td>".$q->dato('product_price')."</td>
			
		</tr>	
		";
		
		$TOTAL+= $q->dato('product_price');
	
	}
	
	echo "</table>";
	
	echo "<br><br>TOTAL: $TOTAL";
	
	
	
}



?>
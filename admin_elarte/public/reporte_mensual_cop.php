<?php


	// get the HTML
    ob_start();


	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	$q2 = new ConecteMysql();
	$q3 = new ConecteMysql();
	
	
	
	$fechaInicial = $_GET['fechaInicial'];
	$fechaFinal = $_GET['fechaFinal'];
	
	
	//CREAMOS UN VECTOR CON LA LISTA DE REFERENCIAS DE LOS PRODUCTOS PARA EFECTOS DEL INFORME FINAL
	$query = "Select DISTINCT(reference) from admin_ps_product";
	$q->ejecutar($query, "");
	
	$i=0; 
	
	while($q->Cargar())	
		$listaReferencias[$i++] = $q->dato('reference');
	
	$listaReferencias[$i++] = "DCAF001";
	$listaReferencias[$i] = "DCWR001+CONF";
	
	/////////////////////////////////////
	
	
	
	$query = "Select * from admin_pedidos_aprobados WHERE fecha_factura >= '$fechaInicial' AND fecha_factura < '$fechaFinal' Order By num_factura ASC";
	$q->ejecutar($query, "");
	
	
	$Informe_TotalVentas = number_format(0, 2, '.', ',');
	$Informe_VentasExcluidas = number_format(0, 2, '.', ',');
	$Informe_VentasCanceladas = number_format(0, 2, '.', ',');
	$Informe_Descuentos = number_format(0, 2, '.', ',');
	$Informe_VerificacionTotal = "";
	
	$InformeFormaDePagoSubtotal[1] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[2] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[3] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[4] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[5] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[6] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoSubtotal[7] = number_format(0, 2, '.', ',');
	
	$InformeFormaDePagoDescuentos[1] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[2] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[3] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[4] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[5] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[6] = number_format(0, 2, '.', ',');
	$InformeFormaDePagoDescuentos[7] = number_format(0, 2, '.', ',');
	
	
	$i = 0;
	
	while($q->Cargar())
	{
		
		//if($i==3)
			//break;
		//echo $i;
		
		$medio[$i] = $q->dato('medio');
		$id_pedido[$i] = $q->dato('id_pedido');
		$fecha_pedido[$i] = $q->dato('fecha_pedido');
		$num_factura[$i] = $q->dato('num_factura');
		$fecha_factura[$i] = split(" ",$q->dato('fecha_factura'));
		$Estado_factura[$i] = $q->dato('Estado_factura');
				
		if($medio[$i] == 1)
		{
			
			$query = "Select * from inscritos_conferencia WHERE id_inscripcion = $id_pedido[$i]";
			$q2->ejecutar($query, "");
					
			$j=0;
			
			if($q2->Cargar())
			{
						
				$formas_de_pago = array("", "Payulatam Colombia (TC)", "Paypal", "Payulatam Colombia (PSE)", "Payulatam Colombia (Baloto)", "Payulatam M&eacute;xico (Oxxo)", "Payulatam Per&uacute; (BCP)");
				$forma_de_pago[$i] = $q2->dato('metodo_pago');
				$forma_de_pago_texto[$i] = $formas_de_pago[$forma_de_pago[$i]];
						
				$valor_unitario[$i][$j] = number_format(15.99, 2, '.', ','); //Valor Unitario
						
				$cantidad[$i][$j] = 1; //Cantidad
				$valor_total[$i][$j] = number_format($valor_unitario[$i][$j]*$cantidad[$i][$j], 2, '.', ','); //Valor Total
						
				$precio_final[$i] = number_format($q2->dato('valor_inscripcion'), 2, '.', ',');
						
				$subtotal[$i] += number_format($valor_total[$i][$j], 2, '.', ',');
				$descuento[$i] = number_format($subtotal[$i] - $precio_final[$i], 2, '.', ',');
						
				$descripcion[$i][$j] = "Documento Los Caminos Del Perd&oacute;n de Walter Riso en formato PDF + Ingreso a conferencia virtual &quot;El arte de amar sin apegos&quot;"; //Descripcion
				$referencia[$i][$j] = "DCWR001+CONF"; //Referencia
				
				
				
				
				$j++;
						
			}
			
			
			$cantidadProductos[$i] = $j;
			
		}
		
		
		if($medio[$i] == 2)
		{
					
			$query = "Select pedidos.valor valor_pedido, publicaciones.titulo, publicaciones.referencia, pedidos.formaPago,publicacionesxpedido.valor valor_unitario  from pedidos 
					INNER JOIN publicacionesxpedido ON pedidos.id = publicacionesxpedido.pedido
					INNER JOIN publicaciones ON publicacionesxpedido.publicacion = publicaciones.id
					WHERE pedidos.id = $id_pedido[$i]";
					
			$q2->ejecutar($query, "");
					
			$formas_de_pago = array("", "Payulatam Colombia (TC)", "Paypal", "Payulatam Colombia (PSE)", "Payulatam Colombia (Baloto)", "Payulatam M&eacute;xico (Oxxo)", "Payulatam Per&uacute; (BCP)");
					
			$j=0;
						
			while($q2->Cargar())
			{
				
				$valor_unitario[$i][$j] = number_format($q2->dato('valor_unitario'), 2, '.', ',');
				
				
				$cantidad[$i][$j] = 1;
				$descripcion[$i][$j] = $q2->dato('titulo');
				$referencia[$i][$j] = $q2->dato('referencia');
				$forma_de_pago[$i] = $q2->dato('formaPago');
						
				$forma_de_pago_texto[$i] = $formas_de_pago[$forma_de_pago[$i]];	
						
				$valor_total[$i][$j] = number_format($valor_unitario[$i][$j]*$cantidad[$i][$j], 2, '.', ',');
				$precio_final[$i] = number_format($q2->dato('valor_pedido'), 2, '.', ',');
				$subtotal[$i] += number_format($valor_total[$i][$j], 2, '.', ',');
		
						
				$j++;
						
			}
					
			$descuento[$i] = number_format($subtotal[$i] - $precio_final[$i], 2, '.', ',');
			$cantidadProductos[$i] = $j;
					
		}
		
		
		
		if($medio[$i] == 3)
		{
					
			$query = "SELECT * FROM admin_ps_orders 
					LEFT JOIN admin_ps_order_detail ON admin_ps_orders.id_order = admin_ps_order_detail.id_order
					LEFT JOIN admin_ps_product ON admin_ps_product.id_product = admin_ps_order_detail.product_id
					LEFT JOIN admin_ps_owd_payuapi_transaction ON admin_ps_orders.id_order = admin_ps_owd_payuapi_transaction.id_order
					WHERE  admin_ps_orders.id_order = $id_pedido[$i]";
	
	
			$q2->ejecutar($query, "");
	
			$j = 0;
					
			while($q2->Cargar())
			{	
			
				///Excepciones
				if($num_factura[$i] == 20968)
					$valor_unitario[$i][$j] = 9.00;
				elseif($num_factura[$i] == 20969)
					$valor_unitario[$i][$j] = 9.99;
				elseif($num_factura[$i] == 20970)
					$valor_unitario[$i][$j] = 9.99;
				elseif($num_factura[$i] == 21049)
					$valor_unitario[$i][$j] = 9.98;
				elseif($num_factura[$i] == 21668)
					$valor_unitario[$i][$j] = 9.99;
				elseif($num_factura[$i] == 21669)
					$valor_unitario[$i][$j] = 9.99;
				elseif($num_factura[$i] == 21672)
					$valor_unitario[$i][$j] = 9.99;
				else
					$valor_unitario[$i][$j] = number_format($q2->dato('product_price'), 2, '.', ',');
					
						$cantidad[$i][$j] = 1;
						$descripcion[$i][$j] = $q2->dato('product_name');
						$referencia[$i][$j] = $q2->dato('product_reference');
						
						
						switch($q2->dato('paymentmethod'))
						{
							case "tc":
								$forma_de_pago_texto[$i] = "Payulatam Colombia (TC)";
								$forma_de_pago[$i] = 1;
								break;
							
							case "pse-CO":
								$forma_de_pago_texto[$i] = "Payulatam Colombia (PSE)";
								$forma_de_pago[$i] = 3;
								break;
								
							case "baloto-CO":
								$forma_de_pago_texto[$i] = "Payulatam Colombia (Baloto)";
								$forma_de_pago[$i] = 4;
								break;
								
							case "oxxo-MX":
								$forma_de_pago_texto[$i] = "Payulatam M&eacute;xico (Oxxo)";
								$forma_de_pago[$i] = 5;
								break;
								
							case "bcp-PE":
								$forma_de_pago_texto[$i] = "Payulatam Per&uacute; (BCP)";
								$forma_de_pago[$i] = 6;
								break;
								
							case "7eleven-MX":
								$forma_de_pago_texto[$i] = "Payulatam M&eacute;xico (7-Eleven)";
								$forma_de_pago[$i] = 7;
								break;	
								
							default:
								$forma_de_pago_texto[$i] = "Paypal";
								$forma_de_pago[$i] = 2;
								break;
							
							
						}
										
							
							
						$valor_total[$i][$j] = number_format($valor_unitario[$i][$j]*$cantidad[$i][$j], 2, '.', ',');
						$precio_final[$i] = number_format($q2->dato('total_paid_tax_incl'), 2, '.', ',');
						$subtotal[$i] += number_format($valor_total[$i][$j], 2, '.', ',');
					
					
										
					$j++;					
					
			}
					
					$descuento[$i] = number_format($subtotal[$i] - $precio_final[$i], 2, '.', ',');
					$cantidadProductos[$i] = $j;
		}
		
		
		
		
		
		$fecha_pedido_sin_hora = split(" ", $fecha_pedido[$i]);
		$fecha_pedido_sin_hora = $fecha_pedido_sin_hora[0];
			
			//Hacemos la conversion a pesos
			$query = "SELECT * FROM admin_cambios_divisas WHERE fecha = '$fecha_pedido_sin_hora' or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 1 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 2 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 3 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 4 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 5 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 6 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 7 DAY) or fecha = DATE_SUB('$fecha_pedido_sin_hora', INTERVAL 8 DAY) ORDER BY fecha DESC ";
	
	
		$q3->ejecutar($query, "");
		
		if($q3->Cargar())
		{
						
			$TRM[$i] = $q3->dato('dolar');
			$valor_pesos[$i] = $precio_final[$i]*$TRM[$i];
						
			$TRM_mostrar[$i] = number_format($TRM[$i], 2, '.', ',');
			$valor_pesos[$i] = number_format($valor_pesos[$i], 2, '.', ',');
						
		}
		
		
		
		//ACUMULAMOS DATOS PARA INFORME FINAL
		
		$Informe_VentasExcluidas += $subtotal[$i]*$TRM[$i];
		
		if($Estado_factura[$i] == 0)
		{
			$Informe_VentasCanceladas += ($subtotal[$i]*$TRM[$i]);
			
		}
		
		if($Estado_factura[$i] == 1)
		{
			$Informe_Descuentos  += ($descuento[$i]*$TRM[$i]);
			$Informe_TotalVentas2 += ($precio_final[$i]*$TRM[$i]);
			
			$InformeFormaDePagoSubtotal[$forma_de_pago[$i]] += $subtotal[$i]*$TRM[$i];
			$InformeFormaDePagoDescuentos[$forma_de_pago[$i]] += $descuento[$i]*$TRM[$i];
			
			
			
			//Este fragmento contabiliza la tabla de ventas por producto del informe 
		
			for($j=0; $j< $cantidadProductos[$i]; $j++)	
			{
				$InformeReferencia[$referencia[$i][$j]] += ($valor_total[$i][$j]*$TRM[$i]);
				$informeReferenciaCant[$referencia[$i][$j]]++;
			}
			
		///////////////////////

			
		}
		
		
		if($i==0)
			$Informe_FacInicial = $num_factura[$i];
		
		
		
		
	
			
			
	
		
		
		
		
		//Informe_VentasCanceladas		
		$i++;
		
	}

	$Informe_FacFinal = $num_factura[$i-1];


	$Informe_TotalVentas = $Informe_VentasExcluidas - $Informe_VentasCanceladas - $Informe_Descuentos;
	
	$InformeDiferencia_TotalVentas = number_format($Informe_TotalVentas2-$Informe_TotalVentas, 2, '.', ',');
	
	
	if($InformeDiferencia_TotalVentas == 0)
		$Informe_VerificacionTotal = "";
	else
		$Informe_VerificacionTotal = "Error";
	
	

?>



<page>

	<table style="width:100%">
	<col style="width: 50%" class="col1">
	<col style="width: 50%">
	<tr>
		<td>
        	<img style="width:60mm" src='images/logo.png' /><br><br>
        </td>
		<td align="right">
			<h4>Phronesis SAS</h4>
			<h3>NIT 900476732-0</h3>

    </td>
    
    </tr>
    
    </table>
    
    <?php
		$fechaFinalMostrar = strtotime ( '-1 day' , strtotime ( $fechaFinal ) ) ;
		$fechaFinalMostrar = date ( 'Y-m-j' , $fechaFinalMostrar );
	
	?>
    
    <div align="center">
    	<h2>Informe de ventas</h2>
    	<h4>Fechas: <?php echo "$fechaInicial - $fechaFinalMostrar";  ?></h4>
    </div>
    <br>
    <div>Equipo: www.phronesisvirtual.com</div>
	<br>
    <h4>Detalle de las Ventas</h4>
    
    <table style="width:100%; border-style:solid; border-width:1px; border-color:#000; text-align:right">
	<col style="width: 25%">
	<col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 25%">
	<tr bgcolor="#CCCCCC">
		<td align="center"><b>Tipo Venta</b></td>
		<td align="center"><b>V/r Ventas</b></td>
		<td align="center"><b>% IVA</b></td>
        <td align="center"><b>V/r IVA</b></td>
	</tr>
    <tr>       
    	<td>Ventas Excluidas</td>
        <td>$ <?php echo number_format($Informe_VentasExcluidas, 0, '.', ',');?></td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Ventas Gravadas</td>
        <td>$ 0.00</td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Descuentos</td>
        <td>$ <?php echo number_format($Informe_Descuentos, 0, '.', ',');?></td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Ventas canceladas</td>
        <td>$ <?php echo number_format($Informe_VentasCanceladas, 0, '.', ',');?></td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Total Ventas</td>
        <td>$ <?php echo number_format($Informe_TotalVentas, 0, '.', ',');?> </td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr bgcolor="#CCCCCC">
    	<td colspan="3"><b>Total Ventas más IVA</b></td>
        <td>$ <?php echo number_format($Informe_TotalVentas2, 0, '.', ',')." ".$Informe_VerificacionTotal;?> </td>
    </tr>

    </table>
    
    
    
    
    <br>
    <h4>Detalle de los registros</h4>
    
    <table style="width:100%; border-style:solid; border-width:1px; border-color:#000; text-align:center">
	<col style="width: 25%">
	<col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 25%">
	<tr bgcolor="#CCCCCC">
		<td align="center"><b>Documento</b></td>
		<td align="center"><b>No. Inicial</b></td>
		<td align="center"><b>No. Final</b></td>
        <td align="center"><b>Cantidad de reg.</b></td>
	</tr>
    <tr>       
    	<td>Documento equivalente</td>
        <td><?php echo $Informe_FacInicial;?></td>
        <td><?php echo $Informe_FacFinal;?></td>
        <td><?php echo $Informe_FacFinal - $Informe_FacInicial + 1;?></td>
    </tr>
    </table>
    
    
    
    
    
    <br>
    <h4>Ventas por Formas de Pago</h4>
    
    <table style="width:100%; border-style:solid; border-width:1px; border-color:#000;">
	<col style="width: 25%">
	<col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 25%">
	<tr bgcolor="#CCCCCC">
		<td align="center"><b>Forma de Pago</b></td>
		<td align="center"><b>V/r Pago</b></td>
		<td align="center"><b>Descuento</b></td>
        <td align="center"><b>Pago Neto</b></td>
	</tr>
    <tr>       
    	<td align="left">Payu Latam Colombia (TC)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[1], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[1], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[1] - $InformeFormaDePagoDescuentos[1], 0, '.', ',');?></td>
    </tr>
    <tr>       
    	<td align="left">Payu Latam Colombia (PSE)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[3], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[3], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[3] - $InformeFormaDePagoDescuentos[3], 0, '.', ',');?></td>
    </tr>
    <tr>       
    	<td align="left">Payu Latam Colombia (Baloto)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[4], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[4], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[4] - $InformeFormaDePagoDescuentos[4], 0, '.', ',');?></td>
    </tr>
    <tr bgcolor="#CCCCCC">       
    	<td align="left"><b>Total Payu Latam Colombia</b></td>
        <?php 
			$totalPayuColombiaSubtotal = $InformeFormaDePagoSubtotal[1]+$InformeFormaDePagoSubtotal[3]+$InformeFormaDePagoSubtotal[4];
			$totalPayuColombiaDescuentos = $InformeFormaDePagoDescuentos[1]+$InformeFormaDePagoDescuentos[3]+$InformeFormaDePagoDescuentos[4];
			$toalPayuColombia = $totalPayuColombiaSubtotal - $totalPayuColombiaDescuentos;
		?>
        <td align="right">$ <?php echo number_format($totalPayuColombiaSubtotal, 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($totalPayuColombiaDescuentos, 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($toalPayuColombia, 0, '.', ',');?></td>
    </tr>
    <tr>       
    	<td align="left">Payu Latam Mexico (Oxxo)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[5], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[5], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[5] - $InformeFormaDePagoDescuentos[5], 0, '.', ',');?></td>
    </tr>
    <tr>       
    	<td align="left">Payu Latam Mexico (7-Eleven)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[7], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[7], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[7] - $InformeFormaDePagoDescuentos[7], 0, '.', ',');?></td>
    </tr>
    	<tr  bgcolor="#CCCCCC">       
    	<td align="left"><b>Total Payu Latam Mexico</b></td>
        <?php 
			$totalPayuMexicoSubtotal = $InformeFormaDePagoSubtotal[5]+$InformeFormaDePagoSubtotal[7];
			$totalPayuMexicoDescuentos = $InformeFormaDePagoDescuentos[5]+$InformeFormaDePagoDescuentos[7];
			$toalPayuMexico = $totalPayuMexicoSubtotal - $totalPayuMexicoDescuentos;
		?>
        <td align="right">$ <?php echo number_format($totalPayuMexicoSubtotal, 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($totalPayuMexicoDescuentos, 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($toalPayuMexico, 0, '.', ',');?></td>
    </tr>
    <tr  bgcolor="#CCCCCC">       
    	<td align="left">Total Payu Latam Peru (BCP)</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[6], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[6], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[6] - $InformeFormaDePagoDescuentos[6], 0, '.', ',');?></td>
    </tr>
    <tr bgcolor="#CCCCCC">       
    	<td align="left">Total Paypal</td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[2], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoDescuentos[2], 0, '.', ',');?></td>
        <td align="right">$ <?php echo number_format($InformeFormaDePagoSubtotal[2] - $InformeFormaDePagoDescuentos[2], 0, '.', ',');?></td>
    </tr>
    <tr bgcolor="#CCCCCC">
    	<td align="right" colspan="3"><b>GRAN TOTAL</b></td>
        <td align="right">$ <?php echo number_format($toalPayuColombia+$toalPayuMexico+($InformeFormaDePagoSubtotal[6] - $InformeFormaDePagoDescuentos[6]+$InformeFormaDePagoSubtotal[2] - $InformeFormaDePagoDescuentos[2]), 0, '.', ',');?> </td>
    </tr>
    
    </table>
    
    
  
  
  	<br>
    <h4>Ventas por Producto</h4>
    
    <table style="width:100%; border-style:solid; border-width:1px; border-color:#000; text-align:center">
	<col style="width: 33%">
    <col style="width: 33%">
    <col style="width: 33%">
	<tr bgcolor="#CCCCCC">
		<td align="center"><b>Referencia</b></td>
		<td align="center"><b>Cantidad</b></td>
		<td align="center"><b>Valor</b></td>
	</tr>
    <?php 
	$cont = 0;
	for($i=0; $i<count($listaReferencias); $i++)
	{
		if($InformeReferencia[$listaReferencias[$i]] <> "")
		{	
			if($cont++==0)
				$colorFila = "#FFFFFF'";
			else
			{
				$cont = 0;
				$colorFila = "#ECE9E9";
			}
			
			$InformeTotalPorProducto += $InformeReferencia[$listaReferencias[$i]];
			$InformeTotalPorProductoCant += $informeReferenciaCant[$listaReferencias[$i]];
	?>
    <tr bgcolor="<? echo $colorFila; ?>">       
    	
        <td align="left"><?php echo $listaReferencias[$i];?></td>
        <td align="center"><?php echo $informeReferenciaCant[$listaReferencias[$i]];?></td>
        <td align="right">$ <?php echo number_format($InformeReferencia[$listaReferencias[$i]], 0, '.', ',');?></td>
    </tr>
    <?php 
		}
	} ?>
    <tr bgcolor="#CCCCCC">
    	<td align="right"><b>Total por producto</b></td>
        <td><b><?php echo $InformeTotalPorProductoCant;?></b></td>
        <td align="right"><b>$ <?php echo number_format($InformeTotalPorProducto, 0, '.', ',');?></b></td>
    </tr>
    <tr bgcolor="#CCCCCC">
    	<td align="right"><b>Total descuentos</b></td>
        <td></td>
        <td align="right"><b>$ <?php echo number_format($Informe_Descuentos, 0, '.', ',');?></b></td>
    </tr>
    <tr bgcolor="#CCCCCC">
    	<td align="right"><b>Total IVA</b></td>
        <td></td>
        <td align="right"><b>$ 0.00</b></td>
    </tr>
    <tr bgcolor="#CCCCCC">
    	<td align="right"><b>Total por producto más IVA</b></td>
        <td></td>
        <td align="right"><b>$ <?php echo number_format($InformeTotalPorProducto - $Informe_Descuentos, 0, '.', ',');?></b></td>
    </tr>
    </table>
    
    

</page>   
    
    
    
    
    
    
    
    
    
    
	
	
<?php	
	
    $content = ob_get_clean();





	//$content = imprimir_facturas();
    //$content = ob_get_clean();

    // convert in PDF
    require_once('../Application/lib/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'Legal', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
	


?>
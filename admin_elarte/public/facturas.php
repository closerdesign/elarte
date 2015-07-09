<?php




	// get the HTML
    ob_start();


	require_once "../Application/Model/FuncionesSQL.php";
    $q = new ConecteMysql();
	$q2 = new ConecteMysql();
	$q3 = new ConecteMysql();
	
	
	
	$fechaInicial = $_GET['fechaInicial'];
	$fechaFinal = $_GET['fechaFinal'];
	
	
	$query = "Select * from admin_pedidos_aprobados WHERE fecha_factura >= '$fechaInicial' AND fecha_factura < '$fechaFinal' Order By num_factura ASC";
	$q->ejecutar($query, "");
	
	
	$Informe_TotalVentas = number_format(0, 2, '.', ',');
	$Informe_VentasExcluidas = number_format(0, 2, '.', ',');
	$Informe_VentasCanceladas = number_format(0, 2, '.', ',');
	$Informe_Descuentos = number_format(0, 2, '.', ',');
	$Informe_VerificacionTotal = "";
	
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
			
			
		}
		
		
		if($medio[$i] == 2)
		{
					
			$query = "Select * from pedidos 
					INNER JOIN publicacionesxpedido ON pedidos.id = publicacionesxpedido.pedido
					INNER JOIN publicaciones ON publicacionesxpedido.publicacion = publicaciones.id
					LEFT JOIN admin_ps_product ON admin_ps_product.id_product = publicaciones.codPs
					WHERE pedidos.id = $id_pedido[$i]";
					
			$q2->ejecutar($query, "");
					
			$formas_de_pago = array("", "Payulatam Colombia (TC)", "Paypal", "Payulatam Colombia (PSE)", "Payulatam Colombia (Baloto)", "Payulatam M&eacute;xico (Oxxo)", "Payulatam Per&uacute; (BCP)");
					
			$j=0;
						
			while($q2->Cargar())
			{
				
				////Excepciones
				if($num_factura[$i] == 20542)
					$valor_unitario[$i][$j] = 5.99;
				elseif($num_factura[$i] == 20543)
					$valor_unitario[$i][$j] = 6.49;
				elseif($num_factura[$i] == 20544)
					$valor_unitario[$i][$j] = 8.99;
				elseif($num_factura[$i] == 21552)
					$valor_unitario[$i][$j] = 14.19;
				else
					$valor_unitario[$i][$j] = number_format($q2->dato('precio'), 2, '.', ',');
				
				
				$cantidad[$i][$j] = 1;
				$descripcion[$i][$j] = $q2->dato('titulo');
				$referencia[$i][$j] = $q2->dato('reference');
				$forma_de_pago[$i] = $q2->dato('formaPago');
						
				$forma_de_pago_texto[$i] = $formas_de_pago[$forma_de_pago[$i]];	
						
				$valor_total[$i][$j] = number_format($valor_unitario[$i][$j]*$cantidad[$i][$j], 2, '.', ',');
				$precio_final[$i] = number_format($q2->dato('valor'), 2, '.', ',');
				$subtotal[$i] += number_format($valor_total[$i][$j], 2, '.', ',');
		
						
				$j++;
						
			}
					
			$descuento[$i] = number_format($subtotal[$i] - $precio_final[$i], 2, '.', ',');

					
		}
		
		
		
		if($medio[$i] == 3)
		{
					
			$query = "SELECT * FROM admin_ps_orders, admin_ps_order_detail, admin_ps_product WHERE admin_ps_orders.id_order = admin_ps_order_detail.id_order AND admin_ps_product.id_product = admin_ps_order_detail.product_id AND admin_ps_orders.id_order = $id_pedido[$i]";
	
	
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
						$referencia[$i][$j] = $q2->dato('reference');
						
						$forma_de_pago_texto[$i] = $q2->dato('payment');
						
							
							
						$valor_total[$i][$j] = number_format($valor_unitario[$i][$j]*$cantidad[$i][$j], 2, '.', ',');
						$precio_final[$i] = number_format($q2->dato('total_paid_tax_incl'), 2, '.', ',');
						$subtotal[$i] += number_format($valor_total[$i][$j], 2, '.', ',');
					
					
										
					$j++;					
					
			}
					
					$descuento[$i] = number_format($subtotal[$i] - $precio_final[$i], 2, '.', ',');
						
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
						
			$TRM[$i] = number_format($TRM[$i], 2, '.', ',');
			$valor_pesos[$i] = number_format($valor_pesos[$i], 2, '.', ',');
						
		}
		
		
		
		//ACUMULAMOS DATOS PARA INFORME FINAL
		
		$Informe_VentasExcluidas += $subtotal[$i];
		
		if($Estado_factura[$i] == 0)
		{
			$Informe_VentasCanceladas += $subtotal[$i];
			
		}
		
		if($Estado_factura[$i] == 1)
		{
			$Informe_Descuentos  += $descuento[$i];
			$Informe_TotalVentas2 += $precio_final[$i];
		}
		
		if($i==0)
			$Informe_FacInicial = $num_factura[$i];
		
		
		
		//Informe_VentasCanceladas		
		$i++;
		
	}

	$Informe_FacFinal = $num_factura[$i-1];

for($i=0; $i<count($num_factura); $i++)
{
?>

<page style="font-family:Arial, Helvetica, sans-serif; font-size:13px">
<table style="width:100%">
	<col style="width: 50%" class="col1">
	<col style="width: 50%">
	<tr>
		<td>
        	<img style="width:60mm" src='images/logo.png' /><br><br>
			Documento equivalente No. <?php echo $num_factura[$i]; ?><br>
			Fecha: <?php echo $fecha_factura[$i][0]; ?><br>
        </td>
		<td align="right">
			<h4>Phronesis SAS</h4>
			NIT 900476732-0<br>
			calle 4 sur 43 a 195 BL c ofi 108<br>
			info@elartedesabervivir.com<br>
			Resoluci&oacute;n DIAN No. 320001267235; <br>
            Fecha 2015/05/06; PACK del No. 20001 al100000<br>

</td>

</tr>

</table>
<br><br><br>
<table style="width:100%">
	<col style="width: 33%">
	<col style="width: 33%">
    <col style="width: 33%">
	<tr>
		<td>
			<b>N&uacute;mero de pedido:</b> <br>
			<?php echo $medio[$i]." - ".$id_pedido[$i]; ?>
		</td>
		<td >
			<b>Fecha de pedido:<br></b>
			<?php echo $fecha_pedido[$i]; ?>
		</td>
		<td>
			<b>Forma de pago:<br></b>
			<?php echo $forma_de_pago_texto[$i]; ?>		
						
		</td>
	</tr>
</table>

<br><br>
<table style="width:100%; border-style:solid; border-width:1px; border-color:#000">
	<col style="width: 20%">
	<col style="width: 40%">
    <col style="width: 10%">
    <col style="width: 15%">
    <col style="width: 15%">
	<tr bgcolor="#CCCCCC">
		<td align="center"><b>Referencia</b></td>
		<td align="center"><b>Descripci&oacute;n</b></td>
		<td align="center"><b>Cant.</b></td>
        <td align="center"><b>Valor Uni</b></td>
        <td align="center"><b>Valor Total</b></td>
	</tr>
    
    
<?php 
for($j=0; $j<count($cantidad[$i]); $j++)
{

?>
    <tr>
    	<td align="center"><?php echo $referencia[$i][$j]; ?></td>
        <td align="center"><?php echo $descripcion[$i][$j]; ?></td>
        <td align="center"><?php echo $cantidad[$i][$j]; ?></td>
        <td align="right">USD $<?php echo $valor_unitario[$i][$j]; ?></td>
        <td align="right">USD $<?php echo $valor_total[$i][$j]; ?></td>
        
        
    </tr>
<?php } ?> 
    
</table>


<br><br><br>
<table style="width:100%">
	<col style="width: 85%">
	<col style="width: 15%">
	<tr>
		<td align="right">Subtotal</td>
        <td align="right">USD $<?php echo $subtotal[$i]; ?></td>
	</tr>
    <tr>
		<td align="right">Descuentos</td>
        <td align="right">USD $<?php echo $descuento[$i]; ?></td>
	</tr>
    <tr>
		<td align="right">IVA</td>
        <td align="right">USD $00.00</td>
	</tr>
    <tr>
		<td align="right">Total USD</td>
        <td align="right">USD $<?php echo $precio_final[$i]; ?></td>
	</tr>
    <tr>
		<td align="right">Total pesos Colombianos</td>
        <td align="right">COP $<?php echo $valor_pesos[$i]; ?></td>
	</tr>
    <tr>
		<td align="right">TRM</td>
        <td align="right">COP $<?php echo $TRM[$i]; ?></td>
	</tr>
</table>

<br><br>
<?php if($Estado_factura[$i] == 0){
	
	
	
	?>
<div style="color:#F00; text-align:center"><H1>DOCUMENTO EQUIVALENTE ANULADO</H1></div>
<?php } ?>

</page>

<?php
}
?>
    


<?php


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
    
    
    
    <div align="center">
    	<h2>Informe de ventas</h2>
    	<h4>Fechas: <?php echo "$fechaInicial - $fechaFinal";  ?></h4>
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
        <td>$ <?php echo $Informe_VentasExcluidas;?></td>
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
        <td>$ <?php echo $Informe_Descuentos;?></td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Ventas canceladas</td>
        <td>$ <?php echo $Informe_VentasCanceladas;?></td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr>
    	<td>Total Ventas</td>
        <td>$ <?php echo $Informe_TotalVentas;?> </td>
        <td>0%</td>
        <td>$ 0.00</td>
    </tr>
    
    <tr bgcolor="#CCCCCC">
    	<td colspan="3"><b>Total Ventas más IVA</b></td>
        <td>$ <?php echo $Informe_TotalVentas2." ".$Informe_VerificacionTotal;?> </td>
    </tr>

    </table>
    
    
    
    
    <br>
    <h4>Detalle de los registros</h4>
    
    <table style="width:100%; border-style:solid; border-width:1px; border-color:#000; text-align:right">
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
        <td><?php echo $Informe_FacInicial - $Informe_FacInicial;?></td>
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
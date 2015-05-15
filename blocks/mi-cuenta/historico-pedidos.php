<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3>Histórico de Pedidos</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									No. Pedido
								</th>
								<th>
									Valor
								</th>
								<th>
									Estado
								</th>
								<th>
									Forma de Pago
								</th>
								<th>
									Fecha
								</th>
								<th>
									&nbsp;
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql="SELECT * FROM pedidos WHERE usuario = '$_SESSION[id]' AND status > 0 ORDER BY creado DESC";
							$q=mysqli_query($con, $sql);
							$n=mysqli_num_rows($q);
							if($n<1){
								echo('<tr><td colspan="4">No existen registros disponibles.</td></tr>');
							}else{
								while($ped=mysqli_fetch_assoc($q)){
									$timestamp=strtotime($ped['creado']);
									echo('
										<tr>
											<td class="text-center">'.$ped['id'].'</td>
											<td class="text-center">USD '.$ped['valor'].'</td>
											<td class="text-center">'.$displayEstadoPedido[$ped['status']].'</td>
											<td class="text-center">'.$displayFormaPago[$ped['formaPago']].''.getDesprendible($ped['id']).'</td>
											<td class="text-center">'.date('Y-m-d H:i:s',$timestamp).'</td>
											<td class="text-center"><button pedido="'.$ped['id'].'" class="btn btn-default btnDetallePedido"><i class="fa fa-search"></i> Detalle de productos</button></td>
										</tr>
									');
								}
							}
						?>			
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<?php require_once('blocks/mi-cuenta/sidebar.php'); ?>
	</div>
</div>
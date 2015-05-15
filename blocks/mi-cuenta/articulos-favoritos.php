<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<h3>Mis artículos favoritos</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>
							Artículo
						</th>
						<th>
							&nbsp;
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="SELECT * FROM favoritos WHERE usuario = '$_SESSION[id]'";
						$q=mysqli_query($con, $sql);
						$n=mysqli_num_rows($q);
						if($n<1){
							echo "<tr><td colspan='2' class='text-center'>Aun no tienes artículos favoritos.<br /><a href='/index.php?content=articulos' class='btn btn-default'>¿Qué tal si das un vistazo?</a></td></tr>";
						}else{
							while($a=mysqli_fetch_assoc($q)){
								echo "
									<tr>
										<td>".getArticuloFavoritos($a['articulo'])."</td>
										<td class='text-center'>
											<a href='/index.php?content=articulos&id=$a[articulo]' class='btn btn-default'>
												<i class='fa fa-link'></i> Leer artículo
											</a>
											&nbsp;
											<button class='btn btn-default btnEliminaArticulo' value='$a[articulo]' user='$_SESSION[id]'>
												<i class='fa fa-trash'></i> Eliminar
											</button>
										</td>
									</tr>
								";
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<?php require_once('blocks/mi-cuenta/sidebar.php'); ?>
	</div>
</div>
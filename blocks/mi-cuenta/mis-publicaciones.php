<!--
		<div class="row hidden-xs">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="filtroPublicaciones">
					<form class="form-inline">
					  <div class="form-group">
					  	<select class="form-control" id="filtrarIdioma">
						  	<option value="">Filtrar idioma...</option>
						  	<?php //echo selectIdiomas(); ?>
					  	</select>
					  </div>
					  <div class="form-group">
					    <select class="form-control" id="filtrarFormato">
						    <option value="">Filtrar formato...</option>
						    <?php //echo selectFormatos(); ?>
					    </select>
					  </div>
					</form>	
				</div>
			</div>
		</div>
-->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<?php
					$sql="
						SELECT 
							* 
						FROM 
							publicaciones 
						JOIN 
							publicacionesxusuario 
						ON 
							publicaciones.id = publicacionesxusuario.publicacion 
						WHERE 
							status = 1
						AND
							usuario = $_SESSION[id]
						GROUP BY 
							publicaciones.id
						";
					if(isset($_REQUEST['filtro'])){
						if($_REQUEST['filtro']=='autor'){
							$sql.=" AND autor = '$_REQUEST[val]'";
						}
						if($_REQUEST['filtro']=='idioma'){
							$sql.=" AND idioma = '$_REQUEST[val]'";
						}
						if($_REQUEST['filtro']=='formato'){
							$sql.=" AND formato = '$_REQUEST[val]'";
						}
					}
					$sql.=" ORDER BY titulo";
					$q=mysqli_query($con, $sql);
					$n=mysqli_num_rows($q);
					if($n<1){
						echo "<p>No hay publicaciones disponibles.</p>";
					}else{
						echo("<div class='row'>");
						
						echo"
							<h2>Mi biblioteca</h2>
							<table class='table table-striped table-bordered'>
								<tr>
									<th>Obra</th>
									<th>Autor</th>
									<th>Formato</th>
									<th>Accion</th>
								</tr>
						";
						
						while($pub=mysqli_fetch_array($q)){
							
							if($pub['id']==21)
							{
								$eventoDic5 = 1;
								$eventoDic5Titulo = $pub['titulo'];
								$eventoDic5Autor = $pub['autor'];
																	
							}
							else
							{
							
							
								$formato="pdf";
								$formatoCaption="PDF";
								if($pub['formato']!=1){
									$formato="audio";
									$formatoCaption="MP3";
								}
								?>
								<tr>
									<td><?php echo $pub['titulo'] ?></td>
									<td><?php echo getNombreAutor($pub['autor']) ?></td>
									<td><i class="fa fa-file-<?php echo($formato); ?>-o"></i> - <?php echo $formatoCaption; ?></td>
									<td align="center"><?php echo getBtnDescarga($pub['id']); ?></td>
								</tr>
							
							
							
								<?php
							}
						}
						echo "</table>";
						
						if($eventoDic5)
						{
							
							echo "
							<br>
							<h2>Mis eventos</h2>
							<p style='font-size:16px'>Estos son los eventos a los que ya te encuentras registrado(a). Recibirás un email cuando sea habilitado el botón de acceso para que puedas ingresar a probar la plataforma</p>
								<table class='table table-striped table-bordered'>
									<tr>
										<th>Evento</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Accion</th>
									</tr>
									<tr>
										<td style='vertical-align:middle'>$eventoDic5Titulo</td>
										<td style='vertical-align:middle'>Dic. 5 de 2015</td>
										<td align='center' style='vertical-align:middle'><span style='color:blue; cursor:pointer;' onclick=$('#myModalHorarios').modal()>Consultar horarios por país</span></td>
										<td align='center'><button disabled='disabled' class='btn btn-primary'>Acceder al evento</button><br>El botón se habilitará 8 días antes del evento</td>
									
									</tr>
								</table>
									
							";
						}
						
						echo "</div><br><br>";
					}
				?>
			</div>
		</div>
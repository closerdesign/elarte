<?php
	$sql="SELECT * FROM paquetes WHERE idPaquete = '$_REQUEST[id]' AND status = 1";
	$q=mysqli_query($con, $sql);
	$data=mysqli_fetch_array($q);

	if( (isset($_SESSION['id']) && (!isset($_COOKIE['modal'])) ))
	{
		?>
		<script>
			$(document).ready(function(){
				$('#myModalPagoPaquetes').modal('show');
				$.cookie('modal',1);	
			});
		</script>
		<?php
	}
?>

	<!-- <img src="../img/bannerl1.png"  /> -->
	<div class="row top">
    	
		<div class="container">
        
			<div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                      
					<h1 class="text-center">Guías prácticas de Walter Riso</h1>
                    <h4 class="text-center">Una herramienta imprescindible para tu bienestar</h4>
				</div>
			</div>
			<hr> 
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                
                	 <p style="font-size:16px">Estas guías son una excelente herramienta para iniciar un proceso de mejora y crecimiento personal. Basado en sus más de 30 años de experiencia como psicólogo terapeuta y en sus amplias investigaciones y estudios, Walter Riso nos muestra de una forma sencilla y totalmente práctica los pasos a seguir para lograr objetivos de crecimiento y mejora en nuestra vida emocional.</p>     
				
				</div>
			</div>
            
            
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><br />
                                    <img class="img img-responsive" src="/admin/_lib/file/imgpaquetes/<?= $data['portada'] ?>" alt="<?= $data['nombre'] ?>">
                                    
                                    
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				<div class="col-md-6">
					
					<div class="row">
						<div class="col-md-12">
							<br /><br />
							<ul style="list-style-image:../img/chulo.png">
								<?php
									$publicaciones=explode(',', $data['publicaciones']);
									foreach($publicaciones as $pub){
								?>
									<li style="list-style-image:url(../img/chulo.png); font-size:16px;"><?= getNombrePublicacion($pub) ?> </li>
								<?php
									}
								?>
							</ul>
                            
                            <div class="text-center" style="font-size:24px;">
                            	<strong>
                            		Lleva hoy esta colección con el<br /><span style="color:red">30% de descuento</span>
                                </strong>
                                
                            
                            </div>
                            
                            
						</div>
					</div>
					
					
				</div>				
			</div>
            
            
            
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                	<br /><br />
                	 <h3 style="color:red" class="text-center">
						Precio actual: USD <?= number_format($data['precio'],2) ?>
					</h3>
					<h4 style="color:gray" class="text-center tachado">
						<s>Precio normal: USD $34.95</s>
					</h4>
                    
                    <br />
                    <div class="col-md-12">
							<?php if(isset($_SESSION['id'])){ ?>
							<p class="text-center">
								<center>
									<button style="width:400px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar promoción</button>
								</center>
							</p>
							<?php }else{ ?>
							<p class="text-center">
								<center>
									<button style="width:400px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción</button>
								</center>
							</p>
                            
							<?php } ?>
                            
                            <br />
                            <hr />
                            
						</div>
                     
                     
				</div>
			</div>
            
            
            <!-- /////////////////////////////////////////////////////  -->
           
            <div class="row">
				<div class="col-md-6">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br />
                                    <h3>¿Para qué sirven estas guías?</h3>
                                    <br />
                                    <p style="font-size:16px">
                                    	Son herramientas que te servirán para llevar una vida emocional saludabe, donde encontrarás  pautas para hacer del amor una experiencia plena y gratificante, orientandote en temas como la autoestima, la asertividad, la independencia afectiva, la infidelidad, entre otros.
                                    </p>
                                    
                                    
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				<div class="col-md-6">
					
					<div class="row">
						<div class="col-md-12">
							
							<style>
								.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
							</style>
								<div class="col-md-12">
									<br /><br />
                                    
                                    <div class='embed-container'>
										<iframe src='https://www.youtube.com/embed/<?= $data['video'] ?>?autoplay=false&rel=0' frameborder='0' allowfullscreen>
										</iframe>
                            
                            			
                            
                            
									</div>
                                    <br /><br />
								</div>
					
								
						</div>
                        
                        
                        				
					</div>
            	</div>
            </div>    
                
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                	
                    <hr /> 
                     
				</div>
			</div>
                
                
                <!-- /////////////////////////////////////////////////////  -->
           
            <div class="row">
				<div class="col-md-6">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><br />
                                    <img class="img img-responsive" src="../img/formato-guias2.png" alt="Guías prácticas en versión PDF">
                                    
                                    
                                    
                                    
									
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				<div class="col-md-6">
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br />
                                    <h3>Formatos disponibles</h3>
                                    <br />
                                    <p style="font-size:16px">
                                    	Las guías prácticas de Walter Riso no son libros, son documentos o folletos que únicamente están disponibles en formatos digitales, puedes adquirirlos en formato PDF (versión escrita) o en formato MP3 (versión audio). Si tu preferencia es leer en medios impresos, no te preocupes, podrás imprimir la versión escritra sin ningún tipo de restricción.
                                        <br /><br />
                                        <b>¿Cómo recibo el producto?:</b> Sencillo, una vez realizas el pago podrás descargarlo y disfrutarlo en cualquier dispositivo electronico (computadora, tablet, celular, etc.). 
                                        
                                    </p>
                                    
                                    <br />
                                    	<div class="col-md-12">
											<?php if(isset($_SESSION['id'])){ ?>
                                            <p class="text-center">
                                                <center>
                                                    <button style="width:400px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar promoción ahora</button>
                                                </center>
                                            </p>
                                            <?php }else{ ?>
                                            <p class="text-center">
                                                <center>
                                                    <button style="width:400px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción ahora</button>
                                                </center>
                                            </p>
                                            
                                            <?php } ?>
                                            
                                            <br />
                                            
                                        </div>
                                    
                                    
									
								</div>
							</div>
						</div>
                        
                        
                        				
					</div>
            	</div>
            </div>  
                
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                	
                    <hr /> 
                     
				</div>
			</div>
            
            <!-- /////////////////////////////////////////////////////  -->
           
            <div class="row">
				<div class="col-md-6">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br />
                                    <h3>Guía práctica para vencer la dependencia emocional</h3>
                                    <br />
                                    <p style="font-size:16px">
                                    	Son herramientas que te servirán para llevar una vida emocional saludabe, donde encontrarás  pautas para hacer del amor una experiencia plena y gratificante, orientandote en temas como la autoestima, la asertividad, la independencia afectiva, la infidelidad, entre otros.
                                    </p>
                                    
                                    
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				<div class="col-md-6">
					
					<div class="row">
						<div class="col-md-12">
							
							<style>
								.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
							</style>
								<div class="col-md-12">
									<br /><br />
                                    
                                    <div class='embed-container'>
										<iframe src='https://www.youtube.com/embed/<?= $data['video'] ?>?autoplay=false&rel=0' frameborder='0' allowfullscreen>
										</iframe>
                            
                            			
                            
                            
									</div>
                                    <br /><br />
								</div>
					
								
						</div>
                        
                        
                        				
					</div>
            	</div>
            </div>    
                
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                	
                    <hr /> 
                     
				</div>
			</div>
                
                
                <!-- /////////////////////////////////////////////////////  -->
            
   			
            
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModalRegistroPaquete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">¡Atención!</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>Para adquirir esta colección debes registrarte o iniciar sesión en tu cuenta.</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="iniciaPaquete" type="button" class="btn btn-primary">Registrarme</button>
					<button id="RegistraPaquete" type="button" class="btn btn-primary">Iniciar sesión</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$('#iniciaPaquete').click(function(){
			$('#myModalRegistroPaquete').modal('hide');
			openRegisterModal();
		});
		$('#RegistraPaquete').click(function(){
			$('#myModalRegistroPaquete').modal('hide');
			openLoginModal();
		});
	</script>
	
	<!-- Modal -->
	<div class="modal fade" id="myModalPagoPaquetes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Pago del producto</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>
								<select class="form-control" name="paisMetodo" id="paisMetodo" required>
									<option value="">Selecciona el país desde donde realizarás el pago ...</option>
									<?= selectPaises(); ?>
								</select>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p>
								<select class="form-control" name="metodo" id="metodo" required style="display: none;">
								</select>
							</p>
						</div>
					</div>
					<hr>
					<div id="metodoPago" style="display:none;">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$('body').on('change', '#paisMetodo', function(event) {
			event.preventDefault();
			$('#metodo').slideUp();
			$('#metodoPago').slideUp();
			if ( $(this).val() !== '' ) {
				var data = {
								pais : $(this).val(),
								consulta : 'obtenerMediosDePago2'
							};
				$.ajax({
					url: '/includes/php.php',
					type: 'POST',
					dataType: 'json',
					data: data,
				})
				.done(function(data) {
					if ( data.error ) {
						$('#metodo').empty().html(data.html);
						$('#metodo').slideDown();
					}else{
						$('#metodo').slideUp();
					}
				});
			}else{
				$('#metodo').slideUp();
			}
		});
	
		$('body').on('change', '#metodo', function(event) {
			event.preventDefault();
			$('#metodoPago').slideUp();
			var data = {
				consulta : 'obtenerFormularioDePago2',
				metodo : $(this).val(),
				pagina : '',
				value : <?= $data['precio']; ?>,
				coleccion : true,
				id : <?= $_REQUEST['id'] ?>,
				nombre : '<?= $data["nombre"]; ?>'
			};
	
			$('#metodoPago').empty();
			$('#metodoPago').slideUp();
	
			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'html',
				data: data,
			})
			.done(function(data) {
				$('#metodoPago').html(data);
				$('#metodoPago').slideDown();
			});
		});
	</script>
	<!-- ClickDesk Live Chat Service for websites -->
	<script type='text/javascript'>
		var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDgsSBXVzZXJzGOKqsw4M');
		var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
		'http://my.clickdesk.com/clickdesk-ui/browser/');
		var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
		var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
		glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
		var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
	</script>
	<!-- End of ClickDesk -->
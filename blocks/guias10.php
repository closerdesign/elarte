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
                      
					<h1 class="text-center">Guía práctica para afrontar la infidelidad de la pareja</h1>
                    <h4 class="text-center">Descubre cómo detectar y afrontar esta difícil situación de una manera inteligente y acertada</h4>
				</div>
			</div>
			<hr> 
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                
                	 <p style="font-size:16px">Esta guía es una excelente herramienta para descubrir, entender y afrontar la infidelidad en una relación de pareja. A través de 12 lecciones, Walter Riso muestra con fundamentos científicos y prácticos lo que es la infidelidad, los diferentes tipos de infidelidad, la forma cómo detectarla o descubrirla, las luchas y consecuencias psicológicas que se viven con la infidelidad y los caminos para afrontarla.</p>     
				
				</div>
			</div>
            
            
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><br />
                                    <p class="text-center">
										<center>
                                    <img class="img img-responsive" src="../admin/_lib/file/imgpublicaciones/PORTADA-ok-08.jpg" width="300px" alt="<?= $data['nombre'] ?>">
                                    	</center>
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
				<div class="col-md-7">
					
					<div class="row">
						<div class="col-md-12">
							
                            
                            <style>
								.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
							</style>
								<div class="col-md-12">
									<br /><br />
                                    
                                    <div class='embed-container'>
										<iframe src='https://www.youtube.com/embed/xouBf43Od3I?autoplay=true&rel=0' frameborder='0' allowfullscreen>
										</iframe>
                            
                            			
                            
                            
									</div>
                                    <br /><br />
								</div>
                            
                            
							
                            
                            <div class="text-center" style="font-size:24px;">
                            	<strong>
                            		Lleva hoy la versión escrita y la versión en audio <br /><span style="color:red">por sólo USD $9,99 </span>
                                </strong>
                                
                            
                            </div>
                            
                            
						</div>
					</div>
					
					
				</div>				
			</div>
            
            
            
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                	
                    
                    <br /><br />
                    <div class="col-md-12">
							<?php if(isset($_SESSION['id'])){ ?>
							<p class="text-center">
								<center>
									<button style="width:340px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar promoción</button>
								</center>
							</p>
							<?php }else{ ?>
							<p class="text-center">
								<center>
									<button style="width:340px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción</button>
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
									<br /><br />
                                    <img class="img img-responsive" src="../img/Infidelidad-formatos.png" alt="Guía práctica para afrontar la infidelidad de la pareja">
                                    
                                    
                                    
                                    
									
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
                                    	Las guías prácticas de Walter Riso no son libros, son documentos o folletos que únicamente están disponibles en formatos digitales, puedes adquirirlos en formato PDF (versión escrita) o en formato MP3 (versión audio). Si tu preferencia es leer en medios impresos, no te preocupes, podrás imprimir la versión escrita sin ningún tipo de restricción.
                                        <br /><br />
                                        <b>¿Cómo recibo el producto?:</b> Sencillo, una vez realizas el pago podrás descargarlo y disfrutarlo en cualquier dispositivo electrónico (computadora, tablet, celular, etc.). 
                                        
                                    </p>
                                    
                                    <br />
                                    	<div class="col-md-12">
											<?php if(isset($_SESSION['id'])){ ?>
                                            <p class="text-center">
                                                <center>
                                                    <button  class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalPagoPaquetes">Comprar los dos formatos en promoción</button>
                                                </center>
                                            </p>
                                            <?php }else{ ?>
                                            <p class="text-center">
                                                <center>
                                                    <button  class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar los dos formatos en promoción</button>
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
								
                                    <h3>Colección completa de guías prácticas</h3>
                                    <br />
                                    
                                    <p style="font-size:16px">Si deseas también puedes adquirir la colección completa de guías prácticas de Walter Riso a un precio muy especial.</p>
                                    <br />
                                    <ul style="list-style-image:../img/chulo.png">
																	<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para afrontar la infidelidad de la pareja </li>
																	<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para mejorar la autoestima </li>
																	<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para no dejarse manipular y ser asertivo </li>
																	<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para no sufrir de amor </li>
																	<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para vencer la dependencia emocional </li>
															</ul>
                                    
                                    
									
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
							<br /><br /><br />
							
							<img class="img img-responsive" src="../admin/_lib/file/imgpaquetes/paqueteWalter-audio.png" alt="<?= $data['nombre'] ?>">
								
						</div>
                        
                        
                        				
					</div>
            	</div>
            </div>    
                
            <div class="row">
            	
				<div class="col-lg-12 col-md-12 col-sm-12">
                
                					 	<br />
                	
                    					<div class="col-md-12">
											<p class="text-center">
                                                <center>
                                                    <button style="margin-bottom:5px;" class="btn btn-success btn-lg" onclick="location.href='https://www.elartedesabervivir.com/guias/1'">Comprar colección en formato pdf</button> 
                                                    <button style="margin-bottom:5px;" class="btn btn-success btn-lg" onclick="location.href='https://www.elartedesabervivir.com/guias/7'">Comprar colección en formato mp3</button>
                                                </center>
                                            </p>
                                            
                                        </div>
                                        
                                       
                	
                	
                      
				</div>
			</div>
                
            <hr /> 
                
                <!-- /////////////////////////////////////////////////////  -->
            
            
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
                                    	Son herramientas que te servirán para llevar una vida emocional saludable, donde encontrarás  pautas para hacer del amor una experiencia plena y gratificante, orientandote en temas como la autoestima, la asertividad, la independencia afectiva, la infidelidad, entre otros.
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
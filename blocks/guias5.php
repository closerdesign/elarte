<?php
	$sql="SELECT * FROM paquetes WHERE idPaquete = '$_REQUEST[id]' AND status = 1";
	$q=mysqli_query($con, $sql);
	$data=mysqli_fetch_array($q);

	if( (isset($_SESSION['id']) && (!isset($_COOKIE['modal'])) ))
	{
	?>
		<script>
				$(document).ready(function(){
	
					if (!$('#myModalCompletaRegistro').is(':visible')) {
						$('#PaquetesModal').modal('show');
						$.cookie('modal',1);
					}
				});
		</script>
	<?php
	} 
	?>

	<!-- <div><img class="img img-responsive" src="../img/bannerl2.png"  /></div> -->
    
    
    <div class="row top" style="background-color:#485061">
    
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><br />
                                    <center>
										<img style="max-width:300px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/Guia-practica-para-no-dejarse-manipular.png" alt="Guía práctica para no dejarse manipular y ser asertivo" title="Guía práctica para no dejarse manipular y ser asertivo - Walter Riso">
                                    </center>
                                    <br />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<br />
							<h2 style="color:#c4e269; font-family:Verdana, Geneva, sans-serif">Guía práctica para no dejarse manipular y ser asertivo</h2>
                            <h3 style="color:#fff;">14 pasos para evitar la sumisión, saber expresar desacuerdos (decir "no") y ser asertivo.</h3>
                            <br />
                            <p style="font-size:16px; color:#FFF">¿Eres de los que piensa y siente que no puede vivir sin su pareja, que tu vida sin ella no tiene sentido, que tu felicidad solo depende de tu pareja y que tu vida sólo puede girar en torno a ella?. ¡Cuidado! depender de la persona que se ama no solo arruina relaciones, también es una manera de enterrarse en vida, un acto de automutilación psicológica donde el amor propio, el autorrespeto, la dignidad, los principios y la esencia de uno mismo son ofrendados y regalados irracional-mente.</p>
                            <br />
                            <span style="color:#c4e269; font-family:Verdana, Geneva, sans-serif; font-size:24px">Precio: USD $6,99 </span>
                            <!--<br />
                            <span style="color:#CCC; font-family:Verdana, Geneva, sans-serif; font-size:18px"><strike>Precio normal USD $6,99</strike> </span>-->
                            <br /><br />
                           <?php if(isset($_SESSION['id'])){ ?>
                            <p class="text-left">
                                
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar ahora</button>
                                
                            </p>
                            <?php }else{ ?>
                            <p class="text-left">
                                
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar ahora</button>
                                
                            </p>
                            <?php } ?>
                           
                           <!--
                           
                            <div class="row">
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Autor:</b> Walter Riso</li>
                                        <li ><b>Formatos:</b> PDF (Texto) - MP3 (Audio)</li>
                                        <li ><b>ISBN:</b> 978-958-57970-1-7</li>
                                    </ul>
                                </div>
                                                  
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Idioma:</b> Español</li>
                                        <li ><b>Nº de páginas (Versión texto):</b> 53</li>
                                        <li ><b>Duración (Versión audio):</b> 1:48:04 (1 Hora, 48 Minutos)</li>
                                    </ul>
                                </div>
                            </div>                         
                            
                            -->
						
                            
						</div>
					</div>
                    
				</div>
            	
            
            </div>
        </div>
    
    </div>
    
	
	<div class="row top" style="background-color:#CCC" >

		<div class="container">
        
        
        	<!-- /////////////////////////////////////////////////////  -->
		
            <div class="row">
            
            	<div class="col-lg-12 col-md-12 col-sm-12">
                	<br />
                	<h3>¿Para qué sirve esta obra?</h3>
                    <br />
            	</div>
            
            	<div class="col-md-6">
            		
					
					<p style="font-size:16px">
						Es común encontrar personas que después de un tiempo de relación se sienten reprimidos en varios aspectos de su vida, por ejemplo: sienten que sus proyectos profesionales deben ser abandonados, que sus principios, su vocación y sus valores deben ser modificados, que no son los mismos con sus amigos o familiares cuando su pareja está presente, e incluso sienten miedo de expresar sus ideas si estas van en contra de las ideas de su pareja. La gran mayoría de estas personas tienen estos problemas porque confundieron el amor con dependencia, porque tuvieron la idea absurda de que amar es vivir por el otro y para el otro.
					</p>
                                        
					<p style="font-size:16px">   
						En esta guía Walter Riso nos enseña de una forma práctica y poco teórica los pasos que se deben seguir para Amar sin dependencias emocionales, pretende aportar ideas y procedimientos que permitan desarrollar destrezas y habilidades para afrontar la dependencia emocional, prevenirla  y/o crear un estilo de vida orientado a la independencia emocional y al desapego afectivo.                                      
					</p>
				</div>
			
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<style>
								.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
							</style>
							<div class="col-md-12">
								<br />
								<div class='embed-container'>
									<iframe src='https://www.youtube.com/embed/UF8v3FCl7lY?autoplay=false&rel=0' frameborder='0' allowfullscreen>
									</iframe>
								</div>
								<br />
								<br />
							</div>
						</div>
					</div>
				</div>

	        	
                
                
                
                <div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="col-md-12">
						<?php if(isset($_SESSION['id'])){ ?>
						<p class="text-center">
							<center>
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar ahora</button>
							</center>
						</p>
						<?php }else{ ?>
						<p class="text-center">
							<center>
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar ahora</button>
							</center>
						</p>
						<?php } ?>
						<br />
						
					</div>
            	</div>
                
                <div class="row">
	        		<div class="col-lg-12 col-md-12 col-sm-12">
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
	            						
	                                    <h3>Formatos disponibles</h3>
	                                    <br /><br />
	            						
	                                    <p style="font-size:16px">
	                                    	Esta y todas las guías prácticas de Walter Riso se distribuyen únicamente por Internet en formato PDF (versión escrita) y en formato MP3 (versión audio), no se distribuyen en formatos físicos, sin embargo si tu preferencia es leer en medios impresos, no te preocupes, podrás imprimir la versión escrita sin ningún tipo de restricción.
	                                        <br /><br />
	                                        <b>¿Cómo recibo el producto?:</b> Sencillo, una vez realizas el pago podrás descargarlo y disfrutarlo en cualquier dispositivo electrónico (computadora, tablet, celular, etc.).

	                                    </p>
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
										
                                        <h3>Escucha un fragmento de la versión en audio</h3>
	                                    <br /><br />
                                        
                                        <iframe id='audio_4400055' frameborder='0' allowfullscreen='' scrolling='no' height='200' style='border:1px solid #EEE;  box-sizing:border-box; width:100%;' src="https://www.ivoox.com/player_ej_4400055_4_1.html?c1=ff6600"></iframe> 

	                                    <br />
	                                    
									</div>
								</div>
							</div>
						</div>
	            	</div>
                    
                    
                    
	            </div>
                
                
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <br /><br />
                        <div class="text-center" style="font-size:24px;">
								<strong>
									¡No dejes escapar esta oportunidad!
								</strong>
                                	<br /><br />
                                    Lleva hoy las dos versiones y recibe el <span style="color:red">30% de descuento</span>
							</div>
                        
                        <br />
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['id'])){ ?>
                            <p class="text-center">
                                <center>
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar ahora</button>
                                </center>
                            </p>
                            <?php }else{ ?>
                            <p class="text-center">
                                <center>
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar ahora</button>
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
            						<h3>¿Qué son las guías prácticas?</h3>
            						<br />
            						<p style="font-size:16px">
                                    	Millones de personas son víctimas de relaciones amorosas inadecuadas y no saben qué hacer al respecto. El miedo a la pérdida, a la soledad y/o al abandono contaminan el vínculo amoroso y lo vuelven vulnerable y enfermizo. Un amor inseguro es una bomba de tiempo que puede estallar en cualquier momento y lastimarnos profundamente.
                                        <br />
            							Las guías prácticas de Walter Riso son herramientas que te servirán para llevar una vida emocional saludable, donde encontrarás  pautas para hacer del amor una experiencia plena y gratificante, orientandote en temas como la autoestima, la asertividad, la independencia afectiva, la infidelidad, entre otros.
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
								<br /><br /><br />
								<div class='embed-container'>
									<iframe src='https://www.youtube.com/embed/RSg6VOP9rkM?autoplay=false&rel=0' frameborder='0' allowfullscreen>
									</iframe>
								</div>
								<br />
								<br />
							</div>
						</div>
					</div>
				</div>

	        	<div class="row">
	        		<div class="col-lg-12 col-md-12 col-sm-12">
	        			<hr />
	        		</div>
	        	</div>

               
                
	            
			</div>
            
            
            <!-- /////////////////////////////// -->
            
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                		<div class="text-center" style="font-size:24px;">
								<strong>
									OTRAS GUÍAS PRÁCTICAS DE WALTER RISO
								</strong>
						</div>
					</div>
				</div>
            
            
            
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><br />
									<img class="img img-responsive" src="https://www.elartedesabervivir.com/admin/_lib/file/imgpaquetes/paqueteWalter-1.png" alt="<?= $data['nombre'] ?>">
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
								
									<li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para no sufrir de amor </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para mejorar la autoestima </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para no dejarse manipular y ser asertivo </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para afrontar la infidelidad de la pareja </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:16px;">Guía práctica para vencer la dependencia emocional </li>
									
							</ul>
							
						</div>
					</div>
				</div>
			</div>

		
        
        

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<br /><br />
                    
                    <div class="text-center" style="font-size:24px;">
								<strong>
									Lleva la colección completa y recibe un precio super especial</span>
								</strong>
						</div>
                    
                    
					
					<br />
					<div class="col-md-12">
						
						<p class="text-center">
							<center>
								<a class="btn btn-success btn-lg" href="https://www.elartedesabervivir.com/guias/guias-practicas-para-no-sufrir-de-amor">Más información</a>
							</center>
						</p>
						
						<br />
						<hr />
					</div>
				</div>
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

		<div class="modal fade" id="PaqueteAudio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Selecciona el formato de tu preferencia</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-4">
								<button class="btn btn-primary">
									<small>
										Comprar Versión en Audio
									</small>
								</button>
							</div>
							<div class="col-lg-4">
								<button class="btn btn-primary">
									<small>
										Comprar Versión en PDF
									</small>
								</button>
							</div>
							<div class="col-lg-4">
								<button class="btn btn-primary">
									<small>
										Comprar las 2 Versiones
									</small>
								</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="PaquetesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Selecciona el formato de tu preferencia</h4>
					</div>
					<div class="modal-body CompraPaquetes">
						<div class="row">
							<div class="col-lg-12">
								<h4>
									Producto: Guía práctica para vencer la dependencia emocional
								</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaqueteAudio" type="radio" name="product" value="9" data-discount="0" data-price="6.99" data-format="MP3">
								<label class="CompraPaquetes-label" for="btnPaqueteAudio"> Formato de audio MP3</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaquetePDF" type="radio" name="product" value="7" data-discount="0" data-price="6.99" data-format="PDF">
								<label class="CompraPaquetes-label" for="btnPaquetePDF"> Formato de texto PDF</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaqueteAll" type="radio" name="product" value="8" data-discount="30" data-price="13.98" data-format="PDF + MP3">
								<label class="CompraPaquetes-label" for="btnPaqueteAll"> Los dos formatos PDF + MP3 <span class="orange">(-30% dto)</span></label>
							</div>
						</div>
						<br>
                        <p class="mensajeEspera1"></p>
						<br>
						<br>
						<div class="CompraPaquetes-dataContainer text-right" style="display:none;">
							<div class="row">
								<div class="col-lg-12 text-rigth">
                                	<b>Precio:</b> USD $<span class="CompraPaquetes-price"></span>
                                </div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-rigth">
									<b>Descuento:</b> -<span class="CompraPaquetes-discount"></span>%
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-rigth">
									<b>Total a pagar: USD $<span class="CompraPaquetes-total"></span></b>
                                </div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-lg-12">
								<button id="CompraPaquetes-nextButton" style="display:none;" type="button" class="btn btn-primary" data-target="#myModalPagoPaquetes" data-toggle="modal" data-dismiss="modal">Siguiente</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Modal -->
	<div class="modal fade" id="myModalPagoPaquetes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-lg-12">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Pago del producto: <span id="CompraPaquetes-nombre"></span></h4>
						</div>	
					</div>
					<div class="row">
						<div class=" text-right">
							<div class="row">
								<div class="col-lg-12 text-rigth">
                                	<b>Precio:</b> USD $<span class="CompraPaquetes-price"></span>
                                </div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-rigth">
									<b>Descuento:</b> -<span class="CompraPaquetes-discount"></span>%
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-rigth">
									<b>Total a pagar: USD $<span class="CompraPaquetes-total"></span></b>
                                </div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>
                            	Selecciona el país desde donde realizarás el pago: <br />
								<select class="form-control" name="paisMetodo" id="paisMetodo" required>
									<option value="">Selecciona un país</option>
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
					<div class="row">
                    	<p class="mensajeEspera2" style="display:none">Un momento por favor...</p>
						<div id="metodoPago" class="col-lg-12" style="display:none;">
						</div>
					</div>
				</div>
				<div class="modal-footer text-left" style="text-align: left;">
					<div class="row">
						<div class="col-lg-12">
							<button class="btn btn-default" data-toggle="modal" data-target="#PaquetesModal" data-dismiss="modal">
								<i class="glyphicon glyphicon-chevron-left"></i>Regresar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	(function(){
		var precio, id_paquete, nombre;


		$('body').on('change', '#paisMetodo', function(event) {
			event.preventDefault();
			$('#metodo').slideUp();
			$('#metodoPago').slideUp();
			
			$('.mensajeEspera2').slideDown();
			
			
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
						$('.mensajeEspera2').slideUp();
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


		$('body').on('change', 'input:radio[name="product"]', function(event) {
			console.log($(this).val());
			var discount = $(this).data('discount');
			var price = $(this).data('price');
			var format = $(this).data('format');
			
			
			$('.CompraPaquetes-dataContainer').slideUp('fast');
			$('#CompraPaquetes-nextButton').slideUp('fast');
			$('.mensajeEspera1').text("Un momento por favor...");
			

			$.ajax({
				url: '/includes/php.php',
				type: 'POST',
				dataType: 'json',
				data: {
					id: $(this).val(),
					consulta: 'getPrecioPaquete'
				},
				context: this
			})
			.done(function(data) {
				precio     = data.precio;
				id_paquete = $(this).val();
				nombre     = 'Guía práctica para vencer la dependencia emocional ('+ format +')';

				//if ( !$('.CompraPaquetes-dataContainer').is(':visible') ) {
					$('.CompraPaquetes-dataContainer').slideDown('fast');
				//}
				$('.mensajeEspera1').text("");
				console.log('nombre: '+data.nombre);
				$('#CompraPaquetes-nombre').text(nombre);
				$('.CompraPaquetes-price').text(price);
				$('.CompraPaquetes-discount').text(discount);
				$('.CompraPaquetes-total').text(precio);
				$('#CompraPaquetes-nextButton').slideDown('fast');
			})
			.fail(function() {
			})
			.always(function() {
			});
		});

		$('body').on('change', '#metodo', function(event) {
			event.preventDefault();
			console.log(nombre);
			$('#metodoPago').slideUp();
			$('.mensajeEspera2').slideDown();
			var data = {
				consulta : 'obtenerFormularioDePago2',
				metodo : $(this).val(),
				pagina : '',
				value : precio,
				coleccion : true,
				id : id_paquete,
				nombre : nombre,
				landing: 5
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
				$('.mensajeEspera2').slideUp();
				$('#metodoPago').html(data);
				$('#metodoPago').slideDown();
			});
		});

		$('#myModalPagoPaquetes').on('hide.bs.modal', function () {
	  		$('#metodo').prop('selectedIndex',0).hide();
	  		$('#paisMetodo').prop('selectedIndex',0);
	  		$('#metodoPago').hide();
		});

		$('#PaquetesModal').on('hide.bs.modal', function(event) {
			$('.CompraPaquetes-dataContainer').slideUp('fast');
			$('#CompraPaquetes-nextButton').slideUp('fast');
			$('input:radio[name="product"]:checked').prop( "checked", false );
		});

		var fit_modal_body;



	})();
		
	fit_modal_body = function(modal) {
	  var body, bodypaddings, header, headerheight, height, modalheight;
	  header = $(".modal-header", modal).first();
	  body = $(".modal-body", modal).first();
	  modalheight = parseInt(modal.css("height"));
	  headerheight = parseInt(header.css("height")) + parseInt(header.css("padding-top")) + parseInt(header.css("padding-bottom"));
	  bodypaddings = parseInt(body.css("padding-top")) + parseInt(body.css("padding-bottom"));
	  height = modalheight - headerheight - bodypaddings - 5;
	  return body.css("max-height", "" + height - 65 + "px");
	};
	$(window).resize(function() {
	  return fit_modal_body($(".modal"));
	});

	$('#myModalPagoPaquetes').on('shown.bs.modal', function () {
	  return fit_modal_body($("#myModalPagoPaquetes"));
	})
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
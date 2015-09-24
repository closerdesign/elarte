<?php
	$sql="SELECT * FROM paquetes WHERE idPaquete = '$_REQUEST[id]' AND status = 1";
	$q=mysqli_query($con, $sql);
	$data=mysqli_fetch_array($q);

	if( (isset($_SESSION['id']) && (!isset($_COOKIE['modal'])) ))
	{
		?>
		<script>
			$(document).ready(function(){
				$('#PaquetesModal').modal('show');
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
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar promoción</button>
							</center>
						</p>
						<?php }else{ ?>
						<p class="text-center">
							<center>
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción</button>
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

                <!-- /////////////////////////////////////////////////////  -->

	            <div class="row">
	            	<div class="col-md-6">
	            		<div class="row">
	            			<div class="col-md-12">
	            				<div class="row">
	            					<div class="col-md-12">
	            						
	                                    <h3>Formatos disponibles</h3>
	                                    <br />
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
										<br /><br /><br /><br /> 
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
	                                        		<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar promoción ahora</button>
	                                    		</center>
	                                    	</p>
	                                    	<?php }else{ ?>
	                                    	<p class="text-center">
	                                    		<center>
	                                    			<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción ahora</button>
	                                    		</center>
	                                    	</p>
	                                    	<?php } ?>
	                                    </div>
									</div>
								</div>
							</div>
						</div>
	            	</div>
	            </div>
                
                <br />
                <hr />
                
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                		<h3 class="text-center">Escucha algunos fragmentos de la versión en aduio</h3>
	                 	<br />
                	
						<p style="font-size:16px"></p>
					</div>
				</div>
                
                <div class="row">
	            	<div class="col-md-6">
	            		<div class="row">
	            			<div class="col-md-12">
	            				<div class="row">
	            					<div class="col-md-12">
	            						<br />
                                        
                                        <iframe id='audio_4400055' frameborder='0' allowfullscreen='' scrolling='no' height='200' style='border:1px solid #EEE;  box-sizing:border-box; width:100%;' src="https://www.ivoox.com/player_ej_4400055_4_1.html?c1=ff6600"></iframe> 
	                                    
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
	            						<iframe id='audio_4400045' frameborder='0' allowfullscreen='' scrolling='no' height='200' style='border:1px solid #EEE; box-sizing:border-box; width:100%;' src="https://www.ivoox.com/player_ej_4400045_4_1.html?c1=ff6600"></iframe>
	                                    
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
                                    Lleva hoy estas guías en versión audio o pdf con el <span style="color:red">30% de descuento</span><br />o lleva las dos versiones con el <span style="color:red">50% de descuento</span>
							</div>
                        
                        <br />
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['id'])){ ?>
                            <p class="text-center">
                                <center>
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Comprar promoción ahora</button>
                                </center>
                            </p>
                            <?php }else{ ?>
                            <p class="text-center">
                                <center>
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Comprar promoción ahora</button>
                                </center>
                            </p>
                            <?php } ?>
                            <br />
                            <hr />
                        </div>
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
									Producto: Colección de guías prácticas de Walter Riso
								</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaqueteAudio" type="radio" name="product" value="3" data-discount="30" data-price="34.95" data-format="MP3">
								<label class="CompraPaquetes-label" for="btnPaqueteAudio"> Formato de audio MP3 (-30% dto)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaquetePDF" type="radio" name="product" value="1" data-discount="30" data-price="34.95" data-format="PDF">
								<label class="CompraPaquetes-label" for="btnPaquetePDF"> Formato de texto PDF (-30% dto)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaqueteAll" type="radio" name="product" value="6" data-discount="50" data-price="69.9" data-format="PDF + MP3">
								<label class="CompraPaquetes-label" for="btnPaqueteAll"> Los dos formatos PDF + MP3 <span class="orange">(-50% dto)</span></label>
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
				nombre     = 'Colección de guías prácticas de Walter Riso ('+ format +')';

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
				nombre : nombre
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
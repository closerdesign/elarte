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
	
	<div class="row top" >

		<div class="container">
			            
             <div class="row">
            
            	<h1 class="text-center">ENAMÓRATE DE TI Y SERÁS FELIZ</h1>
                <br /><br />
                <p style="font-size:16px">
                    Durante un seminario para matrimonios, le preguntaron a una mujer: <br /><br />
                    -¿Te hace feliz tu esposo? ¿Verdaderamente te hace feliz? <br /><br />
                    En ese momento el esposo levantó ligeramente el cuello en señal de seguridad, sabía que su esposa diría que sí, pues ella jamás se había quejado durante su matrimonio. <br /><br />
                    Sin embargo la esposa respondió rotundamente: <br /><br />
                     
                    - 'No... no me hace feliz' <br /><br />
                    
                    Y ante el asombro del esposo... continuó: <br /><br />
                    
                    -No me hace feliz... ¡Yo soy feliz! <br /><br />
                    
                    El que yo sea feliz o no, eso no depende de él, sino de mí. Yo soy la única persona, de quien depende, mi felicidad. Yo determino ser feliz en cada situación y en cada momento de mi vida, pues si mi felicidad dependiera de alguna persona, cosa... o circunstancia sobre la faz de esta tierra, yo estaría en serios problemas. Todo lo que existe en esta vida, cambia continuamente. El ser humano, las riquezas, mi cuerpo, el clima, los placeres, etc. Y así podría decir una lista interminable. A través de toda mi vida, he aprendido algo; decido ser feliz y lo demás lo llamo 'experiencias': amar, perdonar, ayudar, comprender, aceptar, escuchar, consolar. <br /><br />
                    
                    Hay gente que dice: <br /><br />
                     
                    - No puedo ser feliz... porque estoy enferma, porque no tengo dinero, porque hace mucho calor, porque alguien me insultó, porque alguien ha dejado de amarme, porque alguien no me valoró... <br /><br />
                    
                    Pero lo que no sabes es que ¡puedes ser feliz!:
                    
                    aunque... estés enfermo, 
                    aunque... haga calor, 
                    aunque... no tengas dinero,
                    aunque... alguien te haya insultado, 
                    aunque... alguien no te amó , 
                    o no te haya valorado. <br /><br />
                    
                    La vida es como andar en bicicleta... te caes, sólo si dejas de pedalear. <br /><br />
                    
                    SER FELIZ ES UNA ACTITUD QUE SÓLO DEPENDE DE TI.<br /><br />
                    
                   
                
                </p>
                
                <hr />
            
            </div>
             
             
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="text-center" style="font-size:24px;">
                    	<h1 style="color:#500202"><b>¡Esta oferta realmente te cambiará la vida!</b></h1>
                        <br />
					</div>
				</div>
			</div>
            
            <div class="row">
				<div class="col-md-5 text-center" style="background-color:#500202; padding:10px;" >
                	
                	<span style="font-size:28px; color:#FFF"><b>Las 5 guías prácticas</b></span><br />
                    <span style="font-size:22px; color:#FFF"><b>de Walter Riso en sus dos formatos</b></span><br />
                    <span style="font-size:22px; color:#CCC"><b>(Audio y texto)</b></span><br />
                    <span style="font-size:36px; color:#FF0"><b>-50% de dto</b></span><br />
                    <span style="font-size:22px; color:#CCC">Ahorra USD 34,95</span><br />
                    
                </div>
                <div class="col-md-2 text-center" >
                	<span style="font-size:98px; color:#600"><b>+</b></span><br />
                </div>
                <div class="col-md-5 text-center" style="background-color:#500202; padding:10px;">
                	<span style="font-size:28px; color:#FFF"><b>Conferencia virtual</b></span><br />
                    <span style="font-size:22px; color:#FFF"><b>"Enamórate de tí", por Walter Riso</b></span><br />
                    <span style="font-size:22px; color:#CCC"><b>5 de dic. de 2015</b></span><br />
                    <span style="font-size:36px; color:#FF0"><b>¡Acceso gratis!</b></span><br />
                    <span style="font-size:22px; color:#CCC">Ahorra USD 14,99</span><br />
                </div>
                
            </div>
            
            <div class="row">
            	<br /><br />
                <p style="font-size:18px" class="text-center">Adquiere hoy la colección completa de guías prácticas de Walter Riso en sus dos formatos: texto y audio con un <span style="color:#F00">50% de dto</span>. y adicionalmente recibirás acceso <span style="color:#F00">gratis</span> a la conferencia virtual "Enamórate de ti" el próximo 5 de diciembre.</p>
                <br />
                <p class="text-center"><span style="font-size:32px; color:#500202"><b>Todo por solo</b> <br /> <b>USD 34,95</b></span><br />
                <span style="font-size:26px; color:#CCC">Precio normal <strike>USD 84,89</strike></span>
                <br /><br />
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
                                        
                                    </div>
            
            </div>
            
            
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<br /><hr />
                                    <h3 class="text-center">Sobre guías prácticas de Walter Riso</h3>
                                    <br />
                                    <p style="font-size:16px">
                                    	Esta colección compuesta por 5 tomos es una excelente guía para iniciar un proceso de mejora y crecimiento personal, además, gracias a la amplia trayectoria de Walter Riso como terapeuta de pareja es la mejor herramienta para hacer del amor una experiencia sin sufrimiento, plena y saludable.  Cada guía está compuesta por un conjunto de pasos, ejercicios, reflexiones o experiencias que te servirán para alcanzar un objetivo específico. 
                                    </p>
                                    <br />
                                    
									<img class="img img-responsive" src="/admin/_lib/file/imgpaquetes/<?= $data['portada'] ?>" alt="<?= $data['nombre'] ?>">
                                    <br /><br />
                                    <p style="font-size:16px">El paquete está compuesto por 5 guías que puedes adquirir en formato de texto (pdf) o en formato de audio (mp3). Estás guías son: </p>
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
                                    <br />
                                    <p style="font-size:16px"><b>Escucha algunos fragmentos de la versión en audio:</b></p>
                                    
                                    <iframe width="100%" height="20" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/232439688&amp;color=00cc11&amp;inverse=false&amp;auto_play=false&amp;show_user=true"></iframe>
                                    <br />
                                    <iframe width="100%" height="20" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/232439689&amp;color=00cc11&amp;inverse=false&amp;auto_play=false&amp;show_user=true"></iframe>
                                    <br />
                                    <iframe width="100%" height="20" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/229512520&amp;color=00cc11&amp;inverse=false&amp;auto_play=false&amp;show_user=true"></iframe>
                                    
                                    
                                    
                                    
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
							<div class="row">
								<div class="col-md-12">
									<br /><hr />
                                    <h3 class="text-center">Sobre la conferencia virtual</h3>
                                    <br />
                                    <p style="font-size:16px">
                                    	La visión negativa que se tiene de uno mismo es un factor determinante para que aparezcan trastornos psicológicos como fobias, depresión, estrés, ansiedad, inseguridad interpersonal, alteraciones psicosomáticas, problemas de pareja, bajo rendimiento académico y laboral, abuso de sustancias, problemas de imagen corporal, incapacidad de regular las emociones, y muchos más. En el amor la mala autoestima es una de las principales razones para que aparezcan problemas de dependencia, celos desmedidos, inseguridad, rechazo, entre otros. La conclusión de los especialistas es clara: si la autoestima no posee suficiente fuerza, viviremos mal, seremos infelices y ansiosos, y no sabremos manejar con asertvidad los problemas de pareja.
                                        <br /><br />
                                    	En esta magistral conferencia, Walter Riso nos dará las pautas para activar el amor propio, pero no haciendo referencia al lado oscuro de la autoestima, al narcisismo y a la fascinación por el propio ego (egolatría), sino a la capacidad genuina de reconocer, sin vergüenza ni temor, las fortalezas y virtudes que poseemos e integrarlas al desarrollo de nuestra vida para hacerla más saludable y llevadera. Quererse uno mismo, despreciando o ignorando a los demás, es presunción y exclusión; querer a los demás, despreciándose uno mismo, es no reconocer el autoamor que nos define.
                                    </p>
                                    <br />
                                    
									<ul style="list-style-image:../img/vineta2.png">
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">La conferencia será transmitida, en vivo y en directo, el 5 de diciembre de 2015. <span style="cursor:pointer; color:#00F" onclick="$('#myModalHorarios').modal()">Consulta horarios por ciudad</span>.</li>
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Si por algún motivo no puedes acceder a la conferencia en vivo, tendrás 72 horas para ver la grabación.</li>
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Podrás realizar preguntas.</li>
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Podrás acceder fácilmente desde cualquier parte del mundo a través de tu computadora, tablet o teléfono celular, solo necesitas una conexión estable a Internet.</li>
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">La duración de la conferencia es, aproximadamente, de 2 horas.</li>
                                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Esta conferencia será dictada en idioma español.</li>
                                        
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
			</div>

		
        
        

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<br /><br />
					<h3 style="color:red" class="text-center">
						<strong>¡No dejes escapar esta oportunidad!</strong>
					</h3>
					<h4 style="color:gray" class="text-center tachado">
						Oferta por tiempo limitado
					</h4>
					<br />
					<div class="col-md-12">
						<?php if(isset($_SESSION['id'])){ ?>
						<p class="text-center">
							<center>
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">¡Compra ya!</button>
							</center>
						</p>
						<?php }else{ ?>
						<p class="text-center">
							<center>
								<button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">¡Compra ya!</button>
							</center>
						</p>
						<?php } ?>
						<br /><br />
						<hr />
                        
					</div>
				</div>
			</div>
    
    
    
    
    
    		<div class="row">
            
            	<h3>Medios de pago disponibles</h3>
                	<br />
                    
                    <ul style="list-style-image:../img/vineta2.png">
						<li style="list-style-image:url(../img/vineta2.png); font-size:16px;"><b>Desde cualquier país del mundo:</b> Puedes pagar con tarjeta de crédito (Visa, Mastercard, Diners, American Express) o con Paypal. </li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;"><b>Desde México:</b> Además de los pagos con tarjeta de crédito descritos anteriormente también puedes pagar en efectivo a través de Oxxo. Para pagar con Oxxo inscribete normalmente y encontrarás la opción para descargar el recibo de pago. </li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;"><b>Desde Colombia:</b> Además de los pagos con tarjeta de crédito descritos anteriormente también puedes pagar con PSE y en efectivo a través de Baloto. Para pagar con Baloto inscribete normalmente a la conferencia y encontrarás la opción para descargar el recibo de pago.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;"><b>Desde Perú:</b> Además de los pagos con tarjeta de crédito descritos anteriormente también puedes pagar en efectivo a través de Banco de crédito BCP. Para pagar con BCP inscribete normalmente a la conferencia y encontrarás la opción para descargar el recibo de pago.</li>
                        
					</ul>
                    
                    
                   
                    
                    <hr />
            
            </div>
    
    
            
            
            
           


            <!-- /////////////////////////////////////////////////////  -->
		
                
                    
                   
                
                
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center">¿Prefieres hablar con nosotros?</h3>
                        <h4 class="text-center">Llámanos</h4>
                        <br />
                        <p class="text-center" style="font-size:16px;">
                            Colombia: +5713819084<br />
                            México: +525541708262<br />
                            Estados Unidos: +13052304729<br />
                        </p>
                        <p class"text-center">También puedes hablar con nosotros a través del chat que encuentras en la parte inferior izquierda de esta página</p>
                    </div>
                    
                    <div class="col-md-6">
                        <h3 class="text-center">Otros medios de contacto</h3>  
                        <h4 class="text-center">Estaremos atentos a responderte</h4>     
                        <br />
                        <p class="text-center" style="font-size:16px;">
                            Email: info@phronesisvirtual.com<br />
                            Skype: editorialphronesis<br />
                            Facebook: https://www.facebook.com/phronesisvirtual<br />
                            Twitter: @phronesisvir<br />
                        </ul>
                        
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
								<span class="CompraPaquetes-label" for="btnPaqueteAudio"> Formato de audio MP3 (-30% dto)</span>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaquetePDF" type="radio" name="product" value="1" data-discount="30" data-price="34.95" data-format="PDF">
								<span class="CompraPaquetes-label" for="btnPaquetePDF"> Formato de texto PDF (-30% dto)</span>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<input id="btnPaqueteAll" type="radio" name="product" value="14" data-discount="50" data-price="69.9" data-format="PDF + MP3">
								<span class="CompraPaquetes-label" for="btnPaqueteAll"> Los dos formatos PDF + MP3 <span class="orange">(-50% dto + conferencia gratis)</span></span>
							</div>
						</div>
                        <hr />
                        <p style="font-size:15px"><b>Sólo por esta semana:</b> Por la compra del paquete de guías prácticas de Walter Riso en ambos formatos quedarás inscrito completamente gratis a la conferencia virtual "Enamorate de ti" que se llevará a cabo el próximo 5 de diciembre.</p>
						<br />
                        <p class="mensajeEspera1"></p>
						<div class="CompraPaquetes-dataContainer text-right" style="display:none; font-size:16px">
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
							<p class="modal-title" id="myModalLabel" style="font-size:18px;"><b>Pago del producto:</b> <span id="CompraPaquetes-nombre"></span></p>
                            <br />
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
				
				var textoComplemento = 'Acceso gratis a conferencia "Enamorate de ti"'
				
				if(format == "PDF + MP3")
					
				nombre     = 'Colección de guías prácticas de Walter Riso ('+ format +') + '+ textoComplemento

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
				landing: 58
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
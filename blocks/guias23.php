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
	
	<div class="row top" style="background-color:#CCC" >

		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1 class="text-center">¿Es un error prometer amor eterno?</h1>
					
                    <br />
                 </div>
             </div>
             
             <div class="row">
             	<div class="col-md-6">
                	<img class="img img-responsive" src="../img/landings/amor-enterno-walter-riso.png" alt:"Jurar amor eterno es una locura - Walter Riso" title="¿Es un error jurar amor eterno?" />
                </div>
                <div class="col-md-6">
                
                	<p style="font-size:16px">Esta fue la respuesta de Walter Riso cuando se le pidió su opinión acerca de jurar o prometer amor eterno:</p>
                    <br />
                    <p style="font-size:16px"><i>"Jurar amor eterno me parece una locura. ¿Cómo voy a jurar sobre una emoción? La otra persona puede volverse explotadora, enamorarse de otro, cambiar de sexo... Uno sólo puede comprometerse a las cosas que dependen de uno mismo, como ser sincero o respetar al otro".</i></p>
                    <br />
                        
                 
                    <h4 class="text-center">¿Que opinas de esta respuesta?<br />¿Estás de acuerdo?</h4>            
                    </p>
                	
                </div>
             
             </div>
			
			
			<hr>
			
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h4>Te invitamos a participar en esta sala de debate</h4>								
                                        
					<?php
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					?>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1555280741417343";
					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					
					<div class="fb-comments" data-href="<?= $actual_link; ?>" data-width="100%" data-numposts="5"></div>
                                        
				</div>
			</div>
	
    
    
    		<!-- //////////////////////////////////////// --> 
            
            
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                		<div class="text-center" style="font-size:24px;">
								<strong>
									Lleva hoy las 5 guías prácticas de Walter Riso con el<br /><span style="color:red">30% de descuento</span>
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
    
    
    
    
    
    
    
    
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" align="center">
									<br />
									<img class="img img-responsive" style="max-width:200px" src="/admin/_lib/file/imgpublicaciones/Guia%20practica%20para%20vencer%20la%20dependencia%20emocional.png" alt="Guía práctica para vencer la dependencia emocional" title="Guía práctica para vencer la dependencia emocional - Walter Riso">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							
							<h4>Guía práctica para vencer la dependencia emocional</h4>
                            <h5>13 pasos para amar con independencia y libertad.</h5>
                            <br />
                            <p style="font-size:16px">Ser autónomo desde el punto de vista emocional no es dejar de amar, sino gobernarse a sí mismo, ser fiel a los propios principios y no entregar la dignidad personal a cambio de nada, ni siquiera en nombre del amor. En esta guía Walter Riso nos enseña de una forma práctica y poco teórica los pasos que se deben seguir para Amar sin dependencias emocionales, pretende aportar ideas y procedimientos que permitan desarrollar destrezas y habilidades para afrontar la dependencia emocional, prevenirla y/o crear un estilo de vida orientado a la independencia y al desapego afectivo.   </p>
                            <br />
                            
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
                            
                            
						
                            
						</div>
					</div>
                    
				</div>
			</div>
            
            
                      
           <hr />
            
            <!-- //////////////////////////////////////// -->
            
            
            
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div align="center">
									<br />
									<img class="img img-responsive" style="max-width:200px" src="/admin/_lib/file/imgpublicaciones/No-sufrir-de-amor.png" alt="Guía práctica para no sufrir de amor" title="Guía práctica para no sufrir de amor - Walter Riso">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							
							<h4>Guía práctica para no sufrir de amor</h4>
                            <h5>39 Reflexiones y vivencias que te permitirán desarrollar estrategias y esquemas afectivos resistentes al "mal de amor"</h5>
                            <br />
                            <p style="font-size:16px">Esta guía tiene por objetivo crear un espacio de reflexión para desarrollar estrategias y esquemas afectivos y cognitivos resistentes al "mal de amor". Si conoces los motivos principales por los que transformamos absurdamente el amor en sufrimiento, aprenderás a evitarlos y a generar esquemas y comportamientos más adaptativos. </p>
                            <br />
                            
                            <div class="row">
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Autor:</b> Walter Riso</li>
                                        <li ><b>Formatos:</b> PDF (Texto) - MP3 (Audio)</li>
                                        <li ><b>ISBN:</b> 978-958-57932-1-5</li>
                                    </ul>
                                </div>
                                                  
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Idioma:</b> Español</li>
                                        <li ><b>Nº de páginas (Versión texto):</b> 73</li>
                                        <li ><b>Duración (Versión audio):</b> 02:51:00 (2 Horas, 51 minutos)</li>
                                    </ul>
                                </div>
                            </div>                         
                            
                            
						
                            
						</div>
					</div>
                    
				</div>
			</div>
            
            <hr />
            
            <!-- //////////////////////////////////////// -->
            
            
            
            
            
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" align="center">
									<br />
									<img class="img img-responsive" style="max-width:200px" src="/admin/_lib/file/imgpublicaciones/Guia_practica_para_mejorar_autoestima.png" alt="Guía práctica para mejorar la autoestima" title="Guía práctica para mejorar la autoestima - Walter Riso">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							
							<h4>Guía práctica para mejorar la autoestima</h4>
                            <h5>24 pasos para enamorarte de ti y mejorar tu autoestima.</h5>
                            <br />
                            <p style="font-size:16px">La visión negativa que se tiene de uno mismo es un factor determinante para que aparezcan trastornos psicológicos como fobias, depresión, estrés, ansiedad, inseguridad interpersonal, alteraciones psicosomáticas, problemas de pareja, bajo rendimiento académico y laboral, abuso de sustancias, problemas de imagen corporal, incapacidad de regular las emociones, y muchos más. En el amor la mala autoestima es una de las principales razones para que aparezcan problemas de dependencia, inseguridad y rechazo. La conclusión de los especialistas es clara: si la autoestima no posee suficiente fuerza, viviremos mal, seremos infelices, ansiosos y seremos mas debiles ante situaciones de rechazo o infidelidad. </p>
                            <br />
                            
                            <div class="row">
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Autor:</b> Walter Riso</li>
                                        <li ><b>Formatos:</b> PDF (Texto) - MP3 (Audio)</li>
                                        <li ><b>ISBN:</b> 978-958-57970-0-0</li>
                                    </ul>
                                </div>
                                                  
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Idioma:</b> Español</li>
                                        <li ><b>Nº de páginas (Versión texto):</b> 47</li>
                                        <li ><b>Duración (Versión audio):</b> 01:42:00 (1 Hora, 42 minutos)</li>
                                    </ul>
                                </div>
                            </div>                         
                            
                            
						
                            
						</div>
					</div>
                    
				</div>
			</div>
            
            
            
           <!-- //////////////////////////////////////// --> 
           
           <hr />
            
            <!-- //////////////////////////////////////// -->
            
            
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" align="center">
									<br />
									<img class="img img-responsive" style="max-width:200px" src="/admin/_lib/file/imgpublicaciones/Guia-practica-para-no-dejarse-manipular.png" alt="Guía práctica para no dejarse manipular y ser asertivo" title="Guía práctica para no dejarse manipular y ser asertivo - Walter Riso">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							
							<h4>Guía práctica para no dejarse manipular y ser asertivo</h4>
                            <h5>14 pasos para evitar la sumisión, saber expresar desacuerdos (decir "no") y saber ser asertivo, todo de una forma socialmente aceptable.</h5>
                            <br />
                            <p style="font-size:16px">Si temes herir los sentimientos de los demás al ser sincero, o si no eres capaz de expresar la ira de un modo socialmente adecuado, de oponerte, de expresar una opinión contraria, o si sientes que los demás te humillan o te manipulan, esta guía es para ti. Ser asertivo significa ser capaz  de ejercer y/o defender los derechos personales: decir "no", expresar desacuerdos, dar una opinión contraria y/o expresar sentimientos negativos sin dejarse manipular, como lo haría una persona sumisa,  y sin violar los derechos de los demás, como lo haría una persona agresiva. La asertividad es un punto medio entre el que se arrodilla y el que aplasta al otro. Implica la defensa de los derechos, sin lastimar a nadie. </p>
                            <br />
                            
                            <div class="row">
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Autor:</b> Walter Riso</li>
                                        <li ><b>Formatos:</b> PDF (Texto) - MP3 (Audio)</li>
                                        <li ><b>ISBN:</b> 978-958-57970-2-4</li>
                                    </ul>
                                </div>
                                                  
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Idioma:</b> Español</li>
                                        <li ><b>Nº de páginas (Versión texto):</b> 29</li>
                                        <li ><b>Duración (Versión audio):</b> </li>
                                    </ul>
                                </div>
                            </div>                         
                            
                            
						
                            
						</div>
					</div>
                    
				</div>
			</div>
            
            
            
           <!-- //////////////////////////////////////// --> 
           
           <hr />
            
            <!-- //////////////////////////////////////// -->
            
            
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" align="center">
									<br />
									<img class="img img-responsive" style="max-width:200px" src="/admin/_lib/file/imgpublicaciones/Guia-practica-para-afrontar-la-infidelidad.png" alt="Guía práctica para afrontar la infidelidad de la pareja" title="Guía práctica para afrontar la infidelidad de la pareja - Walter Riso">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							
							<h4>Guía práctica para afrontar la infidelidad de la pareja</h4>
                            <h5>16 lecciones para descubrir, entender y afrontar la infidelidad.</h5>
                            <br />
                            <p style="font-size:16px">Está guía es una excelente herramienta para descubrir, entender y afrontar la infidelidad en una relación de pareja. A través de 12 lecciones, Walter Riso muestra con fundamentos científicos y prácticos lo que es la infidelidad, los diferentes tipos de infidelidad, la forma cómo detectarla o descubrirla, las luchas y consecuencias psicológicas que se viven con la infidelidad y los caminos para afrontarla. </p>
                            <br />
                            
                            <div class="row">
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Autor:</b> Walter Riso</li>
                                        <li ><b>Formatos:</b> PDF (Texto) - MP3 (Audio)</li>
                                        <li ><b>ISBN:</b> 978-958-57932-1-5</li>
                                    </ul>
                                </div>
                                                  
								<div class="col-md-6">   
                                	<ul style="list-style-type:square">
										<li><b>Idioma:</b> Español</li>
                                        <li ><b>Nº de páginas (Versión texto):</b> </li>
                                        <li ><b>Duración (Versión audio):</b> </li>
                                    </ul>
                                </div>
                            </div>                         
                            
                            
						
                            
						</div>
					</div>
                    
				</div>
			</div>
            
            <hr />
            
            
           


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
                		<h3 class="text-center">Escucha algunos fragmentos de la versión en audio</h3>
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
				nombre : nombre,
				landing: 23
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
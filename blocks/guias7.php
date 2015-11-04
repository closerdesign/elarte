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

	<!--<div><img class="img img-responsive" src="../img/bannerl2.png"  /></div> -->
	
	<div class="row top" style="background-color:#CCC" >

		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1 class="text-center">¿Qué hacer frente al abandono?</h1>
					<h4 class="text-center">Por Walter Riso </h4>
                    <br />
				</div>
			</div>
			<hr>
                     
            <div class="row">
				<div class="col-md-12" style="font-size:16px">
                	
                	<p ><i>"Pelear la vida. A regañadientes, a las malas, con las uñas, como quieras, pero no hay otra opción. Puedes sentarte a llorar tu mala suerte, a lamentarte de la "injusta" soledad, a sentir lástima por tu aporreado yo y autocompadecerte. O por el contrario, puedes levantar cabeza y aplicar una dosis de racionalidad a tu desajustado corazón".</i></p>
                    
                    
                    
                    
                	
					
				</div>
            </div>
            <div class="row">
				<div class="col-md-4" style="font-size:16px">
                	<p><img class="img img-responsive" src="../img/landings/mujer-sola.png" alt="Mujer sola" title="Mujer en soledad"></p>
					
                    
				</div>
                <div class="col-md-8" style="font-size:16px">
                
                	<p>Si te dejó, si se fue como un soplo, si no le importaste, si te hizo a un lado con tanta facilidad, si no valoró lo que le diste, si apenas le dolió tu dolor, si decidió estar sin tu presencia, ¿no será, y lo digo solo como hipótesis, que no te merece?. Y si te dejó porque ya no te ama, porque se le agotaron los besos, y hasta la más simple de las caricias se le convirtió en tortura, ¿no será, y lo digo solo como hipótesis, que ya no te ama? ¿Y no será, que si fue cruel o se le terminó el amor, ya no tiene sentido insistir en resolver lo que ya está resuelto? ¿No será que hay que quemar las naves, cerrar el capítulo y dirigir la atención a otra parte? No se trata de no sufrir, sino de darle al sufrimiento un giro y elaborar el duelo (resignarse a la pérdida). No preocuparse por lo que podría haber sido y no fue, sino por que es.</p>
                    
                    <p>
                    	Lo curioso del despecho es que los que han sido abandonados, casi siempre terminan por autocastigarse: "Si la persona que amo no me quiere, no merezco el amor" o "Si la persona que dice quererme me deja, definitivamente no soy querible". La consecuencia de esta manera de pensar es nefasta. El comportamiento se acopla a la distorsión y el sujeto intenta confirmar, mediante distintas sanciones, que no merece el amor. Veamos cuatro formas típicas de autocastigarse que utilizan los "abandonados":
                    
                    </p>
                    
                    <ul>
                    	<li><b>Estancamiento motivacional:</b> "No merezco ser feliz, entonces elimino de mi vida todo lo que me produzca placer" (autocastigo motivacional)</li>
						<li><b>Aislamiento afectivo:</b> "No merezco a nadie que me quiera. Cuánto más me guste alguien, más lo alejo de mi lado" (autocastigo afectivo)</li>
						<li><b>Reincidencia afectiva negativa:</b> Buscar nuevas compañías similares a la persona que nos hizo o todavía nos hace sufrir (profecía autocastigante)</li>
						<li><b>Promiscuidad autocastigadora:</b> Entregarse al mejor postor, "prostituirse" socialmente o dejar que hagan de uno lo que quieran (autocastigo moral).</li>
                    
                    </ul>
					
                    
				</div>
			</div>
            
            <div class="row" style="font-size:16px">
            	<br />
            	<p >Me pregunto, ¿Y no será que de pronto no eres tan culpable como crees, y que no haya ni buenos ni malos, vencedores y vencidos?</p>

				<p>Ahora que te dejó, hay que comenzar a vivir de otra manera. Retomar lo bueno que tenías olvidado y arrancar. Todos somos capaces de recuperarnos del fracaso afectivo. Al principio duele hasta el alma, pero al cabo de un tiempo, si eliminamos el autocastigo, la mente empieza reponerse.</p>

				<p>Piensa en las pérdidas que has tenido anteriormente en tu vida, y cómo ahora, no te producen ni rasquiña. Es muy probable que dentro de un tiempo, esta última decepción, la que ahora estás padeciendo, quede reducida a un recuerdo insípido y descolorido. Y mientras tanto, te toca sobrevivir. Evitar caer en los puntos a, b, c y d. Rodearte de amigos y amigas de verdad, porque la amistad cura. También puedes acceder a la vida espiritual que tenías abandonada, y no me refiero a encerrarte en un templo, sino revisar tu sentido de vida. Las crisis activan la autobservación y nos obligan a mirarnos desde una óptica nueva.</p>

				<p>Siempre habrá alguien, testarudo y persistente, que nos quiera a pesar de todo. A esta hora, en algún lugar de la ciudad, hay una persona desconocida que aún no conoces, dispuesta a contagiarte de amor, que pronto entrará a tu vida. Es solo cuestión de tiempo.</p>
            
            </div>
            
            <hr />
            
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
                	<h2 class="text-center">
							Información sobre las guías prácticas de Walter Riso</span>
					</h2>
                    <br />
				</div>
			</div>
			
            
            <div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12" align="center">
									<br />
									<img width="200px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/No-sufrir-de-amor.png" alt="Guía práctica para no sufrir de amor" title="Guía práctica para no sufrir de amor - Walter Riso">
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
                            <p style="font-size:16px">En esta obra Walter Riso te guiará por un modelo o un esquema de reflexión que te permita comprender lo que es el "buen amor" (sano, coherente, constructivo) y el "mal amor" (enfermo, incoherente, destructivo), permitiendote descubrir los motivos por los que transformamos absurdamente el amor en sufrimiento y dandote pautas y ejercicios prácticos que te ayudarán a generar esquemas y comportamientos más adaptativos para vivir el amor de una manera mas plena y saludable. </p>
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
									<img width="200px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/Guia%20practica%20para%20vencer%20la%20dependencia%20emocional.png" alt="Guía práctica para vencer la dependencia emocional" title="Guía práctica para vencer la dependencia emocional - Walter Riso">
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
                            <p style="font-size:16px">¿Eres de los que piensa y siente que no puedes vivir sin tu pareja, que tu vida sin ella no tiene sentido, que tu felicidad solo depende de tu pareja y que tu vida sólo puede girar en torno a ella? ¡Cuidado! depender de la persona que se ama no solo arruina relaciones, también es una manera de enterrarse en vida, un acto de automutilación psicológica donde el amor propio, el autorrespeto, la dignidad, los principios y la esencia de uno mismo son ofrendados y regalados irracional-mente.  </p>
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
								<div class="col-md-12" align="center">
									<br />
									<img width="200px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/Guia_practica_para_mejorar_autoestima.png" alt="Guía práctica para mejorar la autoestima" title="Guía práctica para mejorar la autoestima - Walter Riso">
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
                            <p style="font-size:16px">Activar el amor propio es el primer paso hacia cualquier tipo de crecimiento psicológico y mejoramiento personal. Y no se está haciendo referencia al lado oscuro de la autoestima, al narcisismo y a la fascinación por el propio ego (egolatría), sino  a  la capacidad genuina de reconocer, sin vergüenza ni temor, las  fortalezas y virtudes que poseemos e  integrarlas al desarrollo de nuestra vida para hacerla más saludable y llevadera. Quererse uno mismo, despreciando o ignorando a los demás, es presunción y exclusión; querer a los demás, despreciándose uno mismo, es no reconocer el autoamor que nos define. </p>
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
									<img width="200px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/Guia-practica-para-no-dejarse-manipular.png" alt="Guía práctica para no dejarse manipular y ser asertivo" title="Guía práctica para no dejarse manipular y ser asertivo - Walter Riso">
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
									<img width="200px" class="img img-responsive" src="/admin/_lib/file/imgpublicaciones/Guia-practica-para-afrontar-la-infidelidad.png" alt="Guía práctica para afrontar la infidelidad de la pareja" title="Guía práctica para afrontar la infidelidad de la pareja - Walter Riso">
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
            
            
           <!-- //////////////////////////////////////// --> 
            
            
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="text-center" style="font-size:24px;">
						<strong>
							Lleva hoy las 5 guías prácticas con el<br /><span style="color:red">30% de descuento</span>
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
                
                <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p style="font-size:16px" class="text-center">Si prefieres adquirir cada guía de forma independiente, <a href="http://www.elartedesabervivir.com/obras">Haz clíck aquí</a> .</p>
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
				landing: 7
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
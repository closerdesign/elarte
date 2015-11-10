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

    <?php
    date_default_timezone_set('America/Bogota');
    $date = date('m/d/Y h:i:s a', time());
    $dia  = date('d', time());
    $mes  = date('m', time());
    $anio = date('Y', time());
    ?>
	
	<div class="row top" >
    

		<div class="container">
        
        	<div class="row">
            
            	<h1 class="text-center">Carta a mi amiga sin autoestima</h1>
                <br />
                <p style="font-size:16px">"No tengo tiempo para dormir el domingo, tengo tanto por hacer que me da remordimiento". Me disgusta que digas cosas como estas. Cuando te escucho me dan ganas de darte una cátedra sobre el amor propio (que, por cierto, hoy entiendo y disfruto gracias a los libros de Walter Riso). Sin embargo, y por prudencia, me toca callar pues ya en un intento previo recibí de ti malas respuestas;  sé bien que no te agradan mis consejos sobre el tema.</p>
                <br />
                <p style="font-size:16px">Yo también tengo, como millones de mujeres en el mundo, mil cosas por hacer: tengo hijos, un trabajo, una casa y un esposo con el cual compartir. Pero duermo hasta tarde los domingos, duermo tranquila aun cuando deba hacer tantas cosas. Como todos, necesito descansar y no me da remordimiento hacerlo; duermo dulce y plácidamente, reconforto mis ganas, mi entusiasmo y energías y vuelvo a empezar. Me gusta hacer "nada" cuando puedo, así libero mi mente de tantos "compromisos" que me llevan al estrés.</p>
                <br />
            	
            </div>
            
            
            <div class="row">
            	<div class="col-md-6">
                	<img width="100%" class="img img-responsive" src="../img/landings/mujer-con-alta-autoestima.png" alt:"Mujer con alta autoestima" title="Mujer con alta autoestima mirandose al espejo" />
                </div>
            	
                <div class="col-md-6">
                	<p style="font-size:16px">
                    	También me miro al espejo muchas veces y me digo "¡qué bella estás!"; al escucharme me sonrojo y sonrío; cuando te conté lo que yo hacía, que me hablaba, solo logré un ataque de risa en ti y recuerdo las palabras que dijiste: "yo nunca me miro al espejo, si acaso por 2 segundos y ya"; pues ya lo sabes, yo sí me aprecio, me aplaudo, me hablo… Me disgusta cuando dices "¡estoy fea, no tengo la cintura como quiero!", o esa vez que me dijiste "Me voy a encontrar con Juan" y la emoción duró un segundo, pues de inmediato te recriminaste: "cuantos años y yo trabajando igual, con la misma ropa, no tengo carro y ni un apartamento propio"… ¿Cómo es posible volver un momento de emoción y reencuentro en una tragedia monumental? ¡Oh por Dios! Has tenido nuevos amores, nuevos amigos, aprendiste un nuevo idioma, has viajado, aprendiste de cocina, has vivido y experimentado, has bailado, has comido los banquetes que has querido, has, has, has… ¿Por qué te fijas solo en lo negativo? Cuántos quisieran hacer tanto como tú, llevar la vida que tu llevas, tener buena salud y simplemente vivir.
                    </p>
                </div>
            
            </div>
            
            <div class="row">
            	<p style="font-size:16px">
                	<br />
            		A ti, mujer sin autoestima, quiero hacerte comprender lo siguiente: si te aplaudes por tus logros (que son muchos), si te miras al espejo y te besas, si te abrazas, si haces "nada" en una tarde y dedicas ese tiempo para ti, tu autoestima se verá renovada, aparecerá una nueva mujer llena de ganas, entusiasmo y amor. Ya no verás como anormales mis acciones, como aquella de sentarme en un parque, quitarme los zapatos y tocar el pasto, mirar a lo lejos y solo pensar, disfrutar colores, disfrutar del viento. ¡No sé si estoy loca! Y si lo estoy, lo disfruto inmensamente.
                </p>
 				<p style="font-size:16px">
					Mujer sin autoestima: Cuando digo que quiero emprender un nuevo hobbie, no me digas "eso te quita mucho tiempo"; créeme, yo lo disfruto y sí, quita tiempo, pero me gusta y lo hago con placer. Yo de ti me creo el cuento, estás aquí para disfrutar cada momento, para disfrutarte a ti misma, bella e inteligente mujer.
				</p>
                <hr />
                <p style="font-size:16px">
					<b>CONCLUSIÓN:</b> Cuando amamos lo que somos y aceptamos la realidad de nuestro ser, se nos hará más fácil aceptar aquello que no nos gusta; buscando mejorarlo y trabajar para sentirnos cada día más satisfechos con nosotros mismos. Como lo indica el psicólogo y escritor Walter Riso en su "Guía práctica para mejorar la autoestima": <i>"Activar el amor propio es el primer paso hacia cualquier tipo de crecimiento psicológico y mejoramiento personal. Y no se está haciendo referencia al lado oscuro de la autoestima, al narcisismo y a la fascinación por el propio ego (egolatría), sino a la capacidad genuina de reconocer, sin vergüenza ni temor, las fortalezas y virtudes que poseemos e integrarlas al desarrollo de nuestra vida para hacerla más saludable y llevadera.  La visión negativa que se tiene de uno mismo es un factor determinante para que aparezcan trastornos psicológicos como fobias, depresión, estrés, ansiedad, inseguridad interpersonal, alteraciones psicosomáticas, problemas de pareja, dependencia emocional, bajo rendimiento académico y laboral, abuso de sustancias, problemas de imagen corporal, incapacidad de regular las emociones, y muchos más"</i>. Hoy queremos invitarte a la conferencia virtual que dictará Walter Riso sobre este importante tema el próximo 5 de diciembre de 2015, es una cita para iniciar un romance que durará toda la vida: <i>el romance contigo mismo</i>. ¡No te la pierdas!. 
                </p>
            	<hr />
            </div>
        
        
        
        	<div class="row">
            
            	<img width="100%" class="img img-responsive" src="../img/landings/conferencia-virtual-enamorate-de-ti-3.png" alt:"Conferencia virtual por Walter Riso" title="Enamorate de ti, conferencia virtual por Walter Riso" />

            </div>
            
            <div class="row">
            
            	<p style="font-size:18px; color:#600">
                	<br /><i>"Los que no se quieren a sí mismos han aprendido a echarse la culpa por casi todo lo que hacen mal y a dudar del propio esfuerzo cuando hacen las cosas bien, como si tuvieran los cables cruzados." Walter Riso</i>
                </p>
            
            </div>
        
        	<div class="row">
            	<div class="col-md-6" style="margin:0px 0px 20px 0px;">
                	<h1 class="text-center">Enamórate de ti</h1>
                    <h3 class="text-center">Conferencia virtual por Walter Riso</h3>
                    <br />
                    <p style="font-size:16px">
                    Amarse a uno mismo es fundamental. Activar la autoestima es el primer paso hacia cualquier tipo de crecimiento psicológico y mejoramiento personal; no hay otra forma de cuidarse y de  reconocerse como un ser digno. No solamente es el punto de  referencia para saber cuánto se debe amar a los demás, sino que actúa como un factor de protección para las enfermedades psicológicas y un elemento que genera bienestar y calidad de vida. 
                    </p>
                    <p style="font-size:16px">
                    En esta conferencia, Walter Riso nos guiará hacia la obtención de la capacidad genuina de reconocer, sin vergüenza ni temor, las fortalezas y las virtudes que poseemos, para integrarlas al desarrollo de nuestra vida y volcarlas a los demás de manera efectiva y compasiva. Será un espacio para reflexionar y reencontrarse con la propia esencia, en un proceso donde las aspiraciones personales habrán de converger hacia un estado de bienestar auténtico.
                    </p>
                    <br />
                    <ul style="list-style-image:../img/vineta2.png">
						<li style="list-style-image:url(../img/vineta2.png); font-size:16px;">La conferencia será transmitida, en vivo y en directo, el sábado 5 de diciembre de 2015. <a href="#" onclick="$('#myModalHorarios').modal()">Consulta los horarios de tu país</a>.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Si por algún motivo no puedes acceder a la conferencia en vivo, tendrás 72 horas para ver la grabación.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Podrás realizar preguntas.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Podrás acceder fácilmente desde cualquier parte del mundo a través de tu computadora, tablet o teléfono celular, solo necesitas una conexión estable a Internet.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">La duración de la conferencia es, aproximadamente, de 2 horas.</li>
                        <li style="list-style-image:url(../img/vineta2.png); font-size:16px;">Esta conferencia será dictada en idioma español.</li>
                        
					</ul>
                
                </div>
                
                <div class="col-md-6">
                
                	<div style="margin:20px 10px 0px 10px; background-color:#500202; padding:10px 20px 10px 20px;">
                    
                    	<h1 class="text-center" style="color:#FFF">¡Inscríbete ahora!</h1>
                        <h4 class="text-center" style="color:#FFF">Entradas limitadas</h4>
                        <br />
                        <p style="font-size:16px; color:#FFF">No te quedes por fuera, aprovecha las temporadas de preventa y accede a esta magistral conferencia a muy bajo costo. Los cupos son limitados.</p>
                        
                        <table border="0" width="100%">
                            <tr height="80px">
                                <?php
                                    if ( $dia <= 10 && $mes == 11 ) {
                                ?>
                                    <td valign="middle" width="20px">
                                        <input type="radio" value="1" name="precio_conferencia" checked="checked" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#FFF"><b>Primera preventa</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#FFF">Hasta nov. 10 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#FFF">USD 7,99</span>
                                    </td>
                                <?php        
                                    }else{
                                ?>
                                    <td valign="middle" width="20px">
                                        <input type="radio" value="1" name="precio_conferencia" disabled="disabled" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#a88080"><b>Primera preventa</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#a88080">Hasta nov. 10 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#a88080">USD 7,99</span>
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <tr height="80px">
                                <?php
                                    if ( ($dia <= 17 && $dia > 10) && $mes == 11) {
                                ?>
                                    <td valign="middle" width="20px">
                                            <input type="radio" value="2" name="precio_conferencia" checked="checked" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#FFF"><b>Segunda preventa</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#FFF">Hasta nov. 17 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#FFF">USD 9,99</span>
                                    </td>
                                <?php        
                                    }else{
                                ?>
                                    <td valign="middle" width="20px">
                                            <input type="radio" value="2" name="precio_conferencia" disabled="disabled" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#a88080"><b>Segunda preventa</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#a88080">Hasta nov. 17 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#a88080">USD 9,99</span>
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <tr height="80px">
                                <?php
                                    if ( $dia <= 05 && $mes == 12) {
                                ?>
                                    <td valign="middle" width="20px">
                                        <input type="radio" value="3" name="precio_conferencia" checked="checked" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#FFF"><b>Precio full</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#FFF">Hasta dic. 5 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#FFF">USD 14,99</span>
                                    </td>
                                <?php
                                    }else{
                                ?>
                                    <td valign="middle" width="20px">
                                        <input type="radio" value="3" name="precio_conferencia" disabled="disabled" />
                                    </td>
                                    <td valign="middle">
                                        <span style="font-size:16px; color:#a88080"><b>Precio full</b></span>
                                        <br />
                                        <span style="font-size:15px; color:#a88080">Hasta dic. 5 de 2015</span>
                                    </td>
                                    <td valign="middle" align="right">
                                        <span style="font-size:24px; color:#a88080">USD 14,99</span>
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                        </table>
                        
                        <hr />
                        
                        <p style="color:#CCC" class="text-center">Los precios están en dólares americanos pero podrás pagar desde cualquier parte del mundo con tarjeta de crédito, también podrás pagar en efectivo si estás en  Colombia, México o Perú. Sigue el proceso de inscripción y recibirás mayor información sobre las diferentes formas de pago según el país en el que te encuentres.</p>
                        
                        <br />
                        
                        <!--
                        <div style="font-size:16px; color:#FFF">¿Tienes un código de descuento?<br /></div>
                        <input type="text" style="width:60%; height:40px; font-size:18px;" placeholder="Ingrésalo aquí"  />
                        -->
                        
                        
                        <div align="center">
							<?php if(isset($_SESSION['id'])){ ?>
                            <p class="text-center">
                                <center>
                                    <button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Inscribirme ahora</button>
                                </center>
                            </p>
                            <?php }else{ ?>
                            <p class="text-center">
                                <center>
                                    <button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Inscribirme ahora</button>
                                </center>
                            </p>
                            <?php } ?>
                        
                        </div>
                        
					</ul>
                        
                        
                		<br /><br /><br />
                    </div>
                
                </div>
            	
                
            </div>    
            
            <div class="row">
            
            	<hr />
                
                <div class="col-md-2" align="center">
                	
                	<img style="max-width:160px;" class="img img-responsive" src="../img/landings/walter-riso.png" alt:"Walter Riso" title="Walter Riso" /><br />
                </div>
                
                <div class="col-md-10">
                	<p style="font-size:22px">Sobre Walter Riso</p>
                	<p style="font-size:16px">
                    	Walter Riso nació en Italia (Nápoles). Es Doctor en psicología, especialista en Terapia Cognitiva y Magíster en Bioética. Hace treinta años trabaja como psicólogo clínico y formador de terapeutas, práctica que alterna con el ejercicio de la cátedra universitaria en Latinoamérica y España, y la publicación de textos científicos y de divulgación, en diversos medios. Ha sido cofundador de Formar (Centro de investigación y Terapia del comportamiento) y del C.E.A.P.C. (Centro de Estudios Avanzados de Terapia Cognitivo-conductual).
                    </p>
                    
                
                </div>
            
            
            </div>
            
            <div class="row">
            
            	<hr />
                
                <div class="col-md-12">
                
                	<h3>Medios de pago disponibles</h3>
                	<br />
                	<table class="table table-striped table-bordered">
						<tr valign="middle">
                        	<th></th>
                            <th>Visa</th>
                            <th>Mastercard</th>
                            <th>Diners</th>
                            <th>AMEX</th>
                            <th>Paypal</th>
                            <th>PSE</th>
                            <th>Pago en efectivo</th>
                        </tr>
                        <tr>
                        	<td>Desde cualquier país del mundo</td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>
                         <tr>
                        	<td>Desde Colombia</td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center">Baloto</td>
                        </tr>
                         <tr>
                        	<td>Desde México</td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"></td>
                            <td align="center">Oxxo</td>
                        </tr>
                         <tr>
                        	<td>Desde Perú</td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"><img src="../img/chulo.png" alt="ok" /></td>
                            <td align="center"></td>
                            <td align="center">BCP</td>
                        </tr>
                                
                    </table>
                    
                    <br />
                    
                    <h3>Horarios en las principales ciudades</h3>
                    <br />
                    <table class="table table-striped table-bordered">
						<tr><th>Ciudad</th><th>Hora</th></tr>
						<tr><td>Los Ángeles, San Francisco, Las Vegas</td><td>11:00 a.m.</td></tr>
						<tr><td>México, Guatemala, Tegucigalpa, San Salvador, San José, Managua</td><td>1:00 p.m.</td></tr>
						<tr><td>Bogotá, Lima, Quito, Panamá, Miami, New York</td><td>2:00 p.m.</td></tr>
						<tr><td>Caracas</td><td>2:30 p.m.</td></tr>
						<tr><td>San Juan, Sucre, Santo Domingo</td><td>3:00 p.m.</td></tr>
						<tr><td>Buenos Aires, Asunción, Santiago, Montevideo</td><td>4:00 p.m.</td></tr>
                        <tr><td>Sao Paulo</td><td>5:00 p.m.</td></tr>
						<tr><td>Madrid, Barcelona</td><td>8:00 p.m.</td></tr>
					</table>
                    <p class="lead"><a href="http://www.timeanddate.com/worldclock/fixedtime.html?p1=41&iso=20151205T14&msg=Conferencia%20Virtual%20-%20Enam%C3%B3rate%20de%20ti&ah=2&low=5" target="_blank">Consultar más horarios</a></p>
                            
                    <br />
                    
                    <div align="center">
							<?php if(isset($_SESSION['id'])){ ?>
                            <p class="text-center">
                                <center>
                                    <button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#PaquetesModal">Inscribirme ahora</button>
                                </center>
                            </p>
                            <?php }else{ ?>
                            <p class="text-center">
                                <center>
                                    <button style="width:320px" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModalRegistroPaquete">Inscribirme ahora</button>
                                </center>
                            </p>
                            <?php } ?>
                        
                        </div>
                	
                </div>
                
            </div>    
                
            <div class="row">
            	<hr />
            	
            	<h3>¿Tienes dudas o comentarios? Estaremos atentos a responderte</h3>
                
            
            	<?php
					$actual_link = "https://www.elartedesabervivir.com/guias/enamorate-de-ti-conferencia-por-walter-riso";
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
                    
                    <hr />
            
 
            
            
            </div>   
            
            
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

		<!-- Modal -->
		<div class="modal fade" id="myModalRegistroPaquete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Proceso de registro a conferencia virtual</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<p style="font-size:16px">Lo primero que debes hacer para inscribirte a esta conferencia es iniciar sesión con tu cuenta de Phronesis, si aún no tienes una cuenta puedes crearla en sólo unos segundos.</p>
                                <br />
                                <div class="text-center">
                                    <button style="width:150px" id="iniciaPaquete" type="button" class="btn btn-primary">Crear una cuenta</button>
                                    <button style="width:150px" id="RegistraPaquete" type="button" class="btn btn-primary">Iniciar sesión</button>
                                    <br /><br /><br />
                                </div>
							</div>
                            
                            
                            
                            
                            
                            
                            
						</div>
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
						<h4 class="modal-title" id="myModalLabel">Proceso de inscripción a conferencia virtual</h4>
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
						<h4 class="modal-title" id="myModalLabel">Proceso de inscripción a conferencia virtual</h4>
					</div>
					<div class="modal-body CompraPaquetes">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <p style="font-size:16px">El siguiente paso de la inscripción es realizar el pago, ten en cuenta que según el país en el que te encuentres contarás con diferentes métodos transaccionales, presiona siguiente y continúa el proceso seleccionando el país desde donde pagarás. 
                                </p>
                            </div>
                        </div>
                        <div class="row" style="display:none">
                            <div class="col-lg-12">
                                <input checked="checked" id="btnPaqueteAudio" type="radio" name="product" value="13" data-discount="7.00" data-price="14.99" data-format="MP3">
                                <label class="CompraPaquetes-label" for="btnPaqueteAudio"> <span class="orange">Precio de primera preventa (Hasta 8 de nov): USD $7.99</span></label>
                            </div>
                        </div>
                        <div class="row" style="display:none">
                            <div class="col-lg-12">
                                <input disabled="disabled" id="btnPaquetePDF" type="radio" name="product" value="13" data-discount="7.00" data-price="14.99" data-format="PDF">
                                <label class="CompraPaquetes-label" for="btnPaquetePDF"> <span style="color:grey">Precio de segunda preventa (Hasta 15 de dic): USD $9.99</span></label>
                            </div>
                        </div>
                        <div class="row" style="display:none">
                            <div class="col-lg-12">
                                <input disabled="disabled" id="btnPaqueteAll" type="radio" name="product" value="13" data-discount="7.00" data-price="14.99" data-format="PDF + MP3">
                                <label class="CompraPaquetes-label" for="btnPaqueteAll"> <span style="color:grey">Precio full: USD $14.99</span></label>
                            </div>
                        </div>
                        <br>
                        <p class="mensajeEspera1"></p>
                        
                        <br>
                        <div class="CompraPaquetes-dataContainer text-right">
                            <?php
                                if ( $dia <= 10 && $mes == 11 ) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Precio:</b> USD $<span class="CompraPaquetes-price">14.99</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Descuento:</b> USD -$<span class="CompraPaquetes-discount">7.00</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">7.99</span></b>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <?php
                                if ( ($dia <= 17 && $dia > 10) && $mes == 11) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Precio:</b> USD $<span class="CompraPaquetes-price">14.99</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Descuento:</b> USD -$<span class="CompraPaquetes-discount">5.00</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">9.99</span></b>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <?php
                                if ( $dia <= 05 && $mes == 12) {
                            ?>    
                            <div class="row">
                                <div class="col-lg-12 text-rigth" style="font-size:22px">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">14.99</span></b>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-lg-12">
								<button id="CompraPaquetes-nextButton" type="button" class="btn btn-primary" data-target="#myModalPagoPaquetes" data-toggle="modal" data-dismiss="modal">Siguiente</button>
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
							<h4 class="modal-title" id="myModalLabel">Pago del producto: <span id="CompraPaquetes-nombre">Conferencia virtual "Enamórate de ti" por Walter Riso</span></h4>
						</div>	
					</div>
					<div class="row">
                        <div class=" text-right">
                            <?php
                                if ( $dia <= 10 && $mes == 11 ) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Precio:</b> USD $<span class="CompraPaquetes-price">14.99</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Descuento:</b> -<span class="CompraPaquetes-discount">7.00</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">7.99</span></b>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                                if ( ($dia <= 17 && $dia > 10) && $mes == 11) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Precio:</b> USD $<span class="CompraPaquetes-price">14.99</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Descuento:</b> -<span class="CompraPaquetes-discount">5.00</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">9.99</span></b>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <?php
                                if ( $dia <= 05 && $mes == 12) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 text-rigth">
                                    <b>Total a pagar: USD $<span class="CompraPaquetes-total">9.99</span></b>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
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
							<button class="btn btn-default pull-right" data-toggle="modal" data-target="#PaquetesModal" data-dismiss="modal">
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
		<?php
            if ( $dia <= 10 && $mes == 11 ) {
        ?>
        var precio = 7.99;
        <?php
            }
        ?>
        <?php
            if ( ($dia <= 17 && $dia > 10) && $mes == 11) {
        ?>
        var precio = 9.99;
        <?php
            }
        ?>
        <?php
            if ( $dia <= 05 && $mes == 12) {
        ?>
        var precio = 14.99;
        <?php
            }
        ?>
		var id_paquete = 13;
		var nombre = "Conferencia virtual: Enamorate de ti";


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
				nombre     = 'Conferencia virtual "Enamorate de ti" por Walter Riso.';

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
				landing: 53
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
			//$('.CompraPaquetes-dataContainer').slideUp('fast');
			//$('#CompraPaquetes-nextButton').slideUp('fast');
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
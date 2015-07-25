<?php if(isset($_SESSION['id'])){ ?>
<script>
	$(document).ready(function(){
		if( $('html,body').scrollTop() != 150 ){
		    $('html,body').animate({scrollTop: $(window).scrollTop() + 2000},'slow');
		}
	})	
</script>
<?php } ?>
<div class="row top">
	<div class="container contenidoConferencia">
		
		<div class="row">
			<div class="col-md-12">
				<div class="fechaEvento">
					Julio <span>25</span>
				</div>
				<h1 class="tituloConferencia">
					El arte de amar sin apegos<br />
					<span style="font-size: 0.7em">Conferencia Virtual por Walter Riso</span>
				</h1>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<img src="/images/imgConferencia.jpg" class="img img-responsive img-rounded" />
						<!--
						<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/yHwo5EunKXo' frameborder='0' allowfullscreen></iframe></div>
						-->
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 textoConferencia">
						<p>
							Amar sin apegos es amar de manera independiente, sin posesión, sin angustia, sin miedos, siendo uno mismo a cada pulsación y a cada latido, es querer al otro sin dejar de quererse uno mismo, es cuidar al ser amado y cuidar el propio yo, es entender que el amor no se suplica ni se exige y que es una construcción personal que puede gestionarse para convertirse en una experiencia plena y saludable.
						</p>
						<p>
							En esta conferencia Walter Riso descifrará las pautas para amar sin apegos y analizará junto al público los vicios que convierten al amor en un enemigo palpable ante la individualidad de cada ser humano. Mostrará las diferencias entre una relación sana y otra carcomida por los abusos y la codependencia. Será un espacio para reflexionar y reencontrarse con la propia esencia, en ese proceso donde las aspiraciones personales y los ideales de pareja habrán de converger en un estado de salud y bienestar mutuo.
						</p>
						<hr>
						<p class="text-center">
							<b style="font-size: 1.5em">¿Y tu, te atreves a amar sin apegos?</b>
						</p>
						<hr>
						<p style="font-size: 1em;">
							"El Arte de Amar Sin Apegos" es la conferencia magistral más aclamada y laureada del prestigioso psicólogo y escritor Walter Riso, fue presentada en diversos países despertando la ovación y reconocimiento de sus asistentes. Hoy Phronesis quiere ponerla al alcance de todas las personas impartiendo este gran evento a través de Internet, sin limitaciones geográficas y a bajo costo. No te pierdas esta oportunidad única de participar en este evento sin precedentes. Estás a tiempo de inscribirte y obtener tus entradas.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="formularioConferencia">
					<div class="row">
						<div class="col-md-12">
							<h1 class="text-center">¡Inscríbete ahora!<br /><span style="font-size: .8em;">Entradas Limitadas</span></h1>
							<hr>
							<ul class="listaInscripcion">
								<li>La conferencia es en vivo y en directo el sábado 25 de julio de 2015. <a href="#" style="color:blue" onclick="$('#myModalHorarios').modal()">Consulta los horarios de tu país</a>.</li>
								<li>Podrás realizar preguntas</li>
								<li>Podrás ingresar fácilmente desde tu computadora, tablet o teléfono celular</li>
								<li>La duración de la conferencia es de 1 hora y 30 minutos.</li>
								<li>Si por algún motivo no puedes acceder a la conferencia en vivo tendrás 48 horas para ver la grabación.</li>
								<li>Conferencia dictada <b>EN ESPAÑOL.</b></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">
												PRECIO
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
												<span style="text-decoration: line-through">USD $ 15.99</span> <b>HOY USD $ 9.99</b>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<p class="small text-center">Los precios están en dólares americanos. Si utilizas algún mecanismo de pago en efectivo o transferencia bancaria, el sistema realizará el cambio a tu moneda local de acuerdo con la tasa cambiaria del día.</p>
						</div>
					</div>
					<hr>
					<?php if(isset($_SESSION['id'])){ ?>
					<?php
						$n = mysqli_num_rows(mysqli_query($con, "SELECT * FROM inscritos_conferencia WHERE usuario_id = '$_SESSION[id]' AND estado_inscripcion = 1"));
						if( $n > 0 ){
							?>
							<p class="lead text-center">¡Felicitaciones! Ya te ecuentras inscrito(a) a esta conferencia. Te hemos enviado un mensaje de notificación a tu correo, pronto te estaremos informando las instrucciones de acceso al evento.</p>
							
							<!-- Google Code for Venta de Entrada Conversion Page -->
							<script type="text/javascript">
							/* <![CDATA[ */
							var google_conversion_id = 947153368;
							var google_conversion_language = "en";
							var google_conversion_format = "3";
							var google_conversion_color = "ffffff";
							var google_conversion_label = "mIY-CNmO_V0Q2NPRwwM";
							var google_remarketing_only = false;
							/* ]]> */
							</script>
							<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
							</script>
							<noscript>
							<div style="display:inline;">
							<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/947153368/?label=mIY-CNmO_V0Q2NPRwwM&amp;guid=ON&amp;script=0"/>
							</div>
							</noscript>

							<?php
						}else{
							?>
							<form id="inscripcionConferencia">
								<div class="row">
									<div class="col-md-12">
										<p class="lead text-center">Para inscribirte selecciona el medio y el país desde donde realizaras el pago</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control" name="paisConferencia" id="paisConferencia" required >
											<option value="">Selecciona el país ...</option>
											<?php echo selectPaises(); ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control" name="formaDePagoConferencia" id="formaDePagoConferencia" required >
											<option value="">Selecciona el medio de pago ...</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<button class="btn btn-primary btn-lg pull-right">Inscribirme</button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<p>&nbsp;</p>
										<h6 class='text-center'>IMPORTANTE</h6>
										<p>Una vez realices el pago recibirás un email de notificación. Así mismo te estaremos enviando recordatorios e instrucciones para acceder a la conferencia días antes al evento.</p>
									</div>
								</div>
							</form>
							<?php
						}
					}else{ ?>
					<div id="bloque1" class="row">
						<div class="col-md-12">
							<p class="lead text-center">Para inscribirte debes iniciar sesión en tu cuenta de Phronesis</p>
						</div>
					</div>
					<div id="bloque2" class="row">
						<div class="col-md-6">
							<form id="loginInscripcion">
								<div class="row">
									<div class="col-md-12 form-group">
										<input class="form-control" type="email" name="usuario" id="usuario" placeholder="Email" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<input type="hidden" name="consulta" id="consulta" value="login" />
										<input type="hidden" name="url" id="url" value="<?= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
										<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<p>&nbsp;</p>
									<p><a href="/includes/fbconfig.php?url=<?php echo $_SERVER['REQUEST_URI'] ?>" class="btn btn-info" style="width: 100%"><i class='fa fa-facebook'></i> Entrar con Facebook</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="bloque3">
						<hr>
						<div class="col-md-12">
							<p class='text-center'>¿Aún no tienes una cuenta en Phronesis? <button class="btn btn-default" id="btnRegistroInscripcion"><b>¡Regístrate!</b></button></p>
						</div>
					</div>
					<form id="registroInscripcion">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div id="bloque4a" class="row" style="display:none">
									<div class="col-md-12">
										<p class="text-center lead">Registro de Usuarios</p>
									</div>
								</div>
								<div id="bloque4" class="row" style="display:none">
									<div class="col-md-12 form-group">
										<input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
									</div>
									<div class="col-md-12 form-group">
										<input type="password" class="form-control" name="password" id="passwordReg" placeholder="Contraseña" required />
									</div>
									<div class="col-md-12 form-group">
										<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Repetir contraseña" required />
									</div>
								</div>
								<div id="bloque5" class="row" style="display:none">
									<div class="col-md-12 form-group">
										<input type="hidden" name="consulta" id="consulta" value="registro" />
										<button type="button" id="back" class="btn btn-default"><i class="fa fa-step-backward"></i></button>
										<button type="submit" class="btn btn-primary pull-right">Registrarme</button>
									</div>
								</div>		
							</div>
						</div>
					</form>
					<script>
						$('#btnRegistroInscripcion').click(function(){
							$('#bloque1').hide();
							$('#bloque2').hide();
							$('#bloque3').hide();
							$('#bloque4').fadeIn();
							$('#bloque4a').fadeIn();
							$('#bloque5').fadeIn();
						})
						$('#back').click(function(){
							$('#bloque1').fadeIn();
							$('#bloque2').fadeIn();
							$('#bloque3').fadeIn();
							$('#bloque4').hide();
							$('#bloque4a').hide();
							$('#bloque5').hide();
						})
					</script>
					<?php } ?>
				</div>
				
				<div class="row">
					<div class="col-md-5 col-xs-5">
						<center><a href="http://www.payulatam.com/logos/pol.php?l=150&c=556dbd87a2c6b" target="_blank"><img class="img-responsive" src="/images/logo_payu.png" alt="PayU Latam" border="0" /></a><br /></center>
					</div>
					<div class="col-md-3 col-xs-3">
						<center><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img class="img-responsive" src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_secured_by_pp_2line.png" border="0" alt="Secured by PayPal"></a><br /></center>
					</div>
					<div class="col-md-4 col-xs-4">
						<center><img src="/images/verified.png"/><br /></center>
					</div>
				</div>
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<p class="lead text-center">Medios de pago aceptados:</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="/img/pagos1.jpg" class="img-responsive img-rounded" />
			</div>
			<div class="col-md-3">
				<img src="/img/pagos2.jpg" class="img-responsive img-rounded" />
			</div>
			<div class="col-md-3">
				<img src="/img/pagos3.jpg" class="img-responsive img-rounded" />
			</div>
			<div class="col-md-3">
				<img src="/img/pagos4.jpg" class="img-responsive img-rounded" />
			</div>
		</div>
	</div>
</div>

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

<!-- Modal Horarios -->
<div class="modal fade" id="myModalHorarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Horarios "El Arte de Amar sin Apegos"</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<p class="lead text-center">Julio 25 de 2015</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!--<div class="table-responsive">-->
							<table class="table table-striped table-bordered">
								<tr><th>Ciudad</th><th>Hora</th></tr>
								<tr><td>Phoenix, Los Angeles, San Francisco, Las Vegas</td><td>1:00 PM</td></tr>
								<tr><td>Guatemala, Tegucigalpa, San Salvador, San José, Managua</td><td>2:00 PM</td></tr>
								<tr><td>Bogotá, México, Lima, Quito, Panamá, New Orleans</td><td>3:00 PM</td></tr>
								<tr><td>Caracas</td><td>3:30 PM</td></tr>
								<tr><td>San Juan, Asunción, La paz, Miami, New York</td><td>4:00 PM</td></tr>
								<tr><td>Buenos Aires, Sao Paulo, Santiago, Montevideo</td><td>5:00 PM</td></tr>
								<tr><td>Madrid, Barcelona</td><td>10:00 PM</td></tr>
							</table>
						<!--</div>-->
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="lead text-center"><a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Conferencia+Virtual+-+El+Arte+de+Amar+Sin+Apegos&iso=20150725T15&p1=41&ah=1&am=30" target="_blank">Consultar más horarios</a></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
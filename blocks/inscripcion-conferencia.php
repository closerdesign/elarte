<?php 
	if( (isset($_SESSION['id'])) ){
		?>
		<script>
			$(document).ready(function(){
				$('.body').animate({
			        scrollTop: $("#inscripcionConferencia").offset().top
			    	}, 2000);
			});
		</script>
		<?php 
	} ?>
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
						<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/yHwo5EunKXo' frameborder='0' allowfullscreen></iframe></div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">Y tú, ¿te atreves a amar sin apegos?</h3>
						<p>
							Amar sin apegos es amar de manera independiente, sin posesión, sin angustia, siendo uno mismo a cada pulsación y a cada latido. Es querer al otro sin dejar de quererse uno mismo, es cuidar al ser amado y cuidar el propio yo. El amor sano es recíproco y colabora a tu autorrealización en vez de obstaculizarla.
						</p>
						<p>
							Esta conferencia es para que vivas el amor desde una nueva perspectiva, sin necesidades obsesivas y en plena libertad interior. El amor saludable es una construcción personal que puede gestionarse y disfrutarlo.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="formularioConferencia">
					<div class="row">
						<div class="col-md-12">
							<h1 class="text-center">¡Inscríbete ahora!</h1>
							<hr>
							<p>No te pierdas esta oportunidad única de participar en este evento sin precedentes. Estás a tiempo de inscribirte y obtener tus entradas.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">
												PRECIOS
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												Desde Junio 1 y hasta Junio 30 de 2015
											</td>
											<td class="text-center">
												USD 7.99
											</td>
										</tr>
										<tr>
											<td>
												Desde Julio 1 hasta Julio 25 de 2015
											</td>
											<td class="text-center">
												USD 9.99
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php if(isset($_SESSION['id'])){ ?>
					<?php
						$n = mysqli_num_rows(mysqli_query($con, "SELECT * FROM inscritos_conferencia WHERE usuario_id = '$_SESSION[id]' AND estado_inscripcion = 1"));
						if( $n > 0 ){
							?>
							<p class="lead text-center">¡Felicitaciones! Ya te encuentras inscrito(a) en esta conferencia.</p>
							<p class='text-center'><a class="btn btn-primary btn-lg" href="http://www.timeanddate.com/scripts/ics.php?type=utc&p1=41&iso=20150725T15&ah=1&am=30&msg=Conferencia%20Virtual%20-%20El%20Arte%20de%20Amar%20Sin%20Apegos"><i class="fa fa-calendar"></i> Agregar a mi Calendario</a></p>
							<?php
						}else{
							?>
							<form id="inscripcionConferencia">
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control" name="paisConferencia" id="paisConferencia" required >
											<option value="">Selecciona tu país ...</option>
											<?php echo selectPaises(); ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control" name="formaDePagoConferencia" id="formaDePagoConferencia" required >
											<option value="">Selecciona tu medio de pago preferido ...</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<button class="btn btn-primary btn-lg pull-right">Inscribirme</button>
									</div>
								</div>
							</form>
							<?php
						}
					}else{ ?>
					<div id="bloque0" class="row">
						<div class="col-md-12">
							<ul class="listaInscripcion">
								<li>La conferencia es en vivo y en directo</li>
								<li>Podrás realizar preguntas</li>
								<li>Una vez finalizado el evento tendrás acceso ilimitado a una copia del video</li>
								<li>Podrás ingresar fácilmente desde tu computadora, tablet o teléfono celular</li>
								<li>La duración de la conferencia es de 1 hora y 30 minutos. <a target="_blank" href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Conferencia+Virtual+-+El+Arte+de+Amar+Sin+Apegos&iso=20150725T15&p1=41&ah=1&am=30">Consulta el horario de tu país.</a></li>
							</ul>
							<hr>
							<p class="text-center"><button id="bloques" type="button" class="btn btn-primary btn-lg"><i class='fa fa-sign-in'></i> Inscribirme</button></p>
						</div>
					</div>
					<div id="bloque1" class="row" style="display:none">
						<div class="col-md-12">
							<p class="lead text-center">Para inscribirte debes iniciar sesión en tu cuenta de Phronesis</p>
						</div>
					</div>
					<div id="bloque2" class="row" style="display:none">
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
										<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<p>&nbsp;</p>
									<a href="/includes/fbconfig.php?url=<?php echo $_SERVER['REQUEST_URI'] ?>" class="btn btn-info"><i class='fa fa-facebook'></i> Entrar con Facebook</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="bloque3" style="display:none">
						<hr>
						<div class="col-md-12">
							<p class='text-center'>¿Aún no tienes una cuenta en Phronesis? <button class="btn btn-default" id="btnRegistroInscripcion"><b>¡Regístrate!</b></button></p>
						</div>
					</div>
					<form id="registroInscripcion">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
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
										<button type="submit" class="btn btn-primary pull-right">Registrarme</button>
									</div>
								</div>		
							</div>
						</div>
					</form>
					<script>
						$('#bloques').click(function(){
							$('#bloque0').hide();
							$('#bloque1').fadeIn();
							$('#bloque2').fadeIn();
							$('#bloque3').fadeIn();
						})
						$('#btnRegistroInscripcion').click(function(){
							$('#bloque0').hide();
							$('#bloque1').hide();
							$('#bloque2').hide();
							$('#bloque3').hide();
							$('#bloque4').fadeIn();
							$('#bloque5').fadeIn();
						})
					</script>
					<?php } ?>
				</div>
			</div>
			
		</div>
		
	</div>
</div>
<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
//	var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDgsSBXVzZXJzGOKqsw4M');
//	var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
//	'http://my.clickdesk.com/clickdesk-ui/browser/');
//	var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
//	var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
//	glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
//	var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->
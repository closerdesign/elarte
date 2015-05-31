<div class="row top">
	<div class="container contenidoConferencia">
		
		<div class="row">
			<div class="col-md-12">
				<div class="fechaEvento">
					Julio <span>11</span>
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
						<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='http://www.youtube.com/embed/yHwo5EunKXo?autoplay=true' frameborder='0' allowfullscreen></iframe></div>
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
												Desde Junio 1 y hasta Junio 20 de 2015
											</td>
											<td class="text-center">
												USD 7.99
											</td>
										</tr>
										<tr>
											<td>
												Desde Junio 21 hasta Julio 10 de 2015
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
					<?php }else{ ?>
					<div id="bloque0" class="row">
						<div class="col-md-12">
							<ul class="listaInscripcion">
								<li>La conferencia es en vivo y en directo</li>
								<li>Podrás realizar preguntas</li>
								<li>Una vez finalizado el evento tendrás acceso ilimitado a una copia del video</li>
								<li>Podrás ingresar fácilmente desde tu computadora, tablet o teléfono celular</li>
								<li>La duración de la conferencia es de 1 hora y 30 minutos. <a href="#">Consulta el horario de tu país.</a></li>
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
							<form>
								<div class="row">
									<div class="col-md-12 form-group">
										<input class="form-control" type="email" name="email" id="email" placeholder="Email" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<p>&nbsp;</p>
									<button class="btn btn-primary"><i class='fa fa-facebook'></i> Entrar con Facebook</button>
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#bloques').click(function(){
							$('#bloque0').hide();
							$('#bloque1').fadeIn();
							$('#bloque2').fadeIn();
						})
					</script>
					<?php } ?>
				</div>
			</div>
			
		</div>
		
	</div>
</div>
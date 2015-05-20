<div class="row top">
	<div class="container contenidoConferencia">
		
		<div class="row">
			<div class="col-md-12">
				<div class="fechaEvento">
					Julio <span>11</span>
				</div>
				<h1 class="tituloConferencia">
					El <span>arte de amar</span> sin apego por <span>Walter Riso</span><br />
					Conferencia Virtual
				</h1>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='http://www.youtube.com/embed/a_USeV3g0lA?autoplay=true' frameborder='0' allowfullscreen></iframe></div>
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
					<div class="row">
						<div class="col-md-12">
							<button style='width: 100%' type="button" class='muestraLogin btn btn-primary'><i class='fa fa-user'></i> Regístrate o inicia sesión con tu cuenta</button>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			
		</div>
		
	</div>
</div>
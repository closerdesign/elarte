<div id="fb-root"></div>
<div class="container">
	<div class="row u-marginBottom hidden-sm hidden-xs">
		<img src="<?= CURRENT_URL; ?>resources/img/header-home.jpg" class="img-responsive">
	</div>
	<div class="row visible-sm-block visible-xs-block hidden-lg">
		<h2 class="SubTitle text-center" >EL ARTE DE AMAR SIN APEGO</h2>
	</div>
	<div class="row u-marginBottom">
		<div class="col-lg-8">
			<div  class="row">
				<div class="container-fluid u-noPaddingLeft">
					<p class="text-center">
						A continuación encontrarás la grabación de la conferencia virtual "El arte de amar sin apegos" dictada el pasado 25 de Julio por el psicólogo y escritor Walter Riso. Este video estará disponible para las personas que se inscribieron hasta el próximo 1 de Agosto.
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-4 UserName u-fondoMoradoRaro text-center">
			<div class="row UserName-name">
				<?= $user->nombreCompleto; ?>
			</div>
			<div class="row UserName-logOut">
			<?php 
			if ( isset( $_SESSION['loggedId'] ) ) {
			?>
			<a href="<?= CURRENT_URL ?>home/logout" class="UserName-logOut-link">Cerrar sesión</a>	
			<?php 
			}
			?>
			</div>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-lg-8">
			<div class="row">
				<div class="container-fluid u-noPaddingLeft">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/134685966" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<!-- <iframe src='http://streaming.com.co/clientes/phronesis/index.php' name='CeHis Video Player' scrolling='no' frameborder='0'><p>El Servicio no fue encontrado</p></iframe> -->
					</div>
				</div>
			</div>
			
			<hr>
			
			<div class="row">
				<!-- <div class="col-md-12">
					<p class="text-center"><a href="/preguntas" target="_blank" class="btn btn-success">¿Tienes problemas?<br /> Consulta nuestras preguntas frecuentes</a></p>
				</div> -->
				
				<!-- Modal -->
				<div class="modal fade" id="myModalFAQ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Preguntas Frecuentes</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										
										<p class="lead">¿A qué hora debo conectarme para ver la conferencia?</p>
										<p>La conferencia inicia a las 3 PM (Bogotá GMT -5). Si tienes dudas acerca del horario de tu país, por favor haz <a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Conferencia+Virtual+-+El+Arte+de+Amar+Sin+Apegos&iso=20150725T15&p1=41&ah=1&am=30" target="_blank">click aquí.</a></p>
										
										<p>Es importante que te conectes con suficiente tiempo de anticipación para poder validar que todo funcione correctamente.</p>
										
										<hr>
										
										<p class="lead">¿No tengo una contraseña, en donde puedo conseguir una?</p>
										<p>Si no has adquirido tu entrada a la conferencia virtual, podrás adquirirla entrando a la dirección http://www.elartedesabervivir.com/conferencia-virtual. Es importante que lo hagas cuanto antes, porque el ingreso es limitado y las ventas quedarán cerradas a las 12 del día hora de Bogotá, o cuando los cupos hayan terminado, lo que suceda primero.</p>
										
										<hr>
										
										<p class="lead">¿En donde está mi contraseña?</p>
										<p>Es importante que revises en tu buzón de correo electrónico que utilizas para ingresar a Phronesis en donde debe estar un mensaje con tu contraseña de acceso al evento. Si aún no tienes tu contraseña de acceso a la conferencia, debes hacer click en el botón “Solicitar contraseña”, debajo del formulario de acceso.</p>
										
										<hr>
										
										<p class="lead">¿Puedo ver la conferencia desde mi celular o mi tableta?</p>
										<p>Si. Pero es importante que tengas en cuenta que para evitar costos innecesarios, es recomendable que te asegures de estar conectado a una red inalámbrica, porque la transmisión de audio y video pueden consumir una cantidad considerable de tu plan de datos.</p>
										
										<hr>
										
										<p class="lead">¿Si tengo que retirarme cuando esté viendo la conferencia, podré verla luego?</p>
										<p>Si. Después de la emisión de la conferencia, tendrás un lapso de 48 horas para poder visualizar nuevamente el video y repasar todas las enseñanzas del mismo.</p>
										
										<hr>
										
										<p class="lead">¿Qué pasa si no funciona el audio o video?</p>
										<p>Es importante que revises el volumen de tu celular e intentes reiniciar tu equipo en caso de cualquier inconveniente. Es esencial también, que te asegures de que tu conexión a Internet funcione correctamente y que tenga una capacidad de al menos 256 Kb/s. Esto puedes validarlo con el proveedor del servicio de Internet.</p>
										
										<hr>
										
										<p class="lead">¿Puedo ver el video en mi teléfono y mi computadora al tiempo?</p>
										<p>No. Para mejorar tu experiencia y la de los demás usuarios, el acceso a la conferencia es controlado. Por ello, para poder ver la conferencia en otro dispositivo es importante que cerrar la sesión en el anterior. Si quieres ver la conferencia con más personas, solo podrás hacerlo a través del mismo dispositivo.</p>
										
										<hr>
										
										<p class="lead">El video y el audio se detienen constantemente ¿Por qué?</p>
										<p>Debes tener en cuenta que este evento es un evento que se transmite en vivo y en directo. Si sientes que la transmisión se corta continuamente, es importante que verifiques que tu conexión a Internet funciona correctamente.</p>
										
										<p>Puedes intentar disminuir la resolución de la trasmisión para mejorar tu experiencia. Ello lo puedes hacer a través del botón “HD” que está en la parte baja de la ventana de video, en donde podrás disminuirlo a 360p o 240p.</p>
										 
										<p>Te recomendamos también cerrar otros programas que puedan estar haciendo uso de tu conexión de Internet al mismo tiempo que disfrutas de la conferencia.</p>
										
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<hr>
			
			<!-- <div class="row text-justify">
				<div class="container-fluid u-noPaddingLeft">
					<hr class="u-lineaSuave">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<hr class="u-lineaSuave">
				</div>
			</div>
			<div class="row">
				<div class="container-fluid u-noPaddingLeft">
					<h2 class="SubTitle">LOREM IPSUM</h2>
				</div>				
			</div> -->
			<div class="row">
				<div class="container-fluid u-noPaddingLeft">
					<div class="fb-comments" data-href="http://conferencia.elartedesabervivir.com" data-width="100%" data-numposts="5"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 Banners hidden-md hidden-sm hidden-xs">
			<div class="row u-marginBottom"><a target="_blank" href="https://www.elartedesabervivir.com/paquetes/1"><img src="<?= CURRENT_URL ?>resources/img/Banner-300x250-Paquete.jpg" alt=""></a></div>
			<div class="row u-marginBottom"><a target="_blank" href="https://www.elartedesabervivir.com/publicacion/12"><img src="<?= CURRENT_URL ?>resources/img/Banner-300x250-AUDIOLIBRO.jpg" alt=""></a></div>
			<div class="row"><a target="_blank" href="https://www.elartedesabervivir.com/publicacion/2"><img src="<?= CURRENT_URL ?>resources/img/Banner 300x250-13.jpg" alt=""></a></div>
		</div>
	</div>
</div>

<p class="lead text-center"><a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=Conferencia+Virtual+-+El+Arte+de+Amar+Sin+Apegos&iso=20150725T15&p1=41&ah=1&am=30" target="_blank">Consultar más horarios</a></p>




<script type="text/javascript">
	///setInterval(function(){
	///	var d = new Date();
	///	var n = d.getTime();
	///
	///	var data = {
	///		'action' : 'validateConnection',
	///		'time' : n
	///	};
	///
	///	$.ajax({
	///		url: currentUrl + 'home/validateConnection',
	///		type: 'POST',
	///		dataType: 'json',
	///		data: data,
	///	})
	///	.done(function(data) {
	///		if (data.error == 1) {
	///			window.location.replace(currentUrl + "?err=con-user");
	///		}
	///		/*console.log("success");*/
	///	})
	///	.fail(function() {
	///		/*console.log("error");*/
	///	})
	///	.always(function() {
	///		/*console.log("complete");*/
	///	});
	///}, 50000);
	///
	///function updateWCTime() {
	///    var now      = new Date();
	///    now = now.getTime();
	///	var kickoff = new Date('2015-07-25 20:00:00 UTC');
	///    var diff = kickoff - now;
	///
	///    var hours = Math.floor( diff / (1000*60*60) );
	///    var mins  = Math.floor( diff / (1000*60) );
	///    var secs  = Math.floor( diff / 1000 );
	///
	///    var hh = hours;
	///    var mm = mins  - hours * 60;
	///    var ss = secs  - mins  * 60;
	///
     ///   document.getElementById("hours").innerHTML = hh;
	///
     ///   document.getElementById("minutes").innerHTML = mm;
	///
     ///   document.getElementById("seconds").innerHTML = ss;
	///}
	///setInterval(updateWCTime, 1000 );

	
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.4";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
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
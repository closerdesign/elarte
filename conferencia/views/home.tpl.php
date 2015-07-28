<div class="container">
	<div class="row u-marginBottom hidden-sm hidden-xs">
		<img src="<?= CURRENT_URL; ?>resources/img/header-home.jpg" class="img-responsive">
	</div>
	<div class="row visible-sm-block visible-xs-block hidden-lg">
		<h2 class="SubTitle text-center" >EL ARTE DE AMAR SIN APEGOS</h2>
	</div>
	<div class="row MainLogin">
		<div class="col-lg-8 center-block Form-container <?= ( isset($mensaje) ? 'Form-container--error' : '');  ?>">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center u-warningMessage">
								<?= ( isset($mensaje) ? $mensaje : '');  ?>
							</p>
							<h2 class="formTitle">
								Ingreso de usuarios
							</h2>
							<form action="<?= CURRENT_URL ?>home/login" method="POST" class="FormElement">
								<div class="form-group">
									<label class="label" for="email">Nombre de usuario</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
								</div>
								<div class="form-group">
									<label class="label" for="contrasena">Contraseña</label>
									<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
								</div>
								<div class="form-group">
									<hr class="u-lineaSuave">
									<button type="submit" class="btn btn-default">Entrar</button>
									<hr class="u-lineaSuave">
								</div>
							</form>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 center-block Recovery text-center">
							<hr class="u-lineaSuave">
							<a href="<?= CURRENT_URL ?>home/acceso" class="btn btn-default">
								¿Aún no tienes tu contraseña? Haz click aquí
							</a>
							<hr class="u-lineaSuave">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<p class="text-center"><a href="/preguntas" target="_blank" class="btn btn-success">¿Tienes problemas?<br /> Consulta nuestras preguntas frecuentes</a></p>
						</div>
					</div>		
				</div>
				<div class="col-md-6 well">
					<p>&nbsp;</p>
					<h1 class="text-center">¡Importante!</h1>
					<p class="text-center">Queremos informarte que hemos ampliado el tiempo de visualización de la conferencia hasta el próximo:</p>
					<p class="lead text-center">Sábado 1 de Agosto de 2015</p>
					<p>&nbsp;</p>
				</div>
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
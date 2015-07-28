<div class="container">
	<div class="row u-marginBottom hidden-sm hidden-xs">
		<img src="<?= CURRENT_URL; ?>resources/img/header-home.jpg" class="img-responsive">
	</div>
	<div class="row visible-sm-block visible-xs-block hidden-lg">
		<h2 class="SubTitle text-center" >EL ARTE DE AMAR SIN APEGO</h2>
	</div>
	<div class="row MainLogin">
		<div class="col-lg-4 center-block Form-container <?= ( isset($mensaje) ? 'Form-container--error' : '');  ?>">
			<p class="text-center u-warningMessage">
				<?= ( isset($mensaje) ? $mensaje : '');  ?>
			</p>
			<h2 class="formTitle">
				Ingrese su correo
			</h2>
			<p>
				En breve recibirá un correo con sus datos de acceso
			</p>
			<form action="<?= CURRENT_URL ?>home/getPassword" method="POST" class="FormElement">
				<div class="form-group">
					<label class="label" for="email">Correo</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<hr class="u-lineaSuave">
					<button type="submit" class="btn btn-default">Entrar</button>
					<hr class="u-lineaSuave">
				</div>
			</form>
		</div>
	</div>
</div>
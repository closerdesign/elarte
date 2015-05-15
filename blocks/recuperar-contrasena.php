<div class="row top">
	<div class="container">
		<?php if((isset($_REQUEST['val']))&&(isset($_REQUEST['token']))){
			?>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<form name="nueva-contrasena" id="nueva-contrasena">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<label>Ingrese una nueva contraseña</label>
								<input type="password" class="form-control" name="new_password" id="new_password" required />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<label>Confirme su contraseña</label>
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<button type="submit" class="btn btn-primary">Guardar cambios</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<form name="recuperar-contrasena" id="recuperar-contrasena">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<label>Por favor ingrese su dirección de correo electrónico</label>
								<input type="email" name="email-recupera" id="email-recupera" class="form-control" required />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<button type="submit" class="btn btn-primary">Recuperar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
		} ?>
	</div>
</div>
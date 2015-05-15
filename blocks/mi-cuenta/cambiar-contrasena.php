<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<form name="cambiar-contrasena" id="cambiar-contrasena">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h3>Cambiar contraseña</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Contraseña anterior</label>
							<input type="password" class="form-control" name="current_password" id="current_password" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Contraseña nueva</label>
							<input type="password" class="form-control" name="new_password" id="new_password" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Confirmar contraseña</label>
							<input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['id'] ?>" />
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<?php require_once('blocks/mi-cuenta/sidebar.php'); ?>
	</div>
</div>
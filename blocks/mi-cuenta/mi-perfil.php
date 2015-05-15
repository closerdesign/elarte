<?php $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."'")); ?>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3>Mi perfil</h3>
			</div>
		</div>
		<hr>
		<form name="mi-perfil" id="mi-perfil">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Nombre</label>
					<input 
						type="text" 
						class="form-control" 
						usuario="<?php echo $_SESSION['id'] ?>" 
						name="nombre" id="nombre" 
						value="<?php echo $data['nombre'] ?>" 
						required />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Apellido</label>
					<input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $data['apellido'] ?>" required />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email'] ?>" readonly />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Ciudad</label>
					<input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $data['ciudad'] ?>" required />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>País</label>
					<select class="form-control" name="pais" id="pais">
						<option value="">Seleccione...</option>
						<?php echo selectPaisesSelect($data['pais']); ?>
					</select>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Género</label>
					<select class="form-control" name="genero" id="genero" required >
						<option value="">Seleccione...</option>
						<option <?php if($data['genero']=='Mujer'){echo('selected');} ?> value="Mujer">Mujer</option>
						<option <?php if($data['genero']=='Hombre'){echo('selected');} ?> value="Hombre">Hombre</option>
					</select>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 form-group">
					<label>Envío de notificaciones</label>
					<?php $optin = $data['optin'] == 1 ? "Activado" : "Desactivado" ?>
					<?php $option = $data['optin'] != 1 ? "Activar" : "Desactivar" ?>
					<input type="text" class="form-control" name="optin" id="optin" value="<?php echo $optin ?>" readonly />
					<label class="text-right"><a id="optin-toggle" href="#"><?php echo $option ?></a></label>
				</div>
				<div class="col-md-12 form-group">
					<input type="hidden" name="consulta" id="consulta" value="actualizaPerfil" />
					<button type="submit" class="btn btn-primary">Actualizar</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<?php require_once('blocks/mi-cuenta/sidebar.php'); ?>
	</div>
</div>
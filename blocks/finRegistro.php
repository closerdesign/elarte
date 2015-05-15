<div class="finRegistro">
	<div class="finRegistroContainer">
		<form name="formFinalizaRegistro" id="formFinalizaRegistro" >
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h4>¡Registro exitoso!</h4>
					<p>Por favor completa los datos a continuación para finalizar tu registro:</p>
				</div>
			</div>
			<?php
				$sql="SELECT * FROM usuarios WHERE id = '$_SESSION[id]'";
				$q=mysqli_query($con, $sql);
				$data=mysqli_fetch_array($q);
			?>
			<div class="row" <?php if($data['email']!=""){echo('style="display:none"');} ?> >
				<div class="col-lg-12 col-md-12 col-sm-12 form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="frEmail" id="frEmail" value="<?php echo $data['email'] ?>" required />
				</div>
			</div>
			<div class="row" <?php if($data['nombre']!=""){echo('style="display:none"');} ?> >
				<div class="col-md-12 form-group">
					<label>Nombre</label>
					<input type="text" class="form-control" name="frNombre" id="frNombre" value="<?php echo $data['nombre'] ?>" required />
				</div>
			</div>
			<div class="row" <?php if($data['apellido']!=""){echo('style="display:none"');} ?> >
				<div class="col-md-12 form-group">
					<label>Apellido</label>
					<input type="text" class="form-control" name="frApellido" id="frApellido" value="<?php echo $data['apellido'] ?>" required />
				</div>
			</div>
			<div class="row" <?php if($data['ciudad']!=""){echo('style="display:none"');} ?>>
				<div class="col-lg-12 col-md-12 col-sm-12 form-group">
					<label>Ciudad</label>
					<input type="text" class="form-control" name="frCiudad" id="frCiudad" required />
				</div>
			</div>
			<div class="row" <?php if($data['pais']!=""){echo('style="display:none"');} ?>>
				<div class="col-lg-12 col-md-12 col-sm-12 form-group">
					<label>País</label>
					<select class="form-control" name="frPais" id="frPais" required>
						<option value="">Seleccione...</option>
						<?php echo selectPaises(); ?>
					</select>
				</div>
			</div>
			<div class="row" <?php if($data['genero']!=""){echo('style="display:none"');} ?>>
				<div class="col-lg-12 col-md-12 col-sm-12 form-group">
					<label>Género</label>
					<select class="form-control" name="frGenero" id="frGenero" required >
						<option value="">Seleccione...</option>
						<option value="Mujer">Mujer</option>
						<option value="Hombre">Hombre</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 form-group">
					<input type="hidden" name="consulta" id="consulta" value="finRegistro" />
					<button class="btn btn-primary" type="submit">Finalizar</button>
				</div>
			</div>
		</form>
	</div>
</div>
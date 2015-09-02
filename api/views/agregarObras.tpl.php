<section class="Section">
	<div class="Section-container">

		<div class="Obras u-containerStyle">
			<div class="Obras-list">
				<div class="Obras-item">
					<div class="Obras-container" style="display:block;">
						<form action="<?= URL_API ?>obras/agregar" method="POST" enctype="multipart/form-data" class="obrasForm">
							<div class="Obras-row">
								<div class="Obras-label">
									Título:
								</div>
								<div class="Obras-input">
									<input name="titulo" type="text" class="u-inputTextWhite" value="" required>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Imagen:
								</div>
								<div class="Obras-input">
									<input name="imagen" type="file" value="" required>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Contenido:
								</div>
								<div class="Obras-input">
									<textarea class="contenido" name="contenido" id="" cols="30" rows="10" required></textarea>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Categoría:
								</div>
								<div class="Obras-input">
									<select name="categoria[]" class="categoria" multiple="multiple" required>
										<?php
											$cat_array = explode( ',', $articulo['categoria'] );
										?>
										<?php foreach ($categorias_art as $key2 => $catart): ?>
										<option value="<?= $catart['id'] ?>"><?= $catart['nombre'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Programas Especiales:
								</div>
								<div class="Obras-input">
									<select name="programas_especiales" class="categoria" required>
										<option value="">
											--Seleccione una categoría--
										</option>
										
										<?php foreach ($program_esp as $key3 => $prog): ?>
										<option value="<?= $prog['id_programa'] ?>">
											<?= $prog['titulo'] ?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Estado:
								</div>
								<div class="Obras-input">
									<label for="artStatusActive<?= $articulo['id'] ?>">Activo
										<input type = "radio"
							                 name = "status"
							                 id = "artStatusActive<?= $articulo['id'] ?>"
							                 value = "1"
							                 required
						                 />
									</label>
									<label for="artStatusInActive<?= $articulo['id'] ?>">Inactivo
										<input type = "radio"
							                 name = "status"
							                 id = "artStatusInActive<?= $articulo['id'] ?>"
							                 value = "0"
							                 required
						                 />
							                 
									</label>
								</div>

							</div>
							<div class="Obras-row">
								<div class="Obras-label"></div>
								<div class="Obras-input u-alignRight">
									<input type="hidden" value="" name="id">
									<button type="submit" class="u-button">Actualizar</button>
								</div>
							</div>
						</form>
					</div>
				</div>		
			</div>
		</div>
	</div>
</section>
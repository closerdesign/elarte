<section class="Section">
	<div class="Section-container">
		<div class="Search">
			<form action="<?= URL_API ?>obras/find" class="Search-form" method="POST">
				<label for="titulo">Buscar por título:</label>
				<input type="text" name="titulo"  class="u-inputText">
				<button type="submit" class="u-button">Buscar</button>
			</form>
			<?php if ( !is_null($mensaje) ): ?>
				<h3><?= $mensaje ?></h3>
			<?php endif ?>
			<h3></h3>
		</div>
		<?php if ( !isset($item) ): ?>
		<nav class="Pagination u-containerStyle">
			<ul class="Pagination-container">

				<?php if ( $current_page > 1 ): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $current_page-1 ?>" class="Pagination-link">
						Atrás
					</a>
				</li>
				<?php endif ?>

				<?php for ($i=1; $i < $pages ; $i++): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $i ?>" class="Pagination-link <?= ( $current_page == $i ? 'Pagination-linkCurrent' : '' ) ?>">
						<?= $i ?>
					</a>
				</li>
				<?php endfor ?>

				<?php if ( $current_page != $pages ): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $current_page+1 ?>" class="Pagination-link">
						Siguiente
					</a>
				</li>
				<?php endif ?>

			</ul>
		</nav>
		<?php endif ?>
		<div class="Obras u-containerStyle">
			<div class="Obras-list">
				<?php if ( !empty( $articulos ) ): ?>
					<?php foreach ($articulos as $key => $articulo): ?>
						<div class="Obras-item">
							<div class="Obras-header">
								<div class="Obras-headerId"><?= $articulo['id'] ?></div>
								<div class="Obras-headerTitulo"><?= $articulo['titulo'] ?></div>
								<div class="Obras-headerArrow u-arrowDown"></div>
							</div>
							<div class="Obras-container">
								<form action="<?= URL_API ?>obras/guardar" method="POST" >
									<div class="Obras-row">
										<div class="Obras-label">
											Título:
										</div>
										<div class="Obras-input">
											<input name="titulo" type="text" class="u-inputTextWhite" value="<?= $articulo['titulo'] ?>">
										</div>
									</div>
									<div class="Obras-row">
										<div class="Obras-label">
											Imagen:
										</div>
										<div class="Obras-input">
											<input name="imagen" type="file" value="<?= $articulo['imagen'] ?>">
										</div>
									</div>
									<div class="Obras-row">
										<div class="Obras-label">
											Contenido:
										</div>
										<div class="Obras-input">
											<textarea class="contenido" name="contenido" id="" cols="30" rows="10"><?= $articulo['contenido'] ?></textarea>
										</div>
									</div>
									<div class="Obras-row">
										<div class="Obras-label">
											Categoría:
										</div>
										<div class="Obras-input">
											<select name="categoria[]" class="categoria" multiple="multiple">
												<?php
													$cat_array = explode( ',', $articulo['categoria'] );
												?>
												<?php foreach ($categorias_art as $key2 => $catart): ?>
												<option value="<?= $catart['id'] ?>" <?= ( in_array($catart['id'], $cat_array) ? 'selected="selected"' : '' ) ?>><?= $catart['nombre'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="Obras-row">
										<div class="Obras-label">
											Programas Especiales:
										</div>
										<div class="Obras-input">
											<select name="programas_especiales" class="categoria">
												<option value=""> --Seleccione una categoría--</option>
												<?php foreach ($program_esp as $key3 => $prog): ?>
												<option value="<?= $prog['id_programa'] ?>" <?= ( $prog['id_programa'] == $articulo['programas_especiales'] ? 'selected="selected' : '' ) ?>><?= $prog['titulo'] ?></option>
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
									                 <?= ( $articulo['status'] == 1 ? 'checked = "checked"' : '' ) ?> 
								                 />
											</label>
											<label for="artStatusInActive<?= $articulo['id'] ?>">Inactivo
												<input type = "radio"
									                 name = "status"
									                 id = "artStatusInActive<?= $articulo['id'] ?>"
									                 value = "0"
									                 <?= ( $articulo['status'] == 0 ? 'checked = "checked"' : '' ) ?>
								                 />
									                 
											</label>
										</div>

									</div>
									<div class="Obras-row">
										<div class="Obras-label"></div>
										<div class="Obras-input u-alignRight">
											<input type="hidden" value="<?= $articulo['id'] ?>" name="id">
											<button type="submit" class="u-button">Actualizar</button>
										</div>
									</div>
								</form>
							</div>
						</div>						
					<?php endforeach ?>
				<?php endif ?>
				<!-- <div class="Obras-item">
					<div class="Obras-header">
						<div class="Obras-headerId">1</div>
						<div class="Obras-headerTitulo">Prueba</div>
						<div class="Obras-headerArrow u-arrowDown"></div>
					</div>
					<div class="Obras-container">
						<form action="">
							<div class="Obras-row">
								<div class="Obras-label">
									Título:
								</div>
								<div class="Obras-input">
									<input type="text" class="u-inputTextWhite">
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Imagen:
								</div>
								<div class="Obras-input">
									<input type="file">
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Contenido:
								</div>
								<div class="Obras-input">
									<textarea class="contenido" name="contenido" id="" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Categoría:
								</div>
								<div class="Obras-input">
									<select name="categoria" class="categoria">
										<option value=""> --Seleccione una categoría--</option>
										<option value="categoria1">categoria1</option>
										<option value="categoria2">categoria2</option>
										<option value="categoria3">categoria3</option>
										<option value="categoria4">categoria4</option>
										<option value="categoria5">categoria5</option>
									</select>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Programas Especiales:
								</div>
								<div class="Obras-input">
									<select name="categoria" class="categoria">
										<option value=""> --Seleccione una categoría--</option>
										<option value="categoria1">categoria1</option>
										<option value="categoria2">categoria2</option>
										<option value="categoria3">categoria3</option>
										<option value="categoria4">categoria4</option>
										<option value="categoria5">categoria5</option>
									</select>
								</div>
							</div>
							<div class="Obras-row">
								<div class="Obras-label">
									Estado:
								</div>
								<div class="Obras-input">
									<label for="sizeSmall">Activo
										<input type = "radio"
							                 name = "radSize"
							                 id = "sizeSmall"
							                 value = "small"
							                 checked = "checked" />
									</label>
									<label for="sizeLarge">Desactivo
										<input type = "radio"
							                 name = "radSize"
							                 id = "sizeLarge"
							                 value = "small"/>
									</label>
								</div>

							</div>
							<div class="Obras-row">
								<div class="Obras-label"></div>
								<div class="Obras-input u-alignRight">
									<button class="u-button">Actualizar</button>
								</div>
							</div>
						</form>
					</div>
				</div> -->
			</div>
		</div>
		<?php if ( !isset($item) ): ?>
		<nav class="Pagination u-containerStyle">
			<ul class="Pagination-container">

				<?php if ( $current_page > 1 ): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $current_page-1 ?>" class="Pagination-link">Atras</a>
				</li>
				<?php endif ?>

				<?php for ($i=1; $i < $pages ; $i++): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $i ?>" class="Pagination-link <?= ( $current_page == $i ? 'Pagination-linkCurrent' : '' ) ?>"><?= $i ?></a>
				</li>
				<?php endfor ?>

				<?php if ( $current_page != $pages ): ?>
				<li class="Pagination-item">
					<a href="<?= URL_API ?>obras/page/<?= $current_page+1 ?>" class="Pagination-link">Siguiente</a>
				</li>
				<?php endif ?>

			</ul>
		</nav>
		<?php endif ?>
	</div>
</section>
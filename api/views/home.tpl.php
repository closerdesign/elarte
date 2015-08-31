<section class="Home">
	<div class="Home-container">
		<h4 class="Home-title"><?= $titulo ?></h4>
		<div class="Home-formContainer">
			<form method="POST">
				<div class="u-row">
					<label for="user">
						Usuario
					</label>
					<input type="text" name="user">
				</div>
				<div class="u-row">
					<label for="pass">
						Contraseña
					</label>
					<input type="password" name="pass">
				</div>
				<div class="u-row">
					<?php if ( !empty( $error ) ): ?>
					<p>
						<?= $error ?>
					</p>
					<?php endif ?>
				</div>
				<div class="u-row">
					<button type="submit">
						Acceder
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
<div class="container">
	<div class="row">
		<h2 class="text-center"><?= $titulo; ?>	</h2>
	</div>
	<div class="row">
		<p>
			<?= $mensaje; ?>
		</p>
	</div>
	<div class="row">
		<form action="<?= CURRENT_URL ?>inscritos/getInscritos/" method="POST">
			<button type="submit" id="importarInscritos">Importar</button>
		</form>
	</div>
	<div class="row">
	<?php
	if ( isset($importados) ) {
	?>
		<table class="table">
			<thead>
				<th>id</th>
				<th>Nombre completo</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>fbId</th>
				<th>Password</th>
			</thead>
			<tbody>
	<?php
		foreach ($importados as $key => $importado) {
	?>
			<tr>
				<td><?= $importado['id']; ?></td>
				<td><?= $importado['nombreCompleto']; ?></td>
				<td><?= $importado['nombre']; ?></td>
				<td><?= $importado['apellido']; ?></td>
				<td><?= $importado['email']; ?></td>
				<td><?= $importado['fbId']; ?></td>
				<td><?= $importado['password']; ?></td>
			</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
	?>
	</div>
</div>
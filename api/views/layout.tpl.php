<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="<?= URL_CSS ?>styles.css">
    <?php if ( $template === "obras" || $template === "agregarObras" ): ?>
    	<link rel="stylesheet" href="<?= URL_CSS ?>foundation-datepicker.min.css">
    <?php endif ?>
</head>

<body>

	<header class="Header">
		<div class="Header-container">
			<h1 class="Header-title">
				<a href="<?= URL_API ?>">
					<img src="<?= URL_IMG ?>logoinv.png" alt="Phrónesis" class="Header-titleImg">
				</a>
			</h1>
		<?php if ( User::isLogged() ): ?>
			<a href="<?= URL_API ?>home/logOut/">Salir</a>
		<?php endif ?>
		</div>
		<?php if ( User::isLogged() ): ?>
		<div class="Header-container">
			<nav>
				<ul>
					<li>
						<a href="<?= URL_API ?>">
							Inicio
						</a>
					</li>
					<li>
						<a href="<?= URL_API ?>obras">
							Obras
						</a>
						<ul>
							<li>
								<a href="<?= URL_API ?>obras/agregarObras">
									Agregar Obra
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		<?php endif ?>
	</header>

	<?= $tpl_content; ?>

	<footer class="Footer">
		<p class="Footer-copy">Copyright, Phronesis</p>
	</footer>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		<?= ( isset($mainUrl) ? "var mainUrl = '$mainUrl';" : "" );  ?>
		<?= "var currentUrl = '".URL_API."';" ?>
	</script>
	<?php if ( $template === "obras" || $template === "agregarObras" ): ?>
		<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>
		<script type="text/javascript" src="<?= URL_JS ?>jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?= URL_JS ?>foundation-datepicker.min.js"></script>
		<script type="text/javascript" src="<?= URL_JS ?>obras.js"></script>
	<?php endif ?>
	<script type="text/javascript" src="<?= URL_JS ?>script.js"></script>
</body>
</html>
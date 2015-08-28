<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" href="<?= URL_CSS ?>styles.css">
</head>

<body>

	<header class="Header">
		<div class="Header-container">
			<h1 class="Header-title">
				<a href="<?= URL_API ?>">
					<img src="<?= URL_IMG ?>logoinv.png" alt="Phrónesis" class="Header-titleImg">
				</a>
			</h1>
		</div>
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
	<?php if ( $template === "obras" ): ?>
		<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>
		<script type="text/javascript" src="<?= URL_JS ?>obras.js"></script>
	<?php endif ?>
	<script type="text/javascript" src="<?= URL_JS ?>script.js"></script>
</body>
</html>
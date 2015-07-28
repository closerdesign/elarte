<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Conferencia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?= CURRENT_URL ?>resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= CURRENT_URL ?>resources/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?= CURRENT_URL ?>resources/css/icofonts.css">

	<link rel="apple-touch-icon" sizes="57x57" href="<?= CURRENT_URL ?>resources/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= CURRENT_URL ?>resources/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= CURRENT_URL ?>resources/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= CURRENT_URL ?>resources/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= CURRENT_URL ?>resources/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= CURRENT_URL ?>resources/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= CURRENT_URL ?>resources/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= CURRENT_URL ?>resources/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= CURRENT_URL ?>resources/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= CURRENT_URL ?>resources/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= CURRENT_URL ?>resources/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= CURRENT_URL ?>resources/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= CURRENT_URL ?>resources/icon/favicon-16x16.png">
	<link rel="manifest" href="<?= CURRENT_URL ?>resources/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= CURRENT_URL ?>resources/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
	<header class="Header">
		<nav class="Menu navbar navbar-default navbar-fixed-top u-fondoAmarillo">
			<div class="Menu-container container-fluid">
				<div class="navbar-header hidden-md hidden-ms hidden-xs">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".menuPrincipal">
					<span>Menú principal <i class="fa fa-align-justify"></i></span>
					</button>
				</div>
				<div class="navbar-collapse menuPrincipal collapse">
					<ul class="Menu-subContainer nav navbar-nav">
						<li class="Menu-item">
							<a href="" class="Menu-link u-textoMorado">
								<i class="Menu-icono"></i>
								Iniciar sesión
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<figure class="Logo">
						<h1 class="u-noMargin">
							<a href="<?= CURRENT_URL ?>">
								<img class="img-responsive img-rounded" src="<?= CURRENT_URL ?>resources/img/logo.png" alt="Phronesis, el arte de saber vivir">
							</a>
						</h1>
					</figure>
				</div>
			</div>
		</div>
	</header>

	<?= $tpl_content; ?>

	<footer>
		<div class="navbar navbar-default navbar-fixed-bottom u-fondoMorado">
			<div class="container-fluid text-center">
				<div class="TextoFooter"><strong>Visítanos en <a href="http://www.elartedesabervivir.com">www.elartedesabervivir.com</a></strong></div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="<?= CURRENT_URL ?>resources/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?= CURRENT_URL ?>resources/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		<?= ( isset($mainUrl) ? "var mainUrl = '$mainUrl';" : "" );  ?>
		<?= "var currentUrl = '".CURRENT_URL."';" ?>
	</script>
	<script type="text/javascript" src="<?= CURRENT_URL ?>resources/js/script.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
  ga('create', 'UA-46120323-1', 'auto');
  ga('send', 'pageview');
 </script>
</body>
</html>
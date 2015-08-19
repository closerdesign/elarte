<head>
	
	<?php
		$title="Phronesis - El Arte de Saber Vivir";
		$description="Somos una Editorial que promueve 'el arte de saber vivir' por medio de publicaciones en formato electrónico. Todos nuestros productos sólo se publican en formato digital y se entregan a través de Internet.";
		if( isset($_REQUEST['content']) && ($_REQUEST['content']=='articulos') && isset($_REQUEST['id']) ){
			$title = getTituloArticulo($_REQUEST['id']);
			$description = getDescripcionArticulo($_REQUEST['id']);
			$img = getUrlImagenArticulo($_REQUEST['id']);
		}elseif(
			isset($_REQUEST['content']) &&
			(
				$_REQUEST['content'] == 'paquetes' ||
				$_REQUEST['content'] == 'colecciones' ||
				$_REQUEST['content'] == 'coleccion' ||
				$_REQUEST['content'] == 'promocion'
			)
		){
			$title = getDataPaquete($_REQUEST['id'])['nombre'];
			$description = strip_tags(getDataPaquete($_REQUEST['id'])['descripcion']);
		}
	?>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta property="og:image" content="<?php echo $img; ?>"/>
	<meta property="og:title" content="<?php echo $title; ?>"/>
	<meta property="og:description" content="<?php echo $description; ?>"/>
	<meta name="description" content="<?php echo $description; ?>">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/jquery.bxslider.css" />
	<link rel="stylesheet" href="/css/fws2.css" />
	<link rel="stylesheet" href="/css/rotating-card.css" />
	<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	
	<link rel="apple-touch-icon" sizes="57x57" href="../images/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../images/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../images/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../images/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../images/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../images/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../images/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../images/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../images/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/icon/favicon-16x16.png">
	<link rel="manifest" href="../images/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


	<!-- Phronesis Theme -->
	<link rel="stylesheet" href="/css/phronesis.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- jQuery validate -->
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
	<!-- jQuery UI -->
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<!-- jQuery Cookie -->
	<script src="/js/jquery.cookie.js"></script>
	<!-- jQuery Session -->
	<script src="/js/jquery.session.js"></script>
	<!-- jQuery bootbox -->
	<script src="/js/bootbox.js"></script>
	<!-- Scroll Reveal -->
	<script src="/js/scrollReveal.js"></script>
	<!-- Libraries -->
	<script src="/js/libraries.js"></script>
	<!-- BX Slider -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- Width Gallery -->
	<script src="/js/fws2.js"></script>
	<script src="/js/imagesloaded.js"></script>
	<script src="/js/jquery.easing.js"></script>
	
	<!-- Audio Player Circle -->
	<script type="text/javascript" src="/js/jquery.transform2d.js"></script>
	<script type="text/javascript" src="/js/jquery.grab.js"></script>
	<script type="text/javascript" src="/js/jquery.jplayer.js"></script>
	<script type="text/javascript" src="/js/mod.csstransforms.min.js"></script>
	<!--<script type="text/javascript" src="/js/circle.player.js"></script>-->
	
</head>
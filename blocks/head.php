<head>
	
	<?php
		$title="Phronesis - El Arte de Saber Vivir";
		$description="Somos una Editorial que promueve 'el arte de saber vivir' por medio de publicaciones en formato electrónico. Todos nuestros productos sólo se publican en formato digital y se entregan a través de Internet.";
		if( ($_REQUEST['content']=='articulos') && isset($_REQUEST['id']) ){
			$title=getTituloArticulo($_REQUEST['id']);
			$description=getDescripcionArticulo($_REQUEST['id']);
		}
	?>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta property="og:title" content="<?php echo $title; ?>"/>
	<meta name="description" content="<?php echo $description; ?>">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/jquery.bxslider.css" />
	<link rel="stylesheet" href="/css/fws2.css" />
	<link rel="stylesheet" href="/css/rotating-card.css" />
	<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
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
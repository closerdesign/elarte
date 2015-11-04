<script type="text/javascript">
	
	$(document).ready(function(){
		labelProductos();
	})	
	
	// Actualizar # de productos en el label
	function labelProductos(){
		$.post('/includes/php.php',{
			consulta: "publicacionesPedido"
		}).done(function(data){
			if(data!=0){
				$('#noProductos').html(data);
				$('#noProductos').fadeIn();
				$('.carrito').fadeIn();
			}
		})
	}
	
	// Botón descargar
	$('.btnDescargar').click(function(){
		var publicacion = $(this).attr('value');
		$('.load').fadeIn();
		$.ajax({
		   type: "post",
		   url: "/includes/php.php",
		   dataType: "json",
		   data: {
		   	consulta: "descarga",
		   	publicacion: publicacion,
		   	usuario: <?php echo $_SESSION['id'] ?>
		   }
		}).done(function(msg){
		   if(msg[0]!=1){
			   alert('Lo sentimos, se ha presentado un problema procesando su solicitud. Por favor intente de nuevo.');
			   $('.load').fadeOut();
		   } else {
			   $('#myModalVacioTitulo').html('Descarga de Publicaciones');
			   $('#myModalVacioContenido').html('<p class="text-center">Hemos enviado la publicación a tu buzón de correo electrónico.</p><p class="lead text-center">Para descargar el archivo por favor<br /><a target="_blank" href="/admin/_lib/file/docdescargables/' + msg[1] + '" class="btn btn-primary">Haz click aquí</a></p>');
			   $('.load').fadeOut();
			   $('#myModalVacio').modal('show');
		   }
		})
	})
	
	// Botón agregar
	$('.btnAgregar').click(function(){
		$('.load').fadeIn();
		var publicacion = $(this).attr('value');
		var pedido = parseInt( $.cookie('pedido') );

		console.log(pedido);
		$.post('/includes/php.php',{
			consulta: "agregar",
			publicacion: publicacion,
			usuario: <?php echo $_SESSION['id'] ?>,
			pedido: pedido
		}).done(function(msg){
			if(pedido==""||pedido==undefined){
				document.cookie="pedido="+msg+";path=/";
			   /*$.cookie("pedido",msg);*/
			}
			if(msg==0){
			   $('.load').fadeOut();
			   bootbox.alert("Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.", function() {console.log("Alert Callback");})
			}else{
				$.post('/includes/php.php',{
					consulta: "detallePedido",
					pedido: msg
				}).done(function(det){
					$('#detalles-pedido').html(det);
					$('.load').fadeOut();
					$('#myModalPedido').modal('show');
					labelProductos();	
				})
			}
		})
	})
	
	// Borrar publicación del pedido
	$('.delPub').click(function(){
		$('.load').fadeIn();
		$.post('/includes/php.php',{
			consulta: 'delPub',
			pedido: $.cookie('pedido'),
			publicacion: $(this).attr('value')
		}).done(function(msg){
			window.location.href = 'index.php?content=mi-cuenta&task=mi-pedido';
		})
	})
	
	// Botón de pago
	$('.btnPagar').click(function(){
		$('.load').fadeIn();
		$.post('/includes/php.php',{
		   consulta: 'cierra-pedido',
		   pedido: $(this).attr('value'),
		   valor: $('#vrPedido').attr('value'),
		   status: 1,
		   usuario: <?php echo $_SESSION['id'] ?>
		}).done(function(msg){
			$.removeCookie('pedido');
			$('.load').fadeOut();
			bootbox.alert(msg, function() {console.log("Alert Callback");})
			window.location.href="index.php?content=mi-cuenta&task=mis-publicaciones";
		})
	})
	
	// BOTÓN DE PAYPAL PARA EL PAGO DE PAQUETES
	$('#btnPaypalPaquetes').click(function(){
		$('#myModalPagoPaquetes').modal('hide');
		$('.load').fadeIn();
		var data = {
			consulta: "crearOrdenPaquete",
			codigoPaquete: $(this).attr('codigoPaquete'),
			formaDePago: $(this).attr('formaDePago')
		};
		$.ajax({
			url: '/includes/php.php',
			type: 'POST',
			dataType: 'json',
			data: data,
			context: this
		})
		.done(function(data) {
			window.location.href = "/includes/php.php?consulta=pagarConPaypal&codigoPaquete="+$(this).attr('codigoPaquete')+"&orden=" + data + "&urlCancela=<?php echo getUrlActual(); ?>";
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	
</script>
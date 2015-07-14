// Scroll Reveal
var config = {
	vFactor:  0.10,
};
window.sr = new scrollReveal( config );

// Descargar el cargador
$(document).ready(function(){

	$('.load').fadeOut('slow');
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeYear: true, yearRange : '-100:+0'
	});
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
    });
    $('#nombreTarjeta').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
    });

});

// Funciones
	// Cargar cargador
	function cargar(){
		$('.load').fadeIn();
	}
	// Descargar cargados
	function descargar(){
		$('.load').fadeOut();
	}
	// Generar modal
	function modal(titulo,contenido){
		descargar();
		$('#myModalVacioTitulo').html(titulo);
		$('#myModalVacioContenido').html(contenido);
		$('#myModalVacio').modal('show');
	}

	// General modal vacio
	function nuevoModal(contenido){
		descargar();
		$('#myNuevoModalContenido').html(contenido);
		$('#myNuevoModal').modal('show');
	}

	// Limpiar campos
	function limpiarCampos(){
		$('.form-control').val('');
	}
	// Obtener detalle del pedido
	function contenidoDelPedido(){
		var pedido = $.cookie('pedido');
		if( pedido != 0 ){
			$.post('/includes/php.php',{
				consulta: "detalleDelPedido",
				pedido: pedido
			}).done(function(data){
				if(data == 0){
					location.reload();
				}else{
					$('.loaderPedido').html(data);
					$.post('/includes/php.php',{
						consulta: "valorDelPedido",
						orden: $.cookie('pedido')
					}).done(function(msg){
						if( msg > 0 ){
							$('#formasDePago').fadeIn();
						} else {
							$('#formasDePago').fadeOut();
						}
					})
				}
			})
		}else{
			$('.loaderPedido').html("<tr><td colspan='3' class='text-center'>¿Aún no tienes publicaciones en tu pedido?<br />Visita nuestras <a href='/obras'><b>Guias y Obras Editoriales</b></a></td></tr>");
		}
	}

	// Obtener formulario de pago
	function obtenerFormularioDePago(metodo){
		cargar();
		logActividades("Llama formulario de pago para el metodo " + metodo);
		$.post('/includes/php.php',{
			consulta: "obtenerFormularioDePago",
			metodo: metodo
		}).done(function(data){
			descargar();
			nuevoModal(data);
		});
	}
	
	function obtenerFormularioDePago2(metodo, pagina){
		cargar();
		logActividades("Llama formulario de pago para el metodo " + metodo);
		$.post('/includes/php.php',{
			consulta: "obtenerFormularioDePago",
			metodo: metodo,
			pagina: pagina
		}).done(function(data){
			descargar();
			nuevoModal(data);
		});
	}

	function procesaInscripcionConferencia(usuario,metodo,idtransaccion,estadotransaccion,valor){
		$.post('/includes/php.php',{
			consulta: "almacenaInscripcion",
			usuario: usuario,
			metodo: metodo,
			idtransaccion: idtransaccion,
			estadotransaccion: estadotransaccion,
			valor: valor
		}).done(function(data){
			descargar();
			if(
				(metodo == 1) &&
				(estadotransaccion == 'APPROVED')
			 ){
				location.reload();
			} else {
				modal("Proceso de inscripción",data);
			}
		})
	}

	function actualizaInscripcionConferencia(usuario,metodo,idtransaccion,estadotransaccion,valor){
		cargar();
		$.post('/includes/php.php',{
			consulta: "actualizaInscripcion",
			usuario: usuario,
			metodo: metodo,
			idtransaccion: idtransaccion,
			estadotransaccion: estadotransaccion,
			valor: valor
		}).done(function(data){
			descargar();
			modal("Proceso de inscripción",data);
		})
	}

	// Almacenar pendientes PSE
	function almacenaPendientePSE( usuario,estado,metodo,idtransaccion,valor,url ){
		$.post('/includes/php.php',{
			consulta: 'almacenaPendientePSE',
			usuario: usuario,
			estado: estado,
			metodo: metodo,
			idtransaccion: idtransaccion,
			valor: valor
		}).done(function(msg){
			if( msg == 1 ){

				if(metodo == 3){
					window.location.href = url;
				}

				if( (metodo > 3) && (metodo < 7) ){
				   notificaComprobante(usuario,url,metodo);
				   $('#myNuevoModal').modal('hide');
				   modal("Pagos en efectivo","<p>Por favor haga click en el enlace a continuación para descargar su desprendible de pago:</p><p class='text-center'><a target='_blank' class='btn btn-default' style='width:100%' href='" + url + "'>Descargar desprendible de pago</a></p><p><b>Importante:</b> Te hemos enviado a tu correo un mensaje que contiene algunas recomendaciones que debes tener en cuenta para poder realizar tu pago, así mismo como un enlace para que puedas generar tu recibo en caso de requerirlo nuevamente.</p>")
				}

			} else {
				alert(msg);
				descargar();
			}
		})
	}

	// Comprobantes de pago via email
	function notificaComprobante(usuario,url,metodo){
		$.post('/includes/php.php',{
			consulta: "notificaComprobante",
			usuario: usuario,
			url: url,
			metodo: metodo
		})
	}

	// Modal Expectativa Evento
	function modalEx(){
		modal('Proximamente...','<p><a href="index.php?content=conferencia-virtual"><img src="/img/popup.jpg" class="img img-responsive" /></a></p>');
	}

	// Scroll a anchor point
	function scrollToAnchor(aid){
	    var aTag = $("a[name='"+ aid +"']");
	    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}

	// Log de actividades
	function logActividades(actividad){
		$.post('/includes/php.php',{
			consulta: "logActividades",
			actividad: actividad
		})
	}

// Portadas Walter Portada
$('.bxslider').bxSlider({
  minSlides: 6,
  maxSlides: 6,
  slideWidth: 170,
  slideMargin: 15,
  ticker: true,
  speed: 120000,
  tickerHover: true,
  useCSS: false
});

// Idioma del validador
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});

// Funciones
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// Validar formulario de acceso
$('#login').validate();

// Formulario de actualización de contraseña
$('#cambiar-contrasena').validate({
	rules: {
		new_password: {
			minlength: 8
		}
	},
	submitHandler: function(form){
		$('.load').fadeIn();
		$.ajax({
			type: "post",
			url: "/includes/php.php",
			data: {
				consulta: "cambiar-contrasena",
				usuario: $('#usuario').val(),
				current_password: $('#current_password').val(),
				new_password: $('#new_password').val()
			}
		})
		.done(function(msg){
			$('.form-control').val('');
			$('.load').fadeOut();
			bootbox.alert(msg, function() {console.log("Alert Callback");})
		})
	}
});

// Optin mi perfil
$('#optin-toggle').click(function(){
	$('.load').fadeIn();
	$.post("/includes/php.php",{
		consulta: "optin",
		usuario: $('#usuario').val()
	})
	.done(function(msg){
		$('.load').fadeOut();
		//bootbox.alert(msg, function() {console.log("Alert Callback");})
		window.location.href = 'index.php?content=mi-cuenta&task=mi-perfil';
	})
})

// Actualización de perfil
$('#mi-perfil').validate({
	submitHandler: function(form){
		$('.load').fadeIn();
		$.post('/includes/php.php',$('#mi-perfil').serialize()).done(function(data){
			if(data != 1){
				$('#myModalVacioTitulo').html('Actualización de datos');
				$('#myModalVacioContenido').html('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
				$('.load').fadeOut();
				$('#myModalVacio').modal('show');
			} else {
				$('#myModalVacioTitulo').html('Actualización de datos');
				$('#myModalVacioContenido').html('Los datos han sido actualizados de manera exitosa.');
				$('.load').fadeOut();
				$('#myModalVacio').modal('show');
			}
		})
	}
});

// Botón calificar
$('#btnCalificar').click(function(){
	alert('Pendiente script de calificaciones');
})

// Recuperar contraseña
$('#recuperar-contrasena').validate({
	submitHandler: function(form){
		$('.load').fadeIn();
		$.post('/includes/php.php',{
			consulta: 'recuperar-contrasena',
			email: $('#email-recupera').val()
		}).done(function(msg){
			$('.form-control').val('');
			alert(msg);
			$('.load').fadeOut();
		})
	}
});

// Formulario de contacto
$('#contacto').validate({
	submitHandler: function(form){
		$('#myModalContacto').modal('hide');
		$('.load').fadeIn();
		var nombre = $('#nombre-contacto').val();
		var apellido = $('#apellido-contacto').val();
		var email = $('#email-contacto').val();
		var motivo = $('#motivo-mensaje').val();
		var mensaje = $('#mensaje-contacto').val();
		$.post('/includes/php.php',{
			consulta: "contacto",
			nombre: nombre,
			apellido: apellido,
			email: email,
			motivo: motivo,
			mensaje: mensaje
		}).done(function(msg){
			$('#nombre-contacto').val('');
			$('#apellido-contacto').val('');
			$('#email-contacto').val('');
			$('#motivo-mensaje').val('');
			$('#mensaje-contacto').val('');
			$('.load').fadeOut();
			bootbox.alert(msg, function() {console.log("Alert Callback");})
		})
	}
});

$('.compartirFacebook').click(function(){
	var url = window.location.href;
	var sharer = 'https://www.facebook.com/sharer/sharer.php?u=';
	window.open(sharer + url,'Compartir en Facebook');
	//alert(url);
})

$('.compartirAmigo').click(function(){
	$('#myModalCompartir').modal('show');
})

$('#formEnviarCompartirAmigo').validate({
	submitHandler: function(form){
		$('.load').fadeIn();
		$('#myModalCompartir').modal('hide');
		$.ajax({
			type: 'post',
			url: '/includes/php.php',
			data: {
				consulta: 'compartirAmigo',
				url: window.location.href,
				tuNombre: $('#tuNombre').val(),
				emailAmigo: $('#emailAmigo').val(),
				mensajeAdicional: $('#mensajeAdicional').val()
			}
		}).done(function(msg){
			$('.load').fadeOut();
			bootbox.alert(msg, function() {console.log("Alert Callback");})
		})
	}
});

$('.btnFavoritos').click(function(){
	var usuario = $(this).attr('usuario');
	if( (usuario=="") || (usuario==undefined) ){
		bootbox.alert("Para poder utilizar esta función, debes <a href='index.php?content=registrarme'>registrarte</a> o iniciar sesión con tus datos", function() {console.log("Alert Callback");})
		return false;
	}
	if( usuario!="" ){
		var articulo = $(this).attr('articulo');
		if( articulo == "" ){
			bootbox.alert("Se ha presentado un error. Por favor refresque la página e intente de nuevo.", function() {console.log("Alert Callback");})
			return false;
		}

		$.post('/includes/php.php',{
			consulta: "agregarFavoritos",
			usuario: usuario,
			articulo: articulo
		}).done(function(msg){
			bootbox.alert(msg, function() {console.log("Alert Callback");})
		})

	}
})

$('.btnEliminaArticulo').click(function(){
	var x = confirm('¿Está seguro? Esta operación no podrá deshacerse');
	if( x == false ){
		return false;
	}
	if( x == true ){
		$('.load').fadeIn();
		$.post('/includes/php.php',{
			consulta: 'eliminaFavoritos',
			articulo: $(this).attr('value'),
			usuario: $(this).attr('user')
		}).done(function(msg){
			alert(msg);
			location.reload();
		})
	}
})

$('#comentarios').validate({
	submitHandler: function(form){
		$('.load').fadeIn();
		$.ajax({
			type: 'post',
			url: '/includes/php.php',
			data: {
				consulta: "agregarComentarios",
				comentario: $('#comentario').val(),
				articulo: $('#articulo').val(),
				usuario: $('#usuario').val()
			}
		}).done(function(msg){
			alert(msg);
			location.reload();
		})
	}
})

// Configurar nueva contraseña
$('#nueva-contrasena').validate({
	rules: {
		new_password: {
			minlength: 8
		},
		confirm_password: {
			equalTo: "#new_password"
		}
	},
	submitHandler: function(form){
		var val = getParameterByName('val');
		var token = getParameterByName('token');
		$('.load').fadeIn();
		$.post('/includes/php.php',{
			consulta: 'nueva-contrasena',
			usuario: val,
			token: token,
			password: $('#new_password').val()
		}).done(function(msg){
			$('.load').fadeOut();
			alert(msg);
			openLoginModal();
		})
	}
});

// Filtros de publicaciones
$('#autor').change(function(){
	$('.load').fadeIn();
	var autor = $('#autor').val();
	if(autor==""){
		window.location.href="index.php?content=obras";
	} else {
		window.location.href="index.php?content=obras&filtro=autor&val="+autor;
	}
})

// Filtros de autores
$('#idioma').change(function(){
	$('.load').fadeIn();
	var idioma = $('#idioma').val();
	if(idioma==""){
		window.location.href="index.php?content=obras";
	} else {
		window.location.href="index.php?content=obras&filtro=idioma&val="+idioma;
	}
})

// Filtros de formato
$('#formato').change(function(){
	$('.load').fadeIn();
	var formato = $('#formato').val();
	if(formato==""){
		window.location.href="index.php?content=obras";
	} else {
		window.location.href="index.php?content=obras&filtro=formato&val="+formato;
	}
})

// Botón de muestra para el usuario registrado
$('.btnMuestraRegistro').click(function(){
	$('.load').fadeIn();
	$.post('/includes/php.php',{
		consulta: 'descargaMuestra',
		usuario: $(this).attr('user'),
		publicacion: $(this).attr('value')
	}).done(function(msg){
		var muestra = 'admin/_lib/file/docmuestras/' + msg;
		$('#myModalVacioTitulo').html('Descarga de Muestras');
		$('#myModalVacioContenido').html('<p>Hemos enviado la muestra de la publicación solicitada a tu buzón de correo electrónico para que tengas oportunidad de revisarla.</p><p class="lead text-center">Para descargar el archivo PDF<br /><a target="_blank" class="btn btn-primary" href="'  + muestra + '">Haz click aquí</a></p>');
		$('.load').fadeOut();
		$('#myModalVacio').modal('show');
	})
})

// Botón para desplegar la descripción
$('.btnDescripcion').click(function(){
	$('.load').fadeIn();
	$.ajax({
		type: "post",
		url: "/includes/php.php",
		dataType: "json",
		data: {
			consulta: "descripcion",
			publicacion: $(this).attr("publicacion")
		}
	}).done(function(data){
		$('#myModalVacioTitulo').html(data[0]);
	  	$('#myModalVacioContenido').html(data[1]);
	  	$('.load').fadeOut();
	  	$('#myModalVacio').modal('show');
	})
})

// Botón para seleccionar país para el pago
$('#paisPago').change(function(){
	$('.selectFormaPago').fadeOut();
	var pais = $(this).val();
	var html = '<option value="">Seleccione...</option>';
	var htmlTarjet = '<option value="1">Tarjeta de Crédito</option>';
	var htmlPaypal = '<option value="2">Paypal</option>';
	var htmlTransf = '<option class="co" value="3">Transferencia Bancaria - PSE</option>';
	var htmlBaloto = '<option class="co" value="4">Puntos VIA Baloto</option>';
	var htmloxxoel = '<option class="mx" value="5">OXXO - 7 Eleven</option>';
	var htmlbanbcp = '<option class="pe" value="6">Banco de Crédito - BCP</option>';

	$('.tarjetaCredito').fadeOut();
	/*$('#formaPago').prop('selectedIndex',0);*/
	if(pais == "CO"){
		html += htmlTarjet+htmlPaypal+htmlTransf+htmlBaloto;
	}else if(pais == "MX"){
		html += htmlTarjet+htmlPaypal+htmloxxoel;
	}else if(pais == "PE"){
		html += htmlTarjet+htmlPaypal+htmlbanbcp;
	}else{
		html += htmlTarjet+htmlPaypal;
	}
	$('#formaPago').empty();
	$('#formaPago').append(html);
	$('.selectFormaPago').fadeIn();


	/*if(pais==""){
		$('.selectFormaPago').fadeOut();
	} else {
		$('.selectFormaPago').fadeIn();
	}
	if(pais=='CO'){
		$('.co').show();
	} else {
		$('.co').hide();
	}
	if(pais=='MX'){
		$('.mx').show();
	} else {
		$('.mx').hide();
	}
	if(pais=='PE'){
		$('.pe').show();
	} else {
		$('.pe').hide();
	}*/

})

$('#formaPago').change(function(){

	// Pagos con tarjeta de credito
	var formaPago = $(this).val();
	if(formaPago==1){
		$('.tarjetaCredito').fadeIn();
	} else {
		$('.tarjetaCredito').fadeOut();
	}

	// Pagos con Paypal
	if(formaPago==2){
		$('.btnPaypal').fadeIn();
	} else {
		$('.btnPaypal').fadeOut();
	}

	// Pagos con PSE - Parte 1
	if(formaPago==3){
		$('.load').fadeIn();
		$('.pagosPSE').fadeIn();
		$.ajax({
			type: "POST",
			url: "/includes/payu/loadPSE.php"
		}).done(function(data){
			$('#bancos').html(data);
			$('.load').fadeOut();
		})
	} else {
		$('.pagosPSE').fadeOut();
	}

	// Pagos Baloto
	if(formaPago==4){
		$('.pagosBaloto').fadeIn();
	} else {
		$('.pagosBaloto').fadeOut();
	}

	if(formaPago==5){
		$('.pagosOxxo').fadeIn();
	} else {
		$('.pagosOxxo').fadeOut();
	}

	if(formaPago==6){
		$('.pagosBcp').fadeIn();
	} else {
		$('.pagosBcp').fadeOut();
	}

});

// Pagos con BCP
$('#formBcp').validate();

// Pagos con BALOTO
$('#formBaloto').validate();

// Pagos con Oxxo
$('#formOxxo').validate();

// Pagos con PSE - Parte 2
$('#formPSE').validate();

// URL PAGOS EXITOSOS
//index.php?paymentResponse=success

// Filtro de idioma
$('#filtrarIdioma').change(function(){
	var idioma = $(this).val();
	if(idioma==""){
		$('.displayPublicacion').fadeIn();
	} else {
		$('.displayPublicacion').hide();
		$('.displayIdioma' + idioma).fadeIn();
	}
})

// Filtro de formato
$('#filtrarFormato').change(function(){
	var formato = $(this).val();
	if(formato==""){
		$('.displayPublicacion').fadeIn();
	} else {
		$('.displayPublicacion').hide();
		$('.displayFormato' + formato).fadeIn();
	}
})

// Newsletter
$('#newsletter').validate({
	submitHandler: function(form){
		$('.load').fadeIn();
		$.post('/includes/php.php',{
			consulta: "newsletter",
			email: $('#email-newsletter').val()
		}).done(function(data){
			$('.load').fadeOut();
			bootbox.alert(data, function() {console.log("Alert Callback");})
		})
	}
});

// Ajax finalizar sesión
$('.cerrarSesion').click(function(){
	$('.load').fadeIn();
	$.post('/includes/php.php',{
		consulta: 'cerrarSesion'
	}).done(function(msg){
		$.removeCookie('pedido');
		$.removeCookie('session');
		$.removeCookie('e');
		location.reload();
	})
})

// Finalizar proceso de registro
$('#formFinalizaRegistro').validate({
	submitHandler: function(form){
		$('.finRegistro').fadeOut();
		$('.load').fadeIn();
		$.ajax({
			url: '/includes/php.php',
			type: 'POST',
			dataType: 'json',
			data: $('#formFinalizaRegistro').serialize(),
		})
		.done(function(data) {
			if(data.error !=1){
				alert('Se presentó un error. Por favor intente de nuevo');
				location.reload();
			} else {
				location.reload();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		/*$.post('/includes/php.php',$('#formFinalizaRegistro').serialize())
		.done(function(data){
			if(data!=1){
				alert('Se presentó un error. Por favor intente de nuevo');
				location.reload();
			} else {
				location.reload();
			}
		})*/
	}
});

/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Registrarse con');
    });
    $('.error').removeClass('alert alert-danger').html('');

}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Entrar con');
    });
     $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}

$('.muestraLogin').click(function(){
	openLoginModal();
})

function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}

function loginAjax(){
	var data = {
		consulta: "login",
		usuario: $('#emailLogin').val(),
		password: $('#passwordLogin').val(),
		url: $('#currentUrl').val()
	};
	$.ajax({
		url: '/includes/php.php',
		type: 'POST',
		dataType: 'json',
		data: data,
	})
	.done(function(data) {
		if( data.error == 1 ){
		    $.cookie('session',data);
		    location.reload();
		} else {
		    shakeModal();
		}
		/*console.log("success");*/
	})
	.fail(function() {
		/*console.log("error");*/
	})
	.always(function() {
		/*console.log("complete");*/
	});
	
	/*$.post('/includes/php.php',{
		consulta: "login",
		usuario: $('#emailLogin').val(),
		password: $('#passwordLogin').val(),
		url: $('#currentUrl').val()
	}).done(function(data){
		if( data.error == 1 ){
		    $.cookie('session',data);
		    location.reload();
		} else {
		    shakeModal();
		}
	})*/
}

function registroAjax(){

	$('.error').addClass('alert alert-danger').html("Mmm");
	shakeModalRegistro();

}

$('#loginInscripcion').validate({
	submitHandler: function(form){
		cargar();
		$.ajax({
			url: '/includes/php.php',
			type: 'POST',
			dataType: 'json',
			data: $('#loginInscripcion').serialize(),
		})
		.done(function(data) {
			if( data.error == 1 ){
			    $.cookie('session',data);
			    location.reload();
		    } else {
			    alert('Nombre de usuario y/o contraseña inválido');
		    }
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		    descargar();
		});
	}
});

$('#registroUsuarios').validate({
	rules: {
		emailRegistro: {
			remote: {
				url: '/includes/php.php',
				type: 'post',
				data: {
					consulta: "verificaEmail"
				}
			}
		},
		passwordRegistro: {
			minlength: 8
		},
		cPasswordRegistro: {
			equalTo: "#passwordRegistro"
		}
	},
	messages: {
		emailRegistro: {
			remote: "Este email ya se encuentra registrado"
		}
	},
	submitHandler: function(form){
		$.ajax({
			type: "POST",
			url: "/includes/php.php",
			data: {
				consulta: "registro",
				email: $('#emailRegistro').val(),
				password: $('#passwordRegistro').val()
			}
		}).done(function(data){
			if(data == 0){
				shakeModalRegistro();
			}else{
				location.reload();
			}
		})

	}
});

$('#registroInscripcion').validate({
	rules: {
		email: {
			remote: {
				url: '/includes/php.php',
				type: 'post',
				data: {
					consulta: "verificaEmailRegistro"
				}
			}
		},
		password: {
			minlength: 8
		},
		cpassword: {
			equalTo: "#passwordReg"
		}
	},
	messages: {
		email: {
			remote: "Este email ya se encuentra registrado"
		}
	},
	submitHandler: function(form){
		$.post('/includes/php.php',$('#registroInscripcion').serialize())
		.done(function(data){
			if(data == 0){
				shakeModalRegistro();
			}else{
				location.reload();
			}
		})

	}
});

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Nombre de usuario o contraseña inválidos");
             $('input[type="password"]').val('');
             setTimeout( function(){
                $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000 );
}

function shakeModalRegistro(){
    $('#loginModal .modal-dialog').addClass('shake');
        setTimeout( function(){
           $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000 );
}

// Cerrar el modal de muestra y ver el formulario de registro
$('.btnRegistrarme').click(function(){
	$('#myModalDescargaMuestra').modal('hide');
	openRegisterModal();
})

// Completar registro FB
$('#formEmailFacebook').validate({
	rules: {
		email: {
			remote: {
				url: '/includes/php.php',
				type: 'post',
				data: {
					consulta: "verificaEmail"
				}
			}
		}
	},
	messages: {
		email: {
			remote: "Este email ya se encuentra registrado"
		}
	},
	submitHandler: function(form){
		$('#myModalEmailFacebook').modal('hide');
		$('.load').fadeIn();
		$.post('/includes/php.php',$('#formEmailFacebook').serialize())
		.done(function(data){
			if(data==1){
				location.reload();
			} else {
				alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.' + data);
				location.reload();
			}
		})
	}
});

// Inicia sesión FB
function iniciaFb(fbId,url){
	$.post('/includes/php.php',{
		consulta: 'iniciaFb',
		fbId: fbId,
		url: url
	}).done(function(data){
		if(data == 0){
			alert(data);
		}
		if(data == 1){
			location.reload();
		}
	})
}

// Botón ¿Por qué registrarse?
$('#btnPorQue').click(function(){
	$('#myModalPorQueRegistrarse').modal('hide');
	openRegisterModal();
})

// Iniciar sesión en el modal de muestras
$('.btnSesionMuestra').click(function(){
	$('#myModalDescargaMuestra').modal('hide');
	openLoginModal();
})

// Genera el detalle del pedido
$('.btnDetallePedido').click(function(){
	$('.load').fadeIn();
	$.post('/includes/php.php',{
		consulta: "detallesPedido",
		pedido: $(this).attr('pedido')
	}).done(function(data){
		$('#myModalVacioTitulo').html('Detalle del pedido');
		$('#myModalVacioContenido').html(data);
		$('.load').fadeOut();
		$('#myModalVacio').modal('show');
	})
})

// Modal buscador
$('#buscarArticulos').validate({
	submitHandler: function(form){
		cargar();
		$.post('/includes/php.php',$('#buscarArticulos').serialize())
		.done(function(data){
			limpiarCampos();
			if( data == 0 ){
				modal('Buscar artículos', "<p>Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.</p>");
			}else{
				modal('Buscar artículos', data);
			}
		})
	}
})

// Inscripción expectativa conferencia
$('#conferencia').validate({
	submitHandler: function(form){
		cargar();
		$.post('/includes/php.php',$('#conferencia').serialize())
		.done(function(data){
			if( data == 0 ){
				modal("El arte de amar sin apegos","<p>Lo sentimos, se ha presentado un error, por favor intente de nuevo.</p>");
			} else {
				modal("El arte de amar sin apegos","<p>" + data + "</p>");
			}
		})
	}
});

// Medios de pago para la conferencia
$('#paisConferencia').change(function(){
	cargar();
	logActividades('Selecciona pais conferencia');
	$.post('includes/php.php',{
		consulta: 'obtenerMediosDePago',
		pais: $('#paisConferencia').val()
	}).done(function (data, status, jqxhr){
		$('#formaDePagoConferencia').html(data);
		descargar();
	}).fail(function (data, status, jqxhr) {
		/*var r = confirm('Ha ocurrido un error con la pasarela de pago. \nDesea intentarlo nuevamente?');*/
		modal("Lo sentimos","<p>Se ha presentado un error, por favor intente de nuevo.</p>");
		if ( r == true ) {
			location.reload(true);
		}else{
			window.location = 'https://www.elartedesabervivir.com/';
		}
	})
})
// Medios de pago para la conferencia
$('#paisConferencia2').change(function(){
	cargar();
	logActividades('Selecciona pais conferencia');
	$.post('includes/php.php',{
		consulta: 'obtenerMediosDePago',
		pais: $('#paisConferencia2').val()
	}).done(function (data, status, jqxhr){
		$('#formaDePagoConferencia').html(data);
		descargar();
	}).fail(function (data, status, jqxhr) {
		/*var r = confirm('Ha ocurrido un error con la pasarela de pago. \nDesea intentarlo nuevamente?');*/
		/*modal("Lo sentimos","<p>Se ha presentado un error, por favor intente de nuevo.</p>");*/
		descargar();
		bootbox.alert("Se ha presentado un error, por favor intente de nuevo.", function(){
			console.log("se ha cerrado");
			location.reload(true);
		});
		/*if ( r == true ) {
			location.reload(true);
		}else{
			window.location = 'https://www.elartedesabervivir.com/';
		}*/
	})
})

// Inscripcion en la conferencia
$('#inscripcionConferencia').validate({
	submitHandler: function(form){
		if ( $('#pagina').length > 0 ) {
			obtenerFormularioDePago2($('#formaDePagoConferencia').val(), $('#pagina').val());
		}else{
			obtenerFormularioDePago($('#formaDePagoConferencia').val());
		}
	}
});


/*===================================================
=            Validar código de descuento            =
===================================================*/
$('body').on('click', '#validarDecuento', function(event) {
	event.preventDefault();
	var data = {
		codigo : $('#codigoDescuento').val(),
		consulta : 'validar-codigo-descuento'
	};
	$.ajax({
		url: '/includes/php.php',
		type: 'POST',
		dataType: 'json',
		data: data,
	})
	.done(function(data) {
		if (data.error == 0){
			$('#descuentoMensaje').empty();
			$('#descuentoMensaje').append('El código de descuento está errado');
			$('#vrPedido').val(data.valor);
			$('#valorConferencia').text(data.valor);
		}else{
			$('#descuentoMensaje').empty();
			$('#descuentoMensaje').append('Descuento aplicado');
			$('#vrPedido').val(data.valor);
			$('#valorConferencia').text(data.valor);
		}
	})
	.fail(function() {
		console.log('error');
	})
	.always(function() {
		console.log('complete');
	});
});

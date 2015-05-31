<?php
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTION DEL USUARIO
	// GESTIÓN DE PAGOS
	// GESTIÓN DE ARTÍCULOS
	// CRON JOBS
	// VARIOS
	
	/////////////////////////////////////////////////////////////////////////
	
	session_start();
	
	require_once('config.php');
	require_once('conn.php');
	require_once('phpmailer.php');
	require_once('functions.php');
	
	// Registro de usuarios
	if($_POST['consulta']=='registro'){
		if(!mysqli_query($con, "
			INSERT INTO
				usuarios (
					email,
					password,
					status,
					optin,
					perfil
				) VALUES (
					'$_POST[email]',
					'".md5($_POST['password'])."',
					'0',
					'1',
					'0'
				)
		")){
			echo "0";
		}else{
			$_SESSION['id']=mysqli_insert_id($con);
			agregaListaNewsletter($_POST['email']);
			echo "1";
		}
	}
	
	// Inicio de sesión
	if($_POST['consulta']=='login'){
		$sql="SELECT id FROM usuarios WHERE email = '$_POST[usuario]' AND password = '".md5($_POST['password'])."'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo 0;
		}else{
			$id=mysqli_fetch_array($q);
			$_SESSION['id']=$id['id'];
			echo $id['id'];
		}
	}
	
	// Verificación de correo electrónico
	if($_POST['consulta']=='email-registro'){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$_POST[email]'"));
		if($n>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	
	// Actualización de contraseña
	if($_POST['consulta']=='cambiar-contrasena'){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE id = '$_POST[usuario]' AND password = '".md5($_POST['current_password'])."'"));
		if($n!=1){
			echo "La contraseña actual no coincide. Los datos lo pudieron ser actualizados.";
		}else{
			if(!mysqli_query($con, "UPDATE usuarios SET password = '".md5($_POST['new_password'])."' WHERE id = '$_POST[usuario]'")){
				echo "Lo sentimos, se ha presentado un error procesando su solicitud. Por favor intente de nuevo.";
			}else{
				echo "Su contraseña ha sido actualizada exitosamente.";
			}
		}
	}
	
	// Optin
	if($_POST['consulta']=='optin'){
		$actual = mysqli_fetch_array(mysqli_query($con, "SELECT optin FROM usuarios WHERE id = '$_POST[usuario]'"));
		$nuevo = $actual['optin'] == 1 ? 0 : 1;
		if(!mysqli_query($con, "UPDATE usuarios SET optin = '$nuevo' WHERE id = '$_POST[usuario]'")){
			echo "Los datos no pudieron ser actualizados. Inténtelo de nuevo.";
		}else{
			echo "La información ha sido actualizada correctamente";
		}
	}
	
	// Mi perfil
	if($_POST['consulta']=='actualizaPerfil'){
		if(!mysqli_query($con, "
			UPDATE
				usuarios
			SET
				nombreCompleto = '$_POST[nombre] $_POST[apellido]',
				nombre = '$_POST[nombre]',
				apellido = '$_POST[apellido]',
				ciudad = '$_POST[ciudad]',
				pais = '$_POST[pais]',
				genero = '$_POST[genero]'
			WHERE
				id = '$_SESSION[id]'
		")){
			echo 0;
		}else{
			echo 1;
		}
	}
	
	// Descarga
	if($_POST['consulta']=='descarga'){
		if(!mysqli_query($con,"INSERT INTO descargas (usuario,publicacion) VALUES ('$_POST[usuario]','$_POST[publicacion]')")){
		   echo json_encode(array("0","0"));
		}else{
		   $headers  = 'MIME-Version: 1.0' . "\r\n";
		   $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		   $url=NOTIFICACION;
		   $html=file_get_contents($url);
		   $contenido='
		   	<p><b>Hola '.getNombreUsuario($_POST['usuario']).'</b>,</p>
		   	<p>De acuerdo con tu solicitud adjunto te estamos entregando nuestra publicacion <b>"'.getNombrePublicacion($_POST['publicacion']).'"</b>.</p>
		   	<p>Gracias por preferirnos!</p>
		   	<p><b>El equipo de Phronesis | El arte de saber vivir</b></p>
		   ';
		   $html=str_replace("{{contenido}}",$contenido,$html);         
		   $mail = new PHPMailer();
		   $mail->From = 'no-reply@phronesisvirtual.com';
		   $mail->FromName = 'Phronesis | El arte de saber vivir';
		   $mail->Subject = utf8_decode('Tu descarga de "'.getNombrePublicacion($_POST['publicacion']).'"');
		   $mail->Body = utf8_decode($html);
		   $mail->IsHTML(true);
		   $mail->AddAddress(getEmailUsuario($_POST['usuario']));
		   $mail->AddAttachment('../admin/_lib/file/docdescargables/'.getArchivoPublicacion($_POST['publicacion']));
		   if(!$sent_mail= $mail->Send()){
		   	echo json_encode(array("0","0"));
		   }else{
		   	echo json_encode(array("1",getArchivoPublicacion($_POST['publicacion'])));
		   }
		}
	}
	
	// Agregar
	if($_POST['consulta']=="agregar"){
		if($_POST['pedido']==""){
			$q=mysqli_query($con, "INSERT INTO pedidos (usuario) VALUES ('$_POST[usuario]')");
			$id=mysqli_insert_id($con);
		}else{
			$id=$_POST['pedido'];
		}
		
		// Verificar que la publicación no haya sido agregada previamente en el pedido
		$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$id' AND publicacion = '$_POST[publicacion]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		
		if($n>0){
			echo $id;
		}else{
			if(!mysqli_query($con, "INSERT INTO publicacionesxpedido (pedido, publicacion) VALUES ('$id', '$_POST[publicacion]')")){
				echo "0";
			}else{
				echo $id;
			}	
		}
	}
	
	// Borrar publicación
	if($_POST['consulta']=='delPub'){
		if(!mysqli_query($con, "DELETE FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]' AND publicacion = '$_POST[publicacion]'")){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
		}else{
			echo "Publicación eliminada exitosamente.";
		}
	}
	
	// Configurar nueva contraseña
	if($_POST['consulta']=='nueva-contrasena'){
		$q=mysqli_query($con, "SELECT * FROM usuarios WHERE id = '$_POST[usuario]' AND password = '$_POST[token]'");
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo "Lo sentimos, se ha presentado un error o los datos son inconsistentes. Por favor verifique.";
		}else{
			if(!mysqli_query($con, "UPDATE usuarios SET password = '".md5($_POST['password'])."' WHERE id = '$_POST[usuario]'")){
				echo "Lo sentimos, se ha presentado un error, por favor inténtelo de nuevo.";
			}else{
				echo "Contraseña actualizada exitosamente. Por favor ingrese con sus nuevas credenciales.";
			}
		}
	}
	
	// Cerrar pedido
	if($_POST['consulta']=='cierra-pedido'){
		if(!mysqli_query($con, "UPDATE pedidos SET valor = '$_POST[valor]', status = '$_POST[status]', formaPago = '$_POST[formaPago]', orderId = '$_POST[orderId]', transactionId = '$_POST[transactionId]', state = '$_POST[state]', responseCode = '$_POST[responseCode]' WHERE id = '$_POST[pedido]'")){
			echo "Lo sentimos, se ha presentado un error, por favor intente de nuevo.";
		}else{
			$q=mysqli_query($con, "SELECT * FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]'");
			$n=mysqli_num_rows($q);
			if($n<1){
				echo "En este momento no tienes publicaciones en tu pedido";
			}else{
				while($pub=mysqli_fetch_assoc($q)){
					mysqli_query($con, "INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$_POST[usuario]','$pub[publicacion]')");
				}
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$url=NOTIFICACION;
				$html=file_get_contents($url);
				$contenido='
					<p><b>¡Gracias por tu compra!</b></p>
					<p>A continuación relacionamos el detalle de tu pedido:</p>
				';
				$q=mysqli_query($con, "SELECT * FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]'");
				while($det=mysqli_fetch_assoc($q)){
					$contenido.="
						<p>
							<b>".getNombrePublicacion($det['publicacion'])."</b><br />
							USD ".getPrecioPublicacion($det['publicacion'])."
						</p>
					";
					$sum+=getPrecioPublicacion($det['publicacion']);
				}
				$contenido.="<p><b>Valor de la orden: USD ".$sum."</b></p>";
				$html=str_replace("{{contenido}}",$contenido,$html);         
				$mail = new PHPMailer();
				$mail->From = 'no-reply@phronesisvirtual.com';
				$mail->FromName = 'Phronesis | El arte de saber vivir';
				$mail->Subject = utf8_decode('Confirmación de su pedido');
				$mail->Body = utf8_decode($html);
				$mail->IsHTML(true);
				$usuario=mysqli_fetch_array(mysqli_query($con, "SELECT usuario FROM pedidos WHERE id = '$_POST[pedido]'"));
				$mail->AddAddress(getEmailUsuario($usuario['usuario']));
				$mail->AddBCC('juanc@closerdesign.co');
				$mail->AddBCC('pfhurtado@phronesisvirtual.com');
				//$mail->AddReplyTo($_POST['']);
				if(!$sent_mail= $mail->Send()){
					echo 0;
				}else{
					echo 1;
				}
			}
		}
	}
	
	// Pedido Pendiente
	if($_POST['consulta']=='pedidoPendiente'){
		if(!mysqli_query($con, "
			UPDATE
				pedidos
			SET
				valor = '$_POST[valor]',
				status = '1',
				formaPago = '$_POST[formaPago]',
				orderId = '$_POST[orderId]',
				transactionId = '$_POST[transactionId]',
				state = '$_POST[state]',
				pendingReason = '$_POST[pendingReason]',
				responseCode = '$_POST[responseCode]',
				urlPaymentReceiptHtml = '$_POST[urlPaymentReceiptHtml]',
				reference = '$_POST[reference]'
			WHERE id = '".$_POST['pedido']."'
		")){
			echo 0;
			echo mysqli_error($con);
		}else{
			echo 1;
		}
	}
	
	// Formulario de contacto
	if($_POST['consulta']=='contacto'){
		if(!mysqli_query($con, "INSERT INTO contacto (nombre, apellido, email, motivo, mensaje) VALUES ('".strtoupper($_POST['nombre'])."', '".strtoupper($_POST['apellido']."', '".strtolower($_POST['email'])."', '".$_POST['motivo']."', '".$_POST['mensaje']."')"))){
			echo "Lo sentimos, se ha presentado un error, por favor intente de nuevo.";
		}else{
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$url=NOTIFICACION;
			$html=file_get_contents($url);
			$contenido='
				<p>A continuación la información relacionada:</p>
				<p><b>Nombre:</b><br />'.$_POST['nombre'].'</p>
				<p><b>Apellido:</b><br />'.$_POST['apellido'].'</p>
				<p><b>Email:</b><br />'.$_POST['email'].'</p>
				<p><b>Motivo:</b><br />'.$_POST['motivo'].'</p>
				<p><b>Mensaje:</b><br />'.$_POST['mensaje'].'</p>
			';
			$html=str_replace("{{contenido}}",$contenido,$html);         
			$mail = new PHPMailer();
			$mail->From = 'no-reply@phronesisvirtual.com';
			$mail->FromName = 'Phronesis | El arte de saber vivir';
			$mail->Subject = utf8_decode('Nuevo mensaje desde el sitio web: '.$_POST['motivo']);
			$mail->Body = utf8_decode($html);
			$mail->IsHTML(true);
			$mail->AddAddress(NOTIFICACIONES);
			$mail->AddBCC('juanc@closerdesign.co');
			$mail->AddReplyTo($_POST['email']);
			if(!$sent_mail= $mail->Send()){
				echo "Lo sentimos, se ha presentado un error, por favor intente de nuevo.";
			}else{
				agregaListaNewsletter($_POST['email']);
				echo "Gracias por escribirnos, hemos recibido su mensaje y pronto estaremos en contacto.";
			}
		}
	}
	
	// Compartir con un amigo
	if($_POST['consulta']=='compartirAmigo'){
		if(!mysqli_query($con, "
			INSERT INTO compartir (
				tuNombre,
				emailAmigo,
				url,
				mensajeAdicional
			) VALUES (
				'$_POST[tuNombre]',
				'$_POST[emailAmigo]',
				'$_POST[url]',
				'$_POST[mensajeAdicional]'
			)
		")){
			echo "Lo sentimos, se ha presentado un error. Por favor inténtelo de nuevo.";
		}else{
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$url=NOTIFICACION;
			$html=file_get_contents($url);
			$contenido='
				<p>'.$_POST['tuNombre'].' te ha compartido un enlace de <b>Phronesis | El arte de saber vivir</b> que podría interesarte.</p>
				<p><a href="'.$_POST['url'].'">Haz click aquí para visitarlo.</a></p>
			';
			if($_POST['mensajeAdicional']!=""){
				$contenido.="
					<p><b>Mensaje</b><br />$_POST[mensajeAdicional]</p>
				";
			}
			$html=str_replace("{{contenido}}",$contenido,$html);         
			$mail = new PHPMailer();
			$mail->From = 'no-reply@phronesisvirtual.com';
			$mail->FromName = utf8_decode($_POST['tuNombre'].' a través de Phronesis | El arte de saber vivir');
			$mail->Subject = utf8_decode($_POST['tuNombre'].' te ha compartido un enlace');
			$mail->Body = utf8_decode($html);
			$mail->IsHTML(true);
			$mail->AddAddress($_POST['emailAmigo']);
			//$mail->AddReplyTo($_POST['']);
			if(!$sent_mail= $mail->Send()){
				echo "Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.";
			}else{
				agregaListaNewsletter($_POST['emailAmigo']);
				echo "Hemos enviado el enlace sin ningún problema. ¡Gracias por compartir nuestro contenido!";
			}
		}
	}
	
	// Agregar a favoritos
	if($_POST['consulta']=='agregarFavoritos'){
		$sql="SELECT * FROM favoritos WHERE usuario = '$_POST[usuario]' AND articulo = '$_POST[articulo]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n>0){
			echo "Este artículo ya se encuentra en tu biblioteca!";
		}else{
			if(!mysqli_query($con, "
				INSERT INTO favoritos (
					usuario,
					articulo
				) VALUES (
					'$_POST[usuario]',
					'$_POST[articulo]'
				)
			")){
				echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
			}else{
				echo "El artículo ha sido agregado exitosamente a tu biblioteca.";
			}	
		}
	}
	
	// Eliminar favorito
	if($_POST['consulta']=='eliminaFavoritos'){
		if(!mysqli_query($con, "
			DELETE FROM
				favoritos
			WHERE
				usuario = '$_POST[usuario]'
			AND
				articulo = '$_POST[articulo]'
		")){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
		}else{
			echo "El artículo ha sido eliminado exitosamente de tu librería.";
		}
	}
	
	// Agregar comentarios
	if($_POST['consulta']=='agregarComentarios'){
		if(!mysqli_query($con, "
			INSERT INTO comentarios (
				usuario,
				articulo,
				comentarios,
				status
			) VALUES (
				'$_POST[usuario]',
				'$_POST[articulo]',
				'$_POST[comentario]',
				'1'
			)
		")){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
		}else{
			$id=mysqli_insert_id($con);
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$url=NOTIFICACION;
			$html=file_get_contents($url);
			$contenido='
				<p>Un nuevo comentario ha sido publicado en el artículo <b>'.getTituloArticulo($_POST['articulo']).'</b>.</p>
				<p>A continuación su contenido:</p>
				<h3>"'.$_POST['comentario'].'"</h3>
				<p>Si considera inapropiado el contenido de este comentario y desea despublicarlo, por favor haga click <a href="'.URL.'index.php?content=unpublish&id='.$id.'">aquí</a>.</p>
			';
			$html=str_replace("{{contenido}}",$contenido,$html);         
			$mail = new PHPMailer();
			$mail->From = 'no-reply@phronesisvirtual.com';
			$mail->FromName = 'Phronesis | El arte de saber vivir';
			$mail->Subject = utf8_decode('['.$id.'] Un nuevo comentario ha sido incluído');
			$mail->Body = utf8_decode($html);
			$mail->IsHTML(true);
			$mail->AddAddress(NOTIFICACIONES);
			$mail->AddReplyTo($_POST['']);
			if(!$sent_mail= $mail->Send()){
				echo "Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.";
			}else{
				echo "Tu comentario ha sido agregado exitosamente. Gracias por compartir con la comunidad.";
			}
		}
	}
	
	// Lightbox detalle de pedido
	if($_POST['consulta']=='detallePedido'){
		$html="";
		$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n<1){
			$html="<p>En este momento no tienes publicaciones en tu pedido.<p>";
		}else{
			$html="
				<div class='row'>
					<div class='col-lg-12 col-md-12 col-sm-12'>
						<div class='table-responsive'>
							<table class='table table-responsive table-striped'>
								<thead>
									<tr>
										<th class='text-center'>Publicación</th>
										<th class='text-center'>Precio</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>";
			while($p=mysqli_fetch_assoc($q)){
				$html.="
					<tr id='ordenpub".$p['publicacion']."'>
						<td>
							".getNombrePublicacion($p['publicacion'])."<br /><b>".$displayFormatos[getFormatoPublicacion($p['publicacion'])]."</b>
						</td>
						<td class='text-center'>
							USD ".getPrecioPublicacion($p['publicacion'])."
						</td>
						<td>
							<p class='text-center'>
								<button class='btn btn-default delordenpub".$p['publicacion']."' publicacion='".$p['publicacion']."'>
									<i class='fa fa-trash'></i>
								</button>
							</p>
						</td>
					</tr>
					<script>
						$('.delordenpub".$p['publicacion']."').click(function(){
							$('.load').fadeIn();
							$.post('/includes/php.php',{
								consulta: 'delordenpub',
								publicacion: $(this).attr('publicacion'),
								pedido: $.cookie('pedido')
							}).done(function(data){
								if(data==1){
									$('#ordenpub".$p['publicacion']."').fadeOut();
									labelProductos();
								}
								if(data==0){
									alert('Se ha presentado un error. Por favor intente de nuevo.');
								}
								$('.load').fadeOut();
							})
						})
					</script>
				";
			}					
			$html.="				</tbody>
							</table>
						</div>
					</div>
				</div>
			";
		}
		echo $html;
	}
	
	// Eliminar publicación en el lightbox de la orden
	if($_POST['consulta']=='delordenpub'){
		$sql="DELETE FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]' AND publicacion = '$_POST[publicacion]'";
		if(!mysqli_query($con, $sql)){
		   echo 0;
		}else{
		   echo 1;
		}
	}
	
	// Enviar muestra de producto
	if($_POST['consulta']=='descargaMuestra'){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$url=NOTIFICACION;
		$html=file_get_contents($url);
		$contenido='
			<p><b>¡Hola '.getNombreUsuario($_POST['usuario']).'!</b></p>
			<p>De acuerdo con tu solicitud, adjunta encontrarás un avance de nuestra publicación <b><i>"'.getNombrePublicacion($_POST['publicacion']).'"</i></b>, para que la conozcas, te enamores de ella y la agregues a tu biblioteca.</p>
			<p>¡Un abrazo gigante para ti!</p>
			<p><b>El equipo de Phronesis | El arte de saber vivir</b></p>
		';
		$html=str_replace("{{contenido}}",$contenido,$html);         
		$mail = new PHPMailer();
		$mail->From = 'no-reply@phronesisvirtual.com';
		$mail->FromName = 'Phronesis | El arte de saber vivir';
		$mail->Subject = utf8_decode('El avance de "'.getNombrePublicacion($_POST['publicacion']).'" que nos pediste!');
		$mail->Body = utf8_decode($html);
		$mail->IsHTML(true);
		$mail->AddAddress(getEmailUsuario($_POST['usuario']));
		$mail->AddAttachment('../admin/_lib/file/docmuestras/'.getArchivoMuestra($_POST['publicacion']));
		if(!$sent_mail= $mail->Send()){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
		}else{
			echo getArchivoMuestra($_POST['publicacion']);
		}
	}
	
	// Obtener descripción de la obra
	if($_POST['consulta']=='descripcion'){
		$sql="SELECT * FROM publicaciones WHERE id = '$_POST[publicacion]'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		$desc=array($data['titulo'],$data['descripcion']);
		echo json_encode($desc);
	}
	
	// Newsletter
	if($_POST['consulta']=='newsletter'){
		if(!mysqli_query($con, "
			INSERT INTO
				newsletter (
					email,
					optin
				) VALUES (
					'$_POST[email]',
					'1'
				)
		")){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo. ";
		}else{
			echo "Hemos agregado tu dirección a nuestra lista de envío para que comiences a recibir nuestros contenidos.";
		}
	}
	
	// Cerrar sesión
	if($_POST['consulta']=='cerrarSesion'){
		unset($_SESSION['id']);
		unset($_SESSION['perfil']);
		unset($_SESSION['FBID']);
		unset($_SESSION['EMAIL']);
		unset($_SESSION['FULLNAME']);
		unset($_COOKIE['pedido']);
	}
	
	// Completa los datos del registro
	if($_POST['consulta']=='finRegistro'){
		if(!mysqli_query($con, "
		   UPDATE
		   	usuarios
		   SET
		   	email = '$_POST[frEmail]',
		   	nombreCompleto = '$_POST[frNombre] $_POST[frApellido]',
		   	nombre = '$_POST[frNombre]',
		   	apellido = '$_POST[frApellido]',
		   	ciudad = '$_POST[frCiudad]',
		   	pais = '$_POST[frPais]',
		   	genero = '$_POST[frGenero]'
		   WHERE
		   	id = '$_SESSION[id]'
		")){
		   mysqli_error($con);
		}else{
		   entregaObsequiosTienda($_SESSION['id']);
		   echo "1";
		}
	}
	
	if($_POST['consulta']=='verificaEmail'){
		$q=mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$_POST[emailRegistro]'");
		$n=mysqli_num_rows($q);
		if($n>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	
	// Finalizar registro Facebook
	if($_POST['consulta']=='emailFacebook'){
		$sql="SELECT * FROM usuarios WHERE email = '$_POST[email]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n>0){
			$data=mysqli_fetch_array($q);
			$sql1="
				UPDATE 
					usuarios 
				SET 
					fbId = '$_SESSION[FBID]',
					nombreCompleto = '$_POST[nombre] $_POST[apellido]',
					nombre = '$_POST[nombre]',
					apellido = '$_POST[apellido]',
					email = '$_POST[email]',
					ciudad = '$_POST[ciudad]',
					pais = '$_POST[pais]',
					genero = '$_POST[genero]'
				WHERE
					email = '$_POST[email]'
				";
		}else{
			$sql1="
				INSERT INTO
					usuarios (
						fbId,
						nombreCompleto, 
						nombre, 
						apellido,
						email,
						ciudad,
						pais,
						genero,
						status,
						optin,
						perfil
					) VALUES (
						'$_SESSION[FBID]',
						'$_POST[nombre] $_POST[apellido]',
						'$_POST[nombre]',
						'$_POST[apellido]',
						'$_POST[email]',
						'$_POST[ciudad]',
						'$_POST[pais]',
						'$_POST[genero]',
						'1',
						'1',
						'0'
					)
			";
		}
		$q1=mysqli_query($con, $sql1);
		if(!$q1){
			echo 0;
		}else{
			if($n>0){
				$id=$data['id'];
			}else{
				$id=mysqli_insert_id($con);
			}
			$_SESSION['id']=$id;
			echo 1;
		}
	}
	
	// Iniciar sesión FB
	if($_POST['consulta']=='iniciaFb'){
		$sql="SELECT id FROM usuarios WHERE fbId = '$_POST[fbId]'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		$_SESSION['id']=$data['id'];
		echo 1;
	}
	
	// Actualizar label de # de productos
	if($_POST['consulta']=='publicacionesPedido'){
		if(isset($_COOKIE['pedido'])){
			$q=mysqli_query($con, "SELECT * FROM publicacionesxpedido WHERE pedido = '$_COOKIE[pedido]'");
			$n=mysqli_num_rows($q);
			echo $n;
		}
	}
	
	// Detalle del pedido
	if($_POST['consulta']=='detallesPedido'){
		$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]'";
		$q=mysqli_query($con, $sql);
		$html="<table class='table table-bordered table-striped'><thead><tr><th>Publicación</th><th>Valor</th></tr></thead><tbody>";
		$n=mysqli_num_rows($q);
		if($n<1){
			$html.="<tr><td colspan='2'>No hay publicaciones en este pedido</td></tr>";
		}else{
			while($pub=mysqli_fetch_assoc($q)){
				$html.="<tr><td>".getNombrePublicacion($pub['publicacion'])."</td><td>".getPrecioPublicacion($pub['publicacion'])."</td></tr>";
			}
		}
		$html.="</tbody></table>";
		echo $html;
	}
	
	// Procesamiento de Paquetes
	if($_POST['consulta']=='procesaPaquete'){
		
		if($_POST['estado']=='PENDING'){
			$estado=1;
		}
		if($_POST['estado']=='APPROVED'){
			$estado=2;
		}
		
		// Crea la orden
		if(!mysqli_query($con, "
			INSERT INTO
				pedidos (
					usuario,
					valor,
					status,
					formaPago,
					orderId,
					transactionId,
					state,
					pendingReason,
					responseCode
				) VALUES (
					'$_POST[usuario]',
					'".getPrecioPaquete($_POST['paquete'])."',
					'$estado',
					'1',
					'$_POST[orderId]',
					'$_POST[transactionId]',
					'$_POST[estado]',
					'$_POST[pendingReason]',
					'$_POST[responseCode]'
				)
		")){
			echo 0;
		}else{
			// Crea los ítems de la orden
			$id=mysqli_insert_id($con);
			$publicaciones=explode(',', getPublicacionesPaquete($_POST['paquete']));
			foreach($publicaciones as $pub){
				$sql="
					INSERT INTO
						publicacionesxpedido (
							pedido,
							publicacion
						) VALUES (
							'$id',
							'$pub'
						)
				";
				$q=mysqli_query($con, $sql);
				if(!$q){
					echo 0;
				}
			}
			
			if($estado==2){
				$publicaciones=explode(',',getPublicacionesPaquete($_POST['paquete']));
				foreach($publicaciones as $pub){
					$sql="
						INSERT INTO
							publicacionesxusuario (
								usuario,
								publicacion
							) VALUES (
								'$_POST[usuario]',
								'$pub'
							)
					";
					$q=mysqli_query($con, $sql);
					if(!$q){
						echo 0;
					}
				}
			}
			
			echo 1;
			
		}
		
	}
	
	// CREACION DE ORDEN EN LOS PAQUETES
	if($_POST['consulta']=='crearOrdenPaquete'){
		
		// Datos mínimos para la orden
		$codigoPaquete = $_POST['codigoPaquete'];
		$codigoUsuario = $_SESSION['id'];
		$formaDePago = $_POST['formaDePago'];
		
		$q=mysqli_query($con, "
			INSERT INTO
				pedidos (
					usuario,
					valor,
					status,
					formaPago
				) VALUES (
					'$codigoUsuario',
					'".getPrecioPaquete($codigoPaquete)."',
					'1',
					'$formaDePago'
				)
		");
		
		if(!$q){
			echo 0;
		}else{
			
			// Obtenemos el código de la orden creada
			$codigoOrden = mysqli_insert_id($con);
			
			// Una vez creada la orden, entonces creamos el detalle de la orden
			$publicaciones = explode(',', getPublicacionesPaquete($codigoPaquete));
			
			foreach($publicaciones as $p){
				
				$q = mysqli_query($con, "
					INSERT INTO
						publicacionesxpedido (
							pedido,
							publicacion
						) VALUES (
							'$codigoOrden',
							'$p'
						)
				");
				
				if(!$q){
					$codigoOrden = 0;
				}
				
			}
			
			// Devolvemos el número de la orden generada
			echo $codigoOrden;
			
		}
		
	}

	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DEL USUARIO
	
	/////////////////////////////////////////////////////////////////////////
	
		// Recuperar contraseña
		if($_POST['consulta']=='recuperar-contrasena'){
			
			$q=mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$_POST[email]'");
			$n=mysqli_num_rows($q);
			
			if($n<1){
				echo "Lo sentimos, no se ha encontrado una cuenta con esa dirección de correo electrónico";
			}else{
				
				$data=mysqli_fetch_array($q);
				
				$email=$data['email'];
				$asunto="Enlace para la recuperación de tu contraseña";
				$mensaje="
					<p><b>Hola $data[nombre]!</b></p>
					<p>Según lo solicitaste te estamos enviando el enlace para la recuperación de tu contraseña:</p>
					<p><a href='".URL."index.php?content=recuperar-contrasena&val=$data[id]&token=$data[password]'>".URL."index.php?content=recuperar-contrasena&val=$data[id]&token=$data[password]</a></p>
					<p>Por favor haga click en el enlace o copie y pegue la dirección en su navegador para completar el procedimiento.</p>
					
				";
				
				$notificar = notificar($email,$asunto,$mensaje);
				
				if($notificar==0){
					echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
				}else{
					echo "Hemos enviado un enlace para la recuperación de su contraseña a la dirección de correo electrónico relacionada. En caso de no recibirlo por favor revise su bandeja de correo no deseado.";
				}
			}
		}
	
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE PEDIDOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// GENERAR EL DETALLE DEL PEDIDO
		if($_POST['consulta'] == 'detalleDelPedido'){
			$pedido = $_POST['pedido'];
			$q = mysqli_query($con, "
				SELECT
					*
				FROM
					publicacionesxpedido
				WHERE
					pedido = '$pedido'
			");
			$n = mysqli_num_rows($q);
			if($n < 1){
				$html = ""; 
				$html .= "<tr><td colspan='3' class='text-center'>";
				$html .= "¿Aún no tienes publicaciones en tu pedido?<br />";
				$html .= "Visita nuestras <a href='/obras'><b>Guias y Obras Editoriales</b></a>";
				$html .= "</td></tr>";
				mysqli_query($con, "UPDATE pedidos SET valor = '0' WHERE id = '$pedido'");
				echo $html;
			}else{
				$total = 0;
				while($row = mysqli_fetch_assoc($q)){
					$html .= "<tr id='codigo$row[publicacion]'>";
					$html .= "	<td>".getNombrePublicacion($row['publicacion'])."</td>";
					$html .= "	<td class='text-center'>USD ".getPrecioPublicacion($row['publicacion'])."</td>";
					$html .= "	<td>";
					$html .= "		<p class='text-center'>";
					$html .= "			<button class='btn btn-default eliminarItem$row[publicacion]' codigo='$row[publicacion]'>";
					$html .= "				<i class='fa fa-trash'></i>";
					$html .= "			</button>";
					$html .= "		</p>";
					$html .= "	</td>";
					$html .= "</tr>";
					$html .= "<script>";
					$html .= "	$('.eliminarItem$row[publicacion]').click(function(){";
					$html .= "		cargar();";
					$html .= "		$.post('/includes/php.php',{ consulta: 'eliminaDelPedido', item: '$row[publicacion]', pedido: $.cookie('pedido') })";
					$html .= "		.done(function(data){";
					$html .= "			if( data == 0 ){";
					$html .= "				alert('Se ha presentado un error. Por favor intente de nuevo');";
					$html .= "				descargar();";
					$html .= "			} else {";
					$html .= "				contenidoDelPedido();";
					$html .= "				labelProductos();";
					$html .= "				descargar();";
					$html .= "			}";
					$html .= "		})";
					$html .= "	})";
					$html .= "</script>";
					$total += getPrecioPublicacion($row['publicacion']);
				}
				$html .= "<tr>";
				$html .= "	<td class='text-right'><b>TOTAL A PAGAR</b></td>";
				$html .= "	<td colspan='2' class='text-center'><b>USD ".number_format($total,2)."</b></td>";
				$html .= "</tr>";
				mysqli_query($con, "UPDATE pedidos SET valor = '$total' WHERE id = '$pedido'");
				echo $html;
			}
		}
		
		if($_POST['consulta'] == 'eliminaDelPedido'){
			$item = $_POST['item'];
			$pedido = $_POST['pedido'];
			if(!mysqli_query($con, "
				DELETE FROM
					publicacionesxpedido
				WHERE
					pedido = '$pedido'
				AND
					publicacion = '$item'
			")){
				echo 0;
			}else{
				echo 1;
			}
		}
		
		if($_POST['consulta']=='valorDelPedido'){
			echo getValorDeLaOrden($_POST['orden']);
		}
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE PAGOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// OBTENER MEDIOS DE PAGO
		if( $_POST['consulta'] == 'obtenerMediosDePago' ){
			
			$pais = $_POST['pais'];
			
			$html = "";
			$html .= "<option value=''>Selecciona tu medio de pago preferido ...</option>";
			$html .= "<option value='1'>Tarjeta de Crédito</option>";
			$html .= "<option value='2'>Paypal</option>";
			if( $pais == 'CO' ){
				$html .= "<option value='3'>Transferencia Bancaria - PSE</option>";
				$html .= "<option value='4'>Puntos VIA Baloto</option>";
			}elseif( $pais == 'MX' ){
				$html .= "<option value='5'>OXXO - 7 Eleven</option>";
			}elseif( $pais == 'PE' ){
				$html .= "<option value='6'>Banco de Crédito - BCP</option>";
			}
			echo $html;
			
		}
		
		// PROCESAMIENTO DE PAGOS VÍA PAYPAL
		if($_REQUEST['consulta']=='pagarConPaypal'){
			
			$orden = $_REQUEST['orden'];
			$urlCancela = $_REQUEST['urlCancela'];
			
			pagarConPaypal($orden,$urlCancela);
			
		}
		
		// OBTENER FORMULARIOS DE PAGO
		if( $_POST['consulta'] == 'obtenerFormularioDePago' ){
			
			$metodo = $_POST['metodo'];
			$valor = 7.99;
			
			// Proceso de pago con tarjeta de crédito
			if( $metodo == 1 ){
				$tipopago = "pagoTarjetaDeCredito";
				$titulo = "<i class='fa fa-credit-card'></i> Pagar con tarjeta de crédito";
				$mensaje = "";
				$mensaje .= "	<div class='row'>";
				$mensaje .= "		<div class='col-md-3 form-group'>";
				$mensaje .= "			<select class='form-control' name='tipoTarjeta' id='tipoTarjeta' required >";
				$mensaje .= "				<option value=''>Tipo de tarjeta ...</option>";
				$mensaje .= "				<option value='VISA'>VISA</option>";
				$mensaje .= "				<option value='MASTERCARD'>MASTERCARD</option>";
				$mensaje .= "				<option value='AMEX'>AMEX</option>";
				$mensaje .= "				<option value='DINERS'>DINERS</option>";
				$mensaje .= "			</select>";
				$mensaje .= "		</div>";
				$mensaje .= "		<div class='col-md-4 form-group'>";
				$mensaje .= "			<input type='text' class='form-control' name='noTarjeta' id='noTarjeta' placeholder='Número de tarjeta' required />";
				$mensaje .= "		</div>";
				$mensaje .= "		<div class='col-md-5 form-group'>";
				$mensaje .= "			<input type='text' class='form-control' name='nombreTarjeta' id='nombreTarjeta' placeholder='Nombre tarjeta' required />";
				$mensaje .= "		</div>";
				$mensaje .= "	</div>";
				$mensaje .= "	<div class='row'>";
				$mensaje .= "		<div class='col-md-4 form-group'>";
				$mensaje .= "			<select class='form-control' name='mesTarjeta' id='mesTarjeta' required >";
				$mensaje .= "				<option value=''>Mes vencimiento</option>";
				$mensaje .= "				<option value='01'>01</option>";
				$mensaje .= "				<option value='02'>02</option>";
				$mensaje .= "				<option value='03'>03</option>";
				$mensaje .= "				<option value='04'>04</option>";
				$mensaje .= "				<option value='05'>05</option>";
				$mensaje .= "				<option value='06'>06</option>";
				$mensaje .= "				<option value='07'>07</option>";
				$mensaje .= "				<option value='08'>08</option>";
				$mensaje .= "				<option value='09'>09</option>";
				$mensaje .= "				<option value='10'>10</option>";
				$mensaje .= "				<option value='11'>11</option>";
				$mensaje .= "				<option value='12'>12</option>";
				$mensaje .= "			</select>";
				$mensaje .= "		</div>";
				$mensaje .= "		<div class='col-md-4 form-group'>";
				$mensaje .= "			<select class='form-control' name='yearTarjeta' id='yearTarjeta' required >";
				$mensaje .= "				<option value=''>Año vencimiento</option>";
				$mensaje .= "				<option value='2015'>2015</option>";
				$mensaje .= "				<option value='2016'>2016</option>";
				$mensaje .= "				<option value='2017'>2017</option>";
				$mensaje .= "				<option value='2018'>2018</option>";
				$mensaje .= "				<option value='2019'>2019</option>";
				$mensaje .= "				<option value='2020'>2020</option>";
				$mensaje .= "				<option value='2021'>2021</option>";
				$mensaje .= "				<option value='2022'>2022</option>";
				$mensaje .= "				<option value='2023'>2023</option>";
				$mensaje .= "				<option value='2024'>2024</option>";
				$mensaje .= "				<option value='2025'>2025</option>";
				$mensaje .= "			</select>";
				$mensaje .= "		</div>";
				$mensaje .= "		<div class='col-md-4 form-group'>";
				$mensaje .= "			<input type='text' class='form-control' name='codigoSeguridad' id='codigoSeguridad' placeholder='Código de seguridad' required />";
				$mensaje .= "		</div>";
				$mensaje .= "		<input type='hidden' name='vrPedido' id='vrPedido' value='3.5' />";
				$mensaje .= "		<input type='hidden' name='pedido' id='pedido' value='CF".$_SESSION['id']."' />";
				$mensaje .= "		<input type='hidden' name='email' id='email' value='".getEmailUsuario($_SESSION['id'])."' />";
				$mensaje .= "		<input type='hidden' name='ciudad' id='ciudad' value='".getCiudadUsuario($_SESSION['id'])."' />";
				$mensaje .= "		<input type='hidden' name='cuotas' id='cuotas' value='1' />";
				$mensaje .= "	</div>";
				$mensaje .= "<script type='text/javascript'>";
				$mensaje .= "	$('#$tipopago').validate({";
				$mensaje .= "		submitHandler: function(form){";
				$mensaje .= "			$('#myNuevoModal').modal('hide');";
				$mensaje .= "			cargar();";
				$mensaje .= "			$.post('/includes/payu/loadTarjetasDeCredito.php',$('#$tipopago').serialize())";
				$mensaje .= "			.done(function(data){";
				$mensaje .= "				var response = JSON.parse(data);";
				$mensaje .= "				procesaInscripcionConferencia(
											$_SESSION[id],
											$metodo,
											response.transactionResponse.transactionId,
											response.transactionResponse.state,
											$valor
										);";
				$mensaje .= "			})";
				$mensaje .= "		}";
				$mensaje .= "	})";
				$mensaje .= "</script>";
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-credit-card'></i> Pagar</button>";
			}
			
			// Proceso de pago vía Paypal
			if( $metodo == 2 ){
				
				$tipopago = "pagoPaypal";
				$titulo = "<i class='fa fa-paypal'></i> Pagar con Paypal";
				$mensaje = "";
				
				$urlCancela = URL . '/inscripcion-conferencia';
				
				$data=array(
					'merchant_email'=>'pfhurtado@phronesisvirtual.com',
					'product_name'=>'Compra en elartedesabervivir.com',
					'amount'=>$valor,
					'currency_code'=>'USD',
					'thanks_page'=>URL.'includes/php.php?consulta=almacenaInscripcion&usuario='.$_SESSION['id'].'&metodo=2&estado=1',
					'notify_url'=>URL,
					'cancel_url'=>URL.'includes/php.php?consulta=almacenaInscripcion&usuario='.$_SESSION['id'].'&metodo=2&estado=0&url='.$urlCancela,
					'paypal_mode'=>false,
				);
	
				define( 'SSL_URL', 'https://www.paypal.com/cgi-bin/webscr' );
				define( 'SSL_SAND_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
		
				$action = '';
				$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
		
				$mensaje .= '<input type="hidden" name="business" value="' . $data['merchant_email'] . '" />';
				$mensaje .= '<input type="hidden" name="notify_url" value="' . $data['notify_url'] . '" />';
				$mensaje .= '<input type="hidden" name="cancel_return" value="' . $data['cancel_url'] . '" />';
				$mensaje .= '<input type="hidden" name="return" value="' . $data['thanks_page'] . '" />';
				$mensaje .= '<input type="hidden" name="rm" value="2" />';
				$mensaje .= '<input type="hidden" name="lc" value="" />';
				$mensaje .= '<input type="hidden" name="no_shipping" value="1" />';
				$mensaje .= '<input type="hidden" name="no_note" value="1" />';
				$mensaje .= '<input type="hidden" name="currency_code" value="' . $data['currency_code'] . '" />';
				$mensaje .= '<input type="hidden" name="page_style" value="paypal" />';
				$mensaje .= '<input type="hidden" name="charset" value="utf-8" />';
				$mensaje .= '<input type="hidden" name="item_name" value="' . $data['product_name'] . '" />';
				$mensaje .= '<input type="hidden" value="_xclick" name="cmd"/>';
				$mensaje .= '<input type="hidden" name="amount" value="' . $data['amount'] . '" />';
				$mensaje .= '<p>Ahora será dirigido a plataforma de Paypal para procesar su transacción.</p>';
				
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-paypal'></i> Continuar</button>";
				
			}
			
			// Proceso de pago PSE
			if( $metodo == 3 ){
				
				$tipopago = "pagoConPSE";
				$titulo = "<i class='fa fa-university'></i> Pagar con Transferencia Bancaria PSE";
				
				require_once('payu/PayU.php');

				Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
				Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
				Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
				
				PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
				PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
				PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
				PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
				PayU::$isTest = true; //Dejarlo True cuando sean pruebas.
				
				$parameters = array(
					PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
					PayUParameters::COUNTRY => PayUCountries::CO,
				);
				$array=PayUPayments::getPSEBanks($parameters);
				$banks=$array->banks;
				
				$html="<option value=''>Seleccione banco...</option>";
				
				foreach ($banks as $bank) {
					$html.="<option value='".$bank->pseCode."'>".$bank->description."</option>";
				}
				
				$mensaje = "";
				$mensaje .= "<div class='row'>";
				$mensaje .= "	<div class='col-md-6 form-group'>";
				$mensaje .= "		<select class='form-control' name='bancos' id='bancos' required >";
				$mensaje .= $html;
				$mensaje .= "		</select>";
				$mensaje .= "	</div>";
				$mensaje .= "	<div class='col-md-6 form-group'>";
				$mensaje .= "		<input type='text' class='form-control' name='noIdentificacion' id='noIdentificacion' placeholder='No. Identificacion' required />";
				$mensaje .= "	</div>";
				$mensaje .= "</div>";
				
				$mensaje .= "<input type='hidden' name='tipoPersona' id='tipoPersona' value='N' />";
				$mensaje .= "<input type='hidden' name='nombreCompleto' id='nombreCompleto' value='".getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id'])."' />";
				$mensaje .= "<input type='hidden' name='emailPSE' id='emailPSE' value='".getEmailUsuario($_SESSION['id'])."' />";
				$mensaje .= "<input type='hidden' name='telefonoDiurno' id='telefonoDiurno' value='5717442384' />";
				$mensaje .= "<input type='hidden' name='pedido' id='pedido' value='CONF".$_SESSION['id']."' />";
				$mensaje .= "<input type='hidden' name='vrPedido' id='vrPedido' value='$valor' />";
				$mensaje .= "<input type='hidden' name='consulta' id='consulta' value='pseRequest' />";
				$mensaje .= "<input type='hidden' name='email' id='email' value='".getEmailUsuario($_SESSION['id'])."' />";
				
				$mensaje .= "<script>";
				$mensaje .= "	$('#$tipopago').validate({";
				$mensaje .= "		submitHandler: function(form){";
				$mensaje .= "			$('#myNuevoModal').modal('hide');";
				$mensaje .= "			cargar();";
				$mensaje .= "			$.post('/includes/php.php',$('#$tipopago').serialize())";
				$mensaje .= "			.done(function(data){";
				$mensaje .= "				var response = JSON.parse(data);";
				$mensaje .= "				almacenaPendientePSE(";
				$mensaje .= "					'$_SESSION[id]',";
				$mensaje .= "					'2',";
				$mensaje .= "					'$metodo',";
				$mensaje .= "					response.transactionResponse.transactionId,";
				$mensaje .= "					'$valor',";
				$mensaje .= "					response.transactionResponse.extraParameters.BANK_URL";
				$mensaje .= "				)";
				$mensaje .= "			})";
				$mensaje .= "		}";
				$mensaje .= "	})";
				$mensaje .= "</script>";
				
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-university'></i> Continuar</button>";
				
			}
			
			// Proceso de pago VIA Baloto
			if( $metodo == 4 ){
				
				$tipopago = "pagoConBaloto";
				$titulo = "<i class='fa fa-money'></i> Pagos en puntos VIA Baloto";
				
				$mensaje = "";
				$mensaje .= "<div class='row'>";
				$mensaje .= "	<div class='col-md-12 form-group'>";
				$mensaje .= "		<input type='text' class='form-control' name='noDocumentoBaloto' id='noDocumentoBaloto' placeholder='Número de documento' required />";
				$mensaje .= "	</div>";
				$mensaje .= "</div>";
				
				$mensaje .= "<input type='hidden' name='noPedido' id='noPedido' value='CONF".$_SESSION['id']."' />";
				$mensaje .= "<input type='hidden' name='vrPedido' id='vrPedido' value='$valor' />";
				$mensaje .= "<input type='hidden' name='email' id='email' value='".getEmailUsuario($_SESSION['id'])."' />";
				$mensaje .= "<input type='hidden' name='nombreCompleto' id='nombreCompleto' value='".getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id'])."' />";
				$mensaje .= "<input type='hidden' name='consulta' id='consulta' value='requestBaloto' />";
				
				$mensaje .= "<script>";
				$mensaje .= "	$('#$tipopago').validate({";
				$mensaje .= "		submitHandler: function(form){";
				$mensaje .= "			cargar();";
				$mensaje .= "			$.post('/includes/php.php',$('#$tipopago').serialize())";
				$mensaje .= "			.done(function(data){";
				$mensaje .= "				var response = JSON.parse(data);";
				$mensaje .= "				almacenaPendientePSE(";
				$mensaje .= "					'$_SESSION[id]',";
				$mensaje .= "					'2',";
				$mensaje .= "					'$metodo',";
				$mensaje .= "					response.transactionResponse.transactionId,";
				$mensaje .= "					'$valor',";
				$mensaje .= "					response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML";
				$mensaje .= "				)";
				$mensaje .= "			})";
				$mensaje .= "		}";
				$mensaje .= "	})";
				$mensaje .= "</script>";
				
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-money'></i> Continuar</button>";
				
			}
			
			if( $metodo == 5 ){
				
				$tipopago = "pagoConOxxo";
				$titulo = "<i class='fa fa-money'></i> Pagos en puntos OXXO - 7 Eleven";
				
				$mensaje = "";
				$mensaje .= "<div class='row'>";
				$mensaje .= "	<div class='col-md-12'>";
				$mensaje .= "		<input type='text' class='form-control' name='noDocumentoOxxo' id='noDocumentoOxxo' placeholder='Número documento' required />";
				$mensaje .= "		<input type='hidden' name='noPedido' id='noPedido' value='CONF$_SESSION[id]' />";
				$mensaje .= "		<input type='hidden' name='vrPedido' id='vrPedido' value='$valor' />";
				$mensaje .= "		<input type='hidden' name='consulta' id='consulta' value='oxxoRequest' />";
				$mensaje .= "		<input type='hidden' name='nombreOxxo' id='nombreOxxo' value='".getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id'])."' />";
				$mensaje .= "	</div>";
				$mensaje .= "</div>";
				
				$mensaje .= "<script>";
				$mensaje .= "	$('#$tipopago').validate({";
				$mensaje .= "		submitHandler: function(form){";
				$mensaje .= "			cargar();";
				$mensaje .= "			$.post('/includes/php.php',$('#$tipopago').serialize())";
				$mensaje .= "			.done(function(data){";
				//$mensaje .= "					alert(data);";
				$mensaje .= "				var response = JSON.parse(data);";
				$mensaje .= "				almacenaPendientePSE(";
				$mensaje .= "					'$_SESSION[id]',";
				$mensaje .= "					'2',";
				$mensaje .= "					'$metodo',";
				$mensaje .= "					response.transactionResponse.transactionId,";
				$mensaje .= "					'$valor',";
				$mensaje .= "					response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML";
				$mensaje .= "				)";
				$mensaje .= "			})";
				$mensaje .= "		}";
				$mensaje .= "	})";
				$mensaje .= "</script>";
				
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-money'></i> Continuar</button>";
				
			}
			
			if( $metodo == 6 ){
				
				$tipopago = "pagoConBcp";
				$titulo = "<i class='fa fa-money'></i> Pagos en Banco de Crédito - BCP";
				
				$mensaje = "";
				$mensaje .= "<div class='row'>";
				$mensaje .= "	<div class='col-md-12'>";
				$mensaje .= "		<input type='text' class='form-control' name='noDocumentoBcp' id='noDocumentoBcp' placeholder='Número documento' required />";
				$mensaje .= "		<input type='hidden' name='noPedido' id='noPedido' value='CONF$_SESSION[id]' />";
				$mensaje .= "		<input type='hidden' name='vrPedido' id='vrPedido' value='$valor' />";
				$mensaje .= "		<input type='hidden' name='consulta' id='consulta' value='bcpRequest' />";
				$mensaje .= "		<input type='hidden' name='nombreBcp' id='nombreBcp' value='".getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id'])."' />";
				$mensaje .= "	</div>";
				$mensaje .= "</div>";
				
				$mensaje .= "<script>";
				$mensaje .= "	$('#$tipopago').validate({";
				$mensaje .= "		submitHandler: function(form){";
				$mensaje .= "			cargar();";
				$mensaje .= "			$.post('/includes/php.php',$('#$tipopago').serialize())";
				$mensaje .= "			.done(function(data){";
				//$mensaje .= "					alert(data);";
				$mensaje .= "				var response = JSON.parse(data);";
				$mensaje .= "				almacenaPendientePSE(";
				$mensaje .= "					'$_SESSION[id]',";
				$mensaje .= "					'2',";
				$mensaje .= "					'$metodo',";
				$mensaje .= "					response.transactionResponse.transactionId,";
				$mensaje .= "					'$valor',";
				$mensaje .= "					response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML";
				$mensaje .= "				)";
				$mensaje .= "			})";
				$mensaje .= "		}";
				$mensaje .= "	})";
				$mensaje .= "</script>";
				
				$envio = "<button type='submit' class='btn btn-primary'><i class='fa fa-money'></i> Continuar</button>";
				
			}
			
			$html = "";
			
			if($metodo == 2){
				$html .= '<form name="'.$tipopago.'" action="' . SSL_URL . '" method="post">';
			}else{
				$html .= "<form id='$tipopago'>";
			}
			
			$html .= "<div class='modal-header'>";
			$html .= "	<h4>".$titulo."</h4>";
			$html .= "</div>";
			$html .= "<div class='modal-body'>";
			$html .= $mensaje;
			$html .= "</div>";
			$html .= "<div class='modal-footer'>";
			$html .= $envio;
			$html .= "</div>";
			$html .= "</form>";
			echo $html;
			
		}
		
		// REQUEST DE PSE
		if( $_POST['consulta'] == 'pseRequest' ){
			
			require_once('payu/PayU.php');

		    	$reference = $_POST['pedido'];
			$value = $_POST['vrPedido'];
			
			Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
			Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
			Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
			
		     //Estos Datos son para hacer pruebas.. cuando pase a produccion toca colocar aca los datos del cliente
			PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
			PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
			PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
			$accountId = "501716";
			
			$parameters = array(
				
				PayUParameters::ACCOUNT_ID => $accountId,
				PayUParameters::REFERENCE_CODE => $reference,
				PayUParameters::DESCRIPTION => "Tu compra en Phronesis, el arte de saber vivir.",
				
				PayUParameters::VALUE => $value,
				PayUParameters::CURRENCY => "USD",
				
				PayUParameters::BUYER_EMAIL => $_POST['email'],
				PayUParameters::PAYER_NAME => $_POST['nombreCompleto'],
				PayUParameters::PAYER_EMAIL => $_POST['email'],
				PayUParameters::PAYER_CONTACT_PHONE=> $_POST['telefonoDiurno'],
					   
				PayUParameters::PSE_FINANCIAL_INSTITUTION_CODE => $_POST['bancos'],
				PayUParameters::PAYER_PERSON_TYPE => $_POST['tipoPersona'],
				PayUParameters::PAYER_DNI => $_POST['noIdentificacion'],
				PayUParameters::PAYER_DOCUMENT_TYPE => 'N',
			
				PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
			   
				PayUParameters::COUNTRY => PayUCountries::CO,
				
				PayUParameters::IP_ADDRESS => "127.0.0.1",
				PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
				PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
			   
			);
				
			$response = PayUPayments::doAuthorizationAndCapture($parameters);
			
			if($response){
				$response->transactionResponse->orderId;
				$response->transactionResponse->transactionId;
				$response->transactionResponse->state;
				if($response->transactionResponse->state)
				if($response->transactionResponse->state=="PENDING"){
					$response->transactionResponse->pendingReason;
					$response->transactionResponse->extraParameters->BANK_URL;		
				}
				$response->transactionResponse->responseCode;		  
			}
			
			echo json_encode($response);	
			
		}
		
		// Almacenar pago inscripcion PSE
		if( $_POST['consulta'] == 'almacenaPendientePSE' ){
			if(!mysqli_query($con, "
			   INSERT INTO
			   	inscritos_conferencia (
			   		usuario_id,
			   		estado_inscripcion,
			   		metodo_pago,
			   		transaction_id,
			   		valor_inscripcion
			   	) VALUES (
			   		'$_SESSION[id]',
			   		'$_POST[estado]',
			   		'$_POST[metodo]',
			   		'$_POST[idtransaccion]',
			   		'$_POST[valor]'
			   	)
			")){
			   echo mysqli_error($con);
			}else{
			   echo 1;
			}
		}
		
		// REQUEST DE BALOTO
		if( $_POST['consulta'] == 'requestBaloto' ){
			
			require_once('payu/PayU.php');
			Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
			Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
			Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
			
			PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
			PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
			PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
				
			$reference = $_POST['noPedido'];
			$value = $_POST['vrPedido'];
			
			$parameters = array(
				PayUParameters::ACCOUNT_ID => "501716",
				PayUParameters::REFERENCE_CODE => $reference,
				PayUParameters::DESCRIPTION => "Tu compra en Phronesis | El arte de saber vivir",
				PayUParameters::VALUE => $value,
				PayUParameters::CURRENCY => "USD",
				PayUParameters::BUYER_EMAIL => $_POST['email'],
				PayUParameters::PAYER_NAME => $_POST['nombreCompleto'],
				PayUParameters::PAYER_DNI=> $_POST['noDocumentoBaloto'],
				PayUParameters::PAYMENT_METHOD => PaymentMethods::BALOTO,
				PayUParameters::COUNTRY => PayUCountries::CO,
				PayUParameters::EXPIRATION_DATE => "2015-09-26T00:00:00",
				PayUParameters::IP_ADDRESS => "127.0.0.1",   
			);
				
			$response = PayUPayments::doAuthorizationAndCapture($parameters);
			
			if($response){
				$response->transactionResponse->orderId;
				$response->transactionResponse->transactionId;
				$response->transactionResponse->state;
				if($response->transactionResponse->state=="PENDING"){
					$response->transactionResponse->pendingReason;
					$response->transactionResponse->extraParameters->URL_PAYMENT_RECEIPT_HTML;
					$response->transactionResponse->extraParameters->REFERENCE;
				}
				$response->transactionResponse->responseCode;		  
			} 
			
			print json_encode($response);
			
		}
		
		// REQUEST DE OXXO - 7 ELEVEN
		if( $_POST['consulta'] == 'oxxoRequest' ){
			
			require_once('payu/PayU.php');
			Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
			Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
			Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
			
			PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
			PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
			PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
			
			$reference = $_POST['noPedido'];
			$value = $_POST['vrPedido'];
			
			$parameters = array(
			
				PayUParameters::ACCOUNT_ID => "501789",
				PayUParameters::REFERENCE_CODE => $reference,
				PayUParameters::DESCRIPTION => "Tu compra en Phronesis | El arte de saber vivir",
				
				PayUParameters::VALUE => $value,
				PayUParameters::CURRENCY => "USD",
				
				PayUParameters::BUYER_EMAIL => $_POST['emailOxxo'],
				PayUParameters::PAYER_NAME => $_POST['nombreOxxo'],
				PayUParameters::PAYER_DNI=> $_POST['noDocumentoOxxo'],
				
				PayUParameters::PAYMENT_METHOD => PaymentMethods::OXXO,
				
				PayUParameters::COUNTRY => PayUCountries::MX,
				
				PayUParameters::EXPIRATION_DATE => "2015-09-27T00:00:00",
				PayUParameters::IP_ADDRESS => "127.0.0.1",
			
			);
			
			$response = PayUPayments::doAuthorizationAndCapture($parameters);
			
			if($response){
				
				$response->transactionResponse->orderId;
				$response->transactionResponse->transactionId;
				$response->transactionResponse->state;
				
				if($response->transactionResponse->state=="PENDING"){
					$response->transactionResponse->pendingReason;
					$response->transactionResponse->extraParameters->URL_PAYMENT_RECEIPT_HTML;
					$response->transactionResponse->extraParameters->REFERENCE;
				}
				
				$response->transactionResponse->responseCode;		  
			
			} 
			
			print json_encode($response);
			
		}
		
		// BCP REQUEST
		if( $_POST['consulta'] == 'bcpRequest' ){
			
			require_once('payu/PayU.php');
			
			//Quitar estas variables de entorno para poder pasar a producccion
			//Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi"); 
			//Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi"); 
			//Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/"); 
			//Fin variables de Entorno
			
			// Variables de producción
			Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
			Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
			Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/'); 
			// Fin variables de producción
			
			//Estos Datos son para hacer pruebas.. cuando pase a produccion toca colocar aca los datos del cliente
			PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
			PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
			PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
			PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
			PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
			
			$reference = $_POST['noPedido'];
			$value = $_POST['vrPedido'];
			
			$parameters = array(
			//Ingrese aquí el identificador de la cuenta.
			PayUParameters::ACCOUNT_ID => "501790",
			//Ingrese aquí el código de referencia.
			PayUParameters::REFERENCE_CODE => $reference,
			//Ingrese aquí la descripción.
			PayUParameters::DESCRIPTION => "Tu compra en Phronesis | El arte de saber vivir",
			
			// -- Valores --
			//Ingrese aquí el valor.        
			PayUParameters::VALUE => $value,
			//Ingrese aquí la moneda.
			PayUParameters::CURRENCY => "USD",
			
			//Ingrese aquí el email del comprador.
			PayUParameters::BUYER_EMAIL => $_POST['emailBcp'],
			//Ingrese aquí el nombre del pagador.
			PayUParameters::PAYER_NAME => $_POST['nombreBcp'],
			//Ingrese aquí el documento de contacto del pagador.
			PayUParameters::PAYER_DNI=> $_POST['noDocumentoBcp'],
			
			//Ingrese aquí el nombre del método de pago
			PayUParameters::PAYMENT_METHOD => PaymentMethods::BCP,
			
			//Ingrese aquí el nombre del pais.
			PayUParameters::COUNTRY => PayUCountries::PE,
			
			//Ingrese aquí la fecha de expiración.
			PayUParameters::EXPIRATION_DATE => "2015-10-02T04:00:00",
			//IP del pagadador
			PayUParameters::IP_ADDRESS => "127.0.0.1",
			
			);
			
			$response = PayUPayments::doAuthorizationAndCapture($parameters);
			
			if($response){
				$response->transactionResponse->orderId;
				$response->transactionResponse->transactionId;
				$response->transactionResponse->state;
				if($response->transactionResponse->state=="PENDING"){
					$response->transactionResponse->pendingReason;
					$response->transactionResponse->extraParameters->URL_PAYMENT_RECEIPT_HTML;
					$response->transactionResponse->extraParameters->REFERENCE;
					$response->transactionResponse->extraParameters->EXPIRATION_DATE;      
				}
				$response->transactionResponse->responseCode;		  
			}   
			
			print json_encode($response);
			
		}
		
		// ALMACENAR PAGOS
		if( 
			($_POST['consulta'] == 'almacenaInscripcion') || 
			($_REQUEST['consulta'] == 'almacenaInscripcion' )
		){
			if($_REQUEST['metodo']==2){
				$metodo=2;
			}else{
				$metodo=$_POST['metodo'];
			}
			
			if( $metodo == 2 ){
				$usuario = $_REQUEST['usuario'];
				$idtransaccion=0;
				$estadotransaccion=$_REQUEST['estado'];
			}else{
				$usuario = $_POST['usuario'];
				$idtransaccion = $_POST['idtransaccion'];
				$estadotransaccion = $_POST['estadotransaccion'];	
			}
			
			$valor = $_POST['valor'];
			
			$estados = array(
				'PENDING'=>'2',
				'APPROVED'=>'1',
				'DECLINED'=>'0'
			);
			
			if( $metodo != 2 ){
				$estado = $estados[$_POST['estadotransaccion']];
			}else{
				$estado = $_REQUEST['estado'];
			}
			
			$displayEstado = array(
				'0'=>'DECLINADO/CANCELADO',
				'1'=>'APROBADO',
				'2'=>'PENDIENTE'
			);
			
			if(!mysqli_query($con, "
				INSERT INTO `inscritos_conferencia`(`usuario_id`, `estado_inscripcion`, `metodo_pago`, `transaction_id`, `valor_inscripcion`) VALUES ('$usuario','$estado','$metodo','$idtransaccion','$valor')
			")){
				echo "<p>Lo sentimos, se ha presentado un error. Por favor intente de nuevo. ".mysqli_error($con).".</p>";
			}else{
				
				$mensaje = "";
				$mensaje .= "<p>Hola ".getNombreUsuario($usuario).",</p>";
				$mensaje .= "<p>Queremos informarle que el pago de la inscripción en nuestra conferencia virtual ha sido: ".$displayEstado[$estado]."</p>";
				if( $estado == 1 ){
					$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";
				}elseif( $estado == 0 ){
					$mensaje .= "<p>Le invitamos a que lo intente nuevamente con otro medio de pago.</p>";
				}elseif( $estado == 2 ){
					$mensaje .= "<p>Pronto estará recibiendo información adicional acerca del estado de su transacción.</p>";
				}
				
				$notificar = notificar(getEmailUsuario($usuario),"Acerca de tu proceso de inscripción",$mensaje);
				
				if($notificar == 0){
					echo "<p>Lo sentimos, se ha presentado un error. Por favor intente de nuevo. (msg)</p>";
				}else{
					if( $metodo == 2 ){
						header('Location: ' . URL . '/inscripcion-conferencia');
					}else{
						echo $mensaje;
					}
				}
			}
		}
		
		// ACTUALIZA PAGOS INSCRIPCIONES
		if( 
			($_POST['consulta'] == 'actualizaInscripcion')
		){
			if($_REQUEST['metodo']==2){
				$metodo=2;
			}else{
				$metodo=$_POST['metodo'];
			}
			
			if( $metodo == 2 ){
				$usuario = $_REQUEST['usuario'];
				$idtransaccion=0;
				$estadotransaccion=$_REQUEST['estado'];
			}else{
				$usuario = $_POST['usuario'];
				$idtransaccion = $_POST['idtransaccion'];
				$estadotransaccion = $_POST['estadotransaccion'];	
			}
			
			$valor = $_POST['valor'];
			
			$estados = array(
				'PENDING'=>'2',
				'APPROVED'=>'1',
				'DECLINED'=>'0'
			);
			
			if( $metodo != 2 ){
				$estado = $estados[$_POST['estadotransaccion']];
			}else{
				$estado = $_REQUEST['estado'];
			}
			
			$displayEstado = array(
				'0'=>'DECLINADO/CANCELADO',
				'1'=>'APROBADO',
				'2'=>'PENDIENTE'
			);
			
			if(!mysqli_query($con, "
				UPDATE 
					`inscritos_conferencia`
				SET
					`estado_inscripcion` = '$estado'
				WHERE
					`transaction_id` = '$idtransaccion'
			")){
				echo "<p>Lo sentimos, se ha presentado un error. Por favor intente de nuevo. ".mysqli_error($con).".</p>";
			}else{
				
				$mensaje = "";
				$mensaje .= "<p>Hola ".getNombreUsuario($usuario).",</p>";
				$mensaje .= "<p>Queremos informarle que el pago de la inscripción en nuestra conferencia virtual ha sido: ".$displayEstado[$estado]."</p>";
				if( $estado == 1 ){
					$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";
				}elseif( $estado == 0 ){
					$mensaje .= "<p>Le invitamos a que lo intente nuevamente con otro medio de pago.</p>";
				}elseif( $estado == 2 ){
					$mensaje .= "<p>Pronto estará recibiendo información adicional acerca del estado de su transacción.</p>";
				}
				
				$notificar = notificar(getEmailUsuario($usuario),"Acerca de tu proceso de inscripción",$mensaje);
				
				if($notificar == 0){
					echo "<p>Lo sentimos, se ha presentado un error. Por favor intente de nuevo. (msg)</p>";
				}else{
					if( $metodo == 2 ){
						header('Location: ' . URL . '/inscripcion-conferencia');
					}else{
						echo $mensaje;
					}
				}
			}
		}
		
		// PROCESAR INSCRIPCIONES PENDIENTES
		if($_GET['consulta']=='inscripcionesPendientes'){
			
			$sql="SELECT * FROM inscritos_conferencia WHERE estado_inscripcion = 2";
			$q=mysqli_query($con, $sql);
			$n=mysqli_num_rows($q);
			if($n>0){
				
				while($p=mysqli_fetch_assoc($q)){
					
					require_once('payu/PayU.php');
			
					Environment::setPaymentsCustomUrl('https://api.payulatam.com/payments-api/4.0/service.cgi'); 
					Environment::setReportsCustomUrl('https://api.payulatam.com/reports-api/4.0/service.cgi'); 
					Environment::setSubscriptionsCustomUrl('https://api.payulatam.com/payments-api/rest/v4.3/');
				
					PayU::$apiKey = "7bhsvnos9mpnerq6dofvelbsuo"; //Ingrese aquí su propio apiKey.
					PayU::$apiLogin = "1450d5486b82225"; //Ingrese aquí su propio apiLogin.
					PayU::$merchantId = "500968"; //Ingrese aquí su Id de Comercio.
					PayU::$language = SupportedLanguages::ES; //Seleccione el idioma.
					PayU::$isTest = false; //Dejarlo True cuando sean pruebas.
					$accountId = "501716";
				
					$parameters = array(PayUParameters::TRANSACTION_ID => "$p[transaction_id]");
				
					$response = PayUReports::getTransactionResponse($parameters);
					
					if ($response) {
						$response->state;
						$response->trazabilityCode;
						$response->authorizationCode;
						$response->responseCode;
						$response->operationDate;
					}
					
					if( $response->state != 'PENDING' ){
						
						$status = 0;
						if( $response->state == 'APPROVED' ){
							$status = 1;
						}
						
						if(!mysqli_query($con, "UPDATE inscritos_conferencia SET estado_inscripcion = '$status' WHERE transaction_id = '$p[transaction_id]'")){
							
							echo 0;
						
						}else{
						
							$estado = array(
								'1'=>'Aprobado',
								'0'=>'Declinado/Cancelado'
							);
							$mensaje = "";
							$mensaje .= "<p>Hola ".getNombreUsuario($p['usuario_id']).",</p>";
							$mensaje .= "<p>Queremos informarle que el estado del pago de su inscripción a nuestra conferencia virtual es: $estado[$status].</p>";
							if( $status = 0 ){
								$mensaje .= "<p>Por favor intente nuevamente su inscripción utilizando otro medio de pago.</p>";
							}else{
								$mensaje .= "<p>Pronto estaremos enviándole la información correspondiente para su acceso a la conferencia virtual.</p>";
							}
							
							$notificar = notificar(getEmailUsuario($p['usuario_id']),'Estado de pago de su inscripción a la conferencia virtual',$mensaje);
							if($notificar==1){
								echo "1";
							}else{
								echo "0";
							}
						}
						
					}
					
				}
			}
			
		}
		
		// EJECUCIÓN DE PAGOS
		if($_REQUEST['consulta']=='ejecutarPago'){
			
			$orden = $_REQUEST['orden'];
			$formaDePago = $_REQUEST['formaDePago'];
			$estado = $_REQUEST['estado'];
			
			// Actualizar la información de la orden
			$q=mysqli_query($con, "
				UPDATE
					pedidos
				SET
					status = '$estado',
					formaPago = '$formaDePago'
				WHERE
					id = '$orden'
			");
			
			if(!$q){
				
				echo('<script>alert("Lo sentimos, se ha presentado un error. Por favor consúltenos a través del formulario de contacto acerca del estado de su orden.");</script>');
				echo('<script>window.location.href="'.URL.'";</script>');
			
			}else{
				
				if($estado==3){
					
					echo('<meta http-equiv="refresh" content="0;url='.$_REQUEST['url'].'" />');
					
				}
				
				if($estado==2){
					
					// Si la orden fué aprobada, entregamos el pedido
					$entrega = entregarPedido($orden);
					
					if($entrega == 0){
				
						echo('<script>alert("Lo sentimos, se ha presentado un error. Por favor consúltenos a través del formulario de contacto acerca del estado de su orden. (1)");</script>');
						echo('<script>window.location.href="'.URL.'";</script>');
						
					}else{
						
						$notifica = notificarOrden($orden,$estado);
						
						if($notifica == 0){
							
							echo('<script>alert("Lo sentimos, se ha presentado un error. Por favor consúltenos a través del formulario de contacto acerca del estado de su orden. (2)");</script>');
							
							echo('<script>window.location.href="'.URL.'";</script>');	
						
						}else{
							
							echo('<meta http-equiv="refresh" content="0;url='.URL.'mi-cuenta/mis-publicaciones" />');
							
						}
						
					}
					
				}
				
			}
			
		}
		
		// ENVIAR NOTIFICACIONES CON COMPROBANTE DE PAGO
		if($_POST['consulta']=='notificaComprobante'){
			$mensaje = "";
			$mensaje .= "<p>Estimado(a) ".getNombreUsuario($_POST['usuario']).",</p>";
			$mensaje .= "<p>A continuación encontrará el enlace para la generación del comprobante de su pago en efectivo en caso tal de que llegue a requerirlo nuevamente.</p>";
			$mensaje .= "<h1><a href='$_POST[url]'>Haga click aquí para generar el comprobante</a></h1>";
			$mensaje .= "<p>Gracias por tu interés en nuestra conferencia virtual.</p>";
			notificar(getEmailUsuario($_POST['usuario']),'Comprobante de pago: Inscripción Conferencia Virtual',$mensaje);
		}
		
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE ARTÍCULOS
	
	/////////////////////////////////////////////////////////////////////////
	
		if($_POST['consulta']=='cargarArticulos'){
			$load=htmlentities(strip_tags($_POST['load'])) * 8;
			$sql="SELECT * FROM articulos WHERE status = 1 AND categoria != 1 ";
			if($_POST['categoria']>0){
				$sql.="AND categoria LIKE '%$_POST[categoria]%'";
			}
			$sql.=" ORDER BY fecha_publicacion DESC LIMIT ".$load.",8";
			$q=mysqli_query($con, $sql);
			while($row=mysqli_fetch_assoc($q)){
				echo getArticuloCategoria($row['id']);
			}
		}
		
		// Buscador de artículos
		if($_POST['consulta'] == 'buscarArticulos'){
			$q = mysqli_query($con, "
				(SELECT id, titulo, contenido FROM articulos WHERE titulo LIKE '%" . 
		           $_POST['buscarArticulo'] . "%' OR contenido LIKE '%" . $_POST['buscarArticulo'] ."%')
			");
			if(!$q){
				echo 0;
			}else{
				$n = mysqli_num_rows($q);
				if($n < 1){
					echo "<p>Lo sentimos, no se han encontrado coincidencias.</p>";
				} else {
					$html.="";
					$html.="<p class='pull-right'><b>$n resultados encontrados.</b></p>";
					while($r = mysqli_fetch_assoc($q)){
						$html .= "<div class='row busquedaResultado'>";
						$html .= "<div class='col-md-12'>";
						$html .= "<p><b><a href='index.php?content=articulo&id=$r[id]'>$r[titulo]</a></b></p>";
						$html .= "<p>".limit_words(strip_tags($r['contenido']),15)."</p>";
						$html .= "<p><a href='index.php?content=articulo&id=$r[id]'>Leer artículo...</a></p>";
						$html .= "</div>";
						$html .= "</div>";
					}
					echo $html;
				}
			}
		} 
		
	/////////////////////////////////////////////////////////////////////////
	
	// CRON JOBS
	
	/////////////////////////////////////////////////////////////////////////

		// Envío del newsletter	
		if(
			($_REQUEST['consulta'] == 'newsletter') &&
			($_REQUEST['id']) == '80234042'
		){
			
			$con_sendy = mysqli_connect("localhost","elarte_phrosapp","Z,'VT,?x3*LdjMvR","elarte_sendy")or die('ERROR DB');
			mysqli_query($con_sendy, "set NAMES utf8");
			
			//$day = 'Tue';
			$day = date('D');
			
			$limit = array(
			   "Fri" => "100000",
			   "Sat" => "100000 OFFSET 100000",
			   "Sun" => "100000 OFFSET 200000",
			   "Mon" => "100000 OFFSET 300000",
			   "Tue" => "100000 OFFSET 400000",
			   "Wed" => "100000 OFFSET 500000",
			   "Thu" => "100000 OFFSET 600000"
			);
			
			$limit_query = $limit[$day];
			
			// CREAR MENSAJE
			$msg = "";
			$q_msg = mysqli_query($con, "SELECT id, titulo, imagen, contenido FROM articulos WHERE categoria != 1 AND status = 1 ORDER BY fecha_publicacion DESC LIMIT 3");
			while($a = mysqli_fetch_assoc($q_msg)){
			   $msg .= "
			   	<table align='center'>
			   		<tr>
			   			<td style='border-bottom: solid 5px #6A127A'>
			   				<p style='font-size: 18px'>
			   					<a 
			   						href='".URL."/articulos/$a[id]' 
			   						target='_blank'
			   						style='text-decoration: none; color: #6A127A'
			   					>
			   						$a[titulo]
			   					</a>
			   				</p>
			   			</td>
			   		</tr>
			   		<tr>
			   			<td style='border-bottom: solid 1px #6A127A'>
			   				<p>
			   					<a
			   						href='".URL."/articulos/$a[id]'
			   						target='_blank'
			   						>
			   						<img 
			   							width='240'
			   							style='float:left; margin: 10px 10px 10px 0; max-width: 40%'
			   							src='".URL."/admin/_lib/file/imgarticulos/$a[imagen]' 
			   						/>
			   					</a>
			   					".strip_tags(getFirstPara($a['contenido']))."
			   				</p>
			   				<p>
			   					<a 
			   						href='".URL."/articulos/$a[id]'
			   						target='_blank'>
			   						Leer más...
			   					</a>
			   				</p>
			   			</td>
			   		</tr>
			   	</table>
			   ";
			}
			
			$html = file_get_contents(NOTIFICACION);
			$html= str_replace("{{contenido}}",$msg,$html);
			$html= str_replace("{{email}}","[Email]",$html);
			
			// CREAR LISTA DE ENVIO EN SENDY
			if(!mysqli_query($con_sendy, "
			   INSERT INTO
			   	lists (
			   		app,
			   		userID,
			   		name
			   	) VALUES (
			   		'1',
			   		'1',
			   		'Newsletter - ".date('Y-m-d')."'
			   	)
			")){
			   
			   echo('<p>No se pudo crear la lista de envio</p>');
			
			}else{
			   
			   $id_lista = mysqli_insert_id($con_sendy);
			   
			   // CREACION DE LOS SUSCRIPTORES EN LA LISTA
			   //$q = mysqli_query($con, "SELECT email FROM newsletter WHERE optin = 1 LIMIT ".$limit_query);
			   $q = mysqli_query($con, "SELECT email FROM newsletter WHERE optin = 1");
			   $n = mysqli_num_rows($q);
			   
			   if($n > 0){
			
				   while( $s = mysqli_fetch_assoc($q) ){
				   	if(!mysqli_query($con_sendy, "
				   		INSERT INTO
				   			subscribers (
				   				userID,
				   				name,
				   				email,
				   				list,
				   				confirmed
				   			) VALUES (
				   				'1',
				   				'1',
				   				'$s[email]',
				   				'$id_lista',
				   				'1'
				   			)
				   	")){
				   		echo("<p>No se pudo migrar el registro: $s[email]</p>");
				   	}else{
				   		echo("<p>$s[email] ha sido migrado exitosamente.</p>");
				   	}
				   }
				   
				   // CREACIÓN DE LA CAMPAÑA
				   if(!mysqli_query($con_sendy, "
				   	INSERT INTO
				   		campaigns (
				   			userID,
				   			app,
				   			from_name,
				   			from_email,
				   			reply_to,
				   			title,
				   			html_text,
				   			to_send_lists,
				   			bounce_setup,
				   			complaint_setup
				   		) VALUES (
				   			'1',
				   			'1',
				   			'Editorial Phronesis',
				   			'info@phronesisvirtual.com',
				   			'info@phronesisvirtual.com',
				   			'Esta semana en elartedesabervivir.com',
				   			'".mysqli_real_escape_string($con_sendy, $html)."',
				   			'$id_lista',
				   			'1',
				   			'1'
				   		)
				   ")){
				   	echo "<p>No se pudo crear la campana. ".mysqli_error($con_sendy)."</p>";
				   }else{
				   	echo "Campaña creada en forma exitosa";
				   }
			   
			   }
			   
			}
			
		}
		
	/////////////////////////////////////////////////////////////////////////
	
	// VARIOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// INSCRIPCIONES CONFERENCIA VIRTUAL
		if($_POST['consulta'] == 'conferencia'){
			if(!mysqli_query($con, "
				INSERT INTO
					conferencia (
						email
					) VALUES (
						'$_POST[email]'
					)
			")){
				echo 0;
			}else{
				agregaListaNewsletter($_POST['email']);
				echo "<p>Gracias por tu interés. Pronto te estaremos informando acerca de este magnifico evento.</p>";
			}
		}

?>
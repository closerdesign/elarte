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

	if ( isset($_POST['consulta']) ) {
		switch ($_POST['consulta']) {
			case 'registro':
				registroDeUsuarios();
				break;
			case 'registroDeUsuariosFacebook':
				registroDeUsuariosFacebook();
				break;
			case 'login':
				inicioSesion();
				break;
			case 'email-registro':
				verificaEmailCorreo();
				break;
			case 'cambiar-contrasena':
				actualziarContrasena();
				break;
			case 'validar-codigo-descuento':
				validarCodigoDescuento();
				break;
			case 'logErroresPagos':
				logErroresPagos();
				break;
			case 'optin':
				optin();
				break;
			case 'actualizaPerfil':
				actualizaPerfil();
				break;
			case 'descarga':
				descarga();
				break;
			case 'agregar':
				agregar();
				break;
			case 'delPub':
				borrarPublicacion();
				break;
			case 'nueva-contrasena':
				nuevaContrasena();
				break;
			case 'cierra-pedido':
				cerrarPedido();
				break;
			case 'pedidoPendiente':
				pedidoPendiente();
				break;
			case 'contacto':
				contacto();
				break;
			case 'compartirAmigo':
				compartirAmigo();
				break;
			case 'agregarFavoritos':
				agregarFavoritos();
				break;
			case 'eliminaFavoritos':
				eliminaFavoritos();
				break;
			case 'agregarComentarios':
				agregarComentarios();
				break;
			case 'detallePedido':
				detallePedido();
				break;
			case 'delordenpub':
				delordenpub();
				break;
			case 'descargaMuestra':
				descargaMuestra();
				break;
			case 'descripcion':
				descripcion();
				break;
			case 'newsletter':
				newsletter();
				break;
			case 'cerrarSesion':
				cerrarSesion();
				break;
			case 'finRegistro':
				finRegistro();
				break;
			case 'verificaEmail':
				verificaEmail();
				break;
			case 'verificaEmailRegistro':
				verificaEmailRegistro();
				break;
			case 'emailFacebook':
				emailFacebook();
				break;
			case 'iniciaFb':
				iniciaFb();
				break;
			case 'publicacionesPedido':
				publicacionesPedido();
				break;
			case 'detallesPedido':
				detallesPedido();
				break;
			case 'procesaPaquete':
				procesaPaquete();
				break;
			case 'crearOrdenPaquete':
				crearOrdenPaquete();
				break;
			case 'recuperar-contrasena':
				recuperarContrasena();
				break;
			case 'detalleDelPedido':
				detalleDelPedido();
				break;
			case 'eliminaDelPedido':
				eliminaDelPedido();
				break;
			case 'valorDelPedido':
				valorDelPedido();
				break;
			case 'obtenerMediosDePago':
				obtenerMediosDePago();
				break;
			case 'obtenerMediosDePago2':
				obtenerMediosDePago2();
				break;
			case 'obtenerFormularioDePago':
				obtenerFormularioDePago();
				break;
			case 'obtenerFormularioDePago2':
				obtenerFormularioDePago2();
				break;
			case 'pseRequest':
				pseRequest();
				break;
			case 'almacenaPendientePSE':
				almacenaPendientePSE();
				break;
			case 'requestBaloto':
				requestBaloto();
				break;
			case 'oxxoRequest':
				oxxoRequest();
				break;
			case 'bcpRequest':
				bcpRequest();
				break;
			case 'almacenaInscripcion':
				almacenaInscripcion();
				break;
			case 'actualizaInscripcion':
				actualizaInscripcion();
				break;
			case 'notificaComprobante':
				notificaComprobante();
				break;
			case 'cargarArticulos':
				cargarArticulos();
				break;
			case 'buscarArticulos':
				buscarArticulos();
				break;
			case 'requestPayPal':
				requestPayPal();
				break;
			case 'requestPayPalTradicional':
				requestPayPalTradicional();
				break;
			case 'requestPayPalPaquete':
				requestPayPalPaquete();
				break;
			case 'descargarArchivosProgramas':
				descargarArchivosProgramas();
				break;
			case 'validarLoggeo':
				validarLoggeo();
				break;
			case 'getAjaxArticle':
				getAjaxArticle();
				break;
			case 'agregarSubComentarios':
				agregarSubComentarios();
				break;
			case 'getPrecioPaquete':
				consultarPrecioPaquete();
				break;
			case 'getPrecioPaquete2':
				consultarPrecioPaquete2();
				break;
			default:
				break;
		}
	}

	if ( isset($_GET['consulta']) ) {
		switch ($_GET['consulta']) {
			case 'pagarConPaypal':
				pagarConPaypal2();
				break;
			case 'inscripcionesPendientes':
				inscripcionesPendientes();
				break;
			case 'ejecutarPago':
				ejecutarPago();
				break;
			case 'validarListaPedidosPendientes':
				validarListaPedidosPendientes();
				break;
			case 'aprobarPedidoNum':
				aprobarPedidoNum();
				break;
			case 'enviarConferenciaNotificacion':
				enviarConferenciaNotificacion();
				break;
			default:
				# code...
				break;
		}
	}
	
	/*if ( $argv[1] == 'inscripcionesPendientes' ) {
		inscripcionesPendientes();
	}*/

	function enviarConferenciaNotificacion()
	{
		global $con;

		$sql = "SELECT * FROM usuarios usu JOIN publicacionesxusuario pub ON pub.usuario = usu.id AND usu.conferencia != 1 WHERE pub.publicacion = 21 GROUP BY pub.usuario ORDER BY pub.usuario ASC";
		/*SELECT * FROM `publicacionesxusuario` pub LEFT JOIN usuarios usu ON pub.usuario = usu.id WHERE `publicacion` = 21 GROUP BY usuario ORDER BY `publicacion` ASC*/

		$q = mysqli_query($con, $sql);

		/*$response = notificar('lpaloma@phronesisvirtual.com','Confirmación de compra',$mensaje);*/
		/*$response = notificar('ralvarez@phronesisvirtual.com','Confirmación de compra',$mensaje);*/
		/*$response = notificar('pfhurtado@phronesisvirtual.com','Confirmación de compra',$mensaje);*/
		/*$response = notificar('smorales@phronesisvirtual.com','Confirmación de compra',$mensaje);
		$response = notificar('fgaravito@phronesisvirtual.com','Confirmación de compra',$mensaje);
		$response = notificar('msandoval@phronesisvirtual.com','Confirmación de compra',$mensaje);
		$response = notificar('nfonseca@phronesisvirtual.com','Confirmación de compra',$mensaje);*/
		
		while($item=mysqli_fetch_assoc($q)){
			$mensaje = 'Hola '.getNombreUsuario($item['id']).' <br> <br>';

			$mensaje .= '<p>Gracias por tu registro a <strong>“Conferencia virtual – Enamórate de ti, por Walter Riso”</strong> <br> Recuerda, se realizará el sábado 5 de diciembre de 2015.</p>';

			$mensaje .= '<p>Ten presente el horario de acuerdo a tu ciudad de residencia:</p><br>';
			$mensaje .= '
				<table border="1" cellpadding="3" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>
								Ciudad
							</th>
							<th>
								Hora
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								Los Ángeles, San Francisco, Las Vegas.
							</td>
							<td style="text-align: right;">
								11:00 a.m.
							</td>
						</tr>
						<tr>
							<td>
								México, Guatemala, Tegucigalpa, San Salvador, San José, Managua.
							</td>
							<td style="text-align: right;">
								1:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Bogotá, Lima, Quito, Panamá, Miami, Nueva York.
							</td>
							<td style="text-align: right;">
								2:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Caracas.
							</td>
							<td style="text-align: right;">
								2:30 p.m.
							</td>
						</tr>
						<tr>
							<td>
								San Juan, Sucre.
							</td>
							<td style="text-align: right;">
								3:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Buenos Aires, Asunción, Santiago, Montevideo.
							</td>
							<td style="text-align: right;">
								4:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Buenos Aires, Asunción, Santiago, Montevideo.
							</td>
							<td style="text-align: right;">
								4:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Sao Paulo.
							</td>
							<td style="text-align: right;">
								5:00 p.m.
							</td>
						</tr>
						<tr>
							<td>
								Madrid, Barcelona.
							</td>
							<td style="text-align: right;">
								8:00 p.m.
							</td>
						</tr>
					</tbody>
				</table>
			';

			$mensaje .= '<p><a href="http://www.timeanddate.com/worldclock/fixedtime.html?p1=41&iso=20151205T14&msg=Conferencia%20Virtual%20-%20Enam%C3%B3rate%20de%20ti&ah=2&low=5">Consulta aquí el horario en otras ciudades</a></p><br>';

			$mensaje .= '<p style="text-align: justify;">Para acceder a la conferencia debes ingresar el día del evento a <a href="http://www.elartedesabervivir.com">www.elartedesabervivir.com</a> e iniciar sesión con tu usuario y contraseña; allí encontrarás la información necesaria. No obstante, días antes de la conferencia te enviaremos un email con todas las instrucciones.</p><br>';
			$mensaje .= '<p><strong>¿Necesitas más información?</strong></p>
			<p>
				<strong>Llámanos:</strong>
			</p>
			<p>
				<strong>Colombia:</strong> + 571 3819084 <br>
				<strong>Estados Unidos:</strong> +1 305 2304729 <br>
				<strong>México:</strong> +525 541 708262 <br>
			</p>
			<p>
				<strong>O escríbenos</strong><br>
				<strong>Email:</strong> info@phronesisvirtual.com<br>
				<strong>Skype:</strong> editorialphronesis<br>
				<strong>Facebook:</strong> <a href="https://www.facebook.com/phronesisvirtual">https://www.facebook.com/phronesisvirtual</a><br>
				<strong>Twitter:</strong> <a href="https://twitter.com/phronesisvir">@phronesisvir</a><br>
			</p>
			<br>';
			$mensaje .= '<p>¡Nos vemos pronto!</p>';
			$mensaje .= '<p><strong>El equipo Phrónesis</strong></p>';
			
			$sql2 = 'UPDATE usuarios SET `conferencia` = 1 WHERE `usuarios`.`id` = '.$item['id'];
			
			notificar( getEmailUsuario($item['id']) ,'Confirmación de compra',$mensaje);
			
			if(!mysqli_query($con, $sql2)){
				echo 'Usuario Actualizado: '.$item['id'].'<br>';
			}
		}
	}

	function consultarPrecioPaquete()
	{
		$id = $_POST['id'];
		$data = getDataPaquete($id);

		
		$result = array(
						'precio' => $data['precio'],
						'nombre' => $data['nombre'],
						'error'  => 0
					);
		
		echo json_encode($result);
	}
	
	function consultarPrecioPaquete2()
	{
		$id = $_POST['id'];
		$data = getDataPaquete2($id);

		
		$result = array(
						'paquete_id' => $data['idPaquete'],
						'precio' => $data['precio'],
						'nombre' => $data['nombre'],
						'error'  => 0
					);
		
		echo json_encode($result);
	}

	function getAjaxArticle()
	{
		global $con;

		$num_articles = 10;

		if ( !empty( $_REQUEST['page'] ) ) {
			$page = (int)$_REQUEST['page'];
			if ( $page < 0 ) {
				$page = 1;
			}
		}else{
			$page = 1;
		}

		$inicia_desde = ($page - 1) * $num_articles;

		if ( !empty( $_REQUEST['categoria'] ) ) {
			$categoria = (int)$_REQUEST['categoria'];
			$sql = "SELECT * FROM articulos WHERE categoria = $categoria ORDER BY fecha_publicacion DESC LIMIT $inicia_desde, $num_articles ";
		}else{
			$sql = "SELECT * FROM articulos where programas_especiales = 0 AND status = 1 AND fecha_publicacion < now() ORDER BY fecha_publicacion DESC LIMIT $inicia_desde, $num_articles ";
		}

		/*echo $sql;*/

		$q = mysqli_query($con, $sql);

		$html = "";

		while($item=mysqli_fetch_assoc($q)){
			if ( (int)$item['programas_especiales'] > 0 ) {
				$alias = getProgramaData( (int)$item['programas_especiales'] );
			}

			$titulo = removeUnwantedChars($item['titulo']);

			$html.='
				<div class="col-lg-6 col-md-6 col-sm-6 articulos-container" data-sr="enter bottom and scale up 20% over 2s">
					<div class="articulos">
						<a href="/index.php?'.( (int)$item['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' ).'content=articulos&titulo='.$titulo.'&id='.$item['id'].'">
								<img class="img img-responsive" src="/admin/_lib/file/imgarticulos/'.$item['imagen'].'" alt="'.$item['titulo'].'" />
						</a>
						<div class="articulos-inner">
							<h4><a href="/index.php?'.( (int)$item['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' ).'content=articulos&titulo='.$titulo.'&id='.$item['id'].'" title="'.$item['titulo'].'">'.$item['titulo'].'</a></h4>
							<p>'.custom_echo(strip_tags($item['contenido'])).'</p>
						</div>
					</div>
					<div class="cta-blog">
						<p><a item-programa="'.(int)$item['programas_especiales'].'" href="/index.php?'.( (int)$item['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' ).'content=articulos&titulo='.$titulo.'&id='.$item['id'].'" title="Leer la nota"><i class="fa fa-plus-square"></i> Leer la nota</a></p>
					</div>
				</div>
			';
		}

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$result['error'] = 0;
			$result['html'] = $html;
			echo json_encode($result);
			return;
		}else{
			return $html;
		}

	}

	function descargarArchivosProgramas()
	{
		chdir('..');

		$path = getcwd().'/archivos-programas/';

		chdir('includes');

		$fichero = $_POST['file_name'];
		$alias = $_POST['alias'].'/';
		$fichero = $path.$alias.$fichero;

		if (class_exists('finfo')) {
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (is_object($finfo)) {
				if (file_exists($fichero)) {
				    header('Content-Description: File Transfer');
				    header('Content-Type: '.$finfo->file($fichero));
				    header('Content-Disposition: attachment; filename='.basename($fichero));
				    header('Expires: 0');
				    header('Cache-Control: must-revalidate');
				    header('Pragma: public');
				    header('Content-Length: ' . filesize($fichero));
				    readfile($fichero);
				    exit;
				}
			}
		} else {
			echo 'fileinfo did not installed';
		}
		die('Hay problema con tus archivos.');
	}

	function aprobarPedidoNum()
	{
		$codigo = 'QazWsx123!';

		if ( !empty($_GET['codigo']) && $_GET['codigo'] == $codigo && !empty($_GET['pedido']) && is_numeric($_GET['pedido']) ) {
			$pedido_id = $_GET['pedido'];
			$pedido_array = getPedido($pedido_id);
			if ( !empty($pedido_array) ) {
				if ( actualizaOrdenPaquete($pedido_id, 2, null, null, 'APPROVED', 'APPROVED', null) ){
					if ( entregarPedido($pedido_id) ) {
						echo "pedido entregado";
					}else{
						echo "problema al entregar el pedido";
					}
				}else{ 
					echo "problema al actualizar el pedido";
				}
			}
		}else{
			echo "error en la consulta";
		}
	}
	
	function logErroresPagos()
	{
		global $con;
		extract($_POST);
		if ( isset($id_usuario) && !empty($id_usuario) 
			&& isset($url) && !empty($url)
			&& isset($metodo) && !empty($metodo)
		) {

			switch ( $metodo ) {
				case 1:
					$metodo = 'Tarjeta de Crédito';
					break;

				case 2:
					$metodo = 'Paypal';
					break;

				case 3:
					$metodo = 'Transferencia Bancaria - PSE';
					break;

				case 4:
					$metodo = 'Puntos VIA Baloto';
					break;

				case 5:
					$metodo = 'OXXO';
					break;

				case 6:
					$metodo = 'Banco de Crédito - BCP';
					break;
				
				default:
					# code...
					break;
			}

			if(!mysqli_query($con, "
				INSERT INTO
					log_pagos (
						id_usuario,
						url,
						metodo,
						fecha
					) VALUES (
						'$id_usuario',
						'$url',
						'$metodo',
						NOW()
					)
			")){
				$result['error'] = 0;
				$result['message'] = 'Ha ocurrido un error en el registro del log.';
				echo json_encode($result);
				return;
			}else{
				$date = date('m/d/Y h:i:s a', time());
				$id=mysqli_insert_id($con);
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$template=NOTIFICACION;
				$html=file_get_contents($template);
				$contenido="
					<p>
						<strong>ID Usuario: </strong>$id_usuario
					</p>
					<p>
						<strong>URL: </strong>$url
					</p>
					<p>
						<strong>Método: </strong>$metodo
					</p>
					<p>
						<strong>Fecha: </strong>$date
					</p>
				";
				$html=str_replace("{{contenido}}",$contenido,$html);         
				$mail = new PHPMailer();
				$mail->From = 'no-reply@phronesisvirtual.com';
				$mail->FromName = 'Phronesis | El arte de saber vivir';
				$mail->Subject = utf8_decode('Ha ocurrido un error de pago con '.$metodo);
				$mail->Body = utf8_decode($html);
				$mail->IsHTML(true);
				$mail->AddAddress('pfhurtado@phronesisvirtual.com');
				$mail->AddAddress('lpaloma@phronesisvirtual.com');
				/*$mail->AddReplyTo($_POST['']);*/
				if(!$sent_mail= $mail->Send()){
					$result['error'] = 0;
					$result['message'] = 'Registro log fallido.';
					echo json_encode($result);
					return;
				}else{
					$result['error'] = 1;
					$result['message'] = 'Registro log exitoso.';
					echo json_encode($result);
					return;
				}
			}
		}
	}

	function validarCodigoDescuento()
	{
		global $con;

		extract($_POST);

		if ( isset($_SESSION['total_discount']) && isset($_SESSION['descuento']) && isset($_SESSION['total_discount']) ) {
			$response['error']   = 3;
			$response['message'] = '<div class="alert alert-danger">Ya se ha ingresado un código de descuento.</div>';
			echo json_encode($response);
			return;
		}else{
			if (isset($codigo) && !empty($codigo) && !isset($_SESSION['total_discount']) && !isset($_SESSION['descuento']) ) {
				$sql_pre = "SELECT * FROM descuentos WHERE codigo like '".$codigo."'";
				$q_pre = mysqli_query($con, $sql_pre);

				$n = mysqli_num_rows($q_pre);
				
				if($n < 1){
					$response['error'] = 1;
					$response['message'] = '<div class="alert alert-danger">Este no es un código de descuento válido.</div>';
				}else{
					$data_pre = mysqli_fetch_array($q_pre, true);
					if ( $data_pre['porcentaje'] != 0 ) {
						$_SESSION['tipo_descuento'] = 'porcentaje';
						$_SESSION['descuento'] = $data_pre['porcentaje'];
						$response['html']           = '<div class="row">
		                                <div class="col-lg-12 text-rigth">
		                                    <b>Descuento de código:</b> -%<span class="CompraPaquetes-discount">'.$_SESSION['descuento'].'</span>
		                                </div>
		                            </div>';
	                   	$_SESSION['total_discount'] = $total_dis = $total * (1 - ( 1/$_SESSION['descuento'] ));
					}else if ( $data_pre['cantidad'] != 0 ){
						$_SESSION['tipo_descuento'] = 'cantidad';
						$_SESSION['descuento'] = $data_pre['cantidad'];
						$response['html']           = '<div class="row">
		                                <div class="col-lg-12 text-rigth">
		                                    <b>Descuento de código:</b> USD -<span class="CompraPaquetes-discount">'.$_SESSION['descuento'].'</span>
		                                </div>
		                            </div>';
	                   	$_SESSION['total_discount'] = $total_dis = $total - $_SESSION['descuento'] ;
					}
					$response['error']          = 0;
					$response['message']        = '<div class="alert alert-success">Tu código es válido</div>';
					$response['tipo_descuento'] = $_SESSION['tipo_descuento'];
					$response['descuento']      = $_SESSION['descuento'];
					$response['total']      	= $total_dis;

					
					echo json_encode($response);
					return;
				}
				echo json_encode($response);
				return;
			}else{
				$response['error'] = 2;
				$response['message'] = '<div class="alert alert-danger">Debes ingresar un código para aplicar algún descuento.</div>';
				echo json_encode($response);
				return;
			}
		}
	}

	// Registro de usuarios
	function registroDeUsuarios()
	{
		global $con;
		extract($_POST);
		$email = strtolower($email);
		if ( !empty($email) && !empty($password) ) {
			if(!mysqli_query($con, "
				INSERT INTO
					usuarios (
						email,
						password,
						status,
						optin,
						perfil,
						URLRegistro
					) VALUES (
						'$email',
						'".md5($password)."',
						'0',
						'1',
						'0',
						'$currentUrlPaul'
					)
			")){
				$result['error'] = 0;
				$result['message'] = 'Ha ocurrido un error en el registro de usuario.';
				echo json_encode($result);
				return;
			}else{
				$_SESSION['id']=mysqli_insert_id($con);
				agregaListaNewsletter($email);
				$result['error'] = 1;
				$result['message'] = 'Registro exitoso.';
				echo json_encode($result);
				return;
			}
		}else{
			$result['error'] = 0;
			$result['message'] = 'Error. No se ha enviado el correo y el password.';
			echo json_encode($result);
			return;
		}
	}
	function registroDeUsuariosFacebook($fbId, $nombreCompleto, $nombre, $apellido, $email, $url_actual)
	{
		global $con;
		$email = strtolower($email);
		if ( !empty($email) ) {
			if ( verificaEmailRegistro($email) ) {
				if(!mysqli_query($con, "
					INSERT INTO
						usuarios (
							fbId,
							nombreCompleto,
							nombre,
							apellido,
							email,
							status,
							optin,
							perfil,
							URLRegistro
						) VALUES (
							'$fbId',
							'$nombreCompleto',
							'$nombre',
							'$apellido',
							'$email',
							'0',
							'1',
							'0',
							'elartedesabervivir.com$url_actual'
						)
				")){
					$result['error'] = 0;
					$result['message'] = 'Ha ocurrido un error en el registro de usuario.';
					/*echo json_encode($result);*/
					return false;
				}else{
					$_SESSION['id']=mysqli_insert_id($con);
					agregaListaNewsletter($email);
					$result['error'] = 1;
					$result['message'] = 'Registro exitoso.';
					/*echo json_encode($result);*/
					return true;
				}
			}else{
				$result['error'] = 0;
				$result['message'] = 'Error. El correo ya esta registrado.';
				/*echo json_encode($result);*/
				return false;	
			}
		}else{
			$result['error'] = 0;
			$result['message'] = 'Error. No se ha enviado el correo.';
			/*echo json_encode($result);*/
			return false;
		}
	}
	
	// Inicio de sesión
	function inicioSesion()
	{
		global $con;
		extract($_POST);
		$usuario = strtolower($usuario);
		if ( !empty($usuario) && !empty($password) && !empty($url) ) {
			$sql_pre = "SELECT ps FROM usuarios WHERE email = '$usuario' LIMIT 1";
			$q_pre = mysqli_query($con, $sql_pre);
			$data_pre = mysqli_fetch_array($q_pre);
			
			if($data_pre['ps']==0){
				$sql="SELECT id FROM usuarios WHERE email = '$usuario' AND password = '".md5($password)."'";
			}else{
				$sql="SELECT id FROM usuarios WHERE email = '$usuario' AND password = '".md5("Is8IaahjYe3NiERKNnaLaQcJxJiVYnw0ap84ckWIPTjAboqLSmg4yL1R".$password)."'";
			}
			
			$q=mysqli_query($con, $sql);
			$n=mysqli_num_rows($q);
			if($n!=1){
				$result['error'] = 0;
				$result['message'] = 'Se ha presentado un error al iniciar sesión.';
				echo json_encode($result);
				return;
			}else{
				$id=mysqli_fetch_array($q);
				$_SESSION['id']=$id['id'];
				$_SESSION['sesion']=logRegistros($id['id'],$url);
				$result['error'] = 1;
				$result['message'] = 'Inicio de sesión exitosa.';
				$result['id'] = $id['id'];
				echo json_encode($result);
				return;
			}
		}else{
			$result['error'] = 0;
			$result['message'] = 'Error. No se han enviado los parámetros requeridos.';
			echo json_encode($result);
			return;
		}
	}
	
	// Verificación de correo electrónico
	function verificaEmailCorreo()
	{
		global $con;
		extract($_POST);
		$email = strtolower($usuario);
		if( !empty($email) ){
			$n=mysqli_num_rows(mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$email'"));
			if($n>0){
				$result['error'] = false;
				$result['message'] = 'El correo ha sido encontrado.';
				echo json_encode($result);
				return;
			}else{
				$result['error'] = true;
				$result['message'] = 'El correo no ha sido encontrado.';
				echo json_encode($result);
				return;
			}
		}
	}
	
	// Actualización de contraseña
	function actualziarContrasena()
	{
		global $con;
		extract($_POST);
		if( 
			isset($usuario) 
			&& !empty($usuario) 
			&& isset($current_password) 
			&& !empty($current_password) 
			&& isset($new_password) 
			&& !empty($new_password) 
		){
			$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE id = '$_POST[usuario]' AND password = '".md5($_POST['current_password'])."'"));
			if($n!=1){
				$result['error'] = 0;
				$result['message'] = "La contraseña actual no coincide. Los datos lo pudieron ser actualizados.";
				echo json_encode($result);
				return;
			}else{
				if(!mysqli_query($con, "UPDATE usuarios SET password = '".md5($_POST['new_password'])."' WHERE id = '$_POST[usuario]'")){
					$result['error'] = 0;
					$result['message'] = "Lo sentimos, se ha presentado un error procesando su solicitud. Por favor intente de nuevo.";
					echo json_encode($result);
					return;
				}else{
					mysqli_query($con, "UPDATE usuarios SET ps = '0' WHERE id = '$_POST[usuario]'");
					$result['error'] = 1;
					$result['message'] = "Su contraseña ha sido actualizada exitosamente.";
					echo json_encode($result);
					return;
				}
			}
		}else{
			$result['error'] = 0;
			$result['message'] = "No se han enviado los parametros necesarios.";
			echo json_encode($result);
			return;
		}
	}
	
	// Optin
	function optin()
	{
		global $con;
		$actual = mysqli_fetch_array(mysqli_query($con, "SELECT optin FROM usuarios WHERE id = '$_POST[usuario]'"));
		$nuevo = $actual['optin'] == 1 ? 0 : 1;
		if(!mysqli_query($con, "UPDATE usuarios SET optin = '$nuevo' WHERE id = '$_POST[usuario]'")){
			echo "Los datos no pudieron ser actualizados. Inténtelo de nuevo.";
		}else{
			echo "La información ha sido actualizada correctamente";
		}
	}

	// Mi perfil
	function actualizaPerfil()
	{
		global $con;
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
	function descarga()
	{
		global $con;
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
	function agregar()
	{				
		global $con;
		
		if( empty($_POST['pedido']) || $_POST['pedido'] === 'NaN' ){
			$q=mysqli_query($con, "INSERT INTO pedidos (usuario) VALUES ('$_POST[usuario]')");
			$id=mysqli_insert_id($con);
			setcookie('pedido', $id);
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
				actualizaPedido($id);
				echo $id;
			}	
		}
	}
	
	// Borrar publicación
	function borrarPublicacion()
	{
		global $con;
		if(!mysqli_query($con, "DELETE FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]' AND publicacion = '$_POST[publicacion]'")){
			echo "Lo sentimos, se ha presentado un error. Por favor intente de nuevo.";
		}else{
			echo "Publicación eliminada exitosamente.";
		}
	}
	
	// Configurar nueva contraseña
	function nuevaContrasena()
	{
		global $con;
		$q=mysqli_query($con, "SELECT * FROM usuarios WHERE id = '$_POST[usuario]' AND password = '$_POST[token]'");
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo "Lo sentimos, se ha presentado un error o los datos son inconsistentes. Por favor verifique.";
		}else{
			if(!mysqli_query($con, "UPDATE usuarios SET password = '".md5($_POST['password'])."' WHERE id = '$_POST[usuario]'")){
				echo "Lo sentimos, se ha presentado un error, por favor inténtelo de nuevo.";
			}else{
				mysqli_query($con, "UPDATE usuarios SET ps = '0' WHERE id = '$_POST[usuario]'");
				echo "Contraseña actualizada exitosamente. Por favor ingrese con sus nuevas credenciales.";
			}
		}
	}
	
	// Cerrar pedido
	function cerrarPedido()
	{
		global $con;
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
	function pedidoPendiente()
	{
		global $con;
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
	function contacto()
	{
		global $con;
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
	function compartirAmigo()
	{
		global $con;
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
	function agregarFavoritos()
	{
		global $con;
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
	function eliminaFavoritos()
	{
		global $con;
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
	function agregarComentarios()
	{
		global $con;
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
			/*$html=file_get_contents($url);*/

			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$html=curl_exec($ch);
			// Closing
			curl_close($ch);

			$contenido='
				<p>Un nuevo comentario ha sido publicado en el artículo <b>'.getTituloArticulo($_POST['articulo']).'</b>.</p>
				<p>A continuación su contenido:</p>
				<h3>"'.$_POST['comentario'].'"</h3>
				<p>Si considera inapropiado el contenido de este comentario y desea eliminarlo, por favor haga click <a href="'.URL.'index.php?content=unpublish&id='.$id.'">aquí</a>.</p>
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
	
	function agregarSubComentarios()
	{
		extract($_POST);

		if ( !empty( $comment ) ) {
			if ( !empty( $articulo )  ) {
				
			}
			global $con;
			if(!mysqli_query($con, "
				INSERT INTO comentarios (
					usuario,
					parent,
					articulo,
					comentarios,
					status
				) VALUES (
					'$usuario',
					'$parent',
					'$articulo',
					'$comment',
					'1'
				)
			")){
				$response['message'] = 'Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.';
				$response['error'] = 1;
				echo json_encode($response);
			}else{
				$id = mysqli_insert_id($con);
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$url = NOTIFICACION;
				/*$html=file_get_contents($url);*/

				//  Initiate curl
				$ch = curl_init();
				// Disable SSL verification
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				// Will return the response, if false it print the response
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// Set the url
				curl_setopt($ch, CURLOPT_URL,$url);
				// Execute
				$html = curl_exec($ch);
				// Closing
				curl_close($ch);

				/*$contenido = '
					<p>Un nuevo comentario ha sido publicado en el artículo <b>'.getTituloArticulo($articulo).'</b>.</p>
					<p>A continuación su contenido:</p>
					<h3>"'.$comment.'"</h3>
					<p>Si considera inapropiado el contenido de este comentario y desea eliminarlo, por favor haga click <a href="'.URL.'index.php?content=unpublish&id='.$id.'">aquí</a>.</p>
				';
				$html = str_replace("{{contenido}}",$contenido,$html);         
				$mail = new PHPMailer();
				$mail->From = 'no-reply@phronesisvirtual.com';
				$mail->FromName = 'Phronesis | El arte de saber vivir';
				$mail->Subject = utf8_decode('['.$id.'] Un nuevo comentario ha sido incluído');
				$mail->Body = utf8_decode($html);
				$mail->IsHTML(true);
				$mail->AddAddress(NOTIFICACIONES);
				if($sent_mail = $mail->Send()){
					$response['message'] = 'Lo sentimos, se ha presentado un error. Por favor intenta de nuevo.';
					$response['error'] = 1;
					echo json_encode($response);
					return;
				}else{*/
					$nombre = getNombreUsuario($usuario);
					$apellido = getApellidoUsuario($usuario);
					$commentHtml = '<div class="row sub-comment">';
					$commentHtml .= '	<div class="col-lg-10 col-lg-offset-2">';
					$commentHtml .= '		<div class="globo-comentarios">';
					$commentHtml .= $comment;
					$commentHtml .= '		</div>';
					$commentHtml .= '	</div>';
					$commentHtml .= '	<div class="row">';
					$commentHtml .= '		<div class="col-lg-3 col-lg-offset-9 col-md-3 col-sm-12">';
					$commentHtml .= '			<div class="meta-comentarios">';
					$commentHtml .= '				Por '.$nombre.' '.$apellido;
					$commentHtml .= '			</div>';
					$commentHtml .= '		</div>';
					$commentHtml .= '	</div>';
					$commentHtml .= '</div>';

					$response['comment'] = $commentHtml;
					$response['message'] = "Tu comentario ha sido agregado exitosamente. Gracias por compartir con la comunidad.";
					$response['error'] = 0;
					echo json_encode($response);
					return;
				/*}*/
			}
		}else{
			$response['message'] = "Debe escribir un mensaje";
			$response['error'] = 1;
			echo json_encode($response);
			return;
		}
	}

	// Lightbox detalle de pedido
	function detallePedido()
	{
		global $con;
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
			while( $p=mysqli_fetch_assoc($q) ){
				$html.="
					<tr id='ordenpub".$p['publicacion']."'>
						<td>
							".getNombrePublicacion($p['publicacion'])."<br /><b>".$GLOBALS['displayFormatos'][getFormatoPublicacion($p['publicacion'])]."</b>
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
								if(data===0){
									alert('Se ha presentado un error. Por favor intente de nuevo.');
								}
								$('.load').fadeOut();
							});
						});
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
	function delordenpub()
	{
		global $con;
		$sql="DELETE FROM publicacionesxpedido WHERE pedido = '$_POST[pedido]' AND publicacion = '$_POST[publicacion]'";
		if(!mysqli_query($con, $sql)){
		   echo 0;
		}else{
		   echo 1;
		}
	}
	
	// Enviar muestra de producto
	function descargaMuestra()
	{	
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
	function descripcion()
	{
		global $con;
		$sql="SELECT * FROM publicaciones WHERE id = '$_POST[publicacion]'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		$desc=array($data['titulo'],$data['descripcion']);
		echo json_encode($desc);
	}
	
	// Newsletter
	function newsletter()
	{
		global $con;
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
	function cerrarSesion()
	{
		unset($_SESSION['id']);
		unset($_SESSION['perfil']);
		unset($_SESSION['sesion']);
		unset($_SESSION['FBID']);
		unset($_SESSION['EMAIL']);
		unset($_SESSION['FULLNAME']);
		unset($_COOKIE['pedido']);
		setcookie('pedido', null, -1, '/');
	}
	
	// Completa los datos del registro
	function finRegistro()
	{
		global $con;

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
		   $result['error'] = 1;
		   echo json_encode($result);
		   return;
		}
		$result['error'] = 0;
		echo json_encode($result);
		return;
	}
	
	function verificaEmail()
	{
		global $con;
		$q=mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$_POST[emailRegistro]'");
		$n=mysqli_num_rows($q);
		if($n>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	
	function verificaEmailRegistro()
	{
		global $con;
		if (func_num_args() == 1) {
			$args = func_get_args();
			$q=mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$args[0]'");
			$n=mysqli_num_rows($q);
			if($n>0){
				return false;
			}else{
				return true;
			}
		}else{
			$q=mysqli_query($con, "SELECT email FROM usuarios WHERE email = '$_POST[email]'");
			$n=mysqli_num_rows($q);
			if($n>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	}
	
	function verificarFacebookId($fbId)
	{
		global $con;
		$args = func_get_args();
		$q=mysqli_query($con, "SELECT email FROM usuarios WHERE fbId = '$fbId'");
		$n=mysqli_num_rows($q);
		if($n>0){
			return true;
		}else{
			return false;
		}
	}

	// Finalizar registro Facebook
	function emailFacebook()
	{
		global $con;
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
	function iniciaFb()
	{
		global $con;
		$sql = "SELECT id FROM usuarios WHERE fbId = '$_POST[fbId]'";
		$q = mysqli_query($con, $sql);
		$n = mysqli_num_rows($q);
		
		if($n == 0){
			if(!mysqli_query($con, "
				INSERT INTO
					usuarios (
						fbId
					) VALUES (
						'$_POST[fbId]'
					)
			")){
				unset($_SESSION['FBID']);
				echo "No fue posible crear el usuario. Por favor intente de nuevo.";
			}else{
				$id = mysqli_insert_id($con);
				$_SESSION['id'] = $id;
				$_SESSION['sesion'] = logRegistros($id,$_POST['url']);
				echo 1;
			}
		}else{
			$data=mysqli_fetch_array($q);
			if($data<1){
				echo 0;
			}else{
				$_SESSION['id']=$data['id'];
				$_SESSION['sesion'] = logRegistros($data['id'],$_POST['url']);
				echo 1;
			}
		}
	}
	
	// Actualizar label de # de productos
	function publicacionesPedido()
	{
		global $con;
		if(isset($_COOKIE['pedido'])){
			$q=mysqli_query($con, "SELECT * FROM publicacionesxpedido WHERE pedido = '$_COOKIE[pedido]'");
			$n=mysqli_num_rows($q);
			echo $n;
		}else{
			echo "Error en el pedido";
		}
	}
	
	// Detalle del pedido
	function detallesPedido($value='')
	{
		global $con;
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
	function procesaPaquete()
	{		
		global $con;
		if($_POST['estado']=='PENDING'){
			$estado=1;
		}
		if($_POST['estado']=='APPROVED'){
			$estado=2;
		}
		if($_POST['estado']=='DECLINED'){
			$estado=3;
		}
		
		if ( isset($_POST['formaPago']) ) {
			$formaPago = $_POST['formaPago'];
		}else{
			$formaPago = 1;
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
					responseCode,
					referenciaLanding,
					landing
				) VALUES (
					'$_POST[usuario]',
					'".getPrecioPaquete($_POST['paquete'])."',
					'$estado',
					'$formaPago',
					'$_POST[orderId]',
					'$_POST[transactionId]',
					'$_POST[estado]',
					'$_POST[pendingReason]',
					'$_POST[responseCode]',
					'"."U".$_POST['usuario']."L".$_POST['landing']."P".$_POST['paquete']."',
					'$_POST[landing]'
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
			
			/*if ( $estado == 2 && $_POST['paquete'] == 4 || $_POST['paquete'] == 5 ) {
				$mensaje = 'Queremos confirmarle que su inscripci&oacute;n a la conferencia ha sido procesada exitosamente. Pronto le estaremos enviando informaci&oacute;n adicional para el acceso al evento.';
				notificar(getEmailUsuario($_SESSION['id']),'Comprobante de pago: Inscripción Conferencia Virtual',$mensaje);
				crearInscripcionFromPaquete($id, $_POST["usuario"], 1, 7, $_POST["transactionId"], 0);
			}elseif( $estado == 1 && $_POST['paquete'] == 4 || $_POST['paquete'] == 5 ){
				crearInscripcionFromPaquete($id, $_POST["usuario"], 2, 7, $_POST["transactionId"], 0);
			}*/

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
	
	function crearInscripcionFromPaquete($id_pedido, $usuario_id, $estado_inscripcion, $metodo_pago, $transaction_id, $valor_inscripcion)
	{
		global $con;
		$sql = 'INSERT INTO 
					inscritos_conferencia (
						id_pedido,
						usuario_id,
						estado_inscripcion,
						metodo_pago,
						transaction_id,
						valor_inscripcion,
						creado
					) VALUES (
						'.$id_pedido.',
						'.$usuario_id.',
						'.$estado_inscripcion.',
						'.$metodo_pago.',
						"'.$transaction_id.'",
						'.$valor_inscripcion.',
						CURRENT_TIMESTAMP
					);';

		if( !mysqli_query($con, $sql) ){
			return 0;
		}else{
			return 1;
		}
	}

	function actualizarInscripcionFromPaquete($id_pedido, $usuario_id, $estado_inscripcion, $metodo_pago, $transaction_id, $valor_inscripcion)
	{
		global $con;

		$check = 'SELECT * FROM inscritos_conferencia WHERE id_pedido = '.$id_pedido;
		$q=mysqli_query($con, $check);
		$n=mysqli_num_rows($q);
		
		if($n=1){
			$sql = 'UPDATE 
						inscritos_conferencia 
					SET
						estado_inscripcion = ' . $estado_inscripcion . ',
						transaction_id = "' . $transaction_id . '"
					WHERE
						id_pedido = ' . $id_pedido . '
						;';
			if( !mysqli_query($con, $sql) ){
				return 0;
			}else{
				return 1;
			}
		}
	}

	function getPedido($id_pedido)
	{
		global $con;

		if ( !empty($id_pedido) ) {
			$sql = 'SELECT * FROM pedidos WHERE id = '.$id_pedido;
			$q=mysqli_query($con, $sql);
			$p=mysqli_fetch_assoc($q);

			$orden['id'] = $p['id'];
			$orden['usuario'] = $p['usuario'];
			$orden['valor'] = $p['valor'];
			$orden['status'] = $p['status'];
			$orden['formaPago'] = $p['formaPago'];
			$orden['orderId'] = $p['orderId'];
			$orden['transactionId'] = $p['transactionId'];
			$orden['state'] = $p['state'];
			$orden['pendingReason'] = $p['pendingReason'];
			$orden['responseCode'] = $p['responseCode'];
			$orden['urlPaymentReceiptHtml'] = $p['urlPaymentReceiptHtml'];
			$orden['reference'] = $p['reference'];
			$orden['creado'] = $p['creado'];				
			return $p;
		}
		return array();
	}

	function actualizaOrdenPaquete($id_pedido, $status, $orderId, $transactionId, $state, $responseCode, $formaPago = null)
	{
		global $con;

		$check = 'SELECT * FROM pedidos WHERE id = '.$id_pedido;
		$q=mysqli_query($con, $check);
		$n=mysqli_num_rows($q);
		
		if($n=1){
			$sql = 'UPDATE 
						pedidos 
					SET
						status = ' . $status . ',
						' . ( !is_null($orderId) ? 'orderId = "' . $orderId . '",' : '' ) . 
						( !is_null($transactionId) ? 'transactionId = "' . $transactionId . '",' : '' ) . 
						( !is_null($formaPago) ? 'formaPago = "' . $formaPago . '",' : '' ) . 
						'state = "' . $state . '",
						responseCode = "' . $responseCode . '"
					WHERE
						id = ' . $id_pedido . '
						;';

			if( !mysqli_query($con, $sql) ){
				return 0;
			}else{
				return 1;
			}
		}
	}

	// CREACION DE ORDEN EN LOS PAQUETES
	function crearOrdenPaquete()
	{		
		global $con;
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
			return 0;
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
			if ( $codigoPaquete == 4 || $codigoPaquete == 5 ) {
				crearInscripcionFromPaquete($codigoOrden, $_SESSION["id"], 2, 7, $codigoOrden, 0);
			}
			// Devolvemos el número de la orden generada
			return $codigoOrden;	
		}
	}

	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DEL USUARIO
	
	/////////////////////////////////////////////////////////////////////////
	
	// Recuperar contraseña
	function recuperarContrasena()
	{
		global $con;
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
	function detalleDelPedido()
	{	
		global $con;
		
		if ( isset($_POST['pedido']) ) {
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
		}else{
			$n = 0;
		}
		$html = ""; 
		if($n < 1){
			$html .= "<tr><td colspan='3' class='text-center'>";
			$html .= "¿Aún no tienes publicaciones en tu pedido?<br />";
			$html .= "Visita nuestras <a href='/obras'><b>Guias y Obras Editoriales</b></a>";
			$html .= "</td></tr>";
			if ( isset($pedido) ) {
				mysqli_query($con, "UPDATE pedidos SET valor = '0' WHERE id = '$pedido'");
			}
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
		
	function eliminaDelPedido()
	{
		global $con;
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

	function valorDelPedido()
	{
		echo getValorDeLaOrden($_POST['orden']);
	}		
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE PAGOS
	
	/////////////////////////////////////////////////////////////////////////
	
	// OBTENER MEDIOS DE PAGO
	function obtenerMediosDePago()
	{	
		unset($_SESSION['total_discount']);	
		$pais = $_POST['pais'];
		
		$html = "";
		$html .= "<option value=''>Selecciona tu medio de pago preferido ...</option>";
		$html .= "<option value='1'>Tarjeta de Crédito</option>";
		$html .= "<option value='2'>Paypal</option>";
		if( $pais == 'CO' ){
			$html .= "<option value='3'>Transferencia Bancaria - PSE</option>";
			$html .= "<!--<option value='4'>Puntos VIA Baloto</option>-->";
		}elseif( $pais == 'MX' ){
			$html .= "<!--<option value='5'>OXXO</option>-->";
		}elseif( $pais == 'PE' ){
			$html .= "<!--<option value='6'>Banco de Crédito - BCP</option>-->";
		}
		echo $html;
	}

	function obtenerMediosDePago2()
	{		
		unset($_SESSION['total_discount']);

		$pais = $_POST['pais'];
		
		$html = "";
		$html .= "<option value=''>Selecciona tu medio de pago preferido ...</option>";
		$html .= "<option value='1'>Tarjeta de Crédito</option>";
		$html .= "<option value='2'>Paypal</option>";
		if( $pais == 'CO' ){
			$html .= "<option value='3'>Transferencia Bancaria - PSE</option>";
			$html .= "<option value='4'>Puntos VIA Baloto</option>";
		}elseif( $pais == 'MX' ){
			$html .= "<option value='5'>OXXO</option>";
		}elseif( $pais == 'PE' ){
			$html .= "<option value='6'>Banco de Crédito - BCP</option>";
		}
		$result['error'] = 1;
		$result['html']  = $html;
		echo json_encode($result);
	}
		
	// PROCESAMIENTO DE PAGOS VÍA PAYPAL
	function pagarConPaypal2()
	{
		if($_REQUEST['consulta']=='pagarConPaypal'){
			
			$orden = $_REQUEST['orden'];
			$urlCancela = $_REQUEST['urlCancela'];
			if ( !empty( $_REQUEST['codigoPaquete'] ) ) {
				pagarConPaypal($orden, $urlCancela, $_REQUEST['codigoPaquete']);
			}else{
				pagarConPaypal($orden,$urlCancela);
			}			
		}
	}
		
	// OBTENER FORMULARIOS DE PAGO
	function obtenerFormularioDePago()
	{		
		$metodo = $_POST['metodo'];
		
		$valor = "14.99";

		$today = date("Y-m-d H:i:s");
		$date = "2015-06-30 00:00:00";
		
		if($today > $date){
			
			$valor = "14.99";
			
		}
		
		/*echo $precio;*/
		
		// Proceso de pago con tarjeta de crédito
		if( $metodo == 1 ){
			ob_start();
            require "MetodosDePago/tarjeta-de-credito.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
		}
		
		// Proceso de pago vía Paypal
		if( $metodo == 2 ){
			
			/*$urlCancela = URL . '/inscripcion-conferencia';
			
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
	
			
			$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;*/

			/*require 'PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/payments/CreatePaymentUsingPayPal.php';*/


			ob_start();
            require "MetodosDePago/paypal.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;	
		}
		
		// Proceso de pago PSE
		if( $metodo == 3 ){
			
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
			
			ob_start();
            require "MetodosDePago/pago-pse.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;			
		}
		
		// Proceso de pago VIA Baloto
		if( $metodo == 4 ){
			
			ob_start();
            require "MetodosDePago/pago-baloto.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
			
		}
		
		if( $metodo == 5 ){
			ob_start();
            require "MetodosDePago/pago-oxxo.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;			
		}
		
		if( $metodo == 6 ){
			ob_start();
            require "MetodosDePago/pago-bcp.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
		}
	}

	function obtenerFormularioDePago2()
	{		
		$metodo = $_POST['metodo'];
		
		$valor = $_POST['value'];
		
		$landing = $_POST['landing'];

		unset($_SESSION['total_discount'], $_SESSION['descuento'], $_SESSION['total_discount']);

		// Proceso de pago con tarjeta de crédito
		if( $metodo == 1 ){
			ob_start();
            require "MetodosDePago/tarjeta-de-credito.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
		}
		
		// Proceso de pago vía Paypal
		if( $metodo == 2 ){
			ob_start();
            require "MetodosDePago/paypal.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;	
		}
		
		// Proceso de pago PSE
		if( $metodo == 3 ){
			
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
			
			ob_start();
            require "MetodosDePago/pago-pse.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;			
		}
		
		// Proceso de pago VIA Baloto
		if( $metodo == 4 ){
			
			ob_start();
            require "MetodosDePago/pago-baloto.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
			
		}
		
		if( $metodo == 5 ){
			ob_start();
            require "MetodosDePago/pago-oxxo.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;			
		}
		
		if( $metodo == 6 ){
			ob_start();
            require "MetodosDePago/pago-bcp.tpl.php";
            $tpl_content = ob_get_clean();
            echo $tpl_content;
            return;
		}
	}
		
	// REQUEST DE PSE
	function pseRequest()
	{		
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
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

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
			PayUParameters::IP_ADDRESS => $ip,
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

	function requestPayPalPaquete()
	{
		require_once 'rest-api-sample-app-php/app/bootstrap.php';

		$data = array(
						'estado' => 2, //pendiente
						'metodo' => 2,
						'idtransaccion' => 'Paypal',
						'valor' => $_POST['amount']
					);
		
		$id_pedido = crearOrdenPaquete();
		if ( is_null($id_pedido) ) {
			echo "null";
			return;
		}
		$result['id_pedido'] = $id_pedido;
		
		// Create the payment and redirect buyer to paypal for payment approval. 
		
		$baseUrlSuccess = URL . "index.php?content=mi-cuenta&task=mis-publicaciones&orderPaypalId=$id_pedido&pagina=coleccion";
		
		
		if($_POST['codigoPaquete']==6)
		{
			$baseUrlFailed = URL . "?content=guias&id=guias-practicas-de-walter-riso&orderPaypalId=$id_pedido&pagina=coleccion";
		}
		else
			$baseUrlFailed = URL . "?content=coleccion&id=".$_POST['codigoPaquete']."&orderPaypalId=$id_pedido&pagina=coleccion";
		
		
		$payment = makePaymentUsingPayPal($_POST['amount'], 'USD', $_POST['description'],$baseUrlSuccess."&success=true", $baseUrlFailed."&success=false");

		if ( $payment->getState() == 'created') {
			$status = 1;
		}

		$orderId = $payment->getId();
		$transactionId = $payment->getId();
		$state = $payment->getState();
		$responseCode = $payment->getState();
		
		actualizaOrdenPaquete($id_pedido, $status, $orderId, $transactionId, $state, $responseCode, 2);
		/*if ( $_POST['codigoPaquete'] == 4 || $_POST['codigoPaquete'] == 5 ) {
			actualizarInscripcionFromPaquete($id_pedido, $_SESSION["id"], 2, 7, $transactionId, 0);	
		}*/
		/*actualizaOrdenPaquete($orderId, $status, $payment->getId(), $payment->getId(), $payment->getState(), $payment->getState() );*/
		$result['error'] = 1;
		
		header("Location: " . getLink($payment->getLinks(), "approval_url") );
		exit;	
	}

	function requestPayPal()
	{
		require_once 'rest-api-sample-app-php/app/bootstrap.php';

		$data = array(
						'estado' => 2, //pendiente
						'metodo' => 2,
						'idtransaccion' => 'Paypal',
						'valor' => $_POST['amount']
					);
		
		$orderId = crearOrden($data);
		if ( is_null($orderId) ) {
			echo "null";
			return;
		}
		$result['orderId'] = $orderId;
		
		// Create the payment and redirect buyer to paypal for payment approval. 
		$baseUrl = URL . "index.php?orderPaypalId=$orderId";
		$payment = makePaymentUsingPayPal($_POST['amount'], 'USD', $_POST['description'],$baseUrl."&success=true", $baseUrl."&success=false");
		actualizarOrden($orderId, $payment->getState(), $payment->getId());
		$result['error'] = 1;
		
		header("Location: " . getLink($payment->getLinks(), "approval_url") );
		exit;	
	}

	function requestPayPalTradicional()
	{
		require_once 'rest-api-sample-app-php/app/bootstrap.php';

		if ( !empty($_COOKIE['pedido']) ) {
			$orderId = $_COOKIE['pedido'];
			$productos = getProductosPorOrden($orderId);
			$total = getValorDeLaOrden($orderId);

			if ( !empty($productos) ) {
				$data = array(
								'estado' => 2, //pendiente
								'metodo' => 2,
								'idtransaccion' => 'Paypal',
								'valor' => $total
							);
				if ( is_null($orderId) ) {
					echo "null";
					return;
				}
				$result['orderId'] = $orderId;
				
				// Create the payment and redirect buyer to paypal for payment approval. 
				$baseUrlSuccess = URL . "index.php?content=mi-cuenta&task=mis-publicaciones&orderPaypalId=$orderId&pagina=obras";
				$baseUrlFailed = URL . "index.php?content=mi-cuenta&task=mi-pedido&orderPaypalId=$orderId&pagina=obras";
				
				$payment = makePaymentUsingPayPalByItems($productos, $total, 'USD',$baseUrlSuccess."&success=true", $baseUrlFailed."&success=false");

				if ( $payment->getState() == 'approved' ) {
					$estado = 2;
				}
				else if ( $payment->getState() == 'failed' || $payment->getState() == 'canceled' || $payment->getState() == 'expired' ) {
					$estado = 3;
				}else{
					$estado = 1;
				}

				actualizaOrdenPaquete($orderId, $estado, $payment->getId(), $payment->getId(), $payment->getState(), $payment->getState(), 2);
				$result['error'] = 1;
				header("Location: " . getLink($payment->getLinks(), "approval_url") );
				exit;	
			}
		}
	}

	function validarListaPedidosPendientes()
	{
		global $con;
		require_once 'rest-api-sample-app-php/app/bootstrap.php';

		$sql = 'SELECT * FROM pedidos WHERE formaPago = 2 AND status != 2 AND status != 3';
		$q=mysqli_query($con, $sql);
		$estado = '';
		while ( $p=mysqli_fetch_assoc($q) ) {
			if (!empty( $p['orderId'] )) {
				$payment = getPaymentDetails($p['orderId']);
				if ( isset($payment->name) ) {
					actualizaOrdenPaquete($p['id'], 3, null, null, 'failed', $payment->name);
					$estado = 0;
				}else{
					if ( $payment->getState() == 'approved' ) {
						actualizaOrdenPaquete($p['id'], 2, null, null, $payment->getState(), $payment->getState());
						entregarPedido($p['id']);
						// Estados de las inscripciones
						$estado = 1;
					}else if( $payment->getState() == 'failed' || $payment->getState() == 'canceled' || $payment->getState() == 'expired' ){
						actualizaOrdenPaquete($p['id'], 3, null, null, $payment->getState(), $payment->getState());
						// Estados de las inscripciones
						$estado = 0;
					}else if( $payment->getState() == 'created' ){
						actualizaOrdenPaquete($p['id'], 1, null, null, $payment->getState(), $payment->getState());
						// Estados de las inscripciones
						$estado = 2;
					}
				}
			}
		}
	}

	function getProductosPorOrden($orderId)
	{
		global $con;
		if ( !empty($orderId) ) {
			$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$orderId'";
			$q=mysqli_query($con, $sql);
			$productos = array();
			$i = 0;
			while( $p=mysqli_fetch_assoc($q) ){
				$productos[$i]['id'] = $p['publicacion'];
				$productos[$i]['nombre'] = getNombrePublicacion($p['publicacion']);
				$productos[$i]['formato'] = $GLOBALS['displayFormatos'][getFormatoPublicacion($p['publicacion'])];
				$productos[$i]['precio'] = getPrecioPublicacion($p['publicacion']);
				$i++;
			}
			return $productos;
		}
		return array();
	}

	function crearOrden($array='')
	{
		global $con;
		if (!empty($array)) {
			extract($array);
			if ( 
				isset($_SESSION['id']) && !empty($_SESSION['id']) 
				&& isset($estado) && !empty($estado) 
				&& isset($metodo) && !empty($metodo) 
				&& isset($idtransaccion) && !empty($idtransaccion) 
				&& isset($valor) && !empty($valor) 
			) {
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
				   		'$estado',
				   		'$metodo',
				   		'$idtransaccion',
				   		'$valor'
				   	)
				")){
				   return mysqli_error($con);
				}else{
				   return mysqli_insert_id($con);
				}
			}
		}
	}

	function obtenerOrden($orderId)
	{
		global $con;
		$query = "SELECT * FROM inscritos_conferencia WHERE id_inscripcion = '$orderId'";
		$result = mysqli_query($con, $query);
		if(!$result) {
			$errMsg = "Error retrieving order: " . mysqli_error($con);
			mysqli_close($con);
			throw new Exception($errMsg);
		}

		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function actualizarOrden($orderId, $estado, $transaction_id)
	{
		global $con;

		if ( $estado == 'approved' ) {
			$estado = 1;
		}
		else if ( $estado == 'failed' || $estado == 'canceled' || $estado == 'expired' ) {
			$estado = 0;
		}else{
			$estado = 2;
		}

		if(!mysqli_query($con, "
			UPDATE 
				`inscritos_conferencia`
			SET
				`estado_inscripcion` = '$estado'
				" . ( !is_null( $transaction_id ) ? ",`transaction_id` = '$transaction_id'" : "" ) . 
			"WHERE
				`id_inscripcion` = '$orderId'
		")){
			return false;
		}else{
			return true;
		}
	}
		
	// Almacenar pago inscripcion PSE
	function almacenaPendientePSE()
	{	
		global $con;
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
	function requestBaloto()
	{		
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
			PayUParameters::EXPIRATION_DATE => "2015-12-05T00:00:00",
			PayUParameters::IP_ADDRESS => getRealIpAddr(),   
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
	function oxxoRequest()
	{
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
			
			PayUParameters::EXPIRATION_DATE => "2015-12-5T00:00:00",
			PayUParameters::IP_ADDRESS => getRealIpAddr(),
		
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
	function bcpRequest()
	{
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
		PayUParameters::EXPIRATION_DATE => "2015-12-05T04:00:00",
		//IP del pagadador
		PayUParameters::IP_ADDRESS => getRealIpAddr(),
		
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
	function almacenaInscripcion()
	{
		global $con;
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
			$mensaje .= "<p>Queremos informarle que el pago ha sido: ".$displayEstado[$estado]."</p>";
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
	function actualizaInscripcion()
	{
		global $con;
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
			$mensaje .= "<p>Queremos informarle que el pago ha sido: ".$displayEstado[$estado]."</p>";
			if( $estado == 1 ){
				/*$mensaje .= "<p>Pronto estaremos notificándole con las instrucciones para el acceso al evento.</p>";*/
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
	function inscripcionesPendientes()
	{		
		global $con;
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
	function ejecutarPago()
	{		
		global $con;
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
				if ( $_GET['paquete_id'] == 1 || $_GET['paquete_id'] == 3 ) {
					actualizarInscripcionFromPaquete($orden, $_SESSION["id"], 1, 7, $orden, 15.99);
					$mensaje = 'Queremos confirmarle que su inscripci&oacute;n a la conferencia ha sido procesada exitosamente. Pronto le estaremos enviando informaci&oacute;n adicional para el acceso al evento.';
					notificar(getEmailUsuario($_SESSION['id']),'Comprobante de pago: Inscripción Conferencia Virtual',$mensaje);
				}
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
	function notificaComprobante()
	{
		$mensaje = "";
		$mensaje .= "<p>Estimado(a) ".getNombreUsuario($_POST['usuario']).",</p>";
		$mensaje .= "<p>A continuación encontrará el enlace para la generación del comprobante de su pago en efectivo en caso tal de que llegue a requerirlo nuevamente.</p>";
		$mensaje .= "<h1><a href='$_POST[url]'>Haga click aquí para generar el comprobante</a></h1>";
		
		if( $_POST['metodo'] == 6 ){
			$mensaje .= "
				<p><b>NOTA IMPORTANTE PARA PAGOS EN BCP</b></p>
				<ul>
					<li>Dirígete a partir de mañana a las 12:00 PM a cualquier banco de crédito del Perú (BCP) y realiza el pago con el recibo que generarás a través del enlace.</li>
					<li>Una vez realizado el pago no olvides enviarnos escaneado o en una foto clara el comprobante del pago a info@phronesisvirtual.com.</li>
					<li>Ten presente que el pago va dirigido a la compañía PagosOnline no a Editorial Phronesis. Es importante que guardes el certificado de pago para cualquier reclamación o inconsistencia que se pueda presentar.</li>
				</ul>
			";
		}
		
		if( $_POST['metodo'] == 5 ){
			$mensaje .= "
				<p><b>NOTA IMPORTANTE PARA PAGOS EN OXXO</b></p>
				<ul>
					<li>Imprime el recibo con el enlace que te estamos enviando en una impresora láser y preséntalo en cualquier tienda OXXO del país.</li>
					<li>Si por algún motivo el código de barras no puede ser leído solicita al cajero que digite los números que se encuentran debajo del código.</li>
					<li>Una vez realizado el pago no olvides enviarnos escaneado o en una foto clara el comprobante del pago.</li>
					<li>Ten presente que el pago va dirigido a la compañía PagosOnline o PayuLatam y no a Editorial Phronesis.</li>
					<li>Es importante que guardes el certificado de pago para cualquier reclamación o inconsistencia que se pueda presentar.</li>
				</ul>
			";
		}
		
		if( $_POST['metodo'] == 4 ){
			$mensaje .= "
				<p><b>NOTA IMPORTANTE PARA PAGOS EN BALOTO</b></p>
				<ul>
					<li>Para realizar el pago dirígete a cualquier punto Vía Baloto del país con los datos que encontrarás en el recibo que te estamos enviando adjunto. Una vez realizado el pago recibirás un email con las instrucciones para acceder a los productos adquiridos.</li>
					<li>Es importante que guardes el recibo de pago para cualquier reclamación o inconsistencia que se pueda presentar.</li>
				</ul>
			";
		}
		
		/*$mensaje .= "<p>Gracias por tu interés en nuestra conferencia virtual.</p>";*/
		notificar(getEmailUsuario($_POST['usuario']),'Comprobante de pago',$mensaje);
	}
		
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE ARTÍCULOS
	
	/////////////////////////////////////////////////////////////////////////
	function cargarArticulos()
	{
		global $con;
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
	function buscarArticulos()
	{
		global $con;
		$q = mysqli_query($con, "
			(SELECT id, titulo, contenido FROM articulos WHERE titulo LIKE '%" . 
	           $_POST['buscarArticulo'] . "%' OR contenido LIKE '%" . $_POST['buscarArticulo'] ."%')
		");
		$html = '';
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
					$titulo = removeUnwantedChars($r['titulo']);
					$html .= "<div class='row busquedaResultado'>";
					$html .= "<div class='col-md-12'>";
					$html .= "<p><b><a href='/index.php?content=articulos&titulo=$titulo&id=$r[id]'>$r[titulo]</a></b></p>";
					$html .= "<p>".limit_words(strip_tags($r['contenido']),15)."</p>";
					$html .= "<p><a href='/index.php?content=articulos&titulo=$titulo&id=$r[id]'>Leer artículo...</a></p>";
					$html .= "</div>";
					$html .= "</div>";
				}
				echo $html;
			}
		}
	}
	

	function validarLoggeo()
	{
		if ( empty($_SESSION['id']) ) {
			$result['error'] = 1;
		}else{
			$result['error'] = 0;
		}
		echo json_encode($result);
		return;
	}

	/////////////////////////////////////////////////////////////////////////
	
	// CRON JOBS
	
	/////////////////////////////////////////////////////////////////////////
		global $con;
		// Envío del newsletter	
		if(
			isset($_REQUEST['consulta']) &&
			isset($_REQUEST['id']) &&
			($_REQUEST['consulta'] == 'newsletter') &&
			($_REQUEST['id']) == '80234042'
		){
			
			set_time_limit(1200);
			//ini_set('max_execution_time', 1200);
			
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
			   						title='" . $a["titulo"] . "'
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
			   						title='" . $a["titulo"] . "'
			   						>
			   						<img 
			   							width='240'
			   							style='float:left; margin: 10px 10px 10px 0; max-width: 40%'
			   							src='".URL."/admin/_lib/file/imgarticulos/$a[imagen]' 
			   							alt='" . $a["titulo"] . "'
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
			   $q = mysqli_query($con, "SELECT email FROM newsletter WHERE optin = 1 LIMIT 200000 OFFSET 400000");
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
		if( isset($_POST['consulta']) && $_POST['consulta'] == 'conferencia'){
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
		
		// Log de actividades
		if( isset($_POST['consulta']) && $_POST['consulta']=='logActividades'){
			logActividades($_SESSION['id'],$_SESSION['sesion'],$_POST['actividad']);
		}

?>
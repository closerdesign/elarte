<?php
	
	// NAVEGACIÓN
	// GESTION DE ARTICULOS
	// NOTIFICACIONES
	// GESTIÓN DE ÓRDENES
	// GESTIÓN DE PAGOS
	// VARIOS
	
	$displayEstadoPedido=array(
		'1'=>'PENDIENTE',
		'2'=>'APROBADO',
		'3'=>'DECLINADO'
	);
	
	$displayFormaPago=array(
		'1'=>'TARJETA DE CRÉDITO',
		'2'=>'PAYPAL',
		'3'=>'TRANSFERENCIA PSE',
		'4'=>'PUNTOS VIA BALOTO',
		'5'=>'OXXO - 7ELEVEN',
		'6'=>'BANCO DE CREDITO - BCP',
		'7'=>'CREDITO TIENDA'
	);
	
	$displayFormatos=array(
		'1'=>"Versión PDF",
		'2'=>"Formato de Audio"
	);
	
	function getFirstPara($string){
		   $string = substr($string,0, strpos($string, "</p>")+4);
		   $string = str_replace("<p>", "", str_replace("<p/>", "", $string));
		   return $string;
		}
	
	function getNombreUsuario($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM usuarios WHERE id = '$val'"));
		return $data['nombre'];
	}
	
	function getApellidoUsuario($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT apellido FROM usuarios WHERE id = '$val'"));
		return $data['apellido'];
	}
	
	function getEmailUsuario($val){
		global $con;
		$q=mysqli_query($con, "SELECT email FROM usuarios WHERE id = '$val'");
		$data = mysqli_fetch_array($q);
		return $data['email'];
	}
	
	function getCiudadUsuario($val){
		global $con;
		$q=mysqli_query($con, "SELECT ciudad FROM usuarios WHERE id = '$val'");
		$data = mysqli_fetch_array($q);
		return $data['ciudad'];
	}
	
	function getPaisUsuario($val){
		global $con;
		$q=mysqli_query($con, "SELECT pais FROM usuarios WHERE id = '$val'");
		$data = mysqli_fetch_array($q);
		return $data['pais'];
	}
	
	function getFormatoPublicacion($val){
		global $con;
		$sql="SELECT formato FROM publicaciones WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['formato'];
	}
	
	function getDemoPublicacion($val){
		global $con;
		$sql="SELECT demo FROM publicaciones WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['demo'];
	}

	function getArchivoAudio($val){
		global $con;
		$sql="SELECT archivo FROM archivosxpublicacion WHERE idAxp = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['archivo'];
	}
	
	function getNombrePublicacionPs($val){
		global $con;
		$sql="SELECT titulo FROM publicaciones WHERE codPs = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['titulo'];
	}
	
	function getCodigoPublicacionPs($val){
		global $con;
		$sql="SELECT id FROM publicaciones WHERE codPs = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['id'];
	}
	
	function getAudioBtn($val){
		$btn='<button class="btn btn-primary btnDemo'.$val.'"><i class="fa fa-play-circle"></i> Reproducir</button>';
		$btn.='<button class="btn btn-primary btnStop'.$val.'" style="display:none !important"><i class="fa fa-pause"></i> Detener</button>';
		$btn.='
			<script>
			   	$(document).ready(function(){
			   	$("#jquery_jplayer_'.$val.'").jPlayer({
			           ready: function () {
			             $(this).jPlayer("setMedia", {
			               title: "Bubble",
			               mp3: "admin/_lib/file/docarchivosPublicaciones/'.getArchivoAudio($val).'"
			             });
			           },
			           cssSelectorAncestor: "#jp_container_'.$val.'",
			           swfPath: "/js",
			           useStateClassSkin: true,
			           autoBlur: false,
			           smoothPlayBar: true,
			           keyEnabled: true,
			           remainingDuration: true,
			           toggleDuration: true
			         });	
			   	})
			   	$(".btnDemo'.$val.'").click(function(){
			   		$("#jquery_jplayer_'.$val.'").jPlayer("play");
			   		$(".btnDemo'.$val.'").hide();
			   		$(".btnStop'.$val.'").show();
			   	})
			   	$(".btnStop'.$val.'").click(function(){
			   		$("#jquery_jplayer_'.$val.'").jPlayer("stop");
			   		$(".btnDemo'.$val.'").show();
			   		$(".btnStop'.$val.'").hide();
			   	})
		   </script>
		   <div id="jquery_jplayer_'.$val.'" class="jp-jplayer"></div>
		';
		return $btn;
	}
	
	function getBtnDescarga($val){
		global $con;
		$btn='<a href="javascript:void(0)" onclick="openRegisterModal()" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</a>';
		if(isset($_SESSION['id'])){
			$q=mysqli_query($con, "SELECT * FROM publicacionesxusuario WHERE usuario = $_SESSION[id] AND publicacion = '$val'");
			$n=mysqli_num_rows($q);
			$data=mysqli_fetch_array($q);
			if($n<1){
				$btn='<button value="'.$val.'" class="btn btn-primary btnAgregar"><i class="fa fa-shopping-cart"></i> Comprar</button>';
			}else{
				// Validar el formato de la publicación para decidir si muestra la lista de reproducción o la descarga
				$formato=getFormatoPublicacion($val);
				if($formato==1){
					$btn='<button value="'.$data['publicacion'].'" class="btn btn-primary btnDescargar">Descargar</button>';
				}else{
					$btn='<button data-toggle="modal" data-target="#myModalLista'.$val.'" class="btn btn-primary"><i class="fa fa-play-circle"></i> Reproducir</button>';
					$btn.='
					<div class="modal fade" id="myModalLista'.$val.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
									<h4 class="modal-title" id="myModalLabel">Lista de Reproducción</h4>
								</div>
								<div class="modal-body">';
					
					$btn.="
						<div class='table table-responsive'>
							<table class='table table-bordered table-striped'>
							";
					$qLista=mysqli_query($con, "SELECT * FROM archivosxpublicacion WHERE publicacion = '$val' ORDER BY orden");
					while($pista=mysqli_fetch_assoc($qLista)){
						$btn.='
							<tr>
								<td>'.$pista['nombre'].'</td>
								<td>
									<a target="_blank" href="/admin/_lib/file/docarchivosPublicaciones/'.$pista['archivo'].'" class="btn btn-primary">
										<i class="fa fa-play-circle"></i> Reproducir
									</a>
								</td>
							</tr>
						';
					}		
					$btn.="	</table>
						</div>
					";
					$btn.=		'</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
		}
		echo $btn;
	}
	
	function getBtnCalificar($val){
		global $con;
		$btn="";
		if(isset($_SESSION['id'])){
			$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM publicacionesxusuario WHERE usuario = $_SESSION[id] AND publicacion = '$val'"));
			if($n>0){
				$btn='<button id="btnCalificar" class="btn btn-primary">Calificar</button>';
			}
		}
		
		echo $btn;
	}
	
	function getBtnMuestra($val){
		global $con;
		$btn="";
		if(isset($_SESSION['id'])){
			$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM publicacionesxusuario WHERE usuario = $_SESSION[id] AND publicacion = '$val'"));
			if($n<1){
				
				// Obtener el formato para saber que clase de botón de muestra mostrar
				$sql="SELECT formato FROM publicaciones WHERE id = '$val'";
				$q=mysqli_query($con, $sql);
				$data=mysqli_fetch_array($q);
				
				if($data['formato']==2){
					$demo = getDemoPublicacion($val);
					if($demo==""){
						$btn="";
					}else{
						$btn='<a href="https://www.youtube.com/watch?v='.$demo.'" id="btnVideo" class="btn btn-primary popup-youtube"><i class="fa fa-play-circle"></i> Demo</a>';
					}
				}else{
					// Ejecutar las acciones en caso contrario
					$btn='<button user="'.$_SESSION['id'].'" value="'.$val.'" class="btn btn-primary btnMuestraRegistro"><i class="fa fa-search-plus"></i> Muestra</button>';
				}

			}	
			
		}else{
			$btn='<button data-toggle="modal" data-target="#myModalDescargaMuestra" class="btn btn-primary">Muestra</button>';
		}
		echo $btn;
	}
	
	function getBtnVideo($val){
		$btn='';
		global $con;
		$sql="SELECT video FROM publicaciones WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		if($data['video']!=""){
			$btn='<a href="https://www.youtube.com/watch?v='.$data['video'].'" id="btnVideo" class="btn btn-primary popup-youtube"><i class="fa fa-video-camera"></i> Video</a>';
		}
		echo $btn;
	}
	
	function getBtnDescripcion($val){
		echo "<button class='btn btn-primary btnDescripcion' publicacion='$val'>Reseña</button>";
	}
	
	function getNombrePublicacion($val){
		global $con;
		$q=mysqli_query($con, "SELECT titulo FROM publicaciones WHERE id = '$val'");
		$data=mysqli_fetch_array($q);
		return $data['titulo'];
	}
	
	function getArchivoPublicacion($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT descargable FROM publicaciones WHERE id='$val'"));
		return $data['descargable'];
	}
	
	function getArchivoMuestra($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT muestra FROM publicaciones WHERE id='$val'"));
		return $data['muestra'];
	}
	
	function getPrecioPublicacion($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT precio FROM publicaciones WHERE id = '$val'"));
		return $data['precio'];
	}
	
	function custom_echo($x)
	{
	  if(strlen($x)<=150)
	  {
	    return $x;
	  }
	  else
	  {
	    $y=substr($x,0,150) . '...';
	    return $y;
	  }
	}
	
	function limit_words($string, $word_limit){
			$words = explode(" ",$string);
			return implode(" ",array_splice($words,0,$word_limit));
		}
	
	function getArticuloFavoritos($val){
		global $con;
		$sql="SELECT * FROM articulos WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return "<a href='/index.php?content=articulos&id=$data[id]'>$data[titulo]</a>";
	}
	
	function getDescripcionArticulo($val){
		global $con;
		$sql="SELECT contenido FROM articulos WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		$desc=strip_tags($data['contenido']);
		return utf8_encode(limit_words($desc, 50));
	}
	
	function getMetaComentarios($val){
		global $con;
		$sql="SELECT * FROM usuarios WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['nombre']." ".$data['apellido'];
	}
	
	function getTituloArticulo($val){
		global $con;
		$sql="SELECT * FROM articulos WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['titulo'];
	}
	
	function getNombreAutor($val){
		global $con;
		$sql="SELECT nombre FROM autores WHERE idAutor  = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['nombre'];
	}
	
	function getNombreFormato($val){
		global $con;
		$sql="SELECT nombre FROM formatos WHERE idFormato = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['nombre'];
	}
	
	function getNombreIdioma($val){
		global $con;
		$sql="SELECT nombre FROM idiomas WHERE idIdioma = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['nombre'];
	}
	
	function getPrecioPaquete($val){
		global $con;
		$sql="SELECT precio FROM paquetes WHERE idPaquete = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['precio'];
	}
	
	function getPublicacionesPaquete($val){
		global $con;
		$sql="SELECT publicaciones FROM paquetes WHERE idPaquete = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['publicaciones'];
	}
	
	function selectAutores(){
		global $con;
		$sql="SELECT * FROM autores WHERE status = 1 ORDER BY nombre DESC";
		$q=mysqli_query($con, $sql);
		while($a=mysqli_fetch_assoc($q)){
			echo "<option value='$a[idAutor]'>$a[nombre]</option>";
		}
	}
	
	function selectIdiomas(){
		global $con;
		$sql="SELECT * FROM idiomas WHERE status = 1 ORDER BY nombre DESC";
		$q=mysqli_query($con, $sql);
		while($i=mysqli_fetch_assoc($q)){
			echo "<option value='$i[idIdioma]'>$i[nombre]</option>";
		}
	}
	
	function selectFormatos(){
		global $con;
		$sql="SELECT * FROM formatos WHERE status = 1 ORDER BY nombre DESC";
		$q=mysqli_query($con, $sql);
		while($f=mysqli_fetch_assoc($q)){
			echo "<option value='$f[idFormato]'>$f[nombre]</option>";
		}
	}
	
	function getNombreCategoria($val){
		global $con;
		$sql="SELECT nombre FROM categorias WHERE id = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data['nombre'];
	}
	
	// Aprobar transacciones pendientes. $val1 = transactionId de Payu - $val2 = Estado de la transaccion
	function transaccionPendiente($val1,$val2){
		global $con;
		$sql="SELECT * FROM pedidos WHERE transactionId  = '$val1'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		
		// Si la transacción fue aprobada, entonces pasar los libros a la biblioteca del cliente
		if($val2=='APPROVED'){
			$sql1="SELECT * FROM publicacionesxpedido WHERE pedido = '$data[id]'";
			$q1=mysqli_query($con, $sql1);
			$n1=mysqli_num_rows($q1);
			if($n1>0){
				while($pub=mysqli_fetch_assoc($q1)){
					$sql2="INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$data[usuario]','$pub[publicacion]')";
					$q2=mysqli_query($con, $sql2);
					if(!$q2){
						mysqli_error($con);
					}else{
						echo 1;
					}
				}
			}
		}
		
		// Notificar al usuario acerca del estado de la transacción, una vez esta sea aprobada o declinada
		require_once('../phpmailer.php');
		$headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	    if($val2=='APPROVED'){
		    $subject='Tu transacción ha sido aprobada';
		    $html='<p>Hola '.getNombreUsuario($data['usuario']).'!</p><p>Queremos informarte que el proceso de pago relacionado con tu pedido No. '.$data['id'].' ha sido aprobado.</p><p>Por favor ingresa a tu biblioteca, en donde encontrarás las publicaciones que seleccionaste.</p><p><b>Un abrazo enorme del equipo de Phronesis. ¡Disfruta tus publicaciones!</b></p>';
	    }elseif($val2=='DECLINED'){
		    $subject="Tu transacción ha sido rechazada.";
		    $html="<p>Hola ".getNombreUsuario($data['usuario'])."!</p><p>Lamentamos informarte que el proceso de pago relacionado con tu pedido No. ".$data['id']." ha sido rechazado.</p><p>Puedes consultar con tu banco para poder verificar la razón o también puedes intentar hacer tu compra con otro medio de pago.</p><p><b>Un abrazo enorme del equipo de Phronesis.</b></p>";
	    }
		$mail = new PHPMailer();
		$mail->From = 'no-reply@phronesisvirtual.com';
		$mail->FromName = 'Phronesis | El arte de saber vivir';
		$mail->Subject = utf8_decode($subject);
		$mail->Body = utf8_decode($html);
		$mail->IsHTML(true);
		$mail->AddAddress(getEmailUsuario($data['usuario']));
		$mail->AddBCC('juanc@closerdesign.co');
		//$mail->AddReplyTo($_POST['']);
		if(!$sent_mail= $mail->Send()){
			echo 'msg';
		}else{
			echo 1;
		}
		
	}
	
	// Generar desprendible de pago
	function getDesprendible($val){
		global $con;
		$sql="SELECT urlPaymentReceiptHtml FROM pedidos WHERE id = '$val' AND status = 1 AND urlPaymentReceiptHtml != ''";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n==1){
			$data=mysqli_fetch_array($q);
			return "<br /><a class='btn btn-default' href='$data[urlPaymentReceiptHtml]' target='_blank'><i class='fa fa-download'></i> Generar desprendible</a>";
		}
	}
	
	// CAMPOS DE SELECCIÓN
	function selectPaises(){
		global $con;
		$sql="SELECT * FROM paises ORDER BY nombre ASC";
		$q=mysqli_query($con, $sql);
		$html="";
		while($p=mysqli_fetch_assoc($q)){
		   $html.="<option value='$p[iso2]'>$p[nombre]</option>";
		}
		return $html;
	}
	
	function selectPaisesSelect($val){
		global $con;
		$sql="SELECT * FROM paises ORDER BY nombre ASC";
		$q=mysqli_query($con, $sql);
		$html="";
		while($p=mysqli_fetch_assoc($q)){
		   $selected="";
		   if($p['iso2']==$val){
			   $selected="selected";
		   }
		   $html.="<option $selected value='$p[iso2]'>$p[nombre]</option>";
		}
		return $html;
	}
	
	function getEmailNotificacion(){
		global $con;
		$sql="SELECT * FROM notificaciones WHERE status = 1";
		$q=mysqli_query($con, $sql);
		while($address=mysqli_fetch_assoc($q)){
			$mail->AddAddress($address['email']);
		}
	}
	
	
	/////////////////////////////////////////////////////////////////////////
	
	// NAVEGACIÓN
	
	/////////////////////////////////////////////////////////////////////////
	
		// OBTENER LA DIRECCIÓN ACTUAL
		function getUrlActual(){
			return "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		}
		
	/////////////////////////////////////////////////////////////////////////
	
	// GESTION DE ARTICULOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// LLAMAR ARTICULO
		function getArticuloCategoria($val){
			global $con;
			$sql="SELECT * FROM articulos WHERE id = '$val'";
			$q=mysqli_query($con, $sql);
			$data=mysqli_fetch_array($q);
			$html="";
			$html.="
				<div class='col-lg-6 col-md-6 col-sm-6 articulos-container' data-sr='enter bottom and scale up 20% over 2s' >
					<div class='articulos'>
						<a href='/index.php?content=articulos&id=$data[id]'><img class='img img-responsive' src='/admin/_lib/file/imgarticulos/$data[imagen]' alt='$data[titulo]' /></a>
						<div class='articulos-inner'>
							<h4><a href='/index.php?content=articulos&id=$data[id]'>$data[titulo]</a></h4>
							<p>".custom_echo(strip_tags($data['contenido']))."</p>
						</div>
					</div>
					<div class='cta-blog'>
						<p><a href='/index.php?content=articulos&id=$data[id]'><i class='fa fa-plus-square'></i> Leer la nota</a></p>
					</div>
				</div>
			";
			return $html;
		}
		
		// OBTENER EL IDENTIFICADOR DEL PROGRAMA ESPECIAL
		function getIdPrograma($val){
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "SELECT id_programa FROM programas_especiales WHERE alias = '$val'"));
			return $data['id_programa'];
		}
		
		// OBTENER EL TITULO DEL PROGRAMA ESPECIAL
		function getTituloPrograma($val){
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "SELECT titulo FROM programas_especiales WHERE id_programa = '$val'"));
			return $data['titulo'];
		}
		
		// OBTENER LA DESCRIPCION DEL PROGRAMA ESPECIAL
		function getDescripcionPrograma($val){
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "SELECT descripcion FROM programas_especiales WHERE id_programa = '$val'"));
			return $data['descripcion'];
		}
		
	/////////////////////////////////////////////////////////////////////////
	
	// NOTIFICACIONES
	
	/////////////////////////////////////////////////////////////////////////
	
		// ENVIAR NOTIFICACIÓN
		function notificar($email,$asunto,$mensaje){
			
			$mail             = new PHPMailer();
			
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
			                                           // 1 = errors and messages
			                                           // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = SMTP_HOST; // sets the SMTP server
			$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
			$mail->Username   = SMTP_USER; // SMTP account username
			$mail->Password   = SMTP_PASS;        // SMTP account password
			
			$mail->SMTPSecure = 'tls';
			
			$mail->SetFrom('info@phronesisvirtual.com', 'Editorial Phronesis');
			
			$mail->Subject    = utf8_decode($asunto);
			
			$html=file_get_contents(NOTIFICACION);
			
			$html=str_replace("{{contenido}}",$mensaje,$html);
			$html=str_replace("{{email}}",$email,$html);
			
			$mail->MsgHTML($html);
			
			$mail->AddAddress($email);
			
			if(!$mail->Send()) {
			  return 0;
			} else {
			  return 1;
			}
			
		}
		
		// NOTIFICAR ACERCA DE LA ORDEN
		function notificarOrden($orden,$estado){
			
			global $con;
			
			if($estado == 1){
				
				$msg="<p>Queremos informarte que el estado de tu orden No. $orden es PENDIENTE.</p>";
				$msg.="<p>Una vez la entidad nos notifique acerca del proceso de pago, te enviaremos una nueva notificación.</p>";
				
			}else{
				
				$msg="<p>Queremos informarte que el estado de la orden No. $orden es APROBADA.</p>";
				$msg.="<p>Las siguientes obras han sido agregadas a tu biblioteca:</p>";
				$msg.="<ul>";
				
				$qListado=mysqli_query($con, "SELECT publicacion FROM publicacionesxpedido WHERE pedido = '$orden'");
				
				$nListado=mysqli_num_rows($qListado);
				
				while($item=mysqli_fetch_assoc($qListado)){
					$msg.="
						<li>
							<a href='".URL."publicacion/$item[publicacion]'>
								".getNombrePublicacion($item['publicacion'])." - (Descargar)
							</a>
						</li>";
				}
				
				$msg.="</ul>";
				$msg.="<p>Gracias por tu compra. ¡Estamos felices de que seas miembro de nuestra comunidad!</p>";
				
			}
			
			$notificar = notificar(getEmailOrden($orden),"Información importante acerca de tu orden No. $orden",$msg);
			
			if($notificar == 0){
				return 0;
			}else{
				return 1; 
			}
			
		}
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE ÓRDENES
	
	/////////////////////////////////////////////////////////////////////////
	
		// OBTENER EL EMAIL DE UN PEDIDO
		function getEmailOrden($orden){
			global $con;
			$sql="SELECT email FROM usuarios JOIN pedidos ON pedidos.usuario = usuarios.id WHERE pedidos.id = '$orden'";
			$q=mysqli_query($con, $sql);
			$data=mysqli_fetch_array($q);
			return $data['email'];
		}
		
		// RECORRER LOS ITEMS Y ACTUALIZAR EL VALOR DEL PEDIDO
		function actualizaPedido($val){
			
			$total = 0;
			
			global $con;
			$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$val'";
			$q=mysqli_query($con, $sql);
			$n=mysqli_num_rows($q);
			
			if($n>0){
				while( $p = mysqli_fetch_assoc($q) ){
					$total += getPrecioPublicacion($p['publicacion']);
				}
			}
			
			if( $total > 0 ){
				mysqli_query($con, "UPDATE pedidos SET valor = '$total' WHERE id = '$val'");
			}
			
		}
		
		// OBTENER EL PRECIO DE LA ORDEN
		function getValorDeLaOrden($val){
			global $con;
			$q=mysqli_query($con, "
				SELECT valor FROM pedidos WHERE id = '$val'
			");
			$data=mysqli_fetch_array($q);
			return $data['valor'];
		}
		
		// ENTREGAR LOS PRODUCTOS DE UN PEDIDO APROBADO
		function entregarPedido($orden){
			
			global $con;
			$entregado = 0;
			$qRecoge=mysqli_query($con, "
				SELECT 
					publicacion,usuario 
				FROM 
					publicacionesxpedido 
				JOIN 
					pedidos 
				ON 
					publicacionesxpedido.pedido = pedidos.id 
				WHERE 
					pedido = '$orden'
			");
			
			while($p = mysqli_fetch_assoc($qRecoge)){
				
				if(!mysqli_query($con, "
					INSERT INTO
						publicacionesxusuario (
							usuario,
							publicacion
						) VALUES (
							'$p[usuario]',
							'$p[publicacion]'
						)
				")){
					$entregado=0;
				}else{
					$entregado=1;
				}
				
			}
			
			return $entregado;
			
		}
	
	/////////////////////////////////////////////////////////////////////////
	
	// GESTIÓN DE PAGOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// Proceso de pagos Paypal
		function pagarConPaypal($orden,$urlCancela){
	
			$data=array(
				'merchant_email'=>'pfhurtado@phronesisvirtual.com',
				'product_name'=>'Compra en elartedesabervivir.com',
				'amount'=>getValorDeLaOrden($orden),
				'currency_code'=>'USD',
				'thanks_page'=>URL.'includes/php.php?consulta=ejecutarPago&orden='.$orden."&formaDePago=2&estado=2",
				'notify_url'=>URL,
				'cancel_url'=>URL.'includes/php.php?consulta=ejecutarPago&orden='.$orden.'&formaDePago=3&estado=3&url='.$urlCancela,
				'paypal_mode'=>true,
			);
	
			define( 'SSL_URL', 'https://www.paypal.com/cgi-bin/webscr' );
			define( 'SSL_SAND_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
	
			$action = '';
			
			//Is this a test transaction? 
			$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
			//$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
	
			$form = '';
	
			$form .= '<form name="frm_payment_method" action="' . SSL_URL . '" method="post">';
			$form .= '<input type="hidden" name="business" value="' . $data['merchant_email'] . '" />';
			
			// Instant Payment Notification & Return Page Details /
			$form .= '<input type="hidden" name="notify_url" value="' . $data['notify_url'] . '" />';
			$form .= '<input type="hidden" name="cancel_return" value="' . $data['cancel_url'] . '" />';
			$form .= '<input type="hidden" name="return" value="' . $data['thanks_page'] . '" />';
			$form .= '<input type="hidden" name="rm" value="2" />';
			
			// Configures Basic Checkout Fields -->
			$form .= '<input type="hidden" name="lc" value="" />';
			$form .= '<input type="hidden" name="no_shipping" value="1" />';
			$form .= '<input type="hidden" name="no_note" value="1" />';
	
			$form .= '<input type="hidden" name="currency_code" value="' . $data['currency_code'] . '" />';
			$form .= '<input type="hidden" name="page_style" value="paypal" />';
			$form .= '<input type="hidden" name="charset" value="utf-8" />';
			$form .= '<input type="hidden" name="item_name" value="' . $data['product_name'] . '" />';
			$form .= '<input type="hidden" value="_xclick" name="cmd"/>';
			$form .= '<input type="hidden" name="amount" value="' . $data['amount'] . '" />';
			$form .= '<script>';
			$form .= 'setTimeout("document.frm_payment_method.submit()", 0);';
			$form .= '</script>';
			$form .= '</form>';
			
			echo $form;
		
		}
		
	/////////////////////////////////////////////////////////////////////////
	
	// VARIOS
	
	/////////////////////////////////////////////////////////////////////////
	
		// AGREGAR A LISTA NEWSLETTER
		function agregaListaNewsletter($email){
			global $con;
			$q=mysqli_query($con, "
				SELECT
					email
				FROM
					newsletter
				WHERE email = '$email'
			");
			$n=mysqli_num_rows($q);
			if($n<1){
				mysqli_query($con, "INSERT INTO newsletter (email, optin) VALUES ('$email','1')");
			}
		}
		
		// ENTREGA CONTENIDO PARA NUEVOS USUARIOS REGISTRADOS
		function entregaObsequiosTienda($id_usuario){
			
			global $con;
			$q = mysqli_query($con, "SELECT id FROM publicaciones WHERE obsequio = 1");
			$n = mysqli_num_rows($q);
			if($n>0){
				
				$pub = array();
				while($p = mysqli_fetch_assoc($q)){
					array_push($pub, $p['id']);
				}
				
				$e = 0;
			
				foreach($pub as $f){
					$q_obsequio = mysqli_query($con, "
						INSERT INTO 
							publicacionesxusuario (
								usuario,
								publicacion
							) VALUES (
								'$id_usuario',
								'$f'
							)"
						);
					if($q_obsequio){
						$e = 1;
					}
				}
				
				$asunto = getNombreUsuario($id_usuario).", tienes nuevo contenido en tu biblioteca";
				$msg = "
					<p><b>¡Gracias por unirte a nuestra comunidad!</b></p>
					<p>Para darte la bienvenida, hemos querido tener un detalle contigo y agregamos contenido en tu biblioteca de manera gratuita.</p>
					<p>Para poder consultarlo debes ingresar al siguiente enlace:<br /><b><a href='".URL."mi-cuenta/mis-publicaciones' target='_blank'>Haz click aquí para consultar tu nuevo contenido</a></b>.</p>
					<p>Te mandamos un abrazo enorme, estamos felices de que estés con nosotros.</p>
				";
				
				if($e == 1){
					$notificar = notificar(getEmailUsuario($id_usuario),$asunto,$msg);
				}
				
			}
			
		}
		
		function logRegistros($usuario,$url){
			global $con;
			mysqli_query($con, "INSERT INTO log_sesiones (usuario,url) VALUES ('$usuario','$url')");
			return mysqli_insert_id($con);
		}
		
		function logActividades($usuario,$sesion,$actividad){
			global $con;
			mysqli_query($con, "INSERT INTO log_actividades (usuario,sesion,actividad) VALUES ('$usuario', '$sesion', '$actividad')");
		}
	
?>
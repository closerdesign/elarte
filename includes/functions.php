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
			   	});
			   	$(".btnDemo'.$val.'").click(function(){
			   		$("#jquery_jplayer_'.$val.'").jPlayer("play");
			   		$(".btnDemo'.$val.'").hide();
			   		$(".btnStop'.$val.'").show();
			   	});
			   	$(".btnStop'.$val.'").click(function(){
			   		$("#jquery_jplayer_'.$val.'").jPlayer("stop");
			   		$(".btnDemo'.$val.'").show();
			   		$(".btnStop'.$val.'").hide();
			   	});
		   </script>
		   <div id="jquery_jplayer_'.$val.'" class="jp-jplayer"></div>
		';
		return $btn;
	}
	
	function getBtnDescarga($val){
		global $con;
		$btn='<a href="javascript:void(0)" onclick="openRegisterModal()" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</a>';
		if(isset($_SESSION['id'])){
			$sql = "SELECT * FROM publicacionesxusuario WHERE usuario = " . $_SESSION['id'] . "  AND publicacion = '" . $val . "'";
			$q=mysqli_query($con, $sql);
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

	function getUrlImagenArticulo($id_articulo)
	{
		global $con;
		$sql = "SELECT imagen FROM articulos WHERE id = $id_articulo";
		$q = mysqli_query($con, $sql);
		$data = mysqli_fetch_array($q);
		$img = 'http://www.elartedesabervivir.com/admin/_lib/file/imgarticulos/'.strip_tags($data['imagen']);
		return $img;
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
	
	function getDataPaquete($val){
		global $con;
		$sql="SELECT * FROM paquetes WHERE idPaquete = '$val'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		return $data;
	}
	
	function validaPaquete($val){
		global $con;
		$n = mysqli_num_rows(mysqli_query($con, "SELECT * FROM paquetes WHERE idPaquete = '$val'"));
		if( $n != 1 ){
			return 0;
		}else{
			return 1;
		}
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
	
		function removeUnwantedChars($cadena){
			$titulo = $cadena;
			$titulo = str_replace(' ', '-', $titulo);
			$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
			$titulo = strtr( $titulo, $unwanted_array );
			$titulo = preg_replace('/[^A-Za-z0-9\-]/', '', $titulo);

			return $titulo;
		}

		function inject_ad_text_after_n_chars($content) {
			$enable_length = 1500;
			$after_character = 1000;
			if ( (strlen($content) > $enable_length)) {
				$before_content = substr($content, 0, $after_character);
				$after_content = substr($content, $after_character);
				$after_content = explode('</p>', $after_content);
				$str_to_insert = '<div class="banner300x250" style="float: right; margin-left: 1rem;">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Web App - Artículos Categoría Der 1 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:250px"
					     data-ad-client="ca-pub-5955686545071577"
					     data-ad-slot="2903925647"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>';
				array_splice($after_content, 1, 0, $str_to_insert);
				$after_content = implode('</p>', $after_content);
				return $before_content . $after_content;
			} else {
				return $content;
			}
		}

		// LLAMAR ARTICULO
		function getArticuloCategoria($val){
			global $con;
			$sql="SELECT * FROM articulos WHERE id = '$val'";
			$q=mysqli_query($con, $sql);
			$data=mysqli_fetch_array($q);

			if ( (int)$data['programas_especiales'] > 0 ) {
				$alias = getProgramaData( (int)$data['programas_especiales'] );
			}

			$titulo = removeUnwantedChars($data['titulo']);

			$html="";
			$html.="
				<div class='col-lg-6 col-md-6 col-sm-6 articulos-container' data-sr='enter bottom and scale up 20% over 2s'>
					<div class='articulos'>
						<a href='/index.php?".( (int)$data['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' )."content=articulos&titulo=$titulo&id=$data[id]'><img class='img img-responsive' src='/admin/_lib/file/imgarticulos/$data[imagen]' alt='$titulo' /></a>
						<div class='articulos-inner'>
							<h4><a href='/index.php?".( (int)$data['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' )."content=articulos&titulo=$titulo&id=$data[id]'>$data[titulo]</a></h4>
							<p>".custom_echo(strip_tags($data['contenido']))."</p>
						</div>
					</div>
					<div class='cta-blog'>
						<p><a data-programa='".(int)$data['programas_especiales']."' href='/index.php?".( (int)$data['programas_especiales'] > 0 ? 'slug=programas-especiales&alias='.$alias['alias'].'&' : '' )."content=articulos&titulo=$titulo&id=$data[id]'><i class='fa fa-plus-square'></i> Leer la nota</a></p>
					</div>
				</div>
			";
			return $html;
		}
		
		function getProgramaData($id)
		{
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM programas_especiales WHERE id_programa = '$id'"));
			return $data;
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
			
			$arrContextOptions=array(
			    "ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
			    ),
			);

			$html=file_get_contents(NOTIFICACION, false, stream_context_create($arrContextOptions));
			
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
		function pagarConPaypal($orden,$urlCancela, $paquete_id = null){

			$data=array(
				'merchant_email'=>'pfhurtado@phronesisvirtual.com',
				'product_name'=>'Compra en elartedesabervivir.com',
				'amount'=>getValorDeLaOrden($orden),
				'currency_code'=>'USD',
				'thanks_page'=>URL.'includes/php.php?consulta=ejecutarPago&orden='.$orden.'&formaDePago=2&estado=2'.( !empty( $paquete_id ) ? '&paquete_id='.$paquete_id : '' ),
				'notify_url'=>URL,
				'cancel_url'=>URL.'includes/php.php?consulta=ejecutarPago&orden='.$orden.'&formaDePago=3&estado=3'. ( !empty( $paquete_id ) ? '&paquete_id='.$paquete_id : '' ) .'&url='.$urlCancela,
				'paypal_mode'=>false,
			);
	
			define( 'SSL_URL', 'https://www.paypal.com/cgi-bin/webscr' );
			define( 'SSL_SAND_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
	
			$action = '';
			
			//Is this a test transaction? 
			$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
			//$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;
	
			$form = '';
	
			$form .= '<form name="frm_payment_method" action="' . $action . '" method="post">';
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
		
		function validatePSEResponseTransferencia()
		{
			global $con;
			extract($_REQUEST);

			if(
				isset($merchantId) 
				&& isset($transactionState) 
				&& isset($lapTransactionState) 
				&& isset($message) 
				&& isset($referenceCode) 
				&& isset($reference_pol) 
				&& isset($transactionId) 
				&& isset($description) 
				&& isset($trazabilityCode) 
				&& isset($cus) 
				&& isset($orderLanguage) 
				&& isset($extra1) 
				&& isset($extra2) 
				&& isset($extra3) 
				&& isset($polTransactionState) 
				&& isset($signature) 
				&& isset($polResponseCode) 
				&& isset($lapResponseCode) 
				&& isset($risk) 
				&& isset($polPaymentMethod) 
				&& isset($lapPaymentMethod) 
				&& isset($polPaymentMethodType) 
				&& isset($lapPaymentMethodType) 
				&& isset($installmentsNumber) 
				&& isset($pseCycle) 
				&& isset($buyerEmail) 
				&& isset($pseBank) 
				&& isset($pseReference1) 
				&& isset($pseReference2) 
				&& isset($pseReference3) 
			){
				$user_message = '';
				$sql= 'UPDATE
						pedidos
					SET
						' . ( $lapTransactionState == 'PENDING' ? 'status = \'1\' ' : '' ) . '
						' . ( $lapTransactionState == 'APPROVED' ? 'status = \'2\' ' : '' ) . '
						' . ( $lapTransactionState == 'DECLINED' ? 'status = \'3\' ' : '' ) . '
						' . ( $lapTransactionState == 'ERROR' ? 'status = \'3\' ' : '' ) . '
						' . ( $lapTransactionState == 'EXPIRED' ? 'status = \'3\' ' : '' ) . ',
						state = \'' . $lapTransactionState . '\',
						pendingReason = \'' . $lapTransactionState . '_' . $lapResponseCode .'\',
						responseCode = \'' . $lapResponseCode . '\'
					WHERE transactionId = \'' . $transactionId . '\'
					';
				if(!mysqli_query($con, $sql)){
					$consulta = 'no exitosa: ';
				}else{
					$consulta = 'exitosa: ';
				}

				$qRecoge=mysqli_query($con, "
					SELECT 
						id
					FROM 
						pedidos
					WHERE 
						transactionId like '$transactionId'
				");
			
				$p = mysqli_fetch_assoc($qRecoge);

				if ( $lapTransactionState == 'APPROVED' 
					&& $transactionState == 4
					&& $polTransactionState == 4
					&& $lapResponseCode == 'APPROVED'
					&& $polResponseCode == 1
				) {
					$user_message = 'Transacción aprobada';
					entregarPedido($p['id']);
					$message_successs = 'Para acceder a las obras que acabas de adquirir ingresa a <a href="https://www.elartedesabervivir.com/mi-cuenta/mis-publicaciones">tu biblioteca</a>.';
				}


				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'PAYMENT_NETWORK_REJECTED'
					&& $polResponseCode == 4
				) {
					$user_message = 'Transacción rechazada por entidad financiera';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'ENTITY_DECLINED'
					&& $polResponseCode == 5
				) {
					$user_message = 'Transacción rechazada por el banco';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INSUFFICIENT_FUNDS'
					&& $polResponseCode == 6
				) {
					$user_message = 'Fondos insuficientes';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_CARD'
					&& $polResponseCode == 7
				) {
					$user_message = 'Tarjeta inválida';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'CONTACT_THE_ENTITY'
					&& $polResponseCode == 8
				) {
					$user_message = 'Contactar entidad financiera';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'BANK_ACCOUNT_ACTIVATION_ERROR'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'BANK_ACCOUNT_NOT_AUTHORIZED_FOR_AUTOMATIC_DEBIT'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'BANK_ACCOUNT_NOT_AUTHORIZED_FOR_AUTOMATIC_DEBIT'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_AGENCY_BANK_ACCOUNT'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_BANK_ACCOUNT'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_BANK'
					&& $polResponseCode == 8
				) {
					$user_message = 'Débito automático no permitido';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'EXPIRED_CARD'
					&& $polResponseCode == 9
				) {
					$user_message = 'Tarjeta vencida';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'RESTRICTED_CARD'
					&& $polResponseCode == 10
				) {
					$user_message = 'Tarjeta restringida';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_EXPIRATION_DATE_OR_SECURITY_CODE'
					&& $polResponseCode == 12
				) {
					$user_message = 'Fecha de expiración o código de seguridad inválidos';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'REPEAT_TRANSACTION'
					&& $polResponseCode == 13
				) {
					$user_message = 'Reintentar pago';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'INVALID_TRANSACTION'
					&& $polResponseCode == 14
				) {
					$user_message = 'Transacción inválida';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'EXCEEDED_AMOUNT'
					&& $polResponseCode == 17
				) {
					$user_message = 'El valor excede el máximo permitido por la entidad';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'ABANDONED_TRANSACTION'
					&& $polResponseCode == 19
				) {
					$user_message = 'Transacción abandonada por el pagador';
				}

				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'CREDIT_CARD_NOT_AUTHORIZED_FOR_INTERNET_TRANSACTIONS'
					&& $polResponseCode == 22
				) {
					$user_message = 'Tarjeta no autorizada para comprar por internet';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'ANTIFRAUD_REJECTED'
					&& $polResponseCode == 23
				) {
					$user_message = 'Transacción rechazada por sospecha de fraude';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'DIGITAL_CERTIFICATE_NOT_FOUND'
					&& $polResponseCode == 9995
				) {
					$user_message = 'Certificado digital no encotnrado';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'BANK_UNREACHABLE'
					&& $polResponseCode == 9996
				) {
					$user_message = 'Error tratando de cominicarse con el banco';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'ENTITY_MESSAGING_ERROR'
					&& $polResponseCode == 9997
				) {
					$user_message = 'Error comunicándose con la entidad financiera';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& $lapResponseCode == 'NOT_ACCEPTED_TRANSACTION'
					&& $polResponseCode == 9998
				) {
					$user_message = 'Transacción no permitida al tarjetahabiente';
				}
				
				if ( $lapTransactionState == 'DECLINED' 
					&& $transactionState == 6
					&& $polTransactionState == 6
					&& ( 
							$lapResponseCode == 'INTERNAL_PAYMENT_PROVIDER_ERROR'
							|| $lapResponseCode == 'INACTIVE_PAYMENT_PROVIDER'
						)
					&& $polResponseCode == 9999
				) {
					$user_message = 'Error';
				}
				
				if ( $lapTransactionState == 'ERROR'
					&& $transactionState == 104
					&& $polTransactionState == 6
					&& ( 
							$lapResponseCode == 'ERROR'
							|| $lapResponseCode == 'ERROR_CONVERTING_TRANSACTION_AMOUNTS'
							|| $lapResponseCode == 'BANK_ACCOUNT_ACTIVATION_ERROR'
							|| $lapResponseCode == 'FIX_NOT_REQUIRED'
							|| $lapResponseCode == 'AUTOMATICALLY_FIXED_AND_SUCCESS_REVERSAL'
							|| $lapResponseCode == 'AUTOMATICALLY_FIXED_AND_UNSUCCESS_REVERSAL'
							|| $lapResponseCode == 'AUTOMATIC_FIXED_NOT_SUPPORTED'
							|| $lapResponseCode == 'NOT_FIXED_FOR_ERROR_STATE'
							|| $lapResponseCode == 'ERROR_FIXING_AND_REVERSING'
							|| $lapResponseCode == 'ERROR_FIXING_INCOMPLETE_DATA'
							|| $lapResponseCode == 'PAYMENT_NETWORK_BAD_RESPONSE'
						)
					&& $polResponseCode == 9999
				) {
					$user_message = 'Error';
				}
				
				if ( $lapTransactionState == 'ERROR'
					&& $transactionState == 104
					&& $polTransactionState == 6
					&& $lapResponseCode == 'PAYMENT_NETWORK_NO_CONNECTION'
					&& $polResponseCode == 9996
				) {
					$user_message = 'No fue posible establecer comunicación con la entidad financiera';
				}
				
				if ( $lapTransactionState == 'ERROR'
					&& $transactionState == 104
					&& $polTransactionState == 6
					&& $lapResponseCode == 'PAYMENT_NETWORK_NO_RESPONSE'
					&& $polResponseCode == 9996
				) {
					$user_message = 'No se recibió respuesta de la entidad financiera';
				}
				
				if ( $lapTransactionState == 'EXPIRED'
					&& $transactionState == 5
					&& $polTransactionState == 5
					&& $lapResponseCode == 'EXPIRED_TRANSACTION'
					&& $polResponseCode == 20
				) {
					$user_message = 'Transacción expirada';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 7
					&& $lapResponseCode == 'PENDING_TRANSACTION_REVIEW'
					&& $polResponseCode == 15
				) {
					$user_message = 'Transacción en validación manual';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 14
					&& $lapResponseCode == 'PENDING_TRANSACTION_CONFIRMATION'
					&& $polResponseCode == 15
				) {
					$user_message = 'Recibo de pago generado. En espera de pago';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 7
					&& $lapResponseCode == 'PENDING_TRANSACTION_TRANSMISSION'
					&& $polResponseCode == 9998
				) {
					$user_message = 'Transacción no permitida';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 14
					&& $lapResponseCode == 'PENDING_PAYMENT_IN_ENTITY'
					&& $polResponseCode == 25
				) {
					$user_message = 'Recibo de pago generado. En espera de pago';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 15
					&& $lapResponseCode == 'PENDING_PAYMENT_IN_BANK'
					&& $polResponseCode == 26
				) {
					$user_message = 'Recibo de pago generado. En espera de pago';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 10
					&& $lapResponseCode == 'PENDING_SENT_TO_FINANCIAL_ENTITY'
					&& $polResponseCode == 29
				) {
					$user_message = '';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 12
					&& $lapResponseCode == 'PENDING_AWAITING_PSE_CONFIRMATION'
					&& $polResponseCode == 9994
				) {
					$user_message = 'En espera de confirmación de PSE';
				}
				
				if ( $lapTransactionState == 'PENDING'
					&& $transactionState == 7
					&& $polTransactionState == 18
					&& $lapResponseCode == 'PENDING_NOTIFYING_ENTITY'
					&& $polResponseCode == 25
				) {
					$user_message = 'Recibo de pago generado. En espera de pago';
				}
				
				$message_fail = 'Haz <a id="message_fail" href="">click aquí</a> para realizar el pago nuevamente o intentar con otro medio de pago.';

				$html = "";
				$html .= '<div class="modal fade" id="PseResponse" tabindex="-1" role="dialog" aria-labelledby="PseResponseLabel" aria-hidden="false">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="PseResponseVacioTitulo">Proceso de Pago</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12" id="PseResponseVacioContenido">
												<h3>Estimado Cliente</h3>
												<p>Le informamos que su proceso de compra se encuentra en estado: <strong>' . $message . '</strong>
												</p>
												<blockquote>
													'. $user_message .'
												</blockquote>
												<p>'.( isset($message_successs) ? $message_successs : $message_fail ).'</p>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</div>';
				$html .= "<script>";
				$html .= " 
							$(window).load(function (){
								$('#PseResponse').modal('show');
								console.log('".$consulta."');
								if ( typeof localStorage.getItem('return_url_pse') != 'undefined' ) {
									$('#message_fail').prop('href', localStorage.getItem('return_url_pse'));
								}
							});
						";
				$html .= "</script>";
				return $html;
			}
		}	
?>
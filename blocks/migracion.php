<div class="row">
	<div class="col-md-12">
	<?php
		
		echo md5('Is8IaahjYe3NiERKNnaLaQcJxJiVYnw0ap84ckWIPTjAboqLSmg4yL1RBastidas1983');
		
		$con_ps = mysqli_connect("localhost","phronesi_elarte","Z,'VT,?x3*LdjMvR","phronesi_live") or die ("DB Error");
		mysqli_query($con_ps, "SET NAMES utf8");
		
		/*$sql = "SELECT * FROM ps_customer LIMIT 30000, 10000;";*/
		$sql = "SELECT * FROM ps_customer WHERE email like 'marciaaranai@hotmail.com';";
		/*$sql = "SELECT * FROM ps_customer";*/
		$q = mysqli_query($con_ps, $sql);
		$n = mysqli_num_rows($q);
		
		echo "<p>$n resultados</p>";
		
		$html = "";
		$html .= "<table class='table table-bordered table-striped'>";
		
		function agregarPublicaciones($usuario,$publicacion){
			global $con;
			$sql12 = "SELECT * FROM publicacionesxusuario WHERE usuario = '$usuario' AND publicacion = '".getCodigoPublicacionPs($publicacion)."'";
			$q12 = mysqli_query($con, $sql12);
			$n12 = mysqli_num_rows($q12);
			$html = '';
			if($n12>0){
				$html .= "<p>El producto ya se encuentra en la biblioteca del usuario.</p>";
			}else{
				$sql13 = "INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$usuario','".getCodigoPublicacionPs($publicacion)."')";
				$q13 = mysqli_query($con, $sql13);
				if(!$q13){
					$html .= "<p>No se pudo agregar la publicación ".getNombrePublicacionPs($publicacion)." en la biblioteca.</p>";
				}else{
					$html .= "<p>El producto ".getNombrePublicacionPs($publicacion)." ha sido agregado en la biblioteca.</p>";
				}						
			}
			return $html;
		}
		
		while( $row = mysqli_fetch_assoc($q) ){
			
			$html .= "<tr><td>";
			
			$html .= "<p>Usuario: <b>$row[email]</b></p>";
			
			$sql2 = "SELECT * FROM usuarios WHERE email = '$row[email]'";
			$q2 = mysqli_query($con, $sql2);
			$n2 = mysqli_num_rows($q2);
			
			$html .= "<p>Usuario encontrado $n2 veces.</p>";
			
			// Esta rutina la realizamos para obtener el ID del usuario si este ya existe
			$usuarioId = 0;
			
			// Si el usuario ya existe, lo que debemos hacer el obtener el ID
			if($n2==1){
				$sql3 = "SELECT id FROM usuarios WHERE email = '$row[email]'";
				$q3 = mysqli_query($con, $sql3);
				$data3 = mysqli_fetch_array($q3);
				$usuarioId = $data3['id'];
			}
			
			// Si el usuario ya existe, pero aparece más de una vez en la base de datos, almacenar temporalmente su información con el registro más reciente y almacenar las publicaciones que tenga para crearlo nuevamente, depurando la base de datos
			if($n2>1){
				
				// Obtener los id anteriores
				$olds = array();
				while($user = mysqli_fetch_assoc($q2)){
					array_push($olds, $user['id']);
				}
				
				foreach( $olds as $u ){
					$html .= "<p>Usuario anterior: $u</p>";
				}
				
				// Obtener los datos para recrear el usuario
				$sql3 = "SELECT * FROM usuarios WHERE email = '$row[email]' ORDER BY creado DESC LIMIT 1";
				$q3 = mysqli_query($con, $sql3);
				$data3 = mysqli_fetch_array($q3);
				
				$id = $data3['id'];
				$fbid = $data3['fbId'];
				$nombreCompleto = $data3['nombreCompleto'];
				$nombre = $data3['nombre'];
				$apellido = $data3['apellido'];
				$email = $data3['email'];
				$password = $data3['password'];
				$ciudad = $data3['ciudad'];
				$pais = $data3['pais'];
				$genero = $data3['genero'];
				$fecha_nacimiento = $data3['fecha_nacimiento'];
				$status = $data3['status'];
				$optin = $data3['optin'];
				$perfil = $data3['perfil'];
				
				// Obtener las publicaciones para reasignarlas al nuevo usuario
				$publicaciones = array();
				$sql4 = "SELECT publicacion FROM publicacionesxusuario WHERE usuario = '$id' GROUP BY publicacion";
				$q4 = mysqli_query($con, $sql4);
				$n4 = mysqli_num_rows($q4);
				$html .= "<p>EL usuario tiene $n4 publicaciones.</p>";
				if($n4>0){
					while($pub = mysqli_fetch_assoc($q4)){
						array_push($publicaciones, $pub['publicacion']);
						$html .= "<p>".$pub['publicacion']." - ".getNombrePublicacion($pub['publicacion'])." - ".getFormatoPublicacion($pub['publicacion'])."</p>";
					}
				}
				
				// En este punto deberíamos eliminar y recrear el usuario con la nueva información, para proceder a contrastar contra los datos en el Prestashop. De aquí saldría el nuevo usuario id, con el que trabajaríamos la nueva información.
				$sql5 = "DELETE FROM usuarios WHERE email = '$row[email]'";
				$q5 = mysqli_query($con, $sql5);
				if(!$q5){
				   $html .= "<p>No se pudo eliminar el usuario.</p>";
				}else{
					$html .= "<p>Usuario eliminado.</p>";
					// Ahora eliminamos las publicaciones para limpiar la tabla de registros basura y crearlas nuevamente
					$sql6 = "DELETE FROM publicacionesxusuario WHERE usuario = '$id'";
					$q6 = mysqli_query($con, $sql6);
					if(!$q6){
						$html .= "<p>No se pudo eliminar las publicaciones.</p>";
					}else{
						$html .= "<p>Publicaciones eliminadas.</p>";
						
						// Procedemos con la creación del nuevo usuario
						$sql7 = "
							INSERT INTO 
								usuarios (
									fbId, 
									nombreCompleto, 
									nombre, 
									apellido,
									email,
									password,
									ciudad,
									pais,
									genero,
									fecha_nacimiento,
									status,
									optin,
									perfil
								) VALUES (
									'$fbid',
									'$nombreCompleto',
									'$nombre',
									'$apellido',
									'$email',
									'$password',
									'$ciudad',
									'$pais',
									'$genero',
									'$fecha_nacimiento',
									'$status',
									'$optin',
									'$perfil'
								)";
						$q7 = mysqli_query($con, $sql7);
						if(!$q7){
						   $html .= "<p>Problemas creando al usuario.</p>";
						}else{
						   $usuarioId = mysqli_insert_id($con);
						   $html .= "<p>Usuario re-creado exitosamente.</p>";
						}
						
					foreach( $olds as $old ){
							
						// Actualizacion comentarios
						if(!mysqli_query($con, "
							UPDATE comentarios SET usuario = '$usuarioId' WHERE usuario = '$old'
						")){
							$html .= "<p>Error al actualizar los comentarios. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Comentarios actualizados para $old exitosamente.</p>";
						}
						
						// Actualización descargas
						if(!mysqli_query($con, "
							UPDATE descargas SET usuario = '$usuarioId' WHERE usuario = '$old'
						")){
							$html .= "<p>No se pudo actualizar descargas. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Descargas actualizadas para $old exitosamente.</p>";
						}
						
						// Actualización favoritos
						if(!mysqli_query($con, "UPDATE favoritos SET usuario = '$usuarioId' WHERE usuario = '$old'")){
							$html .= "<p>No se pudo actualizar favoritos. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Favoritos actualizados para $old exitosamente.</p>";
						}
						
						// Actualización inscripciones
						if(!mysqli_query($con, "UPDATE inscritos_conferencia SET usuario_id = '$usuarioId' WHERE usuario_id = '$old'")){
							$html .= "<p>No se pudo actualizar inscripciones. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Inscripciones actualizadas para $old exitosamente.</p>";
						}
						
						// Actualizacion pedidos
						if(!mysqli_query($con, "UPDATE pedidos SET usuario = '$usuarioId' WHERE usuario = '$old'")){
							$html .= "<p>No se pudo actualizar pedidos. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Pedidos actualizado para $old exitosamente.</p>";
						}
						
						// Actualizacion publicaciones
						if(!mysqli_query($con, "UPDATE publicacionesxusuario SET usuario = '$usuarioId' WHERE usuario = '$old'")){
							$html .= "<p>No se pudo actualizar publicaciones. ".mysqli_error($con)."</p>";
						}else{
							$html .= "<p>Publicaciones actualizado para $old exitosamente.</p>";
						}
						
					}
					
					}
				}
				
				// Aquí recreamos las publicaciones de los usuarios duplicados
				foreach( $publicaciones as $p ){
					$sql14 = "SELECT * FROM publicacionesxusuario WHERE usuario = '$usuarioId' AND publicacion = '$p'";
					$q14 = mysqli_query($con, $sql14);
					$n14 = mysqli_num_rows($q14);
					if($n14<1){
						$sql9 = "
							INSERT INTO
								publicacionesxusuario (
									usuario,
									publicacion
								) VALUES (
									'$usuarioId',
									'$p'
								)
						";
						$q9 = mysqli_query($con, $sql9);
						if(!$q9){
							$html .= "<p>Publicación ".getNombrePublicacion($p)." no pudo ser creada.</p>";
						}else{
							$html .= "<p>Publicación ".getNombrePublicacion($p)." creada exitosamente.</p>";
						}	
					}
				}
			}
			
			// Si el usuario aún no existe
			if($n2==0){
				
				// Aquí debemos crear al nuevo usuario con los datos del Prestashop, como resultado, deberemos tener el usuarioId, y así proceder con el paso siguiente que es la verificación de las órdenes.
				$sql8 = "
					INSERT INTO
						usuarios (
							nombreCompleto,
							nombre,
							apellido,
							email,
							password,
							ciudad,
							pais,
							genero,
							fecha_nacimiento,
							status,
							optin,
							perfil,
							ps
						) VALUES (
							'$row[firstname] $row[lastname]',
							'$row[firstname]',
							'$row[lastname]',
							'$row[email]',
							'$row[passwd]',
							'',
							'',
							'',
							'$row[birthday]',
							'1',
							'1',
							'0',
							'1'
						)
				";
				$q8 = mysqli_query($con, $sql8);
				if(!$q8){
					$html .= "<p>No se pudo crear el usuario.</p>";
				}else{
					$usuarioId = mysqli_insert_id($con);
					$html .= "<p>Usuario creado exitosamente.</p>";
				}
				
			}
			
			// Ya teniendo el usuario ID, debemos proceder a validar el listado de publicaciones
			$sql10 = "SELECT * FROM ps_orders WHERE id_customer = '$row[id_customer]' and current_state = 2";
			$q10 = mysqli_query($con_ps, $sql10);
			while($order = mysqli_fetch_assoc($q10)){
				$html .= "<p>Cliente con la orden No. $order[id_order] - Referencia: $order[reference]</p>";
				$sql11 = "SELECT * FROM ps_order_detail WHERE id_order = '$order[id_order]'";
				$q11 = mysqli_query($con_ps, $sql11);
				while($prod = mysqli_fetch_assoc($q11)){
					
					if(
						($prod['product_id'] == 25) ||
						($prod['product_id'] == 54)
					){
						$html .= "<p style='color:red'>Paquete PDF encontrado</p>";
						$contenidos = array(2,3,4,8,11);
						foreach( $contenidos as $cont ){
							$html .= agregarPublicaciones( $usuarioId,$cont );
						}
					}elseif(
						($prod['product_id'] == 40)
					){
						$html .= "<p style='color:red'>Paquete AUDIO encontrado</p>";
						$contenidos = array(26,27,29,30,31);
						foreach( $contenidos as $cont ){
							$html .= agregarPublicaciones( $usuarioId,$cont );
						}
					}else{
						$html .= "<p>Producto <b>".getNombrePublicacionPs($prod['product_id'])."</b> incluído en la orden</p>";
						$html .= agregarPublicaciones($usuarioId,$prod['product_id']);	
					}
				}
			}
			
			$html .= "</td></tr>";
			
		}
		
		$html .= "</table>";
		
		echo $html;
		
	?>		
	</div>
</div>

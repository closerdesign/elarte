<div class="row top">
	<div class="container">
		<div class="row">
		<?php
			$sql="SELECT * FROM ps_customer GROUP BY email";
			$q=mysqli_query($con, $sql);
			echo "<ul>";
			while($old=mysqli_fetch_assoc($q)){
				echo "<li>";
				$sql1="
					INSERT INTO
						usuarios (
							nombre,
							apellido,
							email,
							password,
							fecha_nacimiento,
							status,
							optin,
							perfil
						) VALUES (
							'$old[firstname]',
							'$old[lastname]',
							'$old[email]',
							'".md5($old['email'])."',
							'$old[birthday]',
							'1',
							'$old[newsletter]',
							'0'
						)
				";
				$q1=mysqli_query($con, $sql1);
				if(!$q1){
					echo "Problemas migrando $old[email]. ".mysqli_error($con)."<br />";
				}else{
					$idUsuario=mysqli_insert_id($con);
					echo "<p>$old[email] migrado exitosamente.</p>";
					$sql2="SELECT * FROM ps_orders WHERE id_customer = '$old[id_customer]' AND current_state = 2";
					$q2=mysqli_query($con,$sql2);
					$n2=mysqli_num_rows($q2);
					if($n2>0){
						echo "<ul>";
						while($order=mysqli_fetch_assoc($q2)){
							echo "<li>Orden aceptada: $order[reference]</li>";
							$sql3="SELECT * FROM ps_order_detail WHERE id_order = $order[id_order]";
							$q3=mysqli_query($con, $sql3);
							$n3=mysqli_num_rows($q3);
							if($n3>0){
								echo "<ul>";
								while($prod=mysqli_fetch_assoc($q3)){
									$sql4="SELECT id FROM publicaciones WHERE codPs = '$prod[product_id]'";
									$q4=mysqli_query($con, $sql4);
									$n4=mysqli_num_rows($q4);
									if($n4>0){
										$pub=mysqli_fetch_array($q4);
										if(!mysqli_query($con, "INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$idUsuario','$pub[id]')")){
											echo "<li>Problemas con: Producto: $prod[product_id] - $prod[product_name]</li>";
										}else{
											echo "<li>Producto: $prod[product_id] - $prod[product_name] migrado exitosamente</li>";
										}	
									}else{
										echo("<li>Revisar: Producto: $prod[product_id] - $prod[product_name]</li>");
									}
									if($prod['product_id']==25){
										$paquete=array(2,3,4,8,11);
										while($t=each($paquete)){
											$sql5="INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$idUsuario','$t[1]')";
											$q5=mysqli_query($con, $sql5);
											if(!$q5){
												echo("<li>Problema procesando compra de paquete.</li>");
											}else{
												echo("<li>Compra de paquete procesada exitosamente.</li>");
											}
										}
									}
								}
								echo "</ul>";
							}
						}
						echo "</ul>";
					}
				}
				echo "</li>";
			}
			echo "</ul>";
		?>
		</div>
	</div>
</div>
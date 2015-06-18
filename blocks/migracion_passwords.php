<div class="row">
	<div class="col-md-12">
		<?php
			
			$con_ps = mysqli_connect("localhost","phronesi_elarte","Z,'VT,?x3*LdjMvR","phronesi_live") or die ("DB Error");
			mysqli_query($con_ps, "SET NAMES utf8");
			
			$html = "";
			
			$sql = "SELECT email FROM usuarios WHERE ciudad = '' AND pais = '' LIMIT 3000 OFFSET 16000";
			$q = mysqli_query($con, $sql);
			$n = mysqli_num_rows($q);
			
			$html .= "<p>$n registros encontrados.</p>";
			
			$html .= "<table class='table table-bordered table-striped'>";
			
			while($user = mysqli_fetch_assoc($q)){
				
				$html .= "<tr>";
				$html .= "<td>$user[email]</td>";
				
				$sql1 = "SELECT passwd FROM ps_customer WHERE email = '$user[email]'";
				$q1 = mysqli_query($con_ps, $sql1);
				$n1 = mysqli_num_rows($q);
				$data = mysqli_fetch_assoc($q1);
				
				if($n1<1){
					$html .= "<td>Usuario no encontrado</td>";
				}else{
					if($data['passwd']!=""){
						if(!mysqli_query($con, "
							UPDATE
								usuarios
							SET
								password = '$data[passwd]',
								ps = '1'
							WHERE
								email = '$user[email]'
						")){
							$html .= "<td><p>Se ha presentado un error: ".mysqli_error($con)."</p></td>";
						}else{
							$html .= "<td><p>Contraseña actualizada exitosamnete.</p></td>";
						}
					}
				}
				
				$html .= "</tr>";
				
			}
			
			$html .= "</table>";
			
			echo $html;
			
		?>
	</div>
</div>
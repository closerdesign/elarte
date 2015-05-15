<?php
	
	// Activación de cuentas
	if(isset($_REQUEST['activar'])&&(isset($_REQUEST['token']))){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE id='$_REQUEST[activar]' AND password='$_REQUEST[token]'"));
		if($n!=1){
			echo '<script>alert("Activación fallida. Datos inconsistentes.")<script>';
		}else{
			if(!mysqli_query($con, "UPDATE usuarios SET status = '1' WHERE id = '$_REQUEST[activar]' AND password = '$_REQUEST[token]'")){
				echo "<script>alert('Se presentó un error procesando la activación de su cuenta. Por favor inténtelo de nuevo más tarde.');</script>";
			}else{
				echo "<script>alert('Su cuenta ha sido activada exitosamente. Ahora puede ingresar con sus credenciales.');</script>";
				echo "<script>window.location.href='index.php';</script>";
			}
		}
	}
	
	// Inicio de sesión
	if((isset($_POST['login-email']))&&(isset($_POST['login-password']))){
		$email=$_POST['login-email'];
		$password=md5($_POST['login-password']);
		$q=mysqli_query($con, "SELECT * FROM usuarios WHERE (email = '$email' AND password = '$password') AND status = 1");
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo '<script>alert("Su nombre de usuario y/o su contraseña es incorrecta, o su cuenta se encuentra inactiva. Por favor verifique.");</script>';
		}else{
			$data=mysqli_fetch_array($q);
			$_SESSION['id']=$data['id'];
			$_SESSION['perfil']=$data['perfil'];
			echo "<script>window.location.href='index.php?content=mi-cuenta'</script>";
		}
	}
	
	// Fin de la sesión
	if($_REQUEST['task']=='cerrar-sesion'){
		unset($_SESSION['id']);
		unset($_SESSION['perfil']);
		?>
		<script>
			window.location.href="index.php";
		</script>
		<?php
	}
	
	// Despublicar comentarios
	if( ($_REQUEST['content']=='unpublish') && (isset($_REQUEST['id'])) ){
		if(!mysqli_query($con, "
			UPDATE comentarios SET status = '0' WHERE idComentarios = '$_REQUEST[id]'
		")){
			echo "<script>alert('Se presentó un error. El comentario no pudo ser despublicado.');</script>";
		}else{
			echo "<script>alert('El comentario ha sido despublicado exitosamente');window.location.href='index.php';</script>";
		}
	}
	
?>
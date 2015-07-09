<?php
	
	// Despublicar comentarios
	if( isset($_REQUEST['content']) && ($_REQUEST['content']=='unpublish') && (isset($_REQUEST['id'])) ){
		if(!mysqli_query($con, "
			UPDATE comentarios SET status = '0' WHERE idComentarios = '$_REQUEST[id]'
		")){
			echo "<script>alert('Se presentó un error. El comentario no pudo ser despublicado.');</script>";
		}else{
			echo "<script>alert('El comentario ha sido despublicado exitosamente');window.location.href='index.php';</script>";
		}
	}
	
	// Recuperar la sesión
	if(
		(!isset($_SESSION['id'])) &&
		(isset($_COOKIE['session']))
	){
		$_SESSION['id'] = $_COOKIE['session'];
		$html = "";
		$html .= "<script>";
		$html .= "	location.reload();";
		$html .= "</script>";
	}
	
?>
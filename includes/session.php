<?php
	
	//session_unset();
	
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
	
?>
<?php
	
	if(isset($_SESSION['FBID'])){
	   if(!isset($_SESSION['id'])){
	   	echo('<script>iniciaFb('.$_SESSION['FBID'].',"'.$_SERVER['REQUEST_URI'].'");</script>');
	   }
	}
	
	if(isset($_SESSION['id'])){
		$sql="SELECT * FROM usuarios WHERE id = '$_SESSION[id]'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		if(
			($data['nombre']=="") ||
			($data['apellido']=="") ||
			($data['email']=="") ||
			($data['ciudad']=="") ||
			($data['pais']=="") ||
			($data['genero']=="")
		){
			echo('<script>$("#myModalCompletaRegistro").modal("show")</script>');
		}
	}
	
?>
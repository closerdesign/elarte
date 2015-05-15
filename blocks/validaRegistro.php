<?php
	
	if(isset($_SESSION['FBID'])){
		$sql="SELECT * FROM usuarios WHERE fbId = '$_SESSION[FBID]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n<1){
			echo('<script>$("#myModalEmailFacebook").modal("show");</script>');
		}else{
			if(!isset($_SESSION['id'])){
				echo('<script>iniciaFb('.$_SESSION['FBID'].');</script>');
			}
			
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
			//echo('<script>alert("'.$_SESSION['id'].'")</script>');
			echo('<script>$(".finRegistro").fadeIn();</script>');
		}
	}
	
?>
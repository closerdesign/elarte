<?php
	if( 
		(isset($_COOKIE['pedido'])==true) &&
		($_COOKIE['pedido']!="") &&
		(isset($_SESSION['id'])) &&
		(isset($_REQUEST['paymentResponse'])) && 
		($_REQUEST['paymentResponse']=='success') )
	{
		$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$_COOKIE[pedido]'";
		$q=mysqli_query($con, $sql);
		if(!$q){
			echo("<script>alert('Se presentó un error. Lamentamos la molestia. Por favor contáctenos para solucionarlo.');</script>");
		}else{
			while($pub=mysqli_fetch_assoc($q)){
				$sql1="INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$_SESSION[id]','$pub[publicacion]')";
				mysqli_query($con, $sql1);
			}
			?>
				<script>
					$.removeCookie('pedido'); // => true
				</script>
			<?php
			echo('<script>alert("Forma de pago aceptada. Ahora puedes descargar los productos desde tu biblioteca.");</script>');
			echo('<script>window.location.href="/index.php?content=mi-cuenta&task=mis-publicaciones"</script>');
		}
	}elseif(
		(isset($_COOKIE['pedido'])==true) &&
		($_COOKIE['pedido']!="") &&
		(isset($_SESSION['id'])) &&
		(isset($_REQUEST['paymentResponse'])) && 
		($_REQUEST['paymentResponse']=='failed')
	){
		echo('<script>alert("Forma de pago rechazada. Por favor intente de nuevo o utilice otra forma de pago. ('.$_REQUEST['paymentMsg'].')");</script>');
		echo('<script>window.location.href="/index.php?content=mi-cuenta&task=mi-pedido"</script>');
	}
	
	if( 
		(isset($_COOKIE['pedido'])==true) &&
		($_COOKIE['pedido']!="") &&
		(isset($_SESSION['id'])) &&
		(isset($_REQUEST['lapTransactionState'])) && 
		($_REQUEST['lapTransactionState']=='APPROVED') )
	{
		$sql="SELECT * FROM publicacionesxpedido WHERE pedido = '$_COOKIE[pedido]'";
		$q=mysqli_query($con, $sql);
		if(!$q){
			echo("<script>alert('Se presentó un error. Lamentamos la molestia. Por favor contáctenos para solucionarlo.');</script>");
		}else{
			while($pub=mysqli_fetch_assoc($q)){
				$sql1="INSERT INTO publicacionesxusuario (usuario,publicacion) VALUES ('$_SESSION[id]','$pub[publicacion]')";
				mysqli_query($con, $sql1);
			}
			?>
				<script>
					$.removeCookie('pedido'); // => true
				</script>
			<?php
			echo('<script>alert("Forma de pago aceptada. Ahora puedes descargar los productos desde tu biblioteca.");</script>');
			echo('<script>window.location.href="/index.php?content=mi-cuenta&task=mis-publicaciones"</script>');
		}
	}elseif(
		(isset($_COOKIE['pedido'])==true) &&
		($_COOKIE['pedido']!="") &&
		(isset($_SESSION['id'])) &&
		(isset($_REQUEST['lapTransactionState'])) && 
		($_REQUEST['lapTransactionState']!='APPROVED')
	){
		/*echo('<script>alert("Forma de pago rechazada. Por favor intente de nuevo o utilice otra forma de pago. ('.$_REQUEST['paymentMsg'].')");</script>');
		echo('<script>window.location.href="/index.php?content=mi-cuenta&task=mi-pedido"</script>');*/
	}
	
?>
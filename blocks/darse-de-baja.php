<div class="row top">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<p class="lead">
					<?php
						if(!mysqli_query($con, "UPDATE newsletter SET optin = '0' WHERE email = '$_REQUEST[email]'")){
					?>
					Se presentó un problema procesando tu solicitud. Por favor intenta de nuevo.
					<?php }else{ ?>
					Tu dirección ha sido dada de baja exitosamente.
					<?php } ?>
				</p>
			</div>
		</div>
		
	</div>
</div>
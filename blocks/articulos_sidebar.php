<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-md categorias">
	<div class="row">
		<form id="buscarArticulos">
			<div class="buscarContenedor">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="buscarArticulo" id="buscarArticulo" placeholder="Buscar artículo..." required />
				</div>
				<div class="col-md-12 form-group">
					<input type="hidden" name="consulta" id="consulta" value="buscarArticulos" />
					<button class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
				</div>
			</div>
		</form>
	</div>
	<!-- <div class="row">
		<div class="col-md-12">
			<div class="banner300x250">
				<a href="/conferencia-virtual">
					<img src="/img/bannerConferencia300x250.jpg" />
				</a>
			</div>
		</div>
	</div> -->
	
	<div class="row">
		<div class="lista-categorias">
			<ul class="nav nav-pills nav-stacked">
			<?php
				$q=mysqli_query($con, "SELECT * FROM categorias WHERE status = 1 ORDER BY nombre ASC");
				$n=mysqli_num_rows($q);
				if($n<1){
					echo '<li>No hay categorías disponibles.</li>';
				}else{
					while($cat=mysqli_fetch_assoc($q)){
						echo '<li role="presentation"><a href="#">'.$cat['nombre'].'</a></li>';
					}
				}
			?>  
			</ul>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<form name="newsletter" id="newsletter">
				<div class="caja-newsletter">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>¡Inscríbete ahora!</label>
							<input type="email" class="form-control" name="email-newsletter" id="email-newsletter" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<button class="btn btn-primary" type="submit">Inscribirme</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    
    <!--
	<div class="row">
    
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="banner300x250">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-5955686545071577"
				     data-ad-slot="5857392040"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
    
    -->
    
    <div class="row">
    	
        
		<div class="col-lg-12 col-md-12 col-sm-12" style="border-style:solid; border-color:#CCC; border-width:1px;">
        	
                <center>
                    <h2>Guías prácticas de Walter Riso</h2>
                    <h5>Una herramienta para hacer del amor una experiencia plena y saludable</h5>
                    <a href="https://goo.gl/y7fD44">
                    	<img class="img img-responsive" src="https://www.elartedesabervivir.com/admin/_lib/file/imgpaquetes/paqueteWalter-1.png" alt="Guías prácticas de Walter Riso">
                	</a>
                </center>
                <br />
                <ul style="list-style-image:../img/chulo.png">
								
									<li style="list-style-image:url(../img/chulo.png); font-size:14px;">Guía práctica para no sufrir de amor </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:14px;">Guía práctica para mejorar la autoestima </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:14px;">Guía práctica para no dejarse manipular y ser asertivo </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:14px;">Guía práctica para afrontar la infidelidad de la pareja </li>
                                    <li style="list-style-image:url(../img/chulo.png); font-size:14px;">Guía práctica para vencer la dependencia emocional </li>
									
				</ul>
                
                
                
                
               	<p style="font-size:24px; text-align:center"><strong>Lleva hoy la colección completa hasta con el<br /><span style="color:red">50% de descuento</span></strong></p>
                <div align="center">
                	<a href="https://goo.gl/y7fD44"><button class="btn btn-success btn-lg">Más información</button></a>
                </div>
                <br />
                
            
        	
        </div>
    </div>
    
	<!-- <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="banner300x250">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-5955686545071577"
				     data-ad-slot="8810858442"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div> -->
</div>
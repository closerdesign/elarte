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
	<div class="row">
		<div class="col-md-12">
			<div class="banner300x250">
				<a href="/conferencia-virtual">
					<img src="/img/bannerConferencia300x250.jpg" />
				</a>
			</div>
		</div>
	</div>
	
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="banner300x250">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Web App - Artículos Categoría Der 2 -->
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="banner300x250">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Web App - Artículos Categoría Der 3 -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-5955686545071577"
				     data-ad-slot="8810858442"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
</div>
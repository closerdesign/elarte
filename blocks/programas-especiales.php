<div class="row top">
	<div class="container">
		<div class="col-md-8">
			<?php if(!isset($_REQUEST['alias'])){ ?>
			<div class="row">
				<div class="col-md-12">
					<p class="lead">Por favor seleccione uno de nuestros programas:</p>
					<?php
						$sql = "
							SELECT
								*
							FROM
								programas_especiales
							WHERE
								estado = 1 
						";
						$q = mysqli_query($con, $sql);
						$n = mysqli_num_rows($q);
						if($n<1){
							echo('<p>No hay contenidos disponibles.</p>');
						}else{
							$html = "";
							$html .= "<ul>";
							while($p = mysqli_fetch_assoc($q)){
								$html .= "<li><a href='index.php?content=programas-especiales&alias=".$p['alias']."'>$p[titulo]</a></li>";
							}
							$html .= "</ul>";
							echo $html;
						}
					?>
				</div>
			</div>
			<?php }else{ ?>
			<?php $id = getIdPrograma($_REQUEST['alias']); ?>
			<div class="row">
				<div class="col-md-12">
					<p><a class="btn btn-default" href='index.php?content=programas-especiales'><i class='fa fa-arrow-left'></i> Volver a Programas Especiales</a></p>
					<h1><?php echo getTituloPrograma($id) ?></h1>
					<?php echo getDescripcionPrograma($id) ?>
				</div>
			</div>
			<hr>
			<div class="row hidden-xs">
				<div class="col-lg-12 col-md-12 col-sm-12 banner">
					<div class="banner728x90">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Web App - Banner Artículo Top -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:728px;height:90px"
						     data-ad-client="ca-pub-5955686545071577"
						     data-ad-slot="2764324843"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
			</div>
			<div class="row publicidadMoviles">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Web App - Banner Top Artículo Móvil -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-5955686545071577"
					     data-ad-slot="1419115243"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</div>
			<div class="row">
				<?php
					$sql = "
						SELECT
							id
						FROM
							articulos
						WHERE
							programas_especiales = '$id'
						AND
							programas_especiales > 0
						AND
							status = 1
						AND
							fecha_publicacion <= NOW()
						ORDER BY
							fecha_publicacion DESC
					";
					$q = mysqli_query($con, $sql);
					$n = mysqli_num_rows($q);
					if($n<1){
						$html = "";
						$html .= "<div class='col-md-12'>";
						$html .= "	<p>No se encontraron resultados disponibles</p>";
						$html .= "</div>";
						echo $html;
					}else{
						while($a = mysqli_fetch_assoc($q)){
							echo getArticuloCategoria($a['id']);
						}
					}
				?>
			</div>
			<?php } ?>
		</div>
		<?php require('blocks/articulos_sidebar.php'); ?>
	</div>
</div>
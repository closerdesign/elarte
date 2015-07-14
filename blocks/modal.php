<!-- Modal Contacto -->
<div class="modal fade" id="myModalContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="contacto" name="contacto">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Contacto</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="nombre-contacto" id="nombre-contacto" required />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<label>Apellido</label>
							<input type="text" class="form-control" name="apellido-contacto" id="apellido-contacto" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email-contacto" id="email-contacto" required />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<label>Motivo de su mensaje</label>
							<input type="text" class="form-control" name="motivo-mensaje" id="motivo-mensaje" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Mensaje</label>
							<textarea class="form-control" name="mensaje-contacto" id="mensaje-contacto" required ></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal compartir con un amigo -->
<div class="modal fade" id="myModalCompartir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="formEnviarCompartirAmigo" id="formEnviarCompartirAmigo">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title" id="myModalLabel">Compartir con un amigo</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<input type="text" class="form-control" name="tuNombre" id="tuNombre" placeholder="Tu nombre" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<input type="email" class="form-control" name="emailAmigo" id="emailAmigo" placeholder="Correo electrónico de tu amigo" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<textarea class="form-control" name="mensajeAdicional" id="mensajeAdicional" placeholder="Si quieres, puedes agregar un mensaje personalizado (Opcional)"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Compartir</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Mi pedido</h4>
			</div>
			
			<div class="modal-body" id="detalles-pedido"></div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Seguir comprando</button>
				<a href="/index.php?content=mi-cuenta&task=mi-pedido" class="btn btn-primary">Ir a pagar</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Vacio-->
<div class="modal fade" id="myModalVacio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalVacioTitulo"></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12" id="myModalVacioContenido"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Iniciar Sesión -->
<div class="modal fade" id="myModalIngresar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="formIngresar" id="formIngresar">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Iniciar sesión</h4>
				</div>
				<div class="modal-body">
					<div id="modalAlert" style="display:none" class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Nombre de usuario y/o contraseña incorrectos. Por favor intente de nuevo.</strong>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<input type="email" class="form-control" name="emailIngresar" id="emailIngresar" placeholder="Email" required />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 form-group">
							<input type="password" class="form-control" name="passIngresar" id="passIngresar" placeholder="Contraseña" required />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="/index.php?content=recuperar-contrasena" class="btn btn-default">Recuperar contraseña</a>
					<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade login" id="loginModal">
	<div class="modal-dialog login animated">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Entrar con</h4>
			</div>
			<div class="modal-body">
				<div class="box">
					<div class="content">
						<div class="social">
							<a id="facebook_login" class="circle facebook" href="/includes/fbconfig.php?url=<?php echo $_SERVER['REQUEST_URI'] ?>">
							<i class="fa fa-facebook fa-fw"></i>
							</a>
						</div>
						<div class="division">
							<div class="line l"></div>
							<span>ó</span>
							<div class="line r"></div>
						</div>
						<div class="error"></div>
						<div class="form loginBox">
							<form method="post" action="/login" accept-charset="UTF-8">
								<input id="emailLogin" class="form-control" type="text" placeholder="Email" name="emailLogin">
								<input id="passwordLogin" class="form-control" type="password" placeholder="Contraseña" name="passwordLogin">
								<input id="currentUrl" name="currentUrl" type="hidden" value="<?php echo "$_SERVER[REQUEST_URI]" ?>" />
								<input class="btn btn-default btn-login" type="button" value="Entrar" onclick="loginAjax()">
							</form>
						</div>
					</div>
				</div>
				<div class="box">
					<div class="content registerBox" style="display:none;">
						<div class="form">
							<form method="post" name="registroUsuarios" id="registroUsuarios" >
								<input id="emailRegistro" class="form-control" type="email" placeholder="Email" name="emailRegistro" required >
								<input id="passwordRegistro" class="form-control" type="password" placeholder="Contraseña" name="passwordRegistro" required >
								<input id="cPasswordRegistro" class="form-control" type="password" placeholder="Repetir contraseña" name="cPasswordRegistro" required >
								<input class="btn btn-default btn-register" type="submit" value="Crear cuenta" >
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="forgot login-footer">
					<span> 
						<a href="javascript:showRegisterForm();">Crear una cuenta</a><br />
						<a href="/index.php?content=recuperar-contrasena">Recuperar contraseña</a>
					</span>
				</div>
				<div class="forgot register-footer" style="display:none">
					<span>¿Ya tienes una cuenta?</span>
					<a href="javascript:showLoginForm();">Entrar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal ¿Por qué registrarse? -->
<div class="modal fade" id="myModalPorQueRegistrarse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">¿Por qué registrarse?</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<p class="lead text-left">¡Únete a la comunidad!</p>
						<p>Disfruta de nuestros contenidos e interactúa para que puedas aprender tips y consejos útiles para perfeccionarte en "El arte de saber vivir".</p>
					</div>
					<div class="col-md-8">
						<p class="lead text-left">Beneficios de registrarte</p>
						<ul>
							<li>
								Tendrás acceso a nuestros <b>Programas Especiales</b> para usuarios registrados
								<ul>
									<li>Combatiendo la obesidad - Por la Dra. Iris Luna</li>
									<li>Reflexiones (Sección de Video) - por Water Riso</li>
								</ul>
							</li>
							<li>Acceso a tu biblioteca personalizada</li>
							<li>Podrás agregar a favoritos tus artículos preferidos</li>
							<li>Podrás participar, comentar nuestros artículos y compartir con el resto de la comunidad.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button id="btnPorQue" type="button" class="btn btn-primary">Registrarme</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal descargar muestra usuario público -->
<div class="modal fade" id="myModalDescargaMuestra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">¡Gracias por tu interés en nuestras publicaciones!</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<p>Para poder descargar la muestra de esta publicación debes registrarte o iniciar sesión con tu cuenta.</p>
						<p><b>Beneficios de registrarte</b></p>
						<ul>
							<li>
								Tendrás acceso a nuestros <b>Programas Especiales</b> para usuarios registrados
								<ul>
									<li>Combatiendo la obesidad - Por la Dra. Iris Luna</li>
									<li>Reflexiones (Sección de Video) - por Water Riso</li>
								</ul>
							</li>
							<li>Acceso a tu biblioteca personalizada</li>
							<li>Podrás agregar a favoritos tus artículos preferidos</li>
							<li>Podrás participar, comentar nuestros artículos y compartir con el resto de la comunidad.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary btnSesionMuestra">Iniciar sesión</button>
				<button type="button" class="btn btn-primary btnRegistrarme">Registrarme</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Email Facebook -->
<div class="modal fade" id="myModalEmailFacebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="formEmailFacebook" id="formEmailFacebook">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Felicitaciones! Has ingresado con tu cuenta de Facebook!</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<p>Por favor completa la información a continuación para finalizar tu proceso de registro.</p>
						</div>
						<div class="col-md-6 form-group" <?php if(isset($_SESSION['FIRST_NAME']) && $_SESSION['FIRST_NAME']!=""){echo('style="display:none"');} ?>>
							<label>Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo ( isset($_SESSION['FIRST_NAME']) ? $_SESSION['FIRST_NAME'] : '' ) ?>" required />
						</div>
						<div class="col-md-6 form-group" <?php if( isset($_SESSION['LAST_NAME']) && $_SESSION['LAST_NAME']!=""){echo('style="display:none"');} ?>>
							<label>Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo ( isset($_SESSION['LAST_NAME']) ? $_SESSION['LAST_NAME'] : '') ?>" required />
						</div>
						<div class="col-md-6 form-group" <?php if( isset($_SESSION['EMAIL']) && $_SESSION['EMAIL']!=""){echo('style="display:none"');} ?>>
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="email" value="<?php echo ( isset($_SESSION['EMAIL']) ? $_SESSION['EMAIL'] : '' ); ?>" required />
						</div>
						<div class="col-md-6 form-group">
							<label>Ciudad</label>
							<input type="text" class="form-control" name="ciudad" id="ciudad" required />
						</div>
						<div class="col-md-6 form-group">
							<label>País</label>
							<select class="form-control" name="pais" id="pais" required >
								<option value="">Seleccione...</option>
								<?php echo selectPaises(); ?>
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label>Género</label>
							<select class="form-control" name="genero" id="genero" required >
								<option value="">Seleccione...</option>
								<option value="Mujer">Mujer</option>
								<option value="Hombre">Hombre</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="fbid" id="fbid" value="<?php echo ( isset($_SESSION['FBID']) ? $_SESSION['FBID'] : ''); ?>" />
					<input type="hidden" name="consulta" id="consulta" value="emailFacebook" />
					<button type="submit" class="btn btn-primary">Continuar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Programas Especiales -->
<div class="modal fade" id="myModalEspeciales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
				<h4 class="modal-title" id="myModalLabel">Programas Especiales</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="card-container">
							<div class="card">
								<div class="front">
									<div class="cover">
										<img src="/images/rotating_card_thumb2.png"/>
									</div>
									<div class="user">
										<img class="img-circle" src="/images/reflexiones.jpg"/>
									</div>
									<div class="content">
										<div class="main">
											<h3 class="name">Reflexiones para Vivir Mejor</h3>
											<p class="profession">Walter Riso</p>
										</div>
									</div>
								</div>
								<!-- end front panel -->
								<div class="back">
									<div class="header">
										<h5 class="motto">Reflexiones para Vivir Mejor</h5>
									</div>
									<div class="content">
										<div class="main">
											<p>Programa en video conducido por el psicólogo y escritor Walter Riso en el que se busca crear un espacio de reflexión sobre los comportamientos que hacen parte de nuestra vida.</p>
											<p style="text-align: center"><a class="btn btn-default" href="/index.php?content=mi-cuenta&task=reflexiones">Ir al programa</a></p>
										</div>
									</div>
								</div>
								<!-- end back panel -->
							</div>
							<!-- end card -->
						</div>
						<!-- end card-container -->
					</div>
					<!-- end col sm 3 -->
					<div class="col-md-3">
						<div class="card-container">
							<div class="card">
								<div class="front">
									<div class="cover">
										<img src="/images/rotating_card_thumb2.png"/>
									</div>
									<div class="user">
										<img class="img-circle" src="/images/iris.jpg"/>
									</div>
									<div class="content">
										<div class="main">
											<h3 class="name">Mente Sana, Vida Sana</h3>
											<p class="profession">Iris Luna</p>
										</div>
									</div>
								</div>
								<!-- end front panel -->
								<div class="back">
									<div class="header">
										<h5 class="motto">Mente Sana, Vida Sana</h5>
									</div>
									<div class="content">
										<div class="main">
											<p>Armonía entre cuerpo y mente de la mano de la Dra. Iris Luna, médico psiquiatra magister en nutrición con especialización en sobrepeso y obesidad.</p>
											<p style="text-align: center"><a class="btn btn-default" href="/programas-especiales/mente-sana-vida-sana">Ir al programa</a></p>
										</div>
									</div>
								</div>
								<!-- end back panel -->
							</div>
							<!-- end card -->
						</div>
						<!-- end card-container -->
					</div>
					<!-- end col sm 3 -->
					<div class="col-md-3">
						<div class="card-container">
							<div class="card">
								<div class="front">
									<div class="cover">
										<img src="/images/rotating_card_thumb2.png"/>
									</div>
									<div class="user">
										<img class="img-circle" src="/img/Luis_Florez_Alarcon.jpg"/>
									</div>
									<div class="content">
										<div class="main">
											<h3 class="name">¿Ángeles caídos o antropoides erguidos?</h3>
											<p class="profession">Luis Flórez Alarcón</p>
										</div>
									</div>
								</div>
								<!-- end front panel -->
								<div class="back">
									<div class="header">
										<h5 class="motto">¿Ángeles caídos o antropoides erguidos?</h5>
									</div>
									<div class="content">
										<div class="main">
											<p>Esta columna pretende analizar las motivaciones humanas a la luz de algunos principios científicos acerca del proceso motivacional, mirando este proceso desde una perspectiva teórica de corte cognitivo.</p>
											<p style="text-align: center"><a class="btn btn-default" href="/programas-especiales/angeles-caidos-o-antropoides-erguidos">Ir al programa</a></p>
										</div>
									</div>
								</div>
								<!-- end back panel -->
							</div>
							<!-- end card -->
						</div>
						<!-- end card-container -->
					</div>
					<!-- end col sm 3 -->
					<div class="col-md-3">
						<div class="card-container">
							<div class="card">
								<div class="front">
									<div class="cover">
										<img src="/images/rotating_card_thumb2.png"/>
									</div>
									<div class="user">
										<img class="img-circle" src="/img/Nancy_Castrillon.png"/>
									</div>
									<div class="content">
										<div class="main">
											<h3 class="name">El arte y la virtud del cuidado</h3>
											<p class="profession">Nancy Castrillón</p>
										</div>
									</div>
								</div>
								<!-- end front panel -->
								<div class="back">
									<div class="header">
										<h5 class="motto">El arte y la virtud del cuidado</h5>
									</div>
									<div class="content">
										<div class="main">
											<p>Cuidar es un arte. En este espacio la Dra. Nancy Castrillón, licenciada en psicología, máster en Neurorehabilitación y Humanidades; nos enseña sobre el arte de cuidar. "Cuidar de mi para poder cuidar de otros".</p>
											<p style="text-align: center"><a class="btn btn-default" href="/programas-especiales/el-arte-y-la-virtud-del-cuidado">Ir al programa</a></p>
										</div>
									</div>
								</div>
								<!-- end back panel -->
							</div>
							<!-- end card -->
						</div>
						<!-- end card-container -->
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- Nuevo modal -->
<div class="modal fade" id="myNuevoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" id="myNuevoModalContenido"></div>
	</div>
</div>

<!-- Modal Finaliza Registro -->
<div class="modal fade" id="myModalCompletaRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="formFinalizaRegistro" id="formFinalizaRegistro" >
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">¡Registro exitoso!</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p>Por favor completa los datos a continuación para finalizar tu registro:</p>
						</div>
					</div>
					<?php
					if ( isset($_SESSION['id']) ) {
						$sql="SELECT * FROM usuarios WHERE id = '$_SESSION[id]'";
						$q=mysqli_query($con, $sql);
						$data=mysqli_fetch_array($q);
					}
					?>
					<div class="row" <?php if( isset($data['email']) && $data['email']!=""){echo('style="display:none"');} ?> >
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="frEmail" id="frEmail" value="<?php echo (isset($data['email']) ? $data['email'] : ''); ?>" required />
						</div>
					</div>
					<div class="row" <?php if( isset($data['nombre']) && $data['nombre']!=""){echo('style="display:none"');} ?> >
						<div class="col-md-12 form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="frNombre" id="frNombre" value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>" required />
						</div>
					</div>
					<div class="row" <?php if( isset($data['apellido']) && $data['apellido']!=""){echo('style="display:none"');} ?> >
						<div class="col-md-12 form-group">
							<label>Apellido</label>
							<input type="text" class="form-control" name="frApellido" id="frApellido" value="<?php echo (isset($data['apellido']) ? $data['apellido'] : ''); ?>" required />
						</div>
					</div>
					<div class="row" <?php if( isset($data['ciudad']) && $data['ciudad']!=""){echo('style="display:none"');} ?>>
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Ciudad</label>
							<input type="text" class="form-control" name="frCiudad" id="frCiudad" required />
						</div>
					</div>
					<div class="row" <?php if( isset($data['pais']) && $data['pais']!=""){echo('style="display:none"');} ?>>
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>País</label>
							<select class="form-control" name="frPais" id="frPais" required>
								<option value="">Seleccione...</option>
								<?php echo selectPaises(); ?>
							</select>
						</div>
					</div>
					<div class="row" <?php if( isset($data['genero']) && $data['genero']!=""){echo('style="display:none"');} ?>>
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Género</label>
							<select class="form-control" name="frGenero" id="frGenero" required >
								<option value="">Seleccione...</option>
								<option value="Mujer">Mujer</option>
								<option value="Hombre">Hombre</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="consulta" id="consulta" value="finRegistro" />
					<button class="btn btn-primary pull-right" type="submit">Finalizar</button>
				</div>
			</form>
		</div>
	</div>
</div>
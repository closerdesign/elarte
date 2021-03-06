<div class="col-lg-12 col-md-12 col-sm-12">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h3><i class="fa fa-shopping-cart"></i> Carrito de compras</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="table table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">
								Publicación
							</th>
							<th class="text-center">
								Valor
							</th>
							<th>&nbsp;
								
							</th>
						</tr>
					</thead>
					<tbody class="loaderPedido">
						<tr>
							<td colspan="3">
								<p class="text-center"><img src="/img/ajax-loader.gif" /></p>
							</td>
						</tr>
						<script>
							$(document).ready(function(){
								contenidoDelPedido();
							})
						</script>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6" id="formasDePago">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Por favor selecciona el país en donde harás el pago</label>
					<select class="form-control" name="paisPago" id="paisPago">
						<option value="">Seleccione...</option>
						<option value="AF">Afganistán</option> 
						<option value="AL">Albania</option> 
						<option value="DE">Alemania</option> 
						<option value="AD">Andorra</option> 
						<option value="AO">Angola</option> 
						<option value="AI">Anguilla</option> 
						<option value="AQ">Antártida</option> 
						<option value="AG">Antigua y Barbuda</option> 
						<option value="AN">Antillas Holandesas</option> 
						<option value="SA">Arabia Saudí</option> 
						<option value="DZ">Argelia</option> 
						<option value="AR">Argentina</option> 
						<option value="AM">Armenia</option> 
						<option value="AW">Aruba</option> 
						<option value="AU">Australia</option> 
						<option value="AT">Austria</option>  
						<option value="AZ">Azerbaiyán</option>  
						<option value="BS">Bahamas</option>  
						<option value="BH">Bahrein</option>  
						<option value="BD">Bangladesh</option>  
						<option value="BB">Barbados</option>  
						<option value="BE">Bélgica</option>  
						<option value="BZ">Belice</option>  
						<option value="BJ">Benin</option>  
						<option value="BM">Bermudas</option>  
						<option value="BY">Bielorrusia</option>  
						<option value="MM">Birmania</option>  
						<option value="BO">Bolivia</option>  
						<option value="BA">Bosnia y Herzegovina</option>  
						<option value="BW">Botswana</option>  
						<option value="BR">Brasil</option>  
						<option value="BN">Brunei</option>  
						<option value="BG">Bulgaria</option>  
						<option value="BF">Burkina Faso</option>  
						<option value="BI">Burundi</option>  
						<option value="BT">Bután</option>  
						<option value="CV">Cabo Verde</option>  
						<option value="KH">Camboya</option>  
						<option value="CM">Camerún</option>  
						<option value="CA">Canadá</option>  
						<option value="TD">Chad</option>  
						<option value="CL">Chile</option>  
						<option value="CN">China</option>  
						<option value="CY">Chipre</option>  
						<option value="VA">Ciudad del Vaticano (Santa Sede)</option>  
						<option value="CO">Colombia</option>  
						<option value="KM">Comores</option>  
						<option value="CG">Congo</option>  
						<option value="CD">Congo, República Democrática del</option>  
						<option value="KR">Corea</option>  
						<option value="KP">Corea del Norte</option>  
						<option value="CI">Costa de Marfíl</option>  
						<option value="CR">Costa Rica</option>  
						<option value="HR">Croacia (Hrvatska)</option>  
						<option value="CU">Cuba</option>  
						<option value="DK">Dinamarca</option>  
						<option value="DJ">Djibouti</option>  
						<option value="DM">Dominica</option>  
						<option value="EC">Ecuador</option>  
						<option value="EG">Egipto</option>  
						<option value="SV">El Salvador</option>  
						<option value="AE">Emiratos Árabes Unidos</option>  
						<option value="ER">Eritrea</option>  
						<option value="SI">Eslovenia</option>  
						<option value="ES">España</option>  
						<option value="US">Estados Unidos</option>  
						<option value="EE">Estonia</option>  
						<option value="ET">Etiopía</option>  
						<option value="FJ">Fiji</option>  
						<option value="PH">Filipinas</option>  
						<option value="FI">Finlandia</option>  
						<option value="FR">Francia</option>  
						<option value="GA">Gabón</option>  
						<option value="GM">Gambia</option>  
						<option value="GE">Georgia</option>  
						<option value="GH">Ghana</option>  
						<option value="GI">Gibraltar</option>  
						<option value="GD">Granada</option>  
						<option value="GR">Grecia</option>  
						<option value="GL">Groenlandia</option>  
						<option value="GP">Guadalupe</option>  
						<option value="GU">Guam</option>  
						<option value="GT">Guatemala</option>  
						<option value="GY">Guayana</option>  
						<option value="GF">Guayana Francesa</option>  
						<option value="GN">Guinea</option>  
						<option value="GQ">Guinea Ecuatorial</option>  
						<option value="GW">Guinea-Bissau</option>  
						<option value="HT">Haití</option>  
						<option value="HN">Honduras</option>  
						<option value="HU">Hungría</option>  
						<option value="IN">India</option>  
						<option value="ID">Indonesia</option>  
						<option value="IQ">Irak</option>  
						<option value="IR">Irán</option>  
						<option value="IE">Irlanda</option>  
						<option value="BV">Isla Bouvet</option>  
						<option value="CX">Isla de Christmas</option>  
						<option value="IS">Islandia</option>  
						<option value="KY">Islas Caimán</option>  
						<option value="CK">Islas Cook</option>  
						<option value="CC">Islas de Cocos o Keeling</option>  
						<option value="FO">Islas Faroe</option>  
						<option value="HM">Islas Heard y McDonald</option>  
						<option value="FK">Islas Malvinas</option>  
						<option value="MP">Islas Marianas del Norte</option>  
						<option value="MH">Islas Marshall</option>  
						<option value="UM">Islas menores de Estados Unidos</option>  
						<option value="PW">Islas Palau</option>  
						<option value="SB">Islas Salomón</option>  
						<option value="SJ">Islas Svalbard y Jan Mayen</option>  
						<option value="TK">Islas Tokelau</option>  
						<option value="TC">Islas Turks y Caicos</option>  
						<option value="VI">Islas Vírgenes (EE.UU.)</option>  
						<option value="VG">Islas Vírgenes (Reino Unido)</option>  
						<option value="WF">Islas Wallis y Futuna</option>  
						<option value="IL">Israel</option>  
						<option value="IT">Italia</option>  
						<option value="JM">Jamaica</option>  
						<option value="JP">Japón</option>  
						<option value="JO">Jordania</option>  
						<option value="KZ">Kazajistán</option>  
						<option value="KE">Kenia</option>  
						<option value="KG">Kirguizistán</option>  
						<option value="KI">Kiribati</option>  
						<option value="KW">Kuwait</option>  
						<option value="LA">Laos</option>  
						<option value="LS">Lesotho</option>  
						<option value="LV">Letonia</option>  
						<option value="LB">Líbano</option>  
						<option value="LR">Liberia</option>  
						<option value="LY">Libia</option>  
						<option value="LI">Liechtenstein</option>  
						<option value="LT">Lituania</option>  
						<option value="LU">Luxemburgo</option>  
						<option value="MK">Macedonia, Ex-República Yugoslava de</option>  
						<option value="MG">Madagascar</option>  
						<option value="MY">Malasia</option>  
						<option value="MW">Malawi</option>  
						<option value="MV">Maldivas</option>  
						<option value="ML">Malí</option>  
						<option value="MT">Malta</option>  
						<option value="MA">Marruecos</option>  
						<option value="MQ">Martinica</option>  
						<option value="MU">Mauricio</option>  
						<option value="MR">Mauritania</option>  
						<option value="YT">Mayotte</option>  
						<option value="MX">México</option>  
						<option value="FM">Micronesia</option>  
						<option value="MD">Moldavia</option>  
						<option value="MC">Mónaco</option>  
						<option value="MN">Mongolia</option>  
						<option value="MS">Montserrat</option>  
						<option value="MZ">Mozambique</option>  
						<option value="NA">Namibia</option>  
						<option value="NR">Nauru</option>  
						<option value="NP">Nepal</option>  
						<option value="NI">Nicaragua</option>  
						<option value="NE">Níger</option>  
						<option value="NG">Nigeria</option>  
						<option value="NU">Niue</option>  
						<option value="NF">Norfolk</option>  
						<option value="NO">Noruega</option>  
						<option value="NC">Nueva Caledonia</option>  
						<option value="NZ">Nueva Zelanda</option>  
						<option value="OM">Omán</option>  
						<option value="NL">Países Bajos</option>  
						<option value="PA">Panamá</option>  
						<option value="PG">Papúa Nueva Guinea</option>  
						<option value="PK">Paquistán</option>  
						<option value="PY">Paraguay</option>  
						<option value="PE">Perú</option>  
						<option value="PN">Pitcairn</option>  
						<option value="PF">Polinesia Francesa</option>  
						<option value="PL">Polonia</option>  
						<option value="PT">Portugal</option>  
						<option value="PR">Puerto Rico</option>  
						<option value="QA">Qatar</option>  
						<option value="UK">Reino Unido</option>  
						<option value="CF">República Centroafricana</option>  
						<option value="CZ">República Checa</option>  
						<option value="ZA">República de Sudáfrica</option>  
						<option value="DO">República Dominicana</option>  
						<option value="SK">República Eslovaca</option>  
						<option value="RE">Reunión</option>  
						<option value="RW">Ruanda</option>  
						<option value="RO">Rumania</option>  
						<option value="RU">Rusia</option>  
						<option value="EH">Sahara Occidental</option>  
						<option value="KN">Saint Kitts y Nevis</option>  
						<option value="WS">Samoa</option>  
						<option value="AS">Samoa Americana</option>  
						<option value="SM">San Marino</option>  
						<option value="VC">San Vicente y Granadinas</option>  
						<option value="SH">Santa Helena</option>  
						<option value="LC">Santa Lucía</option>  
						<option value="ST">Santo Tomé y Príncipe</option>  
						<option value="SN">Senegal</option>  
						<option value="SC">Seychelles</option>  
						<option value="SL">Sierra Leona</option>  
						<option value="SG">Singapur</option>  
						<option value="SY">Siria</option>  
						<option value="SO">Somalia</option>  
						<option value="LK">Sri Lanka</option>  
						<option value="PM">St. Pierre y Miquelon</option>  
						<option value="SZ">Suazilandia</option>  
						<option value="SD">Sudán</option>  
						<option value="SE">Suecia</option>  
						<option value="CH">Suiza</option>  
						<option value="SR">Surinam</option>  
						<option value="TH">Tailandia</option>  
						<option value="TW">Taiwán</option>  
						<option value="TZ">Tanzania</option>  
						<option value="TJ">Tayikistán</option>  
						<option value="TF">Territorios franceses del Sur</option>  
						<option value="TP">Timor Oriental</option>  
						<option value="TG">Togo</option>  
						<option value="TO">Tonga</option>  
						<option value="TT">Trinidad y Tobago</option>  
						<option value="TN">Túnez</option>  
						<option value="TM">Turkmenistán</option>  
						<option value="TR">Turquía</option>  
						<option value="TV">Tuvalu</option>  
						<option value="UA">Ucrania</option>  
						<option value="UG">Uganda</option>  
						<option value="UY">Uruguay</option>  
						<option value="UZ">Uzbekistán</option>  
						<option value="VU">Vanuatu</option>  
						<option value="VE">Venezuela</option>  
						<option value="VN">Vietnam</option>  
						<option value="YE">Yemen</option>  
						<option value="YU">Yugoslavia</option>  
						<option value="ZM">Zambia</option>  
						<option value="ZW">Zimbabue</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group selectFormaPago" style="display:none">
					<label>Por favor selecciona una forma de pago...</label>
					<select class="form-control" name="formaPago" id="formaPago">
						<!-- <option value="">Seleccione...</option>
						<option value="1">Tarjeta de Crédito</option> -->
						<!--<option value="2">Paypal</option>-->
						<!-- <option class="co" style="display:none" value="3">Transferencia Bancaria - PSE</option>
						<option class="co" style="display:none" value="4">Puntos VIA Baloto</option>
						<option class="mx" style="display:none" value="5">OXXO - 7 Eleven</option>
						<option class="pe" style="display:none" value="6">Banco de Crédito - BCP</option> -->
					</select>
				</div>
			</div>
			
			<!-- De aqui para abajo esta el despliegue de cada una de las formas de pago. 
			     Tanto del formulario como del jQuery que hace la peticion y procesa la respuesta. -->

			<!-- INICIO BCP - En todos los casos, la peticion arranca de esta manera. Este proceso toca optimizarlo, porque no es tan cristiano
			     como deberia ser, si te das cuenta la peticion se despliega ahi mismo con valores y todo. Pero esto luego lo vemos. -->
			<div class="pagosBcp" style="display:none">
				<form id="formBcp">
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="emailBcp" id="emailBcp" value="<?php echo getEmailUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="nombreBcp" id="nombreBcp" value="<?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="noDocumentoBcp" id="noDocumentoBcp" value="900476732" />
							<input type="hidden" name="vrPedido" id="vrPedido" value="<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>" />
							<input type="hidden" name="noPedido" id="noPedido" value="<?php echo (isset($_COOKIE['pedido']) ? $_COOKIE['pedido'] : ''); ?>" />
							<button class="btn btn-primary">Generar desprendible de pago</button>
						</div>
					</div>
				</form>
			</div>
			
			<!-- Aqui arranca el jQuery que procesa la peticion inmediatamente anterior. Si te das cuenta en el de
			la conferencia, hasta el mismo jQuery se regresa con la respuesta del ajax. Esto tambien lo vemos luego. Por
			ahora lo que quiere Paul es que el tema funcione. y para lograr eso, nos toca es hacer debug sobre estas zonas
			y validar es la forma en la que se recibe la respuesta para que la orden siempre entregue los productos. -->
			<script type="text/javascript">
				$('#formBcp').validate({
					submitHandler: function(form){
						$('.load').fadeIn();
						// Aqui el post se hace sobre archivos distintos. Yo separe los archivos dependiente del proceso que hacen. 
						// Eso nos toca mejorarlo, y en la implementacion de la conferencia ya funciona sin esos archivos
						$.post('/includes/payu/loadBcp.php',$('#formBcp').serialize())
						.done(function(data){
							var response = JSON.parse(data);
							$.post('/includes/php.php',{
								consulta: "pedidoPendiente",
								pedido: $.cookie('pedido'),
								valor: "<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>",
								formaPago: "6",
								orderId: response.transactionResponse.orderId,
								transactionId: response.transactionResponse.transactionId,
								state: response.transactionResponse.state,
								pendingReason: response.transactionResponse.pendingReason,
								responseCode: response.transactionResponse.responseCode,
								urlPaymentReceiptHtml: response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML,
								reference: response.transactionResponse.extraParameters.REFERENCE
							}).done(function(msg){
								if(msg==0){
									alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
									$('.load').fadeOut();
								}
								if(msg==1){
									// Aqui estan los cierres del pedido, que es cuando recibimos la respuesta de la peticion de payu.
									// Aqui mismo termina el procedimiento. Pero ahora mira:
									$.removeCookie('pedido');
									$('#myModalVacioTitulo').html('¡Gracias por tu pedido!');
									$('#myModalVacioContenido').html('<p class="text-center"><b>Tu pedido ha sido procesado exitosamente.</b></p><p class="text-center"><a href="' + response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML + '" class="btn btn-primary">Haz click aquí para generar tu desprendible de pago</a></p>');
									$('.load').fadeOut();
									$('#myModalVacio').modal('show');
								}
							})
						})
					}
				});
			</script>
			
			<!-- INICIO OXXO 7ELEVEN -->
			<div class="pagosOxxo" style="display:none">
				<form id="formOxxo">
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Punto de pago</label>
							<select class="form-control" name="puntoPagoOxxo" id="puntoPagoOxxo" required >
								<option value="">Seleccione...</option>
								<option value="OXXO">OXXO</option>
								<option value="SEVEN_ELEVEN">7 Eleven</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="emailOxxo" id="emailOxxo" value="<?php echo getEmailUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="nombreOxxo" id="nombreOxxo" value="<?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="noDocumentoOxxo" id="noDocumentoOxxo" value="900307622" />
							<input type="hidden" name="noPedido" id="noPedido" value="<?php echo (isset($_COOKIE['pedido']) ? $_COOKIE['pedido'] : ''); ?>" />
							<input type="hidden" name="vrPedido" id="vrPedido" value="<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>" />
							<button class="btn btn-primary">Generar desprendible de pago</button>
						</div>
					</div>
				</form>
			</div>
			
			<script>
				$('#formOxxo').validate({
					submitHandler: function(form){
						$('.load').fadeIn();
						$.post('/includes/payu/loadOxxo.php',$('#formOxxo').serialize())
						.done(function(data){
							var response = JSON.parse(data);
							$.post('/includes/php.php',{
								consulta: "pedidoPendiente",
								pedido: $.cookie('pedido'),
								valor: "<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>",
								formaPago: "5",
								orderId: response.transactionResponse.orderId,
								transactionId: response.transactionResponse.transactionId,
								state: response.transactionResponse.state,
								pendingReason: response.transactionResponse.pendingReason,
								responseCode: response.transactionResponse.responseCode,
								urlPaymentReceiptHtml: response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML,
								reference: response.transactionResponse.extraParameters.REFERENCE
							}).done(function(msg){
								if(msg==0){
									alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
									$('.load').fadeOut();
								}
								if(msg==1){
									$.removeCookie("pedido");
									$('#myModalVacioTitulo').html('¡Gracias por tu pedido!');
									$('#myModalVacioContenido').html('<p class="text-center"><b>Tu pedido ha sido procesado exitosamente.</b></p><p class="text-center"><a href="' + response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML + '" class="btn btn-primary">Haz click aquí para generar tu desprendible de pago</a></p>');
									$('.load').fadeOut();
									$('#myModalVacio').modal('show');
								}
							})
						})
					}
				});
			</script>
			
			<!-- INICIO BALOTO -->
			<div class="pagosBaloto" style="display:none">
				<form method="post" id="formBaloto">
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="noDocumentoBaloto" id="noDocumentoBaloto" value="900307622" />
							<input type="hidden" name="email" id="email" value="<?php echo getEmailUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="vrPedido" id="vrPedido" value="<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>" />
							<input type="hidden" name="noPedido" id="noPedido" value="<?php echo (isset($_COOKIE['pedido']) ? $_COOKIE['pedido'] : ''); ?>" />
							<button type="submit" class="btn btn-primary">Generar desprendible de pago</button>
						</div>
					</div>
				</form>
			</div>
			
			<script>
				$('#formBaloto').validate({
					submitHandler: function(form){
						$('.load').fadeIn();
						$.post('/includes/payu/loadBaloto.php',$('#formBaloto').serialize())
						.done(function(data){
							var response = JSON.parse(data);
							$.post('/includes/php.php',{
								consulta: "pedidoPendiente",
								pedido: $.cookie('pedido'),
								valor: "<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>",
								formaPago: "4",
								orderId: response.transactionResponse.orderId,
								transactionId: response.transactionResponse.transactionId,
								state: response.transactionResponse.state,
								pendingReason: response.transactionResponse.pendingReason,
								responseCode: response.transactionResponse.responseCode,
								urlPaymentReceiptHtml: response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML,
								reference: response.transactionResponse.extraParameters.REFERENCE
							}).done(function(msg){
								if(msg==0){
									alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
									$('.load').fadeOut();
								}
								if(msg==1){
									$.removeCookie('pedido');
									$('#myModalVacioTitulo').html('¡Gracias por tu pedido!');
									$('#myModalVacioContenido').html('<p class="text-center"><b>Tu pedido ha sido procesado exitosamente.</b></p><p class="text-center"><a href="' + response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML + '" class="btn btn-primary">Haz click aquí para generar tu desprendible de pago</a></p>');
									$('.load').fadeOut();
									$('#myModalVacio').modal('show');
								}
							})
						})	
					}
				});
			</script>
			
			<!-- FIN BALOTO -->
			
			<!-- INICIO PSE -->
			<div class="pagosPSE" style="display: none">
				<form name="formPSE" id="formPSE" action="/includes/payu/requestPSE.php" method="post">
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Seleccionar entidad bancaria<span style="color:red">*</span></label>
							<select class="form-control" name="bancos" id="bancos" required >
								<option>Seleccione...</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Tipo de persona<span style="color:red">*</span></label>
							<select class="form-control" name="tipoPersona" id="tipoPersona" required >
								<option value="">Seleccione...</option>
								<option value="N">Natural</option>
								<option value="J">Jurídica</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Tipo de documento de identificación<span style="color:red">*</span></label>
							<select class="form-control" name="tipoDocumento" id="tipoDocumento" required >
								<option value="">Seleccione...</option>
								<option value="CC">Cédula de ciudadanía</option>
								<option value="CE">Cédula de extranjería</option>
								<option value="NIT">NIT (Empresas)</option>
								<option value="TI">Tarjeta de Identidad</option>
								<option value="PP">Pasaporte</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Número de identificación<span style="color:red">*</span></label>
							<input type="text" class="form-control" name="noIdentificacion" id="noIdentificacion" required />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Nombres y Apellidos<span style="color:red">*</span></label>
							<input type="text" class="form-control" name="nombreCompleto" id="nombreCompleto" required />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Teléfono diurno<span style="color:red">*</span></label>
							<input type="text" class="form-control" name="telefonoDiurno" id="telefonoDiurno" required />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Email<span style="color:red">*</span></label>
							<input type="email" class="form-control" name="emailPSE" id="emailPSE" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="pedido" id="pedido" value="<?php echo (isset($_COOKIE['pedido']) ? $_COOKIE['pedido'] : ''); ?>" />
							<input type="hidden" name="vrPedido" id="vrPedido" value="<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>" />
							<input type="hidden" name="email" id="email" value="<?php echo getEmailUsuario($_SESSION['id']); ?>" />
							<input type="hidden" name="consulta" id="consulta" value="pseRequestTienda" />
							<button id="ButtonPSEPayment" class="btn btn-primary">Pagar</button>
						</div>
					</div>
				</form>
			</div>
			<script type="text/javascript">
				<?php if( isset($_COOKIE['pedido']) ) { ?>
					// primero valida si hay una cookie con el id de pedido para mostrar este código ya que sino existe muestra un error
				$('#formPSE').validate({
					submitHandler: function(form){
						$('.load').fadeIn();
						var response;
						$.post('/includes/php.php',$('#formPSE').serialize()).done(function (data) {
							response = JSON.parse(data);
							
							var data = {
								consulta: "pedidoPendiente",
								pedido: <?php echo $_COOKIE['pedido'] ?>,
								valor: $('#vrPedido').val(),
								formaPago: 3,
								orderId: response.transactionResponse.orderId,
								transactionId: response.transactionResponse.transactionId,
								state: response.transactionResponse.state,
								pendingReason: response.transactionResponse.pendingReason,
								responseCode: response.transactionResponse.responseCode,
								urlPaymentReceiptHtml: response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML,
								reference: response.transactionResponse.extraParameters.REFERENCE,
								json: true
							};
							$.ajax({
								url: '/includes/php.php',
								type: 'POST',
								dataType: 'json',
								data: data,
							})
							.done(function(data) {
								console.log(data);
								if (data.code == 1) {
									console.log("success");
									$.removeCookie('pedido');
									/*form.submit();*/
									window.location = response.transactionResponse.extraParameters.BANK_URL;
								}
							})
							.fail(function(data) {
								console.log(data);
								console.log("error");
							})
							.always(function(data) {
								console.log(data);
								console.log("complete");
							});
						});
						
					}
				});
				/*$('#formPSE').validate({
					submitHandler: function(form){
						//acá  asigno las variables para enviarlas a una función que se llama dpedidoPendiente, esto antes no se hacía así que cuando el usuario quería pagar con este método, en el administrador no se cambiaba el estado del pedido ni se sabía con que método intentaba pagar. Así que eso simplemente deja el estado de la orden en pendiente y con el mensaje iniciando pago con PSE. PEro cuando el cliente paga, la pasarela de pagos devuelve a unos links que mi imagino uno configura, que es lo que no sé como hacer si quieres te hago un ejemplo. Skype
						
						
						//antes estaba este código pero arrojaba unos errores, viendo el proceso puse el que está arriba pero omití esta linea que carga desde el archivo loadBaloto.php
						$('.load').fadeIn();
						$.post('/includes/payu/loadBaloto.php',$('#formPSE').serialize())
						.done(function(data){
							var response = JSON.parse(data);
							$.post('/includes/php.php',{
								consulta: "pedidoPendiente",
								pedido: $.cookie('pedido'),
								valor: "<?php echo getValorDeLaOrden($_COOKIE['pedido']) ?>",
								formaPago: "4",
								orderId: response.transactionResponse.orderId,
								transactionId: response.transactionResponse.transactionId,
								state: response.transactionResponse.state,
								pendingReason: response.transactionResponse.pendingReason,
								responseCode: response.transactionResponse.responseCode,
								urlPaymentReceiptHtml: response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML,
								reference: response.transactionResponse.extraParameters.REFERENCE
							}).done(function(msg){
								if(msg==0){
									alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
									$('.load').fadeOut();
								}
								if(msg==1){
									$('#myModalVacioTitulo').html('¡Gracias por tu pedido!');
									$('#myModalVacioContenido').html('<p class="text-center"><b>Tu pedido ha sido procesado exitosamente.</b></p><p class="text-center"><a href="' + response.transactionResponse.extraParameters.URL_PAYMENT_RECEIPT_HTML + '" class="btn btn-primary">Haz click aquí para generar tu desprendible de pago</a></p>');
									$.removeCookie('pedido');
									$('.load').fadeOut();
									$('#myModalVacio').modal('show');
								}
							})
						})	
					}
				});*/
				<?php } ?>
			</script>
			<!-- FIN PSE -->
			
			<div class="btnPaypal" style="display:none" >
				<div class="row">
					<div class="col-md-12">
						<p>
							<form name="pagoPaypal" id="pagoPaypal" action="../includes/php.php" method="POST">
								<input type="hidden" name="consulta" value="requestPayPalTradicional" />
								<button class="btn btn-primary">
									<i class="fa fa-paypal"></i> Pagar con Paypal
								</button>
							</form>
						</p>
					</div>
				</div>
			</div>
			
			<!-- TARJETAS DE CRÉDITO -->
			<form name="formTarjetaCredito" id="formTarjetaCredito" class="tarjetaCredito" style="display:none">
				<div class="col-md-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Tipo</label>
							<select class="form-control" name="tipoTarjeta" id="tipoTarjeta" required >
								<option value="">Seleccione...</option>
								<option value="VISA">VISA</option>
								<option value="MASTERCARD">MASTERCARD</option>
								<option value="AMEX">AMEX</option>
								<option value="DINERS">DINERS</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Número de tarjeta</label>
							<input type="text" class="form-control text-center" name="noTarjeta" id="noTarjeta" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<label>Nombre que figura en la tarjeta</label>
							<input type="text" class="form-control text-center" name="nombreTarjeta" id="nombreTarjeta" required />
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Mes vencimiento</label>
							<select class="form-control" name="mesTarjeta" id="mesTarjeta" required >
								<option value="">Seleccione...</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Año vencimiento</label>
							<select class="form-control" name="yearTarjeta" id="yearTarjeta" required>
								<option value="">Seleccione...</option>
								<option value='2015'>15</option>
								<option value='2016'>16</option>
								<option value='2017'>17</option>
								<option value='2018'>18</option>
								<option value='2019'>19</option>
								<option value='2020'>20</option>
								<option value='2021'>21</option>
								<option value='2022'>22</option>
								<option value='2023'>23</option>
								<option value='2024'>24</option>
								<option value='2025'>25</option>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Código de seguridad</label>
							<input type="text" class="form-control" name="codigoSeguridad" id="codigoSeguridad" placeholder="CVV" required />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<input type="hidden" class="form-control" name="cuotas" id="cuotas" value="1" />
							<input type="hidden" name="pedido" id="pedido" value="<?php echo (isset($_COOKIE['pedido']) ? $_COOKIE['pedido'] : '') ; ?>" />
							<input type="hidden" name="vrPedido" id="vrPedido" value="<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : '') ; ?>" />
							<input type="hidden" name="nombreCompleto" id="nombreCompleto" value="<?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']); ?>" />
							<input type="hidden" name="email" id="email" value="<?php echo getEmailUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="ciudad" id="ciudad" value="<?php echo getCiudadUsuario($_SESSION['id']) ?>" />
							<input type="hidden" name="pais" id="pais" value="<?php echo getPaisUsuario($_SESSION['id']) ?>" />
							<button type="submit" class="btn btn-primary">Pagar</button>
						</div>
					</div>
				</div>
			</form>
			
			<!-- La de tarjetas de credito, es la que muestra el flujo mas completo, arriba el formulario, a continuacion el jQuery. -->

			<script type="text/javascript">
				$('#formTarjetaCredito').validate({
					rules: {
						noTarjeta: {
							required: true,
							creditcard: true
						}	
					},
					submitHandler: function(form){
						$('.load').fadeIn();
						$.post('/includes/payu/loadTarjetasDeCredito.php',$('#formTarjetaCredito').serialize())
						.done(function(data){
							var response = JSON.parse(data);
							if(response.transactionResponse.state=='APPROVED'){
								$.post('/includes/php.php',{
									// Este post entrega el pedido
									consulta: "cierra-pedido",
									pedido: $.cookie('pedido'),
									usuario: "<?php echo $_SESSION['id']; ?>",
									valor: "<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>",
									status: "2",
									formaPago: "1",
									orderId: response.transactionResponse.orderId,
									transactionId: response.transactionResponse.transactionId,
									state: response.transactionResponse.state,
									responseCode: response.transactionResponse.responseCode
								}).done(function(msg){
									if(msg==1){
										// Y si el pedido se entrega, se elimina la cookie 
										$.removeCookie('pedido');
										alert('Tu pago ha sido aprobado. Ahora podrás encontrar los productos adquiridos en tu biblioteca.');
										window.location.href="/index.php?content=mi-cuenta&task=mis-publicaciones";
									} else {
										alert('Tu forma de pago ha sido aprobada pero se presentó un problema agregando los productos a tu biblioteca. Por favor ponte en contacto con nosotros ahora mismo haciendo click en el enlace "Contacto" del menú principal.');
										alert(msg);
										$('.load').fadeOut();
									}
								})
							}
							// Aqui ya recibimos la respuesta de Payu, entonces el sistema recibe la respuesta y ejecuta las acciones correspondientes
							if(response.transactionResponse.state=='DECLINED'){
								alert('Tu medio de pago ha sido rechazado. Por favor intenta con un medio de pago diferente o comúnicate con tu entidad bancaria para resolver la situación');
								$('.form-control').val('');
								$('.load').fadeOut();
							}
							if(response.transactionResponse.state=='PENDING'){
								$.post('/includes/php.php',{
									consulta: "pedidoPendiente",
									pedido: $.cookie('pedido'),
									valor: "<?php echo (isset($_COOKIE['pedido']) ? getValorDeLaOrden($_COOKIE['pedido']) : ''); ?>",
									status: "1",
									formaPago: "1",
									orderId: response.transactionResponse.orderId,
									transactionId: response.transactionResponse.transactionId,
									state: response.transactionResponse.state,
									pendingReason: response.transactionResponse.pendingReason,
									responseCode: response.transactionResponse.responseCode
								}).done(function(msg){
									if(msg==1){
										alert('Tu transacción está pendiente de confirmación de parte del banco. Una vez sea recibida la respuesta, te notificaremos para que puedas descargar tus publicaciones. Lamentamos los inconvenientes que ello pueda ocasionarte.');	
									} else {
										alert('Tu transacción está pendiente de confirmación de parte del banco. Sin embargo, hubo un problema interno que no permitió que tu orden fuese actualizada. Por favor infórmanos acerca de esta situación escribiendo a través de nuestro formulario de contacto.');
										$('.load').fadeOut();
										$('#myModalContacto').modal('show');
									}
									$.removeCookie('pedido');
									window.location.href="/index.php?content=obras";
								})
							}
						})
					}
				});
			</script>
			
			<!-- FIN TARJETAS DE CRÉDITO -->
		</div>
	</div>
</div>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['id'] ?>" />
// JavaScript Document
var divpintar = ""; //Donde pintara el ajax
var SiguienteAccion = 0; //Siguiente accion despues del ajax
var intervalo; //Para contador
var segundos = 0; //Para contador




function anularFactura()
{
	
	num_fac = 	document.getElementById('fact_num').value	
	
	SiguienteAccion = 0
	
	divpintar = "mensaje_anular_fac";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_anularFactura(num_fac, callpintar);
	
}


function mostrarFacturacion()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_mostrarFacturacion(callpintar);
}

function facturar()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_facturar(callpintar);
}




function agregarInscritosConferencia(usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, fecha_creado, hora_creado, id_fila)
{	


	SiguienteAccion = 0
	
	divpintar = "encontrado_payu"+id_fila;
	
	document.getElementById("encontrado_payu_texto"+id_fila).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_agregarInscritosConferencia(usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, fecha_creado, hora_creado, callpintar);
	
		
}



function conciliarPaypalConElArtes()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_conciliarPaypalConElArtes(callpintar);
}



function ConciliarPaypalRespectoPrestashop()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarPaypalRespectoPrestashop(callpintar);
}


function conciliarPrestashopRespectoPaypal()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_conciliarPrestashopRespectoPaypal(callpintar);
}


function ConciliarPayuRespectoPrestashop()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarPayuRespectoPrestashop(callpintar);
}


function conciliarPrestashopRespectoPayu()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_conciliarPrestashopRespectoPayu(callpintar);
}



function ConciliarElArteRespectoPayuPEDIDOS(orden)
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarElArteRespectoPayuPEDIDOS(orden, callpintar);
}



function ConciliarPayuRespectoElArtePEDIDOS(orden)
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarPayuRespectoElArtePEDIDOS(orden, callpintar);
}

function ConciliarPayuRespectoElArte(orden) //INSCRITOS A LA CONFERENCIA
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarPayuRespectoElArte(orden, callpintar);
}

function ConciliarElArteRespectoPayu(orden) //INSCRITOS A LA CONFERENCIA
{
	SiguienteAccion = 0
		
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_ConciliarElArteRespectoPayu(orden, callpintar);	
}

function MostrarPopup(titulo)
{
	lugar = "ContenidoPopupDiv"
	
	document.getElementById("TituloPopupDiv").innerHTML = titulo
	document.getElementById("LayerDiv").style.visibility = "visible"
	document.getElementById("PopupDiv").style.visibility = "visible"
	
	document.getElementById(lugar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
}

function OcultarPopup()
{	
	lugar = "ContenidoPopupDiv"
	
	document.getElementById(lugar).innerHTML = ""
	document.getElementById("PopupDiv").style.visibility = "hidden"
	document.getElementById("LayerDiv").style.visibility = "hidden"
}

function ContarTiempo()
{
	//intervalo = setInterval("ContarTiempo()", 1000); //Poner linea donde empiece el conteo
	var contar_hasta = 2; //segundos
	if(segundos < contar_hasta)
		segundos++
	else
	{
		clearInterval(intervalo) //Finaliza el conteo
		segundos = 0;
	}
	
}

function callpintar(data)
{
	var divactivo=document.getElementById(divpintar);
	
	if (divactivo!=null)
	{
		divactivo.innerHTML=data;
	}
}
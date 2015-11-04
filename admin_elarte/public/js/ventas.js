// JavaScript Document
var divpintar = ""; //Donde pintara el ajax
var SiguienteAccion = 0; //Siguiente accion despues del ajax
var intervalo; //Para contador
var segundos = 0; //Para contador


function mostrarReporteVentas()
{
		
	SiguienteAccion = 0
	
	MostrarPopup("Reporte ventas");
	
	divpintar = "ContenidoPopupDiv";
	
	x_mostrarReporteVentas(callpintar);
}


function mostrarMasInfoDePedido(pedidoID, usuario)
{
	
	SiguienteAccion = 0
	MostrarPopup("Informacion del pedido: "+pedidoID);
	
	divpintar = "ContenidoPopupDiv";
	
	//document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_mostrarMasInfoDePedido(pedidoID, usuario, callpintar);
	
	//
}


function agregarInscritosConferencia(usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, fecha_creado, hora_creado, id_pedido, id_fila)
{	

	alert(id_fila)

	SiguienteAccion = 0
	
	divpintar = "metodo_pago_mensaje"+id_fila;
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_agregarInscritosConferencia(usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, fecha_creado, hora_creado, id_pedido, callpintar);
	
		
}



function mostrarPedidos()
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	
	document.getElementById(divpintar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	x_mostrarPedidos(callpintar);
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
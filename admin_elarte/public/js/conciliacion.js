// JavaScript Document
var divpintar = ""; //Donde pintara el ajax
var SiguienteAccion = 0; //Siguiente accion despues del ajax
var intervalo; //Para contador
var segundos = 0; //Para contador


function ConciliarPayuRespectoElArte(orden)
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
	x_ConciliarPayuRespectoElArte(orden, callpintar);
}

function ConciliarElArteRespectoPayu(orden)
{
	SiguienteAccion = 0
	
	divpintar = "PruebaDiv";
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
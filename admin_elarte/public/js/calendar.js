// JavaScript Document
var divpintar = ""; //Donde pintara el ajax
var SiguienteAccion = 0; //Siguiente accion despues del ajax
var intervalo; //Para contador
var segundos = 0; //Para contador
var ActualEvent_ID_Cal = 0;
var Actual_id_action_Cal = 0;
var FilaEventosColorAnt;
var eventID;
var tabRegisterActual;

function inicializar(ID_de_evento)
{
	eventID = ID_de_evento;
	
}

function activarCalendar()
{
	var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
      	cal.manageFields('dateImg', 'date', '%Y-%m-%d');
}

function deleteCalendarEvent(calendarID)
{
	if(confirm("Are you sure you want to remove the event calendar event?"))
	{
		SiguienteAccion = 0
		divpintar = "ListadoRegistrosDiv";
		x_deleteCalendarEvent(eventID, calendarID, callpintar);
	}
}

function mostrarListaSuplliers(control)
{
	SiguienteAccion = 0
	divpintar = "divListaSuppliers";
			
	if(control.value == 3)
			x_comboBoxAudiovisuales(eventID, '', callpintar);
	
	if(control.value == 2 || control.value == 1)
		document.getElementById(divpintar).innerHTML = "";	
}

function mostrarListaRegistros(orden)
{
	SiguienteAccion = 0
	divpintar = "ListadoRegistrosDiv";

	var filtro = document.getElementById("registerFind").value
	var filtro2 = document.getElementById("userStateDrop").value
	x_mostrarListaRegistros(eventID, filtro, orden, filtro2, callpintar);	
}

function mostrarNewEditRegistroForm(accion)
{
	SiguienteAccion = 1
	divpintar = "ContenidoPopupDiv";
	x_mostrarNewEditRegistroForm(accion, eventID, callpintar);
}

function mostrarEditarRegistroForm(registerID, tab)
{
	SiguienteAccion = 1
	divpintar = "ContenidoPopupDiv";
	tabRegisterActual = tab
	var accion = 0;
	x_mostrarEditarRegistroForm(eventID, registerID, accion, callpintar);

}

function mostrarAudivisualCompany(audiovisualID)
{
	SiguienteAccion = 0
	divpintar = "ContenidoPopupDiv";
	x_mostrarAudivisualCompany(audiovisualID, eventID, callpintar);
}


function addEditCalendarInfo(registerID)
{
	
	var eventName = document.getElementById("eventName").value
	var date = document.getElementById("date").value
	var startHoras = document.getElementById("startHoras").value
	var startMinutos = document.getElementById("startMinutos").value
	var endHoras = document.getElementById("endHoras").value
	var endMinutos = document.getElementById("endMinutos").value
	var place = document.getElementById("place").value
	var attendees = document.getElementById("attendees").value
	var audiovisualStatusID = document.getElementById("audiovisualStatusID").value
	var Notes = document.getElementById("observations").value
	

	
	var observations = document.getElementById("observations").value
	
	if(audiovisualStatusID > 1)
		var audivisualID = document.getElementById("audivisualID").value
	
	
	

	var valida = 1;

	if(eventName=="")
	{
		document.getElementById("nameMessage").innerHTML = "* Required Field!"
		valida = 0;	
	}
	else
		document.getElementById("nameMessage").innerHTML = "*"

	
	if(date=="")
	{
		document.getElementById("dateMessage").innerHTML = "* Required Field!"
		valida = 0;	
	}
	else
		document.getElementById("dateMessage").innerHTML = "*"


	if(valida==1)
	{
		time1 = startHoras + ":" + startMinutos;
		time2 = endHoras + ":" + endMinutos;

		if(registerID == 0)
		{	
			divpintar = "ListadoRegistrosDiv"			
			x_addCalendarInfo(eventID,eventName,date,time1,time2,place,attendees,audiovisualStatusID,audivisualID,Notes,callpintar_addRegister)
		}else
		{
			
			divpintar = "ListadoRegistrosDiv";
			x_editCalendarInfo(eventID,registerID,eventName,date,time1,time2,place,attendees,audiovisualStatusID,audivisualID,Notes,callpintar_editRegister)
		}
	
	}else
		document.getElementById("scrolling_div").scrollTop = 0;
}



function callpintar_addRegister(data)
{
	
	document.getElementById(divpintar).innerHTML = data;
	document.getElementById("ContenidoPopupDiv").innerHTML = "<div align='center'><br><br>User successfully added!<br><span class='texto_secundario'>This window will close automatically in 1 second</span><br><br><br></div>";
	document.getElementById("botonCerrar").innerHTML="<span onclick='OcultarPopup(1)' class='link2'><img border='0' src='images/cerrar2.png' width='20' height='20' alt='Cerrar' /></span>";
	intervalo = setInterval("ContarTiempo(1,1)", 1000);
}

function callpintar_editRegister(data)
{
	document.getElementById(divpintar).innerHTML = data;
	document.getElementById("mensajes_tab").innerHTML = "Calendar information edited correctly!";

	//intervalo = setInterval("ContarTiempo(1,1)", 1000);
}


function MostrarPopup(titulo, accion, registerID)
{
	lugar = "ContenidoPopupDiv"
	
	document.getElementById("TituloPopupDiv").innerHTML = titulo
	document.getElementById("LayerDiv").style.visibility = "visible"
	document.getElementById("PopupDiv").style.visibility = "visible"
	
	document.getElementById(lugar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	switch(accion)
	{
		case "1":
			
			mostrarNewEditRegistroForm(0)
			break;
		case "2":
			mostrarNewEditRegistroForm(registerID)
			break;
		case "3":
			mostrarAudivisualCompany(registerID)

			
	}
	
}

function OcultarPopup(actualiza)
{	
	lugar = "ContenidoPopupDiv"
	
	if(tinyMCE.get("elm1"))  //Si existe el editor html elm1 debe destruirse. 
		tinyMCE.execCommand('mceRemoveControl', false, "elm1");
	
	document.getElementById(lugar).innerHTML = ""
	document.getElementById("PopupDiv").style.visibility = "hidden"
	document.getElementById("LayerDiv").style.visibility = "hidden"

	if(actualiza==1)
	{
		document.getElementById("botonCerrar").innerHTML="<span class='link2' onclick='OcultarPopup(0)'><img border='0' src='images/cerrar2.png' width='20' height='20' alt='Cerrar' /></span>";
		mostrarListaRegistros(0)
	}
}

function ContarTiempo(contar_hasta, accion)
{
	//Poner linea donde empiece el conteo
	if(segundos < contar_hasta)
		segundos++
	else
	{		
		clearInterval(intervalo) //Finaliza el conteo
		segundos = 0;
		
		switch(accion)
		{
			case 1:
				OcultarPopup(1)
				break
		}
	}
	
}

function callpintar(data)
{
	
	var divactivo=document.getElementById(divpintar);
	
	
	if (divactivo!=null)
	{		
		divactivo.innerHTML=data;
		if(SiguienteAccion==1)
		{
			SiguienteAccion = 0;
			activarCalendar();
			
		}
		
	}
}





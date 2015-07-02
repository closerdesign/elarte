// JavaScript Document
var divpintar = ""; //Donde pintara el ajax
var SiguienteAccion = 0; //Siguiente accion despues del ajax
var intervalo; //Para contador
var segundos = 0; //Para contador
var eventID;


function construye(ID_de_evento)
{
	eventID = ID_de_evento;
	ActivarCalendarsAddEvent();	
}



function EditEvent(Event_ID)
{
	
	document.getElementById("EditEventButton").disabled = true
	
	SiguienteAccion = "1"
	divpintar = "mensajeEstado";
	
	

	EventName = document.getElementById("EventNameText").value
	Country = document.getElementById("country").value
	Location = document.getElementById("LocationText").value
	Date_From = document.getElementById("Date_FromText").value
	Date_To = document.getElementById("Date_ToText").value
	Client_ID = document.getElementById("Client_IDDrop").value
	usr_manager = document.getElementById("usr_managerDrop").value
	PersonasContrato = document.getElementById("PersonasContratoText").value
	EventWeb = document.getElementById("EventWebText").value
	Descripcion = document.getElementById("DescripcionText").value
	
	if(EventName==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanEventName").innerHTML = "<label class='alertas'>Required Field!</label>";
		document.getElementById("EventNameText").focus()
	}else{
		document.getElementById("spanEventName").innerHTML = "<label class='alertas'>*</label>";
	}
	if (Country==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanCountry").innerHTML = "<label class='alertas'> Required Field!</label>";
		document.getElementById("country").focus()
	}else{
		document.getElementById("spanCountry").innerHTML = "<label class='alertas'>*</label>";
	}
	if (Location==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanLocation").innerHTML = "<label class='alertas'> Required Field!</label>";
		document.getElementById("LocationText").focus()
	}else{
		document.getElementById("spanLocation").innerHTML = "<label class='alertas'>*</label>";
	}
	if (Date_From==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanDate_From").innerHTML = "<label class='alertas'> Required Field!</label>";
		document.getElementById("Date_FromText").focus()
	}else{
		document.getElementById("spanDate_From").innerHTML = "<label class='alertas'>*</label>";
	}
	 if (Date_To==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanDate_To").innerHTML = "<label class='alertas'> Required Field!</label>";
		document.getElementById("Date_ToText").focus()
	}else{
		document.getElementById("spanDate_To").innerHTML = "<label class='alertas'>*</label>";
	}
	if (Client_ID==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanCompanyName").innerHTML = "<label class='alertas'>Required Field!</label>";
		document.getElementById("Client_IDDrop").focus()
	}else{
		document.getElementById("spanCompanyName").innerHTML = "<label class='alertas'>*</label>";
	}
	if (usr_manager==""){
		document.getElementById("EditEventButton").disabled = false
		document.getElementById("spanUserName").innerHTML = "<label class='alertas'> Required Field!</label>";
		document.getElementById("usr_managerDrop").focus()
	}else{
		document.getElementById("spanUserName").innerHTML = "<label class='alertas'>*</label>";
	}
	
	if(document.getElementById("EditEventButton").disabled == true){
	
	document.getElementById("mensajeEstado").className = 'mensajeEstadoMenuVertical'
	document.getElementById(divpintar).innerHTML = "<div align='center'><img src='images/carga2.gif'  alt='Loading' style='vertical-align:middle;' /> Updating...</div></div>"
		
	x_EditEvent(Event_ID, EventName, Country, Location, Date_From, Date_To, Client_ID, usr_manager, PersonasContrato, EventWeb, Descripcion, callpintar);
	}
}

function cambiarItemMenuVertical(itemSel)
{
	
	for(var i=1; i<= 3; i++)
	{
		if(i==itemSel)
			document.getElementById("itemMenuVer"+i).className = "itemMenuSel";
		else
			document.getElementById("itemMenuVer"+i).className = "itemMenu";
	}	
		
	
}

function MostrarAddEvent()
{	

	cambiarItemMenuVertical(1)
	
	SiguienteAccion = "10"
	divpintar = "contenidoMenuVertical";
	
	x_MostrarAddEvent(eventID, callpintar);	
	
}

function MostrarAssignUsers()
{
	
	cambiarItemMenuVertical(2)
	
	
	SiguienteAccion = "0"
	divpintar = "contenidoMenuVertical";
	
	x_MostrarAssignUsers(eventID, callpintar);	
}

function MostrarParameters()
{
	cambiarItemMenuVertical(3)
		
	SiguienteAccion = "0"
	divpintar = "contenidoMenuVertical";
	
	x_MostrarParameters(eventID, callpintar);	
		
		
}



function MostrarInfoUsers(user, client)
{
	SiguienteAccion = 0
	divpintar = "ContenidoPopupUsersDiv";
	x_MostrarInfoUsers(user, client, callpintar);	
}

function AssignUsers()
{
	document.getElementById("InfoDerButton").disabled = true
	
	var DatosIzquierda = ""
	
	for(var i=0; i<document.getElementsByName("UserCheck").length; i++)
	{
		if(document.getElementsByName("UserCheck").item(i).checked)
			DatosIzquierda += document.getElementsByName("UserCheck").item(i).value+"~@~";
	}
	
	if(DatosIzquierda == "")
	{
		alert("You have not selected any user");
		document.getElementById("InfoDerButton").disabled = false;
	}
	else
	{
		
		document.getElementById("CargaAssignUserDiv").innerHTML = "Loading...";
		SiguienteAccion = "3"
		divpintar = "CargaAssignUserDiv";
		x_AssignUsers(DatosIzquierda, eventID, callpintar);	
	}
}

function DeallocateUsers()
{
	document.getElementById("InfoIzqButton").disabled = true
	
	var DatosDerecha = ""
	
	for(var i=0; i<document.getElementsByName("AssignedUserCheck").length; i++)
	{
		if(document.getElementsByName("AssignedUserCheck").item(i).checked)
			DatosDerecha += document.getElementsByName("AssignedUserCheck").item(i).value+"~@~";
	}
	
	if(DatosDerecha == "")
	{
		alert("You have not selected any user");
		document.getElementById("InfoIzqButton").disabled = false
	}
	else
	{
		document.getElementById("CargaAssignUserDiv").innerHTML = "Loading...";
		SiguienteAccion = "3"
		divpintar = "CargaAssignUserDiv";
		x_DeallocateUsers(DatosDerecha, eventID, callpintar);	
	}
}

function MostrarAddUsers(client, user)
{
	SiguienteAccion = 0
	divpintar = "ContenidoPopupUsersDiv";
	x_MostrarAddUsers(client, user, callpintar);
}


function MostrarAttendeeType()
{
	
	SiguienteAccion = "5"
	divpintar = "attendeeTypeDiv";
	x_MostrarAttendeeType(eventID, callpintar);		
}

function AddAttendeeType()
{
	var AttendeeType = document.getElementById("AttendeeTypeText").value
	
	if(AttendeeType == "")
		document.getElementById("CargaAttendeeTypeDiv").innerHTML = "<label class='alertas'>Required Field!</a>";
	else
	{
		
		document.getElementById("CargaAttendeeTypeDiv").innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading...";
		SiguienteAccion = "4"
		//divpintar = "CargaAttendeeTypeDiv";
		x_AddAttendeeType(AttendeeType, eventID, callpintar);
	}
}

function MostrarEditAttendeeType(user_type_ID)
{
	var AttendeeType = document.getElementById("UserTypeHidden"+user_type_ID).value
	document.getElementById("UserTypeDiv"+user_type_ID).innerHTML = "<input type='hidden' id='UserTypeHidden"+user_type_ID+"' value='"+AttendeeType+"' /><input id='AttendeeTypeText"+user_type_ID+"' type='text' value='"+AttendeeType+"' /> <button name='EditAttendeeTypeButton"+user_type_ID+"'  onclick=EditAttendeeType("+user_type_ID+") >Edit</button> <image style='cursor:pointer;' id='EditButton' src='images/ico_return.png' onclick=CancelEditAttendeeType("+user_type_ID+") />"
}

function EditAttendeeType(user_type_ID)
{
	var AttendeeType = document.getElementById("AttendeeTypeText"+user_type_ID).value
	
	if(AttendeeType == "")
		alert("Required Field!");
	else
	{
		document.getElementById("UserTypeDiv"+user_type_ID).innerHTML = "Loading...";
		SiguienteAccion = "0"
		divpintar = "UserTypeDiv"+user_type_ID;
		x_EditAttendeeType(AttendeeType, user_type_ID, callpintar);
	}
}

function DelAttendeeType(user_type_ID)
{
	if(confirm("Are you sure you want to delete the Attendee Type?"))
	{
		document.getElementById("UserTypeDiv"+user_type_ID).innerHTML = "Loading...";
		SiguienteAccion = "4"
		//divpintar = "UserTypeDiv"+user_type_ID;
		x_DelAttendeeType(user_type_ID, callpintar);	
	}
	
}

function CancelEditAttendeeType(user_type_ID)
{
	var AttendeeType = document.getElementById("UserTypeHidden"+user_type_ID).value
	document.getElementById("UserTypeDiv"+user_type_ID).innerHTML = "<input type='hidden' id='UserTypeHidden"+user_type_ID+"' value='"+AttendeeType+"' />"+AttendeeType;
}

function MostrarSpeciality()
{
	SiguienteAccion = "7"
	divpintar = "specialityDiv";

	x_MostrarSpeciality(eventID, callpintar);
}

function AddSpeciality()
{
	var Speciality = document.getElementById("SpecialityText").value
	
	if(Speciality == "")
		document.getElementById("CargaSpecialityDiv").innerHTML = "<label class='alertas'>Required Field!</a>";
	else
	{
		document.getElementById("CargaSpecialityDiv").innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading...";
		SiguienteAccion = "6"
		//divpintar = "CargaAttendeeTypeDiv";
		x_AddSpeciality(Speciality, eventID, callpintar);
	}
}

function MostrarEditSpeciality(speciality_ID)
{
	var Speciality = document.getElementById("specialityHidden"+speciality_ID).value
	document.getElementById("specialityDiv"+speciality_ID).innerHTML = "<input type='hidden' id='specialityHidden"+speciality_ID+"' value='"+Speciality+"' /><input id='specialityText"+speciality_ID+"' type='text' value='"+Speciality+"' /> <button name='EditSpecialityButton"+speciality_ID+"' onclick=EditSpeciality("+speciality_ID+") >Edit</button> <image style='cursor:pointer;' id='EditButton' src='images/ico_return.png' onclick=CancelEditSpeciality("+speciality_ID+") />"
}

function EditSpeciality(speciality_ID)
{
	var Speciality = document.getElementById("specialityText"+speciality_ID).value
	
	if(Speciality == "")
		alert("Required Field!");
	else
	{
		document.getElementById("specialityDiv"+speciality_ID).innerHTML = "Loading...";
		SiguienteAccion = "0"
		divpintar = "specialityDiv"+speciality_ID;
		x_EditSpeciality(Speciality, speciality_ID, callpintar);
	}
}

function CancelEditSpeciality(speciality_ID)
{
	var Speciality = document.getElementById("specialityHidden"+speciality_ID).value
	document.getElementById("specialityDiv"+speciality_ID).innerHTML = "<input type='hidden' id='specialityHidden"+speciality_ID+"' value='"+Speciality+"' />"+Speciality;
}

function DelSpeciality(speciality_ID)
{
	if(confirm("Are you sure you want to delete the Attendee Type?"))
	{
		document.getElementById("specialityDiv"+speciality_ID).innerHTML = "Loading...";
		SiguienteAccion = "6"
		//divpintar = "UserTypeDiv"+speciality_ID;
		x_DelSpeciality(speciality_ID, callpintar);	
	}
	
}

function MostrarGroup()
{
	SiguienteAccion = "9"
	divpintar = "groupDiv";

	x_MostrarGroup(eventID, callpintar);
}


function AddGroup()
{
	var Group = document.getElementById("GroupText").value
	if(Group == "")
		document.getElementById("CargaGroupDiv").innerHTML = "<label class='alertas'>Required Field!</a>";
	else
	{
		document.getElementById("CargaGroupDiv").innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading...";
		SiguienteAccion = "8"
		//divpintar = "CargaGroupDiv";
		x_AddGroup(Group, eventID, callpintar);
	}
}

function MostrarEditGroup(Group_ID)
{
	var Group = document.getElementById("GroupHidden"+Group_ID).value
	document.getElementById("GroupDiv"+Group_ID).innerHTML = "<input type='hidden' id='GroupHidden"+Group_ID+"' value='"+Group+"' /><input id='GroupText"+Group_ID+"' type='text' value='"+Group+"' /> <button name='EditGroupButton"+Group_ID+"' onclick=EditGroup("+Group_ID+") >Edit</button> <image style='cursor:pointer;' id='EditButton' src='images/ico_return.png' onclick=CancelEditGroup("+Group_ID+") />"
}

function EditGroup(Group_ID)
{
	var Group = document.getElementById("GroupText"+Group_ID).value
	
	if(Group == "")
		alert("Required Field!");
	else
	{
		document.getElementById("GroupDiv"+Group_ID).innerHTML = "Loading...";
		SiguienteAccion = "0"
		divpintar = "GroupDiv"+Group_ID;
		x_EditGroup(Group, Group_ID, callpintar);
	}
}

function CancelEditGroup(Group_ID)
{
	var Group = document.getElementById("GroupHidden"+Group_ID).value
	document.getElementById("GroupDiv"+Group_ID).innerHTML = "<input type='hidden' id='GroupHidden"+Group_ID+"' value='"+Group+"' />"+Group;
}

function DelGroup(Group_ID)
{
	if(confirm("Are you sure you want to delete the Attendee Type?"))
	{
		document.getElementById("GroupDiv"+Group_ID).innerHTML = "Loading...";
		SiguienteAccion = "6"
		//divpintar = "UserTypeDiv"+Group_ID;
		x_DelGroup(Group_ID, callpintar);	
	}
	
}



function ActivarClient_IDDrop(UserTypeDrop)
{
	if(UserTypeDrop.value == "0")
		document.getElementById("client_IDDrop").disabled = true;
	if(UserTypeDrop.value == "1")
		document.getElementById("client_IDDrop").disabled = false;
}

function AddUsers()
{
	document.getElementById("AceptarAddUsers").disabled = true
	var FirstName = document.getElementById("FirstNameText")
	var LastName = document.getElementById("LastNameText")
	var UserType = document.getElementById("UserTypeDrop")
	var client_ID = document.getElementById("client_IDDrop")
	var permisos = document.getElementById("permisosDrop")
	var username = document.getElementById("usernameText")
	var password = document.getElementById("passwordText")
	
	if(UserType.value == "0")
		var clientID = 14;
	else
		var clientID = client_ID.value
		
	divpintar = "mensajeEstado";
	
	document.getElementById("mensajeEstado").className = 'mensajeEstadoMenuVertical'
	document.getElementById(divpintar).innerHTML = "<div align='center'><img src='images/carga2.gif'  alt='Loading' style='vertical-align:middle;' /> Updating...</div></div>"
		
	SiguienteAccion = "2"
	
	x_AddUsers(FirstName.value, LastName.value, clientID, permisos.value, username.value, password.value, callpintar);
	
}

function EditUsers()
{
	document.getElementById("AceptarEditUsers").disabled = true
	var FirstName = document.getElementById("FirstNameText")
	var LastName = document.getElementById("LastNameText")
	var UserType = document.getElementById("UserTypeDrop")
	var client_ID = document.getElementById("client_IDDrop")
	var permisos = document.getElementById("permisosDrop")
	var username = document.getElementById("usernameText")
	var password = document.getElementById("passwordText")
	
	if(UserType.value == "0")
		var clientID = 14;
	else
		var clientID = client_ID.value
		
	divpintar = "mensajeEstado";
	
	document.getElementById("mensajeEstado").className = 'mensajeEstadoMenuVertical'
	document.getElementById(divpintar).innerHTML = "<div align='center'><img src='images/carga2.gif'  alt='Loading' style='vertical-align:middle;' /> Updating...</div></div>"
	
	SiguienteAccion = "2"
	
	x_EditUsers(FirstName.value, LastName.value, clientID, permisos.value, username.value, password.value, callpintar);	
}


function ActivarCalendarsAddEvent()
{
	var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
      cal.manageFields('Date_FromButton', 'Date_FromText', '%Y-%m-%d');
      cal.manageFields('Date_ToButton', 'Date_ToText', '%Y-%m-%d');
	  
}

function MostrarPopupUsers(accion, user, client)
{
	//alert(1);
	lugar = "ContenidoPopupUsersDiv"

	//document.getElementById("TituloPopupUsersDiv").innerHTML = titulo
	document.getElementById("PopupUsersDiv").style.visibility = "visible"
	
	document.getElementById(lugar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	switch(accion)
	{
		case "1":
			MostrarInfoUsers(user, client)
			break;
		case "2":
			MostrarAddUsers(client, user)
			break;
	}
}

function OcultarPopupUsers()
{	
	lugar = "ContenidoPopupUsersDiv"
	
	document.getElementById(lugar).innerHTML = ""
	document.getElementById("PopupUsersDiv").style.visibility = "hidden"
}

function MostrarPopup(titulo, accion, restaurantID)
{
	lugar = "ContenidoPopupDiv"
	
	document.getElementById("TituloPopupDiv").innerHTML = titulo
	document.getElementById("LayerDiv").style.visibility = "visible"
	document.getElementById("PopupDiv").style.visibility = "visible"
	
	document.getElementById(lugar).innerHTML = "<img src='images/carga.gif' width='16' height='16' alt='Loading' /> Loading..."
	
	switch(accion)
	{
		case "1":
			mostrarNewEditRestaurant(restaurantID)
			break;
		case "2":
			mostrarNewEditRestaurant(restaurantID)
			break;
			
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
		mostrarLista()
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
				//$(".mensajeEstado").hide("slow");
				document.getElementById("mensajeEstado").className = "invisible"
				break
		}
	}
	
}

function callpintar(data)
{
	var divactivo=document.getElementById(divpintar);
	
	
	if (divactivo!=null)
	{		
		
		switch (SiguienteAccion)
		{
			
			case "1":
				divactivo.innerHTML=data;
				document.getElementById("EditEventButton").disabled = false
				intervalo = setInterval("ContarTiempo(1,1)", 2000);
				break;
				
			case "2":
				divactivo.innerHTML=data;
				intervalo = setInterval("ContarTiempo(1,1)", 2000);
				MostrarAssignUsers()
				break;
				
			case "3":
				document.getElementById("InfoDerButton").disabled = false
				document.getElementById("InfoIzqButton").disabled = false
				MostrarAssignUsers()
				break;
				
			case "4":
				MostrarAttendeeType()
				break
			case "5":
				divactivo.innerHTML=data;
				document.getElementById("CargaAttendeeTypeDiv").innerHTML = "";
				
			case "6":
				
				MostrarSpeciality()
				break
			case "7":
				divactivo.innerHTML=data;
				document.getElementById("CargaSpecialityDiv").innerHTML = "";
				
			case "8":
				MostrarGroup()
				break
			case "9":
				
				divactivo.innerHTML=data;
				document.getElementById("CargaGroupDiv").innerHTML = "";
				
			case "10":
				divactivo.innerHTML=data;
				ActivarCalendarsAddEvent();
				
			default:
				divactivo.innerHTML=data;
				break;
				
			
		}
		
		
			
			
		
		
	}
}





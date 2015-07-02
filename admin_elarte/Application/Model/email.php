<?php

	require_once "FuncionesSQL.php";
	$q = new ConecteMysql();
	//$q2 = new ConecteMysql();

	$query = "SELECT * FROM `r_registration` where Event_ID = 121 AND aairline <> '' AND afnumber <> '' AND dadate <> '' order by fname";
	//
	$q->ejecutar($query, "");

	while($q->Cargar())
	{
		
	
		echo $Email = $q->dato('email');
		$fname = $q->dato('fname');
		$lname = $q->dato('lname');
		$aadate = $q->dato('aadate');
		$aatime = $q->dato('aatime');
		$dddate = $q->dato('dddate');

		echo "<br>";
		echo "<br>";
		echo $Asunto = "CML GOLS 2011 CONFIRMATION";
		echo "<br>";
		echo "<br>";
			echo $Mensaje = "
			Dear Dr $fname $lname<br><br>
	Thank you for registering to the 6th CML GOLS, CML Therapy: Translating Clinical Advances Into Practice.  The 6th CML GOLS will take place in Santiago de Chile, Chile from September 30th to October 1, 2011. <br><br>
	A Hotel reservation has been made at the W Hotel Santiago.  Your hotel reservation has been made for the following dates: <br><br>
	Arrival Date: $aadate<br>
	Departure Date: $dddate<br><br>
	For more information regarding the event, including logistical information and agenda please visit our website www.cmlgols2011.com<br>";
			$Cabeceras = "From: benito@bbmmarketing.com\r\nContent-type: text/html\r\nBcc: pfhurtado82@gmail.com\r\n";
	echo "<br>-----------------------------------------------<br>";
			mail($Email,$Asunto,$Mensaje,$Cabeceras); 

	}





?>

<?php
/**
* 
*/
class InscritosController
{
	public function indexAction()
	{
		if ( isset( $_SESSION['loggedId'] ) && ($_SESSION['loggedId'] == 1 || $_SESSION['loggedId'] == 2 || $_SESSION['loggedId'] == 3) && isset($_SESSION['verify']) ) {
			$vars = array(
						'mainUrl' => CURRENT_URL.'inscritos',
						'mensaje' => 'En esta sección puede importar los nuevos usuarios inscritos, la importación se hará de 500 usario por cada vez.',
						'titulo'  => 'Importar nuevos usuarios inscritos'
		            );
			return new View('inscritosIndex', $vars);
		}
	}

	public function getInscritosAction()
	{
		if ( isset( $_SESSION['loggedId'] ) && ($_SESSION['loggedId'] == 1 || $_SESSION['loggedId'] == 2 || $_SESSION['loggedId'] == 3) && isset($_SESSION['verify']) ) {
			$db = MysqliDb::getInstance();
			$count = $db->getValue ("usuarios", "MAX(id)");
			$URL = "http://www.elartedesabervivir.com/api/inscritos/getInscritos?id_user=".$_SESSION['loggedId']."&id=".$count;
			/*$data = file_get_contents($URL);*/

			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$URL);
			// Execute
			$data=curl_exec($ch);
			// Closing
			curl_close($ch);

			$data = json_decode($data, true);
			/*ppp($data);*/
			foreach ($data as $key => $item) {
				$values = Array (
								"id"             => $item['id'],
								"nombreCompleto" => $item['nombreCompleto'],
								"nombre"         => $item['nombre'],
								"apellido"       => $item['apellido'],
								"email"          => $item['email'],
								"fbId"           => $item['fbId'],
								"password"       => $item['password'],
								"ip"             => NULL,
								"browser"        => NULL
							);
				$id = $db->insert ('usuarios', $values);
			}

			$vars = array(
						'mainUrl'    => CURRENT_URL.'inscritos',
						'mensaje'    => 'En esta sección puede importar los nuevos usuarios inscritos, la importación se hará de 500 usario por cada vez.',
						'titulo'     => 'Importar nuevos usuarios inscritos',
						'importados' => $data
		            );
			return new View('inscritosIndex', $vars);
		}
	}
}
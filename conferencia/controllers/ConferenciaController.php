<?php

class ConferenciaController
{
	public function indexAction()
	{
		if ( isset( $_SESSION['loggedId'] ) && isset($_SESSION['verify']) ) {
			$user = new User($_SESSION['loggedId']);
			if ( User::ValidateLogin($user) ) {
				return new View('conferencia', array('titulo' => 'Clase 2', 'user' => $user));
			}else{
				$vars = array(
				                'mainUrl' => CURRENT_URL,
				                'mensaje' => 'Ha sido desconectado de la conferencia debido a que se ha detectado otra conexión con este usuario.'
				            );
				return new View('home', $vars);	
			}
		}else{
            $vars = array(
                            'mainUrl' => CURRENT_URL,
                            'mensaje' => 'No tiene permisos para acceder a esta sección, por favor intente ingresar con su cuenta.'
                        );
            return new View('home', $vars);
        }
	}
}
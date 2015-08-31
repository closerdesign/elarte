<?php

class HomeController {
    public function indexAction()
    {
        extract($_POST);
    	if ( isset($user) && isset($pass) ) {
    		if ( !empty( $user ) && !empty( $pass ) ) {
    			$user = new User($user, $pass);
    			if ( empty( $user ) ) {
    				return new View('home', ['titulo' => 'Sección de Ingreso', 'error' => 'Datos incorrectos.']);
    			}else{
                    if ( User::ValidateLogin($user) ) {
                        header('location: '.URL_API.'obras');
        				return;
                    }else{
                        return new View('home', ['titulo' => 'Sección de Ingreso', 'error' => 'Los datos que ha ingresado son incorrectos.']);
                    }
    			}
    		}else{
    			return new View('home', ['titulo' => 'Sección de Ingreso', 'error' => 'Debe ingresar los datos de acceso.']);
    		}
    	}
        return new View('home', ['titulo' => 'Sección de Ingreso']);
    }

    public function logOutAction()
    {
        User::logOut();
        header('location: '.URL_API);
    }
}

<?php

class HomeController {

	public function indexAction()
	{
		/*$fb = new Facebook\Facebook(array(
			'app_id' => FB_APP_ID,
			'app_secret' => FB_APP_SECRET,
			'default_graph_version' => 'v2.2',
			));

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(URL_US.'home/loginFB', $permissions);*/
		

		if ( isset( $_GET['err'] ) && $_GET['err'] == 'con-user' ) {
			$vars = array(
							/*'loginUrl' => $loginUrl,*/
							'mainUrl' => CURRENT_URL,
							'mensaje' => 'Ha sido desconectado de la conferencia debido a que se ha detectado otra conexión con este usuario.',
							'error'   => 1
						);
			return new View('home', $vars);
		}
		/*$vars = array(
						'loginUrl' => $loginUrl,
					);*/
		return new View('home');
	}

	public function loginFBAction()
	{
		$_SESSION['FBID'] = $this->facebookFallBack();

		if ( $user = User::getUserFromFb($_SESSION['FBID']) ){
			if ( $user->updateConnection() && User::ValidateLogin($user) ){
				header('location: '.URL_US.'conferencia');
			}else{
				$vars = array(
								'mainUrl' => CURRENT_URL,
								'mensaje' => 'Ha ocurrido un problema con su usuario, por favor comuniquese con el administrador'
							);
				return new View('home', $vars);    
			}
		}else{
			$vars = array(
							'mainUrl' => CURRENT_URL,
							'mensaje' => 'El usuario con el que ha tratado de ingresar no está registrado en la conferencia'
						);
			return new View('home', $vars);
		}
	}

	public function loginAction()
	{
		if ( $user = User::verifyUser( trim( $_POST['email'] ), trim( $_POST['contrasena'] ) ) ) {
			if ( $user->updateConnection() && User::ValidateLogin($user) ) {
				header('location: '.URL_US.'conferencia');
			}else{
				$vars = array(
								'mainUrl' => CURRENT_URL,
								'mensaje' => 'Ha ocurrido un problema con su usuario, por favor comuniquese con el administrador'
							);
				return new View('home', $vars);    
			}
		}else{
			$vars = array(
							'mainUrl' => CURRENT_URL,
							'mensaje' => 'El usuario con el que ha tratado de ingresar no está registrado en la conferencia'
						);
			return new View('home', $vars);
		}
	}

	public function validateConnectionAction()
	{
		/*extract($_POST);

		if ( isset($action) && isset($time) ) {
			if ( isset( $_SESSION['loggedId'] ) && isset($_SESSION['verify']) ) {
				$user = new User($_SESSION['loggedId']);
				if ( User::ValidateLogin($user) ) {
					$vars = array(
									'error'   => 0
								);
					return json_encode($vars);
				}else{
					$vars = array(
									'mainUrl' => CURRENT_URL,
									'mensaje' => 'Ha sido desconectado de la conferencia debido a que se ha detectado otra conexión con este usuario.',
									'error'   => 1
								);
					return json_encode($vars);
				}
			}else{
				$vars = array(
								'mainUrl' => CURRENT_URL,
								'mensaje' => 'No tiene permisos para acceder a esta sección, por favor intente ingresar con su cuenta.',
								'error'   => 1
							);
				return json_encode($vars);
			}   
		}*/
		return false;
	}
	public function logoutAction()
	{
		if ( isset( $_SESSION['loggedId'] ) && isset($_SESSION['verify'])  ) {
			$_SESSION['loggedId'] = NULL;
			$_SESSION['verify'] = NULL;
			$user = new User($_SESSION['loggedId']);
			if ( $user->updateConnection() && User::ValidateLogin($user) ) {
				$vars = array(
								'mainUrl' => CURRENT_URL,
								'mensaje' => 'Ha salido de la conferencia.'
							);
				session_destroy();
				return new View('home', $vars);    
			}

		}
	}

	public function accesoAction()
	{
		$vars = array(
						'mainUrl' => CURRENT_URL.'home/acceso',
					);
		return new View('recoverPassword', $vars);
	}

	public function getPasswordAction()
	{
		extract($_POST);
		if ( !empty( $email ) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			if ( $user = User::getUserFromEmail($email) ) {
				if ( sendEmail('Recuperación de contraseña', $user->password, $user->email, $user->nombre, $user->email, 'info@phronesisvirtual.com', 'conferenciaPre') ){
					$vars = array(
									'mainUrl' => CURRENT_URL.'home/acceso',
									'mensaje' => 'Se ha enviado su contraseña al correo ingresado.',
								);
					return new View('recoverPassword', $vars);	
				}else{
					$vars = array(
									'mainUrl' => CURRENT_URL.'home/acceso',
									'mensaje' => 'Ha ocurrido un error con el envío de su contraseña, por favor comuniquese con info@phronesisvirtual.',
								);
					return new View('recoverPassword', $vars);	
				}
			}else{
				$vars = array(
								'mainUrl' => CURRENT_URL.'home/acceso',
								'mensaje' => 'Este correo no está inscrito.',
							);
				return new View('recoverPassword', $vars);	
			}
		}else{
			$vars = array(
							'mainUrl' => CURRENT_URL.'home/acceso',
							'mensaje' => 'Debe ingresar un correo válido.',
						);
			return new View('recoverPassword', $vars);
		}
	}
}
<?php
/**
* 
*/
class User
{
	public $id;
	public $nombreCompleto;
	public $nombre;
	public $apellido;
	public $email;
	public $fbId;
	public $password;
	public $ip;
	public $browser;

	/**
	
		TODO:
		- Términar constructor con sobre carga
	
	**/
	
	public function __construct()
	{
		$args = func_get_args();
		switch ( func_num_args() ) {
			case 1:
					$type = gettype($args[0]);
					if ( $type === 'array' ) {
						foreach ($args[0] as $key => $item) {
							$this->$key = $item;
						}
					}else if( $type === 'integer' ){
						$db = MysqliDb::getInstance();
						$db->where('id', $args[0]);
						$user = $db->get('usuarios');

						if ( !empty($user) ) {
							foreach ($user[0] as $key => $item) {
								$this->$key = $item;
							}
						}else{
							return false;
						}
					}
				break;
			
			case 9:
					$this->id             = $args[0];
					$this->nombreCompleto = $args[1];
					$this->nombre         = $args[2];
					$this->apellido       = $args[3];
					$this->email          = $args[4];
					$this->fbId           = $args[5];
					$this->password       = $args[6];
					$this->ip             = $args[7];
					$this->browser        = $args[8];
				break;

			default:
				break;
		}
	}

	static function getUserFromEmail($email)
	{
		if ( !empty( $email ) ) {
			$db = MysqliDb::getInstance();
			$db->where('email', $email);
			$user = $db->get('usuarios');

			if ( !empty($user) ) {
				$userObj = new User($user[0]);
				return $userObj;
			}
			return false;
		}
		return false;
	}

	static function getUserFromFb($fbId)
	{
		if ( !empty( $fbId ) ) {
			$db = MysqliDb::getInstance();
			$db->where('fbId', $fbId);
			$user = $db->get('usuarios');

			if ( !empty($user) ) {
				$userObj = new User($user[0]);
				return $userObj;
			}
			return false;
		}
		return false;
	}

	static function verifyUser($email, $pass)
	{
		if ( !empty($email) && !empty($pass) ) {
			$db = MysqliDb::getInstance();
			$db->where('email', $email);
			$db->where('password', $pass);
			$user = $db->get('usuarios');

			if ( !empty($user) ) {
				$userObj = new User($user[0]);
				return $userObj;
			}
		}else{
			return false;
		}
	}

	static function ValidateLogin($user)
	{
		if ( isset($_SESSION['loggedId']) && isset($_SESSION['verify']) ) {
			if ( $_SESSION['loggedId'] == $user->id && $_SESSION['verify'] == md5($user->browser.$user->ip) ) {
				return true;
			}
			session_destroy();
			return false;
		}else{
			$_SESSION['loggedId'] = $user->id;
			$_SESSION['verify'] = md5($user->browser.$user->ip);
			return true;
		}
	}

	public function updateConnection()
	{
		$this->ip      = get_client_ip_env();
		$this->browser = $_SERVER['HTTP_USER_AGENT'];
		return $this->save();
	}

	public function save()
	{
		$db = MysqliDb::getInstance();
		$data = Array (
			'ip' => $this->ip,
			'browser' => $this->browser
		);
		$db->where ('id', $this->id);
		if ($db->update ('usuarios', $data))
		    /*echo $db->count . ' records were updated';*/
			return true;
		else
		    /*echo 'update failed: ' . $db->getLastError();*/
			return false;
	}
}
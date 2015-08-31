<?php
/**
* 
*/
class User
{
	private $login;
	private $pswd;
	private $name;
	private $email;
	
	public function __construct()
	{
		$args = func_get_args();
		switch ( func_num_args() ) {
			case 1:
				$this->__construct1($args[0]);			
				break;
			case 2:
				$this->__construct1($args[0], $args[1]);
				break;
		}
	}

	public function __construct1($login)
	{
		$db = MysqliDb::getInstance();
		$db->where ("login", $login);
		$user = $db->getOne ("sec_users");

		$this->login = $user['login'];
		$this->pswd  = $user['pswd'];
		$this->name  = $user['name'];
		$this->email = $user['email'];
	}

	public function __construct2($login, $pass)
	{
		$db = MysqliDb::getInstance();
		$db->where ("login", $login);
		$db->where ("pswd", $pass);
		$user = $db->getOne ("sec_users");

		$this->login = $user['login'];
		$this->pswd  = $user['pswd'];
		$this->name  = $user['name'];
		$this->email = $user['email'];
	}

	static function ValidateLogin($user)
	{
		if ( isset($_SESSION['loggedId']) && isset( $_SESSION['encrypt'] ) ) {
			if ( $_SESSION['loggedId'] == md5($user->login.$user->pswd) && isset( $_SESSION['encrypt'] ) ) {
				return true;
			}
			session_destroy();
			return false;
		}else{
			$_SESSION['loggedId'] = md5($user->login.$user->pswd);
			$_SESSION['encrypt'] = $user->login;
			return true;
		}
	}
}
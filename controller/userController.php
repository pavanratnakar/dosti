<?php
session_name('pavanDosti');
session_set_cookie_params(2*7*24*60*60);
session_start();
class UserController
{
	private $utils;
	private $path;
	private $user;
	public function __construct($ref=null)
	{
		if(file_exists('../class/config.php'))
		{
			$this->path='../';
		}
		else
		{
			$this->path='';
		}
		include_once($this->path.'class/config.php');
		include_once($this->path.'class/utils.php');
		include_once($this->path.'class/user.php');
		$this->utils=new Utils();
		$this->user=new User();
		if($ref)
		{
			$ref=$this->utils->checkValues($ref);
			$this->$ref();
		}
	}
	public function userLogin()
	{
		$login_user=$this->utils->checkValues($_REQUEST['login_user']);
		$login_password=$this->utils->checkValues($_REQUEST['login_password']);
		$login_rememberMe=$this->utils->checkValues($_REQUEST['login_rememberMe']);
		if($this->user->loginUser($login_user,$login_password,$login_rememberMe))
		{
			$status=TRUE;
			$message='Logged in successfully';
		}
		else
		{
			$status=FALSE;
			$message='The password you entered is incorrect. Please try again (make sure your caps lock is off).';
		}
		$returnArray= array(
			"status" => $status,
			"message" => $message
		);
		$response = $_POST["jsoncallback"] . "(" .json_encode($returnArray). ")";
		echo $response;
		unset($response);
	}
	public function checkUserStatus()
	{
		return $this->user->checkUserStatus();
	}
	public function userLogout()
	{
		if($this->user->userLogout())
		{
			$status=TRUE;
			$message='Logged out user successfully';
		}
		else
		{
			$status=FALSE;
			$message='Could not logout user';
		}
		$returnArray= array(
			"status" => $status,
			"message" => $message
		);
		$response = $_GET["jsoncallback"] . "(" .json_encode($returnArray). ")";
		echo $response;
		unset($response);
	}
}
if(isset($_REQUEST['ref']))
{
	$userController=new UserController($_REQUEST['ref']);
}
?>
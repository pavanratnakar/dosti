<?php
class User
{
	private $userId;
	private $userEmail;
	private $userIp;
	private $mysqli;
	private $utils;
	public function __construct()
	{
		$this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
		$this->utils=new Utils();
		$this->userId=$this->checkUserStatus();
	}
	public function loginUser($email,$password,$rememberMe)
	{	
		$email=$this->mysqli->real_escape_string($email);
		$password=$this->mysqli->real_escape_string(md5($password));
		if ($result = $this->mysqli->query("SELECT uid FROM ".Config::$user_table." WHERE email='$email' and password='$password'")) 
		{
			if($result->num_rows==1)
			{
				while ($row = $result->fetch_object()) 
				{
					$this->userId=$row->uid;
					$_SESSION['uid'] = $this->userId;
					if($rememberMe)
					{
						$_SESSION['rememberMe'] =$rememberMe;
						setcookie('pavanRemember',$rememberMe);
					}
					$userip = $this->utils->ip_address_to_number($_SERVER['REMOTE_ADDR']);
					if ($result = $this->mysqli->query("INSERT INTO ".Config::$user_stats_table."(uid,login_time,userip) VALUES ('".$this->userId."',now(),'$userip')"))
					{
						return TRUE;
					}
					else
					{
						return FALSE;
					}
				}
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
	public function checkUserStatus()
	{
		if(isset($_SESSION['uid']))
		{
			return $_SESSION['uid'];
		}
		else
		{
			return FALSE;
		}
	}
	public function userLogout()
	{
		if ($result = $this->mysqli->query("UPDATE ".Config::$user_stats_table." SET logoff_time = NOW() WHERE uid='".$this->userId."' AND logoff_time='0000-00-00 00:00:00'")) 
		{
			$_SESSION = array();
			session_destroy();
			return TRUE;
		}
		return FALSE;
	}
	public function __destruct()
	{
		$this->mysqli->close();
	}
}
?>
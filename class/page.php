<?php
class Page
{
	private $pageId;
	private $userController;
	private $path;
	private $pages=array(
		'1'=>array
		(
			'id'=>1,
			'navigation'=>'Home',
			'link'=>'index.php',
			'breadCrumb'=>1,
			'subNav'=>1
		),
		'1'=>array
		(
			'id'=>1,
			'navigation'=>'Home',
			'link'=>'index.php',
			'breadCrumb'=>1
		),
		'2'=>array
		(
			'id'=>2,
			'navigation'=>'Features',
			'link'=>'features.php',
			'breadCrumb'=>0
		),
		'3'=>array
		(
			'id'=>3,
			'navigation'=>'Services',
			'link'=>'services.php',
			'breadCrumb'=>0
		),	
		'4'=>array
		(
			'id'=>4,
			'navigation'=>'Contact Us',
			'link'=>'contact_us.php',
			'breadCrumb'=>0
		),

	);
	public function __construct($pageId)
	{
		if(file_exists('../class/config.php'))
		{
			$this->path='../';
		}
		else
		{
			$this->path='';
		}
		$this->pageId=$pageId;
	}
	public function setPageId($pageId)
	{
		$this->pageId=$pageId;
	}
	public function getPageId()
	{
		return $this->pageId;
	}
	public function navigation()
	{
		include_once($this->path.'controller/userController.php');
		$this->userController=new UserController();
		$return='<div id="header">
			<div class="container">
				<div id="logo">
					<a href="index.php" class="left">Dosti</a>
				</div>
				<div class="clear"></div>
				<div>
					<ul id="nav" class="left">';
						for($i=1;$i<=sizeof($this->pages);$i++)
						{
							if($i==$this->pageId)
							{
								$class="class='active'";
							}
							else
							{
								$class="";
							}
							$return.='<li '.$class.'><a href="'.$this->pages[$i]['link'].'" title="'.$this->pages[$i]['navigation'].'">'.$this->pages[$i]['navigation'].'</a></li>';
						}
					$return.='</ul>
					<ul class="user-links right">';
					if($this->userController->checkUserStatus())
					{
						$return.='<li class="sep">
                            <a href="#">
                                <span class="notification">3</span>
                                <span class="icon"><img src="img/msg.png"></span>
                                <span class="title">Messages</span>
                            </a>
                        </li>';
						$return.='<li><a id="logout" href="javascript:void(0);">Log Out</a></li>';
						$return.='<li>
                            <a href="login.php">
                                <span class="icon"><img src="img/settings.png"></span>
                                <span class="title">Settings</span>
                            </a>
                        </li>';
					}
					else
					{
						$return.='<li class="active"><a href="index.php">Login</a></li>';
						$return.='<li><a href="index.php">Register</a></li>';
					}
					$return.='</ul>
				</div>
			</div><!-- end .container -->
		</div><!-- end #header -->
		<div class="clear"></div>';
		$return.=$this->breadCrumb();
		return $return;
	}
	public function indexPage()
	{
		if($this->userController->checkUserStatus())
		{
		
		}
		else
		{
		?>
		<h1 class="slogan">Get stuff from outside India through FRIENDS!.</h1>
		<hr class="dotted">
		<div class="three-fourth">
			<h4>How does it work?</h4>
			<ul id="processFlow" class="arrow dotted">
				<li>
					<p>People Within India</p>
					<div class="process">
						<span class="first">&nbsp;</span>
						<span>Register</span>
						<span class="active">Authenticate</span>
						<span>Login</span>
						<span>View Travellers</span>
						<span class="last">Contact Traveller</span>
						<div class="clear"></div>
					</div>
				</li>
				<li>
					<p>People From Outside India</p>
					<div class="process">
						<span class="first">&nbsp;</span>
						<span>Register</span>
						<span class="active">Authenticate</span>
						<span>Login</span>
						<span>Add Travel Event</span>
						<span class="last">Contact Traveller</span>
						<div class="clear"></div>
					</div>
				</li>
			</ul>
		</div>
		<div class="one-fourth last">
			<h4>Login</h4>
			<form class="form" id="login-form" method="post" action="">	
				<p id="response" class="hide"></p>
				<p class="input-block">
					<label for="login_user">Email*</label>
					<input type="text" id="login_user" name="login_user" value="">
				</p>
				<p class="textarea-block">
					<label for="login_password">Password*</label>
					<input type="password" value="" id="login_password" name="login_password">
				<div class="clear"></div>
				<input type="submit" id="login-submit" value="Login" name="submit">
			</form>
		</div>
		<hr class="dotted">
		<div class="one-third">
			<h4>Whats for you?</h4>
			<p>Cras aliquet. Integer faucibus, eros ac molestie placerat, enim tellus varius lacus, nec dictum nunc tortor id urna. Suspendisse dapibus ullamcorper pede. Vivamus ligula ipsum, faucibus at, tincidunt eget, porttitor non, dolor. Ut dui lectus, ultrices ut, sodales tincidunt, viverra sed, nisl. </p>
		</div>
		<div class="one-third">
			<h4>Whats for people who are travelling to India?</h4>
			<p>Cras aliquet. Integer faucibus, eros ac molestie placerat, enim tellus varius lacus, nec dictum nunc tortor id urna. Suspendisse dapibus ullamcorper pede. Vivamus ligula ipsum, faucibus at, tincidunt eget, porttitor non, dolor. Ut dui lectus, ultrices ut, sodales tincidunt, viverra sed, nisl. </p>
		</div>
		<div class="one-third last">
			<h4>Points to Consider</h4>
			<p>Cras aliquet. Integer faucibus, eros ac molestie placerat, enim tellus varius lacus, nec dictum nunc tortor id urna. Suspendisse dapibus ullamcorper pede. Vivamus ligula ipsum, faucibus at, tincidunt eget, porttitor non, dolor. Ut dui lectus, ultrices ut, sodales tincidunt, viverra sed, nisl. </p>
		</div>
		<?php
		}
	}
	public function breadCrumb()
	{
		$return.='<div id="breadcrumbs">
			<div class="container">';
			if($this->pages[$this->pageId]['breadCrumb'])
			{
				$return.='
				<ul class="breadcrumbs">
					<li class="home"><a href="index.html">Home</a></li>
					<li>-></li>
					<li>Login</li>
				</ul>';
			}
			$return.='</div><!-- end .container -->
		</div>';
		return $return;
	}
}
class Index extends Page
{
	private $content;
	public function __construct()
	{

	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <title>Dosti | Features</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="css/reset.css" rel="stylesheet" type="text/css" /> 
	<link href="css/main.css" rel="stylesheet" type="text/css" /> 
</head>
	<body>
		<?php
		include_once('class/page.php');
		$page=new Page('2');
		echo $page->navigation();
		?>
		<div id="content">
			<div class="container">
				<div class="page-header clearfix">
					<h1 class="page-title left">Features</h1>
				</div>
				<div class="three-fourth">
					<h4>Tabs</h4>
					<ul class="tabs">
						<li class="active"><h6><a href="#tab1">First Tab</a></h6></li>
						<li class=""><h6><a href="#tab2">Second</a></h6></li>
						<li class=""><h6><a href="#tab2">Third</a></h6></li>
					</ul>
					<div class="tab-container">
						<div class="tab-content" id="tab1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condim entum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						<div class="tab-content" id="tab2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condim entum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						<div class="tab-content" id="tab3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condim entum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, leo nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
					</div>
				</div>
				<div class="one-fourth last">
					<h4>Accordion Content</h4>
					<h6 class="acc-trigger active">
						<a href="#">Title Goes Here</a>
					</h6>
					<div class="acc-container">
						<div class="block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
					<h6 class="acc-trigger">
						<a href="#">Title Goes Here</a>
					</h6>
					<div class="acc-container">
						<div class="block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
					<h6 class="acc-trigger">
						<a href="#">Title Goes Here</a>
					</h6>
					<div class="acc-container">
						<div class="block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('include/footer.php') ?>
	</body>
</html>
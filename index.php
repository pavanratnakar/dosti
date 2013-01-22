<?php include_once('controller/userController.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <title>Dosti</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" /> 
</head>
	<body>
		<?php
		include_once('class/page.php');
		$page=new Page('1');
		echo $page->navigation();
		?>
		<div id="content">
			<div class="container">
				<?php echo $page->indexPage(); ?>
			</div>
		</div>
		<?php include_once('include/footer.php') ?>
		<script type="text/javascript">
		$(document).ready(function()
		{	
			pavan_dosti.process.init();
			pavan_dosti.login.init();
		});
		</script>
	</body>
</html>
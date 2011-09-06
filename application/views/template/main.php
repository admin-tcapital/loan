<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Template</title>
<link type="text/css" href="<?php echo base_url(); ?>css/style.css"
	rel="stylesheet" />
</head>
<body>
	<div id="content">
		<div id="contentHeader">
			<div style="width: 820px; margin-left: 200px;">
				<div id="nslogo"></div>
				<div id="appTitle">Lending System</div>
				<?php isset($_SESSION['lid']) ? $this->load->view('template/top-menu') : FALSE; //load top menus on user login ?>
			</div>
		</div>
		<div id="navMenu">
			<?php $this->load->view('template/location'); //load location ?>
			<div>
				<?php isset($_SESSION['lid']) ? $this->load->view('template/menu') : FALSE; //load menus on user login ?>
			</div>
		</div>
		<?php $this->load->view($content); //load page content ?>
		<div class="clearFix"></div>
		<div id="contentFooter">Copyright 2011. Northstar Solutions, Inc. All
			Rights Reserved.
		</div>
	</div>
</body>
</html>

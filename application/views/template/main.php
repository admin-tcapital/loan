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
				<?php isset($_SESSION['lend_user']) ? $this->load->view('template/top-menu') : FALSE; //load top menus on user login ?>
			</div>
		</div>
		<div id="navMenu">
			<?php $this->load->view('template/location', array('location' => $location)); //load location ?>
			<div>
				<?php $this->load->view('template/menu', array('menu' => $menu)); //load menus on user login ?>
			</div>
		</div>
		<?php isset($data) ? $this->load->view($content, $data) : $this->load->view($content); //load page content ?>
		<div class="clearFix"></div>
		<div id="contentFooter">Copyright 2011. Northstar Solutions, Inc. All
			Rights Reserved.
		</div>
	</div>
</body>
</html>

<?php 
	//initialization
	$location = isset($location) ? $location : NULL;
	$menu = isset($menu) ? $menu : array();
	$content = isset($content) ? $content : NULL;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Template</title>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />

<!-- General CSS -->
<link type="text/css" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery-1.6.4-min.js"></script>

<!-- jQuery-UI -->
<link type="text/css" href="<?php echo base_url(); ?>css/jquery-ui/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery-ui-1.8.16.custom.min.js"></script>

<!-- Color Box -->
<script type="text/javascript" src="<?php echo base_url() ?>jquery/plugins/colorbox/jquery.colorbox-min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>jquery/plugins/colorbox/colorbox.css" rel="stylesheet" />

<!-- Table Sorter -->
<link type="text/css" href="<?php echo base_url(); ?>css/tablesorter/style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url() ?>jquery/plugins/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$( '.tablesorter' ).tablesorter(); //make table sortable
		$( '.datepicker' ).datepicker(); //make datepicker
		$( '.button' ).button(); //make datepicker
		$( '.button_edit' ).button({ icons: {primary:'ui-icon-pencil'} });
		$( '.button_add' ).button({ icons: {primary:'ui-icon-plus'} });
		$( '.button_back' ).button({ icons: {primary:'ui-icon-triangle-1-w'} });
		$( '.button_cart' ).button({ icons: {primary:'ui-icon-cart'} });
	});
</script>
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

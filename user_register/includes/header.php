<?php
	include('config/init.php');
	include($siteConfig['config_dir'] . 'database.php');
	//include('user_access.php');
?>
<html>
	<head>	
		<title>User Profile</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteConfig['css_dir']; ?>bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $siteConfig['css_dir']; ?>style.css">
		<script type="text/javascript" src="<?php echo $siteConfig['js_dir']; ?>bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo $siteConfig['js_dir']; ?>user.js"></script>
	</head>
	
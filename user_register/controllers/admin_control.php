<?php
	include('../config/init.php');
	include('../' . $siteConfig['include_dir'] . 'session.php');
	include('../' . $siteConfig['config_dir'] . 'database.php');
	include('../' . $siteConfig['config_dir'] . 'user_access.php');
	if(isset($_SESSION['admin']))
	{
		$id= $_GET['id'];
		if($id > 1)
		{
			$result = execute_query("DELETE FROM user_data where id = ?",array($id));
			header('location:' . $siteConfig['site_url'] . 'manage_user.php');
		}
		else
		{
			header('location:' . $siteConfig['site_url'] . 'index.php');
		}
	}
	else
	{
		header('location:' . $siteConfig['site_url'] . 'index.php');
	}
?>
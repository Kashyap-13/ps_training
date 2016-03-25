<?php
	include('../config/init.php');
	include('../' . $siteConfig['include_dir'] . 'session.php');
	include('../' . $siteConfig['config_dir'] . 'database.php');
	
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$_SESSION['errors'] = array();
	if (empty($user_name))
	{
		$_SESSION['errors']['user_name'] = "Please enter user name";	
	}
	if (empty($password))
	{
		$_SESSION['errors']['password'] = "Please enter password";	
	}
	if (count($_SESSION['errors']) == 0)
	{	
		$password1 = md5(sha1(md5($_POST['password'] . $salt)));
		$result = get_row("select id, user_role , first_name from user_data where (user_name = ? or email_id = ?) and password = ?",array($user_name, $user_name, $password1)); 
		//$flag = 1;
		//print_r($result);
		if($result != null)
		{
			if($result['user_role'] == 1)
			{
				$_SESSION['admin'] = $result['id'];
				$_SESSION['fname'] = $result['first_name'];
				header('location:'. $siteConfig['site_url'] . 'manage_user.php');
			}
			else if($result['user_role'] == 2)
			{
				$_SESSION['user'] = $result['id'];
				$_SESSION['fname'] = $result['first_name'];
				//header('location: ../myprofile.php');
				header('location:' . $siteConfig['site_url'] . 'myprofile.php');
			}
		}
		else
		{
			$_SESSION['errors']['login_fail'] = "Invalid username or password";
			header('location:' . $siteConfig['site_url'] . 'index.php');
		}
	}
	else
	{
		header('location:' . $siteConfig['site_url'] . 'index.php');
	}
?>	
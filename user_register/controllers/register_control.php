<?php
	include('../config/init.php');
	include('../' . $siteConfig['include_dir'] . 'session.php');
	include('../' . $siteConfig['config_dir'] . 'database.php');
	include('../' . $siteConfig['include_dir'] . 'function.php');
	
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$_SESSION['errors'] = array();
	if (! validate_string($first_name))
	{
		$_SESSION['errors']['first_name'] = "Please enter valid first name";	
	}
	if (! validate_string($last_name))
	{
		$_SESSION['errors']['last_name'] = "Please enter valid last name";	
	}
	if (!validate_email($email_id))
	{
		$_SESSION['errors']['email_id'] = "Please enter valid email id";	
	}
	if (! validate_alphanumeric($user_name))
	{
		$_SESSION['errors']['user_name'] = "Please enter valid user name";	
	}
	if (strlen($password) < '6' || empty($password))
	{
		$_SESSION['errors']['password'] = "Password must be of 6 digit";	
	}
	if (empty($confirm_password))
	{
		$_SESSION['errors']['confirm_password'] = "Please enter password again";	
	}
	if (empty($address_line1))
	{
		$_SESSION['errors']['address_line1'] = "Please enter address line1";	
	}
	if (empty($address_line2))
	{
		$_SESSION['errors']['address_line2'] = "Please enter address line2";	
	}
	if (! validate_string($city))
	{
		$_SESSION['errors']['city'] = "Please enter valid city";	
	}
	if (! validate_zipcode($zipcode))
	{
		$_SESSION['errors']['zipcode'] = "Please enter valid zipcode";	
	}
	if (! validate_string($state))
	{
		$_SESSION['errors']['state'] = "Please enter valid state";	
	}
	if (empty($country))
	{
		$_SESSION['errors']['country'] = "Please select country";	
	}
	if ($password != $confirm_password)
	{
		$_SESSION['errors']['match'] = "These passwords don't match. Try again?";	
	}
	$result = get_row("select user_name, email_id from user_data where user_name = ? or email_id = ?",array($user_name, $email_id));
	if($result != null) 
	{
		if($result['user_name'] == $user_name && $result['email_id'] == $email_id)
		{
			$_SESSION['errors']['dublicate_user'] = "User already exists";
		}
		else if($result['user_name'] == $user_name)
		{
			$_SESSION['errors']['dublicate_user'] = "User name already exists";
		}
		else
		{
			$_SESSION['errors']['dublicate_user'] = "Email id already exists";
		}
  }
	if (count($_SESSION['errors']) == 0)
	{
		$password = md5(sha1(md5($_POST['password'] . $salt)));
		//$role = '2';
		$result1 = execute_query("insert into user_data(user_role, first_name, last_name, email_id, user_name, password, address_line1, address_line2, city, zipcode, state, country) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(2, $first_name, $last_name, $email_id, $user_name, $password, $address_line1, $address_line2, $city, $zipcode, $state, $country));
		$result = get_row("select id from user_data where email_id = ?", array($email_id));
		
    $_SESSION['user'] = $result['id'];
    $_SESSION['fname'] = $first_name;
		//$_SESSION['user'] = $user_name;
		//$_SESSION['user_email'] = $email_id;
		header('location:' . $siteConfig['site_url'] . 'myprofile.php');
	}
	else
	{
		$_SESSION['data'] = $_POST;	
		header('location:' . $siteConfig['site_url'] . 'register.php');
	}
?>	

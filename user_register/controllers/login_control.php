<?php
	include('../includes/session.php');
	include('../config/database.php');
	
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
		$salt = "abs$rg$@^$29f146546fd&(!)!#@";
		$password = md5(sha1(md5($_POST['password'] . $salt)));
		$result = get_rows("select id, user_role, first_name, user_name, email_id, password from user_data"); 
		$flag = 1;
		foreach ($result as $value) 
		{
			if(($value['user_name'] == $user_name || $value['email_id'] == $user_name) && $value['password'] == $password)
			{	
				if($value['id'] == 1 && $value['user_role'] == 1)
				{
					$_SESSION['admin'] = $value['id'];
					$_SESSION['fname'] = $value['first_name'];
					header('location: ../manage_user.php');
				}
				else
				{
					$_SESSION['user'] = $value['id'];
					$_SESSION['fname'] = $value['first_name'];
					header('location: ../myprofile.php');
				}
				$flag = 0;
			}
		}
		if($flag)
		{
			$_SESSION['errors']['login_fail'] = "Invalid username or password";
			header('location: ../login.php');
		}
	}
	else
	{
		header('location: ../login.php');
	}
?>	